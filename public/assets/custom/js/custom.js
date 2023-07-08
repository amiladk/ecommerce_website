/*
|--------------------------------------------------------------------------
| Document ready function
|--------------------------------------------------------------------------
*/
$(document).ready(function () {
    checkoutFormValidation();
    addressCardValidation();
    phoneNumberCardValidation();
    signUpFormValidation();
    signInFormValidation();
    formSubmit();
    reviewFormValidation();
    contactFormValidation();
    editAddressCardValidation();
    editPhoneNumberCardValidation();
    checkBox();
    forgetPasswordFormValidation();
    passwordResetFormValidation();
    changeAccountDetailsFormValidation();


    $('.select2').select2();


    $('.select2-modal-addresss').select2({

        dropdownCssClass: "select2-modal-addresss",
        dropdownParent: $('#test-popup')
    });

    $(".select2-full").select2({
        dropdownCssClass: "select2-full",
        dropdownParent: $('#edit-popup')
    });

    cartQuantityCount();

});

let firedEvents = [];

$(window).scroll(function () {
    $(".load-ajax").each(function () {
        if (!firedEvents.includes(this) && $(window).scrollTop() + $(window).height() > $(this).offset().top) {
            firedEvents.push(this);
            eval($(this).data('load'));
        }
    });
});

$(window).on('load', function () {
    $("a.pointer-events-none").css("pointer-events", "all");
    $('#pre-loader.home').css("display", "none");
});



/*
|--------------------------------------------------------------------------
| Function CheckBox
|--------------------------------------------------------------------------
*/
function checkBox() {

    $("#pass-required-checkbox").click(function () {

        if ($(this).is(":checked")) {

            $("#old_password").prop("disabled", false);
            $("#password").prop("disabled", false);
            $("#password_confirmation").prop("disabled", false);

        }
        else {
            $("#old_password").prop("disabled", true);
            $("#password").prop("disabled", true);
            $("#password_confirmation").prop("disabled", true);
            $("#old_password").val('');
            $("#password").val('');
            $("#password_confirmation").val('');

        }

    });


    $("#show-pass-checkbox").click(function () {

        var x = document.getElementById("new-password");
        var y = document.getElementById("re-new-password");

        if ($(this).is(":checked")) {

            x.type = "text";
            y.type = "text";
        }
        else {

            x.type = "password";
            y.type = "password";
        }


    });

}



/*
|--------------------------------------------------------------------------
| Select payment method
|--------------------------------------------------------------------------
*/
function changePaymentMethod(ele) {

    $('a.payment-check-box').each(function () {
        $(this).css('pointer-events', 'all');
    });

    var type = $(ele).attr("data-method");
    $(ele).css('pointer-events', 'none');
    $("#hidden_payment_method").val(type);


}

/*
|--------------------------------------------------------------------------
| Submit SignUp Form
|--------------------------------------------------------------------------
*/
function formSubmit() {
    $("a#sign-up-submit").click(function () {
        $("#signup-form").submit();
        return false;
    });

}


/*
|--------------------------------------------------------------------------
| Checkout form validation
|--------------------------------------------------------------------------
*/
function checkoutFormValidation() {
    $(".checkout-form").validate({
        ignore: [],
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function (error, element) {
            if (element.attr('type') == "checkbox") {
                element.closest("div").append(error);

            } else if ($(element).hasClass('select2')) {
                element.closest("div.form-group").append(error);
            } else {
                error.insertAfter(element)
            }
        },
        rules: {
        },
        submitHandler: function (form) {
            invokeLoader();
            form.submit();
        }
    })
}

/*
|--------------------------------------------------------------------------
| Address card validation
|--------------------------------------------------------------------------
*/
function addressCardValidation() {
    $("#address-card").validate({
        ignore: [],
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function (error, element) {
            if ($(element).hasClass('select2-modal-addresss')) {
                element.closest("div.form-group").append(error);
            } else {
                error.insertAfter(element)
            }
        },
        rules: {
        },
        submitHandler: function (form) {
            invokeLoader();
            form.submit();
        }
    })
}


