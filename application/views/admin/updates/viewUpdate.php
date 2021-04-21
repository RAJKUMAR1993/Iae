	<?php $this->load->view("admin/back_common/header"); ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark"><? echo isset($s->id) ? 'Update' : 'Create' ?></h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li><a href="<?php echo base_url() ?>admin/settings/updates">Updates</a></li>
				<li class="active"><span><? echo isset($s->id) ? 'Update' : 'Create' ?> </span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>	
			
			<!-- Row -->
				<div class="row">
               		<div class="col-lg-12 col-xs-12" >
						<div class="panel panel-default card-view">
						
							<div class="panel-wrapper collapse in">
						        
						        <div class="container">
						        
						         <form method="post" action="<? echo base_url('admin/settings/insertData') ?>" enctype="multipart/form-data">
								  <div class="form-content">
								   <? echo $this->session->flashdata("emsg") ?>

								   <div id="error"></div>

									  <div class="col-md-3">
									  	<label>Title</label>
										<div class="form-group">
										  <input type="text" class="form-control" placeholder="Title" value="<? echo isset($s->title) ? $s->title : '' ?>" name="title" required>
										</div>
									  </div>
									  <div class="col-md-3">
									  	<label>Link</label>
										<div class="form-group">
										  <input type="text" class="form-control" placeholder="Link" value="<? echo isset($s->link) ? $s->link : '' ?>" name="link">
										</div>
									  </div>
									  <div class="col-md-1" style="margin-top: 20px">
									  	<input type="hidden" name="id" value="<? echo isset($s->id) ? $s->id : '' ?>">
									  	<button type="submit" class="btn btn-success btnSubmit pull-left"><? echo isset($s->id) ? 'Update' : 'Submit' ?></button>
									  </div>	
								  </div>

									
									<div class="clearfix"></div>
								  </div>



								  </form>
						         
						        </div>
						         
							</div>
						</div>
							
					</div>
				<!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>
<sript type="text/javascript" src="<? echo base_url('assets/multiselect/bundle.min.js') ?>"></sript>

<script type="text/javascript">

	$(document).ready( function(){

		$(".js-select2").select2({
			closeOnSelect : false,
			placeholder : "Select Event",
			allowHtml: true,
			allowClear: true,
			tags: true
		});

	});

	$(".js-select2").val(<? echo $s->events ?>).trigger('change');	
	
	$("#formdata").on("submit",function(e){
		
		e.preventDefault();
		
		var data = $("#formdata").serialize();
		
		$.ajax({
			
			"type" : "post",
			data : data,
			url : "<? echo base_url('admin/speakers/insertData') ?>",
			success : function(data){
				console.log(data);
				
				if(data == "success"){
					
					location.reload();
					
				}else{
					
					$("#error").html(data);
					return false;
					
				}
				
				
			},
			error : function(data){
				
				console.log(data);
				
			}
			
		});
		
	});

</script>











