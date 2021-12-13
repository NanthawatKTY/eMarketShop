								<!-- Have to ship -->
								<div class="tab-pane" id="toship" aria-labelledby="toship-tab" role="tabpanel" style="display:block">
									<!-- Order - to ship start -->
									<form novalidate>
										<div class="row">
											<div class="col-12 col-sm-6">
												<div class="form-group floating-label-form-group">
													<div class="controls">
														<label><?php echo lang('search_orders'); ?></label>

														<!-- Search Box -->
														<div class="input-group">
															<fieldset class="form-group position-relative has-icon-left mx-75 mb-0">
																<input type="text" class="form-control round col-md-12" id="chat-search"  placeholder="<?php echo lang('search_ur_orders'); ?>">
																	<div class="form-control-position">
																		<i class="ficon feather icon-search"></i>
																	</div>
															</fieldset>
														</div>
														<!-- Search Box End-->
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<div class="form-group floating-label-form-group" style="float: right;">
												<label><?php echo lang('order_date'); ?></label>	
													<div class='input-group form-group'>
														<!-- Date picker -->
														<input id="datePickerRange" type="text" class="form-control col-md-12" name="daterange" value="" />
														<!-- Date picker -->
														<button type="button" class="btn btn-outline-success mr-1 mb-1 btn-md"  onclick="exportTableToExcel('tbToshipExport')"
															style="margin-left:10px"><?php echo lang('export'); ?></button>
													</div>
												</div>
											</div>

											<!-- Nav tab -->
											<div class="col-lg-12">
												<!-- Prevent to หดเข้าใน -->
												<div class="card">
													<div class="card-content">
														<div class="card-body">
															<ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist">
																<li class="nav-item">
																	<a class=" nav-link d-flex align-items-center tab-orders <?php  if($this->uri->segment(3) == 'ManageOrders_toship' || $this->uri->segment(3) == 'toShipOrders-tab'){echo 'active';}?>"
																		id="toShipOrders-tab" data-toggle="tab" value="toShipOrders"
																		role="tab"
																		aria-selected="true" onclick="changeUrl('toShipOrders-tab')">
																		<span class="d-none d-sm-block"><?php echo lang('all_tab'); ?></span>
																	</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link d-flex align-items-center tab-orders <?php if($this->uri->segment(3) == 'toShipNotprocess-tab'){echo 'active';}?>"
																		id="toShipNotprocess-tab" data-toggle="tab" value="toShipNotprocess"
																		role="tab"
																		aria-selected="false" onclick="changeUrl('toShipNotprocess-tab')">
																		<span
																			class="d-none d-sm-block"><?php echo lang('not_processed_tab'); ?></span>
																	</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link d-flex align-items-center tab-orders <?php if($this->uri->segment(3) == 'toShipProcessed-tab'){echo 'active';}?>"
																		id="toShipProcessed-tab" data-toggle="tab" value="toShipProcessed"
																		role="tab"
																		aria-selected="false" onclick="changeUrl('toShipProcessed-tab')">
																		<span
																			class="d-none d-sm-block"><?php echo lang('processed_tab'); ?></span>
																	</a>
																</li>
															</ul>
															<div class="tab-content" style="margin-top:15px">
																<div class="tab-pane active" id="toShipOrders"
																	aria-labelledby="toShipOrders-tab" role="tabpanel">
																	<!-- Order - to ship all form starts -->
																	<form novalidate>
																		<div class="row">
																			<!-- Form group -->
																			<div class="col-12">
																				<form class="form-inline">
																					<label>
																						<h3>
																							<?php echo lang('orders'); ?>
																						</h3>
																					</label>
																					<div
																						class="form-group floating-label-form-group pull-right">
																						<label
																							for="countby"><?php echo lang('sort_by'); ?></label>
																						<div class="btn-group">
																							<select name="parent" type="button"
																								id="ordersDateFilter_1" data-child-id="id_child"
																								class="dependent-selects__parent btn btn-outline-secondary dropdown-toggle btn-sm"
																								aria-haspopup="true" aria-expanded="false">
																								<!-- <option id="deliverO2N_1" value="deliverO2N_1" onclick="ordersDateFilter('deliverO2N_1')" >
																									<?php //echo lang('delivery_old_to_new'); ?>
																								</option>
																								<option id="deliverN2O_1" value="deliverN2O_1" onclick="ordersDateFilter('deliverN2O_1')" >
																									<?php //echo lang('delivery_new_to_old'); ?>
																								</option> -->
																								<option id="orderDateO2N_1"
																									value="orderDateO2N_1"
																									onclick="ordersDateFilter('orderDateO2N_1')">
																									<?php echo lang('order_date_old_to_new'); ?>
																								</option>
																								<option id="orderDateN2D_1"
																									value="orderDateN2O_1"
																									onclick="ordersDateFilter('orderDateN2O_1')">
																									<?php echo lang('order_date_new_to_old'); ?>
																								</option>
																							</select>
																						</div>
																						<!-- <button type="button" class="btn btn-info"
																							style="margin-left:20px">
																							<svg width="1em" height="1em" viewBox="0 0 17 17"
																								class="bi bi-inboxes-fill" fill="currentColor"
																								xmlns="http://www.w3.org/2000/svg"
																								style="margin-right:5px">
																								<path fill-rule="evenodd"
																									d="M.125 11.17A.5.5 0 0 1 .5 11H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0 .5.5 0 0 1 .5-.5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 16H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .121-.393zM3.81.563A1.5 1.5 0 0 1 4.98 0h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1-.78.624l-3.7-4.624A.5.5 0 0 0 11.02 1H4.98a.5.5 0 0 0-.39.188L.89 5.812a.5.5 0 1 1-.78-.624L3.81.563z" />
																								<path fill-rule="evenodd"
																									d="M.125 5.17A.5.5 0 0 1 .5 5H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0A.5.5 0 0 1 10 5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 10H1.883A1.5 1.5 0 0 1 .394 8.686l-.39-3.124a.5.5 0 0 1 .121-.393z" />
																							</svg><?php echo lang('batch_delivery'); ?></button> -->
																					</div>
																				</form>
																				<div class="table-responsive">
																					<table class="table  table-bordered mt-1 text-center"
																						id="tborders">
																						<thead>
																							<tr>
																								<th><?php echo lang('all_products'); ?>
																								</th>
																								<th><?php echo lang('all_orders_price'); ?>
																								</th>
																								
																								<th>
																									<select type="button" id="shippingSort3_1">
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
																								<th><?php echo lang('action'); ?>
																								<th><?php echo lang('orderDate'); ?>
																								</th>
																							</tr>
																						</thead>
																						<tbody class="tbBodyToShip">
																						</tbody>
																					</table>
																					<table id="tbToshipExport" class="table  table-bordered mt-1 text-center" style="display: none;">
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
																					<tbody  class="tbBodyToShipExport">
																					</tbody>
																				</table>
																				</div>
																			</div>
																		</div>
																	</form>
																	<!-- Order - to ship all form ends -->
																</div>

																<!-- Not Process -->
																<div class="tab-pane" id="toShipNotprocess"
																	aria-labelledby="toShipNotprocess-tab" role="tabpanel">
																	<form novalidate>
																		<div class="row">
																			<!-- Form group -->
																			<div class="col-12">
																				<form class="form-inline">
																					<label>
																						<h3><?php echo lang('orders'); ?>
																						</h3>
																					</label>
																					<div
																						class="form-group floating-label-form-group pull-right">
																						<label
																							for="countby"><?php echo lang('sort_by'); ?></label>
																						<div class="btn-group">
																							<select name="parent" type="button"
																								id="ordersDateFilter_2" data-child-id="id_child"
																								class="dependent-selects__parent btn btn-outline-secondary dropdown-toggle btn-sm"
																								aria-haspopup="true" aria-expanded="false">
																								<option id="orderDateO2N_2"
																									value="orderDateO2N_2"
																									onclick="OrderDateOld2New()">
																									<?php echo lang('order_date_old_to_new'); ?>
																								</option>
																								<option id="orderDateN2O_2"
																									value="orderDateN2O_2"
																									onclick="OrderDatedNew2Old()">
																									<?php echo lang('order_date_new_to_old'); ?>
																								</option>
																							</select>
																						</div>
																						<!-- <button type="button" class="btn btn-info"
																							style="margin-left:20px">
																							<svg width="1em" height="1em" viewBox="0 0 17 17"
																								class="bi bi-inboxes-fill" fill="currentColor"
																								xmlns="http://www.w3.org/2000/svg"
																								style="margin-right:5px">
																								<path fill-rule="evenodd"
																									d="M.125 11.17A.5.5 0 0 1 .5 11H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0 .5.5 0 0 1 .5-.5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 16H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .121-.393zM3.81.563A1.5 1.5 0 0 1 4.98 0h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1-.78.624l-3.7-4.624A.5.5 0 0 0 11.02 1H4.98a.5.5 0 0 0-.39.188L.89 5.812a.5.5 0 1 1-.78-.624L3.81.563z" />
																								<path fill-rule="evenodd"
																									d="M.125 5.17A.5.5 0 0 1 .5 5H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0A.5.5 0 0 1 10 5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 10H1.883A1.5 1.5 0 0 1 .394 8.686l-.39-3.124a.5.5 0 0 1 .121-.393z" />
																							</svg><?php echo lang('batch_delivery'); ?></button> -->

																					</div>
																					<div class="table-responsive">
																						<table class="table  table-bordered mt-1 text-center">
																							<thead>
																								<tr>
																									<th><?php echo lang('all_products'); ?>
																									</th>
																									<th><?php echo lang('all_orders_price'); ?>
																									</th>
																								
																									<th>
																										<select type="button"
																											id="shippingSort3_2">
																											<option
																												value="allShippingNotprocess">
																												<?php echo lang('all_shipping'); ?>
																											</option>
																											<option
																												value="Thailand Post Notprocess">
																												<?php echo lang('thailand_post'); ?>
																											</option>
																											<option
																												value="SCG Express Notprocess">
																												<?php echo lang('scg_express'); ?>
																											</option>
																											<option value="Inter Express Notprocess">
																												<?php echo lang('inter_express'); ?>
																											</option>
																										</select>
																									</th>
																									<th><?php echo lang('action'); ?>
																									<th><?php echo lang('orderDate'); ?>
																									</th>
																								</tr>
																							</thead>
																							<tbody class="tbBodyToShip">
																							</tbody>
																						</table>
																						<table id="tbToshipExport" class="table  table-bordered mt-1 text-center" style="display: none;">
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
																						<tbody  class="tbBodyToShipExport">
																						</tbody>
																					</table>
																					</div>
																				</form>
																			</div>
																		</div>
																	</form>
																	<!-- Order - not process form ends -->
																</div>

																<!-- Processed ! -->
																<div class="tab-pane" id="toShipProcessed" aria-labelledby="toShipProcessed-tab"
																	role="tabpanel">
																	<!-- Order - Processed form starts -->
																	<form novalidate>
																		<div class="row">
																			<!-- Form group -->
																			<div class="col-12">
																				<div class="card-content height-5">
																					<form class="form-inline">
																						<label>
																							<h3 style="text-align:center">
																								<?php echo lang('orders'); ?>
																							</h3>
																						</label>
																						<div
																							class="form-group floating-label-form-group pull-right">
																							<label for="countby"
																								style="margin-left:10px"><?php echo lang('sort_by'); ?></label>
																							<div class="btn-group">
																								<select name="parent" type="button"
																									id="ordersDateFilter_3"
																									data-child-id="id_child"
																									class="dependent-selects__parent btn btn-outline-secondary dropdown-toggle btn-sm"
																									aria-haspopup="true" aria-expanded="false">
																									<option id="orderDateO2N_3"
																										value="orderDateO2N_3"
																										onclick="OrderDateOld2New()">
																										<?php echo lang('order_date_old_to_new'); ?>
																									</option>
																									<option id="orderDateN2O_3"
																										value="orderDateN2O_3"
																										onclick="OrderDatedNew2Old()">
																										<?php echo lang('order_date_new_to_old'); ?>
																									</option>
																								</select>
																							</div>
																							<!-- <button type="button" class="btn btn-info"
																								style="margin-left:20px">
																								<svg width="1em" height="1em"
																									viewBox="0 0 17 17"
																									class="bi bi-inboxes-fill"
																									fill="currentColor"
																									xmlns="http://www.w3.org/2000/svg"
																									style="margin-right:5px">
																									<path fill-rule="evenodd"
																										d="M.125 11.17A.5.5 0 0 1 .5 11H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0 .5.5 0 0 1 .5-.5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 16H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .121-.393zM3.81.563A1.5 1.5 0 0 1 4.98 0h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1-.78.624l-3.7-4.624A.5.5 0 0 0 11.02 1H4.98a.5.5 0 0 0-.39.188L.89 5.812a.5.5 0 1 1-.78-.624L3.81.563z" />
																									<path fill-rule="evenodd"
																										d="M.125 5.17A.5.5 0 0 1 .5 5H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0A.5.5 0 0 1 10 5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 10H1.883A1.5 1.5 0 0 1 .394 8.686l-.39-3.124a.5.5 0 0 1 .121-.393z" />
																								</svg><?php echo lang('batch_delivery'); ?></button> -->
																						</div>
																					</form>
																				</div>
																				<div class="table-responsive">
																					<table class="table  table-bordered mt-1 text-center">
																						<thead>
																							<tr>
																								<th><?php echo lang('all_products'); ?>
																								</th>
																								<th><?php echo lang('all_orders_price'); ?>
																								</th>
																							
																								<th>
																									<select type="button" id="shippingSort3_3">
																										<option value="allShippingProcessed">
																											<?php echo lang('all_shipping'); ?>
																										</option>
																										<option value="Thailand Post Processed">
																											<?php echo lang('thailand_post'); ?>
																										</option>
																										<option value="SCG Express Processed">
																											<?php echo lang('scg_express'); ?>
																										</option>
																										<option value="Inter Express Processed">
																											<?php echo lang('inter_express'); ?>
																										</option>
																									</select>
																								</th>
																								<th><?php echo lang('action'); ?>
																								<th><?php echo lang('orderDate'); ?>
																								</th>
																							</tr>
																						</thead>
																						<tbody class="tbBodyToShip">
																						</tbody>
																					</table>
																					<table id="tbToshipExport" class="table  table-bordered mt-1 text-center" style="display: none;">
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
																						<tbody  class="tbBodyToShipExport">
																						</tbody>
																					</table>
																				</div>
																			</div>
																		</div>
																	</form>
																	<!-- Order - Processed form ends -->
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- Order - Have to transport start -->
										</div>
									</form>
								</div>
								<?php $this->load->view('helper/orders/firebase_orders_toship') ?>
								<?php echo js_asset('datePicker/moment.min.js'); ?>
								<?php echo js_asset('datePicker/daterangepicker.js'); ?>
								<script>
									$(function() {
										$('input[name="daterange"]').daterangepicker({
											opens: 'left'
										}, function(start, end, label) {
											console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
										});
									});
								</script>