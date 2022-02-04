<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;

class HomeController extends Controller
{
    private $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        // $articles = Article::query()-with('user')->toSql();
        // dd($articles);
        $articles = $this->repository->getList([], ['user']);
        return view('web.index', compact('articles'));
    }

    public function pagenotfound()
    {
        return response()->view('web.error', [], 404);
    }
}
