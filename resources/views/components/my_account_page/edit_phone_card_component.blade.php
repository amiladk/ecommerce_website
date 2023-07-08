

<div id="edit-phone-popup" class="white-popup mfp-hide">
    <form></form>
    <form action="/edit-phone" method="post" id="edit-phone-number">
        @csrf
        <h4>Edit Number</h4>
        <hr>
        
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control phone" id="edit-phone" name="phone" placeholder="Phone" required>
                <input type="hidden" id="phone_id" name="phone_id">
            </div>
        <br>
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-secondary" onClick="closePopup();">Close</button>
    </form>
</div>


<script>

    function customMagnificPhonePopup(ele){
        
        var phone = JSON.parse(ele.closest('.data-parent').getAttribute('data-phone'));

        $('#edit-phone').val(phone.phone);
        $('#phone_id').val(phone.phone_id);

        $.magnificPopup.open({
            items: {
            src: $('#edit-phone-popup')
            },
            type: 'inline'
        });
    }

</script>