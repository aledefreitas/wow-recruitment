<?php

namespace App\Controller\Api\V1;

use App\Service\Version\ApiVersionService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Controller for API version.
 */
#[Route('/api/v1/version', name: 'api_v1_version', methods: ['GET'])]
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
