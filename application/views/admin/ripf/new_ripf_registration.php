
<?php $this->load->view("admin/back_common/header");  $cdate = date("Y-m-d");
  
  $event =   $this->uri->segment(4);

//print_r($event);

?>
<style>

	#inpage .note p{
		color: white;
		text-align: center;
	}

.form-control {
    border-radius: 1.5rem;
}
.btnSubmit {
    border: none;
    border-radius: 30px;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}

	.btnSubmit:hover {

    background: #00225c;
    color: #fff;
}
.form-control {
    display: block !important;
    width: 100% !important;
    padding: .375rem .75rem !important;
    font-size: 14px !important;
    line-height: 1.5 !important;
    color: #495057 !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    border: 1px solid #ced4da !important;
    border-radius: 2px !important;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
}

</style>

	<div class="row">
        <div class="col-lg-12 col-xs-12" >
		    <div class="panel panel-default card-view">
				<div class="panel-wrapper collapse in">
				    <div class="container">
				    	<? //if(($cdate < $edata->registration_end_date) && ($edata->status == "Active")){ ?>		
				    	<div class="note">
			               <h3 style=" color:#1f7ca9;padding-top: 15px; text-align: center"> Offline Registration (<? echo $this->uri->segment(4) ?>)</h3>
			                <? echo $this->session->flashdata("emsg") ?>
			            </div>
			            <form id="formdata">
			            	<div class="form-content">
             				    <small style="color: red; font-weight: bold;text-align: center">Note : OTP will be sent to your Email ID & Mobile Number. (Contact Person will get OTP in case of Institution, Industry, R&D Labs.)</small> <br><br>
             				    	<div class="col-md-3">
										  <div class="form-group">
											<label>Event</label>
											<select class="form-control event"  name="event_name" id="event" required >
											<?php $events = $this->db->order_by("id","desc")->get_where("tbl_schedule_dates",["status"=>"Active","event_type =" => "RIPF"])->result(); ?>
												<option value="">Select Event</option>
												<? foreach($events as $e){
										          	$event_type = $this->input->get("event_id");
												?>
														<option <?php if($event_type==$e->id){ echo 'selected';}?> value="<?php echo $e->id;?>"><?php echo $e->event_name;?></option>
										        <?php }	?>


											</select>

										  </div>
										</div>

             				    <div class="row">
									<?  if($cdata->id == Institution){ ?>
								  	  	<div class="col-md-12">	
											<label for="full_name" class="col-form-label">Institution Details : </label>
										</div>	
									<? } ?>
								</div>
									<? if($cdata->id == Institution){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="text" class="form-control" placeholder="Name of the Institution" value="<? echo ($form_data['institutionName'] != "") ? $form_data['institutionName'] : '' ?>" name="institutionName" required>
								</div>
							  </div>
							<? } ?>
							<? if($cdata->id == Industry){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="text" class="form-control" placeholder="Name of the  Industry" value="<? echo ($form_data['nameoftheCompany'] != "") ? $form_data['nameoftheCompany'] : '' ?>" name="name_of_the_industry" required>
								</div>
							  </div>
							<? } ?>
							<? if($cdata->id == Industry){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="email" class="form-control" placeholder=" Company / Industry  Email ID " value="<? echo ($form_data['companyemailId'] != "") ? $form_data['companyemailId'] : '' ?>" name="orgemail" required>
								</div>
							  </div>
							<? } ?>
							<? if($cdata->id == Industry){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="text" class="form-control" placeholder="Company / Industry Phone Number" value="<? echo ($form_data['companyphoneNumber'] != "") ? $form_data['companyphoneNumber'] : '' ?>" name="institution_phone_number" required>
								</div>
							  </div>
						    <? } ?>
						    <? if($cdata->id == Retired_Professional){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="text" class="form-control" placeholder="Name" value="<? echo ($form_data['name'] != "") ? $form_data['name'] : '' ?>" name="rp_name" required>
								</div>
							  </div>
							<? } ?>
							<? if($cdata->id == RD_Labs){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="text" class="form-control" placeholder="Name of the Organization" value="<? echo ($form_data['nameoftheOrganization'] != "") ? $form_data['nameoftheOrganization'] : '' ?>" name="rd_name_of_the_organization" required>
								</div>
							  </div>
							<? } ?>
							<? if($cdata->id == RD_Labs){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="email" class="form-control" placeholder=" Organization Email" value="<? echo ($form_data['organizationEmail'] != "") ? $form_data['organizationEmail'] : '' ?>" name="orgemail" required>
								</div>
							  </div>
							<? } ?>
							<? if($cdata->id == RD_Labs){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="text" class="form-control" placeholder="Organization Phone Number" value="<? echo ($form_data['organizationphoneNumber'] != "") ? $form_data['organizationphoneNumber'] : '' ?>" name="institution_phone_number" required>
								</div>
							  </div>
							<? } ?>
						    <? if($cdata->id == Institution){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="email" class="form-control" name="orgemail" placeholder="Institution Email ID" value="<? echo ($form_data['orgemail'] != "") ? $form_data['orgemail'] : '' ?>"/>
								</div>
							  </div>
							<? } ?>
						    <? if($cdata->id == Institution){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="text" class="form-control" name="institution_phone_number" placeholder="Institution Phone Number" value="<? echo ($form_data['institutionphoneNumber'] != "") ? $form_data['institutionphoneNumber'] : '' ?>"/>
								</div>
							  </div>
							<? } ?>
						    <? if($cdata->id == Institution ||  $cdata->id == RD_Labs ||  $cdata->id == Industry ){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="text" class="form-control" name="website" placeholder="Website" value="<? echo ($form_data['website'] != "") ? $form_data['website'] : '' ?>"/>
								</div>
							  </div>
							<? } ?>
							<? if($cdata->id == Individual_Faculty || $cdata->id == Students ){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="text" class="form-control" placeholder="Full Name" value="<? echo ($form_data['fullName'] != "") ? $form_data['fullName'] : '' ?>" name="ifsrp_fullName" required>
								</div>
							  </div>
							<? } ?>
							<? if($cdata->id == Individual_Faculty || $cdata->id == Students ||  $cdata->id == Retired_Professional ){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="email" class="form-control" placeholder="Email Id" value="<? echo ($form_data['emailId'] != "") ? $form_data['emailId'] : '' ?>" name="email" required>
								</div>
							  </div>
							<? } ?>
							<? if($cdata->id == Individual_Faculty || $cdata->id == Students ||  $cdata->id == Retired_Professional ){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="text" class="form-control" placeholder="Mobile Number" value="<? echo ($form_data['mobileNumber'] != "") ? $form_data['mobileNumber'] : '' ?>" name="mobile" maxlength="10" required>
								</div>
							  </div>
							<? } ?>

							<? if($cdata->id == Retired_Professional){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="text" class="form-control" placeholder="Designation at the time of Retirement" value="<? echo ($form_data['designationRetirement'] != "") ? $form_data['designationRetirement'] : '' ?>" name="rp_designation_Retirement" required>
								</div>
							  </div>
							<? } ?>
							<? if($cdata->id == Retired_Professional){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="text" class="form-control" placeholder="Name of the last worked Organisation" value="<? echo ($form_data['nameorganizationRetirement'] != "") ? $form_data['nameorganizationRetirement'] : '' ?>" name="rp_name_organization_retirement" required>
								</div>
							  </div>
							<? } ?>
							<? if($cdata->id == Students){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="text" class="form-control" placeholder="Course & Specialization Studying/Studied" value="<? echo ($form_data['courseSpecialization'] != "") ? $form_data['courseSpecialization'] : '' ?>" name="student_course_specialization" required>
								</div>
							  </div>
							<? } ?>
							<? if($cdata->id == Individual_Faculty){ ?>
							  <div class="col-md-4">
								<div class="form-group">
								  <input type="text" class="form-control" placeholder="Name of the Institution (If Working)" value="<? echo ($form_data['nameoftheInstitution'] != "") ? $form_data['nameoftheInstitution'] : '' ?>" name="if_nameoftheInstitution_working">
								</div>
							  </div>
							<? } ?>
							<? if($cdata->id == Institution ||  $cdata->id == Individual_Faculty || $cdata->id == Students ||  $cdata->id == Industry ||  $cdata->id == RD_Labs ||  $cdata->id == Retired_Professional ){ ?>
							  <div class="col-md-8">
								<div class="form-group">
								  <textarea rows="4" cols="50" class="form-control" id="" name="address" placeholder="Address for Correspondence" autocomplete="off" required><? echo ($form_data['address'] != "") ? $form_data['address'] : '' ?></textarea>
								</div>
							  </div>
		                  	<? } ?>

		                  	<div class="row" style="padding: 17px;">

						  	<? if($cdata->id == Institution || $cdata->id == Industry ||  $cdata->id == RD_Labs ){ ?>
						  	  	<div class="col-md-12">
									<label for="full_name" class="col-form-label">Contact Person Details : </label>
								</div>
							<? } ?>
							<? if($cdata->id == Institution || $cdata->id == Industry ||  $cdata->id == RD_Labs ){ ?>
								  <div class="col-md-4">
									<div class="form-group">
									  <input type="text" class="form-control" placeholder="Name of the Contact Person" value="<? echo ($form_data['cpname'] != "") ? $form_data['cpname'] : '' ?>" name="cpname" required>
									</div>
								  </div>
							<? } ?>
							<? if($cdata->id == Institution || $cdata->id == Industry ||  $cdata->id == RD_Labs){ ?>
								   <div class="col-md-4">
									<div class="form-group">
									  <input type="text" class="form-control" placeholder="Contact Person Mobile No." value="<? echo ($form_data['mobile'] != "") ? $form_data['mobile'] : '' ?>" name="mobile" maxlength="10" autocomplete="off" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" required>
									</div>
								  </div>
							<? } ?>
							<? if($cdata->id == Institution || $cdata->id == Industry ||  $cdata->id == RD_Labs){ ?>
								  <div class="col-md-4">
									<div class="form-group">
									  <input type="email" class="form-control" name="email" placeholder="Contact Person Email ID" value="<? echo ($form_data['email'] != "") ? $form_data['email'] : '' ?>" required>
									</div>
								  </div>
							<? } ?>
							<? if($cdata->id == Institution || $cdata->id == Industry || $cdata->id == Individual_Faculty ||  $cdata->id == RD_Labs){ ?>
								  <div class="col-md-4">
									<div class="form-group">
									  <input type="text" class="form-control" name="contact_person_designation" placeholder="Designation" value="<? echo ($form_data['contact_person_designation'] != "") ? $form_data['contact_person_designation'] : '' ?>" required>
									</div>
								  </div>
							<? } ?>
							<? if($cdata->id == Institution || $cdata->id == Industry || $cdata->id == Individual_Faculty ||  $cdata->id == RD_Labs){ ?>
								  <div class="col-md-4">
									<div class="form-group">
									  <input type="text" class="form-control" name="contact_person_department" placeholder="Department" value="<? echo ($form_data['contact_person_department'] != "") ? $form_data['contact_person_department'] : '' ?>" required>
									</div>
								  </div>
							<? } ?>
							<? if($cdata->id == Institution || $cdata->id == Industry || $cdata->id == Individual_Faculty ||  $cdata->id == Students || $cdata->id == RD_Labs ||$cdata->id == Retired_Professional  ){ ?>
								  <div class="col-md-4">
									<div class="form-group">
									  	<select class="form-control" name="contact_person_stream" required>
									  		<option value="">Select Stream</option>
									  		<?
											foreach($streams as $s){
												//if(in_array($edata->id,json_decode($s->events))){
													echo '<option value="'.$s->category.'">'.$s->category.'</option>';
												//}
											}
											?>
										</select>
									</div>
								  </div>
							   <? } ?>
						    </div>


						    <div class="col-md-12">
                  	            <div class="row">
					        <? if($cdata->id == Institution ){ ?>
		                  		<!--<div class="col-md-4">
									<div class="form-group checkbox-group required">
									  <label for="full_name" class="col-form-label "> Type of Institution</label>
									  <div class="form-group row">
										<div class="col-md-12">
											<select name="institution_type" id="institution_type" class="form-control" required>
												<option value="">Select Institution Type</option>
												<? /*$types = $this->db->get_where("tbl_institution_types",["status"=>"Active"])->result();
												   foreach($types as $t){
													   echo '<option value="'.$t->type.'">'.$t->type.'</option>';
												   }*/
												?>
											</select>
										</div>
										<div class="col-md-4">
											<select name="institution_subtype" id="institution_subtype" class="form-control" required>
												<option value="">Select Sub Institution Type</option>

											</select>
										</div>
									  </div>
									</div>
								</div>-->
								<div class="col-md-12">
									<div class="form-group">
									  <label for="full_name" class="col-form-label "> Category of the Institution</label>
									  <div class="checkbox-group category">
										<? $categories = $this->db->like("events",explode("~",$this->uri->segment(4))[1])->get_where("tbl_categories",["status"=>"Active"])->result();
										   foreach($categories as $c){
											// $selCat = json_decode($form_data['categories'],true);
										 ?>
											<label>
											  <input type="radio" name="categories" value="<? echo $c->category ?>" required>
											  <? echo $c->category ?></label>
										<? } ?>
									  </div>
		<!--							  <strong><small style="color: red">Note : Institutions with multiple category should register separately for each category.</small></strong>-->
									</div>

								  </div>


								<?php } ?>

								<? if($cdata->id == Individual_Faculty || $cdata->id == Students || $cdata->id == Retired_Professional){ ?>
								<div class="col-md-4">
									<div class="form-group checkbox-group required">
									  <label for="full_name" class="col-form-label ">Gender</label>
									  <div class="form-group row">
										<div class="col-md-12">
											<select name="gender" id="gender" class="form-control getPrice_1" required>
												<option value="">Select Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div>
									  </div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group checkbox-group required">
									  <label for="full_name" class="col-form-label ">Social Status</label>
									  <div class="form-group row">
										<div class="col-md-12">
											<select name="caste_type" id="caste" class="form-control getPrice_1" required>
												<option value="">Select</option>
												<option value="General">General</option>
												<option value="BC">BC</option>
												<option value="OBC">OBC</option>
												<option value="SC">SC</option>
												<option value="ST">ST</option>
		<!--										<option value="Others">Others</option>-->
											</select>
										</div>
									  </div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group checkbox-group required">
									  <label for="full_name" class="col-form-label ">Are you physically challenged</label>
									  <? $mdetails = json_decode($form_data['managementdetails'],true); ?>
									  <div class=" managementdetails">
										<label>
										  <input type="radio" name="physically_challenged" class="getPrice_1 physically_challenged" value="Yes"  <? if(in_array("Government",$mdetails)){ echo 'checked'; } ?> required>
										  Yes </label>
										<label>
										  <input type="radio" name="physically_challenged" class="getPrice_1 physically_challenged" value="No" <? if(in_array("Aided",$mdetails)){ echo 'checked'; } ?> required>
										  No </label>

									  </div>
									</div>
								  </div>
								 <? } ?>
							    </div>
		                    </div>
		                    <? if($cdata->id == Institution || $cdata->id == Industry || $cdata->id == RD_Labs){ ?>

			                 <div class="col-md-12">
			                    <div class="form-group checkbox-group required">
			                      <label for="full_name" class="col-form-label "> Management Details</label>
			                      <? $mdetails = json_decode($form_data['managementdetails'],true); ?>
			                      <div class=" managementdetails">
			                        <label>
			                          <input type="radio" name="managementdetails" class="managementdetails getPrice_1" value="Government"  <? if(in_array("Government",$mdetails)){ echo 'checked'; } ?> required>
			                          Government </label>
								<? if($cdata->id != Industry && $cdata->id != RD_Labs){ ?>
			                       <!--  <label>
			                          <input type="radio" name="managementdetails" class="managementdetails getPrice_1" value="Government_Aided" <? if(in_array("Government_Aided",$mdetails)){ echo 'checked'; } ?> required>
			                          Government-Aided </label> -->
								<? } ?>
			                        <label>
			                          <input type="radio" name="managementdetails" class="managementdetails getPrice_1" value="Private" <? if(in_array("Private",$mdetails)){ echo 'checked'; } ?> required>
			                          Private </label>
			                      </div>
			                    </div>

			                    <?php
								$discount = json_decode($this->db->get_where("tbl_options",["option_name"=>"ripf_discount"])->row()->option_value);

								if ($discount[0]->Government == $discount[0]->Government_Aided ){

								?>
								<strong>
								<small style="color: red">Note : <?php echo $discount[0]->Government;?>% Discount is available for Government </small>
								</strong>
								<?php }else { ?>
								<strong>
								<small style="color: red">Note : <?php echo $discount[0]->Government;?>% Discount is available for Government </small>
								</strong>
								<?php } ?>

			                  </div>
			                  <?php } ?>
			                  <div class="col-md-12">
			                  <div class="form-group form-check  required ">
			                      <label for="full_name" class="col-form-label "> Topics</label>
			                      <? $mdetails = json_decode($form_data['topic'],true); ?>
			                      <div class="form-check-input">
			                      	<? $topics = $this->db->order_by("id","asc")->get_where("tbl_ripf_topics",["deleted"=>0,"ripf_category"=>$cdata->id])->result();
										$tamount = 0;
									   foreach($topics as $t){
										   $tamount += $t->amount;

									 ?>
										<label>
										  <input type="checkbox" class="form-check-input topic getPrice" name="topic[]" value="<? echo $t->topic_name ?>" <? if(in_array("$t->topic_name",$mdetails)){ echo 'checked'; } ?> > <? echo $t->topic_name." - <i class='fa fa-rupee'></i> ".$t->amount ?></label><br>
			                    	 <? } ?>
			                    	 <label>
										  <input type="checkbox" class="getPrice form-check-input" id="select_all" name="topic[]" value="all" <? if(in_array("all",$mdetails)){ echo 'checked'; } ?> > All  - <i class='fa fa-rupee'></i> <? echo $cdata->overall_discount_amount ?></label>
			                      </div>
			                      <strong><small style="color: red">Note : If you select all topics you'll get discount of <i class='fa fa-rupee'></i><? echo ($tamount-$cdata->overall_discount_amount) ?>.</small></strong>
			                    </div>

			                  </div>
			                  <label for="full_name" class="col-form-label"> Payment Details</label>
										  <div class="row" style="margin-top: 20px">

										  	<div class="col-md-3">
											  <div class="form-group">
												<label>Payment Mode</label>

												<select class="form-control" name="payment_mode" id="payment_mode" required>

													<option value="">Select Payment Mode</option>
													<option value="Cheque">Cheque</option>
													<option value="DD">DD</option>
													<option value="Cash">Cash</option>
													<option value="NEFT">NEFT</option>
													<option value="RTGS">RTGS</option>
													<option value="Free">Free</option>
													<option value="G-Pay">G-Pay</option>
													<option value="Bank Deposit">Bank Deposit</option>

												</select>

											  </div>
											</div>

											<div class="col-md-3">
											  <div class="form-group">
												<label>Amount</label>

												<input type="text" name="totalPrice" class="form-control" required>

											  </div>
											</div>

										  	<div class="col-md-3">
											  <div class="form-group">
												<label>Transaction ID</label>

												<input type="text" name="txn_id" class="form-control" id="txn_id" required>

											  </div>
											</div>

											<div class="col-md-3">
											  <div class="form-group">
												<label>Bank Ref Number</label>

												<input type="text" name="bank_ref_no" class="form-control" id="" required>

											  </div>
											</div>

										   	<div class="col-md-3">
											  <div class="form-group">
												<label>Payment Status</label>

												<select class="form-control" name="payment_status" id="payment_status" required>

													<option value="">Select Payment Status</option>
													<option value="Success">Success</option>
													<option value="Failed">Failed</option>

												</select>

											  </div>
											</div>

										  </div>

									 <!--  <div class="col-md-3">
										<div class="form-group">
										  <label for="full_name" class="col-form-label "> Number(s) of the Participants</label>
										</div>
									  </div>
									  <?
										$pdata = json_decode($form_data["participantsData"]);
										?>
									  <div class="col-md-1">
										<div class="form-group">
										  <input type="number" class="form-control" name="participants" id="students" onChange="addFields()" placeholder="" value="5" max="10" min="1" readonly required>
										</div>
									  </div> -->

			              <? //if($cdata->members_count > 1){ ?>
			                  <!--<div class="col-md-3">
			                    <div class="form-group">
			                      <label for="full_name" class="col-form-label "> No'of Participants for each topic</label><br>
			                      <strong><small style="color: red">Note : Maximum Limit is <? echo $this->admin->get_option("participants_count") ?>.</small></strong>
			                    </div>
			                  </div>-->
			                  <div class="col-md-1">
			                    <div class="form-group">
			                      <input type="hidden" class="form-control" name="participants" id="students" placeholder="" value="<? echo $cdata->members_count ?>" readonly required>
			                    </div>
			                  </div>
			              <? //} ?>

			                </div>


