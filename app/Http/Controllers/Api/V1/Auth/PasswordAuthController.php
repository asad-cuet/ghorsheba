<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordAuthController extends Controller
{
    public function signUp(Request $request)
    {
        if (isNull($request->name)) {
            return apiResponse($result=false,$message="Name is required",$data=null,$code=400);
        }


        if (isNull($request->email)) {
            return apiResponse($result=false,$message="Email is required",$data=null,$code=400);
        }

        if (isNull($request->password)) {
            return apiResponse($result=false,$message="Password is required",$data=null,$code=400);
        }

        if (User::where('email', $request->email)->exists()) 
        {
            return apiResponse($result=false,$message="User is already Exist",$data=null);
        }



        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'utype' => $request->utype,
        ]);

        $user->save();


        return apiResponse($result=true,$message="User Registered SUccessfully",$data=$user,$code=200);

        // return loginUsingUser($user,'Registration Successful');

    }


    public function signIn(Request $request)
    {
        if (isNull($request->email)) 
        {
            return apiResponse($result=false,$message="Email is required",$data=null,$code=400);
        }

        if (isNull($request->password)) 
        {
            return apiResponse($result=false,$message="Password is required",$data=null,$code=400);
        }


        if (!Auth::attempt($request->only('email', 'password'))) 
        {
            return apiResponse($result=false,$message="Invalid Email or Password",$data=null,$code=401);

        }


        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('authToken')->plainTextToken;

        return AuthResponse($token,$user,"Logged In Successfully");
        
    }
}
