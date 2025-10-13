<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\AgenticCommerce\Api\Data;

/**
 * Allowance interface for delegated payment
 */
interface AllowanceInterface
{
    public const REASON_ONE_TIME = 'one_time';

    /**
     * Get reason
     *
     * @return string
     */
    public function getReason(): string;

    /**
     * Set reason
     *
     * @param string $reason
     * @return $this
     */
    public function setReason(string $reason): self;

    /**
     * Get max amount
     *
     * @return int
     */
    public function getMaxAmount(): int;

    /**
     * Set max amount
     *
     * @param int $maxAmount
     * @return $this
     */
    public function setMaxAmount(int $maxAmount): self;

    /**
     * Get currency (ISO-4217)
     *
     * @return string
     */
    public function getCurrency(): string;

    /**
     * Set currency (ISO-4217)
     *
     * @param string $currency
     * @return $this
     */
    public function setCurrency(string $currency): self;

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
     * Get merchant ID
     *
     * @return string
     */
    public function getMerchantId(): string;

    /**
     * Set merchant ID
     *
     * @param string $merchantId
     * @return $this
     */
    public function setMerchantId(string $merchantId): self;

    /**
     * Get expiration time (RFC 3339)
     *
     * @return string
     */
    public function getExpiresAt(): string;

    /**
     * Set expiration time (RFC 3339)
     *
     * @param string $expiresAt
     * @return $this
     */
    public function setExpiresAt(string $expiresAt): self;
}
