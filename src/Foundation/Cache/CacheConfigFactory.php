<?php

namespace App\Foundation\Cache;

use App\Foundation\Cache\Contracts\CacheConfigInterface;

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
