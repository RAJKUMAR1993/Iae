<? front_header(); 
//$sdates = $this->db->order_by("id","desc")->get_where("tbl_schedule_dates")->row();
	$cdate = date("Y-m-d");
	$participant_type = $this->session->userdata("participant_type");

?>
<style>
	.inaugural{
		
		height: 140px;
		
	}

	.guest{
		
		margin-top: 10px;
		
	}
		.our-stats h4 {
    color: #000 !important;
}
	/*.techpic img{
		
		margin-top: 27px;
		border: 2px solid white;
		
	}*/
	.techpic td{border-bottom:0px!important;  padding: 0px 10px 0px 20px !important;font-size: 14px}
	
	.customers1 p{
		
		font-size: 16px;
		
	}
	.customers1 td{
		
		font-size: 16px;
		
	}
	
	.our-stats h3{
		
		color: white;
		padding-bottom: 20px;
		font-weight: 500;
    	font-size: 22px;
	}
	.techpic img {
    margin-top: 27px;
    border: 2px solid white;
}
	.img-circle {
    border-radius: 50%;
}
.tabbable-panel {
  border:0px solid #eee;
  padding: 10px;
}

/* Default mode */
.tabbable-line > .nav-tabs {
  border: none;
  margin: 0px;
}
.tabbable-line > .nav-tabs > li {
  margin-right: 2px;
}
.tabbable-line > .nav-tabs > li > a {
  border: 0;
  margin-right: 0;
  color: #fff;
}
.tabbable-line > .nav-tabs > li > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open, .tabbable-line > .nav-tabs > li:hover {
  border-bottom: 4px solid #fbcdcf;
}
.tabbable-line > .nav-tabs > li.open > a, .tabbable-line > .nav-tabs > li:hover > a {
  border: 0;
  background: none !important;
  color: #EEF975;
}
.tabbable-line > .nav-tabs > li.open > a > i, .tabbable-line > .nav-tabs > li:hover > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open .dropdown-menu, .tabbable-line > .nav-tabs > li:hover .dropdown-menu {
  margin-top: 0px;
}
.tabbable-line > .nav-tabs > li.active {
  border-bottom: 4px solid #f3565d;
  position: relative;
}
.tabbable-line > .nav-tabs > li.active > a {
  border: 0;
  color: #333333;
}
.tabbable-line > .nav-tabs > li.active > a > i {
  color: #404040;
}
.tabbable-line > .tab-content {
  margin-top: -3px;
/*  background-color: #fff;*/
  border: 0;
  border-top: 1px solid #eee;
  padding: 1px 0;
}
.portlet .tabbable-line > .tab-content {
  padding-bottom: 0;
}	
	

.tabbable-line.tabs-below > .nav-tabs > li {
  border-top: 4px solid transparent;
}
.tabbable-line.tabs-below > .nav-tabs > li > a {
  margin-top: 0;
}
.tabbable-line.tabs-below > .nav-tabs > li:hover {
  border-bottom: 0;
  border-top: 4px solid #fbcdcf;
}
.tabbable-line.tabs-below > .nav-tabs > li.active {
  margin-bottom: -2px;
  border-bottom: 0;
  border-top: 4px solid #f3565d;
}
.tabbable-line.tabs-below > .tab-content {
  margin-top: -10px;
  border-top: 0;
  border-bottom: 1px solid #eee;
  padding-bottom: 15px;
}
	
 .nav-tabs > li.active > a:hover, .nav-tabs > a:focus {
	 color: #EEF975 !important;
}
	.our-stats > .container1 {
    padding: 20px 20px;
}
	.nav > li > a {
    position: relative;
    display: block;
    padding: 10px 13px;
}
	#customers td, #customers th {
    border-bottom: 1px solid #ddd;
    padding: 8px;
    /* border-radius: 10px; */
    color: #fff;
    padding: 10px 10px 20px 20px;
    font-weight: 500;
}
	.techpic .img-circle {
    margin-top: 40px;
    border: 2px solid white;
}
.btn-extra{
    border: none;
    border-radius: 30px;
    cursor: pointer;
    background: #3eace1;
    color: #fff;
} 
	
