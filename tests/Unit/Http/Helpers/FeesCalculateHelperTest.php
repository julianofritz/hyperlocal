<?php

namespace Tests\Unit\Http\Helpers;

use App\Http\Helpers\FeesCalculateHelper;
use Tests\TestCase;

class FeesCalculateHelperTest extends TestCase
{
    /** @dataProvider calculatePercentageProvider */
    public function testCalculateFees(
        float $feeAmount,
        float $productValue,
        string $feeType,
        float $expected
    ): void {
        $response = FeesCalculateHelper::calculate($feeAmount, $productValue, $feeType);

        $this->assertGreaterThan(0, $response);
        $this->assertEquals($expected, $response);
        $this->assertIsFloat($response);
    }

    public function calculatePercentageProvider(): array
    {
        return [
            [5, 100, '%', 5],
            [2.7, 90, '%', 2.43],
            [-5, 100, '%', 5],
            [-5, -100, '%', 5],
            [5, -100, '%', 5],
            [91, 85, '$', 91],
            [-10, 60, '$', 10],
            [-10, -60, '$', 10],
            [10, -60, '$', 10],
        ];
    }
}
