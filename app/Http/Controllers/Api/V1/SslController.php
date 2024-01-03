<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DGvai\SSLCommerz\SSLCommerz;
use Illuminate\Support\Facades\Config;
use App\Models\SslSetting;
use Illuminate\Support\Facades\DB;

class SslController extends Controller
{

    // reference: 
    // https://github.com/dgvai/laravel-sslcommerz
    // https://developer.sslcommerz.com/doc/v4/#update-your-transaction
    public function order()
    {

        //  DO YOU ORDER SAVING PROCESS TO DB OR ANYTHING


        //setting
        $ssl_setting=SslSetting::where('id',1)->first();
        $config = array(
            'store' => array('id' => $ssl_setting->store_id, 'password' => $ssl_setting->store_password,'currency'=> $ssl_setting->store_currency),
        );
        Config::set('sslcommerz',$config);

        //making transiction
        $sslc = new SSLCommerz();
        $sslc->amount(20)
            ->trxid('DEMOTRX123')
            ->product('Demo Product Name')
            ->customer('Customer Name','custemail@email.com');
        return $sslc->make_payment();

        /**
         * 
         *  USE:  $sslc->make_payment(true) FOR CHECKOUT INTEGRATION
         * 
         * */
    }

    public function success(Request $request)
    {
        $validate = SSLCommerz::validate_payment($request);
        if($validate)
        {
            $bankID = $request->bank_tran_id;   //  KEEP THIS bank_tran_id FOR REFUNDING ISSUE

            //  Do the rest database saving works
            //  take a look at dd($request->all()) to see what you need

        }
    }

    public function failure(Request $request)
    {

        //  do the database works
        //  also same goes for cancel()
        //  for IPN() you can leave it untouched or can follow
        //  official documentation about IPN from SSLCommerz Panel

    }
}
