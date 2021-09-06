<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Register</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="register-form form-item ">
                            <form class="form-stl" action="#" name="frm-login" method="get" wire:submit.prevent="store">
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Create an account</h3>
                                    <h4 class="form-subtitle">Personal infomation</h4>
                                </fieldset>									
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">Name*</label>
                                    <input type="text" id="frm-reg-lname" wire:model.lazy="name" name="reg-lname" placeholder="Last name*">
                                </fieldset>
                                @error('name')
                                <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                                @enderror
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-email">Email Address*</label>
                                    <input type="email" id="frm-reg-email" wire:model.lazy="email" name="reg-email" placeholder="Email address">
                                </fieldset>
                                @error('email')
                                <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                                @enderror
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Login Information</h3>
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half left-item ">
                                    <label for="frm-reg-pass">Password *</label>
                                    <input type="password" id="frm-reg-pass" wire:model.lazy="password" name="reg-pass" placeholder="Password">
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half ">
                                    <label for="frm-reg-cfpass">Confirm Password *</label>
                                    <input type="password" id="frm-reg-cfpass" wire:model.lazy="confirm_password" name="confirm_password" placeholder="Confirm Password">
                                </fieldset>
                                @error('confirm_password')
                                <p class="text-danger" style="display:block;margin-top: 10px;">{{$message}}</p>
                                @enderror
                                <div>
                                    <input type="submit" class="btn btn-sign" value="Register" name="register">
                                </div>
                                
                            </form>
                        </div>											
                    </div>
                </div><!--end main products area-->		
            </div>
        </div><!--end row-->

    </div><!--end container-->

</main>