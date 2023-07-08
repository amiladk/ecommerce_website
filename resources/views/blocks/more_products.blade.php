@if(isset($items) && $items->success == true && $items->data != null)
    <?php $i = 0;?>
    @foreach($items->data as $key => $data)
        @if($key===0)
            <div class="widget-col">
        @endif
        @if(++$i===4)
            </div>
            <div class="widget-col">
            <?php $i = 1;?>
        @endif
        
        <x-widget.product-widget :product="$data" />

    @endforeach
@endif

