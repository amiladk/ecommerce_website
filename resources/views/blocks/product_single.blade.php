<div class="col-md-6 mb-6">
        <div class="product-gallery product-gallery-sticky">
            <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                @if(isset($items) && $items->success == true && $items->data != null)
                    @foreach($items->data->images as $key=>$item)
                        <figure class="product-image">
                            <img src="{{ $item }}"
                                data-zoom-image="{{ $item }}"
                                alt="Electronics Black Wrist Watch" width="800" height="900">
                        </figure>                                                   
                    @endforeach
                @endif
  
            </div>
            <div class="product-thumbs-wrap">
                <div class="product-thumbs row cols-4 gutter-sm">
                    @if(isset($items) && $items->success == true && $items->data != null)
                        @foreach($items->data->images as $key=>$item)
                            <div class="product-thumb active">
                                <img src="{{ $item }}"
                                    alt="Product Thumb" width="800" height="900">
                            </div>
                        @endforeach
                    @endif
                </div>
                <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                <button class="thumb-down disabled"><i
                        class="w-icon-angle-right"></i></button>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4 mb-md-6">
        <div class="product-details"  data-product="{{json_encode($items->data)}}" data-sticky-options="{'minWidth': 767}">
            <h2 class="product-title">{{$items->data->name}}</h2>
            <div class="product-bm-wrapper">
                <!--
                <figure class="brand">
                    <img src="/assets/images/products/brand/brand-1.jpg" alt="Brand"
                        width="102" height="48" />
                </figure>
                -->
                <div class="product-meta">
                    <div class="product-categories">
                    Brand:
                        <span class="product-category"><a href="#">{{$items->data->brand}}</a></span>
                    </div>
                    <div class="product-sku">
                        SKU: <span>{{$items->data->sku}}</span>
                    </div>
                </div>
            </div>

            <hr class="product-divider">

            <div class="product-price"><ins class="new-price">LKR {{number_format($items->data->price,2)}}</ins></div>

            <div class="ratings-container">
                <div class="ratings-full">
                    <span class="ratings" style="width: {{$items->data->rating * 20}}%;"></span>
                    <span class="tooltiptext tooltip-top"></span>
                </div>
                <a href="#product-tab-reviews" class="rating-reviews scroll-to">({{$items->data->reviews}} Reviews)</a>
            </div>

            <div class="product-short-desc custom-list-style">
                <?php echo $items->data->meta_description; ?>
            </div>

            <hr class="product-divider">
            <!--
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
            -->

            <div class="fix-bottom product-sticky-content sticky-content">
                <div class="product-form container">
                    <div class="product-qty-form">
                        <div class="input-group">
                            <input class="quantity form-control" type="number" min="1" id="quantity"
                                max="{{$items->data->stock}}">
                            <button onClick='increaseCount(event, this)' data-max="{{$items->data->stock}}" class="quantity-plus w-icon-plus"></button>
                            <button onClick='decreaseCount(event, this)' class="quantity-minus w-icon-minus"></button>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-cart" onclick="addToCart(this)">
                        <i class="w-icon-cart"></i>
                        <span>Add to Cart</span>
                    </button>
                </div>
            </div>
            <!--
            <div class="social-links-wrapper">
                <div class="social-links">
                    <div class="social-icons social-no-color border-thin">
                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                        <a href="#"
                            class="social-icon social-pinterest fab fa-pinterest-p"></a>
                        <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                        <a href="#"
                            class="social-icon social-youtube fab fa-linkedin-in"></a>
                    </div>
                </div>
                <span class="divider d-xs-show"></span>
                <div class="product-link-wrapper d-flex">
                    <a href="#"
                        class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                    <a href="#"
                        class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                </div>
            </div>
            -->
        </div>
    </div>

    <script>
        function addToCart(ele){
            var element = ele.closest( ".product-details" );
            var data    = element.getAttribute('data-product');
            var quantity= parseInt($('#quantity').val());
            add(JSON.parse(data),quantity);
        }
    </script>