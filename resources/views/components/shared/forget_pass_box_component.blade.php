
<div class="login-popup">

<div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
        <ul class="nav nav-tabs text-uppercase" role="tablist">
            <li class="nav-item">
                <a href="#sign-in" class="nav-link">Forget Password</a>
            </li>
           
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="sign-in">
                <form action="/forget-password-submit" method="POST" id="forget-pass-form">
                    @csrf
                    <div class="form-group">
                        <label>Email address *</label>
                        <input type="text" class="form-control laxEmail" name="email" id="email" required>
                    </div>
                    
                    <!-- <a href="#" class="btn btn-primary">Sign In</a> -->
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
            
        </div>
    </div>
</div>



</div>