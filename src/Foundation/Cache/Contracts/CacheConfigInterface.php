<?php

namespace App\Foundation\Cache\Contracts;

interface CacheConfigInterface
{
    public function getParam(string $key): mixed;
}
