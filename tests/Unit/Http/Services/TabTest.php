<?php

namespace Unit\Http\Services;

use App\Http\Services\Login;
use App\Http\Services\Tab;
use App\Repositories\TabRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tests\TestCase;

class TabTest extends TestCase
{
    /** @var Tab */
    private $service;

    /** @var UserRepository|\PHPUnit\Framework\MockObject\MockObject  */
    private $mockTabRepository;

    public function setUp(): void
    {
        $this->mockTabRepository = $this->createMock(TabRepository::class);
        $this->service = new Tab($this->mockTabRepository);
    }

    public function testGetTab(): void
    {
        $this->mockTabRepository->method('getTab')
            ->willReturn(['value' => 200]);

        $result = $this->service->getTab(123);

        $this->assertEquals(200 ,$result['value']);
    }

    public function testGeTabThrowException(): void
    {
        $this->mockTabRepository->method('getTab')
            ->willThrowException(new ModelNotFoundException());

        $this->expectException(ModelNotFoundException::class);

        $this->service->getTab(123);
    }
}
