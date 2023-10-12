<?php

namespace HL\HiloxaTrigger\Validator;

use HL\HiloxaTrigger\Validator\Rules\HiloxaValidationRule;
use Illuminate\Support\Collection;

class HiloxaValidator
{
    private Collection $rules;

    private Collection $problems;

    public static function instance(): static
    {
        return new static();
    }

    public function __construct()
    {
        $this->rules = collect();
        $this->problems = collect();
    }

    public function addRule(HiloxaValidationRule $rule): self
    {
        $this->rules->push($rule);
        return $this;
    }

    public function getRules(): Collection
    {
        return $this->rules;
    }

    public function getProblems(): Collection
    {
        return $this->problems;
    }

    /**
     * @throws \Exception
     */
    public function validate(): void
    {
        $this->rules->each->validate();
    }

    public function isValid(): bool
    {
        $isValid = true;
        foreach ($this->rules as $rule) {
            if (!$rule->isValid()) {
                $isValid = false;
                $this->problems->push($rule->problem());
            }
        }

        return $isValid;
    }


}
