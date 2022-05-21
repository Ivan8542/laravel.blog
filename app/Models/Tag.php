<?php

namespace App\Models;

class Tag extends Model
{
    public function getRouteKeyName()
    {
        return 'name';
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tag', 'tag_id', 'article_id');
    }

    public static function tagsCloud()
    {
//        return (new static)->has('articles')->get();
        return (new static)->all();
    }
}
