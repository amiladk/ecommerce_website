<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <!-- HTML Meta Tags -->
    <title>Aryans Electronics | Online Shopping Sri Lanka: Electronics, Home Appliances & Phone Accessories</title>
    <meta name="description" content="Aryans Electronics, best online shopping site in Sri Lanka. Shop for Electronics, Power Tools, Home Appliances & many more with lowest prices in Sri Lanka. COD & card Payments Available">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://www.aryanselectronics.com/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Aryans Electronics | Online Shopping Sri Lanka: Electronics, Home Appliances & Phone Accessories">
    <meta property="og:description" content="Aryans Electronics, best online shopping site in Sri Lanka. Shop for Electronics, Power Tools, Home Appliances & many more with lowest prices in Sri Lanka. COD & card Payments Available">
    <meta property="og:image" content="https://www.aryanselectronics.com/assets/custom/images/aryans-electronics-shop.webp">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="aryanselectronics.com">
    <meta property="twitter:url" content="https://www.aryanselectronics.com/">
    <meta name="twitter:title" content="Aryans Electronics | Online Shopping Sri Lanka: Electronics, Home Appliances & Phone Accessories">
    <meta name="twitter:description" content="Aryans Electronics, best online shopping site in Sri Lanka. Shop for Electronics, Power Tools, Home Appliances & many more with lowest prices in Sri Lanka. COD & card Payments Available">
    <meta name="twitter:image" content="https://www.aryanselectronics.com/assets/custom/images/aryans-electronics-shop.webp">


    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700,800'] }
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

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{  url('/') }}/assets/vendor/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{  url('/') }}/assets/css/demo4.min.css">
    <link rel="stylesheet" type="text/css" href="{{  url('/') }}/assets/custom/css/custom.css?v=2">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <x-shared.shared_head_component/>

</head>

<body class="home">

   <x-shared.shared_body_component/>

    <div id="pre-loader" class="home">
        <div class="loadingio-spinner-spinner-ir5xaaoxmrl"><div class="ldio-3z2fwbho5cu">
            <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
            </div>
        </div>
    </div>

    <div class="page-wrapper">
        <!-- Start of Header -->
        <x-aryans_shared.aryans_header_component/>
        <!-- End of Header -->

        <!-- Start of Main -->
        <div class="main">
            <section class="intro-section bg-grey">
                <div class="container">
                    <div class="intro-wrapper pt-4">
                        <div class="row">
                            <div class="col-lg-7 col-xl-8">
                                <x-aryans_home.aryans_intro_section_slider_component/>
                            </div>
                            <div class="col-lg-5 col-xl-4 right-sidebar sidebar-fixed">
                                <x-aryans_home.aryans_intro_section_sidebar_overlay_component/>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End of Intro-section -->

            <div class="container mb-10 pb-2">

                <x-aryans_home.aryans_icon_box_component/>
                <!-- End of Iocn Box Wrapper -->

                <!-- <x-aryans_home.new_shop_banner_component/> -->
                <!-- End of new shop banner -->

                <x-aryans_home.aryans_category_wrapper_component/>
                <!-- End of Category Wrapper -->

                <x-aryans_home.aryans_category_banner_wrapper_component/>
                <!-- End of Category Banner Wrapper -->

                <x-aryans_home.aryans_branches_component/>
                <!-- End of Branches Banner Wrapper -->

            </div>
            <!-- End of Container -->

            <section class="grey-section pt-10">
                <div class="container mt-2 mb-3">

                    <x-home.tab_component/>
                    <!-- End of peoducts filter with title -->

                    <x-aryans_home.aryans_banner_component/>
                    <!-- End of Category Banner 3cols -->

                    <x-home.product_component id="01" name="Electronics" category="electronics" image="assets/images/demos/demo4/banners/banners-1.webp" more="/shop?category=electronics"/>
                    <!-- End of Products 2 -->

                    <x-home.product_component id="02" name="Health & beauty" category="health-n-beauty" image="assets/images/demos/demo4/banners/banners-2.webp" more="/shop?category=health-n-beauty"/>
                    <!-- End of Products 2 -->
                </div>
                <!-- End of Container -->
            </section>
            <!-- End of Grey Section -->

            <div class="container mt-10 pt-2">

                <x-aryans_home.aryans_full_width_banner_component/>
                <!-- End of Banner Gift -->

            </div>
            <!-- End fo Container -->


            <div class="container mt-2 pt-10">
                <x-aryans_home.load_more_component name="Just For You"/>
                <!-- End of Load More -->
            </div>

            <section class="grey-section pt-10">
                <div class="container mt-3 mb-1">

                    <x-aryans_home.aryans_brand_component />
                    <!-- End of Brands Wrapper -->

                </div>
                <!-- End of Container -->
            </section>
            <!-- End of Grey Section -->
        </div>
        <!-- End of Main -->

        <!-- Start of Footer -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="{{  url('/') }}/assets/vendor/jquery.plugin/jquery.plugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>

    <!-- Main Js-->
    <script src="{{  url('/') }}/assets/js/main.min.js"></script>
    <script src="{{  url('/') }}/assets/custom/js/cart.js?v=2"></script>
    <script src="{{  url('/') }}/assets/custom/js/custom.js?v=2"></script>
    <!-- <script src="{{  url('/') }}/assets/custom/js/video-player.js"></script> -->

    <x-shared.shared_footer_component/>

</body>

</html>
