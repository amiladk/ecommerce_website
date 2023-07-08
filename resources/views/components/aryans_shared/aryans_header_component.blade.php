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
    
    
    <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">Welcome to Aryans</p>
                    </div>
                    <div class="header-right pr-0">
                        <div class="dropdown">
                            <a href="#currency">LKR</a>
                            <!--
                            <div class="dropdown-box">
                                <a href="#USD">USD</a>
                                <a href="#EUR">EUR</a>
                            </div>
                            -->
                        </div>
                        <!-- End of DropDown Menu -->

                        <div class="dropdown">
                            <a href="#language"><img src="/assets/images/flags/eng.png" alt="ENG Flag" width="14"
                                    height="8" class="dropdown-image" /> ENG</a>
                             <!--       
                            <div class="dropdown-box">
                                <a href="#ENG">
                                    <img src="/assets/images/flags/eng.png" alt="ENG Flag" width="14" height="8"
                                        class="dropdown-image" />
                                    ENG
                                </a>
                                <a href="#FRA">
                                    <img src="/assets/images/flags/fra.png" alt="FRA Flag" width="14" height="8"
                                        class="dropdown-image" />
                                    FRA
                                </a>
                            </div>
                            -->
                        </div>
                        <!-- End of Dropdown Menu -->
                        <span class="divider d-lg-show"></span>
                        <a href="/contact-us" class="d-lg-show">Contact Us</a>
                        <?php if($login){?>
                            <div class="dropdown">
                                <i class="w-icon-user"></i>
                                <div class="dropdown-box">
                                    <a href="/my-account" class="d-lg-show">My Account</a>
                                    <a href="/logout" class="d-lg-show">Logout</a>
                                </div>
                            </div>
                        <?php }else{?>
                        <a href="/login-popup" class="d-lg-show login sign-in"><i
                                class="w-icon-account"></i>Sign In</a>
                        <span class="delimiter d-lg-show">/</span>
                        <a href="/login-popup" class="ml-0 d-lg-show login register">Register</a>
                        <?php }?>
                    </div>
                </div>
            </div>
            <!-- End of Header Top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left mr-md-4">
                        <a href="#" class="mobile-menu-toggle  w-icon-hamburger">
                        </a>
                        <a href="/" class="logo ml-lg-0">
                            <img src="/assets/images/demos/demo4/header-logo-aryans.png" alt="logo" width="145" height="45" />
                        </a>
                        <nav class="main-nav">
                            <ul class="menu">
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
                            </ul>
                        </nav>
                    </div>
                    <div class="header-right ml-4">
                        <div class="header-call d-xs-show d-lg-flex align-items-center">
                            <a href="tel:#" class="w-icon-call"></a>
                            <div class="call-info d-xl-show">
                                <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                    <a href="mailto:#" class="text-capitalize">Call Us Now</a>:</h4>
                                <a href="tel:0 114 225 990" class="phone-number ls-50">+94 114 225 990
                            </a>
                            </div>
                        </div>
                        <!--
                        <a class="wishlist label-down link d-xs-show" href="wishlist.html">
                            <i class="w-icon-heart"></i>
                            <span class="wishlist-label d-lg-show">Wishlist</span>
                        </a>
                        <a class="compare label-down link d-xs-show" href="compare.html">
                            <i class="w-icon-compare"></i>
                            <span class="compare-label d-lg-show">Compare</span>
                        </a>
                        -->
                        <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                            <div class="cart-overlay"></div>
                            <a href="#" class="cart-toggle label-down link">
                                <i class="w-icon-cart" id="aryans-cart-icon">
                                </i>
                                <span class="cart-label">Cart</span>
                            </a>
                            <div class="dropdown-box">
                                <div class="cart-header">
                                    <span>Shopping Cart</span>
                                    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                                </div>

                                <div class="products" id="aryans-cart">
                    
                                </div>

                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price" id="drop-cart-sub-total">$58.67</span>
                                </div>

                                <div class="cart-action">
                                    <a href="/cart" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                                    <a href="/checkout" class="btn btn-primary  btn-rounded">Checkout</a>
                                </div>
                            </div>
                            <!-- End of Dropdown Box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Header Middle -->

            <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
                <div class="container">
                    <div class="inner-wrap">
                        <div class="header-left flex-1">
                            <div class="dropdown category-dropdown show-dropdown" data-visible="true">
                                <a href="#" class="category-toggle text-white" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true" data-display="static"
                                    title="Browse Categories">
                                    <i class="w-icon-category"></i>
                                    <span>Browse Categories</span>
                                </a>

                                <div class="header-custom dropdown-box">
                                    <ul class="menu vertical-menu category-menu">
                                        @if(isset($list) && $list->success == true && $list->data != null)
                                            @foreach($list->data as $parent)
                                            <li>
                                            <a href="shop?category={{$parent->slug}}">
                                            {{$parent->label}}</a>
                                                <ul class="megamenu">
                                                @foreach($parent->sub as $child)
                                                    <li>
                                                        <h5>{{$child->label}}</h5>
                                                        <hr class="divider">
                                                        <ul>
                                                            @foreach($child->sub as $grand_child)
                                                                <li><a href="shop?category={{$grand_child->slug}}">{{$grand_child->label}}</a></li>
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
                                                class="font-weight-bold text-uppercase ls-15">
                                                View All Categories<i class="w-icon-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <form method="get" action="/shop" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper mr-4 ml-4">
                                <div class="select-box">
                                    <select id="category" name="category">
                                        <option value="">All Categories</option>
                                        @if(isset($list) && $list->success == true && $list->data != null)
                                            @foreach($list->data as $parent)
                                                <option value="{{$parent->slug}}">{{$parent->label}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <input type="text" class="form-control" name="search_query" id="search_query"
                                    placeholder="Search in..." required />
                                <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="header-right pr-0 ml-4">
                            <a href="#" class="d-xl-show mr-6"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                            <a href="#"><i class="w-icon-sale"></i>Daily Deals</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>