	<?php $this->load->view("admin/back_common/header"); 
     $getyear = $this->input->get("year");
?>



	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">List of Events</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span>Events</span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>	
			
			<!-- Row -->
				<div class="row">
              		<div class="row" style="padding: 16px;">
             			<div class="col-md-6"></div>
						<div class="col-md-6">
							<a class="btn btn-info pull-right" href="<? echo base_url('admin/schedule/createEvent') ?>">Create</a>
						</div>
             		</div>
              		
               		<div class="col-lg-12 col-xs-12" >
               		   <ul class="nav nav-tabs" role="tablist">
<!--						  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><span>Schedules</span></a></li>-->
						  <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><span>Events</span></a></li>
						</ul>
               			<div class="tab-content">
               			
							<div role="tabpanel" class="tab-pane active" id="profile">
								<div class="panel panel-default card-view pa-0">
									
									<div class="panel-wrapper collapse in">
										<div  class="table-responsive" style="padding:20px;">
												<table class="table table-hover display  pb-30" id="myTable1">
													<thead>
														<th>S.no</th>
														<th>Action</th>
														<th>Event Name</th>
														<th>Year</th>
														<th>Event Date</th>
														<th>Registration Date</th>
														<th>Time</th>
														<th>Event Type</th>
														<th>Mode</th>
														<th>Type of institution</th>
														<th>Technical Session</th>
														<th>Event Address</th>
														<th>Status</th>
														
													</thead>
													<tbody>
													<?
														$key = 1;
											  			$scheduled_dates = $this->db->order_by("id","desc")->get_where("tbl_schedule_dates")->result();
														foreach ($scheduled_dates as $drow) {

													?>
														<tr>
															<td><? echo $key; ?></td>
															<td>
															<a href="<?php echo base_url("admin/schedule/add_edit_event/") .$drow->event_type.'/' .$drow->id ;?>" ><i class="fa fa-eye"></i></a>														
															<a href="<? echo base_url('admin/schedule/createEvent/').$drow->id ?>"><i class="fa fa-edit"></i></a>
															<a href="<? echo base_url('admin/schedule/delScheduledate/').$drow->id ?>" onClick="return confirm('Are you sure want to delete.')"><i class="fa fa-trash"></i></a>
															</td>
															<td><? echo $drow->event_name; ?></td>
															<td><? echo $drow->year; ?></td>
															<td class="font-weight-bold">Start :<small><? echo $drow->event_start_date; ?></small><br> <samp class="font-weight-bold">End :<? echo $drow->event_end_date; ?> </samp></td>
															<td class="font-weight-bold">Start :<small><? echo $drow->registration_start_date; ?></small><br><samp class="font-weight-bold">End :<? echo $drow->registration_end_date; ?></samp></td>
															<td><? echo date("h:i A",$drow->event_start_time)." ".date("h:i A",$drow->event_end_time); ?></td>
															<td><? echo $drow->event_type; ?></td>
															<td><? echo nl2br($drow->event_mode); ?></td>
															<td><? echo ($drow->institution_type == 'Active') ? '<label class="label label-success">Enabled</label>' : '<label class="label label-danger">Disabled</label>'?></td>
															<td><? echo ($drow->technical_session == 'Active') ? '<label class="label label-success">Enabled</label>' : '<label class="label label-danger">Disabled</label>'?></td>
															<td><? echo nl2br($drow->event_address); ?></td>
															<td style="padding: 0.5rem;">
															   <?php if($drow->status=="Active"){ ?>
															   		<input type="checkbox" data-on-color="info" nav_id="<?php echo $drow->id ?>" name="switch" data-off-color="success" class="check" checked>
															   <?php  }elseif($drow->status=="Inactive"){ ?>
																	<input type="checkbox" nav_id="<?php echo $drow->id ?>" data-on-color="info" name="switch" data-off-color="success" class="check">
															   <?php } ?> 
															</td>
															

														</tr>
													<? $key++;}?>
													</tbody>

												</table>


										</div>
									</div>
								</div>

							</div>

						</div>
							
					</div>
				</div>

				<!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: grey">Update Event</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<? echo base_url('admin/schedule/createScheduledate') ?>">
			<div class="form-group">
				<label>Event Name</label>
				<input type="text" name="event_name" class="form-control" id="event_name" required>
			</div>
			<div class="form-group">
				<label>Year</label>
				<input type="text" name="year" class="form-control" id="schedule_year" required>
			</div>
			<div class="form-group">
				<label>Select event Start & End Date :</label>
				<div class="input-daterange input-group date-range">
					<input type="text" class="form-control" name="startDate" id="sdate" placeholder="Start Date" autocomplete="off" required>
					<div class="input-group-append">
						<span class="input-group-text bg-info b-0 text-white">TO</span>
					</div>
					<input type="text" class="form-control" name="endDate" id="edate" placeholder="End Date" autocomplete="off" required/>
				</div>
			</div>
			<div class="form-group">
				<label>Select registration Start & End Date :</label>
				<div class="input-daterange input-group date-range">
					<input type="text" class="form-control" name="startDate1" id="sdate1" placeholder="Start Date" autocomplete="off" required>
					<div class="input-group-append">
						<span class="input-group-text bg-info b-0 text-white">TO</span>
					</div>
					<input type="text" class="form-control" name="endDate1" id="edate1" placeholder="End Date" autocomplete="off" required/>
				</div>
			</div>
			<div class="form-group">
				<label>Event Start Time:</label>
				<input type="time" name="event_start_time" id="event_start_time" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Event End Time:</label>
				<input type="time" name="event_end_time" id="event_end_time" class="form-control" required>
			</div>
			
			<div class="form-group">
				<label>Event Type:</label>
				<select name="event_type" class="form-control" id="event_type" required>
					<option value="">Select Event Type</option>
					<? $etypes = json_decode($this->admin->get_option("event_types")); 
					   foreach($etypes as $et){
						   echo '<option value="'.$et.'">'.$et.'</option>';
					   }	
					?>
				</select>
			</div>
			
			<div class="form-group">
			<label>Type of Institution:</label>
				<select name="institution_type" class="form-control" id="institution_type" required>
					<option value="">Select</option>
					<option value="Active">Enable</option>
					<option value="Inactive">Disable</option>
				</select>
			</div>
			
			<div class="form-group">
			<label>Technical Session:</label>
				<select name="technical_session" class="form-control" id="technical_session" required>
					<option value="">Select</option>
					<option value="Active">Enable</option>
					<option value="Inactive">Disable</option>
				</select>
			</div>
			<div class="form-group">
				<label>Mode:</label>
				<select name="mode" class="form-control mode" id="mode" required>
					<option value="">Select Mode</option>
					<option value="online">Online</option>
					<option value="offline">Offline</option>
				</select>
			</div>
			<div class="form-group event_address" style="display: none">
				<label>Event Address:</label>
				<textarea name="event_address" rows="4" id="event_address" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<input type="hidden" name="id" id="sch_id">
				<button type="submit" class="btn btn-primary" style="margin-top: 20px;">Update</button>
			</div>
		</form>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">
	
	$("input[type='checkbox']").bootstrapSwitch({size : 'mini'});
	$('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
//            'pdfHtml5'
        ], 
    });
    $('#myTable1').on('switchChange.bootstrapSwitch','input[name="switch"]', function (e, state) {
		var nav_id = $(this).attr("nav_id"); 
		var status;

		if ($(this).is(":checked")){
			status = "Active";
		}else{
			status = "Inactive";
		}
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>admin/schedule/updateEventstatus",
			data:{id:nav_id,status:status},
			success:function (data){
				location.reload(true);
			}

		});  
	});	
	
	
$(document).ready( function () {
    
	$('#myTable1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
//            'pdfHtml5'
        ], 
    });
	
	 jQuery('.date-range').datepicker({
        toggleActive: true,
		minDate: 0,
		dateFormat: "dd-mm-yy",
	 });	
} );
</script>










