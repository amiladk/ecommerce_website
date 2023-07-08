<script>  
    $( document ).ready(function() {
        loadData("/api/get-tab-component-data-latest",'#tab1-inner',1)
    });

    var array=[];

    function loadData($url,$id,$tab){
        var token = "{{ csrf_token() }}";

        if(array.indexOf($tab)==-1){
            $.ajax({
            method:"get",
            url:$url,
            cache:false,
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name=token]').attr('content')
            },
            data:{
                "_token"       : token,
        
            },
            success:function(data){
                response = data;
                array.push($tab); 
                $($id).html(response);
                quickView();
            },
            error: function (xhr, status, error) {
                response.success = false;
                response.msg = xhr.statusText;
            }
        });
        }
    }
</script>


<h2 class="title justify-content-center ls-normal mb-4 mt-1 pt-1 appear-animate">Popular Departments
        </h2>
    <div class="tab tab-nav-boxed tab-nav-outline appear-animate">
        <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item mr-2 mb-2">
                <a class="nav-link active br-sm font-size-md ls-normal" href="#tab1-1">New arrivals</a>
            </li>
            <li class="nav-item mr-2 mb-2">
                <a onclick="loadData('/api/get-tab-component-data-best-seller','#tab2-inner',2)" class="nav-link br-sm font-size-md ls-normal" href="#tab1-2">Best seller</a>
            </li>
            <li class="nav-item mr-2 mb-2">
                <a onclick="loadData('/api/get-tab-component-data-top-rated','#tab3-inner',3)" class="nav-link br-sm font-size-md ls-normal" href="#tab1-3">Top rated</a>
            </li>
            <li class="nav-item mr-0 mb-2">
                <a onclick="loadData('/api/get-tab-component-data-featured','#tab4-inner',4)" class="nav-link br-sm font-size-md ls-normal" href="#tab1-4">Featured</a>
            </li>
        </ul>
    </div>
    <!-- End of Tab -->
    <div class="tab-content product-wrapper appear-animate tab-bgcolor">
        <div class="tab-pane active pt-4" id="tab1-1">
            <div id="tab1-inner" class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">

            </div>
        </div>
        <!-- End of Tab Pane -->
        <div  class="tab-pane pt-4" id="tab1-2">
            <div id="tab2-inner" class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
   
            </div>
        </div>
        <!-- End of Tab Pane -->
        <div  class="tab-pane pt-4" id="tab1-3">
            <div id="tab3-inner" class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
            </div>
        </div>
        <!-- End of Tab Pane -->
        <div  class="tab-pane pt-4" id="tab1-4">
            <div id="tab4-inner" class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
            </div>
        </div>
        <!-- End of Tab Pane -->
    </div>
    <!-- End of Tab Content -->