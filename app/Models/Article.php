<?php


namespace App\Models;

class Article extends Model
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

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function addStep($attributes)
    {
        return $this->steps()->create($attributes);
    }
}
