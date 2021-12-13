<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Stats -->
                <!-- <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="media align-items-stretch">
                                    <div class="p-2 text-center bg-primary bg-darken-2">
                                        <i class="feather icon-archive font-large-2 white"></i>
                                    </div>
                                    <div class="p-2 bg-gradient-x-primary white media-body">
                                        <h5>Products</h5>
                                        <h5 class="text-bold-400 mb-0"><i class="feather icon-plus"></i> 28</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="media align-items-stretch">
                                    <div class="p-2 text-center bg-danger bg-darken-2">
                                        <i class="icon-user font-large-2 white"></i>
                                    </div>
                                    <div class="p-2 bg-gradient-x-danger white media-body">
                                        <h5>New Users</h5>
                                        <h5 class="text-bold-400 mb-0"><i class="feather icon-arrow-up"></i> 1,238</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="media align-items-stretch">
                                    <div class="p-2 text-center bg-warning bg-darken-2">
                                        <i class="icon-basket-loaded font-large-2 white"></i>
                                    </div>
                                    <div class="p-2 bg-gradient-x-warning white media-body">
                                        <h5>New Orders</h5>
                                        <h5 class="text-bold-400 mb-0"><i class="feather icon-arrow-down"></i> 4,658</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="media align-items-stretch">
                                    <div class="p-2 text-center bg-success bg-darken-2">
                                        <i class="icon-wallet font-large-2 white"></i>
                                    </div>
                                    <div class="p-2 bg-gradient-x-success white media-body">
                                        <h5>Total Profit</h5>
                                        <h5 class="text-bold-400 mb-0"><i class="feather icon-arrow-up"></i> 5.6 M</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--/ Stats --> 
                <!--Recent Orders & Monthly Salse -->
                <div class="row match-height">
                    <div class="col-xl-8 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ที่ต้องทำ</h4>   
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <p>สิ่งที่คุณต้องจัดการ</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 home_do border_r border_b">
                                        <a href="<?php echo base_url($lang."/ManageOrders/ManageOrders_success"); ?>">
                                            <h2 id='count_order'>0</h2>
                                            <p>ขายแล้วทั้งหมด</h2>
                                        </a>
                                    </div>
                                    <div class="col-md-4 home_do border_r border_b">
                                        <a href="<?php echo base_url($lang."/ManageOrders/toShipNotprocess-tab"); ?>">
                                            <h2 id='count_order_shipping'>0</h2>
                                            <p>ที่ต้องจัดส่ง</p>
                                        </a>
                                    </div>
                                    <div class="col-md-4 home_do  border_b">
                                        <a href="<?php echo base_url($lang."/ManageOrders/toShipProcessed-tab"); ?>">
                                            <h2 id='count_order_shipping_'>0</h2>
                                            <p>กำลังจัดส่ง</p>
                                        </a>   
                                    </div>

                                    <div class="col-md-4 home_do border_r pt10">
                                        <a href="<?php echo base_url($lang."/ManageOrders/returnAllorders2-tab"); ?>">
                                            <h2 id='count_order_invoice_product'>0</h2>
                                            <p>การคืนสินค้า/คืนเงินที่ยังค้างอยู่</p>
                                        </a>
                                    </div>
                                    <div class="col-md-4 home_do border_r pt10">
                                        <a href="<?php echo base_url($lang."/ManageOrders/ManageOrders_cancelled"); ?>">
                                            <h2 id='count_order_invoice'>0</h2>
                                            <p>คำขอยกเลิกที่ยังค้างอยู่</p>
                                        </a>
                                    </div>
                                    <div class="col-md-4 home_do pt10">
                                        <a href="<?php echo base_url($lang."/productList"); ?>">
                                            <h2 id='count_product_stock'>0</h2>
                                            <p>สินค้าหมด</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body sales-growth-chart">
                                    <div id="monthly-sales2" class=""></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="chart-title mb-1 text-center">
                                    <h6>Total monthly Sales.</h6>
                                </div>
                                <div class="chart-stats text-center">
                                    <a href="#" class="btn btn-sm btn-primary mr-1">Statistics <i class="feather icon-bar-chart"></i></a> <span class="text-muted">for the last year.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Recent Orders & Monthly Salse -->              
                <!--Product sale & buyers -->
                <div class="row match-height">
                    <div class="col-xl-8 col-lg-12">
                        <div class="card set-height">
                            <div class="card-header">
                                <h4 class="card-title">Recent Orders</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload" onclick='getDataOrders_home()'><i class="feather icon-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- <p>Total paid invoices 240, unpaid 150. <span class="float-right"><a href="#" target="_blank">Invoice Summary <i class="feather icon-arrow-right"></i></a></span></p> -->
                                </div>
                                <div class="table-responsive">
                                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                                        <thead>
                                            <tr>
                                                <th>หมายเลขคำสั่งซื้อ</th>
                                                <th>ยอดรวม</th>
                                                <th>สถานะ</th>
                                                <th>shipping</th>
                                            </tr>
                                        </thead>
                                        <tbody id="home_order">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="card set-height">
                            <div class="card-header"> 
                                <h4 class="card-title">Recent Buyers</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content px-1">
                                <div id="recent-buyers" class="media-list position-relative">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/ Product sale & buyers -->
            </div>
        </div>
    </div>
    <?php echo js_asset('vendors/js/charts/raphael-min.js'); ?>
    <?php echo js_asset('vendors/js/charts/morris.min.js'); ?>
    <?php echo js_asset('vendors/js/extensions/unslider-min.js'); ?>
    <?php echo js_asset('vendors/js/timeline/horizontal-timeline.js'); ?>
    <?php  //echojs_asset('js/scripts/pages/dashboard-ecommerce.js'); ?>
    <script>
    if($('#monthly-sales2').length > 0){
             Morris.Bar({
        element: 'monthly-sales2',
        data: [{month: 'Jan', sales: 1835 }, {month: 'Feb', sales: 2356 }, {month: 'Mar', sales: 1459 }, {month: 'Apr', sales: 1289 }, {month: 'May', sales: 1647 }, {month: 'Jun', sales: 2156 }, {month: 'Jul', sales: 1835 }, {month: 'Aug', sales: 2356 }, {month: 'Sep', sales: 1459 }, {month: 'Oct', sales: 1289 }, {month: 'Nov', sales: 1647 }, {month: 'Dec', sales: 2156 }],
        xkey: 'month',
        ykeys: ['sales'],
        labels: ['Sales'],
        barGap: 4,
        barSizeRatio: 0.3,
        gridTextColor: '#bfbfbf',
        gridLineColor: '#E4E7ED',
        numLines: 5,
        gridtextSize: 14,
        resize: true,
        barColors: ['#00B5B8'],
        hideHover: 'auto',
    });   
    }

    </script>
    <?php $this->load->view('helper/home/firebase_home'); ?>