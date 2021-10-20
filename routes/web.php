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
Route::get('/blog/{article:slug}', [ArticleController::class, 'show']);

Route::get('/topics/{topic:slug}', function (\App\Models\Topic $topic){
    $articles = \App\Models\Article::all()->where('topic', '=', $topic);
    return view('article.list', ['rows' => $articles])->with('title', 'in ' . $topic->label);
});

Route::get('/users/{user}', function (\App\Models\User $user){
    $articles = \App\Models\Article::all()->where('user', '=', $user);
    return view('article.list', ['rows' => $articles])->with('title', 'by ' . $user->name);
});

Route::get('/tags/{tag}', function (\App\Models\Tag $tag) {
    $articles = \App\Models\Article::where('id', '>=', '1')
        ->with('tags')
        ->whereHas('tags', function ($query) use ($tag) {
            $query->where('tag_id', '=', $tag->id);
        })
        ->get();
    return view('article.list', ['rows' => $articles])->with('title', 'containing ' . $tag->label);
})->name('by-tag');

Route::resource('/admin/articles', ArticleCrudController::class);
