<?php $this->load->view("admin/back_common/header"); ?>
	
<style>

	.note-btn{
		padding: 5px !important;
	}	
	
	
	.input-group-text{
		height: 41px;
	}

</style>		

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark"><? echo isset($s->id) ? 'Update' : 'Add' ?> Event</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li><a href="<?php echo base_url() ?>admin/schedule/events">Events</a></li>
				<li class="active"><span><? echo isset($s->id) ? 'Update' : 'Add' ?> Event </span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>	
			
			<!-- Row -->
				<div class="row">
              		<div id="smsg"></div>
               		<div class="col-lg-12 col-xs-12" >
						<div class="panel panel-default card-view">
						
							<div class="panel-wrapper collapse in">
						        
						        <div class="container-fluid">
						        
									<form method="post" id="formsubmit" enctype="multipart/form-data">
									 <div class="row">
										<div class="col-md-3">
											<label>Event Type:</label>
											<div class="form-group">
												<select name="event_type" class="form-control" id="" required>
													<option value="">Select Event Type</option>
													<? $etypes = json_decode($this->admin->get_option("event_types")); 
													   
								   					   foreach($etypes as $et){
														   $etsel = ($s->event_type == $et) ? 'selected' : '';
														   echo '<option value="'.$et.'" '.$etsel.'>'.$et.'</option>';
													   }	
													?>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<label>Year</label>
											<div class="form-group">
												<input type="text" name="year" class="form-control" value="<? echo isset($s->year) ? $s->year : '' ?>" required>
											</div>
										</div>
										
										<div class="col-md-3">
											<label>Event Start Time:</label>
											<div class="form-group">
												<input type="time" name="event_start_time" value="<? echo isset($s->event_start_time) ? date("H:i",$s->event_start_time) : '' ?>" class="form-control" required>
											</div>
										</div>
										<div class="col-md-3">
											<label>Event End Time:</label>
											<div class="form-group">
												<input type="time" name="event_end_time" value="<? echo isset($s->event_end_time) ? date("H:i",$s->event_end_time) : '' ?>" class="form-control" required>
											</div>
										</div>
										
										<div class="col-md-5">
											<label>Select event Start & End Date :</label>
											<div class="form-group">
												<div class="input-daterange input-group date-range">
													<input type="text" class="form-control" name="startDate" value="<? echo isset($s->event_start_date) ? date("m/d/Y",strtotime($s->event_start_date)) : '' ?>" placeholder="Start Date" autocomplete="off" required>
													<div class="input-group-append">
														<span class="input-group-text bg-info b-0 text-white">TO</span>
													</div>
													<input type="text" class="form-control" name="endDate" value="<? echo isset($s->event_end_date) ? date("m/d/Y",strtotime($s->event_end_date)) : '' ?>" placeholder="End Date" autocomplete="off" required/>
												</div>
											</div>
										</div>
										<div class="col-md-5">
											<label>Select registration Start & End Date :</label>
											<div class="form-group">
												<div class="input-daterange input-group date-range">
													<input type="text" class="form-control" name="startDate1" value="<? echo isset($s->registration_start_date) ? date("m/d/Y",strtotime($s->registration_start_date)) : '' ?>" placeholder="Start Date" autocomplete="off" required>
													<div class="input-group-append">
														<span class="input-group-text bg-info b-0 text-white">TO</span>
													</div>
													<input type="text" class="form-control" name="endDate1" value="<? echo isset($s->registration_end_date) ? date("m/d/Y",strtotime($s->registration_end_date)) : '' ?>" placeholder="End Date" autocomplete="off" required/>
												</div>
											</div>
										</div>
										
										<div class="col-md-2">
											<label>Type of Institution:</label>
											<div class="form-group">
												<select name="institution_type" class="form-control" required>
													<option value="">Select</option>
													<option value="Active" <? echo ($s->institution_type == "Active") ? 'selected' : ''; ?>>Enable</option>
													<option value="Inactive" <? echo ($s->institution_type == "Inactive") ? 'selected' : ''; ?>>Disable</option>
												</select>
											</div>
										</div>										
										<div class="col-md-3">
											<label>Technical Session:</label>
											<div class="form-group">
												<select name="technical_session" class="form-control" required>
													<option value="">Select</option>
													<option value="Active" <? echo ($s->technical_session == "Active") ? 'selected' : ''; ?>>Enable</option>
													<option value="Inactive" <? echo ($s->technical_session == "Inactive") ? 'selected' : ''; ?>>Disable</option>
												</select>
											</div>
										</div>
										
										<div class="col-md-3">
											<label>Director Signature:</label>
											<div class="form-group">
												<input type="file" name="director_signature" class="form-control">
												<small style="color: red">Note : Please Upload 210*60px Image</small>
											</div>
										</div>
										<div class="col-md-3">
											<label>Commissioner Signature:</label>
											<div class="form-group">
												<input type="file" name="commissioner_signature" class="form-control">
												<small style="color: red">Note : Please Upload 210*60px Image</small>
											</div>
										</div>
										<div class="col-md-3">
											<label>Mode:</label>
											<div class="form-group">
												<select name="mode" class="form-control mode" id="" required>
													<option value="">Select Mode</option>
													<option value="online" <? echo ($s->event_mode == "online") ? 'selected' : ''; ?>>Online</option>
													<option value="offline" <? echo ($s->event_mode == "offline") ? 'selected' : ''; ?>>Offline</option>
												</select>

											</div>
										</div>
										
										
									</div>
									<div class="row">
										<div class="col-md-3 event_address" id="" style="display: <? echo ($s->event_mode == "offline") ? 'block' : 'none'; ?>">
											<label>Event Address:</label>
											<div class="form-group">
												<textarea name="event_address" rows="4" class="form-control"><? echo isset($s->event_address) ? $s->event_address : '' ?></textarea>
											</div>
										</div>
										<div class="col-md-3">
											<label>Event Name</label>
											<div class="form-group">
												<textarea name="event_name" rows="4" class="form-control"><? echo isset($s->event_name) ? $s->event_name : '' ?></textarea>
											</div>
										</div>
										<div class="col-md-5">
											<label>Event Certificate Title:</label>
											<div class="form-group">
												<textarea name="event_certificate_title" rows="4" class="form-control desc"><? echo isset($s->event_certificate_title) ? $s->event_certificate_title : '' ?></textarea>
											</div>
										</div>
										
										<div class="col-md-3">
											<label>Mobile Numbers:</label>
											<div class="form-group">
												<textarea name="mobile_numbers" rows="4" class="form-control" required><? echo isset($s->mobile_numbers) ? $s->mobile_numbers : '' ?></textarea>
											</div>
										</div>
										<div class="col-md-3">
											<label>Phone No:</label>
											<div class="form-group">
												<input type="text" required name="phone_number" value="<? echo isset($s->phone_number) ? $s->phone_number : '' ?>" placeholder="Phone Number" class="form-control">
											</div>
										</div>
										<div class="col-md-3">
											<label>Whatsapp No:</label>
											<div class="form-group">
												<input type="text" required name="whatsapp_number" value="<? echo isset($s->whatsapp_number) ? $s->whatsapp_number : '' ?>" placeholder="Whatsapp Number" class="form-control">
											</div>
										</div>
										<div class="col-md-3">
											<label>Email:</label>
											<div class="form-group">
												<input type="email" required name="event_email" value="<? echo isset($s->event_email) ? $s->event_email : '' ?>" placeholder="Email ID" class="form-control">
											</div>
										</div>
										
										<div class="col-md-1">
											<input type="hidden" name="id" value="<? echo isset($s->id) ? $s->id : '' ?>">
											<button type="submit" class="btn btn-primary" style="margin-top: 24px; margin-left: -10px;">Submit</button>
										</div>
										
										<? if(($s->director_signature != "") && ($s->commissioner_signature != "")){ ?>
											<div class="col-md-2" style="margin-top: 25px;">
												<p><strong>Director Sign</strong> : <br><img src="<? echo base_url().$s->director_signature ?>" class="img-responsive"><br></p>
												<p><strong>Commissioner Sign</strong> : <br><img src="<? echo base_url().$s->commissioner_signature ?>" class="img-responsive"><br></p>
											</div>
										<? } ?>
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
		$(".desc").summernote({
		  toolbar: [
			// [groupName, [list of button]]
			  ['style', ['style']],
			  ['font', ['bold', 'underline', 'clear']],
			  ['fontname', ['fontname']],
			  ['color', ['color']],
			  ['para', ['ul', 'ol', 'paragraph']],
			  ['table', ['table']],
			  ['view', ['fullscreen', 'codeview', 'help']],
		  ],
		  height : 150	
		});
		
		 jQuery('.date-range').datepicker({
			toggleActive: true,
			minDate: 0,
			dateFormat: "dd-mm-yy",
		 });
	});
	
	$(".mode").change(function(){
		var mode = $(this).val();
		if(mode == "offline"){
			$(".event_address").show();
		}else{
			$(".event_address").hide();
		}
	})
	
	$("#formsubmit").on('submit', function(e){
       e.preventDefault();
       var fdata = new FormData(this);
       var url = '<?php echo base_url("admin/schedule/createScheduledate") ?>';
        //alert(fdata);
       $.ajax({
			url:url,
			data:fdata,
			type:"post",
			dataType:"json",
			processData:false,
			contentType:false,
			cache:false,
			beforeSend: function(){
			  $("#loader").show();
			},
			success: function(str){
			  console.log(str);
			  $("#loader").hide();
			  if(str.Status == 'Success'){
				$("#smsg").show();
				$("#smsg").html(str.Message);
				setTimeout(function(){ $("#smsg").hide(); location.reload(); }, 3000);
			  }else{
				$("#smsg").show();
				$("#smsg").html(str.Message);
			  }
			}
        });
    });
	
	
</script>

