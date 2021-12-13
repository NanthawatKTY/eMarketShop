<div class="app-content content">
	<div class="content-overlay"></div>
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2">
				<h3 class="content-header-title mb-0"><?php echo lang('delivery_batching'); ?></h3>
				<div class="row breadcrumbs-top">
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><?php echo lang('delivery_batching_describe'); ?>
							</li>
							<!-- <li class="breadcrumb-item active"><?php echo lang('quotations_list'); ?> -->
							<!-- </li> -->
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="content-body">
			<!-- <div class="row mb-1 mt-1 mt-md-0">
                <div class="col-12">
                    <a href="<?php echo base_url($lang.'/QuotationDetail'); ?>" class="btn btn-primary"><?php echo lang('create_quotations'); ?></a>
                </div>
            </div> -->
			<div class="card">
				<div class="card-body">
					<div id="app-invoice-wrapper" class="">
						<div id="app-invoice-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
							<div class="row">
								<div class="col-xs-9 .col-md-7">
									<div class="dataTables_length" id="app-invoice-table_length"></div>
								</div>
								<div class="col col-md-8">
									<div id="app-invoice-table_filter" class="dataTables_filter">
										<label>
											<?php echo lang('delivery_batching_filter'); ?>
											<select type="button" id="shipping_sort">
												<option value="allShipping">
													<?php echo lang('all_shipping'); ?>
												</option>
												<option value="Thailand Post">
													<?php echo lang('thailand_post'); ?>
												</option>
												<option value="SCG Express">
													<?php echo lang('scg_express'); ?>
												</option>
												<option value="Inter Express">
													<?php echo lang('inter_express'); ?>
												</option>
												<select>
										</label>
									</div>
								</div>
								<div class="form-group floating-label-form-group" >
										<label for="countby" style="margin-left:10px"><?php echo lang('delivery_batching_process'); ?></label>
										<div class="btn-group">
											<select name="parent" type="button" id="statusProcess_batch"
													data-child-id="id_child"
													class="dependent-selects__parent btn btn-outline-secondary dropdown-toggle btn-sm"
													aria-haspopup="true" aria-expanded="false">

												<option id="orderBatchAllProcess" value="orderBatchAllProcess">
													<?php echo lang('delivery_batching_order_all'); ?>
												</option>
												<option id="orderBatchNotProcess" value="orderBatchNotProcess">
													<?php echo lang('delivery_batching_order_notprocess'); ?>
												</option>

											</select>
										</div>
									</div>
									<div class="form-group floating-label-form-group " >
										<label for="countby" style="margin-left:10px"><?php echo lang('sort_by'); ?></label>
										<div class="btn-group">
											<select name="parent" type="button" id="ordersDateFilter_batch"
													data-child-id="id_child"
													class="dependent-selects__parent btn btn-outline-secondary dropdown-toggle btn-sm"
													aria-haspopup="true" aria-expanded="false">

												<option id="orderDateO2N" value="orderDateO2N">
													<?php echo lang('order_date_old_to_new'); ?>
												</option>
												<option id="orderDateN2O" value="orderDateN2O">
													<?php echo lang('order_date_new_to_old'); ?>
												</option>

											</select>
										</div>
									</div>
							</div>
						</div>
						<div class="row">
								<div class="table-responsive">
								<table id="deliveryBatchTB" class="table  table-bordered mt-1 text-center">
									<thead>
										<tr>
											<th><?php echo lang('delivery_batching_Order_no');?></th>
											<th><?php echo lang('delivery_batching_customer'); ?></th>
											<th><?php echo lang('delivery_batching_option'); ?></th>
											<th><?php echo lang('delivery_batching_status'); ?></th>
											<th><?php echo lang('delivery_batching_order_confirm'); ?></th>
										</tr>
									</thead>
									<tbody  class="delivery_batch_tb">
									</tbody>
								</table>
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
<?php $this->load->view('helper/shipping/firebase_delivery_batch') ?>
