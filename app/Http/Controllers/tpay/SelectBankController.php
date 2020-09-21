<?php

namespace App\Http\Controllers\tpay;

use Illuminate\Http\Request;
use tpayLibs\src\_class_tpay\PaymentForms\PaymentBasicForms;
use App\User;


include_once 'config.php';
include_once 'loader.php';


class SelectBankController extends PaymentBasicForms
{



    public function __construct()
    {
        $this->merchantSecret = 'demo';
        $this->merchantId = 1010;
        parent::__construct();
    }
    /*
     *Get bank selection by sending data array
     */
    public function selectBank()
    {

         $config = array(
            'amount' => 100,
            'description' => 'sdf',
            'crc' => '100020003000',
           //'result_url' => "http://127.0.0.1:8000/company/2/payment/2/success",
           'result_url' => "http://127.0.0.1:8000/payment/success",
            'result_email' => 'tmroz@ssdf.pl',
            'return_url' => 'http://127.0.0.1:8000/company/2/payment/success',
             'name' => 'Jan k',
             'email' => 'example@dsdsd.pl'
        );

        $form = $this->getBankSelectionForm($config, false, true);
        echo $form;
    }
}
 (new SelectBankController())->selectBank();

