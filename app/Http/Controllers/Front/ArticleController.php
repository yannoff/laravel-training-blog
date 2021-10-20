<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use function back;
use function view;

class ArticleController extends Controller
{
    const VIEW_LIST = 'front.article.list';

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $list = Article::all()->sortBy('created_at', SORT_REGULAR, true);

        return view(self::VIEW_LIST, ['rows' => $list]);
    }

    public function filterByTag(Tag $tag)
    {
        $articles = Article::where('id', '>=', '1')
            ->with('tags')
            ->whereHas('tags', function ($query) use ($tag) {
                $query->where('tag_id', '=', $tag->id);
            })
            ->get()
            ->sortBy('created_at', SORT_REGULAR, 'desc');

        return view(self::VIEW_LIST, ['rows' => $articles])
            ->with('title', 'containing ' . $tag->label);
    }

    public function filterByTopic(Topic $topic)
    {
        $articles = Article::all()->where('topic', '=', $topic)
            ->sortBy('created_at', SORT_REGULAR, 'desc');

        return view(self::VIEW_LIST, ['rows' => $articles])
            ->with('title', 'in ' . $topic->label);
    }

    public function filterByAuthor(User $user)
    {
        $articles = Article::all()->where('user', '=', $user)
            ->sortBy('created_at', SORT_REGULAR, 'desc');

        return view(self::VIEW_LIST, ['rows' => $articles])
            ->with('title', 'by ' . $user->name);
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
        $article = Article::create($request->only(['title', 'contents', 'topic_id', 'user_id']));

        foreach ($request->tags as $tag) {
            $article->tags()->attach($tag);
        }

        $article->save();

        return redirect(route('blog.details', [$article->slug]))
            ->withSuccess('Article successfully created !');
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
