<?php

namespace Unit\Http\Services;


use App\Http\Services\Mockery;
use App\Repositories\TabRepository;
use Tests\TestCase;

class MockeryTest extends TestCase
{
    /** @var TabRepository|\PHPUnit\Framework\MockObject\MockObject  */
    private $mockTabRepository;

    public function setUp(): void
    {
        $this->mockTabRepository = $this->createMock(TabRepository::class);
    }

    public function testGetTabFeesOnPartner()
    {
        $this->mockTabRepository->method('getTab')->willReturn([
            'partner_id' => 420
        ]);

        $service = \Mockery::mock(Mockery::class, [$this->mockTabRepository])->makePartial();
        $service->shouldReceive('tabFeesOnPartner')->andReturn([
            'mastercard' => 2,
            'visa' => 1,
        ]);

        $result = $service->getTabFeesOnPartner(123);

        $this->assertIsArray($result);
    }
}