/*
|--------------------------------------------------------------------------
| Edit Address card validation
|--------------------------------------------------------------------------
*/
function editAddressCardValidation() {
    $("#edit-address-card").validate({
        ignore: [],
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function (error, element) {
            if ($(element).hasClass('select2-full')) {
                element.closest("div.form-group").append(error);
            } else {
                error.insertAfter(element)
            }
        },
        rules: {
        },
        submitHandler: function (form) {
            invokeLoader();
            form.submit();
        }
    })
}



/*
|--------------------------------------------------------------------------
| Phone card validation
|--------------------------------------------------------------------------
*/
function phoneNumberCardValidation() {
    $("#phone-number").validate({
        ignore: [],
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element)
        },
        rules: {
        },
        submitHandler: function (form) {
            invokeLoader();
            form.submit();
        }
    })
}


/*
|--------------------------------------------------------------------------
| Edit Phone card validation
|--------------------------------------------------------------------------
*/
function editPhoneNumberCardValidation() {
    $("#edit-phone-number").validate({
        ignore: [],
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element)
        },
        rules: {
        },
        submitHandler: function (form) {
            invokeLoader();
            form.submit();
        }
    })
}

/*
|--------------------------------------------------------------------------
| Signup form validation
|--------------------------------------------------------------------------
*/
function signUpFormValidation() {
    $("#signup-form").validate({
        ignore: [],
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function (error, element) {
            if (element.attr('type') != "checkbox") {
                error.insertAfter(element)
            } else {
                element.closest("div").append(error);
            }

        },
        rules: {

            password: {
                required: true,
                minlength: 4,
            },
            password_confirmation: {
                required: true,
                equalTo: "#password1"
            }

        },
        submitHandler: function (form) {
            invokeLoader();
            form.submit();
        }
    })
}

/*
|--------------------------------------------------------------------------
| Signup form validation
|--------------------------------------------------------------------------
*/
function signInFormValidation() {
    $("#signin-form").validate({
        ignore: [],
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element)
        },
        rules: {

            password: {
                required: true,
                minlength: 4,
            },

        },
        submitHandler: function (form) {
            invokeLoader();
            form.submit();
        }
    })
}


/*
 |--------------------------------------------------------------------------
 | Forget password form validation
 |--------------------------------------------------------------------------
 */

function forgetPasswordFormValidation() {

    $("#forget-pass-form").validate({
        ignore: [],
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element)
        },
        rules: {

        },
        submitHandler: function (form) {
            invokeLoader();
            form.submit();
        }
    })



}



/*
|--------------------------------------------------------------------------
| password reset form validation
|--------------------------------------------------------------------------
*/

function passwordResetFormValidation() {

    $("#password-reset-form").validate({
        ignore: [],
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element)
        },
        rules: {

            password: {
                required: true,
                minlength: 4
            },
            password_confirmation: {
                equalTo: "#new-password"
            }

        },
        submitHandler: function (form) {
            invokeLoader();
            form.submit();
        }
    })


}


/*
|--------------------------------------------------------------------------
| change account details form validation
|--------------------------------------------------------------------------
*/

function changeAccountDetailsFormValidation() {

    $("#change-account-details").validate({
        ignore: [],
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element)
        },
        rules: {

            password: {
                required: true,
                minlength: 4
            },
            password_confirmation: {
                equalTo: "#password"
            }

        },
        submitHandler: function (form) {
            invokeLoader();
            form.submit();
        }
    })

}




/*
|--------------------------------------------------------------------------
| Review form validation
|--------------------------------------------------------------------------
*/
function reviewFormValidation() {
    $("#review-form").validate({
        ignore: [],
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function (error, element) {
            if ($(element).hasClass('star-rating')) {
                element.closest("div.rating-wrap").append(error);
            } else {
                error.insertAfter(element)
            }
        },
        rules: {

        },
        submitHandler: function (form) {
            invokeLoader();
            form.submit();
        }
    })
}

/*
 |--------------------------------------------------------------------------
 | Review form validation
 |--------------------------------------------------------------------------
 */
function contactFormValidation() {
    $("#contact-form").validate({
        ignore: [],
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element)
        },
        rules: {
            hiddenRecaptcha: {
                required: function () {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        },
        submitHandler: function (form) {
            invokeLoader();
            form.submit();
        }
    })
}

/*
|--------------------------------------------------------------------------
| product quantity add to cart
|--------------------------------------------------------------------------
*/

