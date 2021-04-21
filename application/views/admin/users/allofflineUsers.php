	<?php $this->load->view("admin/back_common/header"); ?>

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<?php 		$offline = $this->db->order_by("id","desc")->get_where("tbl_registrations",["participants >"=>0,"type"=>"offline"])->row();	
 ?>
			<h5 class="txt-dark">List of <?php  echo $offline->type;?> Users</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span>Offline Registered Users</span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>	
			
			<!-- Row -->
			<div class="row">
              		
              		<div class="row">
             			<form method="get" id="changeYear" action="">
						 <div class="form-group col-md-5">
								<select class="form-control  changeYear" name="id">
									<option value="">Select Event</option>
									<? $event_name = $this->db->order_by("id","desc")->group_by("event_name")->get(" tbl_schedule_dates")->result();
									   $name_event = $this->input->get("id");
										foreach($event_name as $event){ ?>
											  <option <?php if($name_event==$event->id){ echo 'selected';}?> value="<?php echo $event->id;?>"><?php echo $event->event_name;?></option>
											
										<? } ?>
								</select>
							</div>
            				<div class="col-md-3">
            					<a class="btn btn-primary" href="<? echo base_url('admin/users/offlineusers') ?>">Clear</a>
            				</div>
							<input type="hidden" name="category" value="<?php echo $this->input->get('category'); ?>" />

             			</form>
             		</div>
              		
              		<div class="row">

						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-default card-view pa-0 bg-gradient">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="weight-500 uppercase-font block font-13 txt-light">No'of Institutions Registered</span><br>
														<span class="weight-600 uppercase-font block font-18 txt-light"><? 
															// if($getyear){
															// 	echo $this->db->get_where("tbl_registrations",["YEAR(created_date)"=>$getyear])->num_rows(); 
															// }else{
															// 	echo $this->db->get_where("tbl_registrations")->num_rows(); 
															// }
															echo count($alist);
															?></span>									
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
														<i class="fa fa-university  data-right-rep-icon txt-light"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-default card-view pa-0 bg-gradient1">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="weight-500 uppercase-font block font-13 txt-light">Number of Participants</span><br>
														<span class="weight-600 uppercase-font block font-18 txt-light"><? 
															
															// $pcheckYear = ($getyear != "") ? "where YEAR(r.created_date)=$getyear" : '';
															// echo ($this->db->query("SELECT * FROM tbl_participants p JOIN tbl_registrations r ON r.id=p.inst_id $pcheckYear ORDER BY p.inst_id DESC")->num_rows())+count($alist); 
															echo $participants_count->participants+count($alist);
															?></span>									
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
														<i class="icon-people  data-right-rep-icon txt-light"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-default card-view pa-0 bg-gradient3">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="weight-500 uppercase-font block font-13 txt-light">Total Amount Received</span><br>
														<span class="weight-600 uppercase-font block font-18 txt-light"><i class="fa fa-rupee"></i> <?
															
															echo $this->admin->moneyFormatIndia($total_amount->totalPrice);
															// $checkYear = ($getyear != "") ? "where YEAR(created_date)=$getyear" : '';
															//echo number_format($this->db->query("SELECT SUM(totalPrice) as total FROM tbl_registrations $checkYear")->row()->total,2); ?></span>									
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
														<i class="icon-people  data-right-rep-icon txt-light"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
             		
             		
              		
               		<div class="col-lg-12 col-xs-12" >
						<div class="panel panel-default card-view pa-0">
						
							<div class="panel-wrapper collapse in">
								<div class="table-responsive" style="padding:20px;">
									
										<table class="table table-hover display  pb-30" id="myTable">
											<thead>
												<th>S.no</th>
												<th>Action</th>
												<th>Event Name</th>
												<th>Serial Number</th>
												<th>Registration Year</th>
												<th>Date of Registration</th>
												<th>Name of the Institution</th>
												<th>Organization Email ID</th>
												<th>Website</th>
												<th>Address</th>
												<th>Name of the Contact Person</th>
												<th>Contact Person Mobile No.</th>
												<th>Contact Person Email ID</th>
												<th>Category of the Institution</th>
												<th>Management Details</th>
												<th>Number of Participants</th>
												<th>Participants</th>
												<th>Serial Number</th>
												<th>Name</th>
												<th>Designation & Department</th>
												<th>Mobile</th>
												<th>Email</th>
												<th>Amount Paid</th>
												<th>Date of Transaction</th>
												<th>Transaction ID</th>
												<th>Payment Reference ID</th>
												
											</thead>
											<tbody>
											<?
												$key = 1;
					   							
					   							$tamount = array();
					   							$tpar = array();
					   
												foreach ($alist as $row) {
													
													$odata = $this->db->get_where("tbl_orders",array("order_id"=>$row->order_id))->row();
													if($odata->payment_type == "offline"){ 
														$pchk = [];	

														
														?>
														

														<tr>
														
														<td><? echo (count($pchk) == 0) ? $key : "";?></td>
														<td><? if(count($pchk) == 0){ ?>
														<a href="<? echo base_url("admin/users/viewUser/").$row->id?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
														<a href="<? echo base_url("admin/users/updateOrder/").$row->order_id ?>"><i class="fa fa-edit"></i></a>
														<? } ?>
												     	</td>
														<td><? echo (count($pchk) == 0) ? $events : "";?></td>
														<td><? echo (count($pchk) == 0) ? $row->serial_number : "";?></td>
														<td><? echo (count($pchk) == 0) ? $row->register_year : "";?></td>
														<td><? echo (count($pchk) == 0) ? date("d-M-Y",strtotime($row->created_date)) : "";?></td>
														<td><? echo (count($pchk) == 0) ? $row->institutionName : "";?></td>
														<td><? echo (count($pchk) == 0) ? $row->orgemail : "";?></td>
														<td><? if(count($pchk) == 0){ ?><a href="<? echo $row->website;?>" target="_blank"><? echo $row->website;?></a><? } ?></td>
														<td><? echo (count($pchk) == 0) ? nl2br($row->address) : "";?></td>
														<td><? echo (count($pchk) == 0) ? $row->cpname : "";?></td>
														<td><? echo (count($pchk) == 0) ? $row->mobile : "";?></td>
														<td><? echo (count($pchk) == 0) ? $row->email : "";?></td>
														<td><? echo (count($pchk) == 0) ? implode(",",json_decode($row->categories,true)) : "";?></td>
														<td><? echo (count($pchk) == 0) ? implode(",",json_decode($row->managementdetails,true)) : "";?></td>
														<td><? echo (count($pchk) == 0) ? $row->participants : ""; ?></td>
													
														<td><? //echo $pc+1; ?></td>
														<td><? //echo $p->serial_number ?></td>
														<td><? //echo $p->pname ?></td>
														<td><? //echo $p->designation ?></td>
														<td><? //echo $p->pmobile ?></td>
														<td><? //echo $p->pemail ?></td>
													
													<td><? echo (count($pchk) == 0) ? '<i class="fa fa-rupee"></i> '.$odata->total_amount : "";?></td>
													<td><? echo (count($pchk) == 0) ? date("d-M-Y",strtotime($odata->payment_date)) : "";?></td>
													<td><? echo (count($pchk) == 0) ? $odata->order_id : "";?></td>
													<td><? echo (count($pchk) == 0) ? $odata->txn_id : "";?></td>
													<td><? if(count($pchk) == 0){ ?>
														<a href="<? echo base_url("admin/users/viewUser/").$row->id?>"><i class="fa fa-eye"></i></a><? } ?>
													</td>
													
												</tr>



													<?php	$part = $this->db->get_where("tbl_participants",array("inst_id"=>$row->id))->result();
														$tamount[] = $odata->total_amount;
														$tpar[] = $row->participants;
														
													
													foreach($part as $pc => $p){
													//	$year = $this->db->where("register_year" ,$row->register_year)->get_where("tbl_registrations")->row()->register_year;
											
							$events = $this->db->get_where("tbl_schedule_dates", array("id"=>$row->event_name))->row()->event_name;   	
											?>

												
												<tr>
												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
												         <td></td>
												        <td>Participant <? echo $pc+1; ?>:</td>
														<td><? echo $p->serial_number ?></td>
														<td><? echo $p->pname ?></td>
														<td><? echo $p->designation ?></td>
														<td><? echo $p->pmobile ?></td>
														<td><? echo $p->pemail ?></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
												
												</tr>
											<? 
													$pchk[] = $p->pname;
													
													} $key++;}}?>
											</tbody>
											
											<tfoot>
												<tr>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th style="font-size: 14px" class="totalUsers"><strong><? echo array_sum($tpar); ?></strong></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th style="font-size: 14px" colspan="2"><strong><i class="fa fa-rupee"></i> <? echo $this->admin->moneyFormatIndia(array_sum($tamount)); ?></strong></th>
													<th></th>
													<th></th>
													<th></th>
												</tr>
											</tfoot>
										</table>
									
									
								</div>
							</div>
						</div>
							
					</div>
				</div>

				<!-- /Row -->
				<? $this->load->view( "admin/back_common/footer" ); ?>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>


<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
//            'pdfHtml5'
        ],
		"order": false,
		"pageLength" : 100 
    } );
} );
</script>


<script type="text/javascript">
	$(".changeYear").change(function(){
		$("#changeYear").submit();
	})
</script>












