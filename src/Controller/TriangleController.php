<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;
use App\Entity\Triangle;

/**
 * Triangle calculator endpoint calculator
 */
class TriangleController extends AbstractController
{
    #[Route('/triangle/{a}/{b}/{c}', name: 'triangle', methods: ['GET'])]
    public function index(int|float $a, int|float $b, int|float $c): JsonResponse
    {
        $triangle = new Triangle($a, $b, $c);
        if ($triangle->isValid() == false) {
            return  $this->json([
                'type' => "triangle",
                'message' => "Invalid Triangle Sides",
                'side_a' => $a,
                'side_b' => $b,
                'side_c' => $c,
                'request_id' => Uuid::v4(),
                'request_timestamp' => time(),
            ]);
        }

        return $this->json([
            'type' => "triangle",
            'message' => "Valid Triangle",
            'side_a' => $a,
            'side_b' => $b,
            'side_c' => $c,
            'side_type' => $triangle->sideType(),
            'angle_type' => $triangle->angleType(),
            'perimeter' => $triangle->perimeter(),
            'height' => $triangle->height(),
            'area' => $triangle->area(),
            'request_id' => Uuid::v4(),
            'request_timestamp' => time(),
        ]);
    }
}
