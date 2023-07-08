<!DOCTYPE html>
<html lang="en">

<head>
    <x-shared.shared_head_component/>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Wolmart eCommmerce Marketplace HTML Template</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Wolmart eCommmerce Marketplace HTML Template">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.png">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700,800'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
            crossorigin="anonymous">
    <link rel="preload" href="assets/fonts/wolmart.ttf?png09e" as="font" type="font/ttf" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/magnific-popup/magnific-popup.min.css">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/demo1.min.css">

    <link rel="stylesheet" type="text/css" href="assets/custom/css/custom.css?v=2">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body class="home">
    <div class="page-wrapper">

    <x-shared.site-header/>

        <!-- Start of Main-->
        <main class="main">

            <x-home.intro_section/>

            <div class="container">

                <x-home.icon_box_component/>

                <x-home.category_banner_component/>

                <x-home.deals_component/>

            </div>

            <x-home.category_section_component/>

            <div class="container">

                <x-home.tab_component/>

                <x-home.category_cosmetic_lifestyle_component/>

                <x-home.product_component name="Electronics" category="electronics"/>

                <x-home.product_component name="Health & beauty" category="health-n-beauty"/>

                <x-home.banner_fashions_component/>

                <x-home.product_component name="Home & kitchen" category="home-n-kitchen"/>

                <x-home.our_clients_component/>

                <x-home.post_component/>

                <x-home.recent_views_component/>
            </div>
            <!--End of Catainer -->
        </main>
        <!-- End of Main -->

        <x-shared.footer/>
    </div>
    <!-- End of Page-wrapper-->


    <x-shared.sticky_footer/>

    <!-- Start of Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>
    <!-- End of Scroll Top -->

    <x-shared.mobile_menu/>


    <x-shared.quick_view/>




    <!-- Plugin JS File -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>


    <script src="assets/vendor/jquery.plugin/jquery.plugin.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/zoom/jquery.zoom.js"></script>
    <script src="assets/vendor/jquery.countdown/jquery.countdown.min.js"></script>
    <script src="assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendor/skrollr/skrollr.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.min.js"></script>

    <script src="assets/custom/js/cart.js?v=2"></script>

    <script src="assets/custom/js/custom.js?v=2"></script>
</body>

</html>
