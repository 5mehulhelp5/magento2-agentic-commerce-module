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

use Magebit\AgenticCommerce\Api\Data\AddressInterface;
use Magebit\AgenticCommerce\Model\Data\DataTransferObject;

/**
 * Address Data Transfer Object
 */
class Address extends DataTransferObject implements AddressInterface
{
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->getDataString('name');
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name): AddressInterface
    {
        return $this->setData('name', $name);
    }

    /**
     * @inheritDoc
     */
    public function getLineOne(): string
    {
        return $this->getDataString('line_one');
    }

    /**
     * @inheritDoc
     */
    public function setLineOne(string $lineOne): AddressInterface
    {
        return $this->setData('line_one', $lineOne);
    }

    /**
     * @inheritDoc
     */
    public function getLineTwo(): ?string
    {
        return $this->getDataStringOrNull('line_two');
    }

    /**
     * @inheritDoc
     */
    public function setLineTwo(?string $lineTwo): AddressInterface
    {
        return $this->setData('line_two', $lineTwo);
    }

    /**
     * @inheritDoc
     */
    public function getCity(): string
    {
        return $this->getDataString('city');
    }

    /**
     * @inheritDoc
     */
    public function setCity(string $city): AddressInterface
    {
        return $this->setData('city', $city);
    }

    /**
     * @inheritDoc
     */
    public function getState(): ?string
    {
        return $this->getDataStringOrNull('state');
    }

    /**
     * @inheritDoc
     */
    public function setState(?string $state): AddressInterface
    {
        return $this->setData('state', $state);
    }

    /**
     * @inheritDoc
     */
    public function getCountry(): string
    {
        return $this->getDataString('country');
    }

    /**
     * @inheritDoc
     */
    public function setCountry(string $country): AddressInterface
    {
        return $this->setData('country', $country);
    }

    /**
     * @inheritDoc
     */
    public function getPostalCode(): string
    {
        return $this->getDataString('postal_code');
    }

    /**
     * @inheritDoc
     */
    public function setPostalCode(string $postalCode): AddressInterface
    {
        return $this->setData('postal_code', $postalCode);
    }
}