.btn-extra:hover {
   
    background: #00225c;
    color: #fff;
}
	
	
.classname:active {
	position:relative;
	top:1px;
}
	
	.techpic .noborder .img-circle{
		border: 0px solid white !important;
	}
	
	.pinfo p{
		
		color:  white !important;
		
	}
	</style>
  <!-- [/MAIN-HEADING]
 ============================================================================================================================-->
  <section class="main-heading" id="home">
 	<div class="baner"> <!--<img src="<? echo base_url('assets/') ?>images/inbanner.jpg" class="img-responsive">--></div> 
  </section>
  
<section class="our-team1 white-background black" id="three" style="margin-top: 80px;">
  <div class="container">
  

     <div style="height:20px;"></div>

    <h3 class="text-center">
    	<? echo nl2br($ydata->event_name) ?>
    </h3>
	 
	 <div style="height:20px;"></div>
	  
		

  
<section class="our-stats" id="five">
	<div class="container1">
				<div class="row">
					<div class="col-md-12" align="right">
					
					<? if($this->session->userdata("event_type") == "RIPF"){ ?>
					<? if($r->event_category == "Institution" || $r->event_category == "R&D-Labs" || $r->event_category == "Industry"){ 
							if($this->session->userdata("participant_type") == "institute"){			
					?>
							<a href="<? echo base_url('ripf/addParticipants/'.$ydata->id) ?>" class="btn btn-default" style="margin-top: 20px;">Add / Update Participants</a>
					
					<? }}}else{ ?>
						<? if($this->session->userdata("participant_type") == "institute"){ ?>
							<a href="<? echo base_url('add-participants/'.$ydata->id) ?>" class="btn btn-default" style="margin-top: 20px;">Add / Update Participants</a>
						<? } ?>
					<? } ?>	
						<a href="<? echo base_url('webinar/events') ?>" class="btn btn-default" style="margin-top: 20px;"><i class="fa fa-chevron-left"></i> Back</a>
					</div>
				</div>
				<div class="row pinfo" style="margin-bottom: 20px;">
					<div class="col-md-6 pull-left">
						<p>
							<? if($r->event_category == "Individual-Faculty" || $r->event_category == "Students"){ ?>
								<strong>Name</strong> : <? echo ($participant_type == "participant") ? $pr->pname : $r->ifsrp_fullName; ?><br>
							<? }elseif($r->event_category == "Retired-Professional"){ ?>	
								<strong>Name</strong> : <? echo ($participant_type == "participant") ? $pr->pname : $r->rp_name; ?><br>
							<? }else{ ?>	
								<strong>Name</strong> : <? echo ($participant_type == "participant") ? $pr->pname : $r->cpname; ?><br>
							<? } ?>	
							
							<? if($r->event_category == "Institution" || $r->event_category == "Individual-Faculty" || $r->event_category == "Industry" || $r->event_category == "R&D-Labs"){ ?>
								<strong>Designation/Department</strong> : <? echo ($participant_type == "participant") ? $pr->designation.", ".$pr->department : $r->contact_person_designation.", ".$r->contact_person_department; ?><br><br>
							<? }elseif($r->event_category == "Students"){ ?>
								<strong>Course & Specialization Studying/Studied</strong> : <? echo ($participant_type == "participant") ? $pr->designation.", ".$pr->department : $r->student_course_specialization; ?><br><br>
							<? }elseif($r->event_category == "Retired-Professional"){ ?>
								<strong>Designation at the time of Retirement</strong> : <? echo ($participant_type == "participant") ? $pr->designation.", ".$pr->department : $r->rp_designation_Retirement; ?><br><br>
							<? }elseif($participant_type == "participant"){ ?>
							 	<strong>Designation/Department</strong> : <? echo $pr->designation.", ".$pr->department; ?><br><br>
							<? } ?> 	 		 	
								<?php
							
							$end_date =date_create($ydata->event_start_date);
							date_add($end_date, date_interval_create_from_date_string("4 days"));
							$end_date = date_format($end_date,"Y-m-d");
							
								
								if ( strtotime($cdate) >= strtotime($end_date)  ) { ?>
								
							<strong><a href="<? echo base_url('webinar/downloadCertificate/').$ydata->id ?>" class="btn btn-sm btn-default">Download Participation Certificate</a></strong>
						<?php }else{  ?>
							<strong><a href="<? echo base_url('webinar/downloadCertificate') ?>" class="btn btn-sm btn-default"  disabled>Download Participation Certificate</a></strong>
						<?php } ?>
						</p>
					</div>
					<div class="col-md-6 pull-right">
						<p>
							<? if($r->event_category == "Institution"){ ?>
								<strong>Name of the Institution</strong> : <? echo $r->institutionName; ?><br>
							<? }elseif($r->event_category == "Individual-Faculty"){ ?>
								<strong>Name of the Institution (If Working)</strong> : <? echo $r->if_nameoftheInstitution_working; ?><br>
							<? }elseif($r->event_category == "Industry"){ ?>
								<strong>Name of the  Industry</strong> : <? echo $r->name_of_the_industry; ?><br>
							<? }elseif($r->event_category == "R&D-Labs"){ ?>
								<strong>Name of the Organization</strong> : <? echo $r->rd_name_of_the_organization; ?><br>
							<? }elseif($r->event_category == "Retired-Professional"){ ?>
								<strong>Name of the last worked Organisation</strong> : <? echo $r->rp_name_organization_retirement; ?><br>
							<? } ?>	
							
							<? if($r->event_category == "Institution"){ ?>	
								<strong>Type of the Institution</strong> : <? echo $r->institution_type; ?><br><br>
							<? } ?>	
							<!--<strong>Category of the Institution</strong> : <? //echo implode(", ",$this->session->userdata("category")); ?><br>--><br>
							<strong><a href="<? echo base_url('webinar/logout') ?>" class="btn btn-sm btn-default pull-right">Logout</a></strong>
						</p>
					</div>
				</div>
