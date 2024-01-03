<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaypalSetting;
use App\Models\Order;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{


    //documentation: https://srmklive.github.io/laravel-paypal/docs.html   , github: https://github.com/srmklive/laravel-paypal


    public function create(Request $request)
    {

        $paypal_setting=PaypalSetting::where('id',1)->first();
        //over writing config/paypal.php
        $config = array(
            'mode' => $paypal_setting->mode,
            'sandbox' => array('client_id' => $paypal_setting->client_id, 'client_secret' => $paypal_setting->secret),
            'live' => array('client_id' => $paypal_setting->client_id, 'client_secret' => $paypal_setting->secret)
        );


        $provider = new PayPalClient;

        $provider->setApiCredentials($config);
        $provider->setCurrency($paypal_setting->currency);

        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);


        $data = json_decode($request->getContent(), true);
        $order = $provider->createOrder($data);

        Order::create($order);
        return response()->json($order);


     
    }


    public function capture(Request $request)
    {

        $paypal_setting=PaypalSetting::where('id',1)->first();

        //over writing config/paypal.php
        $config = array(
            'mode' => $paypal_setting->mode,
            'sandbox' => array('client_id' => $paypal_setting->client_id, 'client_secret' => $paypal_setting->secret),
            'live' => array('client_id' => $paypal_setting->client_id, 'client_secret' => $paypal_setting->secret)
        );


        $data = json_decode($request->getContent(), true);

        $orderId = $data['orderId'];

        $provider = new PayPalClient;
        $provider->setApiCredentials($config);
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);


        

        try {
            $result = $provider->capturePaymentOrder($orderId);
            if($result['status'] === "COMPLETED"){
                $order = Order::where('id', $orderId)->first();
                ///////
                $order->save();
            }
        } catch (Exception $e) {
            dd($e);
        }
        return response()->json($result);
    }


}




//Code need in blade

// <body>
//     <!-- Set up a container element for the button -->
//     <div id="paypal-button-container"></div>

//     <!-- Include the PayPal JavaScript SDK -->
//     <script src="https://www.paypal.com/sdk/js?client-id=<?php echo config('services.paypal.client_id') ?>&currency=USD"></script>   

//     <script>
//         // Render the PayPal button into #paypal-button-container
//         paypal.Buttons({
//  // Call your server to set up the transaction
//              createOrder: function(data, actions) {
//                 return fetch('/api/paypal/order/create', {
//                     method: 'POST',
//                     body:JSON.stringify({
//                         'course_id': "{{$course->id}}",
//                         'user_id' : "{{auth()->user()->id}}",
//                         'amount' : $("#paypalAmount").val(),
//                     })
//                 }).then(function(res) {
//                     //res.json();
//                     return res.json();
//                 }).then(function(orderData) {
//                     //console.log(orderData);
//                     return orderData.id;
//                 });
//             },

//             // Call your server to finalize the transaction
//             onApprove: function(data, actions) {
//                 return fetch('/api/paypal/order/capture' , {
//                     method: 'POST',
//                     body :JSON.stringify({
//                         orderId : data.orderID,
//                         payment_gateway_id: $("#payapalId").val(),
//                         user_id: "{{ auth()->user()->id }}",
//                     })
//                 }).then(function(res) {
//                    // console.log(res.json());
//                     return res.json();
//                 }).then(function(orderData) {

//                     // Successful capture! For demo purposes:
//                   //  console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
//                     var transaction = orderData.purchase_units[0].payments.captures[0];
//                     iziToast.success({
//                         title: 'Success',
//                         message: 'Payment completed',
//                         position: 'topRight'
//                     });
//                 });
//             }

//         }).render('#paypal-button-container');
//     </script>
// </body>


