<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{

    protected $fillable = [
        'inbox_id', 'thread_id', 'sender', 'content',
    ];


    public function thread(){
        return $this->belongsTo('App\Inbox');
    }
}
