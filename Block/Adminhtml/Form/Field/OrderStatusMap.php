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

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;

/**
 * Order Status Mapping dynamic row configuration
 */
class OrderStatusMap extends AbstractFieldArray
{
    /**
     * @var MagentoOrderStatusColumn
     */
    private $magentoStatusRenderer;

    /**
     * @var AcStatusColumn
     */
    private $acStatusRenderer;

    /**
     * Prepare rendering the new field by adding all the needed columns
     *
     * @return void
     */
    protected function _prepareToRender(): void
    {
        $this->addColumn('magento_order_status', [
            'label' => __('Magento Order Status'),
            'class' => 'required-entry',
            'renderer' => $this->getMagentoStatusRenderer()
        ]);
        $this->addColumn('ac_status', [
            'label' => __('AC Status'),
            'class' => 'required-entry',
            'renderer' => $this->getAcStatusRenderer()
        ]);
        $this->_addAfter = false;
        $this->_addButtonLabel = 'Add Mapping';
    }

    /**
     * Prepare existing row data object
     *
     * @param DataObject $row
     * @return void
     * @throws LocalizedException
     */
    protected function _prepareArrayRow(DataObject $row): void
    {
        $options = [];

        $magentoStatus = $row->getMagentoOrderStatus();
        if ($magentoStatus !== null) {
            $options['option_' . $this->getMagentoStatusRenderer()->calcOptionHash($magentoStatus)]
                = 'selected="selected"';
        }

        $acStatus = $row->getAcStatus();
        if ($acStatus !== null) {
            $options['option_' . $this->getAcStatusRenderer()->calcOptionHash($acStatus)]
                = 'selected="selected"';
        }

        $row->setData('option_extra_attrs', $options);
    }

    /**
     * Get Magento order status renderer
     *
     * @return MagentoOrderStatusColumn
     * @throws LocalizedException
     */
    private function getMagentoStatusRenderer(): MagentoOrderStatusColumn
    {
        if (!$this->magentoStatusRenderer) {
            /** @var MagentoOrderStatusColumn $block */
            $block = $this->getLayout()->createBlock(
                MagentoOrderStatusColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
            $this->magentoStatusRenderer = $block;
        }
        return $this->magentoStatusRenderer;
    }

    /**
     * Get AC status renderer
     *
     * @return AcStatusColumn
     * @throws LocalizedException
     */
    private function getAcStatusRenderer(): AcStatusColumn
    {
        if (!$this->acStatusRenderer) {
            /** @var AcStatusColumn $block */
            $block = $this->getLayout()->createBlock(
                AcStatusColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
            $this->acStatusRenderer = $block;
        }
        return $this->acStatusRenderer;
    }
}
