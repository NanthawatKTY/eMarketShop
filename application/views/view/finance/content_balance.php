<!-- BEGIN: Content-->
<?php //echo css_asset('daterangepicker.css'); ?>
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
                                <li class="breadcrumb-item active">Seller Balance<?php //echo lang('productList'); ?>
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
                        <div class="col-12 printable-content">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <h3  class="mb-2">ภาพรวมยอดเงิน</h3>
                                        <!-- <hr class="mb-2" style="border:2px solid #62c902 !important;"> -->
                                        <div class="" style="border:1px solid #e2e2e2; border-radius:10px; padding:10px;">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <h4 class="mb20">Seller Balance</h4>
                                                    <div class="col-md-3">
                                                        <h2 class="float-left">฿0</h2>
                                                        <button type="button" class="btn btn-warning float-right">ถอนเงิน</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <h4 class="mb20 ">บัญชีธนาคารของฉัน <a href="<?php echo base_url($lang.'/wallet'); ?>" class='float-right link_bank_account'>เพิ่มเติม ></a></h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="media">
                                                                <a class="media-left" href="#">
                                                                    <img id="bankLogo" src="" alt="Generic placeholder image" style="width: 50px;height: 50px;">
                                                                </a>
                                                                <div class="media-body" style="padding-left:20px">
                                                                    <p class="media-heading" style="margin:0;font-weight:600" id="bankName"></p>
                                                                    <P style="color:#a1a1a1;">ตรวจสอบแล้ว</P>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="badge badge-success">เริ่มต้น</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="" id="accountNo"></p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-md-4 col-12 action-btns">
                            <div class="card">
                                <div class="card-body p-2">
                                    <h3>รายการการเงิน</h3>
                                    <ul class="report_finance">
                                        <li><a href="<?php //echo base_a76($lang."/report/21 ก.ย. - 27 ก.ย. 2020"); ?>" style="color:#777777;">21 ก.ย. - 27 ก.ย. 2020 <span class="feather icon-download float-right" style="color:#62C902;"></span></a></li>
                                        <li><a href="#" style="color:#777777;">14 ก.ย. - 20 ก.ย. 2020 <span class="feather icon-download float-right" style="color:#62C902;"></span></a></li>
                                        <li><a href="#" style="color:#777777;">7 ก.ย. - 13 ก.ย. 2020 <span class="feather icon-download float-right" style="color:#62C902;"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </section>
                <!-- // Shopping cards section end -->
                <section id="income_section">
                    <div class="row">
                        <div class="col-12 printable-content">
                            <div class="card">
                                <div class="card-header" style="padding-bottom:0;">
                                    <h3 class="mb-2">ประวัติการทำรายการที่ผ่านมา</h3>
                                    <!-- <hr class="mb-2" style="border:2px solid #62c902 !important;"> -->
                                    <!-- <input type="date" class="form-control col-md-3"> -->
                                    <input type="text" class="form-control col-md-3" name="daterange" value="" />
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                    <ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="base-tab11" data-toggle="tab" aria-controls="tab11" href="#tab11" role="tab" aria-selected="true">การถอนเงิน</a>
                                            </li>
                                            <!-- <li class="nav-item">
                                                <a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab12" href="#tab12" role="tab" aria-selected="false">โอนเงินแล้ว</a>
                                            </li> -->
                                        </ul>
                                        <div class="tab-content px-1 pt-1 mb">
                                            <div class="tab-pane active" id="tab11" role="tabpanel" aria-labelledby="base-tab11">
                                                <table class="table table-striped table-bordered responsive dataex-res-scrolling" id="table_product_list">
                                                    <thead>
                                                    <tr>
                                                            <th width="150">วันที่</th>
                                                            <th width="">รายการ</th>
                                                            <th width="200">จำนวนที่ถอน</th>
                                                            <th width="60">สถานะ</th>
                                                            <!-- <th width="80">จำนวนเงินที่โอน</th> -->
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
                                                            <th width="150">วันที่</th>
                                                            <th width="">รายการ</th>
                                                            <th width="200">จำนวน</th>
                                                            <th width="60">สถานะ</th>
                                                            <!-- <th width="80">จำนวนเงินที่โอน</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody id="finance_log">
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
    <?php echo js_asset('js/datePicker/moment.min.js'); ?>
    <?php echo js_asset('js/datePicker/daterangepicker.js'); ?>
    <script>
        window.onload = async function() {
            userId = await userData();

            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });

            getWalletData();
        }

        function getWalletData(){
            let ref = db.collection("shops").doc(userId);
            ref.get().then(function(data){
                if (data.exists){
                    if (data.data().wallet){
                        data.data().wallet.forEach(function(item){
                            if (item.setDefault == true){
                                $('#bankName').text(item.bankName);
                                $('#accountNo').text('*** ' + item.accountNo.substr(item.accountNo.length - 4));
                                db.collection("bank_info").doc(item.bankCode).get().then(function(bankData){
                                    if (bankData.exists){
                                        
                                        $('#bankLogo').attr('src',bankData.data().src);
                                    }
                                });
                                return false;
                            }
                        })
                    }
                }
            })
        }
    </script>