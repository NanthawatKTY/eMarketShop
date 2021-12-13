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
		<?php //$this->load->view('helper/include_firebase') ?>
		<?php //$this->load->view('helper/login/firebase_login'); ?>
		<!-- JQUERY -->
		<?php echo js_asset('vendors/js/vendors.min.js'); ?>
	</head>
	<body class="vertical-layout vertical-menu content-left-sidebar chat-application  fixed-navbar " data-open="click" data-menu="vertical-menu" data-col="content-left-sidebar">
	<a href="<?php echo base_url($lang."/chat"); ?>"><span class="feather icon-message-square chat_button <?php if($this->uri->segment(2) == 'chat'){echo 'displayNone';}?>"></span><div id="chat_count_all" class="badge badge-pill badge-danger float-right <?php if($this->uri->segment(2) == 'chat'){echo 'displayNone';}?>"></div></a>
	<!-- <body class="vertical-layout vertical-menu 2-columns fixed-navbar" id="main-page" data-open="click" data-menu="vertical-menu" data-col="2-columns"> -->
		<?php //$this->load->view('header/header_menu') ?>
		<?php //$this->load->view('menu/menu') ?>
		<?php $this->load->view($content_view) ?>
		<?php //$this->load->view('footer/footer') ?>	
		<?php $this->load->view('helper/include_js') ?>
		<?php 
		    //echo js_asset('formSerializeFormJSON.js');
			//echo js_asset('allFunction.js');
		?>
	</body> 
	<script>
		// function countUnreadMessage_otherPage(){
		// 	let refUnread = firebase.database().ref('messages').child('unread-Messages').child(userId);
		// 	refUnread.on('value',function(unread){
		// 		unread.forEach(function(item){
		// 			$('#chat_count_all').html(item.numChildren());
		// 			// let key = item.key;
		// 			// item.forEach(function(value){
		// 			// 	let refMessage = firebase.database().ref('messages').child(userId).child(key).child(value.key);
		// 			// 	refMessage.on('value',function(noti){
		// 			// 		console.log(noti.val());
		// 			// 		// db.collection("userProfile").doc(noti.sender).get().then(function(user){
								
		// 			// 		// });
		// 			// 		toastr.info(noti.val().message,' user.data().name', {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});    
							
		// 			// 	})
		// 			// })
        //     	})
		// 	})
		// }
	</script>
</html>