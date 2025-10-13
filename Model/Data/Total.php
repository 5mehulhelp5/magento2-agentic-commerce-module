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

use Magebit\AgenticCommerce\Api\Data\TotalInterface;
use Magebit\AgenticCommerce\Model\Data\DataTransferObject;

/**
 * Total Data Transfer Object
 */
class Total extends DataTransferObject implements TotalInterface
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
    public function setType(string $type): TotalInterface
    {
        return $this->setData('type', $type);
    }

    /**
     * @inheritDoc
     */
    public function getDisplayText(): string
    {
        return $this->getDataString('display_text');
    }

    /**
     * @inheritDoc
     */
    public function setDisplayText(string $text): TotalInterface
    {
        return $this->setData('display_text', $text);
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
    public function setAmount(int $amount): TotalInterface
    {
        return $this->setData('amount', $amount);
    }
}
