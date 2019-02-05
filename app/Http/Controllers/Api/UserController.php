<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ResponseHelper;
use App\User;
use JWTAuth;
use Hash;
use Log;
use DB;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
    	$this->responHelper = new ResponseHelper;
    }

    public function login(Request $request)
    {
    	$rules = [
    		'username' => 'required',
    		'password' => 'required',
    	];

    	$input = $request->only('username', 'password');
    	$validator = Validator::make($input, $rules);
    	if($validator->fails())
    	{
    		$error = $validator->message()->toJson();
    		return json_encode($this->responHelper->errorCustom(410, "Invalid Username or Password"));
    	}

    	$username = $request->username;

    	$user = User::where('name', $username)->first();

    	if(Hash::check($request->password, $user["password"]))
	    	{
	    		$token = JWTAuth::fromUser($user);
	    		// dd($token);
	    		if(!is_object($token) && !is_null($token))
		    		{
		    			
			    		$data = array(
			    				'token' => $token,
			    				'user' => $user
			    			);

			    		return $this->responHelper->successWithData($data);
		    		}
	    		else
		    		{
		    			return $this->responHelper->errorSomething();
		    		}
	    	}
	    else
	    	{
	    		return $this->responHelper->errorCredentials();
	    	}
    }

    public function logout(Request $request)
    {
    	$logout = JWTAuth::invalidate(($request->header('access')));

        if ($logout) {
            return $this->responHelper->successWithoutData("Logout Success");
        }

        return $this->responseHelper->errorCustom(400, "Logout Failed");
    }

}
