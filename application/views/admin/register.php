	<?php $this->load->view("admin/back_common/header"); ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">Offline Registration</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span>Offline Registration </span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>	
			
			<!-- Row -->
				<div class="row">
               		<div class="col-lg-12 col-xs-12" >
						<div class="panel panel-default card-view">
						
							<div class="panel-wrapper collapse in">
						        
						        <div class="container">
						        
						         <form id="formdata" action="">
								  <div class="form-content">
								   <? echo $this->session->flashdata("emsg") ?>

								   <div id="error"></div>

									<div class="row">
										<div class="col-md-3">
										  <div class="form-group">
											<label>Event</label>
											<select class="form-control event"  name="event" id="event" required >
											<?php $events = $this->db->order_by("id","desc")->get_where("tbl_schedule_dates",["status"=>"Active","event_type !=" => "RIPF"])->result(); ?>
												<option value="">Select Event</option>
												<? foreach($events as $e){ 
										          	$event_type = $this->input->get("event_id"); 
												?>
														<option <?php if($event_type==$e->id){ echo 'selected';}?> value="<?php echo $e->id;?>"><?php echo $e->event_name;?></option>
										        <?php }	?>
											

											</select>

										  </div>
										</div>
									</div>
								
									<div class="row">
									  <div class="col-md-4">
										<div class="form-group">
										  <input type="text" class="form-control" placeholder=" Name of the Institution/Organization" value="" name="institutionName" required>
										</div>
									  </div>

									  <div class="col-md-4">
										<div class="form-group">
										  <input type="text" class="form-control" name="orgemail" placeholder="Organization Email ID" value=""/>
										</div>
									  </div>	

									  <div class="col-md-4">
										<div class="form-group">
										  <input type="text" class="form-control" name="website" placeholder="Website" value=""/>
										</div>
									  </div>	

									  <div class="col-md-12">
										<div class="form-group">
										  <textarea rows="4" cols="50" class="form-control" id="" name="address" placeholder="Address for Correspondence" autocomplete="off" required></textarea>
										</div>
									  </div>	

									  <div class="col-md-4">
										<div class="form-group">
										  <input type="text" class="form-control" placeholder="Name of the Contact Person" value="" name="cpname" required>
										</div>
									  </div>
									   <div class="col-md-4">
										<div class="form-group">
										  <input type="text" class="form-control" placeholder="Contact Person Mobile No." value="" name="mobile" maxlength="10" autocomplete="off" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" required>
										</div>
									  </div>

									  <div class="col-md-4">
										<div class="form-group">
										  <input type="email" class="form-control" name="email" placeholder="Contact Person Email ID" value="" required>
										</div>
									  </div>
									  <div class="col-md-4">
										<div class="form-group">
										<input type="text" class="form-control" name="contact_person_designation" placeholder="Contact Person Designation" value="" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										<input type="text" class="form-control" name="contact_person_department" placeholder="Contact Person Department" value="" required>
										</div>
									 </div>
										
									  <div class="col-md-12">
										<div class="form-group">
										  <label for="full_name" class="col-form-label"> Category of the Institution</label>
										  <div class="category row">
									  	  
									  	  <? $categories = $this->db->get_where("tbl_categories",["status"=>"Active"])->result(); 
											 foreach($categories as $c){ 
											 ?>
										  	  <div class="col-md-2">	
												<label><input type="radio" name="category[]" value="<? echo $c->category ?>" required> <? echo $c->category ?></label>
											  </div>
										  <? } ?> 	  
											  
										  </div>
										</div>
									  </div>
									  <div class="col-md-12">
										<div class="form-group checkbox-group required">
										  <label for="full_name" class="col-form-label "> Management Details</label>
										  <div class="managementdetails row">
										  <div class="col-md-2">
											<label>
											  <input type="checkbox" name="managementdetails[]" value="Government" required>
											  Government </label>
										  </div>		  
											  
										  <div class="col-md-2">	  
											<label>
											  <input type="checkbox" name="managementdetails[]" value="Aided" required>
											  Aided </label>
										  </div>		  
											  
											  
										  <div class="col-md-2">	  
											<label>
											  <input type="checkbox" name="managementdetails[]" value="Private" required>
											  Private </label>
										  </div>		  
											  
										  </div>
										</div>
									  </div>
									  
									  <div class="col-md-12" >
								      <? if($this->input->get("event_type") == "NAAC"){ ?>	
									   <div class="form-group checkbox-group required" id="featured-guests">
											<label for="full_name" class="col-form-label "> Type of Institution</label>
											<div class="form-group row">
												<div class="col-md-4">
													<select name="institution_type" id="institution_type" class="form-control" required>
														<option value="">Select Institution Type</option>
														<? $types = $this->db->get_where("tbl_institution_types",["status"=>"Active"])->result(); 
														foreach($types as $t){
															echo '<option value="'.$t->type.'">'.$t->type.'</option>';
														}							 
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
										<? } ?>								
										<? if($this->input->get("event_type") == "NIRF"){ ?>



										<div class="form-group" id="institution_type1" >
											<label for="full_name" class="col-form-label "> Type of Institution</label>
											<div class="managementdetails">
												<label>
												<input type="radio" name="institution_type" value="Affiliated" >
												Affiliated </label>
												<label>
												<input type="radio" name="institution_type" value="Autonomous" >
												Autonomous </label>
												<label>
												<input type="radio" name="institution_type" value="University" >
												University </label>
											</div>
											</div>
												<?php } ?>


									  <br>
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
												
												<input type="text" name="amount" class="form-control" required>
												
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
									  
									  <div class="col-md-3">
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
									  </div>


									  <!-- <div class="col-md-12" id="detais">
										<div class="fbox">
										  <div class="col-md-4">
											<div class="form-group">
											  <input type="text" class="form-control" name="pname[]" placeholder="Name" value="" required>
											</div>
										  </div>
										  <div class="col-md-4">
											<div class="form-group">
											  <input type="text" class="form-control" name="designation[]" placeholder="Designation" value="" required>
											</div>
										  </div>
										  <div class="col-md-4">
											<div class="form-group">
											  <input type="text" class="form-control" name="department[]" placeholder="Department" value="" required>
											</div>
										  </div>
										  <div class="col-md-6">
											<div class="form-group">
											  <input type="text" class="form-control" name="pmobile[]" placeholder=" Mobile" maxlength="10" autocomplete="off" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" value="" required>
											</div>
										  </div>
										  <div class="col-md-6">
											<div class="form-group">
											  <input type="email" class="form-control" name="pemail[]" placeholder="Email" value="" required>
											</div>
										  </div>
										  <div class="clearfix"></div>
										</div>
									  </div> -->


									</div>
										
									<input type="hidden" name="totalPrice" id="total" value="5000">

									<h2 class="pull-left" id="totalPrice"> <strong>Total Participation Fee- <i class="fa fa-rupee"></i> 5000</strong></h2>                
									<button type="submit" class="btn btn-success btnSubmit pull-right">Submit</button>
									<div class="clearfix"></div>
								  </div>



								  </form>
						         
						        </div>
						         
							</div>
						</div>
							
					</div>
				</div>

				<!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>
