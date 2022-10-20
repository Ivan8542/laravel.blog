<?php


namespace App\Models;

use App\Events\TaskCreated;

class Article extends Model
{
//    public $fillable = ['name', 'body'];
    public $guarded  = []; // єто снимаю защиту от всех полей

    protected $dispatchesEvents = [
        'created' => TaskCreated::class,
    ];

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

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
