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
 * Risk Signal interface for delegated payment
 */
interface RiskSignalInterface
{
    public const TYPE_CARD_TESTING = 'card_testing';
    public const ACTION_BLOCKED = 'blocked';
    public const ACTION_MANUAL_REVIEW = 'manual_review';
    public const ACTION_AUTHORIZED = 'authorized';

    /**
     * Get risk signal type
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Set risk signal type
     *
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self;

    /**
     * Get risk score
     *
     * @return int
     */
    public function getScore(): int;

    /**
     * Set risk score
     *
     * @param int $score
     * @return $this
     */
    public function setScore(int $score): self;

    /**
     * Get action taken
     *
     * @return string
     */
    public function getAction(): string;

    /**
     * Set action taken
     *
     * @param string $action
     * @return $this
     */
    public function setAction(string $action): self;
}
