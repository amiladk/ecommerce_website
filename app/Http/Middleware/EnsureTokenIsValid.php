<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DateTime;
class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
         // api_v3
        $iss = [
            config('sitepecific.api_url_v2').'login',
            config('sitepecific.api_url_v2').'signup',
            config('sitepecific.api_url_v2').'socialsignup'
        ];

        if($token = $request->session()->get('access_token')){

            $tokenParts   = explode(".", $token);  
            $tokenPayload = base64_decode($tokenParts[1]);
            $jwtPayload   = json_decode($tokenPayload);


            if(in_array($jwtPayload->iss,$iss)){

                $getCurrenTtime = new DateTime();
                $currenttime = $getCurrenTtime->format('Y-m-d H:i:s');
                $convertTime = strtotime($currenttime);

                if($jwtPayload->exp > $convertTime){
                    return $next($request);
                }
                
            }
        }  
        
        $request->session()->flush();
        return redirect('/');    
        
    }
}
