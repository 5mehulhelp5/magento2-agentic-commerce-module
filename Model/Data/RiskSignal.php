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

use Magebit\AgenticCommerce\Api\Data\RiskSignalInterface;
use Magebit\AgenticCommerce\Model\Data\DataTransferObject;

/**
 * Risk Signal Data Transfer Object
 */
class RiskSignal extends DataTransferObject implements RiskSignalInterface
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
    public function setType(string $type): RiskSignalInterface
    {
        return $this->setData('type', $type);
    }

    /**
     * @inheritDoc
     */
    public function getScore(): int
    {
        return $this->getDataInt('score');
    }

    /**
     * @inheritDoc
     */
    public function setScore(int $score): RiskSignalInterface
    {
        return $this->setData('score', $score);
    }

    /**
     * @inheritDoc
     */
    public function getAction(): string
    {
        return $this->getDataString('action');
    }

    /**
     * @inheritDoc
     */
    public function setAction(string $action): RiskSignalInterface
    {
        return $this->setData('action', $action);
    }
}
