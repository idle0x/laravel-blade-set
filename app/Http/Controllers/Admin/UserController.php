<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Models\User;

class UserController extends Controller
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $users = $this->repository->getList(['paginate'=>$this->getPaginate()]);

        $headers = [
            [
                'code' => 'id',
                'title' => 'Id',
            ],
            [
                'code' => 'fullName',
                'title' => 'Name'
            ]
        ];


        return view('admin.users.index', [
            'headers' => $headers,
            'content' => $users,
            'actions' => [
                [
                    'title' => 'Edit',
                    'route' => [
                        'name' => 'user.edit',
                        'var' => 'user',
                        'val' => 'id',
                    ]
                ]
            ]
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.articles.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(ArticleRequest $request)
    // {
    //     User::create($request->validated());
    //     return redirect()->route('admin.users')
    //         ->with('success', 'New user created!');
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    // public function show(Article $article)
    // {
    //     return view('admin.articles.show', compact('article'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('admin.user')
            ->with('success', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Article $article)
    // {
    //     //
    // }
}
