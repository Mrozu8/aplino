<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Crypt;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name', 'nip', 'email', 'password', 'role', 'package', 'conf_hash', 'mail_conf', 'rule', 'period_email', 'address', 'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getContentAttribute($value){
        return Crypt::decrypt($value);
    }

    public function setContentAttribute($value){
        $this->attributes['nip'] = Crypt::encrypt($value);
    }




//    public function user(){
//        return $this->hasMany('App\Form');
//    }
//
//
//    public function inbox(){
//        return $this->hasMany('App\Inbox');
//    }
//
//
//    public function businesCard(){
//        return $this->belongsTo('App\BusinesCard');
//    }
}
