<?php

/*
 * Created by tpay.com
 */

namespace App\Http\Controllers\tpay;
use App\User;
//use App\Http\Middleware\FormShow;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use tpayLibs\src\_class_tpay\PaymentForms\PaymentBasicForms;

include_once 'config.php';
include_once 'loader.php';

class BankSelection extends PaymentBasicForms
{
    public function __construct()
    {
//        $this->middleware('permission');

        $this->merchantSecret = '5SOYp9nAiaXPga4s';
        $this->merchantId = 33742;
        parent::__construct();
    }



    /*
     *Get bank selection by sending data array
     */
    public function getBankForm(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $email = $user->email;
        $company_name = $user->company_name;
        $amount = null;
        $description = null;

        $path_result = route('result-request');
//        $path_success = route('success-request', $user->id);

//        if($request->package == 1){
//            $amount = 0.05;
//            $description = '1 Formularz';
//        }
//        elseif($request->package == 2){
//            $amount = 0.40;
//            $description = '2 Formularze';
//        }
//        elseif($request->package == 3){
//            $amount = 0.60;
//            $description = '3 Formularze';
//        }
//        else{
//            return back();
//        }

        $packages = [
            1 => 0.05,
            2 => 0.10,
            3 => 13.97,
            4 => 18.46,
            5 => 22.95,
            6 => 27.44,
            7 => 31.93,
            8 => 35.92,
            9 => 41.41,
            10 => 45,
            15 => 64.81,
            20 => 84.83,
        ];

        foreach($packages as $key => $value)
        {
            if($request->package == $key)
            {
                $amount = $value;
                $description = $key." Formularz(e)";
            }
        }

        if(!isset($amount) || empty($amount))
        {
            return back()->with('status-error', 'Nie baw się edycją kodu :D');
        }



        $config = array(
            'amount' => $amount,
            'description' => $description,
            'crc' => '100020003000',
            'result_url' => $path_result,
            'result_email' => $email,
            'return_url' => 'http://127.0.0.1:8000/company/'.$id.'/payment/success',
            'email' => $email,
            'online' => 1,
            'name' => $company_name,
        );


//        $config = array(
//            'amount' => 0.05,
//            'description' => 'sfsdf',
//            'crc' => '100020003000',
//            'result_url' => 'http://www.i-cv.pl/payment/success/req',
//            'result_email' => 'aasd@dsf.pl',
//            'return_url' => 'http://www.i-cv.pl/company/2/payment',
//            'email' => 'aasd@dsf.pl',
//            'online' => 1,
//            'name' => 'asd',
//        );

        $form = $this->getBankSelectionForm($config, false, true);

        echo $form;
    }
}




//(new BankSelection())->getBankForm();
