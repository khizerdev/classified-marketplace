<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //
    
    protected $guarded = [];
    protected $appends = ['selfOwned'];
   
    public function getSelfOwnedAttribute()
    {
        return $this->user_id === auth()->user()->id;
    }

    public function sender()
    {
        return $this->belongsTo('App\User' , 'user_id');
    }
    public function receiver()
    {
        return $this->belongsTo('App\User' , 'receiver_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function ads()
    {
        return $this->belongsTo('App\Ad' ,'ad_id','id');
    }

}

