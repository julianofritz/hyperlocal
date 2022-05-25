<?php

namespace App\Http\Services;

class Foo
{
    public function foo1(int $number, int $limit)
    {
        if ($number > $limit) {
            return "é maior que {$limit}";
        } else {
            if ($number % 2 == 0) {
                return "o número é par";
            } else {
                return "o número é impar";
            }
        }
    }
}
