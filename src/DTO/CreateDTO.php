<?php

namespace HL\HiloxaTrigger\DTO;

use Illuminate\Support\Str;

class CreateDTO extends HiloxaDTO
{

    public function toArray(): array
    {

        return array_filter([
            "email" => (string)$this->model?->email,
            "phone" => (string)$this->model?->phone,
            "firstName" => $this->model?->firstName,
            "lastName" => $this->model?->lastName,
            "name" => $this->model?->name,
            "dateOfBirth" => $this->model?->dateOfBirth,
            "address1" => $this->model?->address1,
            "address2" => $this->model?->address2,
            "city" => $this->model?->city,
            "state" => $this->model?->state,
            "country" => $this->model?->country,
            "postalCode" => $this->model?->postalCode,
            "companyName" => $this->model?->companyName,
            "website" => $this->model?->website,
            "tags" => array_merge((array)$this->model?->tags, [$this->model?->getTable(), 'from ' . config('hiloxa-trigger.from')]),
            "source" => "from " . config('hiloxa-trigger.from'),
            "customField" => [
                "__custom_field_id__" => $this->model?->customField
            ],
        ]);
    }
}
