<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Stripe\Stripe;

use App\Models\StripeSetting;




class StripeController extends Controller
{


    // reference: https://www.itsolutionstuff.com/post/laravel-57-stripe-payment-gateway-integration-exampleexample.html
    // github: https://github.com/stripe/stripe-php
    public function makePayment(Request $request)
    {


        $stripe_setting=StripeSetting::where('id',1)->first();

        Stripe::setApiKey($stripe_setting->stripe_secret);

  

        $customer = Stripe\Customer::create(array(
    
                "address" => [
    
                        "line1" => "Virani Chowk",
    
                        "postal_code" => "360001",
    
                        "city" => "Rajkot",
    
                        "state" => "GJ",
    
                        "country" => "IN",
    
                    ],
                //////// as your wish
    
                "email" => "demo@gmail.com",
    
                "name" => "Hardik Savani",
    
                "source" => $request->stripeToken
    
             ));
    
      
    
        $transaction=Stripe\Charge::create ([
    
                "amount" => 100 * 100,
    
                "currency" => "usd",
    
                "customer" => $customer->id,
    
                "description" => "Test payment from itsolutionstuff.com.",
    
                "shipping" => [
    
                  "name" => "Jenny Rosen",
    
                  "address" => [
    
                    "line1" => "510 Townsend St",
    
                    "postal_code" => "98140",
    
                    "city" => "San Francisco",
    
                    "state" => "CA",
    
                    "country" => "US",
    
                  ],
    
                ]
    
        ]); 
    
      
    
        $data = [
            'result' => true,
            'transaction' => $transaction,
            'message' => ""
        ];
        return response()->json($data);

    }





    private function createToken($cardData)
    {
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => $cardData['cardNumber'],
                    'exp_month' => $cardData['month'],
                    'exp_year' => $cardData['year'],
                    'cvc' => $cardData['cvv']
                ]
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }

    private function createCharge($tokenId, $amount)
    {
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $tokenId,
                'description' => 'My first payment'
            ]);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }
}
