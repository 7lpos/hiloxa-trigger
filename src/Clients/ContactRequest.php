<?php

namespace HL\HiloxaTrigger\Clients;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ContactRequest extends HiloxaClient
{
    public function getAll(array $query = []): Collection
    {
        return $this->get("/contacts", $query);
    }

    public function create(array $data): Collection
    {
        return $this->post("/contacts", $data);
    }

}
