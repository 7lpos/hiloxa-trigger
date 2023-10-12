<?php

namespace HL\HiloxaTrigger\Validator\Rules;

use Exception;
use HL\HiloxaTrigger\Exceptions\InvalidHiloxaData;

abstract class HiloxaValidationRule
{
    abstract public function isValid(): bool;

    abstract public function problem(): string;


    /**
     * @throws Exception
     */
    public function validate(): void
    {
        if (!$this->isValid()) {

            throw new InvalidHiloxaData($this->problem());
        }
    }
}
