<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ad extends Model
{
    //
    protected $guarded = [];

    public function user()
    {
        return  $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function childcategories()
    {   
        return $this->hasOne(Childcategory::class , 'id','childcategory_id');
    }

    //save ads

    public function saveAd()
    {
        return $this->belongsToMany('App\SaveAd');
    }

    public function didUserSavedAd()
    {
        return DB::table('save_ads')->where('user_id' , auth()->user()->id)->where('ad_id' , $this->id)->first();
    }
}
