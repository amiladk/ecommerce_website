<div class="icon-box text-left data-parent" data-phone="{{json_encode($number)}}">
    @if($number->default)
        <div class="phone-label">
            <label class="product-label label-new">Default phone</label>
        </div>
    @endif
    <h5>Phone Number</h5>
    <p>{{$number->phone}}</p>
    <br>
    <a href="#" onclick="customMagnificPhonePopup(this);"> Edit </a>  
    
    @if(!$number->default)
        <a href="#" onclick="customMagnificConfirmPopup('<?php echo $number->phone;?>','/remove-phone');"> Remove </a>
        &nbsp;&nbsp;
        <a href="#"  onclick='customMagnificConfirmPopup("<?php echo $number->phone_id;?>","/set-default-phone")'> Set As Default </a>
    @endif

</div>
