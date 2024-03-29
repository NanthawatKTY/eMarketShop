<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0" id="login_bg_color">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <div class="p-1"><img src="<?php echo base_url("app-assets/img/logo-png.png"); ?>" width="50" alt="branding logo"></div>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Easily Using</span></h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pt-0 text-center">
                                        <a href="#" class="btn btn-social mb-1 mr-1 btn-outline-facebook" onclick="loginWithFacebook()"><span class="fa fa-facebook"></span> <span class="px-1">facebook</span> </a>
                                        <a href="#" class="btn btn-social mb-1 mr-1 btn-outline-google" onclick="loginWithGoogle()"><span class="fa fa-google-plus font-medium-4"></span> <span class="px-1">google</span> </a>
                                    </div>
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2"><span>OR Using
                                            Account Details</span></p>
                                    <div class="card-body pt-0">
                                        <!-- <form class="form-horizontal" action="<?php echo base_url($lang."/Home"); ?>"> -->
                                            <fieldset class="form-group floating-label-form-group">
                                                <label for="user-name">Your Username</label>
                                                <input type="text" class="form-control" id="user-name" placeholder="Your Username">
                                            </fieldset>
                                            <fieldset class="form-group floating-label-form-group mb-1">
                                                <label for="user-password">Enter Password</label>
                                                <input type="password" class="form-control" id="user-password" placeholder="Enter Password">
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-12 text-center text-sm-left">
                                                    <fieldset>
                                                        <input type="checkbox" id="remember-me" class="chk-remember">
                                                        <label for="remember-me"> Remember Me</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="#" class="card-link">Forgot Password?</a></div>
                                            </div>
                                            <button type="submit" class="btn btn-outline-primary btn-block" onclick="login()"><i class="feather icon-unlock"></i> Login</button>
                                        <!-- </form> -->
                                    </div>
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>เพิ่งเคยเข้ามาใน EmarketShops ใช่หรือไม่?</span></p>
                                    <div class="card-body">
                                        <a href="<?php echo base_url($lang."/register"); ?>" class="btn btn-outline-danger btn-block"><i class="feather icon-user"></i> Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->