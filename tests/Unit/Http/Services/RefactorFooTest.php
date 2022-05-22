<?php

namespace Unit\Http\Services;

use App\Http\Services\RefactorFoo;
use Tests\TestCase;

class RefactorFooTest extends TestCase
{
    /** @var RefactorFoo */
    private $service;

    public function setUp(): void
    {
        $this->service =  new RefactorFoo();
    }

    public function testLoadClass()
    {
        $this->assertInstanceOf(RefactorFoo::class, $this->service);
    }

    /**
     * @dataProvider numberProvider
     */
    public function testCheckNumberIsEven(int $number, bool $expected)
    {
        $result  = $this->turnPrivateMethodAcessible('checkNumberIsEven', [$number]);

        $this->assertEquals($expected, $result);
    }

    public function numberProvider(): array
    {
        return [
            [1,  false],
            [2, true],
            [0, true],
            [-2, true]
        ];
    }

    /**
     * @dataProvider greaterThanProvider
     */
    public function testCheckNumberGreaterThen(int $number, int $limit, bool $expected): void
    {
        $result  = $this->turnPrivateMethodAcessible('checkNumberGreaterThen', [$number, $limit]);

        $this->assertEquals($expected, $result);
    }

    public function greaterThanProvider(): array
    {
        return [
            [1,2, false],
            [2,1, true],
            [0, -1, true],
            [-3, 1, false]
        ];
    }

    /**
     * @dataProvider fooProvider
     */
    public function testFoo(int $number, int $limit, string $expected): void
    {
        $result = $this->service->foo($number, $limit);

        $this->assertEquals($expected, $result);
    }

    public function fooProvider(): array
    {
        return [
            [2, 1, "é maior que 1"],
            [2, 4, "O número é par"],
            [1, 4, "O número é impar"],
        ];
    }

    /**
     * @param string $methodName
     * @param array $parameters
     * @return mixed
     * @throws \ReflectionException
     */
    private function turnPrivateMethodAcessible(string $methodName, array $parameters)
    {
        $class = new \ReflectionClass(get_class($this->service));
        $method = $class->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($this->service, $parameters);
    }
}
