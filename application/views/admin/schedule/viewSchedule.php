<?php $this->load->view("admin/back_common/header"); ?>
	
<style>
	.note-btn{
		padding: 5px !important;
	}	
	
	.mentors{
		margin-bottom: 0px;
		height: 125px;
	}
	.close_button{
		margin-top: -33px;
    	margin-right: 14px;
	}
	
	.close_button_remove{
		text-align: right !important;
    	padding: 6px!important;
	}
	
	.mimage{
		border: 2px solid #e0dcdc;
		border-radius: 10%;
		height: 60px !important;
		width: 70px!important;
	}
	.select2-container--default .select2-selection--single {
		height: 44px !important;
	}
</style>		

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark"><? echo isset($s->id) ? 'Update' : 'Add' ?> Schedule</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li><a href="<?php echo base_url() ?>admin/schedule">Schedules</a></li>
				<li class="active"><span><? echo isset($s->id) ? 'Update' : 'Add' ?> Schedule </span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>	
			
			<!-- Row -->
				<div class="row">
               		<div class="col-lg-12 col-xs-12" >
						<div class="panel panel-default card-view">
						
							<div class="panel-wrapper collapse in">
						        
						        <div class="container-fluid">
						        
						         <form method="post" action="<? echo base_url('admin/schedule/insertSchedule') ?>" enctype="multipart/form-data">
								  <div class="form-content">
								   <? echo $this->session->flashdata("emsg") ?>

								   <div id="error"></div>
										<div class="row">	
								  	  
									  	  <div class="col-md-3">
											<label>Category</label>
											<div class="form-group">
											  <select class="form-control js-select2" name="category[]" multiple id="category" required>
