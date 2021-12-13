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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="<?php echo base_url($lang."/adminRegister"); ?>" class="btn btn-primary btn-min-width mr-1 mb-1"><i class="fa fa-user"></i> เพิ่มแอดมิน</a>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                            <li><a data-action="reload" onclick="getUserList()"><i class="feather icon-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div id="app-invoice-wrapper" class="">
                                            <table id="" class="table" style="width: 100%;">
                                                <thead class="border-bottom border-dark">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>
                                                            <span class="align-middle">ชื่อ - สกุล</span>
                                                        </th>
                                                        <th>เบอรโทรศัพท์</th>
                                                        <th>อีเมล</th>
                                                        <th>สถานะ</th>
                                                        <!-- <th>Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody id="admin_user_tb">
                                                    
                                                </tbody>
                                            </table>
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
    <!-- Modal -->
    <button type="button" id="btn_show_modal_seller" class="btn btn-outline-success block btn-lg" data-toggle="modal" data-target="#modal_show_seller" style="display:none;"></button>
    <div class="modal fade text-left" id="modal_show_seller" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">info</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">                    
                        <img id="modal_seller_logo" src="<?php echo base_url('app-assets/img/logo-big.png'); ?>" class="rounded-circle  height-100" alt="Card image">
                        <h5 class="card-title text-gray" style="font-size:14px;margin-top:20px;"><span id="modal_shopName" class="text-black" style="font-size:18px;"></span></h5>
                        <p class="btn btn-sm btn-primary mr-25 text-center"><span id="modal_type"></span></p>
                    </div>
                    <hr>
                    <div class="card-body">
                        <p class="card-text text-gray">รายละเอียดร้านค้า : <span id="modal_dec" class="text-black"></span></p>
                        <p class="card-text text-gray">ที่อยู่ : <span id="modal_address" class="text-black"></span></p>
                        <p class="card-text text-gray">อีเมล :<span id="modal_email" class="text-black"></span></p>
                        <p class="card-text text-gray">โทร : <span id="modal_phone" class="text-black"></span></p>
                    </div>

                    <h5>Docs</h5>
                    <ul id="modal_docs"></ul>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('helper/admin/firebase_admin_user'); ?>