<?php

namespace App\Service;

use phpDocumentor\Reflection\Types\Float_;

class EssaiService
{
    public function plus(float $value1, float $value2): float
    {
        return $value1 + $value2;
    }
}