<!--												<option value="">Select Category</option>-->
												<? $categories = $this->db->get_where("tbl_categories",["status"=>"Active"])->result(); 
													foreach($categories as $cat){
														echo '<option value="'.$cat->category.'">'.$cat->category.'</option>';
													} 
												 ?>
												 <option value="all">All</option>
											  </select>
											</div>
										  </div>
										  		
										  <div class="col-md-3">
											<label>Event</label>
											<div class="form-group">
											  <select class="form-control" name="event_id" id="schedule_year" required>
												<option value="">Select Event</option>
												<? foreach($events as $event){ 
												   $sevent = ($event->id == $s->event_id) ? 'selected' : '';	
												  ?>
													<option value="<?php echo $event->id;?>" <? echo $sevent; ?>><?php echo $event->event_name;?></option>
												<? } ?>
											  </select>
											</div>
										  </div>

										  <div class="col-md-3">
											<label>Schedule Date</label>
											<div class="form-group">
											  <select class="form-control" name="schedule_date" id="schedule_date" required>
												<option value="">Select Date</option>
											  	<? if($s->schedule_date){
														$syears = $this->db->order_by("year","desc")->get_where("tbl_schedule_dates",["id"=>$s->event_id])->row(); 
														$esdate = ($s->schedule_date == $syears->event_start_date) ? 'selected' : '';
														$eedate = ($s->schedule_date == $syears->event_end_date) ? 'selected' : '';
														
														echo '<option value="'.$syears->event_start_date.'" '.$esdate.'>'.$syears->event_start_date.'</option>';
														echo '<option value="'.$syears->event_end_date.'" '.$eedate.'>'.$syears->event_end_date.'</option>';
													} ?>

											  </select>
											</div>
										  </div>  

										   <div class="col-md-3">
											<label>Scheduled Start Time</label>
											<div class="form-group">
											  <input type="time" class="form-control" name="schedule_start_time" value="<? echo isset($s->schedule_start_time) ? $s->schedule_start_time : '' ?>" placeholder="10:00AM to 11:00AM">
											</div>
										  </div>
										  
										  <div class="col-md-3">
											<label>Scheduled End Time</label>
											<div class="form-group">
											  <input type="time" class="form-control" name="schedule_end_time" value="<? echo isset($s->schedule_end_time) ? $s->schedule_end_time : '' ?>" placeholder="10:00AM to 11:00AM">
											</div>
										  </div>

										  <div class="col-md-3">
											<label>Link</label>
											<div class="form-group">
											  <input type="text" class="form-control" name="join_link" value="<? echo isset($s->join_link) ? $s->join_link : '' ?>" placeholder="Conference Link">
											</div>
										  </div>

										  <div class="col-md-3">
											<label>Type</label>
											<div class="form-group">
											  <select class="form-control" name="type" id="type">
												<option value="">Select Type</option>
												<option value="mentor" <? echo ($s->type == "mentor") ? 'selected' : '' ?>>Speaker</option>
												<option value="desc" <? echo ($s->type == "desc") ? 'selected' : '' ?>>Description</option>
												<option value="break" <? echo ($s->type == "break") ? 'selected' : '' ?>>Break</option>
											  </select>
											</div>
										  </div>

									  	  <div class="col-md-3" id="technical_session" style="display: <? echo ($s->type == "break") ? 'none' : 'block'; ?>;">
											<label>Techinical Session</label>
											<div class="form-group">
										  		<select class="form-control tsessions" name="technical_session">
										  			<? foreach($tsessions as $session){ ?>
														<option value="<?php echo $session->session_name;?>"><?php echo $session->session_name;?></option>
													<? } ?>
										  		</select>
											</div>
										  </div>
										  
										  <div class="col-md-3" id="desc_image" style="display: <? echo ($s->type == "desc") ? 'block' : 'none'; ?>;">
											<label>Description Image</label>
											<div class="form-group">
											  <input class="form-control" name="desc_image" type="file">
											</div>
										  </div>
										  	
										  <div class="col-md-6" id="type_description" style="display: <? echo ($s->type == "desc") ? 'block' : 'none'; ?>;">
											<label>Description</label>
											<div class="form-group">
											  <textarea rows="4" cols="50" class="form-control desc" id="" name="type_description" placeholder="Description" autocomplete="off"><? echo isset($s->type_description) ? $s->type_description : '' ?></textarea>
											</div>
										  </div>
										  
										  <div class="col-md-6">
											<label>Topic</label>
											<div class="form-group">
											  <textarea rows="4" cols="50" class="form-control desc" id="" name="description" placeholder="Topic" autocomplete="off"><? echo isset($s->description) ? $s->description : '' ?></textarea>
											</div>
										  </div>
										</div>
										  
										<? $mentors = (json_decode($s->mentor_data)) ? json_decode($s->mentor_data) : [""]; ?>  
										  
										<div class="row" style="display: <? echo ($s->type == "mentor") ? 'block' : 'none'; ?>" id="mentors">
										  		
															
											<div class="col-md-3">          
												<div class="form-group">
												  <label class="control-label">Speaker name</label>
													<div class="row m-b-10 field_wrapper">

													<?php 
													$i=0;
													if($s->mentor_data){   
														foreach($mentors as $m){	

													?>  

													  <div class="col-md-12 mentors">

															<input type="text" class="form-control col-md-11" name="pname[]" placeholder="Name" value="<? echo $m->mentor_name ?>">

														 <?php  
														if($i==0){

														}else{  
													  ?>  
													<p align="right" id="rem<?php echo $i ?>" sap="rem1<?php echo $i ?>" price="rem3<?php echo $i ?>" img="rem5<?php echo $i ?>" topic="rem4<?php echo $i ?>" class="remove_both pull-right col-md-1 close_button"><button class="btn btn-danger btn-sm waves-effect waves-light close_button_remove" type="button"><i class="ti-close"></i></button></p>
													 <?php } ?>


													  </div>

													<?php

													$i++;		
														}}else{
														?>	
														<div class="col-md-12 mentors">

															<input type="text" class="form-control" name="pname[]" placeholder="Name">
														</div>	
											  		
											  		<? } ?>	
												  </div>
												  <button type="button" id="add_sheading" class="btn btn-sm btn-info waves-effect waves-light" style="text-align: right">Add Speaker</button>

												</div>
								  			</div>
								  			
										  	<div class="col-md-2"> 
											 <div class="form-group">
											  <label class="control-label">Image</label>

												<div class="row m-b-15 sap_points">
											  <?php
												$ii = 0;	
												if($s->mentor_data){   
													foreach($mentors as $mpic){

												?> 

												  <div class="col-md-12 mentors" id="rem1<?php echo $ii ?>">
													<input type="file" class="form-control" name="mentor_image[]">
													<br>
													<?
														if(is_file($mpic->mentor_image)){
															
															echo '<img src="'.base_url().$mpic->mentor_image.'" class="img-responsive mimage">';
															
														}
													?>
													<input class="form-control" type="hidden" name="old_image[]" value="<? echo $mpic->mentor_image ?>">
												  </div>
											   <?php 
													$ii++;
													}}else{ ?>
													
													<div class="col-md-12 mentors" id="rem1<?php echo $ii ?>">
														<input type="file" class="form-control" name="mentor_image[]">
													</div>
													
												<? } ?>	
												</div>

											 </div>
											</div>
											       
											<div class="col-md-3"> 
												 <div class="form-group">
												  <label class="control-label">Designation</label>

													<div class="row m-b-15 sub_points">
												  <?php
													$iii = 0;	
													if($s->mentor_data){   
													foreach($mentors as $mpic){

													?> 

													  <div class="col-md-12 mentors" id="rem3<?php echo $iii ?>">
														<textarea class="form-control" name="designation[]" rows="5" placeholder="Designation"><? echo $mpic->mentor_designation ?></textarea>

													  </div>


												   <?php 
														$iii++;
														}}else{ ?>
														
														<div class="col-md-12 mentors">
															<textarea class="form-control" name="designation[]" rows="5" placeholder="Designation"></textarea>
														</div>
														
													<? } ?>	
													</div>

												 </div>

											</div>
         				
         									<div class="col-md-4">
         									
         										<div class="form-group">
												  <label class="control-label">Topic</label>

													<div class="row m-b-15 topic_points">
												  <?php
													$iii2 = 0;	
													if($s->mentor_data){   
													foreach($mentors as $mtopic){

													?> 

													  <div class="col-md-12 mentors" id="rem4<?php echo $iii2 ?>">
														<textarea class="form-control desc" name="topic[]" rows="3" placeholder="Topic"><? echo $mtopic->mentor_topic ?></textarea>

													  </div>


												   <?php 
														$iii2++;
														}}else{ ?>
														
														<div class="col-md-12 mentors">
															<textarea class="form-control desc" name="topic[]" placeholder="Designation" rows="3"></textarea>
														</div>
														
													<? } ?>	
													</div>

												 </div>
         									
											</div>
          				
												
									  	</div>      

										  <div class="clearfix"></div>
										  <div class="col-md-12" style="padding-bottom: 20px">
											<input type="hidden" name="id" value="<? echo isset($s->id) ? $s->id : '' ?>">
											<input type="hidden" name="old_desc_image" value="<? echo isset($s->desc_image) ? $s->desc_image : '' ?>">
											<button type="submit" class="btn btn-success btnSubmit pull-right"><? echo isset($s->id) ? 'Update' : 'Submit' ?></button>
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

    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">

