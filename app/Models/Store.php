<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ["name", "address"];
    
    /**
     * Get the articles for store.
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }
}
