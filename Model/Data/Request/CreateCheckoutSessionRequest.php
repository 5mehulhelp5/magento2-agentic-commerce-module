<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

namespace Magebit\AgenticCommerce\Model\Data\Request;

use Magebit\AgenticCommerce\Api\Data\ItemInterface;
use Magebit\AgenticCommerce\Api\Data\Request\CreateCheckoutSessionRequestInterface;
use Magebit\AgenticCommerce\Api\Data\AddressInterface;
use Magebit\AgenticCommerce\Api\Data\BuyerInterface;
use Magebit\AgenticCommerce\Api\Data\ItemInterfaceFactory;
use Magebit\AgenticCommerce\Api\Data\AddressInterfaceFactory;
use Magebit\AgenticCommerce\Api\Data\BuyerInterfaceFactory;
use Magebit\AgenticCommerce\Model\Data\DataTransferObject;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class CreateCheckoutSessionRequest extends DataTransferObject implements CreateCheckoutSessionRequestInterface
{
    /**
     * @param ItemInterfaceFactory $itemInterfaceFactory
     * @param AddressInterfaceFactory $addressInterfaceFactory
     * @param BuyerInterfaceFactory $buyerInterfaceFactory
     * @param array<mixed> $data
     */
    public function __construct(
        private readonly ItemInterfaceFactory $itemInterfaceFactory,
        private readonly AddressInterfaceFactory $addressInterfaceFactory,
        private readonly BuyerInterfaceFactory $buyerInterfaceFactory,
        array $data = []
    ) {
        parent::__construct($data);
    }

    /**
     * @inheritDoc
     */
    public function getItems(): array
    {
        return $this->getDataInstanceArray('items', ItemInterface::class, $this->itemInterfaceFactory->create(...));
    }

    /**
     * @inheritDoc
     */
    public function getFulfillmentAddress(): ?AddressInterface
    {
        return $this->getDataInstance('fulfillment_address', AddressInterface::class, $this->addressInterfaceFactory->create(...));
    }

    /**
     * @inheritDoc
     */
    public function getBuyer(): ?BuyerInterface
    {
        return $this->getDataInstance('buyer', BuyerInterface::class, $this->buyerInterfaceFactory->create(...));
    }

    /**
     * @inheritDoc
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        // Validate raw data array directly
        $metadata->addGetterConstraint('rawData', new Assert\Collection([
            'fields' => [
                'items' => new Assert\Required([
                    new Assert\NotBlank(message: 'Items are required'),
                ]),
            ],
            'allowExtraFields' => true,
            'allowMissingFields' => false,
        ]));
    }
}
