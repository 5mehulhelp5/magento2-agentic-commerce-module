<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\AgenticCommerce\Service;

use Exception;
use Magebit\AgenticCommerce\Api\ConfigInterface;
use Magebit\AgenticCommerce\Api\Data\Webhook\WebhookEventInterface;
use Magebit\AgenticCommerce\Model\Data\Webhook\EventData;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\HTTP\Client\CurlFactory;
use Psr\Log\LoggerInterface;

class WebhookService
{
    /**
     * @param CurlFactory $curlFactory
     * @param ConfigInterface $config
     * @param LoggerInterface $logger
     */
    public function __construct(
        protected readonly CurlFactory $curlFactory,
        protected readonly ConfigInterface $config,
        protected readonly LoggerInterface $logger,
    ) {
    }

    /**
     * @param WebhookEventInterface $webhookEvent
     * @param string $sessionId
     * @return void
     */
    public function dispatch(WebhookEventInterface $webhookEvent, string $sessionId): void
    {
        if (!$this->config->getIsWebhooksEnabled()) {
            return;
        }

        try {
            /** @var EventData $webhookEvent */
            /** @var Curl $curl */
            $curl = $this->curlFactory->create();
            $payload = (string) json_encode($webhookEvent->toArray());
            $signature = $this->getSignature($payload);

            $curl->addHeader('Merchant-Signature', $signature);
            $curl->addHeader('Request-Id', $sessionId);
            $curl->addHeader('Timestamp', (string) date('c'));
            $curl->addHeader('Content-Type', 'application/json');
            $curl->addHeader('Content-Length', (string) strlen($payload));

            $curl->post($this->config->getWebhookUrl(), $payload);

            $response = $curl->getBody();

            if ($curl->getStatus() >= 200 && $curl->getStatus() < 300) {
                $this->logger->info('Webhook dispatched', [
                    'type' => $webhookEvent->getType(),
                    'signature' => $signature,
                    'session_id' => $sessionId,
                ]);
            } else {
                $this->logger->error('Webhook failed', [
                    'type' => $webhookEvent->getType(),
                    'signature' => $signature,
                    'session_id' => $sessionId,
                    'response' => $response,
                ]);
            }
        } catch (Exception $e) {
            $this->logger->critical('Failed to dispatch webhook', [
                'exception' => $e,
                'session_id' => $sessionId,
            ]);
        }
    }

    /**
     * @param string $payload
     * @return string
     */
    protected function getSignature(string $payload): string
    {
        return hash_hmac('sha256', $payload, $this->config->getWebhookSecret());
    }
}
