<script>
var token = "{{ csrf_token() }}";
var page = 1;

function loadMore(click=false){
    if(click){
        $('#pre-loader.home').css("display", "block");
    }
  
    $.ajax({
        method: "get",
        url: "/api/get-load-more-data",
        cache: false,
        async: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name=token]').attr('content')
        },
        data: {
            "_token": token,
            "page"  : page,
        },
        success: function(data) {
            response = data;
            $('#pre-loader.home').css("display", "none")
            $('#pre-loader.load-more').remove();
            $("#load-more-products .tab-pane > div").append(response.view);
            page = response.page + 1;

        },
        error: function(xhr, status, error) {
            response.success = false;
            response.msg = xhr.statusText;
        }
    });
}
</script>






<div id="load-more-products" data-load="loadMore()" class="load-ajax product-wrapper-1 appear-animate mb-5" id="product-wrapper">
    <div class="title-link-wrapper pb-1 mb-4">
        <h2 class="title ls-normal mb-0">{{ $name }}</h2>
       
    </div>

    <!--new just for you  cards -->
    <div>

        <div class="tab-pane active pt-4" id="tab1-1">
            <div id="tab1-inner" class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                <div id="pre-loader" class="load-more">
                    <div class="loadingio-spinner-spinner-ir5xaaoxmrl">
                        <div class="ldio-3z2fwbho5cu">
                            <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <button  onclick="loadMore(true)" class="btn  btn-dark   btn-rounded" type="button" id="btn-CLick">LOAD MORE<i
                    class="w-icon-long-arrow-right" ></i></button>
        </div>


    </div>
</div>
<!-- End of Product Wrapper 1 -->