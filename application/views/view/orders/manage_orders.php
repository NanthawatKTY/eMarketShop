<!-- BEGIN: Content-->

<div class="app-content content">
	<div class="content-overlay"></div>
	<div class="content-wrapper">
		<div class="content-header row">
		</div>
		<div class="content-body">
			<!-- users edit start -->
			<section class="users-edit">
				<div class="card">
					<div class="card-content">
						<div class="card-body">
							<ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist">
								<li class="nav-item">
									<a class=" nav-link d-flex align-items-center tab-orders active" id="allorders-tab"
										data-toggle="tab" href="#allorders" aria-controls="allorders" role="tab" aria-selected="false" onclick="changeUrl('allorders-tab')">
										<span class="d-none d-sm-block"><?php echo lang("all_orders"); ?></span>
									</a>
								</li>
						
								<li class="nav-item">
									<a class="nav-link d-flex align-items-center tab-orders" data-toggle="tab" id="toship-tab"
										href="#toship" aria-controls="toship" role="tab" aria-selected="false" onclick="changeUrl('toship-tab')">
										<span class="d-none d-sm-block"><?php echo lang("shipping"); ?></span>
									</a>
				
								</li>
							
								<li class="nav-item">
									<a class="nav-link d-flex align-items-center tab-orders" id="completed-tab" data-toggle="tab"
										href="#completed" aria-controls="completed" role="tab" aria-selected="false" onclick="changeUrl('completed-tab')">
										<span class="d-none d-sm-block"><?php echo lang("success"); ?></span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link d-flex align-items-center tab-orders" id="cancelled-tab" data-toggle="tab"
										href="#cancelled" aria-controls="cancelled" role="tab" aria-selected="false" onclick="changeUrl('cancelled-tab')">
										<span class="d-none d-sm-block"><?php echo lang("cancellation"); ?></span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link d-flex align-items-center tab-orders" data-toggle="tab"
										data-content="0 คำขอที่ค้างอยู่" data-trigger="hover" data-placement="bottom"
										id="returnlist-tab" href="#returnlist" aria-controls="returnlist" role="tab"
										aria-selected="false" onclick="changeUrl('returnlist-tab')">
										<span class="d-none d-sm-block"><?php echo lang("refund"); echo('/'); echo lang("product_returns");?></span>
									</a>
								</li>
							</ul>
							<div class="tab-content" style="margin-top:20px">

							<!-- All orders !!! -->
								<div class="tab-pane active" id="allorders" aria-labelledby="allorders-tab" role="tabpanel">
									<!-- All orders form starts -->
									<form novalidate>
										<div class="row">
											<div class="col-12 col-sm-6">
												<div class="form-group floating-label-form-group">
													<div class="controls">
														<label><?php echo lang("search_orders"); ?></label>
														<div class="input-group">
															<input type="text" class="form-control col-sm-6"
																placeholder="<?php echo lang('search_ur_orders'); ?>">
															<div class="input-group-append">
																<button id="searchBtn-1" class="btn bg-success bg-accent-3" type="button">
																	<i class="ficon feather icon-search "></i>
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-6">
											<!-- Date Filter -->
												<label><?php echo lang('order_date'); ?></label>
												<div class="form-group floating-label-form-group">
													<div class='input-group form-group'>
														<input type='text'
															class="form-control pickadate-selectors col-sm-4"
															style="height:30px" />
														<div class="input-group-append">
															<span class="input-group-text" style="height:30px">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
														<span
															class="px-1 text-center"><?php echo lang('to_date_period'); ?></span>
														<input type='text'
															class="form-control pickadate-selectors col-sm-4"
															style="height:30px" />
														<div class="input-group-append">
															<span class="input-group-text" style="height:30px">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
														<button type="submit"
															class="btn btn-outline-success mr-1 mb-1 btn-md"
															style="margin-left:10px"><?php echo lang('export'); ?></button>

														<!-- Order Report -->
														<div
															class="dropdown cursor-pointer d-flex justify-content-center align-items-center">
															<span role="button" id="dropdownMenuButton"
																data-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false">
																<button type="button"
																	class="btn btn-outline-secondary mr-1 mb-1 btn-md"
																	data-toggle="popover" data-placement="bottom"
																	data-container="body">
																	<svg width="1em" height="1em" viewBox="0 0 16 16"
																		class="bi bi-justify" fill="currentColor"
																		xmlns="http://www.w3.org/2000/svg">
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
																							<small><?php echo lang('last_report'); ?></small>
																						</th>
																						<th scope="col">
																							<small><?php echo lang('operation'); ?></small>
																						</th>
																					</tr>
																				</thead>
																				<tbody>
																					<tr>
																						<th scope="row"
																							class="align-middle">
																							1fdgdfgfdgfdgfdgdgdgdgddfg
																						</th>
																						<td>
																							<button type="button"
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
																					<svg width="1em" height="1em"
																						viewBox="0 0 16 16"
																						class="bi bi-clipboard-data"
																						fill="currentColor"
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
														<svg width="1em" height="1em" viewBox="0 0 17 17"
															class="bi bi-inboxes-fill" fill="currentColor"
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
																<th><?php echo lang('status'); ?></th>
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
																	</select>
																</th>
																<th><?php echo lang('action'); ?></th>
															</tr>
														</thead>
														<tbody class="tbBody">
															<tr>

															</tr>
															<tr>

															</tr>
															<tr>

															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</form>
									<!-- All orders form ends -->
								</div>

								<!-- *************************************************************************************************************************************************************************************************************** -->

								<!-- Not paid -->
								<div class="tab-pane" id="unpaid" aria-labelledby="unpaid-tab" role="tabpanel">
									<!-- Order - not pay form starts -->
									<form novalidate>
										<div class="row">
											<div class="col-12 col-sm-6">
												<div class="form-group floating-label-form-group">
													<div class="controls">
														<label><?php echo lang('search_orders'); ?></label>

														<div class="input-group">
															<input type="text" class="form-control col-sm-6"
																placeholder="<?php echo lang('search_ur_orders'); ?>">

															<div class="input-group-append">
																<button class="btn bg-success bg-accent-3"
																	type="button">
																	<i class="ficon feather icon-search "></i>
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<label><?php echo lang('order_date'); ?></label>
												<div class="form-group floating-label-form-group">
													<div class='input-group form-group'>
														<input type='text'
															class="form-control pickadate-selectors col-sm-4"
															style="height:30px" />
														<div class="input-group-append">
															<span class="input-group-text" style="height:30px">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
														<span
															class="px-1 text-center"><?php echo lang('to_date_period'); ?></span>
														<input type='text'
															class="form-control pickadate-selectors col-sm-4"
															style="height:30px" />
														<div class="input-group-append">
															<span class="input-group-text" style="height:30px">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
														<button type="submit"
															class="btn btn-outline-success mr-1 mb-1 btn-md"
															style="margin-left:10px"><?php echo lang('export'); ?></button>

														<!-- Order Report -->
														<div
															class="dropdown cursor-pointer d-flex justify-content-center align-items-center">
															<span role="button" id="dropdownMenuButton"
																data-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false">
																<button type="button"
																	class="btn btn-outline-secondary mr-1 mb-1 btn-md"
																	data-toggle="popover" data-placement="bottom"
																	data-container="body">
																	<svg width="1em" height="1em" viewBox="0 0 16 16"
																		class="bi bi-justify" fill="currentColor"
																		xmlns="http://www.w3.org/2000/svg">
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
																						<th scope="row"
																							class="align-middle">
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
																					<svg width="1em" height="1em"
																						viewBox="0 0 16 16"
																						class="bi bi-clipboard-data"
																						fill="currentColor"
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
														<svg width="1em" height="1em" viewBox="0 0 17 17"
															class="bi bi-inboxes-fill" fill="currentColor"
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
																<th><?php echo lang('status'); ?></th>
																<th>
																	<select type="button" id="shippingSort2">
																		<option value="allShipping">
																			<?php echo lang('all_shipping'); ?>
																		</option>
																		<option value="Thailand Post">
																			<?php echo lang('thailand_post'); ?>
																		</option>
																		<option value="SCG Express">
																			<?php echo lang('scg_express'); ?>
																		</option>
																	</select>
																</th>
																<th><?php echo lang('action'); ?></th>
															</tr>
														</thead>
														<tbody class="tbBody">
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</form>
									<!-- Order - not pay form ends -->
								</div>

								<!-- ************************************************************************************************************************************************************************************************************************* -->

								<!-- Have to ship -->
								<div class="tab-pane" id="toship" aria-labelledby="toship-tab" role="tabpanel">
									<!-- Order - to ship start -->
									<form novalidate>
										<div class="row">
											<div class="col-12 col-sm-6">
												<div class="form-group floating-label-form-group">
													<div class="controls">
														<label><?php echo lang('search_orders'); ?></label>

														<div class="input-group">
															<input type="text" class="form-control col-sm-6"
																placeholder="<?php echo lang('search_ur_orders'); ?>">

															<div class="input-group-append">
																<button class="btn bg-success bg-accent-3"
																	type="button">
																	<i class="ficon feather icon-search "></i>
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<label><?php echo lang('order_date'); ?></label>
												<div class="form-group floating-label-form-group">
													<div class='input-group form-group'>
														<input type='text'
															class="form-control pickadate-selectors col-sm-4"
															style="height:30px" />
														<div class="input-group-append">
															<span class="input-group-text" style="height:30px">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
														<span
															class="px-1 text-center"><?php echo lang('to_date_period'); ?></span>
														<input type='text'
															class="form-control pickadate-selectors col-sm-4"
															style="height:30px" />
														<div class="input-group-append">
															<span class="input-group-text" style="height:30px">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
														<button type="submit"
															class="btn btn-outline-success mr-1 mb-1 btn-md"
															style="margin-left:10px"><?php echo lang('export'); ?></button>

														<!-- Order Report -->
														<div
															class="dropdown cursor-pointer d-flex justify-content-center align-items-center">
															<span role="button" id="dropdownMenuButton"
																data-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false">
																<button type="button"
																	class="btn btn-outline-secondary mr-1 mb-1 btn-md"
																	data-toggle="popover" data-placement="bottom"
																	data-container="body">
																	<svg width="1em" height="1em" viewBox="0 0 16 16"
																		class="bi bi-justify" fill="currentColor"
																		xmlns="http://www.w3.org/2000/svg">
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
																						<th scope="row"
																							class="align-middle">
																							1fdgdfgfdgfdgfdgdgdgdgddfg
																						</th>
																						<td><button type="button"
																								class="btn btn-info"><?php echo lang('other'); ?></button>
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
																					<svg width="1em" height="1em"
																						viewBox="0 0 16 16"
																						class="bi bi-clipboard-data"
																						fill="currentColor"
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

											<!-- Nav tab -->
											<div class="col-lg-12">
												<!-- Prevent to หดเข้าใน -->
												<div class="card">
													<div class="card-content">
														<div class="card-body">
															<ul class="nav nav-tabs nav-top-border no-hover-bg"
																role="tablist">
																<li class="nav-item">
																	<a class=" nav-link d-flex align-items-center tab-orders active"
																		id="toShipOrders-tab" data-toggle="tab" value="toShipOrders"
																		href="#toShipOrders" aria-controls="toShipOrders"
																		role="tab" aria-selected="true" onclick="changeUrl('toShipOrders-tab')">
																		<span class="d-none d-sm-block"><?php echo lang('all_tab'); ?></span>
																	</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link d-flex align-items-center tab-orders"
																		id="toShipNotprocess-tab" data-toggle="tab" value="toShipNotprocess"
																		href="#toShipNotprocess" aria-controls="toShipNotprocess"
																		role="tab" aria-selected="false" onclick="changeUrl('toShipNotprocess-tab')">
																		<span class="d-none d-sm-block"><?php echo lang('not_processed_tab'); ?></span>
																	</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link d-flex align-items-center tab-orders"
																		id="toShipProcessed-tab" data-toggle="tab" value="toShipProcessed"
																		href="#toShipProcessed" aria-controls="toShipProcessed"
																		role="tab" aria-selected="false" onclick="changeUrl('toShipProcessed-tab')">
																		<span class="d-none d-sm-block"><?php echo lang('processed_tab'); ?></span>
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
																					<div class="form-group floating-label-form-group pull-right">
																						<label for="countby"><?php echo lang('sort_by'); ?></label>
																						<div class="btn-group">
																							<select name="parent"
																								type="button" id="ordersDateFilter_1"
																								data-child-id="id_child"
																								class="dependent-selects__parent btn btn-outline-secondary dropdown-toggle btn-sm"
																								aria-haspopup="true"
																								aria-expanded="false">
																								<!-- <option id="deliverO2N_1" value="deliverO2N_1" onclick="ordersDateFilter('deliverO2N_1')" >
																									<?php //echo lang('delivery_old_to_new'); ?>
																								</option>
																								<option id="deliverN2O_1" value="deliverN2O_1" onclick="ordersDateFilter('deliverN2O_1')" >
																									<?php //echo lang('delivery_new_to_old'); ?>
																								</option> -->
																								<option id="orderDateO2N_1" value="orderDateO2N_1" onclick="ordersDateFilter('orderDateO2N_1')" >
																									<?php echo lang('order_date_old_to_new'); ?>
																								</option> 
																								<option id="orderDateN2D_1" value="orderDateN2O_1" onclick="ordersDateFilter('orderDateN2O_1')" >
																									<?php echo lang('order_date_new_to_old'); ?>
																								</option>
																							</select>
																						</div>
																						<button type="button"
																							class="btn btn-info"
																							style="margin-left:20px">
																							<svg width="1em"
																								height="1em"
																								viewBox="0 0 17 17"
																								class="bi bi-inboxes-fill"
																								fill="currentColor"
																								xmlns="http://www.w3.org/2000/svg"
																								style="margin-right:5px">
																								<path
																									fill-rule="evenodd"
																									d="M.125 11.17A.5.5 0 0 1 .5 11H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0 .5.5 0 0 1 .5-.5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 16H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .121-.393zM3.81.563A1.5 1.5 0 0 1 4.98 0h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1-.78.624l-3.7-4.624A.5.5 0 0 0 11.02 1H4.98a.5.5 0 0 0-.39.188L.89 5.812a.5.5 0 1 1-.78-.624L3.81.563z" />
																								<path
																									fill-rule="evenodd"
																									d="M.125 5.17A.5.5 0 0 1 .5 5H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0A.5.5 0 0 1 10 5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 10H1.883A1.5 1.5 0 0 1 .394 8.686l-.39-3.124a.5.5 0 0 1 .121-.393z" />
																							</svg><?php echo lang('batch_delivery'); ?></button>
																					</div>
																				</form>
																				<div class="table-responsive">
																					<table
																						class="table  table-bordered mt-1 text-center"
																						id="tborders">
																						<thead>
																							<tr>
																								<th><?php echo lang('all_products'); ?>
																								</th>
																								<th><?php echo lang('all_orders_price'); ?>
																								</th>
																								<th><?php echo lang('status'); ?>
																								</th>
																								<th>
																								<select type="button" id="shippingSort3_1">
																										<option
																											value="allShipping">
																											<?php echo lang('all_shipping'); ?>
																										</option>
																										<option
																											value="Thailand Post">
																											<?php echo lang('thailand_post'); ?>
																										</option>
																										<option
																											value="SCG Express">
																											<?php echo lang('scg_express'); ?>
																										</option>
																								</select>
																								</th>
																								<th><?php echo lang('action'); ?>
																								</th>
																							</tr>
																						</thead>
																						<tbody class="tbBodyReturn">
																						</tbody>
																					</table>
																				</div>
																			</div>
																		</div>
																	</form>
																	<!-- Order - not pay form ends -->
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
																							<select name="parent"
																								type="button" id="ordersDateFilter_2"
																								data-child-id="id_child"
																								class="dependent-selects__parent btn btn-outline-secondary dropdown-toggle btn-sm"
																								aria-haspopup="true"
																								aria-expanded="false">
																								<!-- <option id="deliverO2N_2" value="deliverO2N_2" onclick="deliverOld2New()">
																									<?php //echo lang('delivery_old_to_new'); ?>
																								</option>
																								<option id="deliverN2O_2" value="deliverN2O_2" onclick="deliverNew2Old()">
																									<?php //echo lang('delivery_new_to_old'); ?>
																								</option> -->
																								<option id="orderDateO2N_2" value="orderDateO2N_2" onclick="OrderDateOld2New()">
																									<?php echo lang('order_date_old_to_new'); ?>
																								</option>
																								<option id="orderDateN2O_2" value="orderDateN2O_2" onclick="OrderDatedNew2Old()">
																									<?php echo lang('order_date_new_to_old'); ?>
																								</option>
																							</select>
																						</div>
																						<button type="button"
																							class="btn btn-info"
																							style="margin-left:20px">
																							<svg width="1em"
																								height="1em"
																								viewBox="0 0 17 17"
																								class="bi bi-inboxes-fill"
																								fill="currentColor"
																								xmlns="http://www.w3.org/2000/svg"
																								style="margin-right:5px">
																								<path
																									fill-rule="evenodd"
																									d="M.125 11.17A.5.5 0 0 1 .5 11H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0 .5.5 0 0 1 .5-.5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 16H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .121-.393zM3.81.563A1.5 1.5 0 0 1 4.98 0h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1-.78.624l-3.7-4.624A.5.5 0 0 0 11.02 1H4.98a.5.5 0 0 0-.39.188L.89 5.812a.5.5 0 1 1-.78-.624L3.81.563z" />
																								<path
																									fill-rule="evenodd"
																									d="M.125 5.17A.5.5 0 0 1 .5 5H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0A.5.5 0 0 1 10 5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 10H1.883A1.5 1.5 0 0 1 .394 8.686l-.39-3.124a.5.5 0 0 1 .121-.393z" />
																							</svg><?php echo lang('batch_delivery'); ?></button>

																					</div>
																					<div class="table-responsive">
																						<table
																							class="table  table-bordered mt-1 text-center">
																							<thead>
																								<tr>
																									<th><?php echo lang('all_products'); ?>
																									</th>
																									<th><?php echo lang('all_orders_price'); ?>
																									</th>
																									<th><?php echo lang('status'); ?>
																									</th>
																									<th>
																										<select type="button" id="shippingSort3_2">
																											<option value="allShippingNotprocess">
																												<?php echo lang('all_shipping'); ?>
																											</option>
																											<option value="Thailand Post Notprocess">
																												<?php echo lang('thailand_post'); ?>
																											</option>
																											<option value="SCG Express Notprocess">
																												<?php echo lang('scg_express'); ?>
																											</option>
																										</select>
																									</th>
																									<th><?php echo lang('action'); ?>
																									</th>
																								</tr>
																							</thead>
																							<tbody class="tbBodyReturn">
																							</tbody>
																						</table>
																					</div>
																				</form>
																			</div>
																		</div>
																	</form>
																	<!-- Order - not pay form ends -->
																</div>

																<!-- Processed ! -->
																<div class="tab-pane" id="toShipProcessed"
																	aria-labelledby="toShipProcessed-tab" role="tabpanel">
																	<!-- Order - not process form starts -->
																	<form novalidate>
																		<div class="row">
																			<!-- Form group -->
																			<div class="col-12">
																				<div class="card-content height-5">
																					<form class="form-inline">
																						<label>
																							<h3
																								style="text-align:center">
																								<?php echo lang('orders'); ?>
																							</h3>
																						</label>
																						<div
																							class="form-group floating-label-form-group pull-right">
																							<!-- <label
																								for="selectbranch"><?php echo lang('choose_branch'); ?></label>
																							<div class="btn-group">
																								<select type="button"
																									style="margin-left:5px"
																									name="parent"
																									id="id_parent"
																									data-child-id="id_child"
																									class="dependent-selects__parent btn btn-outline-secondary dropdown-toggle btn-sm"
																									aria-haspopup="true"
																									aria-expanded="false">
																									<option id="" value="1">
																										<?php echo lang('all_orders'); ?>
																									</option>
																									<option value="2">
																										<?php echo lang('ship_at_branch'); ?>
																									</option>
																								</select>
																							</div> -->
																							<label for="countby"
																								style="margin-left:10px"><?php echo lang('sort_by'); ?></label>
																							<div class="btn-group">
																								<select name="parent"
																									type="button" id="ordersDateFilter_3"
																									data-child-id="id_child"
																									class="dependent-selects__parent btn btn-outline-secondary dropdown-toggle btn-sm"
																									aria-haspopup="true"
																									aria-expanded="false">
																									<!-- <option id="deliverO2N_3" value="deliverO2N_3" onclick="deliverOld2New()">
																										<?php //echo lang('delivery_old_to_new'); ?>
																									</option>
																									<option id="deliverN2O_3" value="deliverN2O_3" onclick="deliverNew2Old()">
																										<?php //echo lang('delivery_new_to_old'); ?>
																									</option> -->
																									<option id="orderDateO2N_3" value="orderDateO2N_3" onclick="OrderDateOld2New()">
																										<?php echo lang('order_date_old_to_new'); ?>
																									</option>
																									<option id="orderDateN2O_3" value="orderDateN2O_3" onclick="OrderDatedNew2Old()">
																										<?php echo lang('order_date_new_to_old'); ?>
																									</option>
																								</select>
																							</div>
																							<button type="button"
																								class="btn btn-info"
																								style="margin-left:20px">
																								<svg width="1em"
																									height="1em"
																									viewBox="0 0 17 17"
																									class="bi bi-inboxes-fill"
																									fill="currentColor"
																									xmlns="http://www.w3.org/2000/svg"
																									style="margin-right:5px">
																									<path
																										fill-rule="evenodd"
																										d="M.125 11.17A.5.5 0 0 1 .5 11H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0 .5.5 0 0 1 .5-.5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 16H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .121-.393zM3.81.563A1.5 1.5 0 0 1 4.98 0h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1-.78.624l-3.7-4.624A.5.5 0 0 0 11.02 1H4.98a.5.5 0 0 0-.39.188L.89 5.812a.5.5 0 1 1-.78-.624L3.81.563z" />
																									<path
																										fill-rule="evenodd"
																										d="M.125 5.17A.5.5 0 0 1 .5 5H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0A.5.5 0 0 1 10 5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 10H1.883A1.5 1.5 0 0 1 .394 8.686l-.39-3.124a.5.5 0 0 1 .121-.393z" />
																								</svg><?php echo lang('batch_delivery'); ?></button>
																						</div>
																					</form>
																				</div>
																				<div class="table-responsive">
																					<table
																						class="table  table-bordered mt-1 text-center">
																						<thead>
																							<tr>
																								<th><?php echo lang('all_products'); ?>
																								</th>
																								<th><?php echo lang('all_orders_price'); ?>
																								</th>
																								<th><?php echo lang('status'); ?>
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
																									</select>
																								</th>
																								<th><?php echo lang('action'); ?>
																								</th>
																							</tr>
																						</thead>
																						<tbody class="tbBodyReturn">
																						</tbody>
																					</table>
																				</div>
																			</div>
																		</div>
																	</form>
																	<!-- Order - not pay form ends -->
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
									</form>
									<!-- Order - Have to transport start -->
								</div>
								</div>

								<!-- ***************************************************************************************************************************************************************************************************************************** -->

								<!-- Shipping -->
								<div class="tab-pane" id="shipping" aria-labelledby="shipping-tab" role="tabpanel">
									<!-- Order - shipping form starts -->
									<form novalidate>
										<div class="row">
											<div class="col-12 col-sm-6">
												<div class="form-group floating-label-form-group">
													<div class="controls">
														<label><?php echo lang('search_orders'); ?></label>

														<div class="input-group">
															<input type="text" class="form-control col-sm-6"
																placeholder="<?php echo lang('search_ur_orders'); ?>">

															<div class="input-group-append">
																<button class="btn bg-success bg-accent-3" type="button">
																	<i class="ficon feather icon-search "></i>
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<label><?php echo lang('order_date'); ?></label>
												<div class="form-group floating-label-form-group">
													<div class='input-group form-group'>
														<input type='text' class="form-control pickadate-selectors col-sm-4"
															style="height:30px" />
														<div class="input-group-append">
															<span class="input-group-text" style="height:30px">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
														<span
															class="px-1 text-center"><?php echo lang('to_date_period'); ?></span>
														<input type='text' class="form-control pickadate-selectors col-sm-4"
															style="height:30px" />
														<div class="input-group-append">
															<span class="input-group-text" style="height:30px">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
														<button type="submit"
															class="btn btn-outline-success mr-1 mb-1 btn-md"
															style="margin-left:10px"><?php echo lang('export'); ?></button>

														<!-- Order Report -->
														<div
															class="dropdown cursor-pointer d-flex justify-content-center align-items-center">
															<span role="button" id="dropdownMenuButton"
																data-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false">
																<button type="button"
																	class="btn btn-outline-secondary mr-1 mb-1 btn-md"
																	data-toggle="popover" data-placement="bottom"
																	data-container="body">
																	<svg width="1em" height="1em" viewBox="0 0 16 16"
																		class="bi bi-justify" fill="currentColor"
																		xmlns="http://www.w3.org/2000/svg">
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
																						<th scope="row"
																							class="align-middle">
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
																					<svg width="1em" height="1em"
																						viewBox="0 0 16 16"
																						class="bi bi-clipboard-data"
																						fill="currentColor"
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
														<svg width="1em" height="1em" viewBox="0 0 17 17"
															class="bi bi-inboxes-fill" fill="currentColor"
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
																<th><?php echo lang('status'); ?></th>
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
																	</select>
																</th>
																<th><?php echo lang('action'); ?></th>
															</tr>
														</thead>
														<tbody class="tbBody">
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</form>
									<!-- Order - not pay form ends -->
								</div>

								<!-- ***************************************************************************************************************************************************************************************************************************** -->

								<!-- Completed -->
								<div class="tab-pane" id="completed" aria-labelledby="completed-tab" role="tabpanel">
									<!-- Order - completed form starts -->
									<form novalidate>
										<div class="row">
											<div class="col-12 col-sm-6">
												<div class="form-group floating-label-form-group">
													<div class="controls">
														<label><?php echo lang('search_orders'); ?></label>

														<div class="input-group">
															<input type="text" class="form-control col-sm-6"
																placeholder="<?php echo lang('search_ur_orders'); ?>">

															<div class="input-group-append">
																<button class="btn bg-success bg-accent-3" type="button">
																	<i class="ficon feather icon-search "></i>
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<label><?php echo lang('order_date'); ?></label>
												<div class="form-group floating-label-form-group">
													<div class='input-group form-group'>
														<input type='text' class="form-control pickadate-selectors col-sm-4"
															style="height:30px" />
														<div class="input-group-append">
															<span class="input-group-text" style="height:30px">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
														<span
															class="px-1 text-center"><?php echo lang('to_date_period'); ?></span>
														<input type='text' class="form-control pickadate-selectors col-sm-4"
															style="height:30px" />
														<div class="input-group-append">
															<span class="input-group-text" style="height:30px">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
														<button type="submit"
															class="btn btn-outline-success mr-1 mb-1 btn-md"
															style="margin-left:10px"><?php echo lang('export'); ?></button>

														<!-- Order Report -->
														<div
															class="dropdown cursor-pointer d-flex justify-content-center align-items-center">
															<span role="button" id="dropdownMenuButton"
																data-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false">
																<button type="button"
																	class="btn btn-outline-secondary mr-1 mb-1 btn-md"
																	data-toggle="popover" data-placement="bottom"
																	data-container="body">
																	<svg width="1em" height="1em" viewBox="0 0 16 16"
																		class="bi bi-justify" fill="currentColor"
																		xmlns="http://www.w3.org/2000/svg">
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
																						<th scope="row"
																							class="align-middle">
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
																					<svg width="1em" height="1em"
																						viewBox="0 0 16 16"
																						class="bi bi-clipboard-data"
																						fill="currentColor"
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
														<svg width="1em" height="1em" viewBox="0 0 17 17"
															class="bi bi-inboxes-fill" fill="currentColor"
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
																<th><?php echo lang('status'); ?></th>
																<th>
																	<select type="button" id="shippingSort5">
																		<option value="allShipping">
																			<?php echo lang('all_shipping'); ?>
																		</option>
																		<option value="Thailand Post">
																			<?php echo lang('thailand_post'); ?>
																		</option>
																		<option value="SCG Express">
																			<?php echo lang('scg_express'); ?>
																		</option>
																	</select>
																</th>
																<th><?php echo lang('action'); ?></th>
															</tr>
														</thead>
														<tbody class="tbBody">
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</form>
									<!-- Order - not pay form ends -->
								</div>

								<!-- ***************************************************************************************************************************************************************************************************************************** -->

								<!-- Cancelled -->
								<div class="tab-pane" id="cancelled" aria-labelledby="cancelled-tab" role="tabpanel">
									<!-- Order - cancelled form starts -->
									<form novalidate>
										<div class="row">
											<div class="col-12 col-sm-6">
												<div class="form-group floating-label-form-group">
													<div class="controls">
														<label><?php echo lang('search_orders'); ?></label>

														<div class="input-group">
															<input type="text" class="form-control col-sm-6"
																placeholder="<?php echo lang('search_ur_orders'); ?>">

															<div class="input-group-append">
																<button class="btn bg-success bg-accent-3" type="button">
																	<i class="ficon feather icon-search "></i>
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<label><?php echo lang('order_date'); ?></label>
												<div class="form-group floating-label-form-group">
													<div class='input-group form-group'>
														<input type='text' class="form-control pickadate-selectors col-sm-4"
															style="height:30px" />
														<div class="input-group-append">
															<span class="input-group-text" style="height:30px">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
														<span
															class="px-1 text-center"><?php echo lang('to_date_period'); ?></span>
														<input type='text' class="form-control pickadate-selectors col-sm-4"
															style="height:30px" />
														<div class="input-group-append">
															<span class="input-group-text" style="height:30px">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
														<button type="submit"
															class="btn btn-outline-success mr-1 mb-1 btn-md"
															style="margin-left:10px"><?php echo lang('export'); ?></button>

														<!-- Order Report -->
														<div
															class="dropdown cursor-pointer d-flex justify-content-center align-items-center">
															<span role="button" id="dropdownMenuButton"
																data-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false">
																<button type="button"
																	class="btn btn-outline-secondary mr-1 mb-1 btn-md"
																	data-toggle="popover" data-placement="bottom"
																	data-container="body">
																	<svg width="1em" height="1em" viewBox="0 0 16 16"
																		class="bi bi-justify" fill="currentColor"
																		xmlns="http://www.w3.org/2000/svg">
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
																						<th scope="row"
																							class="align-middle">
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
																					<svg width="1em" height="1em"
																						viewBox="0 0 16 16"
																						class="bi bi-clipboard-data"
																						fill="currentColor"
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
														<svg width="1em" height="1em" viewBox="0 0 17 17"
															class="bi bi-inboxes-fill" fill="currentColor"
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
																<th><?php echo lang('status'); ?></th>
																<th>
																	<select type="button" id="shippingSort6">
																		<option value="allShipping">
																			<?php echo lang('all_shipping'); ?>
																		</option>
																		<option value="Thailand Post">
																			<?php echo lang('thailand_post'); ?>
																		</option>
																		<option value="SCG Express">
																			<?php echo lang('scg_express'); ?>
																		</option>
																	</select>
																</th>
																<th><?php echo lang('action'); ?></th>
															</tr>
														</thead>
														<tbody class="tbBody">
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</form>
									<!-- Order - not pay form ends -->
								</div>

								<!-- ************************************************************************************************************************************************************************************************************************* -->

								<!-- Return lists -->
								<div class="tab-pane" id="returnlist" aria-labelledby="returnlist-tab" role="tabpanel">
									<!-- Order - to ship start -->
									<form novalidate>
										<div class="row">
											<div class="col-12 col-sm-6">
												<div class="form-group floating-label-form-group">
													<div class="controls">
														<label><?php echo lang('search_orders'); ?></label>

														<div class="input-group">
															<input type="text" class="form-control col-sm-6"
																placeholder="<?php echo lang('search_ur_orders'); ?>">

															<div class="input-group-append">
																<button class="btn bg-success bg-accent-3" type="button">
																	<i class="ficon feather icon-search "></i>
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<label><?php echo lang('order_date'); ?></label>
												<div class="form-group floating-label-form-group">
													<div class='input-group form-group'>
														<input type='text' class="form-control pickadate-selectors col-sm-4"
															style="height:30px" />
														<div class="input-group-append">
															<span class="input-group-text" style="height:30px">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
														<span
															class="px-1 text-center"><?php echo lang('to_date_period'); ?></span>
														<input type='text' class="form-control pickadate-selectors col-sm-4"
															style="height:30px" />
														<div class="input-group-append">
															<span class="input-group-text" style="height:30px">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
														<button type="submit"
															class="btn btn-outline-success mr-1 mb-1 btn-md"
															style="margin-left:10px"><?php echo lang('export'); ?></button>

														<!-- Order Report -->
														<div
															class="dropdown cursor-pointer d-flex justify-content-center align-items-center">
															<span role="button" id="dropdownMenuButton"
																data-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false">
																<button type="button"
																	class="btn btn-outline-secondary mr-1 mb-1 btn-md"
																	data-toggle="popover" data-placement="bottom"
																	data-container="body">
																	<svg width="1em" height="1em" viewBox="0 0 16 16"
																		class="bi bi-justify" fill="currentColor"
																		xmlns="http://www.w3.org/2000/svg">
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
																						<th scope="row"
																							class="align-middle">
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
																					<svg width="1em" height="1em"
																						viewBox="0 0 16 16"
																						class="bi bi-clipboard-data"
																						fill="currentColor"
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

											<!-- Nav tab -->
											<div class="col-lg-12">
												<!-- Prevent to หดเข้าใน -->
												<div class="card">
													<div class="card-content">
														<div class="card-body">
															<ul class="nav nav-tabs nav-top-border no-hover-bg"
																role="tablist">
																<li class="nav-item">
																	<a class="nav-link d-flex align-items-center tab-orders active"
																		id="returnAllorders2-tab" value="returnAllorders2" data-toggle="tab"
																		href="#returnAllorders2" aria-controls="returnAllorders2"
																		role="tab" aria-selected="true" onclick="changeUrl('returnAllorders2-tab')">
																		<span class="d-none d-sm-block"><?php echo lang('all_tab'); ?></span>
																	</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link d-flex align-items-center tab-orders"
																		id="returnNotprocess2-tab" value="returnNotprocess2" data-toggle="tab"
																		href="#returnNotprocess2" aria-controls="returnNotprocess2"
																		role="tab" aria-selected="false" onclick="changeUrl('returnNotprocess2-tab')">
																		<span class="d-none d-sm-block"><?php echo lang('not_processed_tab'); ?></span>
																	</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link d-flex align-items-center tab-orders" type="button"
																		id="returnProcessed2-tab" value="returnProcessed2" data-toggle="tab"
																		href="#returnProcessed2" aria-controls="returnProcessed2"
																		role="tab" aria-selected="false" onclick="changeUrl('returnProcessed2-tab')">
																		<span class="d-none d-sm-block"><?php echo lang('processed_tab'); ?></span>
																	</a>
																</li>
															</ul>
															<div class="tab-content" style="margin-top:15px">
																<div class="tab-pane active" id="returnAllorders2"
																	aria-labelledby="returnAllorders2-tab" role="tabpanel">
																	<!-- Order - not pay form starts -->
																	<form novalidate>
																		<div class="row">
																			<!-- Form group -->
																			<div class="col-12">
																				<label>
																					<h3><?php echo lang('orders'); ?></h3>
																				</label>
																				<button type="button"
																					class="btn btn-info pull-right">
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
																					</svg><?php echo lang('batch_delivery'); ?></button>
																				<div class="table-responsive">
																					<table
																						class="table  table-bordered mt-1 text-center">
																						<thead>
																							<tr>
																								<th><?php echo lang('all_products'); ?>
																								</th>
																								<th><?php echo lang('all_orders_price'); ?>
																								</th>
																								<th><?php echo lang('status'); ?>
																								</th>
																								<th>
																									<select type="button"
																										id="shippingSort7_1">
																										<option
																											value="allShipping">
																											<?php echo lang('all_shipping'); ?>
																										</option>
																										<option
																											value="Thailand Post">
																											<?php echo lang('thailand_post'); ?>
																										</option>
																										<option
																											value="SCG Express">
																											<?php echo lang('scg_express'); ?>
																										</option>
																									</select>
																								</th>
																								<th><?php echo lang('action'); ?>
																								</th>
																							</tr>
																						</thead>
																						<tbody class="tbBodyReturn">
																						</tbody>
																					</table>
																				</div>
																			</div>
																		</div>
																	</form>
																	<!-- Order - not pay form ends -->
																</div>

																<!-- Not Process -->
																<div class="tab-pane" id="returnNotprocess2"
																	aria-labelledby="returnNotprocess2-tab" role="tabpanel">
																	<!-- Order - not process form starts -->
																	<form novalidate>
																		<div class="row">
																			<!-- Form group -->
																			<div class="col-12">
																				<label>
																					<h3><?php echo lang('orders'); ?></h3>
																				</label>
																				<button type="button"
																					class="btn btn-info pull-right">
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
																					</svg><?php echo lang('batch_delivery'); ?></button>

																				<div class="table-responsive">
																					<table
																						class="table  table-bordered mt-1 text-center">
																						<thead>
																							<tr>
																								<th><?php echo lang('all_products'); ?>
																								</th>
																								<th><?php echo lang('all_orders_price'); ?>
																								</th>
																								<th><?php echo lang('status'); ?>
																								</th>
																								<th>
																									<select type="button"
																										id="shippingSort7_2">
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
																									</select>
																								</th>
																								<th><?php echo lang('action'); ?>
																								</th>
																							</tr>
																						</thead>
																						<tbody class="tbBodyReturn">
																						</tbody>
																					</table>
																				</div>
																			</div>
																		</div>
																	</form>
																	<!-- Order - not pay form ends -->
																</div>

																<!-- Proceed ! -->
																<div class="tab-pane" id="returnProcessed2"
																	aria-labelledby="returnProcessed2-tab" role="tabpanel">
																	<!-- Order - not process form starts -->
																	<form novalidate>
																		<div class="row">
																			<!-- Form group -->
																			<div class="col-12">
																				<div class="card-content height-5">
																					<label>
																						<h3><?php echo lang('orders'); ?>
																						</h3>
																					</label>
																					<button type="button"
																						class="btn btn-info pull-right">
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
																						</svg><?php echo lang('batch_delivery'); ?></button>
																				</div>
																				<div class="table-responsive">
																					<table
																						class="table  table-bordered mt-1 text-center">
																						<thead>
																							<tr>
																								<th><?php echo lang('all_products'); ?>
																								</th>
																								<th><?php echo lang('all_orders_price'); ?>
																								</th>
																								<th><?php echo lang('status'); ?>
																								</th>
																								<th>
																									<select type="button"
																										id="shippingSort7_3">
																										<option
																											value="allShippingProcessed">
																											<?php echo lang('all_shipping'); ?>
																										</option>
																										<option
																											value="Thailand Post Processed">
																											<?php echo lang('thailand_post'); ?>
																										</option>
																										<option
																											value="SCG Express Processed">
																											<?php echo lang('scg_express'); ?>
																										</option>
																									</select>
																								</th>
																								<th><?php echo lang('action'); ?>
																								</th>
																							</tr>
																						</thead>
																						<tbody class="tbBodyReturn">
																						</tbody>
																					</table>
																				</div>
																			</div>
																		</div>
																	</form>
																	<!-- Order - not pay form ends -->
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
									</form>
									<!-- Order - Have to transport start -->
								</div>
								</div>
							</div>
			</section>
			<!-- users edit ends -->
		</div>
	</div>
</div>
<!-- END: Content-->
<?php $this->load->view('helper/orders/firebase_orders') ?>