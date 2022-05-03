<?php

namespace App\Http\Helpers;

class FeesCalculateHelper
{
    public static function calculate(float $feeAmount, float $productValue, string $feeType = '%'): float
    {
        if ($feeType === '%') {
            return (abs($productValue) * abs($feeAmount))/100;
        }

        return abs($feeAmount);
    }
}
