<?php

namespace App\Foundation\Cache;

use App\Foundation\Cache\Contracts\CacheConfigInterface;

final class CacheConfig implements CacheConfigInterface
{
    private const DEFAULT_PARAMS = [
        'cache-host' => null,
        'cache-port' => null,
        'cache-secret' => null,
        'cache-unix-socket' => null,
        'namespace' => null,
        'cache-default-ttl' => null,
    ];

    /**
     * @param array<string, mixed> $params
     */
    public function __construct(
        private array $params = []
    ) {
        $this->params = [
            ...self::DEFAULT_PARAMS,
            ...$params,
        ];
    }

    /**
     * Returns a parameter for this CacheConfig.
     */
    public function getParam(string $key): mixed
    {
        return $this->params[$key] ?? null;
    }
}
