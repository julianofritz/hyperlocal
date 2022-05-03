<?php

namespace Tests\Unit\Http\Services;

use App\Http\Services\FeesCalculateService;
use Tests\TestCase;

class FeesCalculateServiceTest extends TestCase
{
    /** @var FeesCalculateService */
    private $service;

    public function setUp(): void
    {
        $this->service = new FeesCalculateService();
    }

    /** @dataProvider calculatePercentageProvider */
    public function testCalculateFees(
        float $feeAmount,
        float $productValue,
        string $feeType,
        float $expected
    ): void {
        $response = $this->service->calculate($feeAmount, $productValue, $feeType);

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
