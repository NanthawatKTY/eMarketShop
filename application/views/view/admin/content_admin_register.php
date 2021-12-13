 <!-- BEGIN: Content-->
 <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">จัดการแอดมิน</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url($lang.'/'); ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">จัดการแอดมิน
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section id="product_list">
                    
            <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-6 col-md-8 col-10 box-shadow-2 p-0">
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
                                                    <i class="feather icon-mail"></i>
                                                </div>
                                            </fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="form-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" id="user-password" placeholder="Enter Password" required>
                                                        <div class="form-control-position">
                                                            <i class="fa fa-key"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" id="user-confirm-password" placeholder="Confirm Password" required>
                                                        <div class="form-control-position">
                                                            <i class="fa fa-key"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" id="user-name" placeholder="ชื่อ - สกุล" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control" id="user-phone" placeholder="เบอร์โทรศัพท์" required>
                                                <div class="form-control-position">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                            </fieldset>
                                        <button type="submit" onclick="signUpAsAdmin()" class="btn btn-outline-primary btn-block"><i class="feather icon-user"></i> Register</button>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
    <!-- END: Content-->
    <?php $this->load->view('helper/admin/firebase_admin_user_regis'); ?>
    <?php 
		// echo js_asset('vendors/js/extensions/toastr.min.js');
		// echo js_asset('js/scripts/extensions/toastr.js');
	?>