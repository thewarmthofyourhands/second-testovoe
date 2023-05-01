<?php

namespace App\Exceptions;

use Exception;

class ValidationException extends Exception
{
    public function __construct(private readonly string $fieldName)
    {
        parent::__construct();
    }

    public function getFieldName(): string
    {
        return $this->fieldName;
    }
}
