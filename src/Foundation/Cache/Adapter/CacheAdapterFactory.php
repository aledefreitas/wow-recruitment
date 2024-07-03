<?php

namespace App\Foundation\Cache\Adapter;

use App\Foundation\Cache\Contracts\Adapter\CacheAdapterFactoryInterface;
use App\Foundation\Cache\Contracts\CacheConfigInterface;
use Symfony\Component\Cache\Adapter\RedisAdapter;
use Symfony\Component\Cache\Adapter\RedisTagAwareAdapter;
use Symfony\Component\Cache\Adapter\TagAwareAdapterInterface;

final class CacheAdapterFactory implements CacheAdapterFactoryInterface
{
    /**
     * Creates a dynamic instance of cache.
     */
    public static function createAdapter(string $namespace, CacheConfigInterface $config): TagAwareAdapterInterface
    {
        $redisClient = RedisAdapter::createConnection(
            static::buildDsnString(
                host: $config->getParam('cache-host'),
                secret: $config->getParam('cache-secret'),
                unixSocket: $config->getParam('cache-unix-socket'),
                port: $config->getParam('cache-port')
            )
        );

        return new RedisTagAwareAdapter(
            $redisClient,
            $namespace,
            $config->getParam('cache-default-ttl'),
        );
    }

    /**
     * Dynamically builds the DSN string to connect to redis.
     */
    private static function buildDsnString(
        string $host,
        ?string $secret,
        ?string $unixSocket,
        int $port = 6379
    ): ?string {
        $multipleHosts = explode(',', $host);
        $secret = $secret ? $secret . '@' : $secret;

        return match (true) {
            1 < count($multipleHosts) => '',
            $unixSocket || $host => 'redis://' . $secret . match (true) {
                $unixSocket => $unixSocket,
                default => $host . ':' . $port,
            },
            default => null
        };
    }
}
