	<?php $this->load->view("admin/back_common/header"); 
$getyear = $this->input->get("year");
?>
<style>
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
	
</style>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">List of Schedules</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span>Schedules</span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	  </div>	
			
			<!-- Row -->
				<div class="row">
              		<form method="get" id="changeYear" action="">
              		<div class="row" style="padding: 16px;">
             			
							<div class="form-group col-md-3">
								<select class="form-control changeYear" name="event">
									<option value="">Select Event</option>
									<? foreach($events as $event){ ?>
										<option value="<?php echo $event->id;?>"><?php echo $event->event_name;?></option>
									<? } ?>
								</select>
							</div>
            				<div class="col-md-3">
            					<a class="btn btn-primary" href="<? echo base_url('admin/schedule') ?>">Clear</a>
            				</div>
             			</form>
             				<div class="col-md-6">
            					<a class="btn btn-info pull-right" href="<? echo base_url('admin/schedule/createSchedule') ?>">Create</a>
            				</div>
             		</div>
              		
               		<div class="col-lg-12 col-xs-12" >
               		   <ul class="nav nav-tabs" role="tablist">
						  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><span>Schedules</span></a></li>
						  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><span>Technical Sessions </span></a></li>
						</ul>
               			<div class="tab-content">
               				<div role="tabpanel" class="tab-pane active" id="home">
								<div class="panel panel-default card-view pa-0">
									<div class="panel-wrapper collapse in">
										<div  class="table-responsive" style="padding:20px;">
												<table class="table-hover display  pb-30" style="width: 1600px;" id="myTable">
													<thead>
														<th>S.no</th>
														<th>Category</th>
														<th style="width:20%;">Speakers</th>
														<th>Event</th>
														<th>Date</th>
														<th style="width:10%;">Schedule Time</th>
														<th>Technical Session</th>
														<th>Topic</th>
														<th>Link</th>
														<th>Status</th>
														<th>Action</th>

													</thead>
													<tbody>
													<?
														$key1 = 1;
														foreach ($alist as $row) {
															$speakers = json_decode($row->mentor_data); 

													?>
														<tr>

															<td><? echo $key1; ?></td>
															<td><? echo implode(",<br>",json_decode($row->category)); ?></td>
															<td>
																<?	if($row->type == "mentor"){
																		foreach ($speakers as $key => $sp) {
																		  	echo ++$key.". ".$sp->mentor_name."<br>".$sp->mentor_designation."<br>";
																		}  
																	}
																?>
															</td>
															<td><? echo $this->db->get_where("tbl_schedule_dates",["id"=>$row->event_id])->row()->event_name; ?></td>
															<td><? echo date("d-m-Y",strtotime($row->schedule_date)); ?></td>
															<td><? echo date("H:i A",strtotime($row->schedule_start_time))." - ".date("H:i A",strtotime($row->schedule_end_time)); ?></td>
															<td><? echo nl2br($row->technical_session); ?></td>
															<td><? echo nl2br($row->description); ?></td>
															<td><? echo $row->join_link; ?></td>
															<td style="padding: 0.5rem;">
															   <?php if($row->status=="Active"){ ?>
															   		<input type="checkbox" data-on-color="info" nav_id="<?php echo $row->id ?>" name="switch" data-off-color="success" class="check" checked>
															   <?php  }elseif($row->status=="Inactive"){ ?>
																	<input type="checkbox" nav_id="<?php echo $row->id ?>" data-on-color="info" name="switch" data-off-color="success" class="check">
															   <?php } ?> 
															</td>
															<td>
																<a href="<? echo base_url("admin/schedule/createSchedule/").$row->id ?>"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
																<a onClick="return confirm('Are you sure want to delete.')" href="<? echo base_url("admin/schedule/deleteSchedule/").$row->id ?>"><i class="fa fa-trash"></i></a>
															</td>

														</tr>
													<? $key1++;}?>
													</tbody>

												</table>


										</div>
									</div>
								</div>
							</div>
							
							<div role="tabpanel" class="tab-pane" id="profile">
								<div class="panel panel-default card-view pa-0">
									<div class="panel-wrapper collapse in">
										<div class="" style="padding:20px;">
										    <div class="row">
										    	<div class="col-md-4">
													<form method="post" action="<? echo base_url('admin/schedule/techinal_create') ?>">
														 <div class="">
															 <label>Techinical Session</label>
															<div class="form-group">
															  <input class="form-control" name="session_name" placeholder="Techinical Session" required>
															</div>
														 </div>
														 <div class="">
															 <label>Events</label>
															<div class="form-group">
															  	<select class="form-control" name="event_id" required>
															  		<option value="">Select Event</option>
																	<? foreach($events as $event){ ?>
																		<option value="<?php echo $event->id;?>"><?php echo $event->event_name;?></option>
																	<? } ?>
																</select>
															</div>
														 </div>
														 
														 <div class="" style="padding-bottom: 20px; margin-top:24px; padding-left: 10px;">

															<button type="submit" class="btn btn-success btnSubmit pull-right"><? echo isset($tech->id) ? 'Update' : 'Submit' ?></button>
														 </div>	
													 </form>
												</div>
												<div class="col-md-8">
													<div class="panel-wrapper collapse in">
								                         <div class="table-responsive" style="padding:20px;">
										                      <table class="table table-hover display  pb-30" id="myTable_test">
										                      	<thead>
																		<th>S.No</th>
																		<th>Technical Session</th>
																		<th>Event Name</th>
																		<th>Action</th>
																	</thead>
																	<tbody>
																<?php $sess = $this->db->order_by("id","desc")->get_where("tbl_technical_sessions")->result();
																                            $key1 = 1;
												                      foreach ($sess as $value) {
									                               ?>
												                               <tr>
																		<td><? echo $key1; ?></td>
																		<td><? echo $value->session_name; ?></td>
																		<td><? echo $this->db->get_where("tbl_schedule_dates",["id"=>$value->event_id])->row()->event_name; ?></td>
																		<td>
																			<a href="javascript:void(0)" class="text-inverse p-r-10 update_user_button" session_name="<? echo $value->session_name ?>" event_id="<? echo $value->event_id ?>" tid="<? echo $value->id ?>"><i class="ti-marker-alt"></i></a>
																			&nbsp;&nbsp;
																			<a onClick="return confirm('Are you sure want to delete.')" href="<? echo base_url("admin/schedule/del_sess/").$value->id ?>"><i class="fa fa-trash"></i></a>
															            </td>
																	</tr>
																<?php $key1++; } ?>

																	</tbody>

										                      </table>
										                    </div>
										                </div>
										            </div>

											
												</div>
											</div>
										</div>
								    </div>
							    </div>
						    </div>
						</div>
					</div>
				</div>
	
			<div class="modal fade" id="updateModal" role="dialog">
            <div class="modal-dialog">
                <form method="post" action="<?php echo base_url('admin/schedule/techinal_create');?>">
                    <div class="modal-content">
                        <div class="alert alert-success" style="display:none" id="smsg"></div>
                        <div class="alert alert-danger" style="display:none" id="emsg"></div>
                        <div class="modal-header">
							<h6 style="color: black">Update Technical Session</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
