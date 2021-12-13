<!-- BEGIN: Custom CSS-->
															
<!-- END: Custom CSS-->
<!-- All orders !!! -->
	<div class="tab-pane active" id="allorders" aria-labelledby="allorders-tab" role="tabpanel">
		<!-- All orders form starts -->
		<form novalidate>
									
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
								<tbody  class="tbBodyAll">
								</tbody>
							</table>
							<table id="tbAllOrdersExport" class="table  table-bordered mt-1 text-center" style="display: none;"	>
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
								<tbody  class="tbBodyAllExport">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			<!-- Searching result end -->
			</div>
		</form>
		<!-- All orders form ends -->
	</div>
<?php $this->load->view('helper/orders/firebase_parcel') ?>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>




						

						
						
