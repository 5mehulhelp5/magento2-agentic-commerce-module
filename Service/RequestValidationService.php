<?php

/**
 * This file is part of the Magebit_AgenticCommerce package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

namespace Magebit\AgenticCommerce\Service;

use Magebit\AgenticCommerce\Api\Data\ValidatableDataInterface;
use Magebit\AgenticCommerce\Api\Data\Response\ErrorResponseInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Magebit\AgenticCommerce\Api\Data\Response\ErrorResponseInterfaceFactory;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Mapping\Loader\StaticMethodLoader;
use Symfony\Component\Validator\Mapping\Factory\LazyLoadingMetadataFactory;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Magebit\AgenticCommerce\Api\Data\Request\RequestInterface;

class RequestValidationService
{
    /**
     * @var ValidatorInterface|null
     */
    protected ?ValidatorInterface $validator = null;

    /**
     * @param ErrorResponseInterfaceFactory $errorResponseFactory
     */
    public function __construct(
        protected readonly ErrorResponseInterfaceFactory $errorResponseFactory,
    ) {
    }

    /**
     * @param RequestInterface $dataClass
     * @return null|ErrorResponseInterface
     */
    public function validate($dataClass): ?ErrorResponseInterface
    {
        if (!($dataClass instanceof ValidatableDataInterface)) {
            return null;
        }

        $errors = $this->getValidator()->validate($dataClass);

        if ($errors->count() > 0) {
            foreach ($errors as $error) {
                return $this->validationErrorToResponse($error);
            }
        }

        return null;
    }

    /**
     * @param ConstraintViolationInterface $error
     * @return ErrorResponseInterface
     */
    protected function validationErrorToResponse(ConstraintViolationInterface $error): ErrorResponseInterface
    {
        return $this->errorResponseFactory->create(['data' => [
            'type' => ErrorResponseInterface::TYPE_INVALID_REQUEST,
            'code' => 'invalid_request',
            'message' => $error->getMessage(),
            'param' => $this->getParamPath($error),
        ]]);
    }

    /**
     * Convert Symfony property path to JSONPath notation
     *
     * Converts "rawData[payment_method][number]" to "payment_method.number"
     * Converts "rawData[items][0][id]" to "items[0].id"
     *
     * @param ConstraintViolationInterface $error
     * @return string
     */
    protected function getParamPath(ConstraintViolationInterface $error): string
    {
        $propertyPath = $error->getPropertyPath();

        $path = preg_replace('/^rawData/', '', $propertyPath);

        // Convert [field] to .field (but keep [0], [1], etc. as array indices)
        $path = preg_replace_callback('/\[([^\]]+)\]/', function ($matches) {
            // If it's a numeric index, keep it as [N]
            if (is_numeric($matches[1])) {
                return '[' . $matches[1] . ']';
            }
            // Otherwise convert to dot notation
            return '.' . $matches[1];
        }, (string) $path);

        $path = ltrim((string) $path, '.');
        return '$.' . $path;
    }

    /**
     * @return ValidatorInterface
     */
    protected function getValidator(): ValidatorInterface
    {
        if (!isset($this->validator)) {
            $loader = new StaticMethodLoader();
            $metadataFactory = new LazyLoadingMetadataFactory($loader);

            $this->validator = Validation::createValidatorBuilder()
                ->setMetadataFactory($metadataFactory)
                ->getValidator();
        }

        return $this->validator;
    }
}
