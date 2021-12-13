<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">รายละเอียดสินค้า<?php //echo lang('product_add_new'); ?></h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url($lang.'/'); ?>"><?php echo lang('menu_home'); ?></a>
                                </li>
                                <li class="breadcrumb-item"><?php echo lang('menu_product'); ?>
                                </li>
                                <li class="breadcrumb-item active">รายละเอียดสินค้า<?php //echo lang('product_add_new'); ?>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <form class="form" id="form_view_Product">
                    <section id="basic-form-layouts">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"><?php echo lang('product_basic_info'); ?></h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                            <!-- <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li> -->
                                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                            <!-- <li><a data-action="close"><i class="feather icon-x"></i></a></li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show"> 
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"><?php echo lang('product_name'); ?></label> <!--required-->
                                                        <input type="text" id="view_productname" class="form-control"  data-validation-required-message="This field is required" placeholder="<?php echo lang('product_name'); ?>" name="view_productname">
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"><?php echo lang('product_code'); ?></label> <!--required-->
                                                        <input type="text" id="view_productCode" class="form-control"  data-validation-required-message="This field is required" placeholder="<?php echo lang('product_code'); ?>" name="view_productCode">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput2"><?php echo lang('product_detail'); ?></label>
                                                        <textarea id="view_product_dec" rows="5" class="form-control" name="view_product_dec" placeholder="<?php echo lang('product_detail'); ?>"></textarea>
                                                    </div>
                                                </div> 
                                            </div>
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
                                                        <input type="text" id="cateProductCode2" name="cateProductCode2">
                                                        <input type="text" id="cateProductCode3" name="cateProductCode3">
                                                        <input type="text" id="cateProductName" name="cateProductName">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput5"><?php echo lang('product_brand'); ?></label>
                                                        <input type="text" id="view_productBrand" class="form-control" placeholder="<?php echo lang('product_brand'); ?>" name="view_productBrand">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label for="product_view_type"><?php echo lang('product_add_type'); ?></label>
                                                        <select class="form-control" id="product_view_type" name="product_view_type">
                                                            <option>Select Option</option>
                                                            <option><?php echo lang('product_add_import'); ?></option>
                                                            <option><?php echo lang('product_add_export'); ?></option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label for="product_view_Shelflife"><?php echo lang('product_add_Shelflife'); ?></label>
                                                        <select class="form-control" id="product_view_Shelflife" name="product_view_Shelflife">
                                                            <option>Select Option</option>
                                                            <option><?php echo lang('Less_than_1_month'); ?></option>
                                                            <option>1 <?php echo lang('month'); ?></option>
                                                            <option>2 <?php echo lang('months'); ?></option>
                                                            <option>3 <?php echo lang('months'); ?></option>
                                                            <option>4 <?php echo lang('months'); ?></option>
                                                            <option>5 <?php echo lang('months'); ?></option>
                                                            <option>6 <?php echo lang('months'); ?></option>
                                                            <option>7 <?php echo lang('months'); ?></option>
                                                            <option>8 <?php echo lang('months'); ?></option>
                                                            <option>9 <?php echo lang('months'); ?></option>
                                                            <option>10 <?php echo lang('months'); ?></option>
                                                            <option>11 <?php echo lang('months'); ?></option>
                                                            <option>12 <?php echo lang('months'); ?></option>
                                                            <option><?php echo lang('12_months_or_more'); ?></option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="product_view_fda"><?php echo lang('product_add_fda'); ?>&nbsp;<a href="#"  data-toggle="modal" data-target="#modal_FDA"><i class="feather icon-alert-circle warning"></i></a></label>
                                                        <input type="text" id="product_view_fda" class="form-control"  placeholder="<?php echo lang('product_add_fda'); ?>" name="product_view_fda">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>         
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 match-height">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-colored-form-control"><?php echo lang('sales_infomation'); ?></h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <!-- <div class="card-text">
                                            <p>You can always change the border color of the form controls using <code>border-*</code> class. In this example we have user <code>border-primary</code> class for form controls. Form action buttons are on the bottom right position.</p>
                                        </div> -->
                                        <input type="hidden" name="rating" id="rating">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="view_productPrice"><?php echo lang('price'); ?></label>
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="text" id="view_productPrice" class="form-control" placeholder="<?php echo lang('price'); ?>" name="view_productPrice">
                                                                    <div class="form-control-position">
                                                                        <span>฿</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="view_product_unit">หน่วย</label>
                                                                <select id="view_product_unit" class="form-control unit_product_list" placeholder="หน่วย" name="view_product_unit">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="view_product_special_Price"><?php echo lang('special_price'); ?></label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="number" id="view_product_special_Price" class="form-control" placeholder="<?php echo lang('special_price'); ?>" name="view_product_special_Price">
                                                            <div class="form-control-position">
                                                                <span>฿</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="view_product_minPurchase"><?php echo lang('minPurchase'); ?></label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="number" id="view_product_minPurchase" class="form-control" placeholder="<?php echo lang('minPurchase'); ?>" name="view_product_minPurchase">
                                                            <div class="form-control-position">
                                                                <span>฿</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="view_productInventory"><?php echo lang('stock'); ?></label>
                                                        <input type="number" id="view_productInventory" class="form-control" placeholder="<?php echo lang('stock'); ?>" name="view_productInventory">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <p id="price_fee_percent" style="display:none;"></p>
                                                    <i>Commission <span id="price_fee">0</span>%</i><br>
                                                    <i>จำนวนเงินที่จะได้รับ <span id="price_real">0</span>บาท</i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="add_productPrice"><?php echo lang('variation'); ?></label>
                                                    <input type="checkbox" id="isVariation" class=" isVariation isVariation2" data-size="sm"/>
                                                    <div class="form-group displayNone" id="product_selection">
                                                        <div class="form-group">
                                                            <label for="view_productSelectionName"><?php echo lang('name'); ?></label>
                                                            <input type="text" id="view_productSelectionName" class="form-control" placeholder="<?php echo lang('name'); ?>" name="view_productSelectionName">
                                                        </div>
                                                        <div class="repeater-default" >
                                                            <div data-repeater-list="selection">
                                                                <div data-repeater-item>
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <div class="form-group">  
                                                                                <input type="text" class="form-control add_productOption view_productOption" placeholder="<?php echo lang('options'); ?>" name="view_productOption">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <button type="button" class="btn btn-danger" data-repeater-delete onclick="delTableSelection(this)" name=""> <i class="feather icon-x"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>                                                                                                                        
                                                                </div>
                                                            </div>
                                                            <div class="form-group overflow-hidden">
                                                                <div class="col-12">
                                                                    <a href="#" data-repeater-create onclick="addTableSelection()"> <?php echo lang('addOptions'); ?></a>                                                                 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12" style="background-color:white;padding:5px;">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered table-striped" id="table_seletion">
                                                                    <thead>
                                                                        <tr>
                                                                            <th id="table_select_name"><?php echo lang('options'); ?></th>
                                                                            <th><?php echo lang('price'); ?></th>
                                                                            <th><?php echo lang('stock'); ?></th>
                                                                            <th>SKU</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr id="add_productOption0">
                                                                            <td class="options"><?php echo lang('options'); ?></td>
                                                                            <td class="price"><input class="form-control" placeholder="<?php echo lang('price'); ?>"  name="selectionPrice0"></input></td>
                                                                            <td class="stock"><input class="form-control" placeholder="<?php echo lang('stock'); ?>" name="selectionPriceInventory0"></input></td>
                                                                            <td class="sku"><input class="form-control" placeholder="SKU" name="selectionPriceSKU0"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>             
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="row_add_product">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-tooltip"><?php echo lang('media_management'); ?></h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>  
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label><?php echo lang('cover_photo'); ?> <i><?php echo lang('size'); ?> 918 x 420 pixels</i></label>
                                                <input type="file" name="imageBanner" id="inputAddImage0" class="input-image checkFileSize" accept="image/x-png,image/gif,image/jpeg">
                                                <input type="hidden" name="inputAddImage0-1" id="inputAddImage0-1" class="input-image" accept="image/x-png,image/gif,image/jpeg">
                                                <div id="image-holder-banner">
                                                    <img src="" class ="thumb-image" id="imageCover" width = "437" height="200">
                                                    <i id="delImage0" data-imageId='Image0' onclick="delImage(this)"  class="feather icon-trash-2" style="font-size:18px; position: absolute;background: red;padding: 3px;color: white;"></i>
                                                </div>
                                                <div class="image-add" id="addImage0"><span class="feather icon-image vertical-center-banner"></span></div>
                                            </div>
                                            <div class="form-group">
                                                <label><?php echo lang('product_image'); ?> <i><?php echo lang('size'); ?> 800 x 800  pixels</i></label>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6">
                                                        <input type="file" name="image1" id="inputAddImage1" class="input-image checkFileSize" accept="image/x-png,image/gif,image/jpeg">
                                                        <input type="hidden" name="inputAddImage1-1" id="inputAddImage1-1" class="input-image" accept="image/x-png,image/gif,image/jpeg">
                                                        <div id="image-holder1">
                                                            <img src="" id="image1" class ="thumb-image" width = "140" height="140">
                                                            <i id="delImage1" data-imageId='Image1' onclick="delImage(this)" class="feather icon-trash-2"  style="font-size:18px; position: absolute;background: red;padding: 3px;color: white;"></i>
                                                        </div>
                                                        <div class="image-add" id="addImage1"><span class="feather icon-image vertical-center"></span></div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <input type="file" name="image2" id="inputAddImage2" class="input-image checkFileSize" accept="image/x-png,image/gif,image/jpeg">
                                                        <input type="hidden" name="inputAddImage2-1" id="inputAddImage2-1" class="input-image" accept="image/x-png,image/gif,image/jpeg">
                                                        <div id="image-holder2">
                                                            <img src="" id="image2" class ="thumb-image" width = "140" height="140">
                                                            <i id="delImage2" data-imageId='Image2' onclick="delImage(this)" class="feather icon-trash-2" style="font-size:18px; position: absolute;background: red;padding: 3px;color: white;"></i>
                                                        </div>
                                                        <div class="image-add" id="addImage2"><span class="feather icon-image vertical-center"></span></div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <input type="file" name="image3" id="inputAddImage3" class="input-image checkFileSize" accept="image/x-png,image/gif,image/jpeg">
                                                        <input type="hidden" name="inputAddImage3-1" id="inputAddImage3-1" class="input-image" accept="image/x-png,image/gif,image/jpeg">
                                                        <div id="image-holder3">
                                                            <img src="" id="image3" class ="thumb-image" width = "140" height="140">
                                                            <i id="delImage3" data-imageId='Image3' onclick="delImage(this)" class="feather icon-trash-2" style="font-size:18px; position: absolute;background: red;padding: 3px;color: white;"></i>
                                                        </div>
                                                        <div class="image-add" id="addImage3"><span class="feather icon-image vertical-center"></span></div>
                                                    </div>
                                                    <!-- <div class="col-md-4 col-sm-6">
                                                        <input type="file" name="image[]" id="inputAddImage4" class="input-image" accept="image/x-png,image/gif,image/jpeg">
                                                        <div id="image-holder4">
                                                            <img src="" class ="thumb-image" width = "163" height="140">
                                                            <i id="delImage4" class="feather icon-trash-2" style="font-size:18px; position: absolute;background: red;padding: 3px;color: white;"></i>
                                                        </div>
                                                        <div class="image-add" id="addImage4"><span class="feather icon-image vertical-center"></span></div>
                                                    </div> -->
                                                </div>    
                                                <div class="row" style="margin-top:12px;">
                                                    <div class="col-md-4 col-sm-6">
                                                        <input type="file" name="image4" id="inputAddImage4" class="input-image checkFileSize" accept="image/x-png,image/gif,image/jpeg">
                                                        <input type="hidden" name="inputAddImage4-1" id="inputAddImage4-1" class="input-image" accept="image/x-png,image/gif,image/jpeg">
                                                        <div id="image-holder4">
                                                            <img src="" id="image4" class ="thumb-image" width = "140" height="140">
                                                            <i id="delImage4" data-imageId='Image4' onclick="delImage(this)" class="feather icon-trash-2" style="font-size:18px; position: absolute;background: red;padding: 3px;color: white;"></i>
                                                        </div>
                                                        <div class="image-add" id="addImage4"><span class="feather icon-image vertical-center"></span></div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <input type="file" name="image5" id="inputAddImage5" class="input-image checkFileSize" accept="image/x-png,image/gif,image/jpeg">
                                                        <input type="hidden" name="inputAddImage5-1" id="inputAddImage5-1" class="input-image" accept="image/x-png,image/gif,image/jpeg">
                                                        <div id="image-holder5">
                                                            <img src="" id="image5" class ="thumb-image" width = "140" height="140">
                                                            <i id="delImage5" data-imageId='Image5' onclick="delImage(this)" class="feather icon-trash-2" style="font-size:18px; position: absolute;background: red;padding: 3px;color: white;"></i>
                                                        </div>
                                                        <div class="image-add" id="addImage5"><span class="feather icon-image vertical-center"></span></div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <input type="file" name="image6" id="inputAddImage6" class="input-image checkFileSize" accept="image/x-png,image/gif,image/jpeg">
                                                        <input type="hidden" name="inputAddImage6-1" id="inputAddImage6-1" class="input-image" accept="image/x-png,image/gif,image/jpeg">
                                                        <div id="image-holder6">
                                                            <img src="" id="image6" class="thumb-image" width = "140" height="140">
                                                            <i id="delImage6" data-imageId='Image6' onclick="delImage(this)" class="feather icon-trash-2" style="font-size:18px; position: absolute;background: red;padding: 3px;color: white;"></i>
                                                        </div>
                                                        <div class="image-add" id="addImage6"><span class="feather icon-image vertical-center"></span></div>
                                                    </div>
                                                    <!-- <div class="col-md-4 col-sm-6">
                                                        <input type="file" name="image[]" id="inputAddImage8" class="input-image" accept="image/x-png,image/gif,image/jpeg">
                                                        <div id="image-holder8">
                                                            <img src="" class ="thumb-image" width = "163" height="140">
                                                            <i id="delImage8" class="feather icon-trash-2" style="font-size:18px; position: absolute;background: red;padding: 3px;color: white;"></i>
                                                        </div>
                                                        <div class="image-add" id="addImage8"><span class="feather icon-image vertical-center"></span></div>
                                                    </div> -->
                                                </div>                                                   
                                            </div>


                                        </div>

                                    

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-icons"><?php echo lang('shipping'); ?></h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                            <!-- <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li> -->
                                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                            <!-- <li><a data-action="close"><i class="feather icon-x"></i></a></li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <!-- <div class="card-text">
                                            <p>This form shows the use of icons with form controls. Define the position of the icon using <code>has-icon-left</code> or <code>has-icon-right</code> class. Use <code>icon-*</code> class to define the icon for the form control. See Icons sections for the list of icons you can use. </p>
                                        </div> -->

                                            <div class="form-body">

                                                <div class="form-group">
                                                    <label for="shipping_weight"><?php echo lang('weight'); ?></label>
                                                    <div class="position-relative has-icon-right">
                                                        <input type="text" id="shipping_weight" class="form-control" placeholder="<?php echo lang('weight'); ?>" name="shipping_weight">
                                                        <div class="form-control-position">
                                                            kg
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="timesheetinput2"><?php echo lang('parcel_Size'); ?></label>
                                                    <div class="row">                                                       
                                                        <div class="col-md-4">
                                                            <div class="position-relative has-icon-right">
                                                                <input type="text" id="shipping_weight" class="form-control" placeholder="<?php echo lang('w'); ?>" name="shipping_w">
                                                                <div class="form-control-position">
                                                                    cm
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative has-icon-right">
                                                                <input type="text" id="shipping_weight" class="form-control" placeholder="<?php echo lang('l'); ?>" name="shipping_l">
                                                                <div class="form-control-position">
                                                                    cm
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative has-icon-right">
                                                                <input type="text" id="shipping_weight" class="form-control" placeholder="<?php echo lang('h'); ?>" name="shipping_h">
                                                                <div class="form-control-position">
                                                                    cm
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                              
                                                </div>

                                                <div class="form-group">
                                                    <label for="timesheetinput3"><?php echo lang('shipping_Fee'); ?></label>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped" id="table_shipping">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th><?php echo lang('shipping'); ?></th>
                                                                    <th><?php echo lang('price'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!-- <tr>
                                                                    <th><input type="checkbox" name="kerry_" id="kerry_"></th>
                                                                    <td id="kerry_name">scg express (max 30kg)</td>
                                                                    <td><input type="text" id="kerry_price" class="form-control" placeholder="<?php echo lang('set_shipping_fee'); ?>" name="kerry_price"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th><input type="checkbox" name="thaiPost_" id="thaiPost_"></th>
                                                                    <td id="thaiPost_name">Thailand Post - EMS (min 0.02kg, max 20kg)</td>
                                                                    <td><input type="text" id="thaiPost_price" class="form-control" placeholder="<?php echo lang('set_shipping_fee'); ?>" name="thaiPost_price"></td>
                                                                </tr> -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- </div> -->

                                                
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions center">
                        <button type="reset" class="btn btn-warning mr-1">
                            <i class="feather icon-x"></i> Cancel
                        </button>
                        <button type="submit" id="view_product_submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> Update
                        </button>
                    </div> 
                </section>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="modal_FDA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="">info</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="<?php echo base_url('app-assets/img/fda.jpg'); ?>" width="350">
                    <br/>
                    <p style="padding-top:20px;">เลขสารบบอาหารหรือเลข 13 หลักในกรอบเครื่องหมาย อย. บนฉลากผลิตภัณฑ์อาหารนั้น ความจริงแล้วเป็นรหัสของข้อมูลเกี่ยวกับสถานที่ผลิตและผลิตภัณฑ์ ที่กำหนดขึ้นเพื่อให้ง่ายในการตรวจสอบย้อนกลับกรณีที่เกิดปัญหา เครื่องหมาย อย. จึงไม่ใช่สัญลักษณ์ที่ใช้รับประกันคุณภาพของผลิตภัณฑ์ตามโฆษณา แต่ผลิตภัณฑ์ที่มีเครื่องหมาย อย. นั้นหมายความว่าได้มีการขึ้นทะเบียนหรือรับอนุญาตเลขสารบบอาหารถูกต้องตามที่กฎหมายกำหนด</p>
                    <hr>
                    <p>เรียนรู้ข้อมูลเพิ่มเติม : <a href="https://oryor.com/%E0%B8%AD%E0%B8%A2/detail/media_printing/1685" target="_blank">https://oryor.com</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('helper/product/firebase_product_add_edit'); ?>