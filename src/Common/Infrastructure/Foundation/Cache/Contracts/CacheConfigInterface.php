<?php

namespace App\Common\Infrastructure\Foundation\Cache\Contracts;

interface CacheConfigInterface
{
    public function getParam(string $key): mixed;
}
