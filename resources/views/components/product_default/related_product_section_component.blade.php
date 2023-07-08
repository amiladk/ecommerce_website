<script>
    var token = "{{ csrf_token() }}";
    $( document ).ready(function() {
        $.ajax({
            method:"get",
            url:"/api/get-product-single-related-products-data",
            cache:false,
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name=token]').attr('content')
            },
            data:{
                "_token"       : token,
                 "slug"         : '{{$slug}}',
            },
            success:function(data){
                response = data;
                $('#related-product-data').html(response);
            },
            error: function (xhr, status, error) {
                response.success = false;
                response.msg = xhr.statusText;
            }
        });
    });
</script>

<section class="related-product-section">
    <div class="title-link-wrapper mb-4">
        <h4 class="title">Related Products</h4>
        <a href="/shop" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
            Products<i class="w-icon-long-arrow-right"></i></a>
    </div>
    <div class="owl-carousel owl-theme row cols-lg-3 cols-md-4 cols-sm-3 cols-2" id="related-product-data"
        data-owl-options="{
        'nav': false,
        'dots': false,
        'margin': 20,
        'autoplay': true,
        'autoplayTimeout':2000,
        'loop': true,
        'responsive': {
            '0': {
                'items': 2
            },
            '576': {
                'items': 3
            },
            '768': {
                'items': 4
            },
            '992': {
                'items': 3
            }
        }
    }">
    
        <!--
        <div class="product">
            <figure class="product-media">
                <a href="product-default.html">
                    <img src="/assets/images/products/default/6.jpg" alt="Product"
                        width="300" height="338" />
                </a>
                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                        title="Add to cart"></a>
                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                        title="Add to wishlist"></a>
                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                        title="Add to Compare"></a>
                </div>
                <div class="product-action">
                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                        View</a>
                </div>
            </figure>
            <div class="product-details">
                <h4 class="product-name"><a href="product-default.html">Official Camera</a>
                </h4>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 100%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                </div>
                <div class="product-pa-wrapper">
                    <div class="product-price">
                        <ins class="new-price">$263.00</ins><del
                            class="old-price">$300.00</del>
                    </div>
                </div>
            </div>
        </div>
        <div class="product">
            <figure class="product-media">
                <a href="product-default.html">
                    <img src="/assets/images/products/default/7-1.jpg" alt="Product"
                        width="300" height="338" />
                    <img src="/assets/images/products/default/7-2.jpg" alt="Product"
                        width="300" height="338" />
                </a>
                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                        title="Add to cart"></a>
                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                        title="Add to wishlist"></a>
                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                        title="Add to Compare"></a>
                </div>
                <div class="product-action">
                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                        View</a>
                </div>
            </figure>
            <div class="product-details">
                <h4 class="product-name"><a href="product-default.html">Phone Charge Pad</a>
                </h4>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 80%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="product-default.html" class="rating-reviews">(8 reviews)</a>
                </div>
                <div class="product-pa-wrapper">
                    <div class="product-price">$23.00</div>
                </div>
            </div>
        </div>
        <div class="product">
            <figure class="product-media">
                <a href="product-default.html">
                    <img src="/assets/images/products/default/8.jpg" alt="Product"
                        width="300" height="338" />
                </a>
                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                        title="Add to cart"></a>
                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                        title="Add to wishlist"></a>
                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                        title="Add to Compare"></a>
                </div>
                <div class="product-action">
                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                        View</a>
                </div>
            </figure>
            <div class="product-details">
                <h4 class="product-name"><a href="product-default.html">Fashionalble
                        Pencil</a></h4>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 100%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="product-default.html" class="rating-reviews">(9 reviews)</a>
                </div>
                <div class="product-pa-wrapper">
                    <div class="product-price">$50.00</div>
                </div>
            </div>
        </div>
        -->
    </div>
</section>