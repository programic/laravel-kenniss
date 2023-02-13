<?php

namespace Programic\Kenniss\Traits;

use Programic\Kenniss\Http\ObjectRequest;

trait HasObjectRequests
{
    public function users(): ObjectRequest
    {
        return new ObjectRequest($this, '/users');
    }

    public function documents(int $userId): ObjectRequest
    {
        return new ObjectRequest($this, "/users/{$userId}/documents");
    }
}
