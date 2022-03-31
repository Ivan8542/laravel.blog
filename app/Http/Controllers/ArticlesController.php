<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\FormArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\EventListener\ValidateRequestListener;

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
        if ($article->character_code == \request('character_code')) {
            $attributes = \request()->validate([
                'name' => 'required|min:5|max:255',
                'body' => 'required|max:255',
                'published' => 'required',
                'detailed_description' => 'required',
                'character_code' => 'required|regex:/^[0-9a-zA-Z\-\_]+$/',]);
        } else {
            $attributes = $request->validated();
        }

        return redirect("/articles");
    }
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect("/articles");
    }
}
