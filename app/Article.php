<?php


namespace App;


class Article extends \Illuminate\Database\Eloquent\Model
{
//    public $fillable = ['name', 'body'];
    public $guarded  = []; // єто снимаю защиту от всех полей

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);
    }
}
