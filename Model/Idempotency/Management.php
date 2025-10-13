<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\AgenticCommerce\Model\Idempotency;

use Magento\Framework\App\Request\Http;
use Magebit\AgenticCommerce\Api\Data\IdempotencyInterface;
use Magebit\AgenticCommerce\Api\Data\IdempotencyInterfaceFactory;
use Magebit\AgenticCommerce\Api\IdempotencyRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magebit\AgenticCommerce\Api\ConfigInterface;
use Magento\Framework\Encryption\EncryptorInterface;

class Management
{
    private const ALLOWED_METHODS = ['POST', 'PUT', 'PATCH'];

    /**
     * @param IdempotencyRepositoryInterface $idempotencyRepository
     * @param IdempotencyInterfaceFactory $idempotencyFactory
     * @param ConfigInterface $config
     * @param EncryptorInterface $encryptor
     */
    public function __construct(
        private readonly IdempotencyRepositoryInterface $idempotencyRepository,
        private readonly IdempotencyInterfaceFactory $idempotencyFactory,
        private readonly ConfigInterface $config,
        private readonly EncryptorInterface $encryptor
    ) {
    }

    /**
     * @param Http $request
     * @return bool
     */
    public function canHandleIdempotency(Http $request): bool
    {
        return in_array($request->getMethod(), self::ALLOWED_METHODS);
    }

    /**
     * @param Http $request
     * @param string $response
     * @param int $status
     * @return null|IdempotencyInterface
     */
    public function storeResponse(Http $request, string $response, int $status): ?IdempotencyInterface
    {
        $idempotencyKey = $request->getHeader('Idempotency-Key');

        if (!$idempotencyKey || !$this->canHandleIdempotency($request)) {
            return null;
        }

        $idempotency = $this->idempotencyFactory->create();
        $idempotency->setKey((string) $idempotencyKey);
        $idempotency->setRequestHash($this->hashRequest($request));
        $idempotency->setResponse($this->encryptor->encrypt($response));
        $idempotency->setStatus($status);

        $expiresAt = (int) strtotime('+' . $this->config->getIdempotencyTtl() . ' hours');
        $idempotency->setExpiresAt(
            date('Y-m-d H:i:s', $expiresAt)
        );

        $this->idempotencyRepository->save($idempotency);

        return $idempotency;
    }

    /**
     * @param string $key
     * @return null|IdempotencyInterface
     */
    public function getIdempotency(string $key): ?IdempotencyInterface
    {
        try {
            return $this->idempotencyRepository->getByKey($key);
        } catch (NoSuchEntityException $e) {
            return null;
        }
    }

    /**
     * @param Http $request
     * @return string
     */
    public function hashRequest(Http $request): string
    {
        $data = [
            'method' => $request->getMethod(),
            'path' => $request->getPathInfo(),
            'query' => $request->getQuery(),
            'body' => $request->getContent(),
        ];

        return hash('sha256', (string) json_encode($data));
    }
}
