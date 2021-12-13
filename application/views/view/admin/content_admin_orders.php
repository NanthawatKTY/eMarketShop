<!-- BEGIN: Content-->
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">คำสั่งซื้อ</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url($lang.'/'); ?>"><?php echo lang('menu_home'); ?></a>
                                </li>

                                <li class="breadcrumb-item active">คำสั่งซื้อ
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12 mb-md-0 mb-2">
                    <div class="btn-group float-md-right" id="productpPageType" role="group" aria-label="Button group with nested dropdown">
                        <!-- <a class="btn btn-outline-primary active" onclick="//chageStatusAcitve(this,'product_list');" href="#" id="clist"><i class="feather icon-list"></i></a>
                        <a class="btn btn-outline-primary" onclick="//chageStatusAcitve(this,'product_grid');" href="#" id="cgrid"><i class="feather icon-grid"></i></a> -->
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
                                        <table class="table table-striped table-bordered responsive dataex-res-scrolling" id="">
                                            <thead>
                                                <tr>
                                                    <th width="10"></th>
                                                    <th width="500">รหัสคำสั่งซื้อ</th>
                                                    <!-- <th>หัวข้อ</th> -->
                                                    <th width="300">Tracking</th>
                                                    <th width="">ชื่อลูกค้า</th>
                                                    <th width="80">ราคา</th>
                                                    <th width="80">สถานะ</th>
                                                    <th width="80">Action</th>
                                                    <th width="150">วันที่</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table_admin_order_list">
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
    <!-- END: Main Menu-->
    <button type="button" id="amin_order_btn" class="btn btn-outline-warning btn-lg" data-toggle="modal" data-target="#admin_order_detail_modal" style="display:none;">Launch Modal</button>
    <!-- Modal -->
    <div class="modal fade text-left modal-xl" id="admin_order_detail_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel21" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel21">รายละเอียดคำสั่งซื้อ</h4>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <h5 style="color:black; font-weight:500;"><i class="feather icon-hash" style="margin-right:5px"></i>หมายเลขคำสั่งซื้อ</h5>
                            <p id="admin_order_no"></p>
                        </div>
                        <div class="col-md-6">
                            <p style="text-align:right;" id="admin_order_insertDate"></p>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <h5 style="color:black; font-weight:500;"><i class="feather icon-map-pin" style="margin-right:5px"></i>ที่อยู่</h5>
                            <p id="admin_order_detail_address_customer"></p>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <h5 style="color:black; font-weight:500;"><i class="feather icon-user" style="margin-right:5px"></i>ที่อยู่</h5>
                            <p id="admin_order_detail_customerName"></p>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr><th>สินค้าทั้งหมด</th><th>ราคาต่อชิ้น</th><th>จำนวน</th><th>ราคาสุทธิ</th></tr>
                        </thead>
                        <tbody id="amdin_order_detail_table_orderItem">
                        </tbody>
                    </table>
                    <p style="text-align:right;">ราคารวม : <span id="admin_order_detail_total"></span></p>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                    <!-- <input type="button" class="btn btn-outline-primary" id="btn_click_confirm" value="ตรวจสอบ"> -->
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('helper/admin/firebase_admin_orders') ?>