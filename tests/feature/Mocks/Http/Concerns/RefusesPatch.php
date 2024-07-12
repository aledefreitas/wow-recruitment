<?php

namespace App\Tests\Feature\Mocks\Http\Concerns;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

trait RefusesPatch
{
    /**
     * Tests if endpoint refuses PATCH requests.
     */
    public function testItRefusesPatchRequests(): void
    {
        $this->expectException(MethodNotAllowedHttpException::class);
        $this->client->request(Request::METHOD_PATCH, $this->getEndpoint());
    }
}
