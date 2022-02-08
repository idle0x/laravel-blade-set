<?php

namespace Tests\Feature;

use App\Services\MyOtherService;
use App\Services\MyService;
use Tests\TestCase;

class MyOtherServiceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_wrapper()
    {
        // $this->mock(MyService::class, function ($mock) {
        //     $mock->shouldReceive('isOdd')->andReturn(true);
        // });
        $service = app(MyOtherService::class);
        $this->assertTrue($service->wrapper(2));
        $this->assertFalse($service->wrapper(3));
    }

}
