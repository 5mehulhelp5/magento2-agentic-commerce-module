<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\AgenticCommerce\Logger\Handler;

use Magento\Framework\Logger\Handler\Base as BaseHandler;
use Monolog\Logger as MonologLogger;

/**
 * Custom log handler for Agentic Commerce Webhooks
 */
class AgenticCommerceWebhooks extends BaseHandler
{
    /**
     * Logging level for Agentic Commerce Webhooks
     *
     * @var int
     */
    protected $loggerType = MonologLogger::DEBUG;

    /**
     * Log file name for Agentic Commerce Webhooks
     *
     * @var string
     */
    protected $fileName = '/var/log/agentic_commerce_webhooks.log';
}