<!--						<h6 class="modal-title">Update Techinical Session</h6>-->
                        <div class="modal-body">

                            <input type="hidden" class="tid" name="tid">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-form-label">Techinical Session</label>
                                <input type="text" class="form-control session_name" name="session_name" required>
                            </div>
                            <div class="form-group">
								<select class="form-control event_id" name="event_id" required>
									<option value="">Select Event</option>
									<? $event_name = $this->db->order_by("id","desc")->get("tbl_schedule_dates")->result();
										foreach($event_name as $event){ ?>
										<option value="<?php echo $event->id;?>"><?php echo $event->event_name;?></option>
									<? } ?>
								</select>
							</div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
<!--                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                        </div>
                    </div>
                </form>
            </div>
            <!--.modal-dialog-->
        <!-- </div>																
    </div> -->

				<!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: grey">Update Scheduled Date</h4>
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
	
	$(".mode").change(function(){
		var mode = $(this).val();
		if(mode == "offline"){
			$(".event_address").show();
		}else{
			$(".event_address").hide();
		}
	})
	
	$("input[type='checkbox']").bootstrapSwitch({size : 'mini'});
	$('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
//            'pdfHtml5'
        ], 
    } );
    $('#myTable_test').DataTable();
    $('#myTable').on('switchChange.bootstrapSwitch','input[name="switch"]', function (e, state) {
		var nav_id = $(this).attr("nav_id"); 
		var status;

		if ($(this).is(":checked")){
			status = "Active";
		}else{
			status = "Inactive";
		}
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>admin/schedule/updateSchedulestatus",
			data:{id:nav_id,status:status},
			success:function (data){
				location.reload(true);
			}

		});  
	});	
	
$(".editDate").click(function(){
	
	if($(this).attr("mode") == "offline"){
		$(".event_address").show();
	}
	
	$("#sch_id").val($(this).attr("id"));
	$("#schedule_year").val($(this).attr("year"));
	$("#sdate").val($(this).attr("sdate"));
	$("#edate").val($(this).attr("edate"));
	$("#sdate1").val($(this).attr("sdate1"));
	$("#edate1").val($(this).attr("edate1"));
	$("#mode").val($(this).attr("mode"));
	$("#event_start_time").val($(this).attr("event_start_time"));
	$("#event_end_time").val($(this).attr("event_end_time"));
	$("#event_address").val($(this).attr("event_address"));
	$("#event_name").val($(this).attr("event_name"));
	$("#myModal").modal("show");
	
})	
	
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
<script type="text/javascript">

$(document).ready(function() {
    $(".update_user_button").click(function() {
        $(".session_name").val($(this).attr('session_name'));
        $(".event_id").val($(this).attr('event_id'));
        $(".tid").val($(this).attr('tid'));
        $("#updateModal").modal();
    });
});




$(document).ready(function() {
    $("#addeditinstitute_update").on('submit', function(e) {
        
        e.preventDefault();
        var formData = new FormData(this);
        var url = $('#url2').val();
        $.ajax({
            url: url,
            data: formData,
            type: "post",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader").show();
            },
            success: function(str) {
                console.log(str);
                $("#loader").hide();
                if (str.Status == 'Active') {
                    $("#smsg").show();
                    $("#smsg").html(str.Message);
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    $("#emsg").show();
                    $("#emsg").html(str.Message);
                }
            }
        });
    });

});

</script>

<script type="text/javascript">

	$(".changeYear").change(function(){
		
		$("#changeYear").submit();
		
	})
	
</script>











