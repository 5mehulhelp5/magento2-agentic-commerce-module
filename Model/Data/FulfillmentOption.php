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

use Magebit\AgenticCommerce\Api\Data\FulfillmentOptionInterface;
use Magebit\AgenticCommerce\Model\Data\DataTransferObject;

/**
 * Fulfillment Option Data Transfer Object
 */
class FulfillmentOption extends DataTransferObject implements FulfillmentOptionInterface
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
    public function setType(string $type): FulfillmentOptionInterface
    {
        return $this->setData('type', $type);
    }

    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return $this->getDataString('id');
    }

    /**
     * @inheritDoc
     */
    public function setId(string $id): FulfillmentOptionInterface
    {
        return $this->setData('id', $id);
    }

    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return $this->getDataString('title');
    }

    /**
     * @inheritDoc
     */
    public function setTitle(string $title): FulfillmentOptionInterface
    {
        return $this->setData('title', $title);
    }

    /**
     * @inheritDoc
     */
    public function getSubtitle(): ?string
    {
        return $this->getDataStringOrNull('subtitle');
    }

    /**
     * @inheritDoc
     */
    public function setSubtitle(?string $subtitle): FulfillmentOptionInterface
    {
        return $this->setData('subtitle', $subtitle);
    }

    /**
     * @inheritDoc
     */
    public function getSubtotal(): int
    {
        return $this->getDataInt('subtotal');
    }

    /**
     * @inheritDoc
     */
    public function setSubtotal(int $subtotal): FulfillmentOptionInterface
    {
        return $this->setData('subtotal', $subtotal);
    }

    /**
     * @inheritDoc
     */
    public function getTax(): int
    {
        return $this->getDataInt('tax');
    }

    /**
     * @inheritDoc
     */
    public function setTax(int $tax): FulfillmentOptionInterface
    {
        return $this->setData('tax', $tax);
    }

    /**
     * @inheritDoc
     */
    public function getTotal(): int
    {
        return $this->getDataInt('total');
    }

    /**
     * @inheritDoc
     */
    public function setTotal(int $total): FulfillmentOptionInterface
    {
        return $this->setData('total', $total);
    }
}