<!-- 			                <input type="hidden" name="totalPrice" id="total" value="<? echo $package->package_amount ?>">
 -->
			                <div class="row">
			                	<div class="col-md-6">
									<!-- <h5 class="pull-left" id="participationPrice" style="width:100%; color: black;"> <strong>Participation Fee - <i class="fa fa-rupee"></i> <? echo $package->package_amount ?></strong></h5>
									<h5 class="pull-left" id="discountPrice" style="display: none;width:100%"> <strong>Discount Amount - <i class="fa fa-rupee"></i> <? echo $package->package_amount ?></strong></h5>
									<h5 class="pull-left" id="totalPrice" style="display: none;width:100%"> <strong>Fee to be paid after Discount - <i class="fa fa-rupee"></i> <? echo $package->package_amount ?></strong></h5> -->
								</div>

								<div class="col-md-6">
									<input type="hidden" name="event_category" value="<? echo $this->uri->segment(4) ?>">
								
									<button type="submit" class="btnSubmit pull-right">Next</button>
			              		</div>
			               </div>

			                <div class="form-group">
								<input type="checkbox" name="check" required> I agree to all the <a href="#" target="_blank">Terms &amp; Conditions</a>
							</div>


			                <div class="clearfix"></div>
			             </div>



			            </form>

			        <?php // } ?>
			
				</div>
			</div>
		</div>
	</div>











