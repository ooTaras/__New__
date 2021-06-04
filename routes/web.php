<?php

use App\Http\Controllers\Blog\Admin\CategoryController;
use App\Http\Controllers\Blog\Admin\PostController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// start for user

Route::prefix('blog')->group(function () {
    Route::resource('post', PostController::class)->names('blog.post');
});
// end for user

// start adminka

Route::prefix('admin/blog')->group(function () {

    Route::resource('categories', CategoryController::class)
        ->middleware('can:view')
        ->names('blog.admin.categories');

    Route::resource('post', PostController::class)
        ->middleware('can:view')
        ->names('blog.admin.posts');
});
// end adminka

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
