<?php

namespace HL\HiloxaTrigger\Validator\Rules;

use Illuminate\Support\Arr;

class HasPhoneOrEmail extends HiloxaValidationRule
{
    public function __construct(protected array $data)
    {
    }

    public function isValid(): bool
    {
        return Arr::hasAny($this->data, [
            'phone',
            'email'
        ]);
    }

    public function problem(): string
    {
        return 'Hiloxa data must have phone or email';
    }

}