<? if(strtotime($cdate) <= strtotime($ydata->event_end_date)){ ?>	

		<div class="row">
			<div class="col-md-12 col-md-offset-0">
				
			
				<h4 align="center" style="color: white !important;margin-bottom: 10px"><strong>Day - 1 (<? echo date("d-m-Y",strtotime($ydata->event_start_date)) ?>)</strong></h4>
				<div class="tabbable-panel">
					<div class="tabbable-line">
						<div class="tab-content">
							<div class="tab-pane active table-responsive" id="tab_default_11">

								<table border="0" cellspacing="0" cellpadding="0" width="100%" id="customers" class="customers1">

									<tr>

										<th>Time</th>
										<th>Technical Session</th>
										<th>Topic</th>
										<th>Cheif Guest / Guest of Honour / Speaker / Resource Person</th>
										<th></th>
										<th></th>
									</tr>
										
									<? foreach($data1 as $d1){ 
						
											$categories = json_decode($d1->category);
											$schedulecategories = $this->session->userdata("category");

											$status = "false";

											foreach($schedulecategories as $sch){

												if(in_array($sch,$categories)){

													$status = "true";

												}

											}

											if(in_array("all",json_decode($d1->category))){

												$status = "true";

											}
											
												if($status == "true"){
													
													$end_time1 = strtotime(date("Y-m-d H:i:s",strtotime($d1->schedule_date." ".$d1->schedule_end_time)));
													$curr_time1 = strtotime(date("Y-m-d H:i:s"));
													
									?>	

													<tr <? if($d1->type == "break"){ ?> style="background-color: #54b5ff" <? } ?>>
														<td width="200x"><? echo date("h:i A",strtotime($d1->schedule_start_time))." - ".date("h:i A",strtotime($d1->schedule_end_time)) ?></td>

														<? if($d1->type == "break"){ ?>

															<td colspan="4" align="center"><p><strong><? echo $d1->description ?></strong></p></td>
															<td></td>

														<? }elseif($d1->type == "desc"){ ?>

															<td><p><strong><? echo $d1->technical_session ?></strong></p></td>
															<td><p><strong><? echo $d1->description ?></strong></p></td>
															<td>
																<table class="techpic">

																	<tr>
																		<td valign="middle" align="center" class="<? echo ($d1->desc_image) ? '' : 'noborder' ?>">	
																			<? if($d1->desc_image){ ?>
																				<img src="<? echo base_url().$d1->desc_image ?>" width="120" height="120" class="img-circle"><br>
																			<? }else{ ?>
<!--																				<img src="<? echo base_url('assets/') ?>transparent.png" width="90" height="90" class="img-circle">-->
																			<? } ?>
																			<p><strong><? echo $d1->type_description ?></strong></p>
																		</td>
<!--																		<td valign="middle"></td>-->

																	</tr>

																</table>
															</td>
															<td></td>
															<td>
																<? if($end_time1 > $curr_time1){ ?>
																	<a href="<? echo $d1->join_link ?>" target="_blank" class="join" schedule_id="<? echo $d1->id ?>"> <button class="btn btn-extra">JOIN</button> </a>
																<? } ?>	 
															</td>

														<? }elseif($d1->type == "mentor"){ ?>
															<td><p><strong><? echo $d1->technical_session ?></strong></p></td>
															<td>
																<p><strong><? echo $d1->description ?></strong>
																</p>
															</td>
															<td colspan="2">
																<table class="techpic">
																	<? foreach(json_decode($d1->mentor_data) as $m1){ ?>
																		<tr>
																			<td valign="middle" align="center" class="<? echo ($m1->mentor_image) ? '' : 'noborder' ?>">
																				<? if($m1->mentor_image){ ?>
																					<img src="<? echo base_url().$m1->mentor_image ?>" width="120" height="120" class="img-circle">
																				<? }else{ ?>
<!--																					<img src="<? echo base_url('assets/') ?>transparent.png" width="120" height="120" class="img-circle">-->
																				<? } ?><br>
																				<p><strong><? echo $m1->mentor_name ?></strong> <br><? echo nl2br($m1->mentor_designation) ?></p>	
																			</td>
<!--																			<td valign="middle"></td>-->
																		</tr>
																	<? } ?>
																</table>
															</td>
															<td>
																<? if($end_time1 > $curr_time1){ ?>	
																	<a href="<? echo $d1->join_link ?>" target="_blank" class="join" schedule_id="<? echo $d1->id ?>"> <button class="btn btn-extra">JOIN</button> </a>
																<? } ?>	 
															</td>
														<? }else{ ?>

															<td><p><strong><? echo $d1->technical_session ?></strong></p></td>
															<td></td>
															<td></td>
															<td></td>
															<td>
																<? if($end_time1 > $curr_time1){ ?>
																	<a href="<? echo $d1->join_link ?>" target="_blank" class="join" schedule_id="<? echo $d1->id ?>"> <button class="btn btn-extra">JOIN</button> </a>
																<? } ?>	 
															</td>
														<?	} ?>

													</tr>

									<? }} ?>
									
								</table>

							</div>

						</div>
					</div>
				</div>

				<? if($data2){ ?> 
			
				<h4 align="center" style="color: white !important;margin-bottom: 10px"><strong>Day - 2 (<? echo date("d-m-Y",strtotime($ydata->event_end_date)) ?>)</strong></h4>
				<div class="tabbable-panel">
					<div class="tabbable-line">
						<div class="tab-content">
							<div class="tab-pane active table-responsive" id="tab_default_21">

								<table border="0" cellspacing="0" cellpadding="0" width="100%" id="customers" class="customers1">

									<tr>

										<th>Time</th>
										<th>Technical Session</th>
										<th>Topic</th>
										<th>Cheif Guest / Guest of Honour / Speaker / Resource Person</th>
										<th></th>
										<th></th>
									</tr>
										
									<? foreach($data2 as $d2){ 
						
											$categories1 = json_decode($d2->category);
											$schedulecategories1 = $this->session->userdata("category");

											$status1 = "false";

											foreach($schedulecategories1 as $sch1){

												if(in_array($sch1,$categories1)){

													$status1 = "true";

												}

											}

											if(in_array("all",json_decode($d2->category))){

												$status1 = "true";

											}
											
												if($status1 == "true"){
													
													$end_time = strtotime(date("Y-m-d H:i:s",strtotime($d2->schedule_date." ".$d2->schedule_end_time)));
													$curr_time = strtotime(date("Y-m-d H:i:s"));
													
									?>	

													<tr <? if($d2->type == "break"){ ?> style="background-color: #54b5ff" <? } ?>>
														<td width="200x"><? echo date("h:i A",strtotime($d2->schedule_start_time))." - ".date("h:i A",strtotime($d2->schedule_end_time)) ?></td>

														<? if($d2->type == "break"){ ?>

															<td colspan="4" align="center"><p><strong><? echo $d2->description ?></strong></p></td>
															<td></td>

														<? }elseif($d2->type == "desc"){ ?>

															<td><p><strong><? echo $d2->technical_session ?></strong></p></td>
															<td><p><strong><? echo $d2->description ?></strong></p></td>
															<td>
																<table class="techpic">

																	<tr>
																	
																		<td valign="middle" align="center" class="<? echo ($d2->desc_image) ? '' : 'noborder' ?>">	       <? if($d2->desc_image){ ?>
																				<img src="<? echo base_url().$d2->desc_image ?>" width="120" height="120" class="img-circle"><br>
																			<? }else{ ?>
<!--																				<img src="<? echo base_url('assets/') ?>transparent.png" width="90" height="90" class="img-circle">-->
																			<? } ?>
																				<? echo $d2->type_description ?>
																		</td>
																		<td valign="middle"></td>

																	</tr>

																</table>
															</td>
															<td></td>
															<td>
																<? if($end_time > $curr_time){ ?>
																	<a href="<? echo $d2->join_link ?>" target="_blank" class="join" schedule_id="<? echo $d2->id ?>"> <button class="btn btn-extra">JOIN</button> </a>
																<? } ?>
															</td>

														<? }elseif($d2->type == "mentor"){ ?>
															<td><p><strong><? echo $d2->technical_session ?></strong></p></td>
															<td>
																<p><strong><? echo $d2->description ?></strong>
																</p>
															</td>
															<td colspan="2">
																<table class="techpic">
																	<? foreach(json_decode($d2->mentor_data) as $m2){ ?>
																		<tr>
																			<td valign="middle" align="center" class="<? echo ($m2->mentor_image) ? '' : 'noborder' ?>">
																				<? if($m2->mentor_image){ ?>
																					<img src="<? echo base_url().$m2->mentor_image ?>" width="120" height="120" class="img-circle">
																				<? }else{ ?>
<!--																					<img src="<? echo base_url('assets/') ?>transparent.png" width="90" height="90" class="img-circle">-->
																				<? } ?><br>
																				<p><strong><? echo $m2->mentor_name ?></strong> <br><? echo nl2br($m2->mentor_designation) ?></p>	
																				
																			</td>
<!--																			<td valign="middle"></td>-->
																		</tr>
																	<? } ?>
																</table>
															</td>
															<td>
																<? if($end_time > $curr_time){ ?>
																	<a href="<? echo $d2->join_link ?>" target="_blank" class="join" schedule_id="<? echo $d2->id ?>"> <button class="btn btn-extra">JOIN</button> </a> 
																<? } ?>	
															</td>
														<? }else{ ?>

															<td><p><strong><? echo $d2->technical_session ?></strong></p></td>
															<td></td>
															<td></td>
															<td></td>
															<td>
																<? if($end_time > $curr_time){ ?>
																	<a href="<? echo $d2->join_link ?>" target="_blank" class="join" schedule_id="<? echo $d2->id ?>"> <button class="btn btn-extra">JOIN</button> </a> 
																<? } ?>	
															</td>
														<?	} ?>

													</tr>

									<? }} ?>
									
								</table>
							</div>

						</div>
					</div>
				</div>	
	
				<? } ?>	
				
			</div>
		</div>
		
<? } ?>		
	</div>
	<div class="row">

	</div>
	</div>
</section>
    <div class="clearfix"></div>
    <br>

    <br>

    <div class="clearfix"></div>
    <br>
    
  </div>
</section>
  
 <? front_footer() ?>
 
<script type="text/javascript">

	$(".join").click(function(){
		
		var schedule_id = $(this).attr("schedule_id");
		
		$.ajax({
			
			type : "post",
			url : "<? echo base_url('webinar/storeJoindata') ?>",
			data : {schedule_id : schedule_id},
			success : function(data){
				
				console.log(data)
				
			}
			
		})
		
		
	})

</script>

