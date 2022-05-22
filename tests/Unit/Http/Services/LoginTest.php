<?php

namespace Unit\Http\Services;

use App\Http\Services\Login;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @var Login */
    private $service;

    /** @var UserRepository|\PHPUnit\Framework\MockObject\MockObject  */
    private $mockUserRepository;

    public function setUp(): void
    {
        $this->mockUserRepository = $this->createMock(UserRepository::class);
        $this->service = new Login($this->mockUserRepository);
    }

    public function  testGetUser(): void
    {
        $this->mockUserRepository->method('getUser')
            ->willReturn(['isLogged' => true]);

        $result = $this->service->getUser(123);

        $this->assertTrue($result['isLogged']);
    }

    public function testGetUserNotFind(): void
    {
        $this->mockUserRepository->method('getUser')->willThrowException(new ModelNotFoundException());

        $result = $this->service->getUser(123);

        $this->assertFalse($result['isLogged']);
    }
}
