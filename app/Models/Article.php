<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * Get the store that owns the article.
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }
}
