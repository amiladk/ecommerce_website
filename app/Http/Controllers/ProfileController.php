<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use DateTime;
use Validator;

class ProfileController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Public function / my account
    |--------------------------------------------------------------------------
    */ 
    public function myAccountPage(Request $request){

        // api_v3
        try {

            $customer = Http::withHeaders([
                'content-Type'  => 'applications/json',
                'authorization' =>  $request->session()->get('access_token')
            ])->get(config('sitepecific.api_url_v2').'get-customer');
            
            $orders = Http::withHeaders([
                'content-Type'  => 'applications/json',
                'authorization' =>  $request->session()->get('access_token')
            ])->get(config('sitepecific.api_url_v2').'get-recent-orders');
    
            $addresses = Http::withHeaders([
                'content-Type'  => 'applications/json',
                'authorization' =>  $request->session()->get('access_token')
            ])->get(config('sitepecific.api_url_v2').'get-customer-addresses');
    
            $numbers = Http::withHeaders([
                'content-Type'  => 'applications/json',
                'authorization' =>  $request->session()->get('access_token')
            ])->get(config('sitepecific.api_url_v2').'get-customer-phone-numbers');

            // api_v3
            $param = array(
                'franchise' => config('sitepecific.franchise'),
            );
    
            $cities = Http::get(config('sitepecific.api_url_v2').'get-checkout-city',$param);  
            
      
            $data['customer']     = json_decode($customer);
            $data['orders']       = json_decode($orders);
            $data['cities']       = json_decode($cities);
            $data['addresses']    = json_decode($addresses);
            $data['numbers']      = json_decode($numbers);
            $data['access_token'] = $request->session()->get('access_token');

           //return response()->json(json_decode($customer));
            
            return view('my_account_page',$data);

          
        } catch (\Exception $e) {      
            return redirect()->route('signup')->with('error', 'Oops! Something went wrong please try again later');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / add New Address
    |--------------------------------------------------------------------------
    */ 
    public function addNewAddress(Request $request){
   // api_v3
        try {

            $validation_array = [
                'address'   => 'required|string',
                'city'      => 'required|string',
            ];
    
            $validator = Validator::make($request->all(), $validation_array);
    
            if($validator->fails()){
                return redirect()->back()->with('error', implode(" / ",$validator->messages()->all()));
            }  
    
            $data = array(
                "address"    => $request->address,
                "cityId"     => $request->city,
            );

            $response = Http::withHeaders([
                'content-Type'  => 'application/json',
                'authorization' => $request->session()->get('access_token')
            ])->post(config('sitepecific.api_url_v2').'create-customer-address',$data);

            $response_data = json_decode($response);
          
            if($response_data->success == true){
                return redirect()->back()->with('success', $response_data->message);
            }else{
                return redirect()->back()->with('error', $response_data->message);
            }
          
        } catch (\Exception $e) {      
            return redirect()->back()->with('error', 'Oops! Something went wrong please try again later');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Public function / add New Phone Number 
    |--------------------------------------------------------------------------
    */ 
    public function addNewPhoneNumber(Request $request){
    // api_v3
        try {

            $validation_array = [
                'phone'   => 'required',
            ];
    
            $validator = Validator::make($request->all(), $validation_array);
    
            if($validator->fails()){
                return redirect()->back()->with('error', implode(" / ",$validator->messages()->all()));
            } 

            $data = array(
                "phone_number"  => $request->phone,
            );
    
            $validator = Validator::make($request->all(), $validation_array);
    
            if($validator->fails()){
                return redirect()->back()->with('error', implode(" / ",$validator->messages()->all()));
            } 

            $response = Http::withHeaders([
                'content-Type'  => 'application/json',
                'authorization' => $request->session()->get('access_token')
            ])->post(config('sitepecific.api_url_v2').'create-customer-phone-number',$data);

            $response_data = json_decode($response);
          
            if($response_data->success == true){
                return redirect()->back()->with('success', $response_data->message);
            }else{
                return redirect()->back()->with('error', $response_data->message);
            }
          
        } catch (\Exception $e) {      
            return redirect()->back()->with('error', 'Oops! Something went wrong please try again later');
        }
    }



    /*
    |--------------------------------------------------------------------------
    | Public function / Remove Phone Number 
    |--------------------------------------------------------------------------
    */ 
    public function removePhoneNumber(Request $request){
    // api_v3
        try {

            $validation_array = [
                'set_value'   => 'required',
            ];
    
            $validator = Validator::make($request->all(), $validation_array);
    
            if($validator->fails()){
                return redirect()->back()->with('error', implode(" / ",$validator->messages()->all()));
            } 

            $data = array(
                "phone_number"  => $request->set_value,
            );
    
            $response = Http::withHeaders([
                'content-Type'  => 'application/json',
                'authorization' => $request->session()->get('access_token')
            ])->post(config('sitepecific.api_url_v2').'remove-phone-number',$data);

            $response_data = json_decode($response);

            if($response_data->success == true){
                return redirect()->back()->with('success', $response_data->message);
            }else{

                return redirect()->back()->with('error', $response_data->message);
            }
        
        } catch (\Exception $e) {      
            return redirect()->back()->with('error', 'Oops! Something went wrong please try again later'.$e->getMessage());
        }

    }



    /*
    |--------------------------------------------------------------------------
    | Public function / Remove Address
    |--------------------------------------------------------------------------
    */ 
    public function removeAddress(Request $request){
        // api_v3
        try {

            $validation_array = [
                'set_value'   => 'required',
            ];
    
            $validator = Validator::make($request->all(), $validation_array);
    
            if($validator->fails()){
                return redirect()->back()->with('error', implode(" / ",$validator->messages()->all()));
            }  
    
            $data = array(
                "address"    => $request->set_value,
            );

            $response = Http::withHeaders([
                'content-Type'  => 'application/json',
                'authorization' => $request->session()->get('access_token')
            ])->post(config('sitepecific.api_url_v2').'remove-address',$data);

            $response_data = json_decode($response);
        
            if($response_data->success == true){
                return redirect()->back()->with('success', $response_data->message);
            }else{
                return redirect()->back()->with('error', $response_data->message);
            }
        
        } catch (\Exception $e) {      
            return redirect()->back()->with('error', 'Oops! Something went wrong please try again later');
        }
    }



    /*
    |--------------------------------------------------------------------------
    | Public function / Set Default Address
    |--------------------------------------------------------------------------
    */ 
    public function setDefaultAddress(Request $request){

       // return response()->json($request);
        // api_v3
        try {

            $validation_array = [
                'set_value'   => 'required',
            ];
    
            $validator = Validator::make($request->all(), $validation_array);
    
            if($validator->fails()){
                return redirect()->back()->with('error', implode(" / ",$validator->messages()->all()));
            }  
    
            $data = array(
                "address_id"    => $request->set_value,
            );

            $response = Http::withHeaders([
                'content-Type'  => 'application/json',
                'authorization' => $request->session()->get('access_token')
            ])->post(config('sitepecific.api_url_v2').'change-default-address',$data);

            $response_data = json_decode($response);

           // return response()->json($response_data);
        
            if($response_data->success == true){
                return redirect()->back()->with('success', $response_data->message);
            }else{
                return redirect()->back()->with('error', $response_data->message);
            }
        
        } catch (\Exception $e) {      
            return redirect()->back()->with('error', 'Oops! Something went wrong please try again later');
        }
    }






    /*
    |--------------------------------------------------------------------------
    | Public function / Set Default Phone
    |--------------------------------------------------------------------------
    */ 
    public function setDefaultPhone(Request $request){
        // api_v3
        try {

            $validation_array = [
                'set_value'   => 'required',
            ];
    
            $validator = Validator::make($request->all(), $validation_array);
    
            if($validator->fails()){
                return redirect()->back()->with('error', implode(" / ",$validator->messages()->all()));
            }  
    
            $data = array(
                "phone_id"    => $request->set_value,
            );

            $response = Http::withHeaders([
                'content-Type'  => 'application/json',
                'authorization' => $request->session()->get('access_token')
            ])->post(config('sitepecific.api_url_v2').'change-default-phone-number',$data);

            $response_data = json_decode($response);
        
            if($response_data->success == true){
                return redirect()->back()->with('success', $response_data->message);
            }else{
                return redirect()->back()->with('error', $response_data->message);
            }
        
        } catch (\Exception $e) {      
            return redirect()->back()->with('error', 'Oops! Something went wrong please try again later');
        }
    }

    


    /*
    |--------------------------------------------------------------------------
    | Public function / Edit Address 
    |--------------------------------------------------------------------------
    */ 
    public function editAddress(Request $request){
        // api_v3
        try {

            $validation_array = [
                'city'       => 'required',
                'address'    => 'required',
                'address_id' => 'required',
            ];
    
            $validator = Validator::make($request->all(), $validation_array);
    
            if($validator->fails()){
                return redirect()->back()->with('error', implode(" / ",$validator->messages()->all()));
            }  
    
            $data = array(
                'city'       => $request->city,
                'address'    => $request->address,
                'address_id' => $request->address_id,
            );

            $response = Http::withHeaders([
                'content-Type'  => 'application/json',
                'authorization' => $request->session()->get('access_token')
            ])->post(config('sitepecific.api_url_v2').'edit-customer-address',$data);

            $response_data = json_decode($response);
            
            if($response_data->success == true){
                return redirect()->back()->with('success', $response_data->message);
            }else{
                return redirect()->back()->with('error', $response_data->message);
            }
        
        } catch (\Exception $e) {      
            return redirect()->back()->with('error', 'Oops! Something went wrong please try again later');
        }
    }




    /*
    |--------------------------------------------------------------------------
    | Public function / Edit Phone 
    |--------------------------------------------------------------------------
    */ 
    public function editPhone(Request $request){
        // api_v3
        try {

            $validation_array = [
                'phone'       => 'required',
                'phone_id'    => 'required',
               
            ];
    
            $validator = Validator::make($request->all(), $validation_array);
    
            if($validator->fails()){
                return redirect()->back()->with('error', implode(" / ",$validator->messages()->all()));
            }  
    
            $data = array(

                'phone_number'  => $request->phone,
                'phone_id'      => $request->phone_id,
            );

            $response = Http::withHeaders([
                'content-Type'  => 'application/json',
                'authorization' => $request->session()->get('access_token')
            ])->post(config('sitepecific.api_url_v2').'edit-customer-phone-number',$data);

            $response_data = json_decode($response);
        
            if($response_data->success == true){
                return redirect()->back()->with('success', $response_data->message);
            }else{
                return redirect()->back()->with('error', $response_data->message);
            }
        
        } catch (\Exception $e) {      
            return redirect()->back()->with('error', 'Oops! Something went wrong please try again later');
        }
    }



      /*
    |--------------------------------------------------------------------------
    | Public function / password reset submit 
    |--------------------------------------------------------------------------
    */ 
    public function editAccountDetails(Request $request){

       

        try {

            $validation_array = [
                'customer_name'         => 'required',
            ];

            if($request->has('password-required')){
                $validation_array['old_password']           = 'required';
                $validation_array['password']               = 'required';
                $validation_array['password_confirmation']  = 'required';
            }  
    
            $validator = Validator::make($request->all(), $validation_array);
    
            if($validator->fails()){
                return redirect()->back()->with('error', implode(" / ",$validator->messages()->all()));
            }  

            $data = array(
                "customer_name"         => $request->customer_name, 
            );


            if($request->has('password-required')){
                $data['password-required']      = true;
                $data['old_password']           = $validator->valid()['old_password'];
                $data['password']               = $validator->valid()['password'];
                $data['password_confirmation']  = $validator->valid()['password_confirmation'];
            }  


            $response = Http::withHeaders([
                'content-Type'  => 'application/json',
                'authorization' => $request->session()->get('access_token')
            ])->post(config('sitepecific.api_url_v2').'change-account-details',$data);

            $response_data = json_decode($response);

           

            if($response_data->success == true){
                $request->session()->flush();
                return redirect()->route('signup')->with('success', $response_data->message);
            }else{
                return redirect()->back()->with('error', $response_data->message);
            }
          
        } catch (\Exception $e) {     
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    
}
