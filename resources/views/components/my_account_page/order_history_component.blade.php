<div class="order-history">
<div class="row">
    <div class="col-6">
        <h4>Order {{$order->id}}</h4>
    </div>
    <div class="col-6">
        <a href="#" class="btn btn-primary btn-sm">Back to List</a>
    </div>
    <p>Was placed on <b>2021-08-17</b> and is currently pending.</p>
</div>
<br>
<hr>
    <table>
        <tr>
            <th><b>Product</b> </th>
            <th><b>Total</b> </th>
        </tr>
        
        @foreach($order->items as $item)
        <tr>
            <td>{{$item->name}} × {{$item->quantity}}</td>
            <td>Rs {{$item->price}}</td>
        </tr>    
        @endforeach

        <tr>
            <td><h5>Subtotal <br> Shipping</h5> </td>
            <td>Rs999.<br>Rs200.</td>
        </tr>
        <tr>
            <td><b><h5>Total</h5> </b> </td>
            <td><h5>Rs2000.</h5> </td>
        </tr>
    </table>

</div>



