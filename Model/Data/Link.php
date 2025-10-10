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

use Magebit\AgenticCommerce\Api\Data\LinkInterface;
use Magebit\AgenticCommerce\Model\Data\DataTransferObject;

/**
 * Link Data Transfer Object
 */
class Link extends DataTransferObject implements LinkInterface
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
    public function setType(string $type): LinkInterface
    {
        return $this->setData('type', $type);
    }

    /**
     * @inheritDoc
     */
    public function getUrl(): string
    {
        return $this->getDataString('url');
    }

    /**
     * @inheritDoc
     */
    public function setUrl(string $url): LinkInterface
    {
        return $this->setData('url', $url);
    }
}
