<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Circle;
use Symfony\Component\Uid\Uuid;

/**
 * Circle calculator api endpoint controller
 */
class CircleController extends AbstractController
{
    #[Route('/circle/{radius}', name: 'circle', methods: ['GET'])]
    public function index(int|float $radius): JsonResponse
    {
        $circle = new Circle($radius);
        return $this->json([
            'type' => "circle",
            'radius' => $radius,
            'diameter' => $circle->diameter(),
            'surface_area' => $circle->area(),
            'request_id' => Uuid::v4(),
            'request_timestamp' => time(),
        ]);
    }
}
