<?php

namespace App\Services;

class MyOtherService
{
    private $service;

    public function __construct(MyService  $service)
    {
        $this->service = $service;
    }

    public function wrapper(int $number)
    {
        return $this->service->isOdd($number) ? true : false;
    }
}
