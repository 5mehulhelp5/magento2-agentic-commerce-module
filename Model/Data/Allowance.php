<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\AgenticCommerce\Model\Data;

use Magebit\AgenticCommerce\Api\Data\AllowanceInterface;
use Magebit\AgenticCommerce\Model\Data\DataTransferObject;

/**
 * Allowance Data Transfer Object
 */
class Allowance extends DataTransferObject implements AllowanceInterface
{
    /**
     * @inheritDoc
     */
    public function getReason(): string
    {
        return $this->getDataString('reason');
    }

    /**
     * @inheritDoc
     */
    public function setReason(string $reason): AllowanceInterface
    {
        return $this->setData('reason', $reason);
    }

    /**
     * @inheritDoc
     */
    public function getMaxAmount(): int
    {
        return $this->getDataInt('max_amount');
    }

    /**
     * @inheritDoc
     */
    public function setMaxAmount(int $maxAmount): AllowanceInterface
    {
        return $this->setData('max_amount', $maxAmount);
    }

    /**
     * @inheritDoc
     */
    public function getCurrency(): string
    {
        return $this->getDataString('currency');
    }

    /**
     * @inheritDoc
     */
    public function setCurrency(string $currency): AllowanceInterface
    {
        return $this->setData('currency', $currency);
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
    public function setCheckoutSessionId(string $checkoutSessionId): AllowanceInterface
    {
        return $this->setData('checkout_session_id', $checkoutSessionId);
    }

    /**
     * @inheritDoc
     */
    public function getMerchantId(): string
    {
        return $this->getDataString('merchant_id');
    }

    /**
     * @inheritDoc
     */
    public function setMerchantId(string $merchantId): AllowanceInterface
    {
        return $this->setData('merchant_id', $merchantId);
    }

    /**
     * @inheritDoc
     */
    public function getExpiresAt(): string
    {
        return $this->getDataString('expires_at');
    }

    /**
     * @inheritDoc
     */
    public function setExpiresAt(string $expiresAt): AllowanceInterface
    {
        return $this->setData('expires_at', $expiresAt);
    }
}
