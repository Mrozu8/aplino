<?php

namespace App\Http\Controllers;

//use Dompdf\Frame\Factory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;

class HomeController extends Controller
{
    public $view;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Factory $view)
    {
        $this->view = $view;
    }

    public function index()
    {
        return $this->view->make('home.home');
    }

    public function privacy_policy(){

        return view('home.privacy');
    }


    public function cookie_policy(){

        return view('home.cookie');
    }

    public function rule(){

        return view('home.rule');
    }
}
