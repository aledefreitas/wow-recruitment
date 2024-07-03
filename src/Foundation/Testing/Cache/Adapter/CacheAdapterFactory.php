<?php

namespace App\Foundation\Testing\Cache\Adapter;

use Symfony\Component\Cache\Adapter\NullAdapter;
use Symfony\Component\Cache\Adapter\TagAwareAdapter;
use Symfony\Component\Cache\Adapter\TagAwareAdapterInterface;

final class CacheAdapterFactory
{
    /**
     * Creates an instance of cache for testing.
     */
    public static function createAdapter(): TagAwareAdapterInterface
    {
        return new TagAwareAdapter(
            new NullAdapter()
        );
    }
}
