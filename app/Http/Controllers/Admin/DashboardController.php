<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $service;

    public function __construct(DashboardService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.dashboard', [
            'users' => $this->service->userInfo(),
            'articles' => $this->service->articleInfo(),
        ]);
    }
}
