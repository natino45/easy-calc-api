<?php

namespace App\Service;

use App\Entity\Circle;
use App\Entity\Triangle;

/**
 * Geometry Calculator 
 */
class GeometryCalculator
{
    /**
     * Get sum of two areas
     *
     * @param  mixed $first_geom
     * @param  mixed $second_geom
     * @return float
     */
    public function getAreaSum(Triangle|Circle $first_geom, Triangle|Circle $second_geom): float
    {
        $sum_area = $first_geom->area() + $second_geom->area();
        return round($sum_area, 2);
    }

    /**
     * get sum of diameter of two circles
     *
     * @param  mixed $first_geom
     * @param  mixed $second_geom
     * @return float
     */
    public function getDiameterSum(Circle $first_geom, Circle $second_geom): float
    {
        $sum_diameter = $first_geom->diameter() + $second_geom->diameter();
        return round($sum_diameter, 2);
    }
}
