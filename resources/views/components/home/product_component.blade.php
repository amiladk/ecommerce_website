<script>
    var token = "{{ csrf_token() }}";

    function getProductComponentData{{ $id }}() {
        $.ajax({
            method: "get",
            url: "/api/get-product-component-data",
            cache: false,
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name=token]').attr('content')
            },
            data: {
                "_token": token,
                "category": "{{ $category }}",
            },
            success: function(data) {
                response = data;
                $('#pre-loader.{{ $category }}').remove();
                $('#{{ $category }}').html(response);


                $('#{{ $category }}.owl-carousel').owlCarousel('destroy');
                $('#{{ $category }}.owl-carousel').owlCarousel({
                    'nav': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '576': {
                            'items': 2
                        },
                        '992': {
                            'items': 3
                        },
                        '1200': {
                            'items': 4
                        }
                    }
                });
            },
            error: function(xhr, status, error) {
                response.success = false;
                response.msg = xhr.statusText;
            }
        });
    }    
</script>

<div class="load-ajax product-wrapper-1 appear-animate mb-5" data-load="getProductComponentData{{ $id }}()">
    <div class="title-link-wrapper pb-1 mb-4">
        <h2 class="title ls-normal mb-0">{{ $name }}</h2>
        <a href="{{ $more }}" class="font-size-normal font-weight-bold ls-25 mb-0">More
            Products<i class="w-icon-long-arrow-right"></i></a>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-4 mb-4">
            <div class="banner h-100 br-sm" style="background-image: url({{ $image }}); 
                background-color: #ebeced;">
                <div class="banner-content content-top">
                    <h5 class="banner-subtitle font-weight-normal mb-2">Year End Sale</h5>
                    <hr class="banner-divider bg-dark mb-2">
                    <h3 class="banner-title font-weight-bolder ls-25 text-uppercase">
                        New Arrivals<br> <span
                            class="font-weight-normal text-capitalize">Collection</span>
                    </h3>
                    <a href="{{ $more }}"
                        class="btn btn-dark btn-outline btn-rounded btn-sm">shop Now</a>
                </div>
            </div>
        </div>
        <!-- End of Banner -->
        <div class="col-lg-9 col-sm-8">
            <div id="pre-loader" class="{{ $category }}">
                    <div class="loadingio-spinner-spinner-ir5xaaoxmrl">
                        <div class="ldio-3z2fwbho5cu">
                            <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
                        </div>
                    </div>
                </div>
            <div id="{{ $category }}" class="owl-carousel owl-theme" data-owl-options="{}">
                
            </div>
        </div>
    </div>
</div>
<!-- End of Product Wrapper 1 -->