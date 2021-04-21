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
		<!-- vector map CSS -->
<link href="<?php echo base_url('assets');?>/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
		<link href="<?php echo base_url("assets");?>/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">


		<!-- Custom CSS -->
		<link href="<?php echo base_url('assets/');?>dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->

		<div class="wrapper pa-0">

			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page" style="background-image: url(<?php echo base_url('assets');?>/img/bgimg.jpg)">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float card-view">
                            <center><a href="<?php echo base_url(); ?>"><img class="brand-img mr-10" src="<?php echo base_url('assets/images/logo.png');?>" alt="brand" width="100%"/></a></center><br>
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="form-wrap">
											<form id="login" autocomplete="off">
												<div class="form-group">
							<label class="control-label mb-10" for="exampleInputEmail_2">Email</label>
							<input type="email" class="form-control" name="email" required="required" id="exampleInputEmail_2" placeholder="Enter Email">
												</div>
												<div class="form-group">
						    <label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
													<div class="clearfix"></div>
							<input type="password" class="form-control" required="required" name="userpass" id="exampleInputpwd_2" placeholder="Enter pwd">
												</div>

												<div class="form-group text-center">
													<button type="submit" class="btn btn-primary  btn-rounded">sign in</button>
												</div>
												
													<!-- <a href="#"><p style="margin-left: 30px; margin-bottom: 20px" data-toggle="modal" data-target="#responsive-modal">Didn't Get Login Details! Please Click Here</p></a> -->
													
								
								
										
													
												
												<input type="hidden" id="base_url" value="<?php echo base_url();?>">
											</form>
<center>
<img src="<?php echo base_url('assets');?>/img/loader.gif" width="45" height="45" alt="" style="display:none" id="preloader">

<div class="alert alert-danger" style="display:none" id="emsg">Please Check Login Details</div>
</center>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="<?php echo base_url('assets/');?>vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url('assets/');?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('assets/');?>vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="<?php echo base_url('assets/');?>dist/js/jquery.slimscroll.js"></script>
		
		<!-- Init JavaScript -->
		<script src="<?php echo base_url('assets/');?>dist/js/init.js"></script>
        <script src="<?php echo base_url('assets/');?>dist/scripts/login.js"></script>
		<script src="<?php echo base_url("assets");?>/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
        
	</body>
</html>




										<!-- /.modal -->
										<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h5 class="modal-title" style="color: black">Get Your Login Details</h5>
													</div>
													<div class="modal-body">
														<form>
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Email:</label>
																<input type="email" class="form-control" id="femail" required>
															</div>
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Mobile Number:</label>
																<input type="text" class="form-control" id="fmobile" maxlength="10" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" required>
															</div>
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="button" class="btn btn-danger" id="fsubmit">Submit</button>
													</div>
												</div>
											</div>
										</div>



<script type="text/javascript">

$("#fsubmit").click(function(){
	
	var email = $("#femail").val();
	var mobile = $("#fmobile").val();
	
	var mailformat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	
	if(email == ""){
		
		swal(
		 'Error!',
		 'Enter Email Address.',
		 'warning'
		) 
		return false;
		
	}
	
	
	
	if(!mailformat.test(email)) {

		swal(
		 'Error!',
		 'Enter Valid Email Address.',
		 'warning'
		) 
		return false;
				
	}
	
	if(mobile == ""){
		
		swal(
		 'Error!',
		 'Enter Mobile Number.',
		 'warning'
		) 
		return false;
		
	}
	
	$.ajax({
		
		type : "post",
		data : {email:email,mobile:mobile},
		url : "<?php echo base_url() ?>Home/resendEmail",
		success : function(data){
//		console.log(data);	
			if(data == 1){
				
				swal(
				 'Success!',
				 'Successfully Login Credentials Send To Your Email.',
				 'success'
				)
				
				$("#responsive-modal").modal('hide');
				return false;
				
			}else if(data == 2){
				
				swal(
				 'Error!',
				 'Entered Credentials Are Wrong.',
				 'warning'
				) 
				return false;
				
			}else{
				
				swal(
				 'Error!',
				 'Error Occured Please Try Again.',
				 'warning'
				) 
				return false;
			}
			
		},
		
		error :  function(data){
			
//			console.log(data);
			
			swal(
				 'Error!',
				 'Error Occured Please Try Again.',
				 'warning'
				) 
				return false;
			}
		
		
	});
	
});	
	

</script>


