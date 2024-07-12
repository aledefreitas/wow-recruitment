<?php

namespace App\Tests\Feature\Mocks\Http\Concerns;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

trait RefusesPut
{
    /**
     * Tests if endpoint refuses PUT requests.
     */
    public function testItRefusesPutRequests(): void
    {
        $this->expectException(MethodNotAllowedHttpException::class);
        $this->client->request(Request::METHOD_PUT, $this->getEndpoint());
    }
}
