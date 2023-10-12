<?php

namespace HL\HiloxaTrigger\Exceptions;

use Exception;

class InvalidHiloxaDataClass extends Exception
{
    public static function create(?string $class)
    {
        $message = $class === null
            ? 'Could not create a HiloxaData object, no data class was given'
            : "Could not create a HiloxaData object, `{$class}` does not implement `HiloxaDTO`";

        return new self($message);
    }
}
