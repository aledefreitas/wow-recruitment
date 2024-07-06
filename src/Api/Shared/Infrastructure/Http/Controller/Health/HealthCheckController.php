<?php

namespace App\Api\Shared\Infrastructure\Http\Controller\Health;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Controller for API Health Check.
 */
#[Route('/health-check', methods: ['GET'])]
final class HealthCheckController
{
    /**
     * Returns the current version of our API.
     */
    public function __invoke(): JsonResponse
    {
        return new JsonResponse(
            [
                'status' => 'OK',
            ]
        );
    }
}
