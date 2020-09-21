<?php

/*
 * Created by tpay.com
 */

namespace App\Http\Controllers\tpay;
use App\User;

use Illuminate\Support\Facades\Auth;
use tpayLibs\src\_class_tpay\PaymentForms\PaymentBasicForms;

include_once 'config.php';
include_once 'loader.php';

class BankSelection extends PaymentBasicForms
{
    public function __construct()
    {
        $this->merchantSecret = '5SOYp9nAiaXPga4s';
        $this->merchantId = 33742;
        parent::__construct();
    }






    /*
     *Get bank selection by sending data array
     */
    public function getBankForm($id, $id_type)
    {

        $user = User::findOrFail($id);
        $email = $user->email;
        $company_name = $user->company_name;
        $amount = null;
        $description = null;

        $path_result = route('result-request');
//        $path_success = route('success-request', $user->id);

        if($id_type == 1){
            $amount = 0.05;
            $description = 'Zmiana statusu typu Basic';
        }
        elseif($id_type == 2){
            $amount = 0.40;
            $description = 'Zmiana statusu typu Primary';
        }
        elseif($id_type == 3){
            $amount = 0.60;
            $description = 'Zmiana statusu typu Pro';
        }
        else{
            return back();
        }



        $config = array(
            'amount' => $amount,
            'description' => $description,
            'crc' => '100020003000',
            'result_url' => $path_result,
            'result_email' => $email,
            'return_url' => 'http://www.i-cv.pl/company/'.$id.'/payment/success',
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
