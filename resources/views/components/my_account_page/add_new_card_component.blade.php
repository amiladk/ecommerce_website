 <div class="icon-box text-center">
    <span class="icon-box-icon icon-address">
        <i class="w-icon-plus"></i>
    </span>
    <div class="icon-box-content">
        <!-- Button trigger modal -->
        <a href="#test-popup" class="btn btn-primary open-popup-link btn-sm">Add Address</a>
    </div>
</div>
    

<div id="test-popup" class="white-popup mfp-hide">
  <form ></form>
  <form action="/add-new-address" method="post" id="address-card">
    @csrf
    <h4>Add New Address</h4>
    <hr>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
            </div>
            <br>
            <div class="form-group">
                <label for="city">City</label>
                <select name="city" class="form-control select2-modal-addresss" style="width:100%;" required>
                    <option value="default" selected="selected">Select a city
                    </option>
                    @foreach($cities->data as $key => $city)
                        <option value="{{$city->cityId}}">{{$city->text}}</option>
                    @endforeach

                </select>
            </div>
        <br>
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-secondary" onClick="closePopup();">Close</button>
  </form>
</div>



<script>
    $(document).ready(function ($) {
        $('.open-popup-link').magnificPopup({
            type: 'inline',
            midClick: true,
            mainClass: 'mfp-fade'
        });  
    });

    function closePopup() {
        $.magnificPopup.close();
    }

</script>

