<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable =[
        'tr_id', 'user_email', 'tr_status', 'tr_date', 'tr_log', 'tr_type', 'tr_amount'
    ];
}
