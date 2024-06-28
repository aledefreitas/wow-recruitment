<?php

namespace App\Controller\Api\V1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Version Controller
 */
#[Route('/api/v1')]
final class VersionController extends AbstractController
{
    #[Route('/version')]
    public function index(): JsonResponse
    {
        return new JsonResponse(
            [
                'version' => '1.0.0'
            ]
        );
    }
}
