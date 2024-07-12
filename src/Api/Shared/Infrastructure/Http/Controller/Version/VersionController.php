<?php

namespace App\Api\Shared\Infrastructure\Http\Controller\Version;

use App\Api\Shared\Application\Services\Version\ApiVersionService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Controller for API version.
 */
#[Route('/version', name: 'api_version', methods: ['GET'])]
final class VersionController
{
    public function __construct(
        private readonly ApiVersionService $apiVersionService
    ) {
    }

    /**
     * Returns the current version of our API.
     */
    public function __invoke(): JsonResponse
    {
        return new JsonResponse(
            [
                'version' => $this->apiVersionService->getCurrentApiVersion(),
            ]
        );
    }
}
