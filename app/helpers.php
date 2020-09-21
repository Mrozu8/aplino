<?php

use Illuminate\Support\Facades\Auth;


function is_admin(){
    return ( Auth::check() && Auth::user()->role == 1 );
}