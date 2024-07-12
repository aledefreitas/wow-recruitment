<?php

namespace App\Common\Infrastructure\Foundation\Cache;

use App\Common\Infrastructure\Foundation\Cache\Contracts\CacheConfigInterface;

final class CacheConfigFactory
{
    /**
     * @param array<string, mixed> $params
     */
    public static function createConfig(array $params): CacheConfigInterface
    {
        return new CacheConfig($params);
    }
}
