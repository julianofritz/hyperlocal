<?php

namespace App\Http\Services;

class RefactorFoo
{
    public function foo(int $number, int $limit): string
    {
        if ($this->checkNumberGreaterThen($number, $limit)) {
            return "é maior que {$limit}";
        }

        if ($this->checkNumberIsEven($number)) {
            return "O número é par";
        }

        return "O número é impar";
    }

    private function checkNumberIsEven($number): bool
    {
        if ($number % 2 == 0) {
            return true;
        }

        return false;
    }

    private function checkNumberGreaterThen(int $number, int $limit): bool
    {
        if ($number > $limit) {
            return true;
        }

        return false;
    }
}
