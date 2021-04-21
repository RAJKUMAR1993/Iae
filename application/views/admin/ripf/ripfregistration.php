<?php $this->load->view("admin/back_common/header");
$getyear = $this->input->get("year");

?>

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		
			<h5 class="txt-dark">List of <?php // echo $online->type;?> RIPF </h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>

				<li class="active"><span>Ripf Registered Users</span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>

			<!-- Row -->
				<div class="row">

              		<div class="row">
             			<form  id="" action="">
						 <div class="form-group col-md-3">
								<select class="form-control " name="category">
									<option value="">Select Category</option>
									<? $cat_name = $this->db->order_by("id","asc")->group_by("category_name")->get("tbl_ripf_categories")->result();
									 	$ctgry = $this->input->get("category");
										foreach($cat_name as $categoery){ 
											$cname = str_replace(" ","-",$categoery->category_name);
									?>
										  <option <?php if($ctgry==$cname){ echo 'selected';}?> value="<?php echo $cname;?>"><?php echo $categoery->category_name;?></option>

									<? } ?>
								</select>
							</div>
							 <div class="form-group col-md-6">
								<select class="form-control " name="id">
									<option value="">Select Event</option>
									<? $evnt_name = $this->db->order_by("id","desc")->group_by("event_name")->get_where(" tbl_schedule_dates",["event_type"=>"RIPF"])->result();
									 $name_event = $this->input->get("id");
										foreach($evnt_name as $event){ ?>
											  <option <?php if($name_event==$event->id){ echo 'selected';}?> value="<?php echo $event->id;?>"><?php echo $event->event_name;?></option>

										<? } ?>
								</select>
							</div>



            				<div class="col-md-3">

                                  <button type="submit" class="btn btn-primary mb-2">Submit</button>

            				</div>
 							<input type="hidden" name="registration_type" value="<?php echo $this->input->get('registration_type'); ?>" />
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
														<span class="weight-500 uppercase-font block font-13 txt-light">No'of Registrations</span><br>
														<span class="weight-600 uppercase-font block font-18 txt-light"><?
															// if($getyear){
															// 	echo $this->db->get_where("tbl_registrations",["YEAR(created_date)"=>$getyear])->num_rows();
															// }else{
															// 	echo $this->db->get_where("tbl_registrations")->num_rows();
															// }
															echo count($ripf_registrations);
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

															//$pcheckYear = ($getyear != "") ? "where YEAR(r.created_date)=$getyear" : '';
														//	echo ($this->db->query("SELECT * FROM tbl_participants p JOIN tbl_registrations r ON r.id=p.inst_id $pcheckYear ORDER BY p.inst_id DESC")->num_rows())+count($alist);
														//echo array_sum($tamount);
												echo $participants_count->participants;
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

             		<?php $category_name = $this->input->get("category") ?>

               		<div class="col-lg-12 col-xs-12" >
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div  class="table-responsive" style="padding:20px;">
										<table class="table table-hover display  pb-30" id="myTable">
											<thead>
													<th>S.no</th>
													<th>Action</th>
													<th>Serial Number</th>
							      				
							      					<? 
														foreach($columns as $col){ 
															
															echo '<th>'.$col["column"].'</th>';
															
													   	} 
													?>
							      				
								      				<th>Amount Paid</th>
													<th>Discount Amount</th>
													<th>Date of Transaction</th>
													<th>Transaction ID</th>
													<th>Payment Reference ID</th>
											</thead>
											<tbody>
											<?php
												$key = 1;

					   							$tamount = array();
					   							$tpar = array();
					                         
												foreach ($ripf_registrations as $row) {

	                                             $sdata = json_decode($row["event_data"]);

													$odata = $this->db->get_where("tbl_ripf_orders",array("order_id"=>$row["order_id"]))->row();
//													if($odata->payment_type == "online"){
														$pchk = [];

										     	?>
										     	<tr>

										     		<td><? echo (count($pchk) == 0) ? $key : "";?></td>
													<td><? if(count($pchk) == 0){ ?>
																	  
														<a href="<? echo base_url("admin/ripf/ripfview/").$row["id"].'/'.$category_name ;?>"><i class="fa fa-eye"></i></a>
														<? } ?>
													</td>
													<td><? echo (count($pchk) == 0) ? $row["serial_number"] : "";?></td>
													
													<? 
														foreach($columns as $col){
															
															$value = (count($pchk) == 0) ? $row[$col["db_column"]] : "";
															if($col["type"] == 1){
																
																echo '<td>'.$value.'</td>';
																
															}else{
																
																echo '<td></td>';
																
															}
															
													   	} 
													?>
													
													<td><? echo (count($pchk) == 0) ? '<i class="fa fa-rupee"></i> '.$odata->total_amount : "";?></td>
 	                                                <td><? echo (count($pchk) == 0) ? '<i class="fa fa-rupee"></i> '.$discount_amount : "";?></td>
													<td><? echo (count($pchk) == 0) ? date("d-M-Y",strtotime($odata->payment_date)) : "";?></td>
													<td><? echo (count($pchk) == 0) ? $odata->order_id : "";?></td>
													<td><? echo (count($pchk) == 0) ? $odata->txn_id : "";?></td>
											 	  </tr>  
												  <?php
													$part = $this->db->get_where("tbl_ripf_participants",array("inst_id"=>$row["id"]))->result_array();
													//	echo "<pre/>";print_r($part);
														$tamount[] = $odata->total_amount;
														$tpar[] = $row["participants"];
													     foreach($part as $pc => $p){
															 
															 $pnum = $pc+1;
											        ?>
											        <tr>

														<td></td>
														<td></td>
														<td></td>
														
														<? 
															foreach($columns as $col){ 

																if($col["type"] == 0){
																	
																	if($col["db_column"] == "par_number"){
																		echo '<td>'.$pnum.'</td>';
																	}else{
																		echo '<td>'.$p[$col["db_column"]].'</td>';
																	}
																}else{

																	echo '<td></td>';

																}

															} 
														?>
														
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>

													</tr>
											    <?
													$pchk[] = $p["pname"];

													} $key++;
												  }
//												}
											
												?>


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
													<th style="font-size: 14px" class="totalUsers"><strong><? echo array_sum($tpar); ?></strong></th>
													
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
		});
	});
</script>


<script type="text/javascript">

	$(".changeYear").change(function(){

		$("#changeYear").submit();

	})

</script>
