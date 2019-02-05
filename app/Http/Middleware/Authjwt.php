<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use App\Helpers\ResponseHelper;

class Authjwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(ResponseHelper $responseHelper){
        $this->responHelper = $responseHelper;
    }

    public function handle($request, Closure $next, $guard = null)
    {
        try {
            $user = JWTAuth::toUser($request->header('access'));
            
                $request->request->add([
                    "user_id" => $user["id"],
                    "email" => $user["email"]
                ]);
                return $next($request);
        } catch (JWTException $e) {
            if($e instanceof TokenExpiredException) {
                return response()->json($this->responHelper->errorCustom(220, "Request Expired"));
            }else if ($e instanceof TokenInvalidException) {
                return response()->json($this->responHelper->errorCustom(221, "Access Invalid"));
            }else{
                return response()->json($this->responHelper->errorCustom(221, "Request Invalid"));
            }
        }
    }
}
