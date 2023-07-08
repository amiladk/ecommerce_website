<div class="icon-box text-left data-parent" data-address="{{json_encode($address)}}">
    @if($address->default)
        <div class="address-label">
            <label class="product-label label-new">Default Address</label>
        </div>
    @endif
    <h6><b>{{$address->firstName}}</b></h6> 
    <p>{{$address->address}}</p>
    <br>
    <a href="#"  onclick="customMagnificPopup(this);"> Edit </a>  
   
    @if(!$address->default)
        <a href="#" onclick='customMagnificConfirmPopup("<?php echo $address->address;?>","/remove-address")'> Remove </a>
        &nbsp;&nbsp;
        <a href="#"  onclick='customMagnificConfirmPopup("<?php echo $address->address_id;?>","/set-default-address")'> Set As Default </a>
    @endif
</div>
