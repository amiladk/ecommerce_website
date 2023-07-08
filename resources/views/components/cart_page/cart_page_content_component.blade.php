<div class="page-content">
    <div class="container">
        <div class="row gutter-lg mb-10">
            <div class="col-lg-8 pr-lg-4 mb-6">
                <table class="shop-table cart-table">
                    <thead>
                        <tr>
                            <th class="product-name"><span>Product</span></th>
                            <th></th>
                            <th class="product-price"><span>Price</span></th>
                            <th class="product-quantity"><span>Quantity</span></th>
                            <th class="product-subtotal"><span>Subtotal</span></th>
                        </tr>
                    </thead>
                    <tbody id="view-cart">
                    </tbody>
                </table>

                <div class="cart-action mb-6">
                    <a href="/shop" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                    <button onclick="clearCart()"  class="btn btn-rounded btn-default btn-clear" name="clear_cart" value="Clear Cart">Clear Cart</button>
                    <button onclick="update()" class="btn btn-rounded btn-update" name="update_cart" value="Update Cart">Update Cart</button>
                </div>

                {{-- <form class="coupon">
                    <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                    <input type="text" class="form-control mb-4" placeholder="Enter coupon code here..." required />
                    <button class="btn btn-dark btn-outline btn-rounded">Apply Coupon</button>
                </form> --}}
            </div>
            <div class="col-lg-4 sticky-sidebar-wrapper">
                <div class="sticky-sidebar">
                    <div class="cart-summary mb-4">
                        <h3 class="cart-title text-uppercase">Cart Totals</h3>
                        <div class="cart-subtotal d-flex align-items-center justify-content-between">
                            <label class="ls-25">Subtotal</label>
                            <span id="cart-page-sub-total"></span>
                        </div>

                        <hr class="divider">

                        <!-- <ul class="shipping-methods mb-2">
                            <li>
                                <label
                                    class="shipping-title text-dark font-weight-bold">Shipping</label>
                            </li>
                            <li>
                                <div class="custom-radio">
                                    <input type="radio" id="free-shipping" class="custom-control-input"
                                        name="shipping">
                                    <label for="free-shipping"
                                        class="custom-control-label color-dark">Free
                                        Shipping</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-radio">
                                    <input type="radio" id="local-pickup" class="custom-control-input"
                                        name="shipping">
                                    <label for="local-pickup"
                                        class="custom-control-label color-dark">Local
                                        Pickup</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-radio">
                                    <input type="radio" id="flat-rate" class="custom-control-input"
                                        name="shipping">
                                    <label for="flat-rate" class="custom-control-label color-dark">Flat
                                        rate:
                                        $5.00</label>
                                </div>
                            </li>
                        </ul> -->

                        <!-- <div class="shipping-calculator">
                            <p class="shipping-destination lh-1">Shipping to <strong>CA</strong>.</p>

                            <form class="shipping-calculator-form">
                                <div class="form-group">
                                    <div class="select-box">
                                        <select name="country" class="form-control form-control-md">
                                            <option value="default" selected="selected">United States
                                                (US)
                                            </option>
                                            <option value="us">United States</option>
                                            <option value="uk">United Kingdom</option>
                                            <option value="fr">France</option>
                                            <option value="aus">Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="select-box">
                                        <select name="state" class="form-control form-control-md">
                                            <option value="default" selected="selected">California
                                            </option>
                                            <option value="ohaio">Ohaio</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-md" type="text"
                                        name="town-city" placeholder="Town / City">
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-md" type="text"
                                        name="zipcode" placeholder="ZIP">
                                </div>
                                <button type="submit" class="btn btn-dark btn-outline btn-rounded">Update
                                    Totals</button>
                            </form>
                        </div> -->

                        <!-- <hr class="divider mb-6"> -->
                        <div class="order-total d-flex justify-content-between align-items-center">
                            <label>Total</label>
                            <span id="cart-page-total" class="ls-50"></span>
                        </div>
                        <a href="/checkout"
                            class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                            Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
