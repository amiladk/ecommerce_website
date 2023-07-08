<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use DateTime;
use Validator;
use Mail;
use view;
use Cache;
class ApiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Public function / get Product Component Data
    |--------------------------------------------------------------------------
    */
    public function getProductComponentData(Request $request){

        $category = $request->category;

        if ( Cache::has(config('sitepecific.site').'get_product_component_data'.$category) ) {
            return Cache::get(config('sitepecific.site').'get_product_component_data'.$category);
        } else {

            // api_v3
            $param = array(
                'franchise' => config('sitepecific.franchise'),
                'limit'     => 8,
                'category'  => $category,
            );

            $items = Http::get(config('sitepecific.api_url_v2').'get-new-arrivals',$param);
            $data['items'] = json_decode($items);

            Cache::remember(config('sitepecific.site').'get_product_component_data'.$category, 60*60*24*7, function() use($data){
                return view('blocks.product_col',$data)->render();
            });
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Public function / get Tab Component Data Latest
    |--------------------------------------------------------------------------
    */
    public function getTabComponentDataLatest(Request $request){

        if ( Cache::has(config('sitepecific.site').'get_tab_component_data_latest') ) {
            return Cache::get(config('sitepecific.site').'get_tab_component_data_latest');
        } else {

            // api_v3
            $param = array(
                'franchise' => config('sitepecific.franchise'),
                'limit'     => 10,
            );

            $items = Http::get(config('sitepecific.api_url_v2').'get-new-arrivals',$param);
            $data['items'] = json_decode($items);

            Cache::remember(config('sitepecific.site').'get_tab_component_data_latest', 60*60*24*7, function() use($data){
                return view('blocks.product_tab',$data)->render();
            });
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Public function / get Tab Component Data Best Sellers
    |--------------------------------------------------------------------------
    */
    public function getTabComponentDataBestSeller(Request $request){

        if ( Cache::has(config('sitepecific.site').'get_tab_component_data_best_seller') ) {
            return Cache::get(config('sitepecific.site').'get_tab_component_data_best_seller');
        } else {

            // api_v3
            $param = array(
                'franchise' => config('sitepecific.franchise'),
                'limit'     => 10,
            );

            $items = Http::get(config('sitepecific.api_url_v2').'get-product-best-sellers',$param);
            $data['items'] = json_decode($items);

            Cache::remember(config('sitepecific.site').'get_tab_component_data_best_seller', 60*60*24*7, function() use($data){
                return view('blocks.product_tab',$data)->render();
            });
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Public function / get Tab Component Data To Rated
    |--------------------------------------------------------------------------
    */
    public function getTabComponentDataTopRated(Request $request){

        if ( Cache::has(config('sitepecific.site').'get_tab_component_data_top_rated') ) {
            return Cache::get(config('sitepecific.site').'get_tab_component_data_top_rated');
        } else {

            // api_v3
            $param = array(
                'franchise' => config('sitepecific.franchise'),
                'limit'     => 10,
            );

            $items = Http::get(config('sitepecific.api_url_v2').'get-product-top-rated',$param);
            $data['items'] = json_decode($items);

            Cache::remember(config('sitepecific.site').'get_tab_component_data_top_rated', 60*60*24*7, function() use($data){
                return view('blocks.product_tab',$data)->render();
            });
        }

    }


    /*
    |--------------------------------------------------------------------------
    | Public function / get Tab Component Data To Featured
    |--------------------------------------------------------------------------
    */
    public function getTabComponentDataFeatured(Request $request){

        if ( Cache::has(config('sitepecific.site').'get_tab_component_data_featured') ) {
            return Cache::get(config('sitepecific.site').'get_tab_component_data_featured');
        } else {

            // api_v3
            $param = array(
                'franchise' => config('sitepecific.franchise'),
                'limit'     => 10,
            );

            $items = Http::get(config('sitepecific.api_url_v2').'get-featured-product',$param);
            $data['items'] = json_decode($items);

            Cache::remember(config('sitepecific.site').'get_tab_component_data_featured', 60*60*24*7, function() use($data){
                return view('blocks.product_tab',$data)->render();
            });
        }

    }


    /*
    |--------------------------------------------------------------------------
    | Public function / get order details
    |--------------------------------------------------------------------------
    */
    public function getOrderDetails(Request $request){

        $order = Http::withHeaders([
            'content-Type'  => 'applications/json',
            'authorization' =>  $request->access_token
        ])->get(config('sitepecific.api_url').'orderdetails/'.$request->order_id);

        $data['order'] = json_decode($order);

        return view('blocks.order_details',$data);
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / get Tab Component Data To Featured
    |--------------------------------------------------------------------------
    */
    public function getShopMainContentData(Request $request){

        if($request->param){
            $url = config('sitepecific.api_url_v2').'get-shop-catalog'.$request->param.'&franchise='.config('sitepecific.franchise');
        }else{
            $url = config('sitepecific.api_url_v2').'get-shop-catalog'.'?franchise='.config('sitepecific.franchise');
        }

        $httpdata    = Http::get($url);
        $decode_data = json_decode($httpdata);

        $item_data = array(
            'items' => $decode_data->data->items,
            'type'  => $this-> get_type_from_request($request->param)
        );

        $filter_data['items'] =   $decode_data->data;

        // return response()->json($item_data);

        $product    = view('blocks.product',$item_data);
        $sidebaer   = view('blocks.shop_sidebar',$filter_data);
        $pagination = view('blocks.pagination',$filter_data);

        $shop['products']    = $product->render();
        $shop['sidebar']     = $sidebaer->render();
        $shop['pagination']  = $pagination->render();
        return  $shop;

    }

    public function getProductSingleMoreProducts(Request $request){

        // api_v3
        $param = array(
            'franchise' => config('sitepecific.franchise'),
            'limit'     => 12,
            'order_by'  => 'RAND'
        );

        $items = Http::get(config('sitepecific.api_url_v2').'get-all-product',$param);
        $data['items'] = json_decode($items);
        return view('blocks.more_products',$data);
    }


    private function get_type_from_request($params){
        $url = URL::to('/').$params;;
        $query_str = parse_url($url, PHP_URL_QUERY);
        parse_str($query_str, $query_params);
        if(isset($query_params['type'])){
            if($query_params['type']==='list'){
                return 'list';
            }else{
                return 'block';
            }
        }else{
            return 'block';
        }
    }


    public function getProductSingleData(Request $request){

        // api_v3
        $param = array(
            'franchise' => config('sitepecific.franchise'),
            'slug'      => $request->slug,
        );

        $items = Http::get(config('sitepecific.api_url_v2').'get-product-single',$param);
        $data['items'] = json_decode($items);
        return view('blocks.product_single',$data);
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / checkout
    |--------------------------------------------------------------------------
    */
    public function checkout(Request $request){

        // api_v3
        try {

            $validation_array = [
                "name"           => 'required',
                "address"        => 'required',
                "city"           => 'required',
                "phone"          => 'required',
                "payment_method" => 'required',
                "terms"          => 'required',
                "coupon_code"    => 'nullable',
            ];

            $validator = Validator::make($request->all(), $validation_array);

            if($validator->fails()){
                return redirect()->back()->with('error', implode(" / ",$validator->messages()->all()));
            }

            $data = array(
                "name"           => $request->name,
                "address"        => $request->address,
                "city"           => $request->city,
                "phone"          => $request->phone,
                "payment_method" => $request->payment_method,
                "terms"          => true,
                'franchise'      => config('sitepecific.franchise'),
                "coupon_code"    => $request->coupon_code,
            );

            $items =array();

            foreach ($request['product_id'] as $key => $product) {
                $items[$key] =array(
                    "product_id" => $product,
                    "quantity"   => $request['quantity'][$key],
                    "coupon"     => $request['coupon'][$key]
                );
            }

            $data['items'] =$items;

            $token = $this->tokenValid($request);

            if($token){
                $response = Http::withHeaders([
                    'authorization' =>  $token
                ])->post(config('sitepecific.api_url_v2').'create-order', $data);
                $response_data =json_decode($response);
            }else{
                $response = Http::post(config('sitepecific.api_url_v2').'create-order', $data);
                $response_data =json_decode($response);
            }

            $payhereCheckoutValue = array(
                'sandbox'         => false,
                'merchant_id'     => config('sitepecific.merchant_id'),
                'return_url'      => config('sitepecific.return_url'),
                'cancel_url'      => config('sitepecific.cancel_url'),
                'notify_url'      => config('sitepecific.notify_url'),
                'order_id'        => "",
                'items'           => "",
                'amount'          => "",
                'currency'        => "LKR",
                'first_name'      => "",
                'last_name'       => "",
                'email'           => "samanp@gmail.com",
                'phone'           => "0771234567",
                'address'         => "No.1, Galle Road",
                'city'            => "Colombo",
                'country'         => "Sri Lanka",
                'delivery_address'=> "No. 46, Galle road, Kalutara South",
                'delivery_city'   => "Kalutara",
                'delivery_country'=> "Sri Lanka",
                'hash'            => ""
            );

            if($response_data->success == true){

                if($request->payment_method == 'COD'){
                    return redirect()->route('order-success', ['order_id' => $response_data->data->order_id])->with('success', $response_data->message);
                }else if($request->payment_method == 'PP'){

                    $payhereCheckoutValue['order_id']   = $response_data->data->order_id;
                    $payhereCheckoutValue['items']      = $response_data->data->items;
                    $payhereCheckoutValue['amount']     = $response_data->data->amount;
                    $payhereCheckoutValue['first_name'] = $response_data->data->customer_name;
                    $payhereCheckoutValue['last_name']  = $response_data->data->customer_name;
                    $payhereCheckoutValue['hash']       = $response_data->data->hash;

                    $data['action'] =  config('sitepecific.action_url');

                    return view("payment", ["payhere"=>$payhereCheckoutValue, "data"=>$data]);

                }
            }else{
                return redirect()->back()->with('error', $response_data->message);
            }

        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Oops! Something went wrong please try again later');
        }

    }


    /*
    |--------------------------------------------------------------------------
    | Public function / signup
    |--------------------------------------------------------------------------
    */

    public function signup(Request $request){
        // api_v3
        try {

            $validation_array = [
                'customer_name'             => 'required|string|between:2,100',
                'email'                     => 'required|string|email|max:100',
                'password'                  => 'required|string|confirmed|min:4',
                'password_confirmation'     => 'required|string|min:4',

            ];

            $validator = Validator::make($request->all(), $validation_array);

            if($validator->fails()){
                return redirect()->route('signup')->with('error', implode(" / ",$validator->messages()->all()));
            }

            $data = array(
                "customer_name"         => $request->customer_name,
                "email"                 => $request->email,
                "password"              => $request->password,
                "password_confirmation" => $request->password_confirmation,
                'franchise'             => config('sitepecific.franchise'),
            );

            $response      = Http::post(config('sitepecific.api_url_v2').'signup', $data);
            $response->throw();
            $response_data = json_decode($response);

            if($response_data->success == true){
                $request->session()->put('access_token', $response_data->data->access_token);
                return redirect()->route('my-account')->with('success', $response_data->message);
            }else{
                return redirect()->route('signup')->with('error', $response_data->message[0]);
            }

        } catch (\Exception $e) {
            return redirect()->route('signup')->with('error', 'Oops! Something went wrong please try again later');
        }


    }

    /*
    |--------------------------------------------------------------------------
    | Public function / signin
    |--------------------------------------------------------------------------
    */
    public function signin(Request $request){
        // api_v3
        try {

            $validation_array = [
                'email'         => 'required|string|email|max:100',
                'password'      => 'required|string|min:4',

            ];

            $validator = Validator::make($request->all(), $validation_array);

            if($validator->fails()){
                return redirect()->route('signup')->with('error', implode(" / ",$validator->messages()->all()));
            }

            $data = array(
                "email"         => $request->email,
                "password"      => $request->password,
                'franchise'     => config('sitepecific.franchise'),
            );

            $response = Http::post(config('sitepecific.api_url_v2').'login', $data);
            $response_data = json_decode($response);

            if($response_data->success == true){
                $request->session()->put('access_token', $response_data->data->access_token);
                return redirect()->route('my-account')->with('success', $response_data->message);
            }else{
                return redirect()->route('signup')->with('error', $response_data->message);
            }

        } catch (\Exception $e) {
            return redirect()->route('signup')->with('error', 'Oops! Something went wrong please try again later');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / Logout
    |--------------------------------------------------------------------------
    */
    public function logout(Request $request){

        $request->session()->flush();
        return redirect()->route('home')->with('success', 'Sign out successful');

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
    | Public function / get Tab Component Data Best Sellers
    |--------------------------------------------------------------------------
    */
    public function getProductsBestSellerData(Request $request){

        if ( Cache::has(config('sitepecific.site').'get_products_best_seller_data') ) {
            return Cache::get(config('sitepecific.site').'get_products_best_seller_data');
        } else {

            // api_v3
            $param = array(
                'franchise' => config('sitepecific.franchise'),
                'limit'     => 4,
            );

            $items = Http::get(config('sitepecific.api_url_v2').'get-product-best-sellers',$param);
            $data['items'] = json_decode($items);

            Cache::remember(config('sitepecific.site').'get_products_best_seller_data', 60*60*24*7, function() use($data){
                return view('blocks.aryans_product_widget',$data)->render();
            });
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Public function / get Product Single Tab Nav Data
    |--------------------------------------------------------------------------
    */
    public function getProductSingleTabnavData(Request $request){

        $param = array(
            'franchise' => config('sitepecific.franchise'),
            'slug'      => $request->slug,
        );

        $items = Http::get(config('sitepecific.api_url_v2').'get-product-single',$param);
        $data['items'] = json_decode($items);

        $param = array(
            'product'       => $data['items']->data->id,
        );

        $reviews = Http::get(config('sitepecific.api_url_v2').'get-product-review',$param);
        $data['reviews'] = json_decode($reviews);

        return view('blocks.aryans_product_single_tab_nav',$data);
    }

    /*
    |--------------------------------------------------------------------------
    | Public function / Review Form
    |--------------------------------------------------------------------------
    */

    public function review(Request $request){

        try {
            $validation_array = [
                'author'        => 'required|string|between:2,100',
                'email'         => 'required|string|email|max:100',
                'product'       => 'required',
                'rating'        => 'required',
                'review'        => 'required',
            ];

            $validator = Validator::make($request->all(), $validation_array);

            if($validator->fails()){
                return redirect()->back()->with('error', implode(" / ",$validator->messages()->all()));
            }

            $data = array(
                "author"        => $request->author,
                "email"         => $request->email,
                "product"       => $request->product,
                "rating"        => $request->rating,
                "review_body"   => $request->review,
            );

        // api_v3
            $response = Http::post(config('sitepecific.api_url_v2').'create-product-reviews',$data);
            $response->throw();
            $response_data =json_decode($response);

            return redirect()->back()->with('success', 'Review successfully submited');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Oops! Something went wrong please try again later');
        }

    }

    public function getProductSingleRelatedProductsData(Request $request){

        // api_v3
        $param = array(
            'franchise' => config('sitepecific.franchise'),
            'slug'     => $request->slug,
        );

        $items = Http::get(config('sitepecific.api_url_v2').'get-product-related',$param);
        $data['items'] = json_decode($items);

        return view('blocks.aryans_related_product',$data);
    }


    /*
    |--------------------------------------------------------------------------
    | Public function / get product category wrapper data
    |--------------------------------------------------------------------------
    */
    public function getProductCategoryWrapData(Request $request){

        $category = $request->category;

        if ( Cache::has(config('sitepecific.site').'get_product_category_wrap_data'.$category) ) {
            return Cache::get(config('sitepecific.site').'get_product_category_wrap_data'.$category);
        } else {

            // api_v3
            $param = array(
                'franchise' => config('sitepecific.franchise'),
                'slug'     => $category,
            );

            Cache::remember(config('sitepecific.site').'get_product_category_wrap_data'.$category, 60*60*24*7, function() use($param){
                $items = Http::get(config('sitepecific.api_url_v2').'get-category-by-slug',$param);
                return response()->json(json_decode($items));
            });
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Public function / Contact Form
    |--------------------------------------------------------------------------
    */

    public function contact(Request $request){

        try {

            $validation_array = [
                "name"       => 'required',
                "email"      => 'required|string|email|max:100',
                "bodyText"   => 'required',

            ];

            $validator = Validator::make($request->all(), $validation_array);

            if($validator->fails()){
                return redirect()->route('contact-us')->with('error', implode(" / ",$validator->messages()->all()));
            }
            Mail::send('mail.contact',
            array(
                'name'     => $request->name,
                'email'    => $request->email,
                'bodyText' => $request->bodyText,
            ), function($message) use ($request)
            {
                $message->from($request->email);
                $message->subject('Contact us');
                $message->to('info@aryanselectronics.com');
            });

            return redirect()->route('contact-us')->with('success', 'Email successfully submited');


        } catch (\Exception $e) {
            return redirect()->route('contact-us')->with('error', 'Oops! Something went wrong please try again later');
        }

    }



    /*
    |--------------------------------------------------------------------------
    | Public function / forget password submit
    |--------------------------------------------------------------------------
    */
    public function forgetPasswordSubmit(Request $request){
        // api_v3
        try {


            $validation_array = [
                'email'         => 'required|string|email|max:100',
            ];

            $validator = Validator::make($request->all(), $validation_array);

            if($validator->fails()){
                return redirect()->back()->with('error', implode(" / ",$validator->messages()->all()));
            }

            $data = array(
                "email"         => $request->email,
                'franchise' => config('sitepecific.franchise'),
            );


            $response = Http::post(config('sitepecific.api_url_v2').'get-password-reset', $data);
            $response_data = json_decode($response);

            //return response()->json($response_data);

            if($response_data->success == true && $response_data->data != null){

                Mail::send('mail.forget_pass_email',
                array(
                    'token'    => $response_data->data->token,// API token
                    'email'    => $response_data->data->email,
                    'base_url' => URL::to('/'),
                ), function($message) use ($response_data)
                {
                    $message->from('info@aryanselectronics.com');
                    $message->subject('Password Reset');
                    $message->to($response_data->data->email);
                });
                return redirect()->back()->with('success', $response_data->message);
            }else{
                return redirect()->back()->with('error', $response_data->message);
            }

        } catch (\Exception $e) {

           // return response()->json($e->getMessage());
            return redirect()->back()->with('error', 'Oops! Something went wrong please try again later');
        }

    }



     /*
    |--------------------------------------------------------------------------
    | Public function / password reset submit
    |--------------------------------------------------------------------------
    */
    public function passwordResetSubmit(Request $request){
        // api_v3
        try {

            $validation_array = [
                'password'              => 'required|string|min:4|confirmed',
                'password_confirmation' => 'required',
                'token'                 => 'required'
            ];

            $validator = Validator::make($request->all(), $validation_array);

            if($validator->fails()){
                return redirect()->back()->with('error', implode(" / ",$validator->messages()->all()));
            }

            $data = array(
                "password"              => $request->password,
                "password_confirmation" => $request->password_confirmation,
                "token"                 => $request->token
            );

            $response = Http::post(config('sitepecific.api_url_v2').'password-reset', $data);
            $response_data = json_decode($response);

            if($response_data->success == true){
                return redirect('/signup')->with('success', $response_data->message);
            }else{
                return redirect()->back()->with('error', $response_data->message);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Oops! Something went wrong please try again later');
        }

    }



    /*
    |--------------------------------------------------------------------------
    | Public function / Newsletter Form
    |--------------------------------------------------------------------------
    */

    public function newsletter(Request $request){

        try {
            $validation_array = [
                'email'         => 'required|string|email|max:100',
            ];

            $validator = Validator::make($request->all(), $validation_array);

            if($validator->fails()){
                return redirect()->route('home')->with('error', implode(" / ",$validator->messages()->all()));
            }

            $data = array(
                "email"         => $request->email,
                'franchise'     => config('sitepecific.franchise'),
            );

            $response = Http::post(config('sitepecific.api_url_v2').'create-newsletter', $data);
            $response_data =json_decode($response);

            if($response_data->success == true){
                return redirect()->route('home')->with('success', $response_data->message);
            }else{
                return redirect()->route('home')->with('error', $response_data->message);
            }

        } catch (\Exception $e) {

            return redirect()->route('home')->with('error', 'Oops! Something went wrong please try again later');
        }

    }

    public function getLoadMoreData(Request $request){

        $items = Http::get(config('sitepecific.api_url_v2').'load-more-product?page='.$request->page);
        $data['items'] =json_decode($items)->data;

        $result['view'] = view('blocks.load_more',$data)->render();
        $result['page'] = $data['items']->page;

        return $result;
    }


    public function applyCouponCode(Request $request){

        try {
            $validation_array = [
                'coupon_code'  => 'required',
            ];

            $validator = Validator::make($request->all(), $validation_array);

            if($validator->fails()){
                return redirect()->route('home')->with('error', implode(" / ",$validator->messages()->all()));
            }

            $data = array(
                "coupon_code"   => $request->coupon_code,
                'franchise'     => config('sitepecific.franchise'),
            );

            $response = Http::get(config('sitepecific.api_url_v2').'apply-coupon-code', $data);
            $response_data =json_decode($response);
            return response()->json($response_data);
        }
        catch (\Throwable $e) {
            return response()->json('Oops! Something went wrong please try again later'.$e->getMessage());
        }
    }

}

