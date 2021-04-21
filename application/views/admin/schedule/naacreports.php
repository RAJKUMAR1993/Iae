<?php $this->load->view("admin/back_common/header"); ?>

<style>
	.tw{
		width: 47px !important;
		text-align: center;
	}
</style>

<!-- Title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">NAAC Number of Registrations</h5>
    </div>
                <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
            <li class="active"><span>NAAC Number of Registrations’</span></li>
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
                  <? $event_name = $this->db->order_by("id","desc")->group_by("event_name")->get_where("tbl_schedule_dates",["event_type"=>"NAAC"])->result();
                   $name_event = $this->input->get("id");
                    foreach($event_name as $event){ ?>
                        <option <?php if($name_event==$event->id){ echo 'selected';}?> value="<?php echo $event->id;?>"><?php echo $event->event_name;?></option>
                      
                    <? } ?>
                </select>
              </div>
                    <div class="col-md-3">
                      <a class="btn btn-primary" href="<? echo base_url('admin/schedule/reports') ?>">Clear</a>
                    </div>
                  </form>
                </div>
                  
                   <div class="col-lg-12 col-xs-12" >
                    <div class="panel panel-default card-view pa-0">
                    
                        <div class="panel-wrapper collapse in">
                           <div class="row">
                               <div class="col-md-10">
                               </div>
                               <div class="col-md-2">
                               </div>
                            </div> 
                             
                            <div class="table-responsive" style="padding:20px;">
                                
                                    <table class="table table-hover  pb-30" id="myTable">
                                        <thead>
                                        <tr>
                                            <th rowspan="2" valign="middle">Type of Institution</th>
                                            <th rowspan="2" valign="middle" width="170px">Sub-Type of Institution</th>
                                            <th colspan="3" style="text-align: center;">Government</th>
                                            <th colspan="3" style="text-align: center;">Government-Aided</th>
                                            <th colspan="3" style="text-align: center;">Private</th>
                                            <th valign="middle" style="text-align: center;">Grand Total</th>
                                        </tr> 
                                        <tr>
                                            <th>Online</th>
                                            <th>Offline</th>
                                            <th>Total</th>
                                            <th>Online</th>
                                            <th>Offline</th>
                                            <th>Total</th>
                                            <th>Online</th>
                                            <th>Offline</th>
                                            <th>Total</th>
                                            <th>Grand Total</th>
                                        </tr> 
                                            
                                        </thead>
                                        <tbody>
                                           <?php 
  
                        if($name_event){
                          
						$govtOn = [];	
						$govtOff = [];	
						$govtTotal = [];	
						$govt_aidedOn = [];	
						$govt_aidedOff = [];	
						$govt_aidedTotal = [];	
						$privateOn = [];	
						$privateOff = [];	
						$privateTotal = [];	
						$grandTotal = [];	
						    
                        foreach($category as  $cat){ 
							$subtypes = json_decode($cat->sub_types);
                          	
  
                        
                      ?>
                      
                     
						   <tr>   
								<td>
								  <a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event; ?> &inst_type=<? echo $cat->type ?>&ref_type=total" target="_blank"><? echo $cat->type ?></a>
								</td>
								<td colspan="11">
									<table class="table table-bordered">
										
									<? 
										foreach($subtypes as $st){
											
											$govt = '["Government"]';
											
											$online = $this->db->query("SELECT 
											COUNT(CASE WHEN managementdetails like '%Private%' THEN id END) as privateCount, 
											COUNT(CASE WHEN managementdetails like '%Aided%' THEN id END) as aidedCount, 
											COUNT(CASE WHEN managementdetails = '$govt' THEN id END) as govtCount 
											FROM tbl_registrations where institution_type = '$cat->type' and institution_subtype='$st' and type='online' and event_name=$name_event")->row();
											
											$offline = $this->db->query("SELECT 
											COUNT(CASE WHEN managementdetails like '%Private%' THEN id END) as privateCount, 
											COUNT(CASE WHEN managementdetails like '%Aided%' THEN id END) as aidedCount, 
											COUNT(CASE WHEN managementdetails = '$govt' THEN id END) as govtCount 
											FROM tbl_registrations where institution_type = '$cat->type' and institution_subtype='$st' and type='offline' and event_name=$name_event")->row();
											
											$gtotal = ($online->govtCount+$offline->govtCount)+($online->aidedCount+$offline->aidedCount)+($online->privateCount+$offline->privateCount);
											
											echo '<tr>
													<td>
													  <a href="'.base_url('admin/users/?').'event_id='.$name_event.'&inst_type='.$cat->type.'&sub_type='.$st.'&cref=naac&ref_type=total" target="_blank">'.$st.'</a>
												  	</td>
													<td class="tw"><a href="'.base_url('admin/users').'?event_id='.$name_event.'&inst_type='.$cat->type.'&sub_type='.$st.'&ref_type=online&management_details=Government&cref=naac" target="_blank">'.$online->govtCount.'</a></td>
													<td class="tw"><a href="'.base_url('admin/users').'?event_id='.$name_event.'&inst_type='.$cat->type.'&sub_type='.$st.'&ref_type=offline&management_details=Government&cref=naac" target="_blank">'.$offline->govtCount.'</a></td>
													<td class="tw"><a href="'.base_url('admin/users').'?event_id='.$name_event.'&inst_type='.$cat->type.'&sub_type='.$st.'&management_details=Government&cref=naac" target="_blank">'.($online->govtCount+$offline->govtCount).'</a></td>
													<td class="tw"><a href="'.base_url('admin/users').'?event_id='.$name_event.'&inst_type='.$cat->type.'&sub_type='.$st.'&ref_type=online&management_details=Aided&cref=naac" target="_blank">'.$online->aidedCount.'</a></td>
													<td class="tw"><a href="'.base_url('admin/users').'?event_id='.$name_event.'&inst_type='.$cat->type.'&sub_type='.$st.'&ref_type=offline&management_details=Aided&cref=naac" target="_blank">'.$offline->aidedCount.'</a></td>
													<td class="tw"><a href="'.base_url('admin/users').'?event_id='.$name_event.'&inst_type='.$cat->type.'&sub_type='.$st.'&management_details=Aided&cref=naac" target="_blank">'.($online->aidedCount+$offline->aidedCount).'</a></td>
													<td class="tw"><a href="'.base_url('admin/users').'?event_id='.$name_event.'&inst_type='.$cat->type.'&sub_type='.$st.'&ref_type=online&management_details=Private&cref=naac" target="_blank">'.$online->privateCount.'</a></td>
													<td class="tw"><a href="'.base_url('admin/users').'?event_id='.$name_event.'&inst_type='.$cat->type.'&sub_type='.$st.'&ref_type=offline&management_details=Private&cref=naac" target="_blank">'.$offline->privateCount.'</a></td>
													<td class="tw"><a href="'.base_url('admin/users').'?event_id='.$name_event.'&inst_type='.$cat->type.'&sub_type='.$st.'&ref_type=total&management_details=Private&cref=naac" target="_blank">'.($online->privateCount+$offline->privateCount).'</a></td>
													<td class="tw"><a href="'.base_url('admin/users').'?event_id='.$name_event.'&inst_type='.$cat->type.'&sub_type='.$st.'&cref=naac&ref_type=total" target="_blank">'.$gtotal.'</a></td>
												  </tr>';
											
											$govtOn[] = $online->govtCount;
											$govtOff[] = $offline->govtCount;
											$govtTotal[] = ($online->govtCount+$offline->govtCount);
											$govt_aidedOn[] = $online->aidedCount;
											$govt_aidedOff[] = $offline->aidedCount;
											$govt_aidedTotal[] = ($online->aidedCount + $offline->aidedCount);
											$privateOn[] = $online->privateCount;
											$privateOff[] = $offline->privateCount;
											$privateTotal[] = ($online->privateCount + $offline->privateCount);
											$grandTotal[] = ($online->govtCount+$offline->govtCount)+($online->aidedCount+$offline->aidedCount)+($online->privateCount+$offline->privateCount);
										} 
									?>
										
									</table>
						  		</td>
						  </tr> 
                                           <?php
                        
                        } ?>
                                              <tr>
                                                <td colspan="2" align="right" width="250px">Total</td>
                                                <td class="tw"><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event; ?>&ref_type=online&management_details=Government&cref=naac" target="_blank"><? echo array_sum($govtOn) ?></a></td>
                                                <td class="tw"><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event; ?>&ref_type=offline&management_details=Government&cref=naac" target="_blank"><? echo array_sum($govtOff) ?></a></td>
                                                <td class="tw"><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event; ?>&management_details=Government&cref=naac" target="_blank"><? echo array_sum($govtTotal) ?></a></td>
                                                <td class="tw"><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event; ?>&ref_type=online&management_details=Aided&cref=naac" target="_blank"><? echo array_sum($govt_aidedOn) ?></a></td>
                                                <td class="tw"><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event; ?>&ref_type=offline&management_details=Aided&cref=naac" target="_blank"><? echo array_sum($govt_aidedOff) ?></a></td>
                                                <td class="tw"><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event ?>&management_details=Aided&cref=naac" target="_blank"><? echo array_sum($govt_aidedTotal) ?></a></td>
                                                <td class="tw"><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event ?>&ref_type=online&management_details=Private&cref=naac" target="_blank"><? echo array_sum($privateOn) ?></a></td>
                                                <td class="tw"><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event ?>&ref_type=offline&management_details=Private&cref=naac" target="_blank"><? echo array_sum($privateOff) ?></a></td>
                                                <td class="tw"><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event ?>&management_details=Private&cref=naac" target="_blank"><? echo array_sum($privateTotal) ?></a></td>
                                                <td class="tw"><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event ?>&cref=naac&ref_type=total" target="_blank"><? echo array_sum($grandTotal) ?></a></td>
                                              </tr> 
                                        </tbody>
                           <? } ?>             
                                    
                                    </table>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="row" align="center">
							<h5 style="margin-top: 20px" class="txt-dark">Number of Participants</h5>
						
						</div>
						<div class="table-responsive" style="padding:20px;">
							<table class="table table-hover table-bordered pb-30 totalTable" id="">
								<thead>
									<tr>
										<th align="center"><strong>Type of Institution</strong></th>
										<th valign="top"><strong>Sub-Type of Institution</strong></th>
										<th valign="top"><strong>No.of Participants<br />(OTP Verified)</strong></th>
										<th valign="top"><strong >No. of Participants<br />(OTP Not Verified)</strong></th>
										<th valign="top"><strong>Total</strong></th>
									</tr>

								</thead>
								<tbody>

									<?php foreach($category as $sub_type){ 
										  
									?>
									<tr>
										<td>
                       <?php echo $sub_type->type ?>
										</td>
										<td colspan="4">
											<table class="table table-bordered">
												<? //foreach($streams as $cst => $cstream){ ?>
													<tr>
														<td width= "280px;"><? echo implode("<br>",json_decode($sub_type->sub_types)); ?></td>
														<td align="center" width= "272px;"><strong>0</strong></td>
														<td align="center" width= "255px;"> <strong>0</strong></td>
														<td align="center" > <strong>0</strong></td>
														
													</tr>
												<? //} ?>
												<tr style="background:#ccc;">
                          <td  >Total</td>
                          <td align="center"><strong>0</strong></td>
                          <td align="center"><strong>0</strong></td>
                          <td align="center"><strong>0</strong></td>
                        </tr>
                        
											</table>
										</td>
									</tr>
									<?php } ?>
								</tbody>
								<tfoot align="right">
									<tr style="background:#ccc;">
                      <td></td>
									  	<th>Total</th>
                      <td align="center" width= "270px;"><strong>0</strong></td>
                      <td align="center"><strong>0</strong></td>
                      <td align="center"><strong>0</strong></td>
									</tr>
                  <tr style="background:#ccc;">
                        <td></td>
                          <td align="left" >Grand Total</td>
                          <td align="center" width= "270px;"><strong>0</strong></td>
                          <td align="center"><strong>0</strong></td>
                          <td align="center"><strong>0</strong></td>
                        </tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
                </div>
            </div>
<? $this->load->view( "admin/back_common/footer" ); ?>
<script type="text/javascript">
$(document).ready( function () {
$('#myTable').DataTable({
  "order" : false
});
  $(".changeYear").change(function(){
    
    $("#changeYear").submit();
    
  })
} );
</script>












