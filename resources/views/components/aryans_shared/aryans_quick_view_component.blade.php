 <!-- Start of Quick View -->
 <div class="quick-view product product-single product-popup">
        <div class="row gutter-lg">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="product-gallery product-gallery-sticky mb-0">
                    <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                    </div>
                    <div class="product-thumbs-wrap">
                        <div class="product-thumbs">
                        </div>
                        <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                        <button class="thumb-down disabled"><i class="w-icon-angle-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 overflow-hidden p-relative">
                <div class="product-details scrollable pl-0">
                    <h2 class="product-title">Electronics Black Wrist Watch</h2>
                    <!--
                    <div class="product-bm-wrapper">
                        <figure class="brand">
                            <img src="/assets/images/products/brand/brand-1.jpg" alt="Brand" width="102" height="48" />
                        </figure>
                        <div class="product-meta">
                            <div class="product-categories">
                                Category:
                                <span class="product-category"><a href="#">Electronics</a></span>
                            </div>
                            <div class="product-sku">
                                SKU: <span>MS46891340</span>
                            </div>
                        </div>
                    </div>
                    -->

                    <hr class="product-divider">

                    <div class="product-price">$40.00</div>

                    <div class="ratings-container">
                        <div class="ratings-full">
                            <!-- <span class="ratings" style="width:"></span> -->
                            <!-- <span class="tooltiptext tooltip-top"></span> -->
                        </div>
                        <a href="#" class="rating-reviews">(3 Reviews)</a>
                    </div>
                    <div class="text-danger show-out-of-stock" style="font-size: 12px"></div>

                    <div class="product-short-desc">

                    </div>

                    <hr class="product-divider">

                    <div class="product-form">
                        <div class="product-qty-form">
                            <div class="input-group">
                                <input class="quantity form-control set-data-max-input" id="quantity" type="number" min="1" max="10">
                                <button class="quantity-plus w-icon-plus set-data-max" data-max="10000"></button>
                                <button class="quantity-minus w-icon-minus"></button>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-cart" onclick="addToQuickViewCart(this)">
                            <i class="w-icon-cart"></i>
                            <span>Add to Cart</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Quick view -->

    <script>

    $( window ).on("load", function() {
        quickView();
    });
    function quickView(){
        $( ".btn-quickview" ).click(function() {

            var element = $(this).closest( ".quick-details" );
            var data    = element.attr('data-product');

            var productsData = JSON.parse(data);

            $(".quick-view.product.product-single").attr("data-product",data );

            $(".quick-view .product-title").html(productsData['name']);
            $(".quick-view .product-category").html(productsData['name']);
            $(".quick-view .product-sku-val").html(productsData['sku']);
            $(".quick-view .product-price").html(new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'LKR' }).format(productsData['price']));
            $(".quick-view .rating-reviews").html(productsData['reviews']);
            $(".quick-view .product-desc").html(productsData['meta_description']);
            $(".quick-view .product-short-desc").html(productsData['customFields']['short_description']);
            $(".quick-view .product-short-desc > ul").addClass( "list-type-check list-style-none" );

            var ratings = (productsData['rating'] * 20);
            $(".quick-view .ratings-full").html('<span class="ratings"  style="width:'+ratings+'%;" ></span><span class="tooltiptext tooltip-top"></span>');

            $(".quick-view .quantity-plus.set-data-max").attr('data-max',productsData['stock']);
            $(".quick-view .quantity.form-control.set-data-max-input").attr('max',productsData['stock']);

            //Remove esisting items in carousel
            for (var i=1; i=$('.quick-view .product-single-carousel .owl-stage-outer .owl-stage .owl-item').length; i++) {
              $(".quick-view .product-single-carousel").trigger('remove.owl.carousel', [i]).trigger('refresh.owl.carousel');
            }

            $(".quick-view .product-thumbs").html('');

            //Add items to carousel
            $.each(productsData['images'], function(index, image){
                $('.quick-view .product-single-carousel')
                .trigger('add.owl.carousel', ['<figure class="product-image item"><img src='+image+' alt="Water Boil Black Utensil" width="800" height="900"></figure>'])
                .trigger('refresh.owl.carousel');

                $(".quick-view .product-thumbs").append('<div class="product-thumb active"><img src='+image+' alt="Product Thumb" width="103" height="116"></div>');
            });

            if(productsData['stock'] <= 0){
                $(".product-form").hide();
                $(".show-out-of-stock").html('out of stock');
            }
            else{
                $(".product-form").show();
                $(".show-out-of-stock").html('');
            }
        });
    }

    function addToQuickViewCart(ele){
        var element = ele.closest( ".quick-view.product.product-single" );
        var data    = element.getAttribute('data-product');
        var quantity= parseInt($('#quantity').val());
        add(JSON.parse(data),quantity);
    }

</script>
