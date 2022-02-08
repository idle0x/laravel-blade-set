<?php

namespace App\Services;

use App\Models\Article;
use App\Models\User;
use stdClass;

class DashboardService
{
    public function userInfo()
    {
        return (object) [
            'name' => 'Users',
            'count' => User::count()
        ];
    }

    public function articleInfo()
    {
        return (object) [
            'name' => 'Articles',
            'count' => Article::count()
        ];
    }
}
