<?php

namespace Programic\Kenniss\Http;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Request
{
    protected PendingRequest $http;

    public function __construct()
    {
        $this->http = Http::kenniss()
            ->acceptJson()
            ->withOptions(['verify' => false]);
    }

    /**
     * @param array<string, mixed> | null $queryParams
     */
    public function get(string $url, array | null $queryParams = []): Response
    {
        return $this->http->get($url, $queryParams);
    }

    /**
     * @param array<string, mixed> | null $bodyParams
     */
    public function post(string $url, array $bodyParams): Response
    {
        return $this->http->post($url, $bodyParams);
    }

    /**
     * @param array<string, mixed> | null $bodyParams
     */
    public function put(string $url, array $bodyParams): Response
    {
        $bodyParams['_method'] = 'PUT';

        return $this->http->post($url, $bodyParams);
    }

    /**
     * @param array<string, mixed> | null $bodyParams
     */
    public function patch(string $url, array $bodyParams): Response
    {
        $bodyParams['_method'] = 'PATCH';

        return $this->http->patch($url, $bodyParams);
    }

    /**
     * @param array<string, mixed> | null $queryParams
     */
    public function delete(string $url, array $queryParams = []): Response
    {
        return $this->http->delete($url, $queryParams);
    }
}
