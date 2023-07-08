
@foreach($items->product_items as $key => $data)
    <div class="product-wrap">
        <x-shared.product_card :product="$data" class="product text-center quick-details"/>  
    </div>
@endforeach    
