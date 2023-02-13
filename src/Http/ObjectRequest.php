<?php

namespace Programic\Kenniss\Http;

use Illuminate\Http\Client\Response;
use Programic\Kenniss\Kenniss;

/**
 * @mixin Kenniss
 */
readonly class ObjectRequest
{
    public function __construct(
        public Kenniss $request,
        public string  $url,
    ) {
        //
    }

    public function find(int $id): Response
    {
        $url = "{$this->url}/{$id}";

        return $this->request->get($url);
    }

    public function create(array $data): Response
    {
        return $this->request->post($this->url, $data);
    }

    public function update(int $id, array $data): Response
    {
        $url = "{$this->url}/{$id}";

        return $this->request->post($url, $data);
    }

    public function delete(int $id): Response
    {
        $url = "{$this->url}/{$id}";

        return $this->request->delete($url);
    }

    public function __call($method, $arguments): Response
    {
        $arguments = array_merge($arguments, [
            'url' => $this->url,
        ]);

        return $this->request->{$method}(...$arguments);
    }
}
