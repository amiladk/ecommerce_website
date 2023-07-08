<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <!-- HTML Meta Tags -->
    <title>Aryans Electronics | Shop</title>
    <meta name="description" content="Lowest Price in Sri Lanka for Electronics, Power Tools, Home Appliances, Arduino, Audio, Glassware, House Hold Items and Gift Items. Cash on Delivery available within Sri Lanka.">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://www.aryanselectronics.com/shop/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Aryans Electronics | Shop">
    <meta property="og:description" content="Lowest Price in Sri Lanka for Electronics, Power Tools, Home Appliances, Arduino, Audio, Glassware, House Hold Items and Gift Items. Cash on Delivery available within Sri Lanka">
    <meta property="og:image" content="https://www.aryanselectronics.com/public/assets/custom/images/aryans-electronics-shop.webp">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="aryanselectronics.com">
    <meta property="twitter:url" content="https://www.aryanselectronics.com/shop/">
    <meta name="twitter:title" content="Aryans Electronics | Shop">
    <meta name="twitter:description" content="Lowest Price in Sri Lanka for Electronics, Power Tools, Home Appliances, Arduino, Audio, Glassware, House Hold Items and Gift Items. Cash on Delivery available within Sri Lanka">
    <meta name="twitter:image" content="https://www.aryanselectronics.com/public/assets/custom/images/aryans-electronics-shop.webp">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{  url('/') }}/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{  url('/') }}/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{  url('/') }}/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
            crossorigin="anonymous">
    <link rel="preload" href="{{  url('/') }}/assets/fonts/wolmart.ttf?png09e" as="font" type="font/ttf" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{  url('/') }}/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/vendor/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.1.0/nouislider.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{  url('/') }}/assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="{{  url('/') }}/assets/custom/css/custom.css?v=2">
    <link rel="stylesheet" type="text/css" href="{{  url('/') }}/assets/custom/css/header-custom.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="{{  url('/') }}/assets/custom/js/shop.js"></script>

    <x-shared.shared_head_component/>

</head>

<body>
    <x-shared.shared_body_component/>
    <div class="page-wrapper">
        <!-- Start of Header -->
        <x-aryans_shared.aryans_header_component/>
        <!-- End of Header -->


        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Breadcrumb -->
            <x-shared.breadcrumb_nav_component/>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <!-- Start of Shop Banner -->
                    <x-shop_page.shop_default_banner_component/>
                    <!-- End of Shop Banner -->

                    <!-- <x-shop_page.shop_default_brands_componet/> -->

                    <!-- End of Shop Brands-->
                    <!-- Start of Shop Category -->
                    <!-- <x-shop_page.shop_default_category_component/> -->
                    <!-- End of Shop Category -->

                    <!-- Start of Shop Content -->
                    <div class="shop-content row gutter-lg mb-10">
                        <!-- Start of Sidebar, Shop Sidebar -->
                    <x-shop_page.shop_sidebar_component/>
                        <!-- End of Shop Sidebar -->

                        <!-- Start of Shop Main Content -->
                    <x-shop_page.shop_main_content_component/>
                        <!-- End of Shop Main Content -->
                    </div>
                    <!-- End of Shop Content -->
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->
        <x-aryans_shared.aryans_footer_component/>
        <!-- End of Footer -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Start of Sticky Footer -->
    <x-aryans_shared.aryans_sticky_footer_component/>
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    <x-aryans_shared.aryans_mobile_menu_component/>
    <!-- End of Mobile Menu -->

    <!-- Start of Quick View -->
    <x-aryans_shared.aryans_quick_view_component/>
    <!-- End of Quick view -->

    <!-- Plugin JS File -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
    <script src="{{  url('/') }}/assets/vendor//jquery.plugin/jquery.plugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.1.0/nouislider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.1.0/js/jquery.countdown.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>
    <script src="{{  url('/') }}/assets/vendor/zoom/jquery.zoom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <!-- Main JS -->
    <script src="{{  url('/') }}/assets/js/main.min.js"></script>
    <script src="{{  url('/') }}/assets/custom/js/cart.js?v=2"></script>
    <script src="{{  url('/') }}/assets/custom/js/custom.js?v=2"></script>

    <x-shared.shared_footer_component/>
</body>

</html>
