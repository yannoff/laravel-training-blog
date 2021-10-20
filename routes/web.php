<?php

use App\Http\Controllers\Front\ArticleController;
use App\Http\Controllers\Back\ArticleController as ArticleCrudController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/blog', ArticleController::class)->except(['show']);
Route::get('/blog/{article:slug}', [ArticleController::class, 'show'])->name('blog.details');

Route::get('/topics/{topic:slug}', [ArticleController::class, 'filterByTopic']);
Route::get('/authors/{user}', [ArticleController::class, 'filterByAuthor']);
Route::get('/tags/{tag}', [ArticleController::class, 'filterByTag'])->name('by-tag');

Route::resource('/admin/articles', ArticleCrudController::class);
