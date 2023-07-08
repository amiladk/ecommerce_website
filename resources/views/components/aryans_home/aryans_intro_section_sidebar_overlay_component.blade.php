<script>
    var token = "{{ csrf_token() }}";
    $( document ).ready(function() {
        $.ajax({
            method:"get",
            url:"/api/get-product-best-seller-data",
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
                $('#best-seller-data').html(response);
            },
            error: function (xhr, status, error) {
                response.success = false;
                response.msg = xhr.statusText;
            }
        });
    });
</script>


<div class="sidebar-overlay">
    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
</div>
<a href="#" class="sidebar-toggle"><i class="fas fa-chevron-left"></i></a>
<div class="sidebar-content h-100">
    <div class="title-link-wrapper mb-0">
        <h4 class="title title-link">Best Sellers</h4>
    </div>
    <div class="widget widget-products" id="best-seller-data">
         <!--
        <div class="product product-widget pt-0">
            <figure class="product-media">
                <a href="product-default.html">
                    <img src="assets/images/demos/demo4/products/1-1.jpg" alt="Product"
                        width="300" height="338">
                </a>
            </figure>
            <div class="product-details">
                <h4 class="product-name">
                    <a href="product-default.html">Automatic Watch</a>
                </h4>
                <div class="product-price">
                    <ins class="new-price">$145.62</ins><del
                        class="old-price">$152.13</del>
                </div>
                <div class="sold-by">
                    Sold By
                    <a href="vendor-wcfm-store-product-grid.html">Vendor 2</a>
                </div>
            </div>
        </div>
        -->
    </div>
</div>