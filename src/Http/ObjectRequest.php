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
        public string $url,
    ) {
        //
    }

    /**
     * @param array<mixed, mixed> | null $arguments
     */
    public function __call(string $method, array $arguments): Response
    {
        $arguments = array_merge($arguments, [
            'url' => $this->url,
        ]);

        return $this->request->{$method}(...$arguments);
    }

    public function find(int $id): Response
    {
        $url = "{$this->url}/{$id}";

        return $this->request->get($url);
    }

    /**
     * @param array<string, mixed> $data
     */
    public function create(array $data): Response
    {
        return $this->request->post($this->url, $data);
    }

    /**
     * @param array<string, mixed> $data
     */
    public function update(int $id, array $data): Response
    {
        $url = "{$this->url}/{$id}";

        return $this->request->patch($url, $data);
    }

    public function delete(int $id): Response
    {
        $url = "{$this->url}/{$id}";

        return $this->request->delete($url);
    }
}
