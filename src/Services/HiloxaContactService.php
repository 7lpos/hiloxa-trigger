<?php

namespace HL\HiloxaTrigger\Services;

use HL\HiloxaTrigger\Clients\ContactRequest;
use HL\HiloxaTrigger\Clients\HiloxaClient;
use HL\HiloxaTrigger\Validator\HiloxaValidator;
use HL\HiloxaTrigger\Validator\Rules\HasPhoneOrEmail;

class HiloxaContactService
{
    private ContactRequest $contact;

    public function __construct()
    {
        $this->contact = new ContactRequest();
    }

    /**
     * @throws \Exception
     */
    public function sendDataToHiloxa(array $data)
    {
        HiloxaValidator::instance()
            ->addRule(new HasPhoneOrEmail($data))
            ->validate();
        return $this->contact->create($data);
    }
}
