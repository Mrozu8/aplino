<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable =[
        'user_id', 'topic', 'active_user', 'active_support', 'last_update',
    ];


    public function inbox(){
        return $this->belongsTo('App\User');
    }


    public function thread(){
        return $this->hasMany('App\Thread');
    }
}
