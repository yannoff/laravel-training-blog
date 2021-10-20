<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use function back;
use function view;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $list = Article::all()->sortBy('created_at', SORT_REGULAR, true);

        return view('front.article.list', ['rows' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('front.article.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $article = Article::create([
            'title' => $request->title,
            'contents' => $request->contents,
            'topic_id' => $request->topic_id,
        ]);

        foreach ($request->tags as $tag) {
            $article->tags()->attach($tag);
        }

        $article->save();

        return back()->withSuccess('Article successfully created !');
    }

    /**
     * Display the specified resource.
     *
     * @param Article|null $article
     *
     * @return View
     */
    public function show(Article $article = null): View
    {
        return view('front.article.item', ['row' => $article]);
    }
}
