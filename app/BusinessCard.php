<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCard extends Model
{
    protected $fillable = [
    	'user_id', 'company_name', 'address', 'phone', 'website', 'email', 'description', 'active',
    ];



    public function businesCard(){
        return $this->belongsTo('App\User');
    }
}
