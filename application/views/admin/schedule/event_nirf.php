
	<?php $this->load->view("admin/back_common/header"); 
	$type = $this->uri->segment(4);
	$type_id = $this->uri->segment(5);
	
	?>
<style>

.note-editor .note-btn.btn-sm {
    padding: 5px 15px !important;
    font-size: 12px !important;
}
</style>


<!-- Title -->
<div class="row heading-bg">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-dark"><? echo isset($nirf->id) ? 'Update' : 'Add' ?><?php //echo $type  ?> Content</h5>
	</div>
				<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
			<li><a href="<?php echo base_url() ?>admin/schedule/events">Events</a></li>
			<li class="active"><span><? echo isset($nirf->id) ? 'Update' : 'Add' ?><?php //echo $type  ?> Content</span></li>
		</ol>
	</div>
				<!-- /Breadcrumb -->
</div>	
		<?php //print_r($nirf);  ?>
		<!-- Row -->
			<div class="row">
				   <div class="col-lg-12 col-xs-12" >
					<div class="panel panel-default card-view">
					
						<div class="panel-wrapper collapse in">
							
							<div class="container">
							
							 <form method="post" action="<? echo base_url('admin/schedule/insert_nirf') ?>" enctype="multipart/form-data">
							  <div class="form-content">
							   <? echo $this->session->flashdata("emsg") ?>

							   <div id="error"></div>
										<input type="hidden" name="event_type" value= " <?php echo  $type ?>" class="form-control">
										<input type="hidden" name="event_id" value= " <?php echo  $type_id ?>" class="form-control">
								<?php 
								if($type == "RIPF" || $type == "NAAC" || $type == "NIRF" ) { ?>
								<div class="col-md-3">
									<label>Banner Image</label>
									<div class="form-group">
										<input type="file" name="banner_image" class="form-control">
										<input type="hidden" name="old_banner_image"
										 value= "<?php echo  $nirf->banner_image ?>" class="form-control">
										
									</div>
								</div>
								<?php } ?>
								<?php if($type == "RIPF") { ?>
								<div class="col-md-3">
									  <label>Who Can Attend Image</label>
									<div class="form-group">
									<input type="file" name="whocan_image" class="form-control">
									<input type="hidden" name="old_whocan_image" value= "<?php echo  $nirf->whocan_image ?>" class="form-control">
									</div>
								</div>
								<?php }?>
								<?php if($type == "RIPF") { ?>
								<div class="col-md-3">
									  <label>Outcomes Image</label>
									<div class="form-group">
									<input type="file" name="outcome_image" class="form-control">
									<input type="hidden" name="old_outcome_image" value= "<?php echo  $nirf->outcome_image ?>" class="form-control">

									</div>
								</div>
								<?php } ?>
								<?php if($type == "RIPF") { ?>
								<div class="col-md-3">
									  <label>Objective of the symposium Image</label>
									<div class="form-group">
									<input type="file" name="ob_sypim_image" class="form-control">
									<input type="hidden" name="old_ob_sypim_image" value= "<?php echo  $nirf->ob_sypim_image ?>" class="form-control">

									</div>
								</div>
								<?php } ?>
								<?php if($type == "RIPF") { ?>
								<div class="col-md-3">
									  <label>major Objective Image</label>
									<div class="form-group">
									<input type="file" name="m_obj_image" class="form-control">
									<input type="hidden" name="old_m_obj_image" value= "<?php echo  $nirf->m_obj_image ?>" class="form-control">

									</div>
								</div>
								<?php } ?>
								<?php if($type == "NAAC") { ?>
								<div class="col-md-3">
									  <label> Objective Image </label>
									<div class="form-group">
									<input type="file" name="obj_image" class="form-control">
									<input type="hidden" name="old_obj_image" value= "<?php echo  $nirf->obj_image ?>" class="form-control">

									</div>
								</div>
								<?php } ?>
								<?php if($type == "NAAC" ) { ?>
								<div class="col-md-3">
									  <label>Key Takeaway Image </label>
									<div class="form-group">
									<input type="file" name="key_take_image" class="form-control">
									<input type="hidden" name="old_key_take_image" value= "<?php echo  $nirf->key_take_image ?>" class="form-control">

									</div>
								</div>
								<?php } ?>
						
								<?php if($type == "NAAC" ||  $type == "RIPF"  ) { ?>
								
								<div class="col-md-3">
									  <label>Online Registration</label>
									<div class="form-group">
									  <textarea rows="4" cols="50" class="form-control"  name="online_registration" placeholder="Online Registration" autocomplete="off" required ><? echo isset($nirf->online_registration) ? $nirf->online_registration : '' ?></textarea>
									</div>
								  </div>
								  <?php } ?>
								  <?php if($type == "NAAC" ) { ?>
								<div class="col-md-6">
									  <label>Bank Deposit</label>
									<div class="form-group">
									  <textarea rows="4" cols="50" class="form-control desc" id="desc"  name="bank_deposit" placeholder="Bank Deposit" autocomplete="off" requied><? echo isset($nirf->bank_deposit) ? $nirf->bank_deposit : '' ?></textarea>
									</div>
								</div>
								<?php } ?>
								  <?php if($type == "NAAC" ) { ?>
								  <div class="col-md-6">
									  <label>Offline Registration</label>
									<div class="form-group">
									  <textarea rows="4" cols="50" class="form-control desc" id="desc"  name="offline_registration" placeholder="Offline Registration" autocomplete="off" required ><? echo isset($nirf->offline_registration) ? $nirf->offline_registration : '' ?></textarea>
									</div>
								  </div>
								  <?php } ?>
								  <?php if($type == "RIPF" ||  $type == "NAAC" || $type == "NIRF"   ) { ?>
								  <div class="col-md-6">
									  <label>Workshop Overview</label>
									<div class="form-group">
									  <textarea rows="4" cols="50" class="form-control desc" id="desc" name="workshop_overview" placeholder="workshop" autocomplete="off" required ><? echo isset($nirf->workshop) ? $nirf->workshop : '' ?></textarea>
									</div>
								  </div>
								  <?php } ?>
								  <?php  if($type == "NAAC" ) { ?>
								  <div class="col-md-6">
									  <label>Key Takeaway</label>
									  <div class="form-group">
									  <textarea rows="4" cols="50" class="form-control desc" id="desc" name="key_takeaways" placeholder="Key Takeaway" autocomplete="off" required ><? echo isset($nirf->key_takeaways) ? $nirf->key_takeaways : '' ?></textarea>
									</div>
								  </div>
								  <?php } ?>
								  <?php  if($type == "NAAC" ) { ?>
								  <div class="col-md-6">
									  <label>About Workshop</label>
									  <div class="form-group">
									  <textarea rows="4" cols="50" class="form-control desc" id="desc" name="about_workshop" placeholder="About workshop" autocomplete="off" required  ><? echo isset($nirf->about_workshop) ? $nirf->about_workshop : '' ?></textarea>
									</div>
								  </div>
								  <?php } ?>
								  <?php if($type == "RIPF" ) { ?>
								  <div class="col-md-6">
									  <label>About symposium </label>
									<div class="form-group">
									  <textarea rows="4" cols="50" class="form-control desc" id="desc" name="about_symposium" placeholder="About symposium " autocomplete="off" required  ><? echo isset($nirf->about_symposium) ? $nirf->about_symposium : '' ?></textarea>
									</div>
								  </div>
								  <?php }?>
								  <?php if($type == "RIPF" ) { ?>
								  <div class="col-md-6">
									  <label>Objective of the symposium</label>
									<div class="form-group">
									  <textarea rows="4" cols="50" class="form-control desc" id="desc" name="objective_of_the_symposium" placeholder="Objective of the symposium" autocomplete="off" required><? echo isset($nirf->objective_of_the_symposium) ? $nirf->objective_of_the_symposium : '' ?></textarea>
									</div>
								  </div>
								  <?php } ?>
								  <?php if($type == "RIPF" ) { ?>
								  <div class="col-md-6">
									  <label>Outcomes</label>
									<div class="form-group">
									  <textarea rows="4" cols="50" class="form-control desc" id="desc" name="outcomes" placeholder="Outcomes" autocomplete="off" required><? echo isset($nirf->outcomes) ? $nirf->outcomes : '' ?></textarea>
									</div>
								  </div>
								  <?php } ?>
								  <?php if($type == "RIPF" ) { ?>
								  <div class="col-md-6">
									  <label>Who Can Attend</label>
									<div class="form-group">
									  <textarea rows="4" cols="50" class="form-control desc" id="desc" name="who_can_attend" placeholder="Who can Attend" autocomplete="off" required><? echo isset($nirf->who_can_attend) ? $nirf->who_can_attend : '' ?></textarea>
									</div>
								  </div>
								  <?php } ?>
								  <?php if($type == "RIPF" || $type == "NIRF" || $type == "NAAC" ) { ?>
								  <div class="col-md-6">
									  <label>Objective</label>
									<div class="form-group">
									  <textarea rows="4" cols="50" class="form-control desc" id="desc" name="objective" placeholder="objective" autocomplete="off" required><? echo isset($nirf->objectives) ? $nirf->objectives : '' ?></textarea>
									</div>
								  </div>
								  <?php }?>
								  <?php if( $type == "NIRF" ) { ?>
										<div class="col-md-6">
									  <label>Expected Outcome</label>
									<div class="form-group">
									  <textarea rows="4" cols="50" class="form-control desc" id="desc" name="expected" placeholder="Expected Outcome" autocomplete="off" required><? echo isset($nirf->expected_outcome) ? $nirf->expected_outcome : '' ?></textarea>
									</div>
								  </div>
								  <?php } ?>
								  <?php if( $type == "NIRF" ) { ?>
								<div class="col-md-6">
								<label>Why Participate</label>
							<div class="form-group">
								<textarea rows="4" cols="50" class="form-control desc" id="desc" name="why_particiption" placeholder="Profile" autocomplete="off" required><? echo isset($nirf->why_participate) ? $nirf->why_participate : '' ?></textarea>
							</div>
							</div>
								<?php } ?>
								<?php if( $type == "NIRF" ) { ?>
								  <div class="col-md-6">
									  <label>Description</label>
									<div class="form-group">
									  <textarea rows="4" cols="50" class="form-control desc " id="desc" name="description" placeholder="Profile" autocomplete="off" required><? echo isset($nirf->description) ? $nirf->description : '' ?></textarea>
									</div>
								  </div>
								  <?php } ?>
								  	<?php if( $type == "NAAC" || $type == "RIPF" ) { ?>
								  <div class="col-md-6">
									  <label>Note</label>
									<div class="form-group">
									  <textarea rows="4" cols="50" class="form-control desc " id="desc" name="note" placeholder="Profile" autocomplete="off" required><? echo isset($nirf->note) ? $nirf->note : '' ?></textarea>
									</div>
								  </div>
								  <?php } ?>



								  <div class="row">
								<?php  	if($type == "RIPF" || $type == "NAAC" || $type == "NIRF" ) { ?>
									   <div class="col-md-2">
										 <label>Banner Image</label>
											 <img class="thumbnail" style="height: 50px; width: 120px;" src="<?php echo base_url(); ?><?php echo $nirf->banner_image ?>" alt=""> 
									  </div> 
									<?php } ?>
									<?php if($type == "RIPF") { ?>
									  <div class="col-md-2">
											<label>Attend Image</label>
											  <img class="thumbnail" style="height: 50px; width: 120px;" src="<?php echo base_url(); ?><?php echo  $nirf->whocan_image ?>" alt=""> 
									  </div> 
									<?php } ?>
									<?php if($type == "RIPF") { ?>
									  <div class="col-md-2">
											<label>Outcomes Image</label>
											<img class="thumbnail" style="height: 50px; width: 120px;" src="<?php echo base_url(); ?><?php echo  $nirf->outcome_image ?>" alt=""> 
									  </div> 
									<?php } ?>
										<?php if($type == "RIPF") { ?>
									  <div class="col-md-2">
											<label>symposium Image</label>
											<img class="thumbnail" style="height: 50px; width: 120px;" src="<?php echo base_url(); ?><?php echo  $nirf->ob_sypim_image ?>" alt=""> 
									  </div> 
									<?php } ?>
									<?php if($type == "RIPF") { ?>
									  <div class="col-md-2">
											<label>major Objective Image</label>
											<img class="thumbnail" style="height: 50px; width: 120px;" src="<?php echo base_url(); ?><?php echo  $nirf->m_obj_image ?>" alt=""> 
									  </div> 
									<?php } ?>
										<?php if($type == "NAAC") { ?>
									    <div class="col-md-2">
											<label>Objective Image</label>
											<img class="thumbnail" style="height: 50px; width: 120px;"
											 src="<?php echo base_url(); ?><?php echo  $nirf->obj_image ?>" alt=""> 
									  </div> 
									<?php } ?>
									<?php if($type == "NAAC" ) { ?>
									    <div class="col-md-2">
											 <label>Key Takeaway Image</label>
											 <img class="thumbnail" style="height: 50px; width: 120px;" src="<?php echo base_url(); ?><?php echo  $nirf->key_take_image ?>" alt=""> 
									  </div> 
									<?php } ?>
									</div>


								  <div class="clearfix"></div>
								  <div class="col-md-12" style="padding-bottom: 20px">
									  <input type="hidden" name="id" value="<? echo isset($nirf->id) ? $nirf->id : '' ?>">
									  <button type="submit" class="btn btn-success btnSubmit pull-right"><? echo isset($nirf->id) ? 'Update' : 'Submit' ?></button>
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
<script type="text/javascript">
$(document).ready( function () {
$('#myTable').DataTable();
} );
</script>


<script type="text/javascript">

$(".desc").summernote({

height : 200,
toolbar: [
		[ 'style', [ 'style' ] ],
		[ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
		[ 'fontname', [ 'fontname' ] ],
		[ 'fontsize', [ 'fontsize' ] ],
		[ 'color', [ 'color' ] ],
		[ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
		[ 'table', [ 'table' ] ],
		[ 'insert', [ 'link'] ],
		[ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
	]
});

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











