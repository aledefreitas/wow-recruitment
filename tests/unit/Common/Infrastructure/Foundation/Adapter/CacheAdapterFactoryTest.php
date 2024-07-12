<?php

namespace App\Tests\Unit\Common\Infrastructure\Foundation\Cache\Adapter;

use App\Common\Infrastructure\Foundation\Cache\Adapter\CacheAdapterFactory;
use App\Common\Infrastructure\Foundation\Cache\Contracts\Adapter\CacheAdapterFactoryInterface;
use PHPUnit\Framework\TestCase;

class CacheAdapterFactoryTest extends TestCase
{
    /**
     * This assures it creates a TagAwareAdapterInterface implementation
     * Thus, making it compatible with our application implementation of cache.
     */
    public function testItImplementsCacheAdapterContract(): void
    {
        $this->assertInstanceOf(
            CacheAdapterFactoryInterface::class,
            new CacheAdapterFactory()
        );
    }
}
