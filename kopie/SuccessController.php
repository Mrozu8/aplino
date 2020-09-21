<?php

namespace App\Http\Controllers\tpay;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;


class SuccessController
{
    public function success($id){

		sleep(8);

        $user = User::findOrFail($id);

        $transaction = Transaction::where([
            ['user_email', $user->email],
            ['tr_status', 1]
        ])->orderBy('id', 'desc')->first();


        if($transaction->tr_status == 1 && $user->tr_last !== $transaction->tr_id){

//            $type = $transaction->tr_type;

            if($user->status == null){  // jeśli nie ma statusu

                $date = new Carbon($transaction->tr_date);
                $date = $date->addMonths($transaction->tr_type);

            }
            elseif($user->status == $transaction->tr_type){ // dodawanie tych samych statusów

                $date = new Carbon($user->status_close);
                $date = $date->addMonths($transaction->tr_type);

            }
            elseif($user->status < $transaction->tr_type){  // zamiana gorszego statusu na lepszy

                $date = new Carbon();
                $date = $date->addMonths($transaction->tr_type);

            }
            elseif($user->status > $transaction->tr_type){ // dodanie dni w przypadku transakcji lepszy->gorszy

//                if($transaction->tr_type == 1){
//
//                    $date = new Carbon($user->status_close);
//                    $date = $date->addDay(20);
//                }
//
//                if($transaction->tr_type == 2){
//
//                    $date = new Carbon($user->status_close);
//                    $date = $date->addDay(40);
//                }
//
//                $type = $user->status;

                $date = new Carbon($user->status_close);
                $date = $date->addMonths($transaction->tr_type);
            }

            if($date > Carbon::now()){
                $user->status = $transaction->tr_type;
                $user->status_close = $date;
                $user->tr_last = $transaction->tr_id;
                $user->save();
				
				if($transaction->tr_type == 1)
                {
                    $status = "Basic";
                }
                elseif($transaction->tr_type == 2)
                {
                    $status = "Primary";
                }
                elseif($transaction->tr_type == 3)
                {
                    $status = "Pro";
                }
                else{
                    $status = "-";
                }

                return redirect('/company/'. $user->id .'/payment')->with('status-success', 'Status konta został zmieniony na '.$status); 
            }

        }
        else{

            return back(); // Błąd podczas dokonywania transakcji
        }


    }
}
