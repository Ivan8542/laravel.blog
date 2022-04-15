<?php

namespace App\Models;

class Step extends Model
{
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function complete($completed = true)
    {
        $this->update(['completed' => $completed]);
    }

    public function incomplete()
    {
        $this->complete(false);
    }
}
