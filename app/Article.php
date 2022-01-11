<?php


namespace App;


class Article extends Model
{
    public function getRouteKeyName()
    {
        return 'id';
    }

    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);
    }
}