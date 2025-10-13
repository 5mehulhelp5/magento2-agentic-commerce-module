<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\AgenticCommerce\Controller\Checkout;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Message\ManagerInterface;
use Magento\Checkout\Model\Session;
use Magento\Framework\Controller\Result\Redirect;

class Order implements HttpGetActionInterface
{
    /**
     * @param RedirectFactory $redirectFactory
     * @param OrderRepositoryInterface $orderRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param RequestInterface $request
     * @param ManagerInterface $messageManager
     * @param Session $session
     */
    public function __construct(
        protected readonly RedirectFactory $redirectFactory,
        protected readonly OrderRepositoryInterface $orderRepository,
        protected readonly SearchCriteriaBuilder $searchCriteriaBuilder,
        protected readonly RequestInterface $request,
        protected readonly ManagerInterface $messageManager,
        protected readonly Session $session
    ) {
    }

    /**
     * @return Redirect
     */
    public function execute()
    {
        /** @var Http $request */
        $request = $this->request;
        /** @var string|null $orderId */
        $orderId = $request->getParam('order_id');

        if (!$orderId) {
            $this->messageManager->addErrorMessage((string) __('Missing order ID'));
            return $this->redirectFactory->create()->setPath('/');
        }

        $order = $this->getOrderBySessionId($orderId);

        if (!$order) {
            $this->messageManager->addErrorMessage((string) __('Order not found'));
            return $this->redirectFactory->create()->setPath('/');
        }

        $this->session
            ->setLastQuoteId($order->getQuoteId())
            ->setLastSuccessQuoteId($order->getQuoteId())
            ->setLastOrderId($order->getEntityId())
            ->setLastRealOrderId($order->getIncrementId())
            ->setLastOrderStatus($order->getStatus());

        $redirect = $this->redirectFactory->create();
        $redirect->setPath('checkout/onepage/success');
        return $redirect;
    }

    /**
     * @param string $sessionId
     * @return OrderInterface|null
     */
    protected function getOrderBySessionId(string $sessionId): OrderInterface|null
    {
        $result = $this->orderRepository->getList(
            $this->searchCriteriaBuilder->addFilter('ac_order_id', $sessionId)->create()
        );

        foreach ($result->getItems() as $order) {
            return $order;
        }

        return null;
    }
}
