var token = "{{ csrf_token() }}";
/*
|--------------------------------------------------------------------------
| Document ready function
|--------------------------------------------------------------------------
*/ 
$( document ).ready(function() {
    shopData();
    $( "a.pagination-click" ).click(function() {
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
});

/*
|--------------------------------------------------------------------------
| Function shop data.
|--------------------------------------------------------------------------
*/ 
// window.addEventListener('locationchange', function(){
//     alert('Test');
// })

function shopData(){

    // var refresh = window.location.protocol + "//" + window.location.host + window.location.pathname + '?search=lorem'+'set=10';    
    // window.history.pushState({ path: refresh }, '', refresh);

    var path = window.location.href.split("shop");
    var param = path[1];
    

    $.ajax({
        method:"get",
        url:"/api/shop-main-content-data",
        cache:false,
        async: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name=token]').attr('content')
        },
        data:{
            "_token" : token,
            "param"  : param,

        },
        success:function(data){
            response = data;
            // console.log(data.products);
            $('#shop-main-content').html(response.products);
            $('#shop_sidebar').html(response.sidebar);
            $('#shop-pagination').html(response.pagination);
            
        },
        error: function (xhr, status, error) {
            response.success = false;
            response.msg = xhr.statusText;
        }
    });
}



/*
|--------------------------------------------------------------------------
| Function change url - eg 02
|--------------------------------------------------------------------------
*/
function changeUrl(param,value){
    console.log('param='+ param);
    console.log('value='+value);
   
    if(param =='page'){
        var url = new URL(window.location.href);
        url = removeURLParameter(url, 'page');
    }
    else if(param =='filter_price'){
        var url = new URL(window.location.href);
        url = removeURLParameter(url, 'page');
        url = removeURLParameter(url, 'filter_price');
    }else if(param =='sort'){
        var url = new URL(window.location.href);
        // Remove the parameter from the URL
        url = removeURLParameter(url, 'page');
        url = removeURLParameter(url, 'sort');
    }else{
        var url = new URL(window.location.href);
        // Remove the parameter from the URL
        url = removeURLParameter(url, 'page');
        url = removeURLParameter(url, 'category');
    }
  

    url = addURLParameter(url, param, value);
    // Redirect to the updated URL
    window.location.href = url;

    shopData();

    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });


}

/*
|--------------------------------------------------------------------------
| Function change url - Old code
|--------------------------------------------------------------------------
*/
// function changeUrl(param,value){

//     var url = new URL(window.location.href);
//     url.searchParams.set(param,value);

//     window.history.pushState({ path: url.href }, '', url.href);

//     shopData();

//     window.scrollTo({
//         top: 0,
//         behavior: 'smooth'
//     });


// }


// function scrollToTop() {
//     window.scrollTo({top: 0, behavior: 'smooth'});
// }

/*
|--------------------------------------------------------------------------
| Function change price
|--------------------------------------------------------------------------
*/
function changePrice(){

    var min   = ($('#min_price').val() != "" ? $('#min_price').val() : $('#min_price').attr('data-min-value')) ;
    var max   = ($('#max_price').val() != "" ? $('#max_price').val() : $('#max_price').attr('data-max-value')) ;
    var value = min+'-'+max;
    changeUrl('filter_price',value);
}


/*
|--------------------------------------------------------------------------
| Function #TODO ADD and Remove parameter from URL
|--------------------------------------------------------------------------
*/

// Function to remove a parameter from the URL
function removeURLParameter(url, parameterName) {
    var baseUrl = url.toString().split('?')[0]; // Get the base URL without parameters
    var urlParameters = url.toString().split('?')[1]; // Get the parameters part of the URL

    if (urlParameters) {
        var params = urlParameters.split('&'); // Split the parameters into an array

        // Loop through the parameters and remove the one with the specified name
        for (var i = params.length - 1; i >= 0; i--) {
            var parameter = params[i].split('=')[0]; // Get the parameter name

            if (parameter === parameterName) {
                params.splice(i, 1); // Remove the parameter from the array
            }
        }

        // Reconstruct the URL without the removed parameter
        url = baseUrl + '?' + params.join('&');
    }

    return url;
}


// Function to add a parameter to the URL
function addURLParameter(url, parameterName, parameterValue) {
    var baseUrl = url.toString().split('?')[0]; // Get the base URL without parameters
    var urlParameters = url.toString().split('?')[1]; // Get the parameters part of the URL

    if (urlParameters) {
        url = baseUrl + '?' + urlParameters + '&' + parameterName + '=' + parameterValue;
    } else {
        url = baseUrl + '?' + parameterName + '=' + parameterValue;
    }
    return url;
}