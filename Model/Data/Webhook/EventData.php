<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\AgenticCommerce\Model\Data\Webhook;

use Magebit\AgenticCommerce\Api\Data\Webhook\EventDataInterface;
use Magebit\AgenticCommerce\Api\Data\Webhook\RefundInterface;
use Magebit\AgenticCommerce\Api\Data\Webhook\RefundInterfaceFactory;
use Magebit\AgenticCommerce\Model\Data\DataTransferObject;

/**
 * Event Data Transfer Object for webhook events
 */
class EventData extends DataTransferObject implements EventDataInterface
{
    /**
     * @param RefundInterfaceFactory $refundInterfaceFactory
     * @param array<mixed> $data
     */
    public function __construct(
        private readonly RefundInterfaceFactory $refundInterfaceFactory,
        array $data = []
    ) {
        parent::__construct($data);
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return $this->getDataString('type');
    }

    /**
     * @inheritDoc
     */
    public function setType(string $type): EventDataInterface
    {
        $this->setData('type', $type);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCheckoutSessionId(): string
    {
        return $this->getDataString('checkout_session_id');
    }

    /**
     * @inheritDoc
     */
    public function setCheckoutSessionId(string $checkoutSessionId): EventDataInterface
    {
        $this->setData('checkout_session_id', $checkoutSessionId);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getPermalinkUrl(): string
    {
        return $this->getDataString('permalink_url');
    }

    /**
     * @inheritDoc
     */
    public function setPermalinkUrl(string $permalinkUrl): EventDataInterface
    {
        $this->setData('permalink_url', $permalinkUrl);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStatus(): string
    {
        return $this->getDataString('status');
    }

    /**
     * @inheritDoc
     */
    public function setStatus(string $status): EventDataInterface
    {
        $this->setData('status', $status);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRefunds(): array
    {
        return $this->getDataInstanceArray(
            'refunds',
            RefundInterface::class,
            $this->refundInterfaceFactory->create(...)
        );
    }

    /**
     * @inheritDoc
     */
    public function setRefunds(array $refunds): EventDataInterface
    {
        $this->setData('refunds', $refunds);
        return $this;
    }
}
