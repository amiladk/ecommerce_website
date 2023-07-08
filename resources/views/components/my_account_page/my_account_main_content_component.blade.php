<script>  
    function loadData($order_id,){
        var token = "{{ csrf_token() }}";
        $url      = '/api/get-order-details'; 
        $access_token = <?php echo json_encode($accessToken); ?> 
        if($order_id){
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
                "order_id"     : $order_id,
                "access_token":  $access_token,
        
            },
            success:function(data){
                response = data; 
                $('#order-history').html(response);
                $('a[href="#order-history"]').trigger('click');
            },
            error: function (xhr, status, error) {
                response.success = false;
                response.msg = xhr.statusText;
            }
        });
        }
    }
</script>
<div class="page-content pt-2">
    <div class="container">
        <div class="tab tab-vertical row gutter-lg">
            <ul class="nav nav-tabs mb-6" role="tablist">
                <li class="nav-item">
                    <a href="#account-dashboard" class="nav-link active">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#account-orders" class="nav-link">Orders</a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#account-downloads" class="nav-link">Downloads</a>
                </li> -->
                <li class="nav-item">
                    <a href="#account-addresses" class="nav-link">Addresses</a>
                </li>
                <li class="nav-item">
                    <a href="#account-phone-numbers" class="nav-link">Phone Numbers</a>
                </li>
                <li class="nav-item">
                    <a href="#account-details" class="nav-link">Account details</a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#order-history" class="nav-link">Order History</a>
                </li> -->
                <!-- <li class="link-item">
                    <a href="wishlist.html">Wishlist</a>
                </li> -->
                <li class="link-item">
                    <a href="/logout" >Logout</a>
                </li>
            </ul>

            <div class="tab-content mb-6">
                <div class="tab-pane active in" id="account-dashboard">
                    <p class="greeting">
                        Hello
                        <span class="text-dark font-weight-bold">{{$customer->data->customer_name}}</span>
                        (not
                        <span class="text-dark font-weight-bold">{{$customer->data->customer_name}}</span>?
                        <a href="/logout" class="text-primary">Log out</a>)
                    </p>

                    <p class="mb-4">
                        From your account dashboard you can view your <a href="#account-orders"
                            class="text-primary link-to-tab">recent orders</a>,
                        manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
                            and billing
                            addresses</a>, and
                        <a href="#account-details" class="text-primary link-to-tab">edit your password and
                            account details.</a>
                    </p>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-4 col-xs-6 mb-4">
                            <a href="#account-orders" class="link-to-tab">
                                <div class="icon-box text-center">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <p class="text-uppercase mb-0">Orders</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-4 col-xs-6 mb-4">
                        <a href="#account-phone-numbers" class="link-to-tab">
                            <div class="icon-box text-center">
                                <span class="icon-box-icon icon-phone">
                                    <i class="w-icon-phone"></i>
                                </span>
                                <div class="icon-box-content">
                                    <p class="text-uppercase mb-0">Phone Numbers</p>
                                </div>
                            </div>
                        </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-4 col-xs-6 mb-4">
                            <a href="#account-addresses" class="link-to-tab">
                                <div class="icon-box text-center">
                                    <span class="icon-box-icon icon-address">
                                        <i class="w-icon-map-marker"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <p class="text-uppercase mb-0">Addresses</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-4 col-xs-6 mb-4">
                            <a href="#account-details" class="link-to-tab">
                                <div class="icon-box text-center">
                                    <span class="icon-box-icon icon-account">
                                        <i class="w-icon-user"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <p class="text-uppercase mb-0">Account Details</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                            <a href="wishlist.html" class="link-to-tab">
                                <div class="icon-box text-center">
                                    <span class="icon-box-icon icon-wishlist">
                                        <i class="w-icon-heart"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <p class="text-uppercase mb-0">Wishlist</p>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                        <!-- <div class="col-lg-3 col-md-6 col-sm-4 col-xs-6 mb-4">
                            <a href="/logout">
                                <div class="icon-box text-center">
                                    <span class="icon-box-icon icon-logout">
                                        <i class="w-icon-logout"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <p class="text-uppercase mb-0">Logout</p>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                    </div>
                </div>

                <div class="tab-pane mb-4" id="account-orders">
                    <div class="icon-box icon-box-side icon-box-light">
                        <span class="icon-box-icon icon-orders">
                            <i class="w-icon-orders"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                        </div>
                    </div>

                    <table class="shop-table account-orders-table mb-6">
                        <thead>
                            <tr>
                                <th class="order-id">Order</th>
                                <th class="order-date">Date</th>
                                <th class="order-status">Status</th>
                                <th class="order-total">Total</th>
                                <th class="order-actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders->data as $order)
                            <tr>
                                <td class="order-id">{{$order->id}}</td>
                                <td class="order-date">{{$order->date}}</td>
                                <td class="order-status">{{$order->status}}</td>
                                <td class="order-total">
                                    <span class="order-price">Rs {{$order->total}}</span> for
                                    <span class="order-quantity"> {{$order->quantity}}</span> item
                                </td>
                                <td class="order-action">
                                    <a onclick="loadData('{{$order->id}}')" href="#"
                                        class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                </td>
                            </tr>                       
                            @endforeach                         
                        </tbody>
                    </table>

                    <a href="/shop" class="btn btn-dark btn-rounded btn-icon-right">Go
                        Shop<i class="w-icon-long-arrow-right"></i></a>
                </div>

                <div class="tab-pane" id="account-downloads">
                    <div class="icon-box icon-box-side icon-box-light">
                        <span class="icon-box-icon icon-downloads mr-2">
                            <i class="w-icon-download"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title ls-normal">Downloads</h4>
                        </div>
                    </div>
                    <p class="mb-4">No downloads available yet.</p>
                    <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                        Shop<i class="w-icon-long-arrow-right"></i></a>
                </div>

                <div class="tab-pane" id="account-addresses">
                    <div class="icon-box icon-box-side icon-box-light">
                        <span class="icon-box-icon icon-map-marker">
                            <i class="w-icon-map-marker"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                        </div>
                    </div>
                    <p>The following addresses will be used on the checkout page
                        by default.</p>
                    <br>
                    <div class="row" id="account-dashboard">
                        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                            <x-my_account_page.add_new_card_component  :cities="$cities"/>
                        </div>
                        @if($addresses->success && $addresses->data)
                            @foreach($addresses->data as $address)
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <x-my_account_page.address_card_component :address="$address" />
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>

                <div class="tab-pane" id="account-phone-numbers">
                    <div class="icon-box icon-box-side icon-box-light">
                        <span class="icon-box-icon icon-phone">
                            <i class="w-icon-phone"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title mb-0 ls-normal">Phone Numbers</h4>
                        </div>
                    </div>
                    
                    <p>The following addresses will be used on the checkout page
                        by default.</p>
                    <br>
                    <div class="row" id="account-dashboard">
                        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                            <x-my_account_page.add_new_phone_component/>
                        </div>
                        @if($numbers->success && $numbers->data)
                            @foreach($numbers->data as $number)
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <x-my_account_page.phone_number_card_component :number="$number"/>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>

                <div class="tab-pane" id="account-details">
                    <div class="icon-box icon-box-side icon-box-light">
                        <span class="icon-box-icon icon-account mr-2">
                            <i class="w-icon-user"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                        </div>
                    </div>
                    <form class="form account-details-form" action="/edit-account-details" method="post" id="change-account-details">
                        @csrf
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">First name *</label>
                                    <input type="text" id="firstname" name="firstname" placeholder="John"
                                        class="form-control form-control-md">
                                </div>
                            </div> -->
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Last name *</label>
                                    <input type="text" id="lastname" name="lastname" placeholder="Doe"
                                        class="form-control form-control-md">
                                </div>
                            </div> -->
                        </div>
                        <div class="form-group mb-3">
                            <label for="cus_name">Customer Name *</label>
                            <input type="text" id="customer_name" name="customer_name" required placeholder="Name"
                                class="form-control form-control-md" value="{{$customer->data->customer_name}}">

                        </div>

                        <!-- <div class="form-group mb-3">
                            <label for="cus-username">Display name *</label>
                            <input type="text" id="cus-username" name="cus-username" placeholder="John Doe"
                                class="form-control form-control-md mb-0">
                        </div> -->

                        <div class="form-group mb-6">
                            <label for="email_1">Email Address *</label>
                            <input type="email"
                                class="form-control form-control-md" readonly value="{{$customer->data->email}}">
                                <p>you can't change the email!</p>
                        </div>
                        
                        <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                        <div class="form-group">
                            <label class="text-dark" for="cur-password">Current Password leave blank to leave unchanged</label>
                            <input type="password" required class="form-control form-control-md"
                                id="old_password" name="old_password" disabled>
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="new-password">New Password leave blank to leave unchanged</label>
                            <input type="password" required class="form-control form-control-md"
                                id="password" name="password" disabled>
                        </div>
                        <div class="form-group mb-10">
                            <label class="text-dark" for="conf-password">Confirm Password</label>
                            <input type="password"  required class="form-control form-control-md"
                                id="password_confirmation" name="password_confirmation" disabled>

                            <input type="checkbox" class="custom-control-input" id="pass-required-checkbox" value="true" name="password-required">
                            <label class="custom-control-label" for="pass-required-checkbox">Required Password Change</label>
                        </div>
                        <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                    </form>
                </div>

                <div class="tab-pane" id="order-history">
                </div>

            </div>
        </div>
    </div>
</div>


<x-my_account_page.edit_address_card_component :cities="$cities"/>

<x-my_account_page.edit_phone_card_component/>

<x-my_account_page.edit_confirm_card_component/>
