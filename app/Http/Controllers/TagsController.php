<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $title = 'Статьи';
        $menu = $this->menu();

        $articles = $tag->articles()->with('tags')->get(); //тут ошибка какая то

        return view('tasks.index', compact('articles','title', 'menu'));
    }
}
