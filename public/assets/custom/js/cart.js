let ProductFeature = {
    name  : "string",
    value : "string",
}

let ProductFeaturesSection = {
    name     : "string",
    features : ProductFeature,
}

let ProductAttributeValue = {
    id           : "number",
    name         : "string",
    slug         : "string",
    customFields : "CustomFields",
}

let ProductAttribute = {
    name        : "string",
    slug        : "string",
    featured    : "boolean",
    values      : ProductAttributeValue,
    customFields: "CustomFields",
}

let ProductVariationsAttribute = {
    id    : "number",
    value : "string",
    slug  : "string",
}

let ProductVariations = {
    title  : "string",
    price  : "string",
    cost   : "boolean",
    sku    : "string",
    stoke  : "boolean",
    values : ProductVariationsAttribute,
}

let Product = {
    id               : "number",
    slug             : "string",
    name             : "string",
    sku              : "string",
    price            : "number",
    compareAtPrice   : "number|null",
    images           : "string",
    badges           : "string",
    rating           : "number",
    reviews          : "number",
    availability     : "string",
    stock            : "number",
    brand            : "Brand|null",
    product_type     : "string",
    categories       : "Category",
    attributes       : ProductAttribute,
    variations       : ProductVariations,
    meta_title       : "string",
    meta_description : "string",
    allow_backorder  : "string",
    customFields     : "CustomFields",
    coupon           : "number",
    coupon_code      : "string",

}

let CartItem  = {
    product: Product,
    options: {
        name  : "string",
        value : "string",
    },
    variationId   :"number",
    variationTitle: "string",
    variationPrice:"number",
    variationStock:"number",
    quantity      : "number",
    coupon        : "number",
}

let CartTotal = {
    title: "string",
    price: "number",
    type : 'shipping'|'fee'|'tax'|'other',
}

let CartData = {
    items   : CartTotal,
    quantity: "number",
    subtotal: "number",
    totals  : CartTotal,
    total   : "number",
    weight  : "number",
    coupon  : "number",
    shipping: "number",
}

let  data = {
    items   : [],
    quantity: 0,
    subtotal: 0,
    totals  : [],
    total   : 0,
    weight  : 0,
    coupon  : 0,
    shipping: 0,

};

let discout_items = [];

/*
|--------------------------------------------------------------------------
| Document ready function
|--------------------------------------------------------------------------
*/
$(window).on("load", function() {
    load();

});

/*
|--------------------------------------------------------------------------
| Function add
|--------------------------------------------------------------------------
*/
function add(product, quantity=null, type=null, variationId=null,variationTitle=null,variationPrice=null,variationStock=null,coupon=null,options=[]){

    if(product && !isNaN(quantity) && quantity!=null){
        var item = false;
        var existing_id = -1;
        $.each(data.items, function(key, eachItem ) {

            if(variationId){
                if (eachItem.variationId !== variationId || eachItem.options.length !== options.length) {
                    return false;
                }
            }else{

                if (eachItem.product.id !== product.id || eachItem.options.length !== options.length) {
                    return false;
                }
            }

            if (eachItem.options.length) {
                for (const option of options) {
                    if (!eachItem.options.find(itemOption => itemOption.name === option.name && itemOption.value === option.value)) {

                        return false;
                    }
                }
            }
            item = eachItem;
            existing_id = key;
            return true;
        })

        if (item!=false) {
            item.quantity += quantity;
        } else {
            item = {product, quantity, options,variationId,variationTitle,variationPrice,variationStock,coupon};
            data.items.push(item);
        }

        save();
        load();
    }
}

/*
|--------------------------------------------------------------------------
| Function Caluculate shipping cost
|--------------------------------------------------------------------------
*/
function calculateShippingCost($shipping_cost,$additional_kg_charge){

    let shipping  = $shipping_cost;
    let weight_kg = Math.ceil(data.weight/1000);

    if(weight_kg>1){
        shipping += (weight_kg-1)*$additional_kg_charge;
    }

    data.shipping =shipping;


    load();
}

/*
|--------------------------------------------------------------------------
| Function calc
|--------------------------------------------------------------------------
*/
function calc() {
    let quantity = 0;
    let subtotal = 0;
    let weight   = 0;
    let coupon   = 0;
    let shipping = data.shipping;

    data.items.forEach(item => {

        if(item.variationPrice){
            subtotal += item.variationPrice * item.quantity;
        }else{
            subtotal += item.product.price * item.quantity;
        }
        quantity += item.quantity;
        weight   += item.product.customFields.weight * item.quantity;

        if(item.product.coupon){
           coupon   += item.product.coupon;
        }

    });

    const total = subtotal + shipping - coupon;

    data.quantity = quantity;
    data.subtotal = subtotal;
    data.total    = total;
    data.weight   = weight;
    data.coupon   = coupon;
}

