<div class="login-popup">

<script>
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

        if(element.attr('type') != "checkbox"){
            error.insertAfter(element)
        }else{
            element.closest( "div" ).append(error);
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
       submitHandler: function(form) {
           invokeLoader();
           form.submit();
    }
   })

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
       submitHandler: function(form) {
           invokeLoader();
           form.submit();
    }
   })
</script>

    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
        <ul class="nav nav-tabs text-uppercase" role="tablist">
            <li class="nav-item">
                <a href="#sign-in" class="nav-link active">Sign In</a>
            </li>
            <li class="nav-item">
                <a href="#sign-up" class="nav-link">Sign Up</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="sign-in">
                <form action="/signin-form" method="POST" id="signin-form">
                    @csrf
                    <div class="form-group">
                        <label>Email address *</label>
                        <input type="text" class="form-control laxEmail" name="email" id="email" required>
                    </div>
                    <div class="form-group mb-0">
                        <label>Password *</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                        <a href="/forget-password">Lost your password?</a>
                    </div>
                    <!-- <a href="#" class="btn btn-primary">Sign In</a> -->
                    <button type="submit" class="btn btn-primary w-100">Sign In</button>

                    <p class="text-center mt-2">Sign in with social account</p>
                    <div class="social-icons social-icon-border-color d-flex justify-content-center">
                        <a href="/login/facebook" class="social-icon social-facebook w-icon-facebook"></a>
                        <!-- <a href="#" class="social-icon social-twitter w-icon-twitter"></a> -->
                        <a href="/login/google" class="social-icon social-google fab fa-google"></a>
                    </div>

                </form>
            </div>
            <div class="tab-pane" id="sign-up">
                <form action="/signup-form" method="POST" id="signup-form">
                    @csrf
                    <div class="form-group">
                        <label>Your Name *</label>
                        <input type="text" class="form-control" name="customer_name" id="customer_name" required>
                    </div>
                    <div class="form-group">
                        <label>Your Email address *</label>
                        <input type="email" class="form-control laxEmail" name="email" id="email" required>
                    </div>
                    <div class="form-group mb-5">
                        <label>Password *</label>
                        <input type="password" class="form-control" name="password" id="password1" required>
                    </div>
                    <div class="form-group mb-5">
                        <label>Confirm Password *</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                    </div>
                    <p>Your personal data will be used to support your experience 
                        throughout this website, to manage access to your account, 
                        and for other purposes described in our <a href="/privacy-policy" class="text-primary">privacy policy</a>.</p>
                    <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                        <div class="checkbox">
                            <input type="checkbox" class="custom-checkbox" id="agree" name="agree" required="">
                            <label for="agree" class="font-size-md">I agree to the <a  href="/privacy-policy" class="text-primary font-size-md">privacy policy</a></label>
                        </div>
                    </div>
                    <!-- <a href="#" id="sign-up-submit" class="btn btn-primary">Sign Up</a> -->
                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>

                    <p class="text-center mt-2">Sign in with social account</p>
                    <div class="social-icons social-icon-border-color d-flex justify-content-center">
                        <a href="/login/facebook" class="social-icon social-facebook w-icon-facebook"></a>
                        <!-- <a href="#" class="social-icon social-twitter w-icon-twitter"></a> -->
                        <a href="/login/google" class="social-icon social-google fab fa-google"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>