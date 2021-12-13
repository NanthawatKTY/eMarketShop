<!-- Scripts -->
	<?php echo js_asset('pdfMake/pdfmake.min.js'); ?>
	<?php echo js_asset('pdfMake/vfs_fonts.js'); ?>
	<?php $this->load->view('helper/orders/firebase_orderDetail') ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<!-- Scripts -->



<!-- BEGIN: Content-->
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-body">
			<!-- Card header options section start -->
			<section id="card-header-options">
				<div class="row">
						<div class="col col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><i class="feather icon-clipboard"></i><?php echo lang('order_numbers')?></h4>
								</div>
								<div class="card-header">
									<h4 class="card-title"><?php echo lang('customer_wait')?></h4>
								</div>
								<div class="card-content padding-bt-card">
									<div class="col col-sm-12">
										<div class="card-body bg-card" >					
											<form  class="form-inline floating-label-form-group" id="form_orderDetails_edit">
													<label class="align-center"><i class="feather icon-chevrons-right"></i>
													<?php echo lang('thing_can_do')?></label> 

													<!-- Update status button  -->										
														<div id="updateProcess" class="form-group floating-label-form-group margin-right-auto" style="display: none" >	
															<select id="orderProcessing" class="form-control dropdown" style="margin-left:20px">	
																<option  type="" value="not processed"><?php echo lang('notprocess')?></option>
																<option  type="" value="processing"><?php echo lang('processing')?></option>
															</select>	

															<div class="btn-group">
																<button id="status_update_btn" type="submit" class="btn btn-cancel-order submit-status" style="margin-left:20px"><i class="fa fa-check-square-o"><?php echo lang('submit')?></i></button>                                                
															</div>
														</div>
														<!-- Update status button  End-->
												

													<div class="form-group floating-label-form-group margin-left-auto" >

													<!-- Cancel BTN -->
														<div class="btn-group">
															<button id="cancelBtn" type="button" class="btn btn-cancel-order btn-danger" style="margin-left:20px" href="" onclick="isActiveStatus(false)" ><?php echo lang('cancel_order')?></button>                                                
														</div>
													<!-- Cancel BTN End -->

														<!-- <div class="btn-group">
															<button type="button" class="btn btn-cancel-order" style="margin-left:20px"><?php echo lang('see_more_shipping_detail')?></button>
														</div> -->
													</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>	
						<div class="col col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><i class="feather icon-hash" style="margin-right:5px"></i><?php echo lang('order_numbers')?></h4>
								</div>
								<div class="card-content card-order-position ">
									<div class="card-body card-order-position">
										<p class="card-text" id="order-no"></p>
									</div>
								</div>
								<div class="card-header">
									<h4 class="card-title"><i class="feather icon-map-pin" style="margin-right:5px"></i><?php echo lang('address')?></h4>
								</div>
								<div class="card-content card-order-position">
									<div class="card-body card-order-position">
										<p class="card-text shippingAddress"></p>
									</div>
								</div>
								<div class="card-header">
									<h4 class="card-title" > <i class="fa fa-truck" style="margin-right:5px"></i><?php echo lang('ship_info')?></h4>
								</div>
								<div class="card-content card-order-position">
									<div class="card-body card-order-position">	
										<form calss="form-inline">							
											<div class="form-group mr-2">
												<label><p class="card-text shippingInfo"></p></label>

												<!-- Button trigger modal -->
												<button type="button" id="btn-tracking"  class="btn tag-transport" style="margin-left:20px" data-toggle="modal" data-target=".tagtransport"><i class="feather icon-hash"></i></button>		

												 <!-- Modal -->
												 <div class="modal fade text-left tagtransport" id="printParcelArea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content" id="myfrm">
															
															<div class="modal-header bg-warning">
																<h4 class="modal-title" id="myModalLabel1"><?php echo lang('pickup_detail')?></h4>
																<button type="button" class="close"  onclick="closeModal(this)" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>

															<!-- Show details Start -->
															<div id="ordersDetailsParcel">
																<div class="modal-body">
																	<p class="shippingInfoModal"></p>
																	<p class="trackingModal"></p>
																	<hr>
																	<h5 class="text-black-50"><?php echo lang('date')?></h5>
																	<p class="insertDate"></p>
																	<hr>
																	<h5 class="text-black-50" ><?php echo lang('address')?></h5>
																	<p class="customerNameModal"></p>
																	<p class="customerPhone"></p>
																	<p class="shippingAddressModal"></p>
																	<p class="postCode"></p>	
																</div>	
															</div>
															<!-- Show details End -->

															<!-- No show details but PRINT Start -->
															<div id="ordersDetailsPrint" style="display: none;">
																
																	<div class="headerParcel">
																		<h1><p class="shippingInfoModal"></p><h1>
																		<h3><p class="trackingModal"></p></h3>
																	</div>
																	<div class="mainParcel">
																	<h3 class="text-black-100" ><?php echo lang('sender')?></h3>
																		<p id="sellerNameParcel"></p>
																		<p id="addressNameParcel"></p>
																		<p id="sellerEmailParcel"></p>
																		<p id="sellerTelParcel"></p>
																	</div>
																	<div class="mainParcel">
																	<h3 class="text-black-100" ><?php echo lang('receiver')?></h3>
																		<p class="customerNameModal"></p>
																		<p class="customerPhone"></p>
																		<p class="shippingAddressModal"></p>
																		<p class="postCode"></p>
																	</div>
																	<div class="footerParcel">
																		<h3><form class="form-inline floating-label-form-group"><?php echo lang('orderDate')?>: <p class="insertDate"></p></form><h3>
																	</div>

																	<div class="feather icon-scissors scissorsSpace">
																	- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
																	</div> 
																	
																	<div class="tableParcel">
																		<div class="table-responsive">
																			<table class="table table-order-list table-sm" id="ordersTB">
																				<thead>
																					<tr class="tr-order-list">
																						<th class="th-order-list" scope="col"><?php echo lang('all_products')?></th>
																						<th class="th-order-list" scope="col"><?php echo lang('price_per_unit')?></th>
																						<th class="th-order-list" scope="col"><?php echo lang('amount')?></th>
																						<th class="th-order-list" scope="col"><?php echo lang('net_price')?></th>
																					</tr>
																				</thead>
																				<tbody class="tbOrders">       
																				</tbody>
																			</table>
																		</div>
																	</div>
																
															</div>
															<!-- No show details but PRINT End -->

															<!-- PRINT Button Start -->
																<div class="modal-footer">
																	<button type="button" href="javascript:void(0);" onclick="printParcel('ordersDetailsPrint')" class="btn grey btn-outline-secondary"><i class="feather icon-printer mr-25 common-size"></i><?php echo lang('print_doc')?></button>
																	<!-- <button id="btnParcel" type="button" class="btn grey btn-outline-secondary" onclick="toGetParcelData(this)"><i class="feather icon-printer mr-25 common-size"></i><?php echo lang('print_doc')?></button> -->
																</div>	
															<!-- PRINT Button End -->
                                                    	</div>
                                                	</div>					                                                
												</div>			
										</form>
									</div>
								</div>
							</div>
						</div>

						<!-- User details start -->
						<div class="col col-sm-12">
							<div class="card">
								<div class="card-header">
									<form class="form-inline floating-label-form-group">
										<div class="form-group mr-2 ">
											<label >
												<div class="avatar avatar-online align-middle"><img src="<?php echo base_url("app-assets/img/user-default.png"); ?>" alt="avatar"><i></i></div>
												<span class="customerName" class="user-name" style="margin-left:10px" ></span>
											</label>
										</div>	
										<!-- <div class="form-group floating-label-form-group pull-right margin-left-auto">	
											<div class="btn-group">
												<button type="button" class="btn btn-follow-color" style="margin-left:20px"><i class="feather icon-plus-square"></i> <?php echo lang('follow')?></button>  
											</div>	      
											<div class="btn-group">                                        										
												<button type="button" class="btn btn-cancel-order" style="margin-left:20px" id="chatToCustomer"><i class="feather icon-message-square"></i> <?php echo lang('chat')?></button>
											</div>
										</div> -->
									</form>
								</div>
							</div>
						</div>
						<!-- User details End -->

						<div class="col col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><i class="fa fa-money"></i> <?php echo lang('pay_detail')?></h4>
								</div>
								<div class="card-content">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-order-list table-sm" id="ordersTB">
												<thead>
													<tr class="tr-order-list">
														<th class="th-order-list" scope="col"><?php echo lang('all_products')?></th>
														<th class="th-order-list" scope="col"><?php echo lang('price_per_unit')?></th>
														<th class="th-order-list" scope="col"><?php echo lang('amount')?></th>
														<th class="th-order-list" scope="col"><?php echo lang('net_price')?></th>
													</tr>
												</thead>
												<tbody class="tbOrders">       
												</tbody>
											</table>
										</div>
										<div id="accordionWrap01" role="tablist" aria-multiselectable="true">
											<div class="card accordion">
												<div id="heading02" class="card-header text-right" data-toggle="collapse" href="#accordion02" aria-expanded="false" aria-controls="accordion02">
													<a class="card-title lead collapsed" href="#"><?php echo lang('pay_detail')?><i class="fa fa-angle-down"></i></a>
												</div>
												<div id="accordion02" role="tabpanel" data-parent="#accordionWrap01" aria-labelledby="heading02" class="collapse" aria-expanded="false">
													<div class="card-content">
														<div class="card-body">
															<div class="table-responsive">
																<table class="table ">
																	<tbody>
																		<tr>
																			<th class="paid"><?php echo lang('total_price')?></th>
																			<td class="paid priceSum"></td>
																		</tr>    
																		<tr>
																			<th class="paid"><?php echo lang('all_ship_price')?></th>
																			<td class="paid shipCost"></td>
																		</tr>  
																		<tr>
																			<th class="paid"><?php echo lang('service_price')?></th>
																			<td class="paid" id="priceService"></td>
																		</tr>   
																		<tr>
																			<th class="paid"><?php echo lang('total_payment')?></th>
																			<td class="paid" id="totalAllPrice"><h3></h3></td>
																		</tr>  
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
						<div class="col col-sm-12">
							<div id="accordionWrap02" role="tablist" aria-multiselectable="true">
								<div class="card">
									<div class="card-header">
										<form class="form-inline">
											<label><i class="fa fa-cart-arrow-down" style="margin-right:5px"></i><h4 class="card-title "><?php echo lang('customer_payment')?></h4></label>
											<div id="heading03" class="card-header text-right margin-left-auto" data-toggle="collapse" href="#accordion03" aria-expanded="false" aria-controls="accordion03">
												<a class="card-title lead collapsed" href="#"><?php echo lang('more_details')?><i class="fa fa-angle-down"></i></a>
											</div>	
										</form>
										<div id="accordion03" role="tabpanel" data-parent="#accordionWrap02" aria-labelledby="heading03" class="collapse" aria-expanded="false">
												<div class="card-content">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table ">
																<tbody>
																	<tr>
																		<th class="paid"><?php echo lang('total_price')?></th>
																		<td class="paid priceSum"></td>
																	</tr>    
																	<tr>
																		<th class="paid"><?php echo lang('all_ship_price')?></th>
																		<td class="paid shipCost"></td>
																	</tr>  
																	<tr>
																		<th class="paid"><?php echo lang('service_price')?></th>
																		<td class="paid" id="priceService_payment"></td>
																	</tr>  
																	<tr>
																		<th class="paid"><?php echo lang('total_payment')?></th>
																		<td class="paid" id="totalAllPrice_payment"><h3></h3></td>
																	</tr>   
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

			</section>
		</div>
	</div>
</div>
<!-- END: Content-->
