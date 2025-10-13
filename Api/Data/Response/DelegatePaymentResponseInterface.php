<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\AgenticCommerce\Api\Data\Response;

/**
 * Delegate Payment Response interface for OpenAI Agentic Commerce
 *
 * Represents the success response returned by the PSP after delegating a payment,
 * containing the vault token identifier and metadata for transaction correlation
 */
interface DelegatePaymentResponseInterface
{
    /**
     * Get vault token identifier
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Set vault token identifier
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self;

    /**
     * Get creation time (RFC 3339)
     *
     * @return string
     */
    public function getCreated(): string;

    /**
     * Set creation time (RFC 3339)
     *
     * @param string $created
     * @return $this
     */
    public function setCreated(string $created): self;

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
