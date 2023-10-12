<?php

namespace HL\HiloxaTrigger\Clients;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

abstract class HiloxaClient
{
    private PendingRequest $request;
    protected array $headers = [];

    public function __construct()
    {
        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . config('hiloxa-trigger.api_key'),
        ];

        $this->request = Http::baseUrl(config('hiloxa-trigger.base_url'))->withHeaders($this->headers);
    }

    public function post($url, array $data): \Illuminate\Support\Collection
    {
        $response = $this->request->post($url, $data);
        if (!$response->ok()) {
            Log::critical('hiloxa trigger', $response->json());
        }
        return $response->collect();
    }

    public function get($url, array $data): \Illuminate\Support\Collection
    {
        $response = $this->request->get($url, $data);
        return $response->collect();
    }

    public function withHeaders(array $headers): static
    {
        $this->headers += $headers;
        return $this;
    }

}
