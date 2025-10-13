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

use Magebit\AgenticCommerce\Api\Data\Webhook\RefundInterface;
use Magebit\AgenticCommerce\Model\Data\DataTransferObject;

/**
 * Refund Data Transfer Object
 */
class Refund extends DataTransferObject implements RefundInterface
{
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
    public function setType(string $type): RefundInterface
    {
        $this->setData('type', $type);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getAmount(): int
    {
        return $this->getDataInt('amount');
    }

    /**
     * @inheritDoc
     */
    public function setAmount(int $amount): RefundInterface
    {
        $this->setData('amount', $amount);
        return $this;
    }
}
