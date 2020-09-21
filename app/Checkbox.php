<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkbox extends Model
{
    protected $fillable =[
        'custom_field_id', 'form_id', 'content',
    ];


    public function checkbox(){
        return $this->belongsTo('App\CustomField');
    }


}
