<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name','slug','image'];

    public function subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }

    public function ads()
    {
        return $this->hasMany('App\Post');
    }
}
