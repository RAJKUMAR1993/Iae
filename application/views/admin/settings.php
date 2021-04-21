
	<?php $this->load->view("admin/back_common/header"); ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li><a href="<?php echo base_url() ?>admin/speakers">Settings</a></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>	
			
			<!-- Row -->
				<div class="row">
               		<div class="col-lg-12 col-xs-12" >
               		
               			<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Settings</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div  class="tab-struct custom-tab-1">
										<ul role="tablist" class="nav nav-tabs" id="myTabs_7">
											<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#home_7">Participants Count</a></li>
											<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_7" role="tab" href="#profile_7" aria-expanded="false">Promocodes</a></li>
										</ul>
										<div class="tab-content" id="myTabContent_7">
											<div id="home_7" class="tab-pane fade active in" role="tabpanel">
											   <form method="post" action="<? echo base_url('admin/settings/updatePcount') ?>">
												<div class="form-content">
													<? echo $this->session->flashdata("emsg") ?>
													<div id="error"></div>

												  <div class="col-md-3">
													<label>Participants Count</label>
													<div class="form-group">
													  <input type="text" class="form-control" placeholder="Participants Count" value="<? echo $this->admin->get_option("participants_count") ?>" name="pcount" required>
													</div>
												  </div>
												  <div class="col-md-12" style="padding-bottom: 20px">
													<button type="submit" class="btn btn-success btn-sm pull-left">Submit</button>
												  </div>	
												</div>
											  </form>
											</div>
											<div id="profile_7" class="tab-pane fade" role="tabpanel">

												<form method="post" action="<? echo base_url('admin/settings/createPromocode') ?>">
												 <div class="row" style="padding: 20px">
													<div class="col-md-3">
														<label>Promocode</label>
														<div class="form-group">
															<input type="text" name="promocode" value="<? echo strtoupper(random_string("alnum",6)) ?>" class="form-control" readonly required>
														</div>
													</div>
													<div class="col-md-3">
														<label>Amount</label>
														<div class="form-group">
															<input type="number" placeholder="amount" name="amount" class="form-control" required>
														</div>
													</div>
													<div class="col-md-4">
														<label>Select Start & End Date :</label>
														<div class="form-group">
															<div class="input-daterange input-group date-range">
																<input type="text" class="form-control" name="startDate" placeholder="Start Date" autocomplete="off" required>
																<div class="input-group-append">
																	<span class="input-group-text bg-info b-0 text-white">TO</span>
																</div>
																<input type="text" class="form-control" name="endDate" placeholder="End Date" autocomplete="off" required/>
															</div>
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>
													</div>

												</div>
												</form>
												<div class="panel-wrapper collapse in">
													<div class="table-responsive" style="padding:20px;">
															<table class="table table-hover display  pb-30" id="myTable">
																<thead>
																	<th>S.no</th>
																	<th>Promocode</th>
																	<th>Amount</th>
																	<th>Start Date</th>
																	<th>End Date</th>
																	<th>Status</th>
																	<th>Action</th>
																</thead>
																<tbody>
																<?
																	$key = 1;
																	$promocodes = $this->db->order_by("id","desc")->get_where("tbl_promocodes")->result();
																	foreach ($promocodes as $drow){

																?>
																	<tr>

																		<td><? echo $key; ?></td>
																		<td><? echo $drow->promocode; ?></td>
																		<td><? echo $drow->amount; ?></td>
																		<td><? echo date("d-m-Y",strtotime($drow->start_date)); ?></td>
																		<td><? echo date("d-m-Y",strtotime($drow->end_date)); ?></td>
																		<td style="padding: 0.5rem;">
																		   <?php if($drow->status=="Active"){ ?>
																				<input type="checkbox" data-on-color="info" nav_id="<?php echo $drow->id ?>" name="switch" data-off-color="success" class="check" checked>
																		   <?php  }elseif($drow->status=="Inactive"){ ?>
																				<input type="checkbox" nav_id="<?php echo $drow->id ?>" data-on-color="info" name="switch" data-off-color="success" class="check">
																		   <?php } ?> 
																		</td>
																		<td>
																			<a href="javascript:void(0)" class="editDate" promocode="<? echo $drow->promocode ?>" amount="<? echo $drow->amount ?>" sdate="<? echo $drow->start_date ?>" edate="<? echo $drow->end_date ?>" id="<? echo $drow->id ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
																			<a href="<? echo base_url('admin/settings/delPromocode/').$drow->id ?>" onClick="return confirm('Are you sure want to delete.')"><i class="fa fa-trash"></i></a>
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
        <h4 class="modal-title" style="color: grey">Update Promocode</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<? echo base_url('admin/settings/createPromocode') ?>">
			
			<div class="form-group">
				<label>Promocode</label>
				<input type="text" name="promocode" value="" id="promocode" class="form-control" readonly required>
			</div>
			
			<div class="form-group">
				<label>Amount</label>
				<input type="number" placeholder="amount" name="amount" id="amount" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Select Start & End Date :</label>
				<div class="input-daterange input-group date-range">
					<input type="text" class="form-control" name="startDate" id="sdate" placeholder="Start Date" autocomplete="off" required>
					<div class="input-group-append">
						<span class="input-group-text bg-info b-0 text-white">TO</span>
					</div>
					<input type="text" class="form-control" name="endDate" id="edate" placeholder="End Date" autocomplete="off" required/>
				</div>
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
			url:"<?php echo base_url();?>admin/settings/updatePromostatus",
			data:{id:nav_id,status:status},
			success:function (data){
//				location.reload(true);
			}

		});  
	});	

	$(".editDate").click(function(){

		if($(this).attr("mode") == "offline"){
			$(".event_address").show();
		}

		$("#sch_id").val($(this).attr("id"));
		$("#promocode").val($(this).attr("promocode"));
		$("#sdate").val($(this).attr("sdate"));
		$("#edate").val($(this).attr("edate"));
		$("#amount").val($(this).attr("amount"));
		$("#myModal").modal("show");

	});
	jQuery('.date-range').datepicker({
        toggleActive: true,
		minDate: 0,
		dateFormat: "dd-mm-yy",
	 });
	
</script>










