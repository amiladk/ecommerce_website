<?php
    $login =false;
        // api_v3
    $iss = [
        config('sitepecific.api_url_v2').'login',
        config('sitepecific.api_url_v2').'signup',
        config('sitepecific.api_url_v2').'socialsignup'
    ];

    if($token = Session::get('access_token')){

        $tokenParts   = explode(".", $token);  
        $tokenPayload = base64_decode($tokenParts[1]);
        $jwtPayload   = json_decode($tokenPayload);

        if(in_array($jwtPayload->iss,$iss)){

            $getCurrenTtime = new DateTime();
            $currenttime = $getCurrenTtime->format('Y-m-d H:i:s');
            $convertTime = strtotime($currenttime);

            if($jwtPayload->exp > $convertTime){
                $login =true;
            }else{
                Session::forget('access_token');
            }
            
        }else{
            Session::forget('access_token');
        }
    } 

    // api_v3
    $param = array(
        'franchise' => config('sitepecific.franchise'),
        'depth'     => 3,
    );

    $items = Http::get(config('sitepecific.api_url_v2').'get-categories',$param);  
    $list = json_decode($items);
    ?>

<div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay"></div>
        <!-- End of .mobile-menu-overlay -->

        <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
        <!-- End of .mobile-menu-close -->

        <div class="mobile-menu-container scrollable">
            <form method="get" action="/shop" class="input-wrapper">
                <input type="text" class="form-control" name="search_query" id="search_query" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#main-menu" class="nav-link active">Main Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="#categories" class="nav-link">Categories</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="main-menu">
                    <ul class="mobile-menu">
                        <li class="{{ (request()->is('/')) ? 'active' : '' }}">
                            <a href="/">Home</a>
                        </li>
                        <li class="{{ (request()->is('shop')) ? 'active' : '' }}">
                            <a href="/shop">Shop</a>
                        </li>
                        <li class="{{ (request()->is('cart')) ? 'active' : '' }}">
                            <a href="/cart">Cart</a>
                        </li>
                        <li class="{{ (request()->is('checkout')) ? 'active' : '' }}">
                            <a href="/checkout">Checkout</a>
                        </li>
                        <li class="{{ (request()->is('contact-us*')) ? 'active' : '' }}">
                            <a href="/contact-us">Contact Us</a>
                        </li>
                        <?php if($login){?>
                            <li class="{{ (request()->is('my-account*')) ? 'active' : '' }}"><a href="/my-account">My Account</a></li>
                        <?php }else{?>
                            <li class="{{ (request()->is('signup*')) ? 'active' : '' }}"><a href="/signup">Sign In / Register</a></li>
                        <?php }?>
                    </ul>
                </div>
                <div class="tab-pane" id="categories">
                    <ul class="mobile-menu">
                        @if(isset($list) && $list->success == true && $list->data != null)
                            @foreach($list->data as $parent)
                                <li>
                                    <a href="shop?category={{$parent->slug}}">
                                    {{$parent->label}}
                                    </a>
                                    <ul>
                                    @foreach($parent->sub as $child)
                                        <li>
                                            <a href="shop?category={{$child->slug}}">{{$child->label}}</a>
                                            <ul>
                                            @foreach($child->sub as $grand_child)
                                                <li><a href="shop?category={{$grand_child->slug}}">{{$grand_child->label}}</a>
                                                </li>
                                            @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        @endif
                        <li>
                            <a href="/shop"
                                class="font-weight-bold text-primary text-uppercase ls-25">
                                View All Categories<i class="w-icon-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>