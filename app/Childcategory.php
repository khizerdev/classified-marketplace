<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Childcategory extends Model
{
    //
    protected $fillable = ['name','slug','subcategory_id'];

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
}
