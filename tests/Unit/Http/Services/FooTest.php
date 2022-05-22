<?php

namespace Unit\Http\Services;

use App\Http\Services\Foo;
use Tests\TestCase;

class FooTest extends TestCase
{
    // numero maior que o limite

    // numero  menor  que o limite e par

    // numero menor que o limite impar

    /** @var Foo */
    private $service;

    public function setUp(): void
    {
        $this->service = new  Foo();
    }

    public function testFooNumberGreaterThanLimit(): void
    {
        $number = 11;
        $limit = 10;

        $response = $this->service->foo1($number, $limit);

        $this->assertEquals("é maior que {$limit}", $response);
    }

    public function testFooLimitGreaterThanLimitAndNumberIsEven(): void
    {
        $number = 2;
        $limit = 10;

        $response = $this->service->foo1($number, $limit);

        $this->assertEquals('o número é par', $response);
    }

    public function testFooLimitGreaterThanLimitAndNumberIsOdd(): void
    {
        $number = 3;
        $limit = 10;

        $response = $this->service->foo1($number, $limit);

        $this->assertEquals('o número é impar', $response);
    }
}
