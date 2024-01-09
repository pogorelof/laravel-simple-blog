<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

/*
    |--------------------------------------------------------------------------
    | Main Routes
    |--------------------------------------------------------------------------
*/
Route::get('/', [ArticleController::class, 'index'])->name('index');
Route::get('/article/{id}', [ArticleController::class, 'detail'])->name('detail');
Route::post('/article/submit', [ArticleController::class, 'submit'])->name('submit');
Route::patch('/article/{id}/update', [ArticleController::class, 'update'])
    ->name('update')
    ->middleware('can:update,id');
Route::delete('/article/{id}/delete', [ArticleController::class, 'delete'])
    ->name('delete')
    ->middleware('can:delete,id');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
    |--------------------------------------------------------------------------
    | Comment Routes
    |--------------------------------------------------------------------------
*/
Route::post('/comment/{article}/submit', [CommentController::class, 'submit'])->name('comment.submit');
Route::get('/comment/{comment}/delete', [CommentController::class, 'delete'])
    ->name('comment.delete')
    ->middleware('can:destroy,comment');
/*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
*/
Route::get('/admin', [AdminController::class, 'index'])->name('admin.panel');
//User routes
Route::get('/admin/users', [AdminController::class, 'user_list'])->name('admin.users');
Route::post('/admin/users', [AdminController::class,'search_one_user'])->name('admin.search');
Route::patch('/admin/users/{id}/update_password', [AdminController::class, 'update_password'])->name('admin.update_password');
Route::delete('/admin/users/{id}/delete', [AdminController::class, 'delete_user'])->name('admin.delete_user');
Route::post('/admin/users/delete_several_users', [AdminController::class, 'delete_several_users'])->name('admin.delete_several_users');

//Article routes
Route::get('/admin/article', [AdminController::class, 'article_list'])->name('admin.articles');
Route::delete('/admin/article/{id}/delete', [AdminController::class, 'article_delete'])->name('admin.article_delete');
Route::patch('/admin/article/{id}/update_text', [AdminController::class, 'article_text_update'])->name('admin.article_text_update');
Route::patch('/admin/article/{id}/update_title', [AdminController::class, 'article_title_update'])->name('admin.article_title_update');
Route::post('/admin/article/delete_several_article', [AdminController::class, 'delete_several_article'])->name('admin.delete_several_article');
