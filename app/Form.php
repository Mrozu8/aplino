<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable =[
        'user_id', 'profession', 'edit', 'title', 'voi', 'description', 'company', 'city', 'name', 'surname', 'birthday', 'email', 'phone', 'file', 'active', 'active_date', 'street',
    ];


//    public function profession(){
//        return $this->belongsTo('App/Profession');
//    }

    public function user(){
        return $this->belongsTo('App\User');
    }


    public function cv(){
        return $this->hasMany('App\Cv');
    }
}
