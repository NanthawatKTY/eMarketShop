<!-- BEGIN: Content-->
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0"><?php echo lang('productList'); ?></h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url($lang.'/'); ?>"><?php echo lang('menu_home'); ?></a>
                                </li>
                                <li class="breadcrumb-item"><?php echo lang('menu_product'); ?>
                                </li>
                                <li class="breadcrumb-item active"><?php echo lang('productList'); ?>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12 mb-md-0 mb-2">
                    <div class="btn-group float-md-right" id="productpPageType" role="group" aria-label="Button group with nested dropdown">
                        <a class="btn btn-outline-primary active" onclick="chageStatusAcitve(this,'product_list');" href="#" id="clist"><i class="feather icon-list"></i></a>
                        <a class="btn btn-outline-primary" onclick="chageStatusAcitve(this,'product_grid');" href="#" id="cgrid"><i class="feather icon-grid"></i></a>
                        <!-- <input type="checkbox" id="isVariation" class="switchery" data-size="xs"/> -->
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Shopping cards section start -->
                <section id="product_grid">
                    <div class="row">
                        <div class="col-12 mt-3 mb-1">
                            <div class="">
                                <div class="card-content collapse show">
                                    <div class="row match-height  skin skin-flat" id="productList">
                                    </div>     
                                </div>                           
                            </div>                           
                        </div>
                    </div>           
                </section>               
                <!-- Vertical scrolling table -->
                <section id="product_list">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered responsive dataex-res-scrolling" id="table_product_list">
                                            <thead>
                                                <tr>
                                                    <th width="60"></th>
                                                    <th width="60">รหัสสินค้า</th>
                                                    <th>ชื่อสินค้า</th>
                                                    <th width="60">ราคา</th>
                                                    <th width="60">คลัง</th>
                                                    <th width="80">จำนวนที่ขาย</th>
                                                    <th width="80">สถานะ</th>
                                                    <th width="60">ลบ</th>
                                                    <th width="60">ดู</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table_body_product_list">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Shopping cards section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
    <?php $this->load->view('helper/product/firebase_product_list') ?>