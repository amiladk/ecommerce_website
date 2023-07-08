<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use DateTime;
use Response;
class ViewController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Public function / Index
    |--------------------------------------------------------------------------
    */
    public function index(){

        return view('home');
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / Login PoupUp
    |--------------------------------------------------------------------------
    */
    public function loginPopup(){

        return view('blocks.login');
    }


    /*
    |--------------------------------------------------------------------------
    | Public function / product Default
    |--------------------------------------------------------------------------
    */
    // public function productDefault(Request $request){

    //     $data['slug'] = $request->route('slug');
    //     return view('product_default',$data);
    // }



    /*
    |--------------------------------------------------------------------------
    | Public function / product Default
    |--------------------------------------------------------------------------
    */
    public function productDefault(Request $request){

        try {

            $param = array(
                'franchise' => config('sitepecific.franchise'),
                'slug'      => $request->slug,
            );

            $items = Http::get(config('sitepecific.api_url_v2').'get-product-single',$param);
            $response_data =json_decode($items);

            //return response()->json($response_data);

            if($response_data->success == true && $response_data->data){

                $data['slug']  = $response_data->data->slug;
                $data['name']  = $response_data->data->name;
                $data['items'] = $response_data;

                return view('product_default',$data);
            }else{
                return redirect()->route('shop')->with('error', $response_data->message);
            }

        }
        catch (\Exception $e) {
            return redirect()->route('shop')->with('error', 'Oops! Something went wrong please try again later');
        }

    }



    /*
    |--------------------------------------------------------------------------
    | Public function / shop
    |--------------------------------------------------------------------------
    */
    public function shopPage(){

        return view('shop_page');
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / cart
    |--------------------------------------------------------------------------
    */
    public function cartPage(){
        // api_v3
        $param = array(
            'franchise' => config('sitepecific.franchise'),
        );

        $cities = Http::get(config('sitepecific.api_url_v2').'get-checkout-city',$param);
        $data['cities'] = json_decode($cities);
        return view('cart_page',$data);
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / checkout
    |--------------------------------------------------------------------------
    */
    public function checkoutPage(Request $request){
        // api_v3
        try {

            $token = $this->tokenValid($request);

            $param = array(
                'franchise' => config('sitepecific.franchise'),
            );

            $cities = Http::get(config('sitepecific.api_url_v2').'get-checkout-city',$param);
            $data['cities'] = json_decode($cities);

          //  return response()->json($data['cities']);

            if($token){

                $address = Http::withHeaders([
                    'content-Type'  => 'applications/json',
                    'authorization' =>  $token
                ])->get(config('sitepecific.api_url_v2').'get-customer-default-address');

                $data['address'] = json_decode($address);

                $number = Http::withHeaders([
                    'content-Type'  => 'applications/json',
                    'authorization' =>  $token
                ])->get(config('sitepecific.api_url_v2').'get-customer-default-phone-number');

                $data['number']   = json_decode($number);
                $data['address']  = json_decode($address);
                $data['login']    = true;
            }else{
                $data['number']   = null;
                $data['address']  = null;
                $data['login']    = false;
            }

            return view('checkout_page',$data);



        } catch (\Exception $e) {

            return redirect()->route('home')->with('error', 'Oops! Something went wrong please try again later');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / contact us
    |--------------------------------------------------------------------------
    */
    public function contatcusPage(){

        return view('contact_us_page');
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / order_success
    |--------------------------------------------------------------------------
    */
    public function orderSuccess(Request $request){

        // api_v3
        try {

            $order_id=$request->order_id;

            $param = array(
                'franchise'     => config('sitepecific.franchise'),
                'search_code'   => $order_id,
            );
            $response = Http::get(config('sitepecific.api_url_v2').'get-order-success-details',$param);
            $order    = json_decode($response);

            $data['order'] = $order->data;

            if($order->success == true && $order->data != null){
                return view('order_success',$data);
            }else{
                return redirect()->route('home')->with('success', $order->message);
            }

        } catch (\Exception $e) {

            return redirect()->route('home')->with('error', 'Oops! Something went wrong please try again later');
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Private function / token Validation
    |--------------------------------------------------------------------------
    */
    private function tokenValid($request){
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
                    return $token;
                }

            }
        }

        $request->session()->forget(['name', 'access_token']);
        return false;
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / signup & register
    |--------------------------------------------------------------------------
    */
    public function signupPage(){

        return view('signup');
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / 404 page
    |--------------------------------------------------------------------------
    */
    public function errorPage(){

        return view('404_page');
    }

    /************************************************************************/

    /*
    |--------------------------------------------------------------------------
    | Public function / aryans
    |--------------------------------------------------------------------------
    */
    public function aryans(){

        return view('aryans_home');
    }


    /*
    |--------------------------------------------------------------------------
    | Public function / forget password page
    |--------------------------------------------------------------------------
    */
    public function forgetPasswordPage(){

        return view('forget_pass');
    }



    /*
    |--------------------------------------------------------------------------
    | Public function / password reset page
    |--------------------------------------------------------------------------
    */
    public function passwordResetPage($token){

        try {

            $param = array(
                'token'   => $token,
            );
            $response   = Http::get(config('sitepecific.api_url_v2').'get-token',$param);
            $response_data  = json_decode($response);

            $data['token'] =  $response_data ->data;

            if( $response_data ->success == true &&  $response_data->data != null){
                return view('password_reset',$data);
            }else{
                return redirect()->back()->with('error',  $response_data->message);
            }

        } catch (\Exception $e) {

            return redirect()->route('home')->with('error', 'Oops! Something went wrong please try again later');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / terms & condition
    |--------------------------------------------------------------------------
    */
    public function termsConditionPage(){

        return view('terms_&_condition');
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / faq
    |--------------------------------------------------------------------------
    */
    public function faqPage(){

        return view('faq');
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / terms & condition
    |--------------------------------------------------------------------------
    */
    public function returnPolicyPage(){

        return view('return_policy');
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / privacy policy
    |--------------------------------------------------------------------------
    */
    public function privacyPolicyPage(){

        return view('privacy_policy');
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / privacy policy
    |--------------------------------------------------------------------------
    */
    public function aboutusPage(){

        return view('aboutus');
    }

     /*
    |--------------------------------------------------------------------------
    | Public function / privacy policy
    |--------------------------------------------------------------------------
    */
    public function sitemap(){

        try {

            $param = array(
                'franchise'     => config('sitepecific.franchise'),
            );

            $response   = Http::get(config('sitepecific.api_url_v2').'get-site-map-data',$param);
            $response_data  = json_decode($response);

            if( $response_data ->success == true &&  $response_data->data != null){

                $contents = View::make('sitemap')->with('data', json_decode(json_encode($response_data->data), true));
                $response = Response::make($contents);
                $response->header('Content-Type', 'application/xml');

                return $response;
            }

        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Oops! Something went wrong please try again later');
        }

    }

}
