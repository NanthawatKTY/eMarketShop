    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">ใบเสนอราคา</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url($lang.'/'); ?>"><?php echo lang('menu_home'); ?></a>
                                </li>
                                <li class="breadcrumb-item active">ใบเสนอราคา
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
                <!-- App invoice wrapper -->
                <section class="app-invoice-wrapper">
                    <div class="row">
                        <div class="col-xl-9 col-md-8 col-12 printable-content" id="admin_quotation_content">
                            <!-- using a bootstrap card -->
                            <div class="card">
                                <!-- card body -->
                                <div class="card-body p-2">
                                    <!-- card-header -->
                                    <div class="card-header px-0">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-7 col-xl-4 mb-50">
                                                <span class="invoice-id font-weight-bold" id="admin_quotation_no"></span>
                                                <!-- <span>948372</span> -->
                                            </div>
                                            <div class="col-md-12 col-lg-5 col-xl-8">
                                                <div class="d-flex align-items-center justify-content-end justify-content-xs-start">
                                                    <!-- <div class="issue-date pr-2">
                                                        <span class="font-weight-bold no-wrap">Issue Date: </span>
                                                        <span>07/02/2019</span>
                                                    </div> -->
                                                    <div class="due-date">
                                                        <span class="font-weight-bold no-wrap">วันที่ : </span>
                                                        <span id="admin_quotation_date"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- invoice logo and title -->
                                    <div class="invoice-logo-title row py-2">
                                        <div class="col-6 d-flex flex-column justify-content-center align-items-start">
                                            <h2 class="text-primary">ใบเสนอราคา</h2>
                                            <span id="admin_quotation_subject"></span>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end invoice-logo">
                                            <img src="<?php echo base_url('app-assets/img/logo-big.png'); ?>" alt="company-logo" height="" width="100">
                                        </div>
                                    </div>
                                    <hr>

                                    <!-- invoice address and contacts -->
                                    <div class="row invoice-adress-info py-2">
                                        <div class="col-6 mt-1 from-info">
                                            <div class="info-title mb-1">
                                                <span>From</span>
                                            </div>
                                            <div class="company-name mb-1">
                                                <span class="text-muted" id="admin_quotation_customer_name"></span>
                                            </div>
                                            <div class="company-address mb-1">
                                                <span class="text-muted" id="admin_quotation_customer_address"></span>
                                            </div>
                                            <div class="company-email  mb-1 mb-1">
                                                <span class="text-muted" id="admin_quotation_customer_email"></span>
                                            </div>
                                            <div class="company-phone  mb-1">
                                                <span class="text-muted" id="admin_quotation_customer_phone"></span>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-1 to-info">
                                            <!-- <div class="info-title mb-1">
                                                <span>To</span>
                                            </div>
                                            <div class="company-name mb-1">
                                                <span class="text-muted" id="admin_quotation_name"></span>
                                            </div>
                                            <div class="company-address mb-1">
                                                <span class="text-muted" id="admin_quotation_address"></span>
                                            </div>
                                            <div class="company-email mb-1">
                                                <span class="text-muted" id="admin_quotation_email"></span>
                                            </div>
                                            <div class="company-phone  mb-1">
                                                <span class="text-muted" id="admin_quotation_phone"></span>
                                            </div> -->
                                        </div>
                                    </div>

                                    <!--product details table -->
                                    <div class="product-details-table py-2 table-responsive">
                                        <table class="table table-borderless" id="table_quotation_item">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ITEM</th>
                                                    <!-- <th scope="col">DESCRIPTION</th> -->
                                                    <!-- <th scope="col">COST</th> -->
                                                    <th scope="col">QTY</th>
                                                    <th scope="col">PRICE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>

                                    <!-- invoice total -->
                                    <div class="invoice-total py-2">
                                        <div class="row">
                                            <div class="col-4 col-sm-6 mt-75">
                                                <p>Thanks for your business.</p>
                                            </div>
                                            <div class="col-8 col-sm-6 d-flex justify-content-end mt-75">
                                                <ul class="list-group cost-list">
                                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2" >Subtotal </span>
                                                        <span class="cost-value" id="admin_quotation_subtotal"></span>
                                                    </li>
                                                    <!-- <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2">Discount </span>
                                                        <span class="cost-value">-$ 09.60</span>
                                                    </li> -->
                                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2">Tax </span>
                                                        <span class="cost-value" id="admin_quotation_tax"></span>
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2">Total </span>
                                                        <span class="cost-value" id="admin_quotation_total"></span>
                                                    </li>
                                                    <!-- <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2">Paid To Date </span>
                                                        <span class="cost-value">-$ 00.00</span>
                                                    </li>
                                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2">Balance (USD) </span>
                                                        <span class="cost-value">$ 10,953</span>
                                                    </li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- buttons section -->
                        <div class="col-xl-3 col-md-4 col-12 action-btns">
                            <div class="card">
                                <div class="card-body p-2">
                                    <a href="#" class="btn btn-primary btn-block mb-1" onclick="sendQuotation(this)" id="admin_quotation_send"> <i class="feather icon-check mr-25 common-size"></i> Send Quotation</a>
                                    <a href="#" class="btn btn-info btn-block mb-1" onclick="printDiv('admin_quotation_content')"> <i class="feather icon-printer mr-25 common-size"></i> Print</a>
                                    <!-- <a href="#" class="btn btn-info btn-block mb-1"><i class="feather icon-edit-2 mr-25 common-size"></i> Edit Invoice</a> -->
                                    <!-- <a href="#" class="btn btn-success btn-block mb-1"><i class="feather icon-credit-card mr-25 common-size"></i> Add Payment</a> -->
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
    <!-- END: Main Menu-->
    <button type="button" id="btnSendQuotation" class="btn btn-outline-warning btn-lg" data-toggle="modal" data-target="#sendQuotationModal" style="display:none;">Launch Modal</button>
    <!-- Modal -->
    <div class="modal fade text-left" id="sendQuotationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel21" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel21">ส่งใบเสนอราคา</h4>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <p class="p20 text-center">เลือกร้านค้าเพื่อส่งใบเสนอราคาฉบับนี้</p>
                    <!-- <label>Password: </label> -->
                    <!-- <div class="form-group position-relative has-icon-left">
                        <select id="admin_sellerList" clsss="form-control">
                        </select>
                    </div> -->
                    <fieldset class="form-group">
                        <!-- <label for="product_view_type">ประเภทสินค้า</label> -->
                        <select class="form-control" id="admin_sellerList" name="">
                        </select>
                        <input name="admin_quotation_customerId" id="admin_quotation_customerId" type="hidden">
                        <input name="admin_quotation_sellerId" id="admin_quotation_sellerId" type="hidden">
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="ยกเลิก">
                    <input type="button" class="btn btn-outline-primary" id="btn_admin_submit_send_quotation" value="บันทึก">
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('helper/admin/firebase_admin_quotationDetail') ?>