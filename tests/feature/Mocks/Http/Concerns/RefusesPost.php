<?php

namespace App\Tests\Feature\Mocks\Http\Concerns;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

trait RefusesPost
{
    /**
     * Tests if endpoint refuses POST requests.
     */
    public function testItRefusesPostRequests(): void
    {
        $this->expectException(MethodNotAllowedHttpException::class);
        $this->client->request(Request::METHOD_POST, $this->getEndpoint());
    }
}
