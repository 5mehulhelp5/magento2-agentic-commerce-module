<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\AgenticCommerce\Model\Data\Request;

use Magebit\AgenticCommerce\Api\Data\AddressInterface;
use Magebit\AgenticCommerce\Api\Data\AddressInterfaceFactory;
use Magebit\AgenticCommerce\Api\Data\AllowanceInterface;
use Magebit\AgenticCommerce\Api\Data\AllowanceInterfaceFactory;
use Magebit\AgenticCommerce\Api\Data\PaymentMethodInterface;
use Magebit\AgenticCommerce\Api\Data\PaymentMethodInterfaceFactory;
use Magebit\AgenticCommerce\Api\Data\Request\DelegatePaymentRequestInterface;
use Magebit\AgenticCommerce\Api\Data\RiskSignalInterface;
use Magebit\AgenticCommerce\Api\Data\RiskSignalInterfaceFactory;
use Magebit\AgenticCommerce\Model\Data\DataTransferObject;

/**
 * Delegate Payment Request Data Transfer Object
 */
class DelegatePaymentRequest extends DataTransferObject implements DelegatePaymentRequestInterface
{
    /**
     * @param PaymentMethodInterfaceFactory $paymentMethodInterfaceFactory
     * @param AllowanceInterfaceFactory $allowanceInterfaceFactory
     * @param AddressInterfaceFactory $addressInterfaceFactory
     * @param RiskSignalInterfaceFactory $riskSignalInterfaceFactory
     * @param array<mixed> $data
     */
    public function __construct(
        private readonly PaymentMethodInterfaceFactory $paymentMethodInterfaceFactory,
        private readonly AllowanceInterfaceFactory $allowanceInterfaceFactory,
        private readonly AddressInterfaceFactory $addressInterfaceFactory,
        private readonly RiskSignalInterfaceFactory $riskSignalInterfaceFactory,
        array $data = []
    ) {
        parent::__construct($data);
    }

    /**
     * @inheritDoc
     */
    public function getPaymentMethod(): PaymentMethodInterface
    {
        return $this->getDataInstance('payment_method', PaymentMethodInterface::class, $this->paymentMethodInterfaceFactory->create(...));
    }

    /**
     * @inheritDoc
     */
    public function setPaymentMethod(PaymentMethodInterface $paymentMethod): DelegatePaymentRequestInterface
    {
        return $this->setData('payment_method', $paymentMethod);
    }

    /**
     * @inheritDoc
     */
    public function getAllowance(): AllowanceInterface
    {
        return $this->getDataInstance('allowance', AllowanceInterface::class, $this->allowanceInterfaceFactory->create(...));
    }

    /**
     * @inheritDoc
     */
    public function setAllowance(AllowanceInterface $allowance): DelegatePaymentRequestInterface
    {
        return $this->setData('allowance', $allowance);
    }

    /**
     * @inheritDoc
     */
    public function getBillingAddress(): ?AddressInterface
    {
        return $this->getDataInstance('billing_address', AddressInterface::class, $this->addressInterfaceFactory->create(...));
    }

    /**
     * @inheritDoc
     */
    public function setBillingAddress(?AddressInterface $billingAddress): DelegatePaymentRequestInterface
    {
        return $this->setData('billing_address', $billingAddress);
    }

    /**
     * @inheritDoc
     */
    public function getRiskSignals(): array
    {
        return $this->getDataInstanceArray('risk_signals', RiskSignalInterface::class, $this->riskSignalInterfaceFactory->create(...));
    }

    /**
     * @inheritDoc
     */
    public function setRiskSignals(array $riskSignals): DelegatePaymentRequestInterface
    {
        return $this->setData('risk_signals', $riskSignals);
    }

    /**
     * @inheritDoc
     */
    public function getMetadata(): array
    {
        $data = $this->getData('metadata');
        /** @var array<string, mixed> $result */
        $result = is_array($data) ? $data : [];
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function setMetadata(array $metadata): DelegatePaymentRequestInterface
    {
        return $this->setData('metadata', $metadata);
    }
}
