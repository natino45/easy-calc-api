<?php

namespace App\Entity;

/**
 * Triangle Entity to return results for calculations
 */
class Triangle
{
    private $sideA;
    private $sideB;
    private $sideC;

    public function __construct($a, $b, $c)
    {
        $this->sideA = $a;
        $this->sideB = $b;
        $this->sideC = $c;
    }

    /**
     * Check if Triangle is valid
     *
     * @return void
     */
    public function isValid()
    {
        if (
            $this->sideA + $this->sideB <= $this->sideC ||
            $this->sideA + $this->sideC <= $this->sideB ||
            $this->sideB + $this->sideC <= $this->sideA
        ) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * area
     *
     * @return float
     */
    public function area(): float
    {
        $semi_perimeter = $this->perimeter() / 2;

        $heron = $semi_perimeter * ($semi_perimeter - $this->sideA) * ($semi_perimeter - $this->sideB) * ($semi_perimeter - $this->sideC);
        $area = sqrt($heron); // Heron's formula. 
        return round($area, 2);
    }

    /**
     * perimeter of triangle
     *
     * @return float
     */
    public function perimeter(): float
    {
        $p = $this->sideA + $this->sideB + $this->sideC;
        return round($p, 2);
    }

    /**
     * sideType
     *
     * @return string
     */
    public function sideType(): string
    {
        if ($this->sideA == $this->sideB && $this->sideB == $this->sideC) {
            return "Equalateral";
        } else if ($this->sideA == $this->sideB || $this->sideB == $this->sideC) {
            return "Isosceles";
        } else {
            return "Scalene";
        }
    }

    /**
     * angleType
     *
     * @return string
     */
    public function angleType(): string
    {
        if ($this->sideA + $this->sideB > $this->sideC) {
            return "Acute";
        } elseif ($this->sideA + $this->sideB == $this->sideC) { // pythagoras
            return "Right";
        } else {
            return "Obtuse";
        }
    }

    /**
     * height
     *
     * @return float
     */
    public function height(): float
    {
        $area = $this->area();
        if ($area == 0) {
            return 0;
        }
        $base = $this->sideC;
        $height = 2 * $area / $base;
        return round($height, 2);
    }
}
