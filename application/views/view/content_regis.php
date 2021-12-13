    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0 pb-0">
                                    <div class="card-title text-center">
                                        <div class="p-1"><img src="<?php echo base_url("app-assets/img/logo-png.png"); ?>" width="50" alt="branding logo"></div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>Register</span></p>
                                    <div class="card-body">
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="email" class="form-control" id="user-email" placeholder="Your Email Address" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-email"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control" id="user-password" placeholder="Enter Password" required>
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control" id="user-confirm-password" placeholder="Confirm Password" required>
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                            </fieldset>
                                            <button type="submit" onclick="signUpWiteEmailPassword()" class="btn btn-outline-primary btn-block"><i class="feather icon-user"></i> Register</button>
                                        <br>
                                        <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>หากมีบัญชีผู้ใช้แล้ว</span></p>
                                        <a href="<?php echo base_url($lang."/login"); ?>" class="btn btn-outline-danger btn-block mt-2"><i class="feather icon-unlock"></i> Login</a>                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>