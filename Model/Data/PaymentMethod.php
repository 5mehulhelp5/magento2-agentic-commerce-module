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

use Magebit\AgenticCommerce\Api\Data\PaymentMethodInterface;

/**
 * Payment Method Data Transfer Object
 */
class PaymentMethod extends DataTransferObject implements PaymentMethodInterface
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
    public function setType(string $type): PaymentMethodInterface
    {
        return $this->setData('type', $type);
    }

    /**
     * @inheritDoc
     */
    public function getCardNumberType(): string
    {
        return $this->getDataString('card_number_type');
    }

    /**
     * @inheritDoc
     */
    public function setCardNumberType(string $cardNumberType): PaymentMethodInterface
    {
        return $this->setData('card_number_type', $cardNumberType);
    }

    /**
     * @inheritDoc
     */
    public function getNumber(): string
    {
        return $this->getDataString('number');
    }

    /**
     * @inheritDoc
     */
    public function setNumber(string $number): PaymentMethodInterface
    {
        return $this->setData('number', $number);
    }

    /**
     * @inheritDoc
     */
    public function getExpMonth(): ?string
    {
        $data = $this->getDataStringOrNull('exp_month');
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function setExpMonth(?string $expMonth): PaymentMethodInterface
    {
        return $this->setData('exp_month', $expMonth);
    }

    /**
     * @inheritDoc
     */
    public function getExpYear(): ?string
    {
        $data = $this->getDataStringOrNull('exp_year');
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function setExpYear(?string $expYear): PaymentMethodInterface
    {
        return $this->setData('exp_year', $expYear);
    }

    /**
     * @inheritDoc
     */
    public function getName(): ?string
    {
        $data = $this->getDataStringOrNull('name');
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function setName(?string $name): PaymentMethodInterface
    {
        return $this->setData('name', $name);
    }

    /**
     * @inheritDoc
     */
    public function getCvc(): ?string
    {
        $data = $this->getDataStringOrNull('cvc');
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function setCvc(?string $cvc): PaymentMethodInterface
    {
        return $this->setData('cvc', $cvc);
    }

    /**
     * @inheritDoc
     */
    public function getCryptogram(): ?string
    {
        $data = $this->getDataStringOrNull('cryptogram');
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function setCryptogram(?string $cryptogram): PaymentMethodInterface
    {
        return $this->setData('cryptogram', $cryptogram);
    }

    /**
     * @inheritDoc
     */
    public function getEciValue(): ?string
    {
        $data = $this->getDataStringOrNull('eci_value');
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function setEciValue(?string $eciValue): PaymentMethodInterface
    {
        return $this->setData('eci_value', $eciValue);
    }

    /**
     * @inheritDoc
     */
    public function getChecksPerformed(): ?array
    {
        $data = $this->getDataArrayOrNull('checks_performed');
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function setChecksPerformed(?array $checksPerformed): PaymentMethodInterface
    {
        return $this->setData('checks_performed', $checksPerformed);
    }

    /**
     * @inheritDoc
     */
    public function getIin(): ?string
    {
        $data = $this->getDataStringOrNull('iin');
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function setIin(?string $iin): PaymentMethodInterface
    {
        return $this->setData('iin', $iin);
    }

    /**
     * @inheritDoc
     */
    public function getDisplayCardFundingType(): string
    {
        return $this->getDataString('display_card_funding_type');
    }

    /**
     * @inheritDoc
     */
    public function setDisplayCardFundingType(string $displayCardFundingType): PaymentMethodInterface
    {
        return $this->setData('display_card_funding_type', $displayCardFundingType);
    }

    /**
     * @inheritDoc
     */
    public function getDisplayWalletType(): ?string
    {
        return $this->getDataStringOrNull('display_wallet_type');
    }

    /**
     * @inheritDoc
     */
    public function setDisplayWalletType(?string $displayWalletType): PaymentMethodInterface
    {
        return $this->setData('display_wallet_type', $displayWalletType);
    }

    /**
     * @inheritDoc
     */
    public function getDisplayBrand(): ?string
    {
        return $this->getDataStringOrNull('display_brand');
    }

    /**
     * @inheritDoc
     */
    public function setDisplayBrand(?string $displayBrand): PaymentMethodInterface
    {
        return $this->setData('display_brand', $displayBrand);
    }

    /**
     * @inheritDoc
     */
    public function getDisplayLast4(): ?string
    {
        return $this->getDataStringOrNull('display_last4');
    }

    /**
     * @inheritDoc
     */
    public function setDisplayLast4(?string $displayLast4): PaymentMethodInterface
    {
        return $this->setData('display_last4', $displayLast4);
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
    public function setMetadata(array $metadata): PaymentMethodInterface
    {
        return $this->setData('metadata', $metadata);
    }
}