<script type="text/javascript">
$(document).ready( function () {
    
	$("#payment_mode").change(function(){
		
		var val = $(this).val();
		
		if(val == "Cash"){
			
			$("#txn_id").removeAttr("required", "required");
			
		}else{
			
			$("#txn_id").attr("required", "required");
			
		}
		
	})
	
} );
</script>


<script type="text/javascript">

$("#formdata").on("submit",function(e){
	
		
		e.preventDefault();
		
		var data = $("#formdata").serialize();
		
		$.ajax({
			
			"type" : "post",
			data : data,
			url : "<? echo base_url('admin/users/insertData') ?>",
			success : function(data){
				console.log(data);
				
				if(data == "success"){
					
					location.reload();
					
				}else{
					
					$("#error").html(data);
					return false;
					
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
		var number = document.getElementById("students").value;
		
		if(number > <? echo $this->admin->get_option("participants_count") ?>){
			
			swal(
				'Error!',
				'maximum participants count <? echo $this->admin->get_option("participants_count") ?>.',
				'warning'
			) 
			return false;
			
		}
		
		var total = 5000;
		
		$("#total").val(total);
		$("#totalPrice").html('<strong>Total Participation Fee- <i class="fa fa-rupee"></i> '+total+' </strong>');
		
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
			
			html += '<div class="col-md-12" id="detais"><div class="fbox"><div class="col-md-4"><div class="form-group"><input type="text" class="form-control" name="pname[]" placeholder="Name" value="" required></div></div><div class="col-md-4"><div class="form-group"><input type="text" class="form-control" name="designation[]" placeholder="Designation" value="" required></div></div><div class="col-md-4"><div class="form-group"><input type="text" class="form-control" name="department[]" placeholder="Department" value="" required></div></div><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" placeholder="Mobile" maxlength="10" autocomplete="off" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" name="pmobile[]" value="" required></div></div><div class="col-md-6"><div class="form-group"><input type="email" class="form-control" name="pemail[]" placeholder="Email" value="" required></div></div><div class="clearfix"></div></div></div>'
			
		}
		
		$("#detais").append(html);
	}


</script>


<script type="text/javascript">

	$(".event").change(function(){
		var event = $(this).val();
		$.ajax({
			type : "post",
			data : {
				event : event,
				
			},
			url : "<? echo base_url('admin/users/get_event_type') ?>",
			success : function(data){
				window.location.href = '<? echo base_url('admin/users/register?') ?>event_id='+event+'&event_type='+data;
			}
		})
	})
	
</script>




<script type="text/javascript">
	
	$("#institution_type").change(function(){
		
		var institution_type = $(this).val();
		var managementdetails = $('.managementdetails:radio:checked').val();
		
		$.ajax({
			type : "post",
			url : "<? echo base_url('admin/users/get_subtypes') ?>",
			data : {institution_type:institution_type,managementdetails:managementdetails},
			dataType : "json",
			success : function(data){
				$("#institution_subtype").html(data.sub_types);
				$("#totalPrice").html('<strong>Participation Fee for Institution - <i class="fa fa-rupee"></i> '+data.total+'</strong>');
				$("#total").val(data.total);
				$("#students").val(data.participants);
				console.log(data);
			},
			error : function(data){
				console.log(data);
			}
		})
	});
	
	$(".managementdetails").click(function(){
		
		var institution_type = $("#institution_type").val();
		var managementdetails = $('.managementdetails:radio:checked').val();
		
		if(institution_type){
			$.ajax({
				type : "post",
				url : "<? echo base_url('admin/users/get_subtypes') ?>",
				data : {institution_type:institution_type,managementdetails:managementdetails},
				dataType : "json",
				success : function(data){
					$("#institution_subtype").html(data.sub_types);
					$("#totalPrice").html('<strong>Participation Fee for Institution - <i class="fa fa-rupee"></i> '+data.total+'</strong>');
					$("#total").val(data.total);
					$("#students").val(data.participants);
				},
				error : function(data){
					console.log(data);
				}
			})
		}
	});
	</script>



