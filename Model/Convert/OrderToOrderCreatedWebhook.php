<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\AgenticCommerce\Model\Convert;

use Magebit\AgenticCommerce\Api\Data\Webhook\WebhookEventInterfaceFactory;
use Magebit\AgenticCommerce\Api\Data\Webhook\EventDataInterfaceFactory;
use Magebit\AgenticCommerce\Api\Data\Webhook\EventDataInterface;
use Magebit\AgenticCommerce\Api\Data\Webhook\WebhookEventInterface;
use Magento\Framework\UrlInterface;
use Magento\Sales\Api\Data\OrderInterface;
use Magebit\AgenticCommerce\Model\Data\Order;

class OrderToOrderCreatedWebhook
{
    /**
     * @param WebhookEventInterfaceFactory $webhookEventInterfaceFactory
     * @param EventDataInterfaceFactory $eventDataInterfaceFactory
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        protected readonly WebhookEventInterfaceFactory $webhookEventInterfaceFactory,
        protected readonly EventDataInterfaceFactory $eventDataInterfaceFactory,
        protected readonly UrlInterface $urlBuilder,
    ) {
    }

    /**
     * @param OrderInterface $order
     * @param string $sessionId
     * @return WebhookEventInterface
     */
    public function execute(OrderInterface $order, string $sessionId): WebhookEventInterface
    {
        return $this->webhookEventInterfaceFactory->create([
            'data' => [
                'type' => WebhookEventInterface::TYPE_ORDER_CREATED,
                'event_data' => $this->eventDataInterfaceFactory->create(['data' => [
                    'type' => EventDataInterface::TYPE_ORDER,
                    'status' => EventDataInterface::STATUS_CREATED,
                    'checkout_session_id' => $sessionId,
                    'permalink_url' => $this->getOrderPermalinkUrl($order),
                    'refunds' => [],
                ]]),
            ],
        ]);
    }

    /**
     * @param OrderInterface $order
     * @return string
     */
    public function getOrderPermalinkUrl(OrderInterface $order): string
    {
        /** @var Order $order */
        return $this->urlBuilder->getUrl('agentic_commerce/checkout/order', ['order_id' => $order->getAcOrderId()]);
    }
}
