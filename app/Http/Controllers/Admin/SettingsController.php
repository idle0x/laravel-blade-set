<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $content = Setting::paginate(10);

        $headers = [
            [
                'code' => 'id',
                'title' => 'Id',
            ],
            [
                'code' => 'name',
                'title' => 'Name'
            ],
            [
                'code' => 'value',
                'title' => 'Value'
            ],
            [
                'code' => 'user',
                'title' => 'User'
            ],
        ];

        return view('admin.setting.index', [
            'headers' => $headers,
            'content' => $content,
        ]);
    }
}
