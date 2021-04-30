<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //
    protected $fillable = ['name','slug','category_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function childcategories()
    {
        return $this->hasMany('App\Childcategory');
    }

    public function ads()
    {
        return $this->hasMany('App\Ad');
    }

    
}
