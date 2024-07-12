<?php

namespace App\Common\Infrastructure\Foundation\Cache;

use App\Common\Infrastructure\Foundation\Cache\Contracts\CacheConfigInterface;

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
            ...array_intersect_key($params, self::DEFAULT_PARAMS),
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
