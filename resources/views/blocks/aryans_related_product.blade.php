
@if(isset($items) && $items->success == true && $items->data != null)
    @foreach($items->data as $key => $data)
    <div>
        <x-aryans_shared.aryans_related_product_card_component :product="$data" class="product quick-details" />
    </div>
    @endforeach
@endif
