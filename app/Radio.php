<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radio extends Model
{
    protected $fillable =[
        'custom_field_id', 'form_id', 'content',
    ];



    public function radio(){
        return $this->belongsTo('App\CustomField');
    }
}
