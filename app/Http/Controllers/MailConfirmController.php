<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailConfirmController extends Controller
{
    public function create_hash($email, $password)
    {
        return md5($email.$password);
    }


    public function send_mail_conf($email, $hash)
    {
        return Mail::to($email)->send(new ConfirmMail($hash, $email));
    }


    public function confirm_email($email)
    {
        $user = User::where('email', $email)->first();

        if($user->conf_hash == $_GET['hash'])
        {
            $user->mail_conf = 1;
            $user->save();

            return redirect('/')->with('status-success', 'Mail zstał potwierdzony');
        }
        else
        {
            return back();
        }
    }


    public function confirm_again()
    {
        return view('auth.confirm_again');
    }


    public function send_again(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        Mail::to($user->email)->send(new ConfirmMail($user->conf_hash, $user->email));

        return back()->with('status-success', 'Link aktywacyjny został wysłany');
    }
}
