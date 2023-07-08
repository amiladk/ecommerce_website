@if(isset($items) && $items->success == true && $items->data != null)
    @foreach($items->data as $key => $data)
        <div class="product-wrap">
            <x-shared.product_card :product="$data" class="product text-center quick-details"/>  
        </div>
    @endforeach      
@endif

