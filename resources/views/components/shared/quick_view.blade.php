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
                    <div class="product-bm-wrapper">
                        <figure class="brand">
                            <img src="assets/images/products/brand/brand-1.jpg" alt="Brand" width="102" height="48" />
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

                    <hr class="product-divider">

                    <div class="product-price">$40.00</div>

                    <div class="ratings-container">
                        <div class="ratings-full">
                            <span class="ratings" style="width: 80%;"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="#" class="rating-reviews">(3 Reviews)</a>
                    </div>

                    <div class="product-short-desc">
                        <ul class="list-type-check list-style-none">
                            <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                            <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                            <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                        </ul>
                    </div>

                    <hr class="product-divider">

                    <div class="product-form product-variation-form product-color-swatch">
                        <label>Color:</label>
                        <div class="d-flex align-items-center product-variations">
                            <a href="#" class="color" style="background-color: #ffcc01"></a>
                            <a href="#" class="color" style="background-color: #ca6d00;"></a>
                            <a href="#" class="color" style="background-color: #1c93cb;"></a>
                            <a href="#" class="color" style="background-color: #ccc;"></a>
                            <a href="#" class="color" style="background-color: #333;"></a>
                        </div>
                    </div>
                    <div class="product-form product-variation-form product-size-swatch">
                        <label class="mb-1">Size:</label>
                        <div class="flex-wrap d-flex align-items-center product-variations">
                            <a href="#" class="size">Small</a>
                            <a href="#" class="size">Medium</a>
                            <a href="#" class="size">Large</a>
                            <a href="#" class="size">Extra Large</a>
                        </div>
                        <a href="#" class="product-variation-clean">Clean All</a>
                    </div>

                    <div class="product-variation-price">
                        <span></span>
                    </div>

                    <div class="product-form">
                        <div class="product-qty-form">
                            <div class="input-group">
                                <input class="quantity form-control" type="number" min="1" max="10000000">
                                <button class="quantity-plus w-icon-plus"></button>
                                <button class="quantity-minus w-icon-minus"></button>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-cart">
                            <i class="w-icon-cart"></i>
                            <span>Add to Cart</span>
                        </button>
                    </div>

                    <div class="social-links-wrapper">
                        <div class="social-links">
                            <div class="social-icons social-no-color border-thin">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                            </div>
                        </div>
                        <span class="divider d-xs-show"></span>
                        <div class="product-link-wrapper d-flex">
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"></a>
                            <a href="#"
                                class="btn-product-icon btn-compare btn-icon-left w-icon-compare"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Quick view -->

    <script>
    $(document).ready(function(){
        quickView();
    });

    function quickView(){
        $( ".btn-quickview" ).click(function() {

            var element = $(this).closest( ".product-wrap" );
            var data    = element.attr('data-product');

            var productsData = JSON.parse(data);

            //console.log(productsData);

            $(".quick-view .product-title").html(productsData['name']);
            $(".quick-view .product-category").html(productsData['name']);
            $(".quick-view .product-sku-val").html(productsData['sku']);
            $(".quick-view .product-price").html(new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'LKR' }).format(productsData['price']));
            $(".quick-view .rating-reviews").html(productsData['reviews']);
            $(".quick-view .product-desc").html(productsData['meta_description']);

            // +new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'LKR' }).format(price)+
            //Remove esisting items in carousel
            for (var i=1; $('.quick-view .product-single-carousel .owl-stage-outer .owl-stage .owl-item').length; i++) {
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

        });
    }

</script>
