<div class="{{$class}}" data-product="{{json_encode($product)}}">
    <figure class="product-media">
        <a href="/product/{{$product->slug}}">
            <img src="{{$product->images[0]}}" alt="{{$product->name}}"
                width="216" height="243" />
        </a>
        <div class="product-action-vertical">
            @if($product->stock > 0)
            <a href="#" onclick="addToCart(this)" class="btn-product-icon btn-cart w-icon-cart"
                title="Add to cart"></a>
            @endif
            <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="Quickview"></a>
        </div>
    </figure>
    <div class="product-details">
        <h4 class="product-name"><a href="/product/{{$product->slug}}">{{$product->name}}</a>
        </h4>
        <div class="ratings-container">
            <div class="ratings-full">
                <span class="ratings" style="width: {{$product->rating * 20}}%;"></span>
                <span class="tooltiptext tooltip-top">{{$product->rating}}</span>
            </div>
            <a href="/product/{{$product->slug}}" class="rating-reviews">({{$product->reviews}} reviews)</a>
        </div>
        <div class="product-price">
            <ins class="new-price">LKR {{number_format($product->price,2)}}</ins>@if($product->compareAtPrice > $product->price)<del class="old-price">LKR. {{number_format($product->compareAtPrice,2)}}</del>@endif
        </div>
    </div>
</div>

<script>
    function addToCart(ele){
        var element = ele.closest( ".product.text-center" );
        var data    = element.getAttribute('data-product');

        add(JSON.parse(data),1);
        // console.log(JSON.parse(data.id));
    }
</script>
