<div class="icon-box text-center">
    <span class="icon-box-icon icon-address">
        <i class="w-icon-plus"></i>
    </span>
    <div class="icon-box-content">
        <a href="#phone-popup" class="btn btn-primary open-popup-link btn-sm">Add Phone</a>
    </div>
</div>
    

<div id="phone-popup" class="white-popup mfp-hide">
    <form></form>
    <form action="/add-new-phone" method="post" id="phone-number">
        @csrf
        <h4>Add New Number</h4>
        <hr>
        
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control phone" id="phone" name="phone" placeholder="Phone" required>
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

