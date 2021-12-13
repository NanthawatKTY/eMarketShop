<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0"><?php echo lang('quotations'); ?></h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url($lang.'/'); ?>"><?php echo lang('menu_home'); ?></a>
                            </li>
                            <li class="breadcrumb-item"><?php echo lang('quotations'); ?>
                            </li>
                            <li class="breadcrumb-item active"><?php echo lang('quotations_list'); ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
        <!--<div class="row mb-1 mt-1 mt-md-0">-->
            <div class="card">
                <div class="card-body">
                    <div id="app-invoice-wrapper" class="">
                        <div id="app-invoice-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-xs-9 col-md-9">
                                <!-- <div class="dataTables_length">-->
                                </div>
                                <div class="col-xs-3 col-md-3">
                                    <div id="app-invoice-table_filter" class="dataTables_filter">
                                        <div class="card-header">
                                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                            <label class="text-right"><?php echo lang('search'); ?>
                                                <input type="search" name="searchN" class="form-control form-control-sm" placeholder="" aria-controls="app-invoice-table" id="myInput">
                                                <div class="heading-elements">
                                                    <ul class="list-inline mb-0">
                                                        <!--a data-action="collapse"-->
                                                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                                    </ul>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="app-invoice-table" class="table dataTable no-footer dtr-column" style="width: 100%;" role="grid" aria-describedby="app-invoice-table_info" id="myTable">
                                        <thead class="border-bottom border-dark">
                                            <tr role="row">
                                                <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=""></th>
                                                <th class=" " rowspan="1" colspan="1" style="width: 13px;" data-col="1" aria-label=""></th>
                                                <th class="sorting" tabindex="0" aria-controls="app-invoice-table" rowspan="1" colspan="1" style="width: 88px;" aria-label="Invoice# : activate to sort column ascending">
                                                    <span class="align-middle"><?php echo lang('invoice'); ?></span>
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="app-invoice-table" rowspan="1" colspan="1" style="width: 85px;" aria-label="Amount: activate to sort column ascending" onclick="sortTable(0)"><?php echo lang('amount'); ?></th>
                                                <th class="sorting" tabindex="0" aria-controls="app-invoice-table" rowspan="1" colspan="1" style="width: 65px;" aria-label="Date: activate to sort column ascending" onclick="sortTable(1)"><?php echo lang('date'); ?></th>
                                                <th class="sorting" tabindex="0" aria-controls="app-invoice-table" rowspan="1" colspan="1" style="width: 170px;" aria-label="Customer: activate to sort column ascending" onclick="sortTable(2)"><?php echo lang('customer'); ?></th>
                                                <!--<th class="sorting" tabindex="0">-->
                                                <th class="sorting" tabindex="0" aria-controls="app-invoice-table" rowspan="1" colspan="1" style="width: 102px;" aria-label="Status: activate to sort column ascending"><?php echo lang('status'); ?></th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 72px;" aria-label="Action"><?php echo lang('view_and_edit');?></th>
                                            </tr>
                                        </thead>
                                        <tbody id="quotationList_tb"></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info"  role="status" aria-live="polite"></div></div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="app-invoice-table_paginate">
                                                <!--<ul class="pagination">-->
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
</div>
<?php $this->load->view('helper/orders/firebase_quotationList') ?>

<!--Script-->
<!---------------------------------------------------------------------------------------------------------------------------->
<!--<ul class="pagination">-->

    <!-- <ul class="pagination">
        <li class="paginate_button page-item previous disabled" id="app-invoice-table_previous">
            <a href="#" aria-controls="app-invoice-table" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
            <li class="paginate_button page-item active">
            <a href="#" aria-controls="app-invoice-table" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
            <li class="paginate_button page-item ">
            <a href="#" aria-controls="app-invoice-table" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
            <li class="paginate_button page-item ">
            <a href="#" aria-controls="app-invoice-table" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
            <li class="paginate_button page-item ">
            <a href="#" aria-controls="app-invoice-table" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
            <li class="paginate_button page-item ">
            <a href="#" aria-controls="app-invoice-table" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
            <li class="paginate_button page-item next" id="app-invoice-table_next">
            <a href="#" aria-controls="app-invoice-table" data-dt-idx="6" tabindex="0" class="page-link">Next</a></li>
        </li>
    </ul> -->
    
<!--<ul class="pagination">-->    
<!---------------------------------------------------------------------------------------------------------------------------->
<!--label class="text-right"-->

    <!-- <label class="text-right"><?php echo lang('search'); ?> -->
    <!-- <input type="search" name="searchN" class="form-control form-control-sm" placeholder="" aria-controls="app-invoice-table" id="myInput"> -->

<!--label class="text-right"-->
<!---------------------------------------------------------------------------------------------------------------------------->
<!--a data-action="collapse"-->

    <!-- <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li> -->

<!--a data-action="collapse"-->
<!---------------------------------------------------------------------------------------------------------------------------->
<!--<div class="dataTables_length">-->

    <!-- <div class="dataTables_length" id="app-invoice-table_length"></div> -->

<!--<div class="dataTables_length">-->
<!---------------------------------------------------------------------------------------------------------------------------->
<!--<div class="row mb-1 mt-1 mt-md-0">-->

    <!-- <div class="row mb-1 mt-1 mt-md-0">-->
        <!--<div class="col-12">-->
            <!--<a href="<?php echo base_url($lang.'/QuotationDetail'); ?>" class="btn btn-primary"><?php echo lang('create_quotations'); ?></a>-->
        <!--</div>-->
    <!--</div>-->

<!--<div class="row mb-1 mt-1 mt-md-0">-->
<!---------------------------------------------------------------------------------------------------------------------------->
<!--<th class="sorting" tabindex="0">-->

    <!-- <th class="sorting" tabindex="0" aria-controls="app-invoice-table" rowspan="1" colspan="1" style="width: 111px;" aria-label="Tags: activate to sort column ascending"><?php echo lang('tags'); ?></th> -->

<!--<th class="sorting" tabindex="0">-->
<!---------------------------------------------------------------------------------------------------------------------------->
<!--Script-->