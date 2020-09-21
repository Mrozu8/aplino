<?php

namespace App\Http\Controllers\Auth;

use App\Mail\CreateUser;
use App\Newsletter;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;



use App\Http\Controllers\MailConfirmController;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'company_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'rule' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::get()->all();

        $conf = new MailConfirmController();
        $conf_hash = $conf->create_hash($data['email'], $data['password']);

        $conf->send_mail_conf($data['email'], $conf_hash);

//        Mail::to('support@aplino.com')->send(new CreateUser());

        if($user == 0){
            return User::create([
                'company_name' => $data['company_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => '1',
                'conf_hash' => $conf_hash,
                'rule' => 1,
            ]);
        }
        else{
            return User::create([
                'company_name' => $data['company_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => '2',
                'conf_hash' => $conf_hash,
                'rule' => 1,
            ]);
        }

    }
}
