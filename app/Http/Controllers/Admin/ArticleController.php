<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    private $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $headers = ['id', 'title'];
        $content = $this->repository->getList($headers);

        $headers[] = 'control';

        return view('admin.articles.index', [
            'headers' => $headers,
            'content' => $content->map(fn ($row) => [
                'id' => $row->id,
                'title' => $row->title,
                'control' => [
                    'action' => "/admin/articles/{$row->id}",
                    'name' => "edit",
                ]
            ])
        ]);
    }

    public function edit(Request $request, int $id)
    {
        $article = $this->repository->find($id);
        return view('admin.articles.edit', ['article' => $article]);
    }
}
