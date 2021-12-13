<!-- ***************************************************************************************************************************************************************************************************************************** -->

<!-- Shipping -->
<div class="tab-pane" id="shipping" aria-labelledby="shipping-tab" role="tabpanel" style="display:block">
	<!-- Order - shipping form starts -->
	<form novalidate>
		<div class="row">
			<div class="col-12 col-sm-6">
				<div class="form-group floating-label-form-group">
					<div class="controls">
						<label><?php echo lang('search_orders'); ?></label>
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
			<div class="col-12 col-lg-6">
				<label><?php echo lang('order_date'); ?></label>
				<div class="form-group floating-label-form-group">
					<div class='input-group form-group'>
						<input type='text' class="form-control pickadate-selectors col-sm-4" style="height:30px" />
						<div class="input-group-append">
							<span class="input-group-text" style="height:30px">
								<span class="fa fa-calendar"></span>
							</span>
						</div>
						<span class="px-1 text-center"><?php echo lang('to_date_period'); ?></span>
						<input type='text' class="form-control pickadate-selectors col-sm-4" style="height:30px" />
						<div class="input-group-append">
							<span class="input-group-text" style="height:30px">
								<span class="fa fa-calendar"></span>
							</span>
						</div>
						<button type="submit" class="btn btn-outline-success mr-1 mb-1 btn-md"
							style="margin-left:10px"><?php echo lang('export'); ?></button>

						<!-- Order Report -->
						<div class="dropdown cursor-pointer d-flex justify-content-center align-items-center">
							<span role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<button type="button" class="btn btn-outline-secondary mr-1 mb-1 btn-md"
									data-toggle="popover" data-placement="bottom" data-container="body">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-justify"
										fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd"
											d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
									</svg>
								</button>
							</span>
							<div class="dropdown-menu px-3 py-2">
								<form class="px-3 py-2">
									<div class="form-group">
										<label><?php echo lang('last_report'); ?></label>
										<div class="p-1 mb-1 bg-warning text-dark">
											<h5><small><?php echo lang('not_download_report_yet'); ?></small>
											</h5>
										</div>
									</div>
									<div class="form-group">
										<div class="table-responsive">
											<table class="table table-striped">
												<thead>
													<tr>
														<th scope="col">
															<small><?php echo lang('report_name'); ?></small>
														</th>
														<th scope="col">
															<small><?php echo lang('operation'); ?></small>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<th scope="row" class="align-middle">
															1fdgdfgfdgfdgfdgdgdgdgddfg
														</th>
														<td><button type="button"
																class="btn btn-info"><?php echo lang('download'); ?></button>
														</td>
													</tr>
													</tr>
												</tbody>
											</table>
											<div class="input-group form-group">
												<div class="text-dark">
													<h5><small><?php echo lang('see_more_in'); ?></small>
													</h5>
												</div>
												<button type="button"
													class="btn btn-outline-light btn-min-width btn-sm text-dark"
													style="margin-left:15px" href="#">
													<svg width="1em" height="1em" viewBox="0 0 16 16"
														class="bi bi-clipboard-data" fill="currentColor"
														xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd"
															d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
														<path fill-rule="evenodd"
															d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
														<path
															d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z" />
													</svg>
													<?php echo lang('my_report'); ?>
												</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- End of order report -->
					</div>
				</div>
			</div>
			<div class="col-12">
				<form class="form-inline">
					<label>
						<h3><?php echo lang('orders'); ?></h3>
					</label>
					<button type="button" class="btn btn-info margin-left-auto">
						<svg width="1em" height="1em" viewBox="0 0 17 17" class="bi bi-inboxes-fill" fill="currentColor"
							xmlns="http://www.w3.org/2000/svg" style="margin-right:5px">
							<path fill-rule="evenodd"
								d="M.125 11.17A.5.5 0 0 1 .5 11H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0 .5.5 0 0 1 .5-.5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 16H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .121-.393zM3.81.563A1.5 1.5 0 0 1 4.98 0h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1-.78.624l-3.7-4.624A.5.5 0 0 0 11.02 1H4.98a.5.5 0 0 0-.39.188L.89 5.812a.5.5 0 1 1-.78-.624L3.81.563z" />
							<path fill-rule="evenodd"
								d="M.125 5.17A.5.5 0 0 1 .5 5H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0A.5.5 0 0 1 10 5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 10H1.883A1.5 1.5 0 0 1 .394 8.686l-.39-3.124a.5.5 0 0 1 .121-.393z" />
						</svg><?php echo lang('batch_delivery'); ?></button>
				</form>
				<div class="table-responsive">
					<table class="table  table-bordered mt-1 text-center">
						<thead>
							<tr>
								<th><?php echo lang('all_products'); ?></th>
								<th><?php echo lang('all_orders_price'); ?></th>
					
								<th>
									<select type="button" id="shippingSort4">
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
						<tbody class="tbBodyShipping">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</form>
	<!-- Order - not pay form ends -->
</div>
<?php $this->load->view('helper/orders/firebase_orders_shipping') ?>
<!-- ***************************************************************************************************************************************************************************************************************************** -->

															