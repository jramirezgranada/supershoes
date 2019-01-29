<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;
    
    protected $fillable = ["name", "address"];

    /**
     * Get the articles for store.
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }
}
