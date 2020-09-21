<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $fillable =[
        'form_id', 'name', 'slug', 'type',
    ];




    public function checkbox(){
        return $this->hasMany('App\Checkbox');
    }

    public function radio(){
        return $this->hasMany('App\Radio');
    }
}
