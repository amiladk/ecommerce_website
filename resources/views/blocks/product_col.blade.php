@if(isset($items) && $items->success == true && $items->data != null)
    <?php $i = 0;?>
    @foreach($items->data as $key => $data)
        @if($key===0)
            <div class="product-col">
        @endif
        @if(++$i===3)
            </div>
            <div class="product-col">
            <?php $i = 1;?>
        @endif
        
        <x-shared.product_card :product="$data" class="product-wrap product text-center quick-details" />

    @endforeach
@endif