/*
|--------------------------------------------------------------------------
| Function remove
|--------------------------------------------------------------------------
*/
function remove(id){

    data.items.forEach(function(item, index, object) {

        if (parseInt(item.product.id)=== id) {
          object.splice(index, 1);
        }
    });

    save();
    load();


}

/*
|--------------------------------------------------------------------------
| Function clear
|--------------------------------------------------------------------------
*/
function clearCart(){

    data.items =[];

    save();
    load();

}

/*
|--------------------------------------------------------------------------
| Function remove
|--------------------------------------------------------------------------
*/
function update(){

    $('.my-custom-quantity').each(function(i, index ) {
        var value = parseInt($( this ).val());
        var item  = data.items[i];
        item.quantity = value;
    });

    save();
    load();

}


/*
|--------------------------------------------------------------------------
| Function save
|--------------------------------------------------------------------------
*/
function save(){

    localStorage.setItem('cartItems', JSON.stringify(data.items));
}

/*
|--------------------------------------------------------------------------
| Function load
|--------------------------------------------------------------------------
*/
function load(){

    const items = localStorage.getItem('cartItems');

    if (items) {
        data.items = JSON.parse(items);
    }

    calc();

    dropCart(data);
    viewCart(data);


    checkoutDetails(data);
    checkoutPageDetails(data);
}



//......................................................................................................................
//...ttt..hhhh...............................................................................iiii..fffffiiii............
//..tttt..hhhh...............................................................................iiii.ffffffiiii............
//..tttt..hhhh....................................................................................ffff..................
//.tttttthhhhhhhhh....eeeeee..mmmmmmmmmmmmmm........sssssss..spppppppp....eeeeee....cccccc...iiiiiffffffiiii..cccccc....
//.tttttthhhhhhhhhh..eeeeeeee.mmmmmmmmmmmmmmm...... ssssssss.sppppppppp..eeeeeeee..cccccccc..iiiiiffffffiiii.cccccccc...
//..tttt..hhhh.hhhhheeee.eeee.mmmmm.mmmmmmmmm...... sss.ssss.spppp.ppppppeee.eeee.ecccc.cccc.iiii.ffff..iiiiicccc.cccc..
//..tttt..hhhh..hhhheeee..eeeemmmm..mmmm..mmmm..... ssss.....sppp...pppppeee..eeeeeccc..ccc..iiii.ffff..iiiiiccc..ccc...
//..tttt..hhhh..hhhheeeeeeeeeemmmm..mmmm..mmmm......ssssss...sppp...pppppeeeeeeeeeeccc.......iiii.ffff..iiiiiccc........
//..tttt..hhhh..hhhheeeeeeeeeemmmm..mmmm..mmmm.......sssssss.sppp...pppppeeeeeeeeeeccc.......iiii.ffff..iiiiiccc........
//..tttt..hhhh..hhhheeee......mmmm..mmmm..mmmm...........sssssppp...pppppeee......eccc..ccc..iiii.ffff..iiiiiccc..ccc...
//..tttt..hhhh..hhhheeee..eeeemmmm..mmmm..mmmm..... sss..ssssspppp.ppppppeee..eeeeecccc.cccc.iiii.ffff..iiiiicccc.cccc..
//..ttttthhhhh..hhhh.eeeeeeee.mmmm..mmmm..mmmm..... ssssssss.sppppppppp..eeeeeeee..ccccccccc.iiii.ffff..iiii.ccccccccc..
//..ttttthhhhh..hhhh..eeeeee..mmmm..mmmm..mmmm.......ssssss..spppppppp....eeeeee....cccccc...iiii.ffff..iiii..cccccc....
//...........................................................sppp.......................................................
//...........................................................sppp.......................................................
//...........................................................sppp.......................................................
//...........................................................sppp.......................................................
//......................................................................................................................

/*
|--------------------------------------------------------------------------
| Function drop cart
|--------------------------------------------------------------------------
*/
function dropCart(mydata){
    $('#drop-cart').html('');
    $('#aryans-cart').html('');
    $('#aryans-cart-icon').html('');

    var notification = 0;

    $.each( mydata.items, function( key, value ) {
        var element ="<div class='product product-cart'><div class='product-detail'>\
        <a href='/product/"+value.product.slug+"' class='product-name'>"+value.product.name+"</a>\
        <div class='price-box'><span class='product-quantity'>"+value.quantity+"</span><span class='product-price'>"+new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'LKR' }).format(value.product.price)+"</span></div></div>\
        <figure class='product-media'><a href='/product/"+value.product.slug+"'><img src='"+value.product.images[0]+"' alt='product' width='84' height='94'/></a></figure>\
        <button  onclick='remove("+value.product.id+")'  class='btn btn-link btn-close'><i class='fas fa-times'></i></button></div>";

        $('#drop-cart').append(element);
        $('#aryans-cart').append(element);

        notification = key+1;

    });

    var iconElement ='<span class="cart-count">'+notification+'</span>'

    $('#aryans-cart-icon').append(iconElement);
    $('#drop-cart-sub-total').text(new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'LKR' }).format(mydata.subtotal));

}


