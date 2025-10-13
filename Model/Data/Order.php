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

use Magebit\AgenticCommerce\Api\Data\OrderInterface;
use Magebit\AgenticCommerce\Model\Data\DataTransferObject;

/**
 * Order Data Transfer Object
 */
class Order extends DataTransferObject implements OrderInterface
{
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
    public function setId(string $id): OrderInterface
    {
        return $this->setData('id', $id);
    }

    /**
     * @inheritDoc
     */
    public function getCheckoutSessionId(): string
    {
        return $this->getDataString('checkout_session_id');
    }

    /**
     * @inheritDoc
     */
    public function setCheckoutSessionId(string $checkoutSessionId): OrderInterface
    {
        return $this->setData('checkout_session_id', $checkoutSessionId);
    }

    /**
     * @inheritDoc
     */
    public function getPermalinkUrl(): string
    {
        return $this->getDataString('permalink_url');
    }

    /**
     * @inheritDoc
     */
    public function setPermalinkUrl(string $url): OrderInterface
    {
        return $this->setData('permalink_url', $url);
    }
}
