
    <div class="icon-clz">
        <i class="w-icon-map-marker text-center"></i>
    </div>
    <br>
        <h1>THANK YOU</h1>
        <h5>Your order has been received</h5>
        <a href="/" class="btn btn-primary btn-sm" data-dismiss="modal">Go To HomePage</a>
    <div class="row order-success-details">
        <div class="col-md-3 col-sm-6 order-success-col">
            <p>Order number: <br>
            <b>#{{$order->id}}</b></p>
        </div>
        <div class="col-md-3 col-sm-6 order-success-col">
            <p>Created at: <br>
            <b>{{$order->date}}</b></p>
        </div>
        <div class="col-md-3 col-sm-6 order-success-col">
            <p>Total: <br>
            <b>LKR <?php echo number_format($order->total, 2); ?> </b></p>
        </div>
        <div class="col-md-3 col-sm-6">
            <p>Payment method: <br>
            <b>{{$order->paymentMethod}}</b></p>
        </div>
    </div>

<div class="order-success-product-details">
    <table>
       <tr class="flex-wrapper three-col">
            <th class="flex-item" >Product:</th>
            <th class="flex-item">Qty</th>
            <th class="flex-item">Total</th>
        </tr>
        @foreach($order->items as $item)
        <tr class="flex-wrapper three-col">
            <td class="flex-item">
                <div><img style="width:60px" src="<?php echo $item->image[0];?>" alt=""></div>
                <div>{{$item->name}}</div>
                
            </td>
            <td class="flex-item">{{$item->quantity}}</td>
            <td class="flex-item">LKR <?php echo number_format($item->price, 2); ?></td>
        </tr>
        @endforeach
        <tr class="flex-wrapper two-col">
            <td class="flex-item "><b>Subtotal</b> </td>
            <td class="flex-item">LKR <?php echo number_format($order->subtotal, 2); ?></td>
        </tr>
        @foreach($order->additionalLines as $additional)
        <tr class="flex-wrapper two-col">
            <td class="flex-item"><b>{{$additional->label}}</b> </td>
            <td class="flex-item">LKR <?php echo number_format($additional->total, 2); ?></td>
        </tr>
        @endforeach
        <tr class="flex-wrapper two-col">
            <td class="flex-item"><b>Coupon</b> </td>
            <td class="flex-item">- LKR <?php echo number_format($order->coupon, 2); ?></td>
        </tr>
        <tr class="flex-wrapper two-col">
            <td class="flex-item"><b><h4>Total</h4> </b> </td>
            <td class="flex-item"><h4>LKR <?php echo number_format($order->total, 2); ?></h4> </td>
        </tr>
    </table>
</div>



