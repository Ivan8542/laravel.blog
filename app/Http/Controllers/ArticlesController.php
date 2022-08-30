<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\FormArticleRequest;
use App\Service\TagsSynchronizer;


class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:update,article')->except(['index', 'about', 'store', 'create']);
    }

    public function index()
    {
        $title = 'Главная';
        $menu = $this->menu();

        $articles = auth()->user()->articles()->with('tags')->latest()->get();

        return view('tasks.index', compact("articles", 'title', 'menu'));
    }

    public function about()
    {
        $title = 'О Нас';
        $menu = $this->menu();

        return view('welcome', compact('title', 'menu'));
    }

    public function show(Article $article)
    {
        $menu = $this->menu();
        $title = "Детальная страница статьи";

        return view('tasks.show', compact("article", "title", 'menu'));
    }

    public function create()
    {
        $menu = $this->menu();
        $title = 'Создания статьи';

        return view('tasks.create', compact("title", 'menu'));
    }

    public function store(Article $article, TagsSynchronizer $tagsSynchronizer)
    {
        $article = Article::create(FormArticleRequest::validation());
        $tags = collect(explode(',', \request('tags')))->keyBy(function ($item) { return $item; });

        $tagsSynchronizer->sync($tags, $article);

        return redirect('/articles');
    }

    public function edit(Article $article)
    {
        $menu = $this->menu();
        $title = 'edit статьи';

        return view('tasks.edit', compact("title", "article", "menu"));
    }

    public function update(Article $article, TagsSynchronizer $tagsSynchronizer)
    {
        $article->update(FormArticleRequest::validation($article->character_code));
        $tags = collect(explode(',', \request('tags')))->keyBy(function ($item) { return $item; });

        $tagsSynchronizer->sync($tags, $article);

        return redirect("/articles");
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect("/articles");
    }
}
