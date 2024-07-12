<?php

namespace App\Tests\Unit\Common\Infrastructure\Foundation\Cache;

use App\Common\Infrastructure\Foundation\Cache\CacheConfig;
use App\Common\Infrastructure\Foundation\Cache\Contracts\CacheConfigInterface;
use PHPUnit\Framework\TestCase;

class CacheConfigTest extends TestCase
{
    public function testItImplementsCacheConfigInterfaceContract(): void
    {
        $this->assertInstanceOf(
            CacheConfigInterface::class,
            new CacheConfig()
        );
    }

    public function testItSetsParams(): void
    {
        $cacheConfig = new CacheConfig([
            'cache-host' => 'not_useless',
        ]);

        $this->assertSame(
            'not_useless',
            $cacheConfig->getParam('cache-host')
        );
    }

    public function testItIgnoresUselessParams(): void
    {
        $cacheConfig = new CacheConfig([
            'useless-param' => 'this_is_useless',
        ]);

        $this->assertNull(
            $cacheConfig->getParam('useless-param')
        );
    }
}