$(".tsessions").select2({
	closeOnSelect : false,
	placeholder : "Select Technical Session",
	allowClear: true,
});
<? if($s->technical_session){ ?>	
	$(".tsessions").val(["<? echo $s->technical_session ?>"]).trigger('change');	
<? } ?>	
$(document).ready( function () {
    $('#myTable').DataTable();
	$(".desc").summernote({
	  toolbar: [
		// [groupName, [list of button]]
		['style', ['bold', 'italic', 'underline', 'clear']],
		['fontsize', ['fontsize']],
		['color', ['color']],
		['para', ['ul', 'ol', 'paragraph']],
		['height', ['height']]
	  ]
	});
});
	
$(document).ready( function () {
    $('#myTable').DataTable();
	
	$(".js-select2").select2({
		closeOnSelect : false,
		placeholder : "Select Category",
		allowClear: true,
		tags: true
	});
	
});
<? if($s->category){ ?>	
	$(".js-select2").val(<? echo $s->category ?>).trigger('change');	
<? } ?>
	
$("#type").change(function(){
	
	var type = $(this).val();
	if(type == "mentor"){
		$("#type_description").hide();
		$("#desc_image").hide();
		$("#mentors").show();
		$("#technical_session").show();
	}else if(type == "break"){
		$("#type_description").hide();
		$("#desc_image").hide();
		$("#mentors").hide();
		$("#technical_session").hide();
	}else{
		$("#type_description").show();
		$("#desc_image").show();
		$("#technical_session").show();
		$("#mentors").hide();
	}
	
})	
	
$("#schedule_year").change(function(){
	
	var year = $(this).val();
	$.ajax({
		type : "post",
		data : {year:year},
		url : "<? echo base_url('admin/schedule/getScheduleddates') ?>",
		success : function(data){
			$("#schedule_date").html(data);
			console.log(data);
		},
		error : function(data){
			
		}
	})
	
})

$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('#add_sheading'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
	var spoints = $('.sub_points')
	var sapoints = $('.sap_points')
	var topicpoints = $('.topic_points')
	
    var x = 1; //Initial field counter is 1
	var y = 1;
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append('<div class="col-md-12 mentors"><input type="text" class="form-control col-md-11" name="pname[]" placeholder="Name" required><p class="col-md-1 pull-right close_button" rem="sub_p_rem'+x+'" id="remove_button" align="right"><button class="btn btn-danger btn-sm waves-effect waves-light close_button_remove" type="button"><i class="ti-close"></i></button></p></div>'); //Add field html
			
			$(sapoints).append('<div class="col-md-12 mentors sub_p_rem'+x+'"><input type="file" class="form-control" name="mentor_image[]"></div>'); //Add field html
			$(spoints).append('<div class="col-md-12 mentors sub_p_rem'+x+'"><textarea class="form-control" name="designation[]" rows="5" placeholder="Designation"></textarea> </div>'); //Add field html field html
			$(topicpoints).append('<div class="col-md-12 mentors sub_p_rem'+x+'"><textarea class="form-control desc" name="topic[]" placeholder="Designation"></textarea> </div>'); //Add field html field html
			y++;
			
			$(".desc").summernote({
			  toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline', 'clear']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['height', ['height']]
			  ]
			});
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '#remove_button', function(e){
        e.preventDefault();
		var id =$(this).attr('rem');
		$(this).parent('div').remove(); //Remove field html
		$('.'+id).remove();
        x--; //Decrement field counter
    });
	
	$(wrapper).on('click', '.remove_both', function(e){
		var id =$(this).attr('id');
		var sap =$(this).attr('sap');
		var price =$(this).attr('price');
		var img =$(this).attr('img');
		var topic =$(this).attr('topic');
		//alert(id);
		e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
		$("#"+id).remove();
		$("#"+sap).remove();
		$("#"+price).remove();
		$("#"+img).remove();
		$("#"+topic).remove();
		//$("#rem1").remove();
        x--; //Decrement field counter
    });
	
	 
  });	

	
</script>

