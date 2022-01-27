<?php

namespace Tests\Unit;

use App\Services\MyService;
use PHPUnit\Framework\TestCase;

class MyServiceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_isOdd_with_odd()
    {
        $service = new MyService();
        $this->assertTrue($service->isOdd(2));
    }

    public function test_isOdd_not_odd()
    {
        $service = new MyService();
        $this->assertFalse($service->isOdd(3));
    }
}
