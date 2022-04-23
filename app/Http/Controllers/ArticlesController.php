<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\FormArticleRequest;
use App\Models\Tag;
use App\Service\TagsSynchronizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\EventListener\ValidateRequestListener;

class ArticlesController extends Controller
{
    public function index()
    {
        $title = 'Главная';
        $menu = $this->menu();
        $articles = Article::with('tags')->latest()->get();

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

        $tagsSynchronizer->sync($tags, $article); // здесь будут созданы теги, сервис этот надо создать и там уже сделать обработку

        return redirect('/articles');
    }

//    public function store(Article $article)
//    {
//        $article = Article::create(FormArticleRequest::validation());
//
////        $articleTags = $article->tags->keyBy('name');
////        $tags = collect(explode(',', \request('tags')))->keyBy(function ($item) { return $item; });
////
////        $syncIds = $articleTags->intersectByKeys($tags)->pluck('id')->toArray();
////        $tagsToAttach = $tags->diffKeys($articleTags);
////
////        foreach ($tagsToAttach as $tag) {
////            $tag = Tag::firstOrCreate(['name' => $tag]);
////            $syncIds[] = $tag->id;
////        }
////
////        $article->tags()->sync($syncIds);
//
//        return redirect('/articles');
//    }

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

//        $a = $article->tags()->get();
//        foreach ($a as $item) {
//            Tag::find($item->id)->destroy();
//        }


        return redirect("/articles");
    }
}
