<script>
    var token = "{{ csrf_token() }}";
    $( document ).ready(function() {
        $.ajax({
            method:"get",
            url:"/api/get-product-single-tab-nav-data",
            cache:false,
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name=token]').attr('content')
            },
            data:{
                "_token"       : token,
                 "slug"         : '{{$slug}}',
            },
            success:function(data){
                response = data;
                $('#product-single-tab-data').html(response);
            },
            error: function (xhr, status, error) {
                response.success = false;
                response.msg = xhr.statusText;
            }
        });
    });
</script>


<form action="/review-form" method="POST" class="review-form" id="review-form">
    @csrf
    <div class="tab tab-nav-boxed tab-nav-underline product-tabs" id="product-single-tab-data">

    </div>
</form>