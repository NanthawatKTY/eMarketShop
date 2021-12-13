<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="apple-touch-icon" href="<?php echo base_url('app-assets/img/ico/apple-icon-120.png'); ?>">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('app-assets/img/ico/favicon2.ico '); ?>">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
		<?php $this->load->view('helper/include'); ?>
		<?php $this->load->view('helper/include_firebase') ?>
		<?php $this->load->view('helper/login/firebase_login'); ?>
		<!-- JQUERY -->
		<?php echo js_asset('vendors/js/vendors.min.js'); ?>
	</head>
	<body class="vertical-layout vertical-menu content-left-sidebar chat-application  fixed-navbar " data-open="click" data-menu="vertical-menu" data-col="content-left-sidebar">
	<!-- <body class="vertical-layout vertical-menu 2-columns fixed-navbar" id="main-page" data-open="click" data-menu="vertical-menu" data-col="2-columns"> -->
		<?php $this->load->view($content_view) ?>
		<?php $this->load->view('helper/include_js') ?>
		<?php 
		    echo js_asset('formSerializeFormJSON.js');
			echo js_asset('allFunction.js');
		?>
	</body>

</html>