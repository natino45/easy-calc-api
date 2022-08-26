<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

/**
 * Home screen for api
 */
class CalculatorApiController extends AbstractController
{
    #[Route('/', name: 'api_home')]
    public function index(): JsonResponse
    {
        return $this->json([
            'title' => 'EasyCalc API',
            'version' => "v1.0.1",
            'request_id' => Uuid::v4(),
            'request_timestamp' => time(),
        ]);
    }
}
