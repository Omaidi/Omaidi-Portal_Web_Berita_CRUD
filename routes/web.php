<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kategori/{slug}', [HomeController::class, 'category'])->name('category.show');
Route::get('/news/{slug}', [HomeController::class, 'show'])->name('news.show');
Route::post('/news/{id}/comment', [HomeController::class, 'storeComment'])->name('news.comment.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN (HARUS LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Route::get('/kategori', [CategoryController::class, 'index'])->name('admin.kategori'); // Deprecated/Replaced

    Route::resource('berita', \App\Http\Controllers\Admin\NewsController::class)
        ->names([
            'index' => 'admin.news.index',
            'create' => 'admin.news.create',
            'store' => 'admin.news.store',
            'show' => 'admin.news.show',
            'edit' => 'admin.news.edit',
            'update' => 'admin.news.update',
            'destroy' => 'admin.news.destroy',
        ]);

    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)
        ->names('admin.categories');

    Route::resource('comments', \App\Http\Controllers\Admin\CommentController::class)
        ->names('admin.comments')
        ->only(['index', 'destroy']);

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)
        ->names('admin.users');

    Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class)
        ->names('admin.settings');

});
