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

    public function get(?string $url = null, ?array $queryParams = null): Response
    {
        if (!$url) {
            $url = $this->url;
        }

        return $this->http->get($url, $queryParams);
    }

    public function post(string $url, array $postParams = []): Response
    {
        return $this->http->post($url, $postParams);
    }

    public function delete(string $url, array $queryParams = []): Response
    {
        return $this->http->delete($url, $queryParams);
    }

    public function put(string $url, array $postParams = []): Response
    {
        return $this->http->put($url, $postParams);
    }
}