function cartQuantityCount() {

    $(".increase-count").click(function () {

        var ele = $(this);
        var input = ele.parent().find('.my-custom-quantity');
        var value = parseInt(input.val(), 10);
        var max = parseInt(ele.data('max'));

        if (value < max) {
            value = isNaN(value) ? 0 : value;
            value++;
            input.val(value);
        }


    });


    $(".decrease-count").click(function () {
        var ele = $(this);
        var input = ele.parent().find('.my-custom-quantity');
        var value = parseInt(input.val(), 10);

        if (value > 1) {
            value = isNaN(value) ? 0 : value;
            value--;
            input.val(value);
        }
    });

}


/*
|--------------------------------------------------------------------------
| Invoke Loader
|--------------------------------------------------------------------------
*/
function invokeLoader() {
    $('html, body').css({ overflow: 'hidden' });
    $(document).bind("contextmenu", function (e) { return false; });
    var svg = '<div class="loader-wrapper" style="top:' + $(document).scrollTop() + 'px;"><?xml version="1.0" encoding="utf-8"?><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><g transform="rotate(0 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffa500"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(30 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffa500"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(60 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffa500"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(90 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffa500"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(120 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffa500"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(150 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffa500"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(180 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffa500"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(210 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffa500"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(240 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffa500"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(270 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffa500"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(300 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffa500"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(330 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffa500"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animate></rect></g><!--[ldio] generated by https://loading.io/ --></svg></div>';
    $(svg).appendTo('body');

}

/*
|--------------------------------------------------------------------------
| AddMethod Validation
|--------------------------------------------------------------------------
*/
jQuery.validator.addMethod("phone", function (value, element) {
    return this.optional(element) || /^[0-9]{10}$/.test(value);
}, 'Please enter a valid phone number.');

jQuery.validator.addMethod("pass", function (value, element) {
    return this.optional(element) || /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/.test(value);
}, 'Please enter minimum eight characters, at least one letter, one number and one special character.');

jQuery.validator.addMethod("laxEmail", function (value, element) {
    // allow any non-whitespace characters as the host part
    return this.optional(element) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test(value);
}, 'Please enter a valid email address.');

jQuery.validator.addMethod("hidden_payment_method", function (value, element) {
    if ($('#hidden_payment_method').val() == "") return false;
    else return true;
}, 'Payment method is required.');

jQuery.validator.addMethod("select2", function (value, element) {
    if ($(".select2 option:selected").val() == "default") return false;
    else return true;
}, 'This field is required.');

jQuery.validator.addMethod("select2-modal-addresss", function (value, element) {
    if ($(".select2-modal-addresss option:selected").val() == "default") return false;
    else return true;
}, 'This field is required.');

jQuery.validator.addMethod("select2-full", function (value, element) {
    if ($(".select2-full option:selected").val() == "default") return false;
    else return true;
}, 'This field is required.');


var token = "{{ csrf_token() }}";

$("#apply_coupon").click(function(){
    $(this).closest('.coupon-content').find('#coupon_code-error').remove();
    if($('#coupon_code').val()==''){
        //console.log($(this).closest('.form-group'));
        $(this).closest('.coupon-content').append('<label id="coupon_code-error" class="text-danger" for="coupon_code">This field is required.</label>');
    }
    else{

        $.ajax({
            method:"get",
            url:"/api/apply-coupon-code",
            cache:false,
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name=token]').attr('content')
            },
            data:{
                "_token"        : token,
                "coupon_code"   : $('#coupon_code').val(),
            },
            success:function(data){
                if(data.success==false){
                    showToastAlerat('error','Discount Not Found!');
                    discout_items=[];
                }
                if(data.success==true){
                    showToastAlerat('success','Discount Applied!');
                    discout_items=data.data;
                    load();
                }
            },
            error: function (xhr, status, error) {
                response.success = false;
                response.msg = xhr.statusText;
            }
        });
    }
});


function showToastAlerat(icon_type,msg){
    $.toast({
        heading: 'Welcome to Aryans Store',
        text:msg,
        position:'top-right',
        loaderBg:'#ff6849',
        icon:icon_type,
        hideAfter: ($( "body" ).hasClass( "home" )) ? 10500 : 4500,
    });
}

$("#coupon_code").keyup(function() {
    discout_items=[];
    load();
});

