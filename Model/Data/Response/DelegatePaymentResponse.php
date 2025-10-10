<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\AgenticCommerce\Model\Data\Response;

use Magebit\AgenticCommerce\Api\Data\Response\DelegatePaymentResponseInterface;
use Magebit\AgenticCommerce\Model\Data\DataTransferObject;

/**
 * Delegate Payment Response Data Transfer Object
 */
class DelegatePaymentResponse extends DataTransferObject implements DelegatePaymentResponseInterface
{
    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return $this->getDataString('id');
    }

    /**
     * @inheritDoc
     */
    public function setId(string $id): DelegatePaymentResponseInterface
    {
        return $this->setData('id', $id);
    }

    /**
     * @inheritDoc
     */
    public function getCreated(): string
    {
        return $this->getDataString('created');
    }

    /**
     * @inheritDoc
     */
    public function setCreated(string $created): DelegatePaymentResponseInterface
    {
        return $this->setData('created', $created);
    }

    /**
     * @inheritDoc
     */
    public function getMetadata(): array
    {
        $data = $this->getData('metadata');
        /** @var array<string, mixed> $result */
        $result = is_array($data) ? $data : [];
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function setMetadata(array $metadata): DelegatePaymentResponseInterface
    {
        return $this->setData('metadata', $metadata);
    }
}
