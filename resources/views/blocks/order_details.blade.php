<div>
    <x-my_account_page.order_history_component :order="$order"/>

    <div class="row" id="account-dashboard">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-4">
            <x-my_account_page.address_card_component :address="$order->billingAddress"/>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-4">
            <x-my_account_page.address_card_component :address="$order->shippingAddress"/>
        </div>
    </div>
</div>
