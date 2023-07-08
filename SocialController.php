<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Socialite;
use Session;

class SocialController extends Controller
{
    public function redirect($provider)
    {
    	return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $userSocial 	=   Socialite::driver($provider)->stateless()->user();
        try {

            $data = array(
                'customer_name' => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'password'      => $userSocial->getId(),
                'provider'      => $provider,
                'provider_pic'  => $userSocial->getAvatar()
    
            );

            $response      = Http::post(config('sitepecific.api_url_v2').'socialsignup', $data);
            $response_data = json_decode($response);
          
            if($response_data->success == true){
                Session::put('access_token', $response_data->data->access_token);
                return redirect()->route('my-account')->with('success', $response_data->message);
            }else{
                return redirect()->route('signup')->with('error', $response_data->message);
            }
          
        } catch (\Exception $e) {
            return redirect()->route('signup')->with('error', 'Oops! Something went wrong please try again later');
        }
    }
}
