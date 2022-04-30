<?php

/*
|--------------------------------------------------------------------------
| Vendor
|--------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminMediaController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\CommentRepliesController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/post/{id}', [AdminPostController::class, 'post'])->name('home.post');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::group(['middleware'=>'admin'], function () {
    Route::resource('/admin/users', AdminUsersController::class);
    Route::resource('/admin/post', AdminPostController::class);
    Route::resource('/admin/categories', AdminCategoriesController::class);
    Route::resource('/admin/media', AdminMediaController::class);
    Route::resource('/admin/comments', PostCommentsController::class);
    Route::resource('/admin/comment/replies', CommentRepliesController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('comment/reply', [CommentRepliesController::class, 'createReply'])->name('create.reply');
});

Route::delete('/delete/media', [AdminMediaController::class, 'deleteMedia'])->name('delete.media');
