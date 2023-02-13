<?php

namespace Programic\Kenniss\Http;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Request
{
    protected PendingRequest $http;

    public function __construct() {
        $this->http = Http::kenniss()
            ->acceptJson()
            ->withOptions(['verify' => false]);
    }

    public function get(string $url, array | null $queryParams = []): Response
    {
        return $this->http->get($url, $queryParams);
    }

    public function post(string $url, array $bodyParams = []): Response
    {
        return $this->http->post($url, $bodyParams);
    }

    public function put(string $url, array $bodyParams = []): Response
    {
        return $this->http->put($url, $bodyParams);
    }

    public function delete(string $url, array $queryParams = []): Response
    {
        return $this->http->delete($url, $queryParams);
    }
}
