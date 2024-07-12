<?php

namespace App\Tests\Feature\Api\Shared\Infrastructure\Http\Controller\Version;

use App\Tests\Feature\Mocks\Http\Concerns\RefusesDelete;
use App\Tests\Feature\Mocks\Http\Concerns\RefusesPatch;
use App\Tests\Feature\Mocks\Http\Concerns\RefusesPost;
use App\Tests\Feature\Mocks\Http\Concerns\RefusesPut;
use App\Tests\Feature\Mocks\Http\EndpointControllerTest;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

final class HealthCheckControllerTest extends EndpointControllerTest
{
    use RefusesPut;
    use RefusesPost;
    use RefusesPatch;
    use RefusesDelete;

    protected ContainerInterface $container;
    protected KernelBrowser $client;

    /**
     * Endpoint to be tested.
     */
    protected function getEndpoint(): string
    {
        return '/api/health-check';
    }

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
     * Tests if endpoint returns a Json as response.
     */
    public function testItReturnsAJsonFormat(): void
    {
        $this->client->request(Request::METHOD_GET, $this->getEndpoint());

        $this->assertResponseIsSuccessful();
        $this->assertResponseFormatSame('json');
    }

    /**
     * Tests if the health check returns a successful response from endpoint.
     */
    public function testApiVersionMatchesWithApplicationVersion(): void
    {
        $this->client->request(Request::METHOD_GET, $this->getEndpoint());

        $this->assertResponseIsSuccessful();
    }
}
