<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\AgenticCommerce\Api\Data\Request;

use Magebit\AgenticCommerce\Api\Data\AddressInterface;
use Magebit\AgenticCommerce\Api\Data\AllowanceInterface;
use Magebit\AgenticCommerce\Api\Data\PaymentMethodInterface;

/**
 * Delegate Payment Request interface for OpenAI Agentic Commerce
 *
 * Represents the structure of a delegated payment request where OpenAI securely shares
 * payment details with the merchant or its designated payment service provider (PSP)
 */
interface DelegatePaymentRequestInterface
{
    /**
     * Get payment method
     *
     * @return \Magebit\AgenticCommerce\Api\Data\PaymentMethodInterface
     */
    public function getPaymentMethod(): PaymentMethodInterface;

    /**
     * Set payment method
     *
     * @param \Magebit\AgenticCommerce\Api\Data\PaymentMethodInterface $paymentMethod
     * @return $this
     */
    public function setPaymentMethod(PaymentMethodInterface $paymentMethod): self;

    /**
     * Get allowance
     *
     * @return \Magebit\AgenticCommerce\Api\Data\AllowanceInterface
     */
    public function getAllowance(): AllowanceInterface;

    /**
     * Set allowance
     *
     * @param \Magebit\AgenticCommerce\Api\Data\AllowanceInterface $allowance
     * @return $this
     */
    public function setAllowance(AllowanceInterface $allowance): self;

    /**
     * Get billing address
     *
     * @return \Magebit\AgenticCommerce\Api\Data\AddressInterface|null
     */
    public function getBillingAddress(): ?AddressInterface;

    /**
     * Set billing address
     *
     * @param \Magebit\AgenticCommerce\Api\Data\AddressInterface|null $billingAddress
     * @return $this
     */
    public function setBillingAddress(?AddressInterface $billingAddress): self;

    /**
     * Get risk signals
     *
     * @return \Magebit\AgenticCommerce\Api\Data\RiskSignalInterface[]
     */
    public function getRiskSignals(): array;

    /**
     * Set risk signals
     *
     * @param \Magebit\AgenticCommerce\Api\Data\RiskSignalInterface[] $riskSignals
     * @return $this
     */
    public function setRiskSignals(array $riskSignals): self;

    /**
     * Get metadata
     *
     * @return array<string, mixed>
     */
    public function getMetadata(): array;

    /**
     * Set metadata
     *
     * @param array<string, mixed> $metadata
     * @return $this
     */
    public function setMetadata(array $metadata): self;
}
