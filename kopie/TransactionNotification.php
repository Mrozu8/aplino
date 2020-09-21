<?php

/*
 * Created by tpay.com
 */
namespace App\Http\Controllers\tpay;

use App\Profession;
use App\Transaction;
use App\User;
use Illuminate\Support\Facades\Auth;
use tpayLibs\src\_class_tpay\Notifications\BasicNotificationHandler;

include_once 'config.php';
include_once 'loader.php';

class TransactionNotification extends BasicNotificationHandler
{
    public function __construct()
    {
        $this->merchantSecret = '5SOYp9nAiaXPga4s';
        $this->merchantId = 33742;
        parent::__construct();

    }


	public function checkPayment(){

        $reply = Transaction::where('tr_id', $_POST['tr_id'])->first();

            if($_POST['tr_amount'] == 0.05){
                $type = 1;
            }
            elseif($_POST['tr_amount'] == 0.40){
                $type = 2;
            }
            elseif($_POST['tr_amount'] == 0.60){
                $type = 3;
            }
            else{
                $type = 0;
            }


            if($_POST['tr_amount'] == $_POST['tr_paid']){
                $log = 'Transakcja prawidłowa';
                $status = 1;
            }
            else{
                $log = 'Błąd !!! Nieprawidłowa kwota';
                $status = 0;
            }


        if($reply == null && $_POST['tr_status'] == true){
            Transaction::create([
                'tr_id' => $_POST['tr_id'],
                'user_email' => $_POST['tr_email'],
                'tr_date' => $_POST['tr_date'],
                'tr_status' => $status,
                'tr_log' => $log,
                'tr_type' => $type,
            ]);

        }



        echo 'TRUE';


    }


	public function success(){
        return view('home.index');
    }

}
return (new TransactionNotification())->checkPayment();


