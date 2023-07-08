@if(isset($items) && $items->success == true && $items->data != null)
    @foreach($items->data as $key => $data)
        <x-aryans_shared.aryans_product_widget_component :product="$data" class="product product-widget pt-0" />
    @endforeach
@endif