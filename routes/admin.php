<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard', [
            'test_var' => "Test"
        ]);
    })->name('admin.dashboard');

    Route::get('/articles', [ArticleController::class, 'index'])->name('admin.articles');
    Route::get('/articles/{id}', [ArticleController::class, 'edit']);

    // Route::get('/articles/authors', function () {
    //     return view('admin.articles.authors');
    // })->name('admin.articles.authors');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/users/{id}', [UserController::class, 'edit']);
    Route::post('/user/update', function () {
        return "Woo!!";
    })->name('user_update');
});

Route::redirect('/admin', '/admin/dashboard');
