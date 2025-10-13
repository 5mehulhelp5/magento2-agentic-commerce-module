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
 * Refund interface for order refunds in webhooks
 */
interface RefundInterface
{
    public const TYPE_STORE_CREDIT = 'store_credit';
    public const TYPE_ORIGINAL_PAYMENT = 'original_payment';

    /**
     * Get refund type
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Set refund type
     *
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self;

    /**
     * Get refund amount
     *
     * @return int
     */
    public function getAmount(): int;

    /**
     * Set refund amount
     *
     * @param int $amount
     * @return $this
     */
    public function setAmount(int $amount): self;
}
