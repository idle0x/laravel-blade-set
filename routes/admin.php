<?php

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

    Route::get('/articles', function () {
        return view('admin.articles.index');
    })->name('admin.articles');

    Route::get('/articles/authors', function () {
        return view('admin.articles.authors');
    })->name('admin.articles.authors');

    Route::get('/users', function () {
        $users = User::all();
        return view("admin.users.index", ['users' => $users]);
    })->name('admin.users');
});

Route::redirect('/admin', '/admin/dashboard');
