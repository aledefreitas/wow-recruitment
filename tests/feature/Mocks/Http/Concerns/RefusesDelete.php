<?php

namespace App\Tests\Feature\Mocks\Http\Concerns;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

trait RefusesDelete
{
    /**
     * Tests if endpoint refuses DELETE requests.
     */
    public function testItRefusesDeleteRequests(): void
    {
        $this->expectException(MethodNotAllowedHttpException::class);
        $this->client->request(Request::METHOD_DELETE, $this->getEndpoint());
    }
}
