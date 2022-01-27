<?php

namespace App\Services;

class MyService
{
    public function isOdd(int $number)
    {
        return $number % 2 == 0;
    }
}
