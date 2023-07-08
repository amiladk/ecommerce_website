<div id="edit-popup" class="white-popup mfp-hide">
  <form ></form>
  <form action="/edit-address" method="post" id="edit-address-card">
    @csrf
    <h4>Edit New Address</h4>
    <hr>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="edit-address" placeholder="Address" required>
            </div>
            <br>
            <div class="form-group">
                <label for="city">City</label>
                <select name="city" class="form-control select2-full" id="select2-full-edit" style="width:100%;" required>
                    <option value="default" selected="selected">Select a city
                    </option>
                    @foreach($cities->data as $key => $city)
                        <option value="{{$city->cityId}}">{{$city->text}}</option>
                    @endforeach

                </select>
                <input type="hidden" id="address_id" name="address_id">
            </div>
        <br>
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-secondary" onClick="closePopup();">Close</button>
  </form>
</div>

<script>

    function customMagnificPopup(ele){
        
        var address = JSON.parse(ele.closest('.data-parent').getAttribute('data-address'));

        $('#edit-address').val(address.address);
        $('#address_id').val(address.address_id);

        $("#select2-full-edit").val(address.city_id).trigger('change');

        $.magnificPopup.open({
            items: {
            src: $('#edit-popup')
            },
            type: 'inline'
        });
    }

</script>