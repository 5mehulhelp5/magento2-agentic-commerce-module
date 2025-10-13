<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\AgenticCommerce\Api\Data\Webhook;

/**
 * Webhook Event interface for Agentic Commerce
 */
interface WebhookEventInterface
{
    public const TYPE_ORDER_CREATED = 'order_created';
    public const TYPE_ORDER_UPDATED = 'order_updated';

    /**
     * Get event type
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Set event type
     *
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self;

    /**
     * Get event data
     *
     * @return \Magebit\AgenticCommerce\Api\Data\Webhook\EventDataInterface
     */
    public function getEventData(): EventDataInterface;

    /**
     * Set event data
     *
     * @param \Magebit\AgenticCommerce\Api\Data\Webhook\EventDataInterface $data
     * @return $this
     */
    public function setEventData(EventDataInterface $data): self;
}
