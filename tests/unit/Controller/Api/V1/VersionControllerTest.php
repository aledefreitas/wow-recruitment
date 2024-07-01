<?php

namespace App\Tests\Controller\Api\V1;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

final class VersionControllerTest extends WebTestCase
{
    protected ContainerInterface $container;

    protected KernelBrowser $client;

    /**
     * Set-up for this test.
     */
    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->client->catchExceptions(false);
        $this->container = $this->client->getContainer();
    }

    /**
     * Tests if `/api/v1/version` refuses POST requests.
     */
    public function testItRefusesPostRequests(): void
    {
        $this->expectException(MethodNotAllowedHttpException::class);
        $this->client->request(Request::METHOD_POST, '/api/v1/version');
    }

    /**
     * Tests if `/api/v1/version` refuses PATCH requests.
     */
    public function testItRefusesPatchRequests(): void
    {
        $this->expectException(MethodNotAllowedHttpException::class);
        $this->client->request(Request::METHOD_PATCH, '/api/v1/version');
    }

    /**
     * Tests if `/api/v1/version` refuses DELETE requests.
     */
    public function testItRefusesDeleteRequests(): void
    {
        $this->expectException(MethodNotAllowedHttpException::class);
        $this->client->request(Request::METHOD_DELETE, '/api/v1/version');
    }

    /**
     * Tests if `/api/v1/version` refuses PUT requests.
     */
    public function testItRefusesPutRequests(): void
    {
        $this->expectException(MethodNotAllowedHttpException::class);
        $this->client->request(Request::METHOD_PUT, '/api/v1/version');
    }

    /**
     * Tests if `/api/v1/version` returns a Json as response.
     */
    public function testItReturnsAJsonFormat(): void
    {
        $this->client->request(Request::METHOD_GET, '/api/v1/version');

        $this->assertResponseIsSuccessful();
        $this->assertResponseFormatSame('json');
    }

    /**
     * Tests if the api version from endpoint /api/v1/version matches configured
     * version in `app.version`.
     */
    public function testApiVersionMatchesWithApplicationVersion(): void
    {
        $this->client->request(Request::METHOD_GET, '/api/v1/version');

        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonString(
            json_encode(
                [
                    'version' => $this->container->getParameter('app.version') . 1,
                ]
            ),
            $this->client->getResponse()->getContent()
        );
    }
}
