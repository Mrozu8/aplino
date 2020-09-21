<?php

namespace App\Http\Controllers;

use App\Mail\SendQuestion;
use Illuminate\Http\Request;
use App\Newsletter;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{


    public function newsletter(Request $request)
    {

        $this->validate($request, [
            'email' => 'unique:newsletters|required|email'
        ],[
            'unique' => 'Email '. $request->email .' już jest w naszej bazie',
            'required' => 'To pole jest wymagane',
            'email' => 'Podaj poprawny email',
        ]);


        Newsletter::create([
            'email' => $request->email,
        ]);

        return back()->with('status-success', 'Dołączyłeś do naszego newslettera');
    }


    public function send_question(Request $request)
    {
        $this->validate($request, [
           'email_contact' => 'required|email',
           'topic' => 'required',
           'content' => 'required',
        ],[
            'required' => 'To pole jest wymagane',
            'email' => 'Podaj właściwy email',
        ]);


        Mail::to('tmrozu8@gmail.com')->send(new SendQuestion($request));
        return back()->with('status-success', 'Wiadomość została wysłana pomyślnie');
    }
}
