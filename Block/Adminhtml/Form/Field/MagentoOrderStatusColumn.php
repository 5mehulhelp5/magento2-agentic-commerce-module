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
use Magento\Framework\View\Element\Context;
use Magento\Sales\Model\ResourceModel\Order\Status\CollectionFactory;

/**
 * Magento Order Status dropdown renderer
 */
class MagentoOrderStatusColumn extends Select
{
    /**
     * @param Context $context
     * @param CollectionFactory $statusCollectionFactory
     * @param array<mixed> $data
     */
    public function __construct(
        Context $context,
        private readonly CollectionFactory $statusCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

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
     * Get Magento order status options
     *
     * @return array<array<string, string>>
     */
    private function getSourceOptions(): array
    {
        $options = [];
        $statusCollection = $this->statusCollectionFactory->create();

        /** @var \Magento\Sales\Model\Order\Status $status */
        foreach ($statusCollection as $status) {
            $options[] = [
                'label' => (string) $status->getLabel(),
                'value' => (string) $status->getStatus()
            ];
        }

        return $options;
    }
}
