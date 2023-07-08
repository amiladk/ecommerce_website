<div class="{{$class}}" data-product="{{json_encode($product)}}">
    <figure class="product-media">
        <a href="/product/{{$product->slug}}">
            <img src="{{$product->images[0]}}" alt="{{$product->name}}"
                width="300" height="338">
        </a>
    </figure>
    <div class="product-details">
        <h4 class="product-name">
            <a href="/product/{{$product->slug}}">{{$product->name}}</a>
        </h4>
        <div class="product-price">
            <ins class="new-price">LKR {{number_format($product->price,2)}}<br></ins>@if($product->compareAtPrice > $product->price)<del 
            class="old-price">LKR. {{number_format($product->compareAtPrice,2)}}</del>@endif
        </div>
        <!--
        <div class="sold-by">
            Sold By
            <a href="vendor-wcfm-store-product-grid.html">Vendor 4</a>
        </div>
        -->
    </div>
</div>