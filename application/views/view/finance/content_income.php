<!-- BEGIN: Content-->
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 ">
                    <h3 class="content-header-title mb-0">การเงิน<?php //echo lang('productList'); ?></h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url($lang.'/'); ?>"><?php echo lang('menu_home'); ?></a>
                                </li>
                                <li class="breadcrumb-item">การเงิน<?php //echo lang('menu_product'); ?>
                                </li>
                                <li class="breadcrumb-item active">รายรับ<?php //echo lang('productList'); ?>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12 mb-md-0">
                    <div class="btn-group float-md-right" id="productpPageType" role="group" aria-label="Button group with nested dropdown">
                        <!-- <a class="btn btn-outline-primary active" onclick="chageStatusAcitve(this,'product_list');" href="#" id="clist"><i class="feather icon-list"></i></a>
                        <a class="btn btn-outline-primary" onclick="chageStatusAcitve(this,'product_grid');" href="#" id="cgrid"><i class="feather icon-grid"></i></a> -->
                        <!-- <input type="checkbox" id="isVariation" class="switchery" data-size="xs"/> -->
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Shopping cards section start -->
                <section id="income_page">
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
                <section id="income_section">
                    <div class="row">
                        <div class="col-xl-9 col-md-8 col-12 printable-content">
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
                                        <h3>ภาพรวมรายรับของฉัน</h3>
                                        <hr class="mb-2" style="border:2px solid #62c902 !important;">
                                        <div class="row mb-2">
                                            <div class="col-md-3"><h4>เตรียมการโอนเงิน</h4></div>
                                            <div class="col-md-3"><h4>โอนเงินแล้ว</h4></div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 color-gray">รวม</div>
                                            <div class="col-md-3 color-gray">สัปดาห์นี้</div>
                                            <div class="col-md-3 color-gray">เดือนนี้</div>
                                            <div class="col-md-3 color-gray">รวม</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-3"><h2>฿0</h2></div>
                                            <div class="col-md-3"><h2>฿0</h2></div>
                                            <div class="col-md-3"><h2>฿0</h2></div>
                                            <div class="col-md-3"><h2>฿0</h2></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-12 action-btns">
                            <div class="card">
                                <div class="card-body p-2">
                                    <h3>รายการการเงิน</h3>
                                    <ul class="report_finance">
                                        <li><a href="<?php echo base_url($lang."/report/21 ก.ย. - 27 ก.ย. 2020"); ?>" style="color:#777777;">21 ก.ย. - 27 ก.ย. 2020</a></li>
                                        <li><a href="<?php echo base_url($lang."/report/21 ก.ย. - 27 ก.ย. 2020"); ?>" style="color:#777777;">14 ก.ย. - 20 ก.ย. 2020 </a></li>
                                        <li><a href="<?php echo base_url($lang."/report/21 ก.ย. - 27 ก.ย. 2020"); ?>" style="color:#777777;">7 ก.ย. - 13 ก.ย. 2020 </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Shopping cards section end -->
                <section id="income_section">
                    <div class="row">
                        <div class="col-xl-9 col-md-8 col-12 printable-content">
                            <div class="card">
                                <div class="card-header" style="padding-bottom:0;">
                                    <h2>รายละเอียดรายรับของฉัน</h2>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                    <ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-tab11" data-toggle="tab" aria-controls="tab11" href="#tab11" role="tab" aria-selected="true">เตรียมการโอนเงิน</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab12" href="#tab12" role="tab" aria-selected="false">โอนเงินแล้ว</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content px-1 pt-1 mb">
                                            <div class="tab-pane active" id="tab11" role="tabpanel" aria-labelledby="base-tab11">
                                                <table class="table table-striped table-bordered responsive dataex-res-scrolling" id="table_product_list">
                                                    <thead>
                                                        <tr>
                                                            <th width="150">หมายเลขคำสั่งซื้อ</th>
                                                            <th width=>ผู้ซื้อ</th>
                                                            <th width="200">วันที่</th>
                                                            <th width="60">สถานะ</th>
                                                            <th width="80">จำนวนเงินที่โอน</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="finance_order">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="tab12" role="tabpanel" aria-labelledby="base-tab12">
                                                <table table class="table table-striped table-bordered responsive dataex-res-scrolling" id="table_product_list">
                                                    <thead>
                                                        <tr>
                                                            <th width="150">หมายเลขคำสั่งซื้อ</th>
                                                            <th width=>ผู้ซื้อ</th>
                                                            <th width="200">วันที่</th>
                                                            <th width="60">สถานะ</th>
                                                            <th width="80">จำนวนเงินที่โอน</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="finance_order">
                                                    </tbody>
                                                </table>
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
    </div>
    <!-- END: Content-->