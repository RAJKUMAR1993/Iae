	<?php $this->load->view("admin/back_common/header"); ?>
<style>

li.select2-selection__choice {
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis; 
}
ul.select2-selection__rendered {
    padding-right: 12px !important; 
}
</style>
	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark"><? echo isset($s->id) ? 'Update' : 'Add' ?> Institution Type</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li><a href="<?php echo base_url() ?>admin/Institution_types">Institution Types</a></li>
				<li class="active"><span><? echo isset($s->id) ? 'Update' : 'Add' ?> Institution Type </span></li>
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
						        
						         <form method="post" action="<? echo base_url('admin/Institution_types/insertData') ?>" enctype="multipart/form-data">
								  <div class="form-content">
								   <? echo $this->session->flashdata("emsg") ?>

								   <div id="error"></div>

									  <div class="col-md-3">
									  	<label>Type</label>
										<div class="form-group">
										  <input type="text" class="form-control" placeholder="Institution Type" value="<? echo isset($s->type) ? $s->type : '' ?>" name="type" required>
										</div>
									  </div>
									  <div class="col-md-3">
									  	<label>Amount</label>
										<div class="form-group">
										  <input type="number" class="form-control" placeholder="Amount" value="<? echo isset($s->amount) ? $s->amount : '' ?>" name="amount" required>
										</div>
									  </div>
									  <div class="col-md-3">
									  	<label>No'of Participants</label>
										<div class="form-group">
										  <input type="number" class="form-control" placeholder="No'of Participants" value="<? echo isset($s->participants) ? $s->participants : '' ?>" name="participants" required>
										</div>
									  </div>
									  <div class="col-md-3">
									  	<label>Sub Types</label>
										<div class="form-group">
										  <select class="form-control js-select_sub" name="sub_types[]" multiple="multiple" required>
										  	<? $sub_types = json_decode($s->sub_types); 
											   foreach($sub_types as $st){
												   echo '<option value="'.$st.'">'.$st.'</option>';
											   }
											  ?>
										  </select>
										</div>
									  </div>
									  <div class="col-md-3">
									  	<label>Status</label>
										<div class="form-group">
										  <select class="form-control" name="status" required>
										  	<option value="">Select Status</option>
										  	<option value="Active" <? echo ($s->status == "Active") ? 'selected' : '' ?> >Active</option>
										  	<option value="Inactive" <? echo ($s->status == "Inactive") ? 'selected' : '' ?>>Inactive</option>
										  	
										  </select>
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

		$(".js-select_sub").select2({
			closeOnSelect : false,
			placeholder : "Add Sub Type",
			allowHtml: true,
			allowClear: true,
			tags: true
		});

	});

	$(".js-select_sub").val(<? echo $s->sub_types ?>).trigger('change');	
	
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











