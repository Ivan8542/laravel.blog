<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $title = 'Статьи';
        $menu = $this->menu();

        $articles = $tag->articles()->with('tags')->get();

        return view('tasks.index', compact('articles','title', 'menu'));
    }
}
