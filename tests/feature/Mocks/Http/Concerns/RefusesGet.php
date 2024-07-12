<?php

namespace App\Tests\Feature\Mocks\Http\Concerns;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

trait RefusesGet
{
    /**
     * Tests if endpoint refuses GET requests.
     */
    public function testItRefusesGetRequests(): void
    {
        $this->expectException(MethodNotAllowedHttpException::class);
        $this->client->request(Request::METHOD_GET, $this->getEndpoint());
    }
}
