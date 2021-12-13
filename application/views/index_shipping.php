<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="apple-touch-icon" href="<?php echo base_url('app-assets/img/ico/apple-icon-120.png'); ?>">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('app-assets/img/ico/favicon2.ico '); ?>">
	<link
		href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
		rel="stylesheet">
	<?php $this->load->view('helper/include'); ?>
	<?php $this->load->view('helper/include_firebase') ?>
	<?php $this->load->view('helper/login/firebase_login'); ?>
	<!-- JQUERY -->
	<?php echo js_asset('vendors/js/vendors.min.js'); ?>
</head>

<body class="vertical-layout vertical-menu 2-columns fixed-navbar" id="main-page" data-open="click"
	data-menu="vertical-menu" data-col="2-columns">
	<?php $this->load->view('header/header_menu') ?>
	<?php $this->load->view('menu/menu') ?>


	<!-- BEGIN: Content-->

	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<!-- users edit start -->
				<!-- <section class="users-edit">
					<div class="card">
						<div class="card-content">
							<div class="card-body">
								<ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist">
									<li class="nav-item">
										<a class=" nav-link d-flex align-items-center tab-orders  <?php if($this->uri->segment(3) == 'allorders-tab'){echo 'active';}?>"
											id="allorders-tab"
											href="<?php echo base_url($lang."/ManageOrders/allorders-tab"); ?>"
											role="tab" aria-selected="false">
											<span class="d-none d-sm-block"><?php echo lang("all_orders"); ?></span>
										</a>
									</li>
									<li class="nav-item">
										<a id="toship-main" class="nav-link d-flex align-items-center tab-orders <?php if($this->uri->segment(3) == 'ManageOrders_toship' || $this->uri->segment(3) == 'toShipOrders-tab'|| $this->uri->segment(3) == 'toShipNotprocess-tab' || $this->uri->segment(3) == 'toShipProcessed-tab'){echo 'active';}?> "
											href="<?php echo base_url($lang."/ManageOrders/toShipOrders-tab"); ?>"
											role="tab" aria-selected="false" >
											<span class="d-none d-sm-block"><?php echo lang("shipping"); ?></span>
										</a>

									</li>
									<li class="nav-item">
										<a class="nav-link d-flex align-items-center tab-orders <?php if($this->uri->segment(3) == 'ManageOrders_success'){echo 'active';}?>"
											href="<?php echo base_url($lang."/ManageOrders/ManageOrders_success"); ?>" role="tab"
											aria-selected="false" >
											<span class="d-none d-sm-block"><?php echo lang("success"); ?></span>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link d-flex align-items-center tab-orders <?php if($this->uri->segment(3) == 'ManageOrders_cancelled'){echo 'active';}?>"
											href="<?php echo base_url($lang."/ManageOrders/ManageOrders_cancelled"); ?>" role="tab"
											aria-selected="false" >
											<span class="d-none d-sm-block"><?php echo lang("cancellation"); ?></span>
										</a>
									</li>
									<li class="nav-item">
										<a id="return-main" class="nav-link d-flex align-items-center tab-orders <?php if($this->uri->segment(3) == 'ManageOrders_return' || $this->uri->segment(3) == 'returnAllorders2-tab'|| $this->uri->segment(3) == 'returnNotprocess2-tab' || $this->uri->segment(3) == 'returnProcessed2-tab'){echo 'active'; }?>" 
											data-content="0 คำขอที่ค้างอยู่" data-trigger="hover"
											data-placement="bottom" id="returnlist-tab" href="<?php echo base_url($lang."/ManageOrders/returnAllorders2-tab"); ?>"
											role="tab" aria-selected="false">
											<span class="d-none d-sm-block"><?php echo lang("refund");?></span>
										</a>
									</li>
								</ul>
								<div class="tab-content" style="margin-top:20px">

									<?php $this->load->view($content_view) ?>
								</div>
				</section>
				users edit ends -->
			</div>
		</div>
	</div>
	<!-- END: Content-->



	<?php $this->load->view('footer/footer') ?>
	<?php $this->load->view('helper/include_js') ?>
</body>

</html>
