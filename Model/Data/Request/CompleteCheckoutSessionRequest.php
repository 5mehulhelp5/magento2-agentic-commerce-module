<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

namespace Magebit\AgenticCommerce\Model\Data\Request;

use Magebit\AgenticCommerce\Api\Data\Request\CompleteCheckoutSessionRequestInterface;
use Magebit\AgenticCommerce\Api\Data\BuyerInterface;
use Magebit\AgenticCommerce\Api\Data\PaymentDataInterface;
use Magebit\AgenticCommerce\Api\Data\PaymentDataInterfaceFactory;
use Magebit\AgenticCommerce\Api\Data\BuyerInterfaceFactory;
use Magebit\AgenticCommerce\Model\Data\DataTransferObject;

class CompleteCheckoutSessionRequest extends DataTransferObject implements CompleteCheckoutSessionRequestInterface
{
    /**
     * @param PaymentDataInterfaceFactory $paymentDataInterfaceFactory
     * @param BuyerInterfaceFactory $buyerInterfaceFactory
     * @param array<mixed> $data
     */
    public function __construct(
        private readonly PaymentDataInterfaceFactory $paymentDataInterfaceFactory,
        private readonly BuyerInterfaceFactory $buyerInterfaceFactory,
        array $data = []
    ) {
        parent::__construct($data);
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
    public function getPaymentData(): PaymentDataInterface
    {
        return $this->getDataInstance('payment_data', PaymentDataInterface::class, $this->paymentDataInterfaceFactory->create(...));
    }
}
