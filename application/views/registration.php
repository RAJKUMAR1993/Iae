<? front_header(); 

$event_id = explode("~",$this->uri->segment(3))[1];
$sdates = $this->db->get_where("tbl_schedule_dates",["id"=>$event_id])->row();
$cdate = date("Y-m-d");
?>
  
<style>
.note {
    text-align: center;
    height: auto;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
	
	#inpage .note p{
		color: white;
		text-align: center;
	}	
.form-content {
    padding: 2%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
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
.fbox {
    background: #fff;
    padding: 15px 0px 0px 0px;
    text-align: center;
    -webkit-box-shadow: 0 0 35px rgba(2, 6, 32, 0.15);
    -moz-box-shadow: 0 0 35px rgba(2, 6, 32, 0.15);
    -ms-box-shadow: 0 0 35px rgba(2, 6, 32, 0.15);
    -o-box-shadow: 0 0 35px rgba(2, 6, 32, 0.15);
    box-shadow: 0 0 35px rgba(2, 6, 32, 0.15);
    margin-bottom: 15px;
}
</style>  
  
  <!-- [/MAIN-HEADING]
 ============================================================================================================================-->
  <section class="main-heading" id="home">
    <div class="baner"> <img src="<? echo base_url('assets/') ?>images/inbanner.jpg" class="img-responsive" /> </div>
  </section>
  
  <!-- [/MAIN-HEADING]
 ============================================================================================================================--> 
  
  <!-- [ABOUT US]
 ============================================================================================================================-->
  <section class="white-background black" id="inpage">
    <div class="container">
      <div class="row">
        <div class="col-md-12  black">
          <h3 class="title"> </h3>
          <div class="container register-form">
            <div class="form">

            <? if(($cdate < $sdates->registration_end_date) && ($sdates->status == "Active")){ ?>		
			   	
              <div class="note">
                <h1 style="padding-top: 15px;"> Online Registration </h1>
                <p>(<? echo $sdates->event_name ?>)</p>
              </div>
              
              <!--<marquee behavior="slide">
<p style="color: red; font-weight: bold;text-align: center"> Last date for registration has been extended till - 15-Jan-2021 </p>
</marquee>-->
              
<!--              <form method="post" action="<? echo base_url('home/insertData') ?>" id="formdata">-->
              <form id="formdata">
              
              <div class="form-content">
              <small style="color: red; font-weight: bold;text-align: center">Note : OTP will be sent to your contact person Email ID & Mobile Number.</small> <br><br>


               <? echo $this->session->flashdata("emsg") ?>
               
               <div id="error"></div>
               
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Name of the Institution/Organization" value="<? echo ($form_data['institutionName'] != "") ? $form_data['institutionName'] : '' ?>" name="institutionName" required>
                    </div>
                  </div>
				
				  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" class="form-control" name="orgemail" placeholder="Organization Email ID" value="<? echo ($form_data['orgemail'] != "") ? $form_data['orgemail'] : '' ?>"/>
                    </div>
                  </div>	
					
				  <div class="col-md-4">
                    <div class="form-group">
                      <input type="text" class="form-control" name="website" placeholder="Website" value="<? echo ($form_data['website'] != "") ? $form_data['website'] : '' ?>"/>
                    </div>
                  </div>	
					
				  <div class="col-md-12">
                    <div class="form-group">
                      <textarea rows="4" cols="50" class="form-control" id="" name="address" placeholder="Address for Correspondence" autocomplete="off" required><? echo ($form_data['address'] != "") ? $form_data['address'] : '' ?></textarea>
                    </div>
                  </div>
                  	
				  <? if($edata->event_type == "NAAC"){ ?>
						<label for="full_name" class="col-form-label" style="margin-left: 20px">NAAC Coordinator Details : </label>
				  <? } ?>
				  <div class="row" style="padding: 20px;">		
					  <div class="col-md-4">
						<div class="form-group">
						  <input type="text" class="form-control" placeholder="Name of the Contact Person" value="<? echo ($form_data['cpname'] != "") ? $form_data['cpname'] : '' ?>" name="cpname" required>
						</div>
					  </div>
					   <div class="col-md-4">
						<div class="form-group">
						  <input type="text" class="form-control" placeholder="Contact Person Mobile No." value="<? echo ($form_data['mobile'] != "") ? $form_data['mobile'] : '' ?>" name="mobile" maxlength="10" autocomplete="off" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" required>
						</div>
					  </div>

					  <div class="col-md-4">
						<div class="form-group">
						  <input type="email" class="form-control" name="email" placeholder="Contact Person Email ID" value="<? echo ($form_data['email'] != "") ? $form_data['email'] : '' ?>" required>
						</div>
					  </div>
					  <div class="col-md-4">
						<div class="form-group">
						  <input type="text" class="form-control" name="contact_person_designation" placeholder="Contact Person Designation" value="<? echo ($form_data['contact_person_designation'] != "") ? $form_data['contact_person_designation'] : '' ?>" required>
						</div>
					  </div>
					  <div class="col-md-4">
						<div class="form-group">
						  <input type="text" class="form-control" name="contact_person_department" placeholder="Contact Person Department" value="<? echo ($form_data['contact_person_department'] != "") ? $form_data['contact_person_department'] : '' ?>" required>
						</div>
					  </div>	
				  </div>	
					
                  
                  <!--<div class="col-md-12">
                    <div class="form-group">
                      <label for="full_name" class="col-form-label "> Category of the Institution</label>
                      <div class="checkbox category">
                       
                        <? //$categories = $this->db->get_where("tbl_categories",["status"=>"Active"])->result(); 

						 //foreach($categories as $c){
							 
							// $selCat = json_decode($form_data['categories'],true);
							 
						 ?>
                        
							<label>
							  <input type="radio" name="category[]" value="<? //echo $c->category ?>" <? //if(in_array($c->category,$selCat)){ echo 'checked'; } ?> required>
							  <? //echo $c->category ?> </label>
                        <? //} ?>  
                      </div>
                      <strong><small style="color: red">Note : Institutions with multiple category should register separately for each category.</small></strong>
                    </div>
                    
                  </div>-->
                  
                  <div class="col-md-12">
                    <div class="form-group checkbox-group required">
                      <label for="full_name" class="col-form-label "> Management Details</label>
                      <? $mdetails = json_decode($form_data['managementdetails'],true); ?>
                      <div class="checkbox managementdetails">
                        <label>
                          <input type="radio" name="managementdetails[]" class="managementdetails" value="Government"  <? if(in_array("Government",$mdetails)){ echo 'checked'; } ?> required>
                          Government </label>
                        <!--<label>
                          <input type="radio" name="managementdetails[]" class="managementdetails" value="Government_Aided" <? //if(in_array("Government_Aided",$mdetails)){ echo 'checked'; } ?> required>
                          Government-Aided </label>-->
                        <label>
                          <input type="radio" name="managementdetails[]" class="managementdetails" value="Private" <? if(in_array("Private",$mdetails)){ echo 'checked'; } ?> required>
                          Private </label>
                      </div>
                    </div>
                    <strong><small style="color: red">Note : 25% Discount is available for Government Institutions.</small></strong>
                  </div>
                   
                  <div class="col-md-12">
                    <div class="form-group checkbox-group required">
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
                  </div>
                  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="full_name" class="col-form-label "> Number of Participants</label><br>
<!--                      <strong><small style="color: red">Note : Maximum Limit is <? echo $this->admin->get_option("participants_count") ?>.</small></strong>-->
                    </div>
                  </div>
                  <? 
					$pdata = json_decode($form_data["participantsData"]);
					?>
                  
                  <div class="col-md-1">
                    <div class="form-group">
                      <input type="number" class="form-control" name="participants" id="students" placeholder="" value="<? echo $package->participants ?>" readonly required>
                    </div>
                  </div>
                  
                  	<? //if(count($pdata) > 0){ 
						//foreach($pdata as $key => $pd){
					?>
						  <!--<div class="col-md-12 <? //echo ($key == 0) ? '' : 'detais' ?>" id="<? //echo ($key == 0) ? 'detais' : '' ?>">
							<div class="fbox">
							  <div class="col-md-6">
								<div class="form-group">
								  <input type="text" class="form-control" name="pname[]" placeholder="Name" value="<? //echo $pd->pname ?>" required>
								</div>
							  </div>
							  <div class="col-md-6">
								<div class="form-group">
								  <input type="text" class="form-control" name="designation[]" placeholder="Designation & Department" value="<? //echo $pd->designation ?>" required>
								</div>
							  </div>
							  <div class="col-md-6">
								<div class="form-group">
								  <input type="text" class="form-control" name="pmobile[]" placeholder=" Mobile" maxlength="10" autocomplete="off" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" value="<? //echo $pd->pmobile ?>" required>
								</div>
							  </div>
							  <div class="col-md-6">
								<div class="form-group">
								  <input type="email" class="form-control" name="pemail[]" placeholder="Email" value="<? //echo $pd->pemail ?>" required>
								</div>
							  </div>
							  <div class="clearfix"></div>
							</div>
						  </div>-->
                	<? //}}else{ ?>
                 
<!--                 		<div class="col-md-12" id="detais"></div>		-->
                 
                 	<? //} ?>
                </div>
                
                
                <input type="hidden" name="totalPrice" id="total" value="<? echo $package->package_amount ?>">
                
                <div class="row">
                	<div class="col-md-6">
						<h2 class="pull-left" id="totalPrice"> <strong>Participation Fee for Institution - <i class="fa fa-rupee"></i> <? echo $package->package_amount ?></strong></h2>  
					</div>
					
					<div class="col-md-6">
						<button type="submit" class="btnSubmit pull-right">Next</button>
              		</div>
               </div>
                
                <div class="form-group">
					<input type="checkbox" name="check" required> I agree to all the <a href="#" target="_blank">Terms &amp; Conditions</a>
				</div>
               
                
                <div class="clearfix"></div>
              </div>
              
              
              
              </form>
              
            <? }else{ ?>

            	<p style="text-align: center;font-weight: 600;font-size: 28px;color: red;padding: 8%">Registrations Are Closed</p>	
              
            <? } ?>  

            </div>
          </div>
          <br/>
        </div>
      </div>
	  <!--<div class="row">
	      <div class="col-md-4"></div>
	      <div class="col-md-4">
			<a href="<? echo base_url('assets/') ?>workshop_Registration_Form.pdf" target="_blank" download><div class="rbox">
			Offline Registration
			</div></a>
			</div>
	      <div class="col-md-4"></div>
	  </div>-->
      <div class="gap"> </div>
      
      <!-- /row --> 
      
    </div>
  </section>
  
  <!-- [CONTACT]
 ============================================================================================================================--> 
<? front_footer() ?>

<script type="text/javascript">
	
	$("#institution_type").change(function(){
		
		var institution_type = $(this).val();
		var managementdetails = $('.managementdetails:radio:checked').val();
		
		$.ajax({
			type : "post",
			url : "<? echo base_url('home/get_subtypes') ?>",
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
				url : "<? echo base_url('home/get_subtypes') ?>",
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
			url : "<? echo base_url('home/insertData') ?>",
			success : function(data){
				
				console.log(data);
				
				if(data == "success"){
					
					window.location.href = '<? echo base_url('home/verifyOtp') ?>';
					
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



