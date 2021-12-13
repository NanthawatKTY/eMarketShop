 <!-- BEGIN: Content-->
 <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">การตั้งค่า</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url($lang.'/'); ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">การตั้งค่า
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section id="admin_commission_setting">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ตั้งค่า Commission</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                            <!-- <li><a data-action="close"><i class="feather icon-x"></i></a></li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div id="app-invoice-wrapper" class="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="projectinput1"><?php echo lang('product_add_category').' '.lang('menu_product'); ?></label>
                                                            <select multiple class="form-control" style="height:150px;" id="cateProduct1">
                                                            </select>     
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="projectinput1"></label>
                                                            <select multiple class="form-control" style="height:150px;margin-top:5px;" id="cateProduct2">
                                                            </select>   
                                                        </div>
                                                        <div class="col-md-4">
                                                        <label for="projectinput1"></label>
                                                            <select multiple class="form-control" style="height:150px;margin-top:5px;" id="cateProduct3">
                                                            
                                                            </select>  
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="categoryProduct" Id="categoryProduct"><?php echo lang('product_add_category'); ?> : <span id="categoryName"></span></label>
                                                                <input type="text" id="cateProductCode" name="cateProductCode">
                                                                <insput type="text" id="cateProductCode2" name="cateProductCode2">
                                                                <input type="text" id="cateProductCode3" name="cateProductCode3">
                                                                <input type="text" id="cateProductName" name="cateProductName">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-md-4 col-sm-6">
                                                            <input type="file" name="image1" id="inputAddImage1" class="input-image checkFileSize" accept="image/x-png,image/gif,image/jpeg">
                                                            <input type="hidden" name="inputAddImage1-1" id="inputAddImage1-1" class="input-image" accept="image/x-png,image/gif,image/jpeg">
                                                            <div id="image-holder1">
                                                                <img src="" id="image1" class ="thumb-image">
                                                                <i id="delImage1" data-imageId='Image1' onclick="delImage(this)" class="feather icon-trash-2"  style="font-size:18px; position: absolute;background: red;padding: 3px;color: white;"></i>
                                                            </div>
                                                            <div class="image-add" id="addImage1"><span class="feather icon-image vertical-center"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="view_productPrice">ค่า Commission</label>
                                                        <div class="position-relative has-icon-right">
                                                            <input type="hidden" id="admin_commission_main_cate_code" class="form-control" placeholder="Commission" name="admin_commission_cate_code">
                                                            <input type="hidden" id="admin_commission_mid_cate_code" class="form-control" placeholder="Commission" name="admin_commission_cate_code">
                                                            <input type="hidden" id="admin_commission_cate_code" class="form-control" placeholder="Commission" name="admin_commission_cate_code">
                                                            <input type="number" id="admin_commission_percent" class="form-control" placeholder="Commission" name="admin_commission_percent">
                                                            <div class="form-control-position">
                                                                <span>%</span>
                                                            </div>    
                                                        </div>
                                                    </div>
                                                    <div class="form-actions center">
                                                        <button type="submit" id="admin_update_commission" onclick="update_commission()" class="btn btn-primary">
                                                            <i class="fa fa-check-square-o"></i> Save
                                                        </button>
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
            <section id="admin_unit_setting">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ตั้งค่าหน่วย</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                            <!-- <li><a data-action="close"><i class="feather icon-x"></i></a></li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div id="app-invoice-wrapper" class="">
                                            <div class="row">
                                                <!-- <div class="col-md-12">
                                                    <button class="btn btn-primary round btn-min-width mr-1 mb-1 "><i class="feather icon-plus-circle"></i> เพิ่ม</button>
                                                </div> -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <table class="table table-striped table-bordered responsive dataex-res-scrolling">
                                                        <thead>
                                                            <tr>
                                                                <th width="20">No.</th>
                                                                <th >Name</th>
                                                                <th width="30">Symbol</th>
                                                                <th width="30">Multiply</th>
                                                                <th width="20"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="table_admin_unit_list">
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">

                                                    <!-- <div class="row" id="row_del" style="display:none;"><a href="#" class="del_unit" onclick="del_unit()"><i class="fa fa-trash-o"></i></a></div> -->
                                                    <form id="unit_form">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="hidden" id="isUpdate" value="0" class="form-control"  data-validation-required-message="This field is required" placeholder="ไอดี" name="isUpdate">
                                                                <input type="hidden" id="unit_list_id" class="form-control"  data-validation-required-message="This field is required" placeholder="ไอดี" name="unit_list_id">
                                                                <div class="form-group">
                                                                    <label for="unit_name_th">ชื่อภาษาไทย</label> <!--required-->
                                                                    <input type="text" id="unit_name_th" class="form-control"  data-validation-required-message="This field is required" placeholder="ชื่อภาษาไทย" name="unit_name_th">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="unit_name_en">ชื่อภาษาอังกฤษ</label> <!--required-->
                                                                    <input type="text" id="unit_name_en" class="form-control"  data-validation-required-message="This field is required" placeholder="ชื่อภาษาอังกฤษ" name="unit_name_en">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="unit_symbol">สัญลักษณ์</label> <!--required-->
                                                                    <input type="text" id="unit_symbol" class="form-control"  data-validation-required-message="This field is required" placeholder="สัญลักษณ์" name="unit_symbol">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="unit_multiply">ตัวคูณ</label> <!--required-->
                                                                    <input type="number" id="unit_multiply" class="form-control"  data-validation-required-message="This field is required" placeholder="ตัวคูณ" name="unit_multiply">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-actions center">
                                                            <button type="reset" onclick="updateIsUpdate();" class="btn btn-warning mr-1">
                                                                <i class="feather icon-plus"></i> เพิ่มใหม่
                                                            </button>
                                                            <button type="submit" id="add_product_submit" class="btn btn-primary">
                                                                <i class="fa fa-check-square-o"></i> Save
                                                            </button>
                                                        </div> 

                                                    </form>
 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
    <!-- END: Content-->
    <?php $this->load->view('helper/admin/firebase_admin_setting'); ?>