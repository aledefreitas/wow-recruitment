<?php

namespace App\Service\Version;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

final class ApiVersionService
{
    public function __construct(
        private readonly CacheInterface $cache,
        private readonly ParameterBagInterface $containerParams
    ) {
    }

    public function getCurrentApiVersion(): string
    {
        return $this->cache->get('service.api.version', function (ItemInterface $item): string {
            $item->tag(['api', 'version']);

            return $this->containerParams->get('app.version');
        });
    }
}
