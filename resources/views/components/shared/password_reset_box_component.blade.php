<div class="login-popup">
    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
            <ul class="nav nav-tabs text-uppercase" role="tablist">
                <li class="nav-item">
                    <a href="#sign-in" class="nav-link">Password Reset</a>
                </li>
            
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="sign-in">
                    <form action="/password-reset-submit" method="POST" id="password-reset-form">
                        @csrf
                        <div class="form-group">
                            <label>New Password *</label>
                            <input type="password" class="form-control" name="password" id="new-password" required>
                        </div>

                        <div class="form-group">
                            <label>Re-New Password *</label>
                            <input type="password" class="form-control" name="password_confirmation" id="re-new-password" required>
                            <input type="hidden" id="reset-token" name="token" value="{{$token}}">
                            
                        </div>
                        <div class="form-group">
                        <input type="checkbox" class="custom-control-input" id="show-pass-checkbox" value="" name="show-pass-checkbox">
                            <label class="custom-control-label" for="show-pass-checkbox" style="display: inline;">show password</label>
                        </div>
                        <!-- <a href="#" class="btn btn-primary">Sign In</a> -->
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>