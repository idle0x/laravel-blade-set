<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $articles = Article::all();
    return view('web.index', ['articles' => $articles]);
});

Route::get('/article/{slug?}', function ($slug=null) {
    $article = Article::where(['slug' => $slug])->firstOrFail();
    return view('web.article.index', ['article' => $article]);

});
