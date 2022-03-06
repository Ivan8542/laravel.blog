<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\FormArticleRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ArticlesController extends Controller
{
    public $guarded = [];

    public function index()
    {
        $title = 'Главная';
        $menu = $this->menu();
        $articles = Article::latest()->get();

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

    public function store(FormArticleRequest $request)
    {
        $attributes = $request->validated();

        Article::create($attributes);

        return redirect('/articles');

    }

    public function edit(Article $article)
    {
        $menu = $this->menu();
        $title = 'edit статьи';

        return view('tasks.edit', compact("title","article", "menu"));
    }

    public function update(Article $article, FormArticleRequest $request)
    {
        // вот єто не знаю
        $validate = Validator::make($request->rules(), [
            'character_code' => [
                'required|regex:/^[0-9a-zA-Z\-\_]+$/',
                Rule::unique('articles')->ignore($article),
            ],
        ]);

        $attributes = $validate->validated();

        $article->update($attributes);

        return redirect("/articles");
    }
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect("/articles");
    }
}
