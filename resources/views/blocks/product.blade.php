@if($type=="block")
    @if($items)
       <div class="product-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-2">
            @foreach($items as $key => $data)    
                <div class="product-wrap">
                        <x-shared.product_card :product="$data" class="product text-center quick-details"/>  
                </div>
            @endforeach
        </div> 
    @else
      <x-shared.no_maching_items_component/> 
    @endif

      
@elseif($type=="list")
    @if($items)
        <div class="product-wrapper row cols-md-1 cols-xs-2 cols-1">
        @foreach($items as $key => $data)       
               <x-shared.product_card_list :product="$data" class="product product-list quick-details addtocart"/> 
        @endforeach
        </div>
    @else
      <x-shared.no_maching_items_component/> 
    @endif          
@endif
