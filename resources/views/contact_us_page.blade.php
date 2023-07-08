<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <!-- HTML Meta Tags -->
    <title>Aryans Electronics | Contact Us</title>
    <meta name="description" content="Best Online Shopping Experience in Sri Lanka. Visit for Biggest Deals, Offers and Promotions for any home appliances and electronics| Buy Online | Islandwide Delivery | Shop in Piliyandala">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://www.aryanselectronics.com/contact-us/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Aryans Electronics | Contact Us">
    <meta property="og:description" content="Best Online Shopping Experience in Sri Lanka. Visit for Biggest Deals, Offers and Promotions for any home appliances and electronics| Buy Online | Islandwide Delivery | Shop in Piliyandala">
    <meta property="og:image" content="https://www.aryanselectronics.com/public/assets/custom/images/aryans-electronics-shop.webp">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="aryanselectronics.com">
    <meta property="twitter:url" content="https://www.aryanselectronics.com/contact-us/">
    <meta name="twitter:title" content="Aryans Electronics | Contact Us">
    <meta name="twitter:description" content="Best Online Shopping Experience in Sri Lanka. Visit for Biggest Deals, Offers and Promotions for any home appliances and electronics| Buy Online | Islandwide Delivery | Shop in Piliyandala">
    <meta name="twitter:image" content="https://www.aryanselectronics.com/public/assets/custom/images/aryans-electronics-shop.webp">


    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700'] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>

    <link rel="preload" href="{{  url('/') }}/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{  url('/') }}/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{  url('/') }}/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
            crossorigin="anonymous">
    <link rel="preload" href="{{  url('/') }}/assets/fonts/wolmart.ttf?png09e" as="font" type="font/ttf" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/owl-carousel/owl.carousel.min.css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{  url('/') }}/assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="{{  url('/') }}/assets/custom/css/custom.css?v=2">
    <link rel="stylesheet" type="text/css" href="{{  url('/') }}/assets/custom/css/header-custom.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
            <!-- Start of Page Header -->
            <x-shared.page_header_component title="Contact us"/>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav container">
                <ul class="breadcrumb bb-no">
                    <li><a href="/">Home</a></li>
                    <li><a href="/contact-us">Contact Us</a></li>
                </ul>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content contact-us">
                <div class="container">
                <x-contact_us_page.contact_information_component/>
                    <!-- End of Contact Information section -->
                    <x-contact_us_page.contact_section_component/>
                    <!-- End of Contact Section -->
                </div>

                <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
                <x-contact_us_page.google_map_component/>
                <!-- End Map Section -->
            </div>
            <!-- End of PageContent -->
        </main>
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

    <!-- Plugin JS File -->
    <!-- <script src="assets/vendor/jquery/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key="></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script src="{{  url('/') }}/assets/js/main.min.js"></script>
    <script src="{{  url('/') }}/assets/custom/js/custom.js?v=2"></script>

    <script>

        /*
        Map Settings
            Find the Latitude and Longitude of your address:
                - https://www.latlong.net/
                - http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/


        // Map Markers
        var mapMarkers = [{
            address: "New York, NY 10017",
            html: "https://goo.gl/maps/uRzwLtnr4AAoKkGN9",
            popup: true
        }];

        // Map Initial Location
        var initLatitude = 6.8010746;
        var initLongitude = 79.9219852;

        // Map Extended Settings
        var mapSettings = {
            controls: {
                draggable: !window.Wolmart.isMobile,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true
            },
            scrollwheel: false,
            markers: mapMarkers,
            latitude: initLatitude,
            longitude: initLongitude,
            zoom: 11
        };

        var map = $( '#googlemaps' ).gMap( mapSettings );

        // Map text-center At
        var mapCenterAt = function ( options, e ) {
            e.preventDefault();
            $( '#googlemaps' ).gMap( "centerAt", options );
        }
*/
    </script>
    <x-shared.shared_footer_component/>
</body>

</html>
