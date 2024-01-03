<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', [ArticleController::class, 'index'])->name('index');
Route::post('/article/submit', [ArticleController::class, 'submit'])->name('submit');
Route::patch('/article/{id}/update', [ArticleController::class, 'update'])
    ->name('update')
    ->middleware('can:update,id');
Route::delete('/article/{id}/delete', [ArticleController::class, 'delete'])
    ->name('delete')
    ->middleware('can:delete,id');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin panel
Route::get('/admin', [AdminController::class, 'index'])->name('admin.panel');
//User control
Route::get('/admin/users', [AdminController::class, 'user_list'])->name('admin.users');
Route::post('/admin/users', [AdminController::class,'search_one_user'])->name('admin.search');
Route::patch('/admin/users/{id}/update_password', [AdminController::class, 'update_password'])->name('admin.update_password');
Route::delete('/admin/users/{id}/delete', [AdminController::class, 'delete_user'])->name('admin.delete_user');
Route::post('/admin/users/delete_several_users', [AdminController::class, 'delete_several_users'])->name('admin.delete_several_users');

//Article control
Route::get('/admin/article', [AdminController::class, 'article_list'])->name('admin.articles');
Route::delete('/admin/article/{id}/delete', [AdminController::class, 'article_delete'])->name('admin.article_delete');
