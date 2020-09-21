<?php

namespace App\Http\Controllers;

use App\Form;
use App\Mail\EndDateForm;
use App\Mail\OneDayMailForm;
use App\Mail\OneWeekMailForm;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class CroneStatusController
{
//    public function crone()
//    {
//        $users = User::select('id', 'status', 'status_close')->where('status', '!=', null)->get();
//
//        $date = Carbon::yesterday();
//
//        foreach ($users as $user) {
//            if ($date > $user->status_close) {
//                User::where('id', $user->id)->update(['status' => null, 'status_close' => null]);
//            }
//        }
//
//        return back();
//    }


    public function crone_form()
    {
        $oneDay = Carbon::now()->addDay(1)->format('Y-m-d');
        $oneWeek = Carbon::now()->addDay(7)->format('Y-m-d');


        $forms = Form::select('id', 'user_id', 'active_date')->where([
            ['active_date', '!=', null]
//            ['active_date', '<=', $now]
        ])->get();

        $date = Carbon::yesterday(); // zakończenie form

        foreach ($forms as $form) {

            if ($date > $form->active_date)
            {
                Form::where('id', $form->id)->update(['active' => 0, 'active_date' => null]);
                $user = User::where('id', $form->user_id)->first();
                Mail::to($user->email)->send(new EndDateForm());
            }
            elseif($oneDay == $form->active_date)
            {
                $user = User::where('id', $form->user_id)->first();
                Mail::to($user->email)->send(new OneDayMailForm());
            }
            elseif($oneWeek == $form->active_date)
            {
                $user = User::where('id', $form->user_id)->first();
                Mail::to($user->email)->send(new OneWeekMailForm());
            }

        }

        return back();
    }


    public function crone_email()
    {


    }

}

