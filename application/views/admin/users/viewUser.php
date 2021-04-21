	<?php $this->load->view("admin/back_common/header"); ?>

	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li><a href="<?php echo base_url() ?>admin/users">Users</a></li>
				<li class="active"><span><? echo $rdata->institutionName ?></span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>	
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 pull-right">
						
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body row pb-0" style="padding:20px; margin-bottom: 20px">
									<div class="col-md-3">
										<h5 class="txt-dark">Organization Details</h5>
									</div>	
									<div class="col-md-9 pull-right">
										<a class="btn btn-info pull-right" style="margin-bottom: 10px;margin-left: 10px" onclick="printDiv('print')">Print</a>
										<a target="_blank" style="margin-bottom: 10px" href="<? echo base_url('admin/users/downloadpdf/').$rdata->id ?>" class="btn btn-info pull-right">Download</a><br>
									</div>
								</div>
							</div>
						</div>
							
					</div>
				
					<div class="col-lg-12 col-xs-12" >
						<div class="panel panel-default card-view pa-0" id="print">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pb-0" style="padding:20px;">
									
										<table class="table table-bordered table-stripped" id="sdata">
											<thead>
												
											</thead>
											<tbody>
												<tr>
													<td style="font-weight: bold;">Institution Name</td>
													<td><?php echo $rdata->institutionName;?></td>
													<td style="font-weight: bold;">Contact Mobile Number</td>
													<td><?php echo $rdata->mobile;?></td>
													
												</tr>
												<tr>
													<td style="font-weight: bold;">Contact Person Name</td>
													<td><?php echo $rdata->cpname;?></td>
													<td style="font-weight: bold;">Contact Person Email</td>
													<td><?php echo $rdata->email;?></td>
												</tr>
												<tr>
													<td style="font-weight: bold;">Organization Email</td>
													<td><?php echo $rdata->orgemail;?></td>
													<td style="font-weight: bold;">Website</td>
													<td><?php echo $rdata->website;?></td>
												</tr>
												<tr>
													<td style="font-weight: bold;">Address</td>
													<td colspan="3"><?php echo nl2br($rdata->address);?></td>
												</tr>
												
												<? $categories = json_decode($rdata->categories); 
													if($categories){
												?>
												
												<tr>
												
													<td style="font-weight: bold;">Categories</td>
													<td colspan="3">
														
														<? foreach($categories as $c){
	
															echo $c."<br>";		
	
														} ?>
														
													</td>
												</tr>
												<? } ?>
												
												<? $institution_type = $rdata->institution_type; 
													if($institution_type){
												?>
												
												<tr>
												
													<td style="font-weight: bold;">Institution Type</td>
													<td><? echo $institution_type ?></td>
													<td style="font-weight: bold;">Institution sub Type</td>
													<td><? echo $rdata->institution_subtype ?></td>
												</tr>
												<? } ?>
												
												<tr>
												
													<? $mds = json_decode($rdata->managementdetails); ?>
												
												
													<td style="font-weight: bold;">Management Details</td>
													<td colspan="3">
														
														<? foreach($mds as $md){
	
															echo $md."<br>";		
	
														} ?>
														
													</td>
												</tr>
												
												<tr>
												
													<? 
													
														$part = $this->db->get_where("tbl_participants",array("inst_id"=>$rdata->id))->result(); 
													
														if(count($part) > 0){
															
															$participants = $this->db->get_where("tbl_participants",array("inst_id"=>$rdata->id))->result();
															
														}else{
															
															$participants = json_decode($rdata->participantsData);
															
														}
													
													?>
												
												
													<td style="font-weight: bold;">Participants</td>
													<td colspan="3">
														
														<table class="table table-bordered">
															
															<thead>
																<tr>
																	<td>Sno</td>
																	<td>Name</td>
																	<td>Email</td>
																	<td>Mobile</td>
																	<td>Designation</td>
																	<td>Department</td>
																</tr>
															</thead>
															
															<tbody>
															
															<? $i = 1;
																foreach($participants as $p){ ?>
															
																<tr>
																	<td><? echo $i ?></td>
																	<td><? echo $p->pname ?></td>
																	<td><? echo $p->pemail ?></td>
																	<td><? echo $p->pmobile ?></td>
																	<td><? echo $p->designation ?></td>
																	<td><? echo $p->department ?></td>
																</tr>
																
															<? $i++;
																} ?>	
															</tbody>
															
														</table>
													
													</td>
												</tr>
												
												<tr>
												
													<? $odata = $this->db->get_where("tbl_orders",array("order_id"=>$rdata->order_id))->row(); ?>
												
												
													<td style="font-weight: bold;">Payment Details</td>
													<td colspan="3">
														
														<table class="table table-bordered">
															
															<thead>
																<tr>
																	<td>Order ID</td>
																	<td>Amount</td>
																	<td>Txn ID</td>
																	<td>Payment Status</td>
																	<td>Payment Mode</td>
																	
																	<? if(count($part) > 0){ ?>
																	
																		<td>Payment Date</td>
																		
																	<? } ?>	
																</tr>
															</thead>
															
															<tbody>
															
															
																<tr>
																	<td><? echo $odata->order_id ?></td>
																	<td><i class="fa fa-rupee"></i> <? echo $odata->total_amount ?></td>
																	<td><? echo $odata->txn_id ?></td>
																	<td><? echo $odata->payment_status ?></td>
																	<td><? echo $odata->payment_mode ?></td>
																	
																	<? if(count($part) > 0){ ?>
																		<td><? echo $odata->payment_date ?></td>
																	<? } ?>	
																</tr>
																
															</tbody>
															
														</table>
													
													</td>
												</tr>
												
											</tbody>
										</table>
										
										
										
<!--
									<div align="center" style="margin-bottom: 10px">
										<button type="button" class="btn btn-info" id="updprofile">Update Profile</button>
									</div>
-->
									
								</div>
							</div>
						</div>
							
					</div>
					
				</div>
				<!-- /Row -->

		
<?php $this->load->view("admin/back_common/footer"); ?>	
	
<script type="text/javascript">
	
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}	

  $("#datepicker").datepicker();	
	
  $("#updprofile").click(function(){
        
        $("#upddata").toggle();
        $("#sdata").hide();
	    $("#updprofile").hide();
        
    });
     $("#back").click(function(){
        
        $("#sdata").toggle();
        $("#updprofile").toggle();
        $("#upddata").hide();
        
    });
	
	
	$("#std_state").on("change",function() {
		var state = $(this).val();
		//alert(state);
		$.ajax({
			type:"POST",
			url:"<?php echo base_url() ?>front/Studentregister/get_std_city",
			data:{state:state},
			beforeSend:function(){
				$("#ploader").show();

			},
			success:function(cities){
				$("#ploader").hide();
				$("#std_city").html(cities);
				//console.log(cities);
			}

		});
	});

</script>	
