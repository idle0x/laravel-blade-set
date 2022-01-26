<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use App\Models\User;

class UserController extends Controller
{
    private $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $users = User::all();

        $headers = ['id', 'name'];

        $headers[] = 'control';

        return view('admin.users.index', [
            'headers' => $headers,
            'content' => $users->map(fn ($row) => [
                'id' => $row->id,
                'name' => $row->name,
                'control' => [
                    'action' => "/admin/users/{$row->id}",
                    'name' => "edit",
                ]
            ])
        ]);
    }

    public function edit(Request $request, int $id)
    {
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user]);
    }
}
