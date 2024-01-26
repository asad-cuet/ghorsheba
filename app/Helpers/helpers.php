<?php


use App\Models\User;

function isNull($val)
{
    if(is_array($val))
    {
        if(empty($val))
        {
            return 0;
        }
    }
    else
    {
        $val=str_replace(' ', '', $val);
        if(trim($val=='' || $val==null))
        {
            return 1;
        }
    
        return 0;
    }

}


function loginUsingUser($user,$res_message)
{
    if(Auth::loginUsingId($user->id)) 
    {
        $token = $user->createToken('authToken')->plainTextToken;
        return AuthResponse($token,$user,$res_message);
    } 
    else 
    {
        return apiResponse($result=false,$message="Something went wrong. Try again",$data=null,$code=201);
    }
}

function AuthResponse($token,$user,$message)
{
    return response()->json([
        'result' => true,
        'data'=>[
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => auth()->user(),
            'message' =>$message,
            'user_id' => $user->id
        ]
    ], 201);
}

function apiResponse($result,$message,$data=null,$code=200)
{
    return response()->json([
        'result' => $result,
        'message' => $message,
        'data' => $data
    ],$code);
}

function isImage($file)
{
    $extention=$file->getClientOriginalExtension();  
    if(in_array($extention,['jpg','png','jpeg','gif']))
    {
        return $extention;
    }
    else
    {
        return False;
    }
}

function isPdf($file)
{
    $extention=$file->getClientOriginalExtension();  
    if(in_array($extention,['pdf']))
    {
        return True;
    }
    else
    {
        return False;
    }
}

function isAllowedFile($file)
{
    $extention=$file->getClientOriginalExtension();  
    if(in_array($extention,['pdf','xlsx','csv','file']))
    {
        return $extention;
    }
    else
    {
        return False;
    }
}

function uploadFile($file,$path)
{
    $extention=$file->getClientOriginalExtension();  
    $filename=uniqid().'.'.$extention;
    if($file->move($path,$filename))
    {
        $filename=$path.'/'.$filename;
        return $filename;
    }
    else
    {
        return false;
    }
}

function deleteFile($filename)
{
    if(File::exists($filename))
    {
        File::delete($filename);
    }
}

function studentsQuery()
{
    return User::where('utype','CST');
}

function spvQuery()
{
    return User::where('utype','SVP');
}


function defaultImage()
{
    return asset("assets/images/profiles/default.jpg");
}

