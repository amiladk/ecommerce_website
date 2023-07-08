
<script>
    var token = "{{ csrf_token() }}";
    $( document ).ready(function() {
        $.ajax({
            method:"get",
            url:"/api/get-product-category-data",
            cache:false,
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name=token]').attr('content')
            },
            data:{
                "_token"     : token,
                "category"   : '{{$category}}',
            },
            success:function(data){
                response = data.data;

                $.each( response.children, function( key, value ) {
                    $('#category_wrap_{{ $category }}').append('<li><a href="shop?category='+value.slug+'">'+value.label+'</a></li>');

                });
               
            },
            error: function (xhr, status, error) {
                response.success = false;
                response.msg = xhr.statusText;
            }
        });
    });


</script>

<div class="category-wrap mb-4">
    <div class="category category-group-image br-sm">
        <div class="category-content">
            <h4 class="category-name"><a href="shop?category={{$category}}">{{$name}}</a>
            </h4>
            <ul class="category-list" id="category_wrap_{{ $category }}">
            </ul>
        </div>
        <a href="shop?category={{$category}}">
            <figure class="category-media">
                <img src="{{ $image }}" alt="Category" width="190"
                    height="215">
            </figure>
        </a>
    </div>
</div>