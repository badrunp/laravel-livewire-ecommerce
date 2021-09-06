<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>login</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">						
                        <div class="login-form form-item form-stl">
                            @if(session()->has('error-login'))
                            <div class="alert alert-danger">
                                {{ session()->get('error-login') }}
                            </div>
                            @endif
                            <form name="frm-login" wire:submit.prevent="store">
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Log in to your account</h3>										
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-uname">Email Address:</label>
                                    <input type="text" id="frm-login-uname" wire:model.lazy="email" name="email" placeholder="Type your email address">
                                </fieldset>
                                @error('email')
                                <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                                @enderror
                                <fieldset class="wrap-input">
                                    <label for="frm-login-pass">Password:</label>
                                    <input type="password" id="frm-login-pass" wire:model.lazy="password" name="pass" placeholder="************">
                                </fieldset>
                                @error('password')
                                <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                                @enderror
                                <fieldset class="wrap-input">
                                    <label class="remember-field">
                                        <input class="frm-input " name="rememberme" wire:model="remember" id="remember"  type="checkbox"><span>Remember me</span>
                                    </label>
                                    <a class="link-function left-position" href="#" title="Forgotten password?">Forgotten password?</a>
                                </fieldset>
                                <input type="submit" class="btn btn-submit" value="Login" name="submit">
                            </form>
                        </div>												
                    </div>
                </div><!--end main products area-->		
            </div>
        </div><!--end row-->

    </div><!--end container-->

</main>