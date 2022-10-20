<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Step;

class ArticleStepsController extends Controller
{
    public function store(Article $article)
    {
        $article->addStep(\request()->validate([
            'description' => 'required|min:5',
        ]));

        return back();
    }

    public function update(Step $step)
    {
        $method = \request()->has('completed') ? 'complete' : 'incomplete';
        $step->{$method}();

        return back();
    }
}
