<?php

namespace Tests\Traits;

use App\Models\User;
use Spatie\Permission\Models\Role;

/**
 * Helper function s for testing users
 */
trait UserTrait
{

    /**
     * Generate user with needed role
     *
     * @param string $userRole
     * @return User
     */
    public function createUser(string $userRole): User
    {
        $role = Role::create(['name' => $userRole]);

        $user = User::factory()->create();
        $user->assignRole($role);

        return $user;
    }
}

