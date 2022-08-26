<?php

namespace App\Entity;

/**
 * Circle (perform various calculations on a circle)
 */
class Circle
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius  = $radius;
    }

    /**
     * diameter
     *
     * @return float
     */
    public function diameter(): float
    {
        $diameter = 2 * $this->radius;
        return round($diameter, 2);
    }

    /**
     * circumference
     *
     * @return float
     */
    /**
     * circumference
     *
     * @return float
     */
    public function circumference(): float
    {
        $circumference = 2 * pi() * $this->radius;
        return round($circumference, 2);
    }

    public function area(): float
    {
        $area = pi() * pow($this->radius, 2);
        return round($area, 2);
    }
}
