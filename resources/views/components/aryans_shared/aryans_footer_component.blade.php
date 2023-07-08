@if (session('success'))
    <script>
        $( document ).ready(function() {
            $.toast({
            heading: 'Welcome to Aryans Store',
            text: "<?php echo(session('success'));?>",
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: ($( "body" ).hasClass( "home" )) ? 10500 : 4500, 
            stack: 6
          });

        });
    </script>
@endif

@if (session('error'))
    <script>
        $( document ).ready(function() {
            $.toast({
            heading: 'Welcome to Aryans Store',
            text: "<?php echo(session('error'));?>",
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: ($( "body" ).hasClass( "home" )) ? 10500 : 4500, 
            
          });
        });
    </script>
@endif

<?php
// api_v3
    $param = array(
        'franchise' => config('sitepecific.franchise'),
        'depth'     => 2,
    );

    $items = Http::get(config('sitepecific.api_url_v2').'get-categories',$param);  
    $list = json_decode($items);

?>

<footer class="footer footer-dark appear-animate" data-animation-options="{
            'name': 'fadeIn'
            }">
            <div class="footer-newsletter bg-primary pt-6 pb-6">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="icon-box icon-box-side text-white">
                                <div class="icon-box-icon d-inline-flex">
                                    <i class="w-icon-envelop3"></i>
                                </div>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-white text-uppercase mb-0">Subscribe To Our
                                        Newsletter</h4>
                                    <p class="text-white">Get all the latest information on Events, Sales and Offers.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                            <form action="/newsletter-form" method="POST" class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                            @csrf
                                <input type="email" class="form-control mr-2 bg-white" name="email" class="laxEmail" placeholder="Enter your email" required />
                                <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i
                                        class="w-icon-long-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="widget widget-about">
                                <a href="/" class="logo-footer">
                                    <img src="/assets/images/demos/demo4/footer-logo-aryans.png" alt="logo-footer" width="145"
                                        height="45" />
                                </a>
                                <div class="widget-body">
                                    <p class="widget-about-title">Got Question? Call us 24/7</p>
                                    <a href="tel:0 114 225 990" class="widget-about-call">+94 114 225 990</a>
                                    <p class="widget-about-desc">Register now to get updates on pronot get up icons
                                        & coupons ster now toon.
                                    </p>

                                    <div class="social-icons social-icons-colored">
                                        <a href="https://www.facebook.com/Aryanselectronicslk" target="_blank" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="https://www.instagram.com/aryans_electronics/" target="_blank" class="social-icon social-instagram w-icon-instagram"></a>
                                        <a href="https://www.youtube.com/channel/UCB8DU5kDNjgUi85cnGRY9jw" target="_blank" class="social-icon social-youtube w-icon-youtube"></a>
                                        <a href="https://www.tiktok.com/@aryanselectronics" target="_blank" class="social-icon tiktok-back"><img class="tiktok-img" src="assets/custom/images/tiktok.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h3 class="widget-title">Company</h3>
                                <ul class="widget-body">
                                    <li><a href="/contact-us">Contact Us</a></li>
                                    <li><a href="/about-us">About Us</a></li>
                                    <li><a href="/faq">Faq</a></li>
                                    <li><a href="/return-policy">Return Policy</a></li>
                                    <li><a href="/terms-and-condition">Terms & Condition</a></li>
                                    <li><a href="/privacy-policy">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4>
                                <ul class="widget-body">
                                    <li><a href="/checkout">Checkout</a></li>
                                    <li><a href="/cart">View Cart</a></li>
                                    <li><a href="/signup">Sign In</a></li>
                                    <li><a href="#">Help</a></li>
                                    <li><a href="#">My Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4>
                                <ul class="widget-body">
                                    <li><a href="#">Payment Methods</a></li>
                                    <li><a href="#">Money-back guarantee!</a></li>
                                    <li><a href="#">Product Returns</a></li>
                                    <li><a href="#">Support Center</a></li>
                                    <li><a href="#">Shipping</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-middle">
                    <div class="widget widget-category">
                        @if(isset($list) && $list->success == true && $list->data != null)
                            @foreach($list->data as $parent)
                                <div class="category-box">
                                    <h6 class="category-name">{{$parent->label}}:</h6>
                                    @foreach($parent->sub as $child)
                                        <a href="shop?category={{$child->slug}}">{{$child->label}}</a>
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-left">
                    <p class="copyright">Copyright © <?php echo date("Y"); ?>   Aryans Store. All Rights Reserved.  A Solution by 
                     <a href="https://www.xypherlabs.com" target="_blank">Xypherlabs</a>.</p>
                    </div>
                    <div class="footer-right">
                        <span class="payment-label mr-lg-8">We're using safe payment for</span>
                        <figure class="payment">
                            <img src="/assets/images/payment.png" alt="payment" width="159" height="25" />
                        </figure>
                    </div>
                </div>
            </div>
        </footer>