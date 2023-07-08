<div class="product product-widget">
    <figure class="product-media">
        <a href="/product/{{$product->slug}}">
            <img src="{{$product->images[0]}}" alt="Product"
                width="100" height="113" />
        </a>
    </figure>
    <div class="product-details">
        <h4 class="product-name">
            <a href="/product/{{$product->slug}}">{{$product->name}}</a>
        </h4>
        <div class="ratings-container">
            <div class="ratings-full">
                <span class="ratings" style="width: {{$product->rating * 20}}%;"></span>
                <span class="tooltiptext tooltip-top"></span>
            </div>
        </div>
        <div class="product-price">LKR {{number_format($product->price,2)}}</div>
    </div>
</div>