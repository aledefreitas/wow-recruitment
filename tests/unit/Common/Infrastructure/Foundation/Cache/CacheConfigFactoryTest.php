<?php

namespace App\Tests\Unit\Common\Infrastructure\Foundation\Cache;

use App\Common\Infrastructure\Foundation\Cache\CacheConfigFactory;
use App\Common\Infrastructure\Foundation\Cache\Contracts\CacheConfigInterface;
use PHPUnit\Framework\TestCase;

class CacheConfigFactoryTest extends TestCase
{
    public function testItCreatesACacheConfigInstance(): void
    {
        $this->assertInstanceOf(
            CacheConfigInterface::class,
            CacheConfigFactory::createConfig([])
        );
    }
}
