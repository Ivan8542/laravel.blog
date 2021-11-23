<?php

namespace App\Http\Controllers;

use App\Article;

class ArticlesController extends Controller
{
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

        return view('welcome', compact("task", 'title', 'menu'));
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

        return view('tasks.create', compact("title", "tasks", "tasksDb", 'menu'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:5|max:255',
            'body' => 'required|max:255',
            'published' => 'required',
            'detailed_description' => 'required',
            'character_code' => 'required|unique:articles|regex:/^[0-9a-zA-Z\-\_]+$/'
        ]);

        Article::create(request()->all());

        return redirect('/');

    }

}