<?php $this->load->view( "admin/back_common/footer" ); ?>


<script type="text/javascript">


	$(document).ready(function(){
		$('#select_all').on('click',function(){
			if(this.checked){
				$('.topic').each(function(){
					this.checked = true;
				});
			}else{
				 $('.topic').each(function(){
					this.checked = false;
				});
			}
		});

		$('.topic').on('click',function(){

			if($('.topic:checked').length == $('.topic').length){
				$('#select_all').prop('checked',true);
			}else{
				$('#select_all').prop('checked',false);
			}
		});



		$(".getPrice").click(function(){

			var topics = [];
			$('.getPrice:checkbox:checked').each(function(){
				topics.push($(this).val())
			});

			var caste = $("#caste").val();
			var gender = $("#gender").val();
			var physically_challenged = $('.physically_challenged:radio:checked').val();
			var managementdetails = $('.managementdetails:radio:checked').val();

			$.ajax({
				type : "post",
				url : "<? echo base_url('admin/ripf/getPrice') ?>",
				dataType : "json",
				data : {topics:topics,category:<? echo $cdata->id ?>,caste:caste,gender:gender,physically_challenged:physically_challenged,managementdetails:managementdetails},
				success : function(data){
					$("#total").val(data.total);
					if(data.discount > 0){
						$("#discountPrice").show();
						$("#totalPrice").show();
						$("#discountPrice").html('<strong style="color: #71a5d2;width:100%">Discount Amount - <i class="fa fa-rupee"></i> '+data.discount+'</strong>');
						$("#totalPrice").html('<strong>Fee to be paid after Discount - <i class="fa fa-rupee"></i> '+data.total+' </strong>');
						$("#participationPrice").html('<strong style="color: #71a5d2;">Participation Fee - <i class="fa fa-rupee"></i> '+data.participation_fee+' </strong>');
					}else{
						$("#discountPrice").hide();
						$("#totalPrice").hide();
						$("#participationPrice").html('<strong>Participation Fee - <i class="fa fa-rupee"></i> '+data.total+' </strong>');
					}
					console.log(data);
				},
				error : function(data){
					console.log(data);
				}
			})
		})

		$(".getPrice_1").change(function(){

			var topics = [];
			$('.getPrice:checkbox:checked').each(function(){
				topics.push($(this).val())
			});

			var caste = $("#caste").val();
			var gender = $("#gender").val();
			var physically_challenged = $('.physically_challenged:radio:checked').val();
			var managementdetails = $('.managementdetails:radio:checked').val();

			$.ajax({
				type : "post",
				url : "<? echo base_url('admin/ripf/getPrice') ?>",
				dataType : "json",
				data : {topics:topics,category:<? echo $cdata->id ?>,caste:caste,gender:gender,physically_challenged:physically_challenged,managementdetails:managementdetails},
				success : function(data){
					$("#total").val(data.total);

					if(data.discount > 0){
						$("#discountPrice").show();
						$("#totalPrice").show();
						$("#discountPrice").html('<strong style="color: #71a5d2;">Discount Amount - <i class="fa fa-rupee"></i> '+data.discount+'</strong>');
						$("#totalPrice").html('<strong>Fee to be paid after Discount - <i class="fa fa-rupee"></i> '+data.total+' </strong>');
						$("#participationPrice").html('<strong style="color: #71a5d2;">Participation Fee - <i class="fa fa-rupee"></i> '+data.participation_fee+' </strong>');
					}else{
						$("#discountPrice").hide();
						$("#totalPrice").hide();
						$("#participationPrice").html('<strong>Participation Fee - <i class="fa fa-rupee"></i> '+data.total+' </strong>');
					}
					console.log(data);
				},
				error : function(data){
					console.log(data);
				}
			})
		})

	});



	/*$("#institution_type").change(function(){
		var institution_type = $(this).val();
		$.ajax({
			type : "post",
			url : "<? echo base_url('home/get_subtypes') ?>",
			data : {institution_type:institution_type},
			dataType : "json",
			success : function(data){
				$("#institution_subtype").html(data.sub_types);
				$("#totalPrice").html('<strong>Participation Fee for Institution - <i class="fa fa-rupee"></i> '+data.amount+'</strong>');
				$("#total").val(data.amount);
				$("#students").val(data.participants);
			},
			error : function(data){
				console.log(data);
			}
		})
	})*/

	$("#formdata").on("submit",function(e){

		e.preventDefault();

		var students = $("#students").val();
		if(students == 0){

			swal(
				'Error!',
				'Please Enter the Number of Participant/s.',
				'warning'
			)
			return false;

		}

		var data = $("#formdata").serialize();

		$.ajax({

			"type" : "post",
			data : data,
			url : "<? echo base_url('admin/ripf/insertdata') ?>",
			success : function(data){

				console.log(data);

				if(data == "success"){

//					window.location.href = '<? //echo base_url('home/verifyOtp') ?>';

					location.reload();
					
				}else{

					$("#error").html(data);

				}


			},
			error : function(data){

				console.log(data);

			}

		});

	});


	$(function(){
		var requiredCheckboxes = $('.category :checkbox[required]');
		requiredCheckboxes.change(function(){
			if(requiredCheckboxes.is(':checked')) {
				requiredCheckboxes.removeAttr('required');
			} else {
				requiredCheckboxes.attr('required', 'required');
			}
		});
	});

	$(function(){

		var requiredCheckboxes = $('.managementdetails :checkbox[required]');
		requiredCheckboxes.change(function(){
			if(requiredCheckboxes.is(':checked')) {
				requiredCheckboxes.removeAttr('required');
			} else {
				requiredCheckboxes.attr('required', 'required');
			}
		});
	});

	function addFields(){

		$(".detais").html("");
		var number = document.getElementById("students").value;

		if(number > <? echo $this->admin->get_option("participants_count") ?>){

			swal(
				'Error!',
				'maximum participants count <? echo $this->admin->get_option("participants_count") ?>.',
				'warning'
			)

			$("#students").val(<? echo $this->admin->get_option("participants_count") ?>);
			return false;

		}

//		var total = number*5000;
		var total = 5000;

		$("#total").val(total);
		$("#totalPrice").html('<strong>Participation Fee for Institution - <i class="fa fa-rupee"></i> '+total+' </strong>');

		var container = document.getElementById("detais");
		while (container.hasChildNodes()) {
			container.removeChild(container.lastChild);
		}

		var html = '';

		for (i=0;i<number;i++){
//			container.appendChild(document.createTextNode("Member " + (i+1)));
//			var input = document.createElement("input");
//			input.type = "text";
//			container.appendChild(input);
//			container.appendChild(document.createElement("br"));

			html += '<div class="col-md-12" id="detais"><div class="fbox"><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" name="pname[]" placeholder="Name" value="" required></div></div><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" name="designation[]" placeholder="Designation & Department" value="" required></div></div><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" placeholder="Mobile" maxlength="10" autocomplete="off" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" name="pmobile[]" value="" required></div></div><div class="col-md-6"><div class="form-group"><input type="email" class="form-control" name="pemail[]" placeholder="Email" value="" required></div></div><div class="clearfix"></div></div></div>'

		}

		$("#detais").append(html);
	}

</script>