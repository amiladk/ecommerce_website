<div class="{{$class}}" data-product="{{json_encode($product)}}">
        <figure class="product-media">
            <a href="/product/{{$product->slug}}">
                <img src="{{$product->images[0]}}" alt="{{$product->name}}" width="300"
                    height="338" />
                <img src="{{$product->images[0]}}" alt="{{$product->name}}" width="300"
                    height="338" />
            </a>
            @if($product->stock > 0)
                <div class="product-action-vertical">
                <a href="#" onclick="addToCartRelated(this)" class="btn-product-icon btn-cart w-icon-cart"
                    title="Add to cart"></a>
                </div>
            @endif
            <div class="product-action">
                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                        View</a>
            </div>

        </figure>
        <div class="product-details">
            <h4 class="product-name"><a href="/product/{{$product->slug}}">{{$product->name}}</a></h4>
            <div class="ratings-container">
                <div class="ratings-full">
                    <span class="ratings" style="width: {{$product->rating * 20}}%;"></span>
                    <span class="tooltiptext tooltip-top"></span>
                </div>
                <a href="/product/{{$product->slug}}" class="rating-reviews">({{$product->reviews}} reviews)</a>
            </div>
            <div class="product-pa-wrapper">
                <div class="product-price">LKR {{number_format($product->price,2)}}</div>
            </div>
        </div>
    </div>

<script>
    function addToCartRelated(ele){
        var element = ele.closest( ".product" );
        var data    = element.getAttribute('data-product');

        add(JSON.parse(data),1);
    }
</script>


