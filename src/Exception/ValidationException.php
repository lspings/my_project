<?php

namespace App\Exception;

use Exception;

class ValidationException extends Exception
{
    private array $errors;

    public function __construct(array $errors)
    {
        parent::__construct('Validation Error');

        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}