<?php

namespace Unit\Http\Services;

use App\Http\Services\Foo;
use App\Http\Services\StaticClass;
use App\Models\User;
use App\Repositories\UserRepository;
use Tests\TestCase;

class StaticClassTest extends TestCase
{
    public function testOne(): void
    {
        $user = User::make([
            'name' => 'Juliano',
            'lastName' => 'Basso'
        ]);

        $result = StaticClass::getUserFullName($user);

        $this->assertEquals('Juliano Basso', $result);
    }

    public function testTwo(): void
    {
        $mockRepository = $this->createMock(UserRepository::class);
        $mockRepository->method('getuser')->willReturn([
            'document' => '01862245898'
        ]);

        $result = StaticClass::getUserDocumentById($mockRepository,12);

        $this->assertEquals('01862245898', $result);
    }
}
