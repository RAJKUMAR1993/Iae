<?php $d = &get_instance(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>IAE</title>
		<meta name="description" content="Engineering Admissions, PGDM Admissions, B.Tech. Admissions" />
		<meta name="keywords" content="B.Tech. Admissions, Engineering Admissions " />
		<meta name="author" content="Engineering Admissions"/>

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/front/images/favicon.ico">
	<link rel="icon" href="<?php echo base_url();?>assets/front/images/favicon.ico" type="image/x-icon">

	<!-- Data table CSS -->
	<link href="<?php echo base_url("assets");?>/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

	<!-- Toast CSS -->
	<link href="<?php echo base_url("assets");?>/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url("assets");?>/vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url("assets");?>/vendors/bower_components/jquery-wizard.js/css/wizard.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url("assets");?>/vendors/bower_components/jquery.steps/demo/css/jquery.steps.css">
	<link href="<?php echo base_url("assets");?>/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
	
<!-- js grid	-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/switch/");?>bootstrap-switch.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/datepicker/");?>bootstrap-datepicker.min.css">
	<link href="<?php echo base_url("assets");?>/vendors/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css"/>
<!--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />-->

	
	<!-- Custom CSS -->
	<link href="<?php echo base_url("assets/");?>dist/css/style.css" rel="stylesheet" type="text/css">
	
	<!-- Bootstrap Dropify CSS -->
	<link href="<?php echo base_url("assets/");?>/vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/pnotify/pnotify.custom.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url("assets/"); ?>vendors/bower_components/summernote/dist/summernote.css" />
	
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
	<link rel="stylesheet" href="<? echo base_url('assets/css/bootstrap-switch.min.css') ?>">

<style>
	li.select2-selection__choice {
		max-width: 100%;
		overflow: hidden;
		text-overflow: ellipsis; 
		color: white !important;
	}
	ul.select2-selection__rendered {
		padding-right: 12px !important; 
	}
	.input-group{
		display: inline-flex !important;
	}
	.input-group-text {
		display: -ms-flexbox;
		display: flex;
		-ms-flex-align: center;
		align-items: center;
		padding: .375rem .75rem;
		margin-bottom: 0;
		font-size: 1rem;
		font-weight: 400;
		line-height: 1.5;
		color: #fff;
		text-align: center;
		white-space: nowrap;
		background-color: #e9ecef;
		border: 1px solid #ced4da;
		border-radius: .25rem;
	}
	.select2-container--default .select2-selection--multiple .select2-selection__choice {
		border-radius: 0;
		color: #fff !important;
		padding: 8px 10px;
		margin-bottom: 10px;
		margin-right: 5px;
		display: inline-block;
		text-align: center;
		vertical-align: baseline;
		white-space: nowrap;
		background: #76c880;
		border: none;
		line-height: 10px;
		font-size: 12px;
	}

	.select2-container--default .select2-selection--multiple .select2-selection__choice {
		background-color: #e4e4e4;
		border: 1px solid #aaa;
		border-radius: 4px;
		cursor: default;
		float: left;
		margin-right: 5px;
		margin-top: 5px;
		padding: 8px !important; 
	}
	
	.select2-selection--multiple{
		height: 100px !important;
		clear: both !important;
		overflow: auto !important;
	}
	.select2-container--default .select2-selection--multiple .select2-selection__choice {
		background-color: #337ab7 !important;
	}
	.select2-container--default .select2-selection--multiple .select2-selection__choice {
		color: #ffffff !important;
	}
	
	.ui-pnotify-title{
		color: black !important;
	}
	
</style>	
			
	<!-- Google Tag Manager -->
<script>
(function (w, d, s, l, i) {
w[l] = w[l] || []; w[l].push({
'gtm.start':
new Date().getTime(), event: 'gtm.js'
}); var f = d.getElementsByTagName(s)[0],
j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
})(window, document, 'script', 'dataLayer', 'GTM-N96PMX7');
</script>
<!-- End Google Tag Manager -->


</head>

<body>


	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-6-active pimary-color-pink">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="<? echo base_url() ?>">
<!--							<img class="brand-img" src="<?php echo base_url();?>assets/front/images/favicon.ico" alt="brand"/>-->
							<span class="brand-text" style="font-size: 18px;">IAE</span>
						</a>
					</div>
				</div>
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
<!--
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
				<form id="search_form" role="search" class="top-nav-search collapse pull-left">
					<div class="input-group">
						<input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
						<span class="input-group-btn">
						<button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
						</span>
					</div>
				</form>
-->
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?php echo base_url("assets");?>/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="<?php echo base_url("admin/dashboard/changePassword") ?>"><i class="zmdi zmdi-account"></i><span>Change Password</span></a>
							</li>
							
<!--
							<li>
								<a href="<?php //echo base_url("admin/settings") ?>"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
							</li>
-->
							
							<li class="divider"></li>
							<li>
								<a href="<?php echo base_url() ?>admin/login/logout"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>

	<?php $this->load->view("admin/back_common/sidemenu"); ?> 


		 <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">