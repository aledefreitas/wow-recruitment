<?php

namespace App\Tests\Unit\Api\Shared\Application\Services\Version;

use App\Api\Shared\Application\Services\Version\ApiVersionService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ApiVersionServiceTest extends KernelTestCase
{
    private ContainerInterface $container;

    protected function setUp(): void
    {
        $this->container = $this->getContainer();
    }

    public function testItCanBeInstantiated(): void
    {
        $this->assertInstanceOf(
            ApiVersionService::class,
            $this->container->get(ApiVersionService::class)
        );
    }

    public function testItFetchesAppVersionFromConfig(): void
    {
        $service = $this->container->get(ApiVersionService::class);

        $this->assertEquals(
            $this->container->getParameter('app.version'),
            $service->getCurrentApiVersion()
        );
    }
}
