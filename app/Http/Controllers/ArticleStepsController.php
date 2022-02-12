<?php

namespace App\Http\Controllers;

use App\Article;
use App\Step;
use Illuminate\Http\Request;

class ArticleStepsController extends Controller
{
    public function store(Article $article)
    {
        $article->addStep(\request()->validate([
            'description' => 'required|min:5',
        ]));

        return back();
    }

}

