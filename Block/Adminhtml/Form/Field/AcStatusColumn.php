<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\AgenticCommerce\Block\Adminhtml\Form\Field;

use Magento\Framework\View\Element\Html\Select;
use Magebit\AgenticCommerce\Api\Data\Webhook\EventDataInterface;

/**
 * Agentic Commerce Status dropdown renderer
 */
class AcStatusColumn extends Select
{
    /**
     * Set "name" for <select> element
     *
     * @param string $value
     * @return $this
     */
    public function setInputName($value)
    {
        return $this->setName($value);
    }

    /**
     * Set "id" for <select> element
     *
     * @param string $value
     * @return $this
     */
    public function setInputId($value)
    {
        return $this->setId($value);
    }

    /**
     * Render block HTML
     *
     * @return string
     */
    public function _toHtml(): string
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->getSourceOptions());
        }
        return parent::_toHtml();
    }

    /**
     * Get Agentic Commerce status options
     *
     * @return array<array<string, string>>
     */
    private function getSourceOptions(): array
    {
        return [
            ['label' => 'Created', 'value' => EventDataInterface::STATUS_CREATED],
            ['label' => 'Manual Review', 'value' => EventDataInterface::STATUS_MANUAL_REVIEW],
            ['label' => 'Confirmed', 'value' => EventDataInterface::STATUS_CONFIRMED],
            ['label' => 'Canceled', 'value' => EventDataInterface::STATUS_CANCELED],
            ['label' => 'Shipped', 'value' => EventDataInterface::STATUS_SHIPPED],
            ['label' => 'Fulfilled', 'value' => EventDataInterface::STATUS_FULFILLED],
        ];
    }
}
