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
 * Event Data interface for webhook events
 */
interface EventDataInterface
{
    public const TYPE_ORDER = 'order';

    public const STATUS_CREATED = 'created';
    public const STATUS_MANUAL_REVIEW = 'manual_review';
    public const STATUS_CONFIRMED = 'confirmed';
    public const STATUS_CANCELED = 'canceled';
    public const STATUS_SHIPPED = 'shipped';
    public const STATUS_FULFILLED = 'fulfilled';

    /**
     * Get data type
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Set data type
     *
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self;

    /**
     * Get checkout session ID
     *
     * @return string
     */
    public function getCheckoutSessionId(): string;

    /**
     * Set checkout session ID
     *
     * @param string $checkoutSessionId
     * @return $this
     */
    public function setCheckoutSessionId(string $checkoutSessionId): self;

    /**
     * Get permalink URL
     *
     * @return string
     */
    public function getPermalinkUrl(): string;

    /**
     * Set permalink URL
     *
     * @param string $permalinkUrl
     * @return $this
     */
    public function setPermalinkUrl(string $permalinkUrl): self;

    /**
     * Get order status
     *
     * @return string
     */
    public function getStatus(): string;

    /**
     * Set order status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status): self;

    /**
     * Get refunds
     *
     * @return \Magebit\AgenticCommerce\Api\Data\Webhook\RefundInterface[]
     */
    public function getRefunds(): array;

    /**
     * Set refunds
     *
     * @param \Magebit\AgenticCommerce\Api\Data\Webhook\RefundInterface[] $refunds
     * @return $this
     */
    public function setRefunds(array $refunds): self;
}
