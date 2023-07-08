

<div id="confirm-popup" class="white-popup mfp-hide">
    <form></form>
    <form action="#" method="post" id="confirm-popup-from">
        @csrf
        <h4>Are You Sure?</h4>
        <hr>
        <input type="hidden" id="set-value" name="set_value">
        <br>
        <button type="button" onclick="confirmPopupSubmit()" class="btn btn-primary" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-secondary" onClick="closePopup();">No</button>
    </form>
</div>

<script>

    function customMagnificConfirmPopup(value,action_url){

        $('#set-value').val(value);
        $('#confirm-popup-from').attr('action', action_url);
        
        $.magnificPopup.open({
            items: {
            src: $('#confirm-popup')
            },
            type: 'inline'
        });
    }


    function confirmPopupSubmit(){

        invokeLoader();
        $('#confirm-popup-from').submit();

    }



</script>


