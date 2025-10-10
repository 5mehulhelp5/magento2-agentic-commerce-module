<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\AgenticCommerce\Api\Data;

/**
 * Payment Method interface for delegated payment
 */
interface PaymentMethodInterface
{
    public const TYPE_CARD = 'card';
    public const CARD_NUMBER_TYPE_FPAN = 'fpan';
    public const CARD_NUMBER_TYPE_NETWORK_TOKEN = 'network_token';
    public const FUNDING_TYPE_CREDIT = 'credit';
    public const FUNDING_TYPE_DEBIT = 'debit';
    public const FUNDING_TYPE_PREPAID = 'prepaid';

    /**
     * Get payment method type
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Set payment method type
     *
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self;

    /**
     * Get card number type
     *
     * @return string
     */
    public function getCardNumberType(): string;

    /**
     * Set card number type
     *
     * @param string $cardNumberType
     * @return $this
     */
    public function setCardNumberType(string $cardNumberType): self;

    /**
     * Get card number
     *
     * @return string
     */
    public function getNumber(): string;

    /**
     * Set card number
     *
     * @param string $number
     * @return $this
     */
    public function setNumber(string $number): self;

    /**
     * Get expiry month
     *
     * @return string|null
     */
    public function getExpMonth(): ?string;

    /**
     * Set expiry month
     *
     * @param string|null $expMonth
     * @return $this
     */
    public function setExpMonth(?string $expMonth): self;

    /**
     * Get expiry year
     *
     * @return string|null
     */
    public function getExpYear(): ?string;

    /**
     * Set expiry year
     *
     * @param string|null $expYear
     * @return $this
     */
    public function setExpYear(?string $expYear): self;

    /**
     * Get cardholder name
     *
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * Set cardholder name
     *
     * @param string|null $name
     * @return $this
     */
    public function setName(?string $name): self;

    /**
     * Get CVC
     *
     * @return string|null
     */
    public function getCvc(): ?string;

    /**
     * Set CVC
     *
     * @param string|null $cvc
     * @return $this
     */
    public function setCvc(?string $cvc): self;

    /**
     * Get cryptogram
     *
     * @return string|null
     */
    public function getCryptogram(): ?string;

    /**
     * Set cryptogram
     *
     * @param string|null $cryptogram
     * @return $this
     */
    public function setCryptogram(?string $cryptogram): self;

    /**
     * Get ECI value
     *
     * @return string|null
     */
    public function getEciValue(): ?string;

    /**
     * Set ECI value
     *
     * @param string|null $eciValue
     * @return $this
     */
    public function setEciValue(?string $eciValue): self;

    /**
     * Get checks performed
     *
     * @return string[]|null
     */
    public function getChecksPerformed(): ?array;

    /**
     * Set checks performed
     *
     * @param string[]|null $checksPerformed
     * @return $this
     */
    public function setChecksPerformed(?array $checksPerformed): self;

    /**
     * Get IIN
     *
     * @return string|null
     */
    public function getIin(): ?string;

    /**
     * Set IIN
     *
     * @param string|null $iin
     * @return $this
     */
    public function setIin(?string $iin): self;

    /**
     * Get display card funding type
     *
     * @return string
     */
    public function getDisplayCardFundingType(): string;

    /**
     * Set display card funding type
     *
     * @param string $displayCardFundingType
     * @return $this
     */
    public function setDisplayCardFundingType(string $displayCardFundingType): self;

    /**
     * Get display wallet type
     *
     * @return string|null
     */
    public function getDisplayWalletType(): ?string;

    /**
     * Set display wallet type
     *
     * @param string|null $displayWalletType
     * @return $this
     */
    public function setDisplayWalletType(?string $displayWalletType): self;

    /**
     * Get display brand
     *
     * @return string|null
     */
    public function getDisplayBrand(): ?string;

    /**
     * Set display brand
     *
     * @param string|null $displayBrand
     * @return $this
     */
    public function setDisplayBrand(?string $displayBrand): self;

    /**
     * Get display last 4 digits
     *
     * @return string|null
     */
    public function getDisplayLast4(): ?string;

    /**
     * Set display last 4 digits
     *
     * @param string|null $displayLast4
     * @return $this
     */
    public function setDisplayLast4(?string $displayLast4): self;

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
