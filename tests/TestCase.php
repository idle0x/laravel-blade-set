<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Role;
use Tests\Traits\UserTrait;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // Helper traits
    use UserTrait;
}
