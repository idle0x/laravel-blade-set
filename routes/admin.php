<?php

use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UploadController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

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


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/search', [SearchController::class, 'index'])->name('admin.search');

    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.setting');

    // Route::get('/articles', [ArticleController::class, 'index'])->name('admin.articles');
    // Route::get('/articles/create', [ArticleController::class, 'create'])->name('article.create');
    // Route::get('/articles/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    // Route::post('/articles/store', [ArticleController::class, 'store'])->name('article.store');
    // Route::post('/articles/update', [ArticleController::class, 'update'])->name('article.update');


    Route::resource('article', 'Admin\ArticleController', [
        'names' => [
            'index' => 'admin.article',
        ],
        ''
    ])->middleware('role:admin');

    Route::resource('category', 'Admin\CategoryController', [
        'names' => [
            'index' => 'admin.category',
        ],
        ''
    ])->middleware('role:admin');


    Route::resource('category', 'Admin\CategoryController', [
        'names' => [
            'index' => 'admin.category',
        ]
    ]);

    Route::resource('user', 'Admin\UserController', [
        'names' => [
            'index' => 'admin.user',
        ]
    ])->only(['index', 'edit', 'update']);

    Route::post('/admin/upload/file', [UploadController::class, 'uploadImage'])->name('ckeditor.upload');
    Route::post('/admin/upload/url', [UploadController::class, 'url'])->name('upload-image-by-url');
    // Route::get('fetch/url', EditorJsLinkController::class . '@fetch')->name('editor-js-fetch-url');

    Route::redirect('/admin', '/admin/dashboard');
});

