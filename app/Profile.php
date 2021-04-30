<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    protected $fillable = ['user_id' , 'avatar' , 'facebook_id' , 'address','country_id','state_id','city_id','about','phone'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function location()
    {
        return $this->belongsTo('App\Country','country_id');
    }
}