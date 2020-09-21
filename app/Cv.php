<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable =[
        'form_id', 'content', 'name', 'surname', 'birthday', 'phone', 'email', 'file', 'active', 'user_id', 'group_cv_id',
    ];




    public function setContentAttribute($value){
        $this->attributes['content'] = json_encode($value);
    }

    public function getContentAttribute($value){
        return json_decode($value);
    }


    public function cv(){
        return $this->belongsTo('App\Form');
    }
}
