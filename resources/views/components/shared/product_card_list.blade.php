
<div class="{{$class}}" data-product="{{json_encode($product)}}">
    <figure class="product-media">
        <a href="/product/{{$product->slug}}">
            <img src="{{$product->images[0]}}" alt="{{$product->name}}" width="330"
                height="338" />
        </a>
        <div class="product-action-vertical">
            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                title="Quick View"></a>
        </div>
    </figure>
    <div class="product-details">
        <!-- <div class="product-cat">
            <a href="shop-banner-sidebar.html">Electronics</a>
        </div> -->
        <h4 class="product-name">
            <a href="/product/{{$product->slug}}">{{$product->name}}</a>
        </h4>
        <div class="ratings-container">
            <div class="ratings-full">
                <span class="ratings" style="width:{{$product->rating * 20}}%;"></span>
                <span class="tooltiptext tooltip-top"></span>
            </div>
            <a href="/product/{{$product->slug}}" class="rating-reviews">({{$product->reviews}} Reviews)</a>
        </div>
        <div class="product-price">
            <ins class="new-price">Rs. {{number_format($product->price,2)}}</ins>
            @if($product->compareAtPrice > $product->price)
            <del class="old-price">Rs. {{number_format($product->compareAtPrice,2)}}</del>
            @endif</div>
        <div class="product-desc"><?php echo $product->meta_description; ?></div>
        @if($product->stock > 0)
            <div class="product-action">
                <a href="#" onclick="addToCart(this)" class="btn-product btn-cart" title="Add to Cart"><i
                        class="w-icon-cart"></i> Add To Cart</a>
            </div>
        @endif
    </div>
</div>

<script>
    function addToCart(ele){
        var element = ele.closest( ".addtocart" );
        var data    = element.getAttribute('data-product');

        add(JSON.parse(data),1);
        // console.log(JSON.parse(data.id));
    }
</script>
