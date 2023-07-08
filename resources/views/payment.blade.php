<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{  url('/') }}/assets/images/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{  url('/') }}/assets/images/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{  url('/') }}/assets/images/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{  url('/') }}/assets/images/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{  url('/') }}/assets/images/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{  url('/') }}/assets/images/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{  url('/') }}/assets/images/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{  url('/') }}/assets/images/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{  url('/') }}/assets/images/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{  url('/') }}/assets/images/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{  url('/') }}/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{  url('/') }}/assets/images/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{  url('/') }}/assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="{{  url('/') }}/assets/images/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{  url('/') }}/assets/images/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    <style>
        .background-wrapper{
          display: block;
          position: fixed;
          z-index: 0;
          width: 100%;
          height: 100%;
          top: 0;
          left: 0;
        }
        .background {
            background-image: url('/assets/images/demos/demo4/slides/slide-3.webp');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }
        
        body::before{
          content: "";
          display: block;
          position: absolute;
          z-index: -1;
          width: 100%;
          height: 100%;
          top: 0;
          left: 0;
          background-color: rgba(0,0,0,0.6);
        }
        .card{
            position:absolute;
            z-index:3;
            top:50%;
            left:50%;
            transform: translate(-50%, -50%);
            width: 300px;
            background:#ffffff6e;
        }
        .btn{
          width:200px;
        }
    </style>

    <title>www.aryanselectronics.com</title>
  </head>
  <body>
      <div class="background-wrapper"> 
         <div class="background"></div>
      </div>
      <div class="card shadow-sm">
        <div class="card-body">
            <form method="post" action="{{$data['action']}}">   
                <input type="hidden" name="merchant_id" value="{{$payhere['merchant_id']}}">
                <input type="hidden" name="return_url" value="{{$payhere['return_url']}}">
                <input type="hidden" name="cancel_url" value="{{$payhere['cancel_url']}}">
                <input type="hidden" name="notify_url" value="{{$payhere['notify_url']}}">  
                <input type="hidden" name="order_id" value="{{$payhere['order_id']}}">
                <input type="hidden" name="items" value="{{$payhere['items']}}">
                <input type="hidden" name="currency" value="{{$payhere['currency']}}"> 
                <input type="hidden" name="amount" value="{{$payhere['amount']}}">  
                <input type="hidden" name="first_name" value="{{$payhere['first_name']}}">
                <input type="hidden" name="last_name" value="{{$payhere['last_name']}}">
                <input type="hidden" name="email" value="{{$payhere['email']}}">
                <input type="hidden" name="phone" value="{{$payhere['phone']}}">
                <input type="hidden" name="address" value="{{$payhere['address']}}">
                <input type="hidden" name="city" value="{{$payhere['city']}}">
                <input type="hidden" name="country" value="{{$payhere['country']}}">
                <input type="hidden" name="delivery_address" value="{{$payhere['delivery_address']}}">
                <input type="hidden" name="delivery_city" value="{{$payhere['delivery_city']}}">
                <input type="hidden" name="delivery_country" value="{{$payhere['delivery_country']}}">
                <input type="hidden" name="hash" value="{{$payhere['hash']}}"> 

                <div class="text-center pt-5 pb-5">
                  <button class="btn btn-success mb-3" type="submit"> Proceed your payment </button><br>
                  <a  href="/order-success?order_id={{$payhere['order_id']}}" class="btn btn-danger" type="button"><i class="far fa-times-circle"></i> Cancel </a>
              </div>
            </form>
        </div>
      </div>

      <script>

        // Disable key bord
        document.onkeydown = function (e) {
          return false;
        }

        // Disable right click
        document.addEventListener('contextmenu', event => event.preventDefault());

      </script>
  </body>
</html>