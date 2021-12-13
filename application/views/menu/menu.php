<!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true" style="padding-top:10px;" id="main-menu">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <!-- <li class=" navigation-header"><span>General</span><i class=" feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i></li> -->
                <li class=" nav-item <?php if($this->uri->segment(2) == ''){echo 'active';}?>" id="menu_home"><a href="<?php echo base_url($lang.'/'); ?>"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard"><?php echo lang('menu_home'); ?></span></a></li>
                <li class=" nav-item" id="menu_account"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Dashboard"><?php echo lang('menu_account'); ?></span></a>
                    <ul class="menu-content">
                        <li class=""></li>
                        <li id="menu_manage_account"  class="<?php if($this->uri->segment(2) == 'ManageAccount'){echo 'active';}?>" ><a class="menu-item" href="<?php echo base_url($lang."/ManageAccount"); ?>" data-i18n="Modern Menu"><?php echo lang('menu_manage_account'); ?></a>
                        </li>   
                        <!-- <li id="menu_manage_user" class="<?php if($this->uri->segment(2) == 'profile'){echo 'active';}?>"><a class="menu-item" href="<?php echo base_url($lang."/profile"); ?>" data-i18n="Collapsed Menu"><?php echo lang('menu_manage_user'); ?></a> -->
                        </li>   
                        <li id="menu_manage_document" class="<?php if($this->uri->segment(2) == 'DocSetting'){echo 'active';}?>"><a class="menu-item" href="<?php echo base_url($lang."/DocSetting"); ?>" data-i18n="Semi Light"><?php echo lang('menu_document'); ?></a>
                        </li>
                        <li id="menu_manage_chat" class="<?php if($this->uri->segment(2) == 'chatSetting'){echo 'active';}?>"><a class="menu-item" href="<?php echo base_url($lang."/chatSetting"); ?>" data-i18n="Semi Dark"><?php echo lang('menu_chat'); ?></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item <?php if($this->uri->segment(2) == 'productView'){echo 'active';}?>" id="menu_product"><a href="#"><i class="feather icon-archive"></i><span class="menu-title" data-i18n="Layouts"><?php echo lang('menu_product'); ?></span></a>
                    <ul class="menu-content">
                        <ul class="menu-content">
                            <li class=""></li>
                            <li id="menu_list_product" class="<?php if($this->uri->segment(2) == 'productList'){echo 'active';}?>"><a class="menu-item" href="<?php echo base_url($lang."/productList"); ?>" data-i18n="1 column" onclick="loadProductList()"><?php echo lang('menu_list_product'); ?></a>
                            </li>
                            <li id="menu_add_product" class="<?php if($this->uri->segment(2) == 'productAdd'){echo 'active';}?>"><a class="menu-item" href="<?php echo base_url($lang."/productAdd"); ?>" data-i18n="1 column"><?php echo lang('menu_add_product'); ?></a>
                            </li>
                        </ul>
                    </ul>
                </li>
                <!-- Shipping menu -->
                <!-- <li class=" nav-item <?php if($this->uri->segment(2) == 'Shippings'){echo 'open';}?>"  id="menu_delivery"><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Layouts"><?php echo lang('shipping'); ?></span></a>
                    <ul class="menu-content">
                        <ul class="menu-content">
                            <li class=""></li>
                                <li id="menu_shippings" class="<?php if($this->uri->segment(2) == 'Shippings'){echo 'active';}?>"><a class="menu-item" href="<?php echo base_url($lang."/Shippings/delivery_in_batch"); ?>" data-i18n="1 column"><?php echo lang('delivery_batch'); ?></a>
                            </li>
                        </ul>
                    </ul>
                </li> -->
                <!-- Shipping menu end-->
                
                <li class=" nav-item <?php if($this->uri->segment(2) == 'Quotation' || $this->uri->segment(2) == 'QuotationList' || $this->uri->segment(2) == 'QuotationDetail' ){echo 'open';}?>"  id="menu_orders"><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Layouts"><?php echo lang('menu_orders'); ?></span></a>
                    <ul class="menu-content">
                        <ul class="menu-content">
                            <li class=""></li>
                                <li id="menu_manage_orders" class="<?php if($this->uri->segment(2) == 'ManageOrders'  || $this->uri->segment(2) == 'OrderDetial'  ){echo 'active';}?>"><a class="menu-item" href="<?php echo base_url($lang."/ManageOrders/allorders-tab"); ?>" data-i18n="1 column"><?php echo lang('menu_manage_orders'); ?></a>
                            </li>
                            <!-- <li id="menu_list_orders"><a class="menu-item" href="#" data-i18n="1 column"><?php echo lang('menu_list_orders'); ?></a> -->
                            </li>
                                <li id="menu_quotation" class="<?php if($this->uri->segment(2) == 'Quotation' || $this->uri->segment(2) == 'QuotationList' || $this->uri->segment(2) == 'QuotationDetail' ){echo 'active';}?> "><a class="menu-item" href="<?php echo base_url($lang."/Quotation"); ?>" data-i18n="1 column"><?php echo lang('menu_quotation'); ?></a>
                            </li>
                        </ul>
                    </ul>
                </li>
                
                <li class=" nav-item <?php if($this->uri->segment(2) == 'ads'){echo 'active';}?>" id="menu_markting"><a href="<?php echo base_url($lang."/ads"); ?>"><i class="feather icon-bookmark"></i><span class="menu-title" data-i18n="Layouts"><?php echo lang('menu_markting'); ?></span></a></li>
                <li class=" nav-item <?php if($this->uri->segment(2) == 'income'){echo 'active';}?>"  id="menu_finance"><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Layouts">การเงิน<?php //echo lang('menu_orders'); ?></span></a>
                    <ul class="menu-content">
                        <ul class="menu-content">
                            <li class=""></li>
                                <li id="menu_manage_orders" class="<?php if($this->uri->segment(2) == 'income' || $this->uri->segment(2) == 'report'){echo 'active';}?>"><a class="menu-item" onclick="confirmPass('income')" data-i18n="1 column">รายรับของฉัน<?php //echo lang('menu_manage_orders'); ?></a>
                            </li>
                            <!-- <li id="menu_list_orders"><a class="menu-item" href="#" data-i18n="1 column"><?php echo lang('menu_list_orders'); ?></a> -->
                            </li>
                                <li id="menu_quotation" class="<?php if($this->uri->segment(2) == 'balance'){echo 'active';}?>"><a class="menu-item" onclick="confirmPass('balance')"  data-i18n="1 column">Seller Balance<?php //echo lang('menu_quotation'); ?></a>
                            </li>
                            </li>
                                <li id="menu_quotation" class="<?php if($this->uri->segment(2) == 'wallet'){echo 'active';}?>"><a class="menu-item" onclick="confirmPass('wallet')"  data-i18n="1 column">บัญชีธนาคาร<?php //echo lang('menu_quotation'); ?></a>
                            </li>
                        </ul>
                    </ul>
                </li>
                <li class=" nav-item <?php if($this->uri->segment(2) == 'setting'){echo 'active';}?>" id="shop_management"><a class="menu-item" href="<?php echo base_url($lang."/setting"); ?>" ><i class="feather icon-layout"></i><span class="menu-title" data-i18n="Layouts"><?php echo lang('shop_management'); ?></span></a></li>
                <li id="admin-menu" class=" nav-item <?php if($this->uri->segment(2) == 'admin'){echo 'active';}?>" style="display:none;"><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Layouts">Admin</span></a>
                    <ul class="menu-content">
                        <ul class="menu-content">
                            <li class=""></li>
                            <li id="manageSeller"class="<?php if($this->uri->segment(2) == 'manageSeller'){echo 'active';}?>">
                                <a class="menu-item" href="#" data-i18n="1 column"  onclick="confirmPass('manageSeller')">จัดการ Seller<?php //echo lang('menu_manage_orders'); ?></a>
                            </li>
                            <li id="manageSeller"class="<?php if($this->uri->segment(2) == 'adminOrders'){echo 'active';}?>">
                                <a class="menu-item" href="#" data-i18n="1 column"  onclick="confirmPass('adminOrders')">จัดการคำสั่งซื้อ<?php //echo lang('menu_manage_orders'); ?></a>
                            </li>
                            <li id="manageSeller"class="<?php if($this->uri->segment(2) == 'adminQuotation' || $this->uri->segment(2) == 'adminQuotationDetail' || $this->uri->segment(2) == 'quotationAddSeller'){echo 'active';}?>">
                                <a class="menu-item" href="#" data-i18n="1 column"  onclick="confirmPass('adminQuotation')">ใบเสนอราคา<?php //echo lang('menu_manage_orders'); ?></a>
                            </li>
                            <li id="manageSeller"class="<?php if($this->uri->segment(2) == 'adminSetting'){echo 'active';}?>">
                                <a class="menu-item" href="#" data-i18n="1 column"  onclick="confirmPass('adminSetting')">การตั้งค่า<?php //echo lang('menu_manage_orders'); ?></a>
                            </li>
                            <li id="manageuser"class="<?php if($this->uri->segment(2) == 'manageAdmin' || $this->uri->segment(2) =='adminRegister'){echo 'active';}?>">
                                <a class="menu-item" href="#" data-i18n="1 column"  onclick="confirmPass('manageAdmin')">จัดการแอดมิน<?php //echo lang('menu_manage_orders'); ?></a>
                            </li>
                        </ul>
                    </ul>
                </li>
            </ul>
        </div> 
    </div>
    <!-- END: Main Menu-->
    <button type="button" id="btnConfirmPass" class="btn btn-outline-warning btn-lg" data-toggle="modal" data-target="#confirmPassModal" style="display:none;">Launch Modal</button>
    <!-- Modal -->
    <div class="modal fade text-left" id="confirmPassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel21" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel21">ตรวจสอบ</h4>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <p class="p20 text-center">เพื่อความปลอดภัยของบัญชีคุณ กรุณาใส่รหัสผ่านที่ใช้ลงทะเบียน eMarketShops <br/> เพื่อเป็นการตรวจสอบ</p>
                    <!-- <label>Password: </label> -->
                    <div class="form-group position-relative has-icon-left">
                        <input type="password" id="confirmPassWord" placeholder="Password" class="form-control">
                        <div class="form-control-position">
                            <i class="fa fa-lock line-height-1 text-muted icon-align"></i>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="ยกเลิก">
                    <input type="button" class="btn btn-outline-primary" id="btn_click_confirm" onclick="checkPassword()" value="ตรวจสอบ">
                </div>
            </div>
        </div>
    </div>