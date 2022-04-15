<?php

namespace App\Models;

class Tag extends Model
{
    public function articles()
    {
        $this->belongsToMany(Article::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function tagsCloud()
    {
//        return (new static)->has('articles')->get();
        return (new static)->all();
    }
}
