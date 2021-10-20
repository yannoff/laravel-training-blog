<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request): View
    {
        $list = Article::all()->sortBy('created_at', SORT_REGULAR, true);
        $filters = $request->query('filters', []);

        switch (true):
            case array_key_exists('topic', $filters):
                $list = $list->where('topic_id', '=', $filters['topic']);
                break;

            case array_key_exists('tag', $filters):
                $id = $filters['tag'];
                $list = Article::where('id', '>=', '1')
                    ->with('tags')
                    ->whereHas('tags', function ($query) use ($id) {
                        $query->where('tag_id', '=', $id);
                    })
                    ->get();
                break;

            case array_key_exists('author', $filters):
                $list = $list->where('user_id', '=', $filters['author']);
                break;
        endswitch;

        return view('back.article.list', ['rows' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('back.article.edit');
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
        return view('back.article.item', ['row' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     *
     * @return View
     */
    public function edit(Article $article): View
    {
        return view('back.article.edit', ['item' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Article $article
     *
     * @return RedirectResponse
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     *
     * @return RedirectResponse
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
        return back()->with('success', 'Article #' . $article->id . 'successfully deleted!');
    }
}
