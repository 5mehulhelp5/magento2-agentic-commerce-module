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
use Magebit\AgenticCommerce\Api\Data\Webhook\EventDataInterfaceFactory;
use Magebit\AgenticCommerce\Api\Data\Webhook\WebhookEventInterface;
use Magebit\AgenticCommerce\Model\Data\DataTransferObject;

/**
 * Webhook Event Data Transfer Object
 */
class WebhookEvent extends DataTransferObject implements WebhookEventInterface
{
    /**
     * @param EventDataInterfaceFactory $eventDataInterfaceFactory
     * @param array<mixed> $data
     */
    public function __construct(
        private readonly EventDataInterfaceFactory $eventDataInterfaceFactory,
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
    public function setType(string $type): WebhookEventInterface
    {
        $this->setData('type', $type);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEventData(): EventDataInterface
    {
        $data = $this->getDataInstance(
            'data',
            EventDataInterface::class,
            $this->eventDataInterfaceFactory->create(...)
        );

        if (!$data instanceof EventDataInterface) {
            throw new \InvalidArgumentException('Event data is required');
        }

        /** @var EventDataInterface $data */
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function setEventData(EventDataInterface $data): WebhookEventInterface
    {
        $this->setData('data', $data);
        return $this;
    }
}
