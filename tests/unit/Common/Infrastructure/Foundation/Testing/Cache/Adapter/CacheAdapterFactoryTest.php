<?php

namespace App\Tests\Unit\Common\Infrastructure\Foundation\Testing\Cache\Adapter;

use App\Common\Infrastructure\Foundation\Testing\Cache\Adapter\CacheAdapterFactory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Cache\Adapter\TagAwareAdapter;

class CacheAdapterFactoryTest extends TestCase
{
    public function testItCanCreateATagAwareAdapter(): void
    {
        $this->assertInstanceOf(
            TagAwareAdapter::class,
            CacheAdapterFactory::createAdapter()
        );
    }
}