/*
|--------------------------------------------------------------------------
| Function view cart
|--------------------------------------------------------------------------
*/
function viewCart(mydata){
    $('#view-cart').html('');

    $.each( mydata.items, function( key, value ) {
        var element ="<tr><td class='product-thumbnail'><div class='p-relative'><a href='/product/"+value.product.slug+"'>\
        <figure><img src='"+value.product.images[0]+"' alt='product' width='300' height='338'></a>\
        <button onclick='remove("+value.product.id+")' class='btn btn-close'><i class='fas fa-times'></i></button></div>\
        </td><td class='product-name'><a href='/product/"+value.product.slug+"'>"+value.product.name+"</a>\
        </td><td class='product-price'><span class='amount'>"+new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'LKR' }).format(value.product.price)+"</span></td><td class='product-quantity'>\
        <div class='input-group'><input value='"+value.quantity+"' id='quantity' class='my-custom-quantity form-control' type='number' min='1' max='"+value.product.stock+"'>\
        <button class='increase-count quantity-plus w-icon-plus' data-max='"+value.product.stock+"'></button><button class='decrease-count quantity-minus w-icon-minus'></button>\
        </div></td><td class='product-subtotal'><span class='amount'>"+new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'LKR' }).format(value.product.price * value.quantity)+"</span></td></tr>";
        $('#view-cart').append(element);
    });

    $('#cart-page-sub-total').text(new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'LKR' }).format(mydata.subtotal));
    $('#cart-page-total').text(new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'LKR' }).format(mydata.total));

    cartQuantityCount();

}

/*
|--------------------------------------------------------------------------
| Set checkout details
|--------------------------------------------------------------------------
*/
function checkoutDetails(mydata){

    $('#hidden-checkout-page-details').html('');

    var checkoutItems = mydata.items;

    $.each( checkoutItems, function( key, value ) {

        var appendItem ='<input type="hidden" id="custId" name="product_id[]" value="'+value.product.id+'"> \
                         <input type="hidden" id="custId" name="quantity[]" value="'+value.quantity+'">\
                         <input type="hidden" id="custId" name="coupon[]" value="'+value.product.coupon+'">';

        $('#hidden-checkout-page-details').append(appendItem);
    });

}



/*
|--------------------------------------------------------------------------
| Set checkout page details
|--------------------------------------------------------------------------
*/
function checkoutPageDetails(mydata){
    $('#checkout-page-details').html('');

    var checkoutItems = mydata.items;
    var discout_data  = 0;

    $.each(checkoutItems, function( key, value ) {

        var coupon_applied_html = '';
        if(discout_items.length > 0){
            $.each(discout_items, function( key, data ) {
                if(value.product.id == data.product_id){
                    discout_data += data.value;
                    coupon_applied_html = '<span class="custom-span-label"><label class="product-label label-sale">coupon applied (-'+data.value+')</label></span>';
                }
            });
        }

        var price = parseInt(value.product.price) *  parseInt(value.quantity);
        var appendItem ='<tr class="bb-no"> \
                        <td class="product-name">'+value.product.name+' <i class="fas fa-times"></i> <span class="product-quantity">'+value.quantity+'</span> <br>'+coupon_applied_html+'</td>\
                        <td class="product-total">'+new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'LKR' }).format(price)+'</td>\
                        </tr>';
        $('#checkout-page-details').append(appendItem);
    });

    $('#checkout-page-details').append('<tr class="cart-subtotal bb-no"><td><b>Subtotal</b></td><td><b>'+new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'LKR' }).format(mydata.subtotal)+'</b></td></tr>');
    $('#checkout-page-details').append('<tr class="cart-subtotal bb-no"><td><b>Shipping</b></td><td><b>'+new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'LKR' }).format(mydata.shipping)+'</b></td></tr>');
    $('#checkout-page-details').append('<tr class="cart-subtotal bb-no"><td><b>Discount</b></td><td><b>'+new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'LKR' }).format(discout_data)+'</b></td></tr>');
    $('#checkout-page-details').append('<tr class="cart-subtotal bb-no"><td><b>Total</b></td><td><b>'+new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'LKR' }).format(mydata.total-discout_data)+'</b></td></tr>');

}
