<?php

namespace App\Foundation\Cache\Contracts\Adapter;

use App\Foundation\Cache\Contracts\CacheConfigInterface;
use Symfony\Component\Cache\Adapter\TagAwareAdapterInterface;

interface CacheAdapterFactoryInterface
{
    public static function createAdapter(string $namespace, CacheConfigInterface $config): TagAwareAdapterInterface;
}
