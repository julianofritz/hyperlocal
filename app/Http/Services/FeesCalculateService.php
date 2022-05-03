<?php

namespace App\Http\Services;

class FeesCalculateService
{
    public function calculate(float $feeAmount, float $productValue, string $feeType = '%'): float
    {
        if ($feeType === '%') {
            return (abs($productValue) * abs($feeAmount))/100;
        }

        return abs($feeAmount);
    }
}
