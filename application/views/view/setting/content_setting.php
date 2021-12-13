<!-- BEGIN: Content-->
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">รายละเอียดร้านค้า</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url($lang.'/'); ?>"><?php echo lang('menu_home'); ?></a>
                                </li>
                                <li class="breadcrumb-item active">รายละเอียดร้านค้า
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12 mb-md-0 mb-2">
                    <!-- <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-primary dropdown-toggle dropdown-menu-right" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings icon-left"></i> Settings</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Bootstrap Cards</a><a class="dropdown-item" href="component-buttons-extended.html">Buttons Extended</a></div>
                        </div><a class="btn btn-outline-primary" href="full-calender-basic.html"><i class="feather icon-mail"></i></a><a class="btn btn-outline-primary" href="timeline-center.html"><i class="feather icon-pie-chart"></i></a>
                    </div> --> 
                </div>
            </div>
            <div class="content-body">
                <form id="form_shop_setting">
                    <div class="row">
                        <div class="col-12">
                            <div class="card profile-with-cover">
                                <div class="card-img-top img-fluid bg-cover height-300" id="back-image-cover"></div>
                                <div class="w-100 text-center change_cover">
                                    <input type="file" name="coverImage" id="coverImage" style="display:none;" accept="image/x-png,image/gif,image/jpeg">
                                    <input type="hidden" name="coverImage_base64" id="coverImage_base64">
                                    <p class="w-100 btn btn-outline-light" id="btn-change-cover" style="padding:4px;"><?php echo lang('changeCover'); ?></p>    
                                </div>
                                <div class="media profil-cover-details w-100">
                                    <div class="media-left pl-2 pt-2">
                                        <a href="#" class="profile-image" id="change-logo-shop" >
                                            <input type="file" name="logo_shop" id="logo_shop" style="display:none;" accept="image/x-png,image/gif,image/jpeg">
                                            <input type="hidden" name="logo_base64" id="logo_base64">
                                            <img src="<?php echo base_url('app-assets/img/logo-big.png'); ?>" id="logo-shop-img" class="rounded-circle img-border height-100" style="width:100px;" alt="Card image">
                                        </a>
                                    </div>
                                    <div class="media-body pt-3 px-2">
                                        <div class="row">
                                            <div class="col">
                                                <h1 class="card-title" id="title-shop"></h1>
                                            </div>
                                            <div class="col text-right" style="display:none;">
                                                <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Follow</button>
                                                <div class="btn-group d-none d-md-block float-right ml-2" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-success"><i class="fa fa-dashcube"></i>
                                                        Message</button>
                                                    <button type="button" class="btn btn-success"><i class="fa fa-cog"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <nav class="navbar navbar-light navbar-profile align-self-end">
                                    <button class="navbar-toggler d-sm-none" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation"></button>
                                    <nav class="navbar navbar-expand-lg">
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
                                    </nav>
                                </nav>
                            </div>
                        </div>
                    </div>
                <!-- Basic Elements start -->
                    <section class="basic-elements">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><?php echo lang('basic_info'); ?></h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                                    <div class="col-md-12" style="padding-bottom:20px;">
                                                        <div class="row skin skin-square">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div>
                                                                    <input class="type1" value="type1" type="radio" name="type" id="type1" checked>
                                                                    <label class="type1"  for="type1"><?php echo lang('juristic_person'); ?></label>
                                                                </div>     
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div>
                                                                    <input class="type2"  value="type2"  type="radio" name="type" id="type2">
                                                                    <label class="type2" for="type2"><?php echo lang('ordinary_person'); ?></label>
                                                                </div>   
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group">
                                                            <label for="shopName"><?php echo lang('shop_name'); ?></label>
                                                            <input type="text" class="form-control" id="shopName" name="shopName">
                                                        </fieldset>
                
                                                        <fieldset class="form-group">
                                                            <label for="shop_dec"><?php echo lang('shop_dec'); ?></label>
                                                            <textarea class="form-control" id="shop_dec" rows="3" name="shop_dec" placeholder="กรอกรายละเอียดร้านค้าของคุณหรือข้อมูลที่คุณต้องการให้ผู้ซื้อรับทราบที่นี่"></textarea>
                                                        </fieldset>
                                                        <div class="form-group">
                                                            <!-- <label> -->    
                                                            <label for="placeTextarea"><?php echo lang('media_management'); ?></label><br>
                                                            <i><?php echo lang('size'); ?> 800 x 800  pixels</i></label>
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6">
                                                                    <input type="file" name="image1" id="inputAddImage1" class="input-image checkFileSize" accept="image/x-png,image/gif,image/jpeg">
                                                                    <input type="hidden" name="inputAddImage1-1" id="inputAddImage1-1" class="input-image" accept="image/x-png,image/gif,image/jpeg">
                                                                    <div id="image-holder1">
                                                                        <img src="" id="image1" class ="thumb-image" width = "140" height="140">
                                                                        <i id="delImage1" data-imageId='Image1' onclick="delImage(this)" class="feather icon-trash-2"  style="font-size:18px; position: absolute;background: red;padding: 3px;color: white;"></i>
                                                                    </div>
                                                                    <div class="image-add" id="addImage1"><span class="feather icon-image vertical-center"></span></div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6">
                                                                    <input type="file" name="image2" id="inputAddImage2" class="input-image checkFileSize" accept="image/x-png,image/gif,image/jpeg">
                                                                    <input type="hidden" name="inputAddImage2-1" id="inputAddImage2-1" class="input-image" accept="image/x-png,image/gif,image/jpeg">
                                                                    <div id="image-holder2">
                                                                        <img src="" id="image2" class ="thumb-image" width = "140" height="140">
                                                                        <i id="delImage2" data-imageId='Image2' onclick="delImage(this)" class="feather icon-trash-2" style="font-size:18px; position: absolute;background: red;padding: 3px;color: white;"></i>
                                                                    </div>
                                                                    <div class="image-add" id="addImage2"><span class="feather icon-image vertical-center"></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin-top:12px;">
                                                                <div class="col-md-6 col-sm-6">
                                                                    <input type="file" name="image3" id="inputAddImage3" class="input-image checkFileSize" accept="image/x-png,image/gif,image/jpeg">
                                                                    <input type="hidden" name="inputAddImage3-1" id="inputAddImage3-1" class="input-image" accept="image/x-png,image/gif,image/jpeg">
                                                                    <div id="image-holder3">
                                                                        <img src="" id="image3" class ="thumb-image" width = "140" height="140">
                                                                        <i id="delImage3" data-imageId='Image3' onclick="delImage(this)" class="feather icon-trash-2" style="font-size:18px; position: absolute;background: red;padding: 3px;color: white;"></i>
                                                                    </div>
                                                                    <div class="image-add" id="addImage3"><span class="feather icon-image vertical-center"></span></div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6">
                                                                    <input type="file" name="image4" id="inputAddImage4" class="input-image checkFileSize" accept="image/x-png,image/gif,image/jpeg">
                                                                    <input type="hidden" name="inputAddImage4-1" id="inputAddImage4-1" class="input-image" accept="image/x-png,image/gif,image/jpeg">
                                                                    <div id="image-holder4">
                                                                        <img src="" id="image4" class ="thumb-image" width = "140" height="140">
                                                                        <i id="delImage4" data-imageId='Image4' onclick="delImage(this)" class="feather icon-trash-2" style="font-size:18px; position: absolute;background: red;padding: 3px;color: white;"></i>
                                                                    </div>
                                                                    <div class="image-add" id="addImage4"><span class="feather icon-image vertical-center"></span></div>
                                                                </div>
                                                            </div>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-12">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group regis_com">
                                                            <label for="companyName"><?php echo lang('company_name'); ?></label>
                                                            <input type="text" class="form-control" id="companyName" name="companyName">
                                                        </fieldset>
                                                        
                                                        <fieldset class="form-group person_regis">
                                                            <label for="nameContact"><?php echo lang('full_name'); ?></label>
                                                            <input type="text" class="form-control" id="nameContact" name="nameContact">
                                                        </fieldset>

                                                        <fieldset class="form-group regis_com">
                                                            <label for="taxID"><?php echo lang('TIN'); ?></label>
                                                            <input type="text" class="form-control" id="taxID" name="taxID">
                                                        </fieldset>

                                                        <fieldset class="form-group">
                                                            <label for="shopAddress"><?php echo lang('address'); ?></label>
                                                            <textarea class="form-control" id="shopAddress" rows="3" placeholder="" name="shopAddress"></textarea>
                                                        </fieldset>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <fieldset class="form-group">
                                                                    <label for="addresSD"><?php echo lang('sub_district'); ?></label>
                                                                    <input type="text" class="form-control" id="addresSD" name="addresSD">
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <fieldset class="form-group">
                                                                    <label for="addreD"><?php echo lang('district'); ?></label>
                                                                    <input type="text" class="form-control" id="addresD" name="addresD">
                                                                </fieldset>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <fieldset class="form-group">
                                                                    <label for="addresP"><?php echo lang('province'); ?></label>
                                                                    <input type="text" class="form-control" id="addresP" name="addresP">
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <fieldset class="form-group">
                                                                    <label for="zipcode"><?php echo lang('zipcode'); ?></label>
                                                                    <input type="text" class="form-control" id="zipcode" name="zipcode">
                                                                </fieldset>
                                                            </div>
                                                        </div>

                                                        <fieldset class="form-group">
                                                            <label for="shopPhone"><i style="color:red;">*</i><?php echo lang('phone'); ?></label>
                                                            <input type="text" class="form-control" id="shopPhone" name="shopPhone">
                                                        </fieldset>

                                                        <fieldset class="form-group">
                                                            <label for="shopEmail"><?php echo lang('email'); ?></label>
                                                            <input type="text" class="form-control" id="shopEmail" name="shopEmail">
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                                    <div class="row regis_com">
                                                        <div class="col-md-6">
                                                            <fieldset class="form-group">
                                                                <label for="regis">หนังสือรับรองการจดทะเบียน</label>
                                                                <input type="file"  class="form-control checkFileSize" id="regis" name="regis">
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <fieldset class="form-group">
                                                                <label for="commercial_regis_0403">ใบทะเบียนพาณิชย์ (แบบ ภพ.0403)</label>
                                                                <input type="file" class="form-control checkFileSize" id="commercial_regis_0403" name="commercial_regis_0403">
                                                            </fieldset> 
                                                        </div>
                                                    </div>
                                                    <div class="row regis_com">
                                                        <div class="col-md-6">
                                                            <fieldset class="form-group">
                                                                <label for="cardID">บัตรประชาชนผู้มีอำนาจลงนาม</label>
                                                                <input type="file" class="form-control checkFileSize" id="cardID" name="cardID">
                                                            </fieldset> 
                                                        </div>  
                                                        <div class="col-md-6">
                                                            <fieldset class="form-group">
                                                                <label for="commercial_regis_20">ใบทะเบียนพาณิชย์ (แบบ ภพ.20)</label>
                                                                <input type="file" class="form-control checkFileSize" id="commercial_regis_20" name="commercial_regis_20">
                                                            </fieldset> 
                                                        </div>
                                                    </div>
                                                    <div class="row regis_com">
                                                        <div class="col-md-12">
                                                            <input type="hidden" id="shop_cardID">
                                                            <input type="hidden" id="shop_commercial_regis_0403">
                                                            <input type="hidden" id="shop_commercial_regis_20">
                                                            <input type="hidden" id="shop_regis">
                                                            <ul id='file_docs'>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="form-actions center">
                        <button type="reset" class="btn btn-warning mr-1">
                            <i class="feather icon-x"></i> Cancel
                        </button>
                        <button type="submit" id="shop_setting_submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> Save
                        </button>
                    </div> 
                </div>
            </div>
        </form>
    </div>
    <!-- <div class="container">
	<div class="row">
		<div class="col-xs-12">
			<label class="cabinet center-block">
				<figure>
					<img src="" class="gambar img-responsive img-thumbnail" id="item-img-output" />
				  <figcaption><i class="fa fa-camera"></i></figcaption>
		    </figure>
				<input type="file" class="item-img file center-block" name="file_photo"/>
			</label>
		</div>
	</div>
</div> -->

<div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 100%; max-width:none !important;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div id="upload-demo" class="center-block"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>
			</div>
		</div>
	</div>
</div>
    <!-- END: Content-->
    <?php echo js_asset('croppie.js'); ?>
    <?php $this->load->view('helper/setting/firebase_setting'); ?>