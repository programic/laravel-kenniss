<?php

namespace Programic\Kenniss;

use Illuminate\Http\Client\Response;
use Programic\Kenniss\Http\Request;
use Programic\Kenniss\Traits\HasObjectRequests;

class Kenniss
{
    use HasObjectRequests;

    protected Request $http;

    public function __construct(public ?string $url = null)
    {
        $this->http = new Request();
    }

    /**
     * @param array<string, mixed> | null $queryParams
     */
    public function get(?string $url = null, ?array $queryParams = null): Response
    {
        if (!$url) {
            $url = $this->url;
        }

        return $this->http->get($url, $queryParams);
    }

    /**
     * @param array<string, mixed> | null $postParams
     */
    public function post(string $url, array $postParams = []): Response
    {
        return $this->http->post($url, $postParams);
    }

    /**
     * @param array<string, mixed> | null $queryParams
     */
    public function delete(string $url, array $queryParams = []): Response
    {
        return $this->http->delete($url, $queryParams);
    }

    /**
     * @param array<string, mixed> | null $postParams
     */
    public function put(string $url, array $postParams = []): Response
    {
        return $this->http->put($url, $postParams);
    }

    /**
     * @param array<string, mixed> | null $postParams
     */
    public function patch(string $url, array $postParams = []): Response
    {
        return $this->http->patch($url, $postParams);
    }
}
