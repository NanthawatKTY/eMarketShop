<div class="app-content content" id="noprint">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0"><?php echo lang('quotations_list'); ?>
                </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url($lang.'/Quotation');?>"><?php echo lang('menu_home'); ?></a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section class="app-invoice-wrapper">
                <div class="row">
                    <div class="col-xl-9 col-md-8 col-12 printable-content" id="printableArea"> <!--Print-->
                        <div id="MainPDF">
                            <div class="card">
                                <div class="card-body p-2">
                                    <div class="card-header px-0">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-7 col-xl-4 mb-50">
                                                <span class="invoice-id font-weight-bold"><?php echo lang('quotations_no'); ?></span>
                                                <span id="quotationNo"></span>
                                            </div>
                                            <div class="col-md-12 col-lg-5 col-xl-8">
                                                <div class="d-flex align-items-center justify-content-end justify-content-xs-start">
                                                    <div class="issue-date pr-2">
                                                        <span class="font-weight-bold no-wrap"><?php echo lang('date_issue'); ?></span>
                                                        <span id="insertDate"></span>
                                                    </div>
                                                    <!--Date_Due-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invoice-logo-title row py-2">
                                        <div class="col-6 d-flex flex-column justify-content-center align-items-start">
                                            <h2 class="text-primary"><?php echo lang('quotations_list'); ?></h2>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end invoice-logo">
                                            <img src=" <?php echo base_url('app-assets/img/logo-png.png')?>" alt="logo" height="80" width="80">
                                        </div>
                                    </div>
                                    <span id="customerId"></span>
                                    <hr>
                                    <span id="view_subject" class="font-weight-bold"><?php echo lang('subject'); ?></span>
                                    <div class="row invoice-adress-info py-2">
                                        <div class="col-6 mt-1 from-info">
                                            <div class="info-title mb-1">
                                                <span><?php echo lang('bill_from'); ?></span>
                                            </div>
                                            <div class="company-name mb-1">
                                                <span class="text-muted" id="view_customerName"></span>
                                            </div>
                                            <div class="company-address mb-1">
                                                <span class="text-muted" id="view_customerAddress"></span>
                                            </div>
                                            <div class="company-email  mb-1 mb-1">
                                                <span class="text-muted" id="view_customerEmail"></span>
                                            </div>
                                            <div class="company-phone  mb-1">
                                                <span class="text-muted" id="view_customerPhone"></span>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-1 to-info">
                                            <div class="info-title mb-1">
                                                <span><?php echo lang('bill_to'); ?></span>
                                            </div>
                                            <div class="company-name mb-1">
                                                <span class="text-muted" id="sellerName"></span>
                                            </div>
                                            <div class="company-address mb-1">
                                                <span class="text-muted" id="addressName"></span>
                                            </div>
                                            <div class="company-email mb-1">
                                                <span class="text-muted" id="sellerEmail"></span>
                                            </div>
                                            <div class="company-phone  mb-1">
                                                <span class="text-muted" id="sellerTel"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-details-table py-2 table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><?php echo lang('item_list'); ?></th>
                                                    <!-- <th scope="col"><?php echo lang('description'); ?></th> -->
                                                    <th scope="col"><?php echo lang('cost'); ?></th>
                                                    <th scope="col"><?php echo lang('qty'); ?></th>
                                                    <th scope="col"><?php echo lang('price'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody id="quotationItem_tb"></tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    <div class="invoice-total py-2">
                                        <div class="row">
                                            <div class="col-4 col-sm-6 mt-75">
                                                <p><?php echo lang('thanks_for_your_business'); ?></p>
                                            </div>
                                            <div class="col-8 col-sm-6 d-flex justify-content-end mt-75">
                                                <ul class="list-group cost-list">
                                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2"><?php echo lang('subtotal'); ?></span>
                                                        <span class="cost-value" id="subtotal"></span>
                                                    </li>
                                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2"><?php echo lang('discount'); ?></span>
                                                        <span class="cost-value" id="amountDC"></span>
                                                    </li>
                                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2"><?php echo lang('vat'); ?></span>
                                                        <span class="cost-value" id="tax"></span>
                                                    </li>
                                                    <li class="dropdown-divider">
                                                    </li>
                                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                        <span class="cost-title mr-2"><?php echo lang('balance'); ?></span>
                                                        <span class="cost-value" id="total"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- S1 Button -->                  
                    </div>     
                    <div class="col-xl-3 col-md-4 col-12 action-btns">
                        <div class="card">
                            <div class="card-body p-2">
                                <!-- <a href="#" class="btn btn-primary btn-block mb-1"><i class="feather icon-check mr-25 common-size"></i><?php echo lang('send_quotation')?></a> -->
                                <a href="javascript:void(0);" onclick="printArea('printableArea')" class="btn btn-info btn-block mb-1"><i class="feather icon-printer mr-25 common-size"></i><?php echo lang('print')?></a>  <!---class="btn btn-info btn-block mb-1 print-invoice"--->
                                <!-- <button type="button" onclick="genPDF(this)" id="btnPrint" class="btn btn-block btn-primary mb-1"><i class="feather icon-download mr-25 common-size"></i><?php echo lang('download_quotation')?></button> -->
                                <!-- <a href="javascript:genPDF(btnPrint);" class="btn btn-block btn-primary mb-1"><i class="feather icon-download mr-25 common-size"></i><?php echo lang('download_quotation')?></a> -->
                                <a onclick="QuotationDetailEdit(this)" id="quotationEdit" href="#" class="btn btn-info btn-block mb-1"><i class="feather icon-edit-2 mr-25 common-size"></i><?php echo lang('edit_invoice')?></a>
                                <!-- <a href="#" class="btn btn-success btn-block mb-1"><i class="feather icon-credit-card mr-25 common-size"></i> Add Payment</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-md-8 col-12 printable-content">
                        <div class="row">
                            <div class="col-12" style="text-align:right">
                                <button id="add_approved" type="button" class="btn btn-success-order btn-success pull-right"  style="margin-left:20px" href="" onclick="approvedD(this)"><i class="feather icon-check-square mr-25 common-size"></i>Approved</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php $this->load->view('helper/orders/firebase_quotationDetail') ?>

<!--Script-->
 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script> --> 



<!-- S1 Button -->
    <!-- <div class="btn-group">
        <button id="add_approved" type="button" class="btn btn-success-order btn-success"  style="margin-left:20px" href="" onclick="approvedD(this)">Approved</button>
    </div>
Button
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ยืนยันรายการ</button>
    Modal
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ยืนยันรายการ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">จะทำการยืนยันรายการนี้หรือไม่?</div>
                <div class="modal-footer">   
                    <div id="form_quotation_approved">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                        <input type="button" class="btn btn-primary" href="" onclick="approvedD(this)" id="add_approved" value="approved">ยืนยัน</input>
                    </div>
                </div>
            </div>
        </div>
    </div>
Button -->
<!-- S1 Button -->

<!--Date_Due-->
    <!-- <div class="due-date"> -->
        <!-- <span class="font-weight-bold no-wrap"><?php echo lang('date_due'); ?></span> -->
        <!-- <span id="quotationDate"></span> -->
    <!-- </div> -->
<!--Date_Due-->

<!--Script-->