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

use Magebit\AgenticCommerce\Api\Data\BuyerInterface;
use Magebit\AgenticCommerce\Model\Data\DataTransferObject;

/**
 * Buyer Data Transfer Object
 */
class Buyer extends DataTransferObject implements BuyerInterface
{
    /**
     * @inheritDoc
     */
    public function getFirstName(): string
    {
        return $this->getDataString('first_name');
    }

    /**
     * @inheritDoc
     */
    public function setFirstName(string $firstName): BuyerInterface
    {
        return $this->setData('first_name', $firstName);
    }

    /**
     * @inheritDoc
     */
    public function getLastName(): string
    {
        return $this->getDataString('last_name');
    }

    /**
     * @inheritDoc
     */
    public function setLastName(string $lastName): BuyerInterface
    {
        return $this->setData('last_name', $lastName);
    }

    /**
     * @inheritDoc
     */
    public function getEmail(): string
    {
        return $this->getDataString('email');
    }

    /**
     * @inheritDoc
     */
    public function setEmail(string $email): BuyerInterface
    {
        return $this->setData('email', $email);
    }

    /**
     * @inheritDoc
     */
    public function getPhoneNumber(): ?string
    {
        return $this->getDataStringOrNull('phone_number');
    }

    /**
     * @inheritDoc
     */
    public function setPhoneNumber(?string $phoneNumber): BuyerInterface
    {
        return $this->setData('phone_number', $phoneNumber);
    }
}
