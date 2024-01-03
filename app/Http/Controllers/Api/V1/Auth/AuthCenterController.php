<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\Auth\PasswordAuthController;
use App\Http\Controllers\Api\V1\Auth\OtpAuthController;
use App\Http\Controllers\Api\V1\Auth\SocialAuthController;
use Auth;
use Socialite;


class AuthCenterController extends Controller
{
    public function signUp(Request $request)
    {
        if (isNull($request->provider)) {
            return apiResponse($result=false,$message="Provider is required",$data=null,$code=400);
        }

        if(!in_array($request->provider,['password','otp']))
        {
            return apiResponse($result=false,$message="Provider is invalid",$data=null,$code=400);
        }


        switch ($request->provider) 
        {
            case "password":
                $PasswordAuth=new PasswordAuthController;
                $provider_response=$PasswordAuth->signUp($request);
                break;
            case "otp":
                $OtpAuth=new OtpAuthController;
                $provider_response=$OtpAuth->signUp($request);
                break;
            default:
              echo "This block will never execute";
        }

        return $provider_response;
    }



    public function signIn(Request $request,$provider='password')
    {

        if(!in_array($provider,['password','otp','facebook','google']))
        {
            return apiResponse($result=false,$message="Provider is invalid",$data=null,$code=400);
        }


        switch ($provider) 
        {
            case "password":
                $PasswordAuth=new PasswordAuthController;
                $provider_response=$PasswordAuth->signIn($request);
                break;
            case "otp":
                $OtpAuth=new OtpAuthController;
                $provider_response=$OtpAuth->signIn($request);
                break;
            case "facebook":
            case "google":
                {
                    $SocialAuth=new SocialAuthController;
                    $provider_response=$SocialAuth->signIn($request->provider);
                    break;
                }
            default:
              echo "This block will never execute";
        }

        return $provider_response;
    }


    public function authUser(Request $request)
    {
        return apiResponse($result=true,$message="Success",$data=auth()->user(),$code=200);
    }

    public function signout(Request $request)
    {
        $request->user()->tokens()->delete();
        return apiResponse($result=true,$message="Logged Out Successfully",$data=null,$code=200);
    }



}
