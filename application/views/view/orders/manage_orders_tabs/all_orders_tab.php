<!-- BEGIN: Custom CSS-->
							
								
<!-- END: Custom CSS-->
<!-- All orders !!! -->
<div class="tab-pane active" id="allorders" aria-labelledby="allorders-tab" role="tabpanel">
	<!-- All orders form starts -->
	<form novalidate>
		<div class="row">
			<!-- Searh Orders start -->
				<div class="col-12 col-sm-6">
					<div class="form-group floating-label-form-group">
						<div class="controls">
							<label><?php echo lang("search_orders"); ?></label>
							<div class="input-group">
								<fieldset class="form-group position-relative has-icon-left mx-75 mb-0">
									<input type="text" class="form-control round col-md-12" id="chat-search"  placeholder="<?php echo lang('search_ur_orders'); ?>">
										<div class="form-control-position">
											<i class="ficon feather icon-search"></i>
										</div>
								</fieldset>
							</div>
						</div>
					</div>	
				</div>
			<!-- Searh Orders End -->

			<div class="col-12 col-lg-6">
				<!-- Date Filter -->
											
					<div class="form-group floating-label-form-group" style="float: right;">
					<label><?php echo lang('order_date'); ?></label>
						<div class='input-group form-group' >
							<!-- Date picker -->
							<input id="datePickerRange" type="text" class="form-control col-md-12" name="daterange" value="" />
							<!-- Date picker -->
							<button type="button" class="btn btn-outline-success mr-1 mb-1 btn-md"  onclick="exportTableToExcel('tbAllOrdersExport')"
								style="margin-left:10px"><?php echo lang('export'); ?></button>	
							</div>
						</div>
					</div>
					<div class="col-12">
						<form class="form-inline">
						<label>
							<h3><?php echo lang('orders'); ?></h3>
						</label>
						<!-- <button type="button" class="btn btn-info pull-right" href="<?php //echo base_url($lang.'/Shippings/delivery_in_batch'); ?>">
							<svg width="1em" height="1em" viewBox="0 0 17 17" class="bi bi-inboxes-fill"
							fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="margin-right:5px">
							<path fill-rule="evenodd"
							d="M.125 11.17A.5.5 0 0 1 .5 11H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0 .5.5 0 0 1 .5-.5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 16H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .121-.393zM3.81.563A1.5 1.5 0 0 1 4.98 0h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1-.78.624l-3.7-4.624A.5.5 0 0 0 11.02 1H4.98a.5.5 0 0 0-.39.188L.89 5.812a.5.5 0 1 1-.78-.624L3.81.563z" />
							<path fill-rule="evenodd"
							d="M.125 5.17A.5.5 0 0 1 .5 5H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0A.5.5 0 0 1 10 5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 10H1.883A1.5 1.5 0 0 1 .394 8.686l-.39-3.124a.5.5 0 0 1 .121-.393z" />
							</svg><?php echo lang('batch_delivery'); ?></button> -->
						</form>
						<!-- Searching Result -->
						<div class="chat-sidebar-list-wrapper pt-2">
							<div class="table-responsive">
								<table id="tbAllOrders" class="table  table-bordered mt-1 text-center">
									<thead>
										<tr>
											<th><?php echo lang('all_products'); ?></th>
											<th><?php echo lang('all_orders_price'); ?></th>

											<th>
											<select type="button" id="shippingSort1">
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
											</select>
											</th>
											<th><?php echo lang('action'); ?></th>
											<th><?php echo lang('orderDate'); ?></th>
																
										</tr>
									</thead>
									<tbody  class="tbBodyAll"></tbody>
								</table>
								<table id="tbAllOrdersExport" class="table  table-bordered mt-1 text-center" style="display: none;">
									<thead>
										<tr>
											<th><?php echo lang('all_products');?></th>
											<th><?php echo lang('all_orders_price'); ?></th>
											<th><?php echo lang('action'); ?></th>
											<th><?php echo lang('orderDate'); ?></th>
											<th><?php echo lang('customerName'); ?></th>
											<th><?php echo lang('productName'); ?></th>
											<th><?php echo lang('price_per_unit'); ?></th>
											<th><?php echo lang('amount'); ?></th>
											<th><?php echo lang('net_price'); ?></th>		
											<th><?php echo lang('deliveryOption'); ?></th>
											<th><?php echo lang('trackingNo'); ?></th>
											<th><?php echo lang('DeliveryAddress'); ?></th>
											<th><?php echo lang('postal_code'); ?></th>
											<th><?php echo lang('phone_num'); ?></th>
										</tr>
									</thead>
									<tbody  class="tbBodyAllExport"></tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- Searching result end -->
		</div>
	</form>
	<!-- All orders form ends -->
</div>
<?php echo js_asset('datePicker/moment.min.js'); ?>
<?php echo js_asset('datePicker/daterangepicker.js'); ?>
<?php $this->load->view('helper/orders/firebase_orders_all') ?>
													
<?php //echo js_asset('js/datePicker/daterangepicker.js'); ?>


						

						
						
