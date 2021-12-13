<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="apple-touch-icon" href="<?php echo base_url('app-assets/img/ico/apple-icon-120.png'); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('app-assets/img/ico/favicon2.ico '); ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
	<?php $this->load->view('helper/include'); ?>
	<?php  $this->load->view('helper/include_firebase') ?>
	<!-- JQUERY -->
	<?php echo js_asset('vendors/js/vendors.min.js'); ?>
</head>
<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page <?php if($this->uri->segment(2) == 'login'){echo 'bg_login';}?> " data-open="click" data-menu="vertical-menu" data-col="1-column">
	<?php $this->load->view($content_view); ?>
	<?php $this->load->view('helper/include_js'); ?>
	<?php $this->load->view('helper/login/firebase_login'); ?>
	<?php 
		echo js_asset('vendors/js/extensions/toastr.min.js');
		echo js_asset('js/scripts/extensions/toastr.js');
	?>
</body>
</html>