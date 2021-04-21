	<?php $this->load->view("admin/back_common/header"); ?>

			<!-- Row -->
				<div class="row">
               		<div class="panel panel-default card-view pa-0">
						<div class="panel-wrapper collapse in">
							<div  class="panel-body pb-0" style="padding:20px;">
								<?php //echo $this->session->flashdata('msg');?>
		               			<form id="form1" action="<?php echo base_url('admin/dashboard/updatePassword');?>" method="POST"  data-toggle="validator" autocomplete="off" >
		               				<div class="form-group col-md-3">
		               					<label>Current Password:</label>
		               					<input type="password" name="old_pass" class="form-control" required>
		               				</div>
		               				<div class="form-group col-md-3">
		               					<label>New Password: </label>
		               					<input type="password" name="new_pass" class="form-control" required>
		               				</div>
		               				<div class="form-group col-md-3">
		               					<label>Re-type Password: </label>
		               					<input type="password" name="re_pass" class="form-control"  required>
		               				</div>
		               				<div class="form-group col-md-3">
		               					<label></label>
		               					<button type="submit" class="btn btn-primary form-control" style="color:white" id="update">Update</button>
		               				</div>
		               			</form>
               				</div>
               			</div>
               		</div>
				</div>

				<!-- /Row -->
				
	<?php $this->load->view("admin/back_common/footer"); ?>


<script type="text/javascript">
	$("#update").validator().on("click",function(){
		//alert();
		$('#form1').validator('validate');
	});
</script>