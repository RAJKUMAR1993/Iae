<? front_header() ?>
<style>

	.price-heading{
		text-align: center;
	}
	.price-heading h1{
		margin-top: 75px;
	  	color: #666;
	/*  margin: 0;*/
	  	padding: 0 0 15px 0;
		font-size: 32px;
	}
	.card-view{
		background: #fff;
		margin-bottom: 30px;
		border: none;
		border-radius: 0;
		box-shadow: 0px 1px 25px rgb(0 0 0 / 10%);
		padding: 35px;
	}
	
</style>

 <section class="white-background black" id="inpage">
 	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!--PRICE HEADING START-->
				<div class="price-heading clearfix">
					<h1>Participants</h1>
				</div>
				<!--//PRICE HEADING END-->
			</div>
		</div>
	</div>
	<div class="container">
    	<div class="row">
    	
    		<div class="card-view" style="padding: 20px;height: 100px">
				<div class="col-md-6 pull-left">
					<p>
						<strong>Name</strong> : <? echo $r->cpname ?><br>
						<strong>Designation/Department</strong> : <? echo $r->contact_person_designation.", ".$r->contact_person_department; ?><br>
					</p>
				</div>
				<div class="col-md-6 pull-right">
					<p>
						<strong>Name of the Institution</strong> : <? echo $this->session->userdata("college_name"); ?><br>
						<strong>Type of the Institution</strong> : <? echo $r->institution_type.", ".$r->institution_subtype; ?><br>
					</p>
				</div>
			</div>
    		
    		<div class="panel-wrapper collapse in">
						        
				<div class="container">

				 <form id="formdata" method="post">
				  <div class="form-content card-view">
				   <? echo $this->session->flashdata("emsg") ?>

				   <div id="error"></div>

					<div class="row">

					  <div class="col-md-12">
						<?
						   $cparticipants = $this->db->get_where("tbl_participants",["inst_id"=>$r->id])->result();
						
						   if($cparticipants){	
	
							   foreach($cparticipants as $k => $pa){	 
							
						 ?>
							<label style="margin-bottom: 10px"><strong>Participant <? echo $k+1 ?></strong></label>
							<div class="row">
								<div class="col-md-11">
								  <div class="col-md-4">
									<div class="form-group">
									  <input type="text" class="form-control" name="pname[]" placeholder="Name" value="<? echo $pa->pname ?>" required>
									</div>
								  </div>
								  <div class="col-md-4">
									<div class="form-group">
									  <input type="text" class="form-control" name="designation[]" placeholder="Designation" value="<? echo $pa->designation ?>" required>
									</div>
								  </div>
								  <div class="col-md-4">
									<div class="form-group">
									  <input type="text" class="form-control" name="department[]" placeholder="Department" value="<? echo $pa->department ?>" required>
									</div>
								  </div>
								  <div class="col-md-6">
									<div class="form-group">
									  <input type="text" class="form-control" name="pmobile[]" placeholder=" Mobile" maxlength="10" autocomplete="off" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" value="<? echo $pa->pmobile ?>" required>
									</div>
								  </div>
								  <div class="col-md-6">
									<div class="form-group">
									  <input type="email" class="form-control" name="pemail[]" placeholder="Email" value="<? echo $pa->pemail ?>" required>
									  <input type="hidden" class="form-control" name="serial_number[]" placeholder="Collage Name" value="<? echo $pa->serial_number ?>" >
									<input type="hidden" class="form-control" name="verification_status[]" placeholder="Collage Name" value="<? echo $pa->verification_status ?>" >
									</div>
								  </div>
								  
								</div>
							  
							  	<div class="col-md-1">
									<? if(($pa->pmobile != "") && ($pa->pemail != "") &&($pa->verification_status == "Inactive")){ ?>
										<a class="btn btn-primary verifyParticipant" institute_id="<? echo $r->id ?>" participant_id="<? echo $pa->id ?>" email="<? echo $pa->pemail ?>" mobile="<? echo $pa->pmobile ?>" style="margin-top: 24px;">Verify</a>
									<? } ?>		
							  	</div>
							  <div class="clearfix"></div>
							</div>

						<? }}else{ 
						  		
							   $pcount = $r->participants;
							   for($i=0;$i<$pcount;$i++){
						  ?>
							
								<label style="margin-bottom: 10px"><strong>Participant <? echo $i+1 ?></strong></label>
								<div class="row">
								  
									<div class="col-md-11">
									  <div class="col-md-4">
										<div class="form-group">
										  <input type="text" class="form-control vparticipant<? echo $i ?>pname" name="pname[]" placeholder="Name" value="<? echo $pa->pname ?>" required>
										</div>
									  </div>
									  <div class="col-md-4">
										<div class="form-group">
										  <input type="text" class="form-control vparticipant<? echo $i ?>designation" name="designation[]" placeholder="Designation" value="<? echo $pa->designation ?>" required>
										</div>
									  </div>
									  <div class="col-md-4">
										<div class="form-group">
										  <input type="text" class="form-control vparticipant<? echo $i ?>department" name="department[]" placeholder="Department" value="<? echo $pa->department ?>" required>
										</div>
									  </div>
									  <div class="col-md-6">
										<div class="form-group">
										  <input type="text" class="form-control vparticipant<? echo $i ?>pmobile" name="pmobile[]" placeholder=" Mobile" maxlength="10" autocomplete="off" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" value="<? echo $pa->pmobile ?>" required>
										</div>
									  </div>
									  <div class="col-md-6">
										<div class="form-group">
										  <input type="email" class="form-control vparticipant<? echo $i ?>pemail" name="pemail[]" placeholder="Email" value="<? echo $pa->pemail ?>" required>
										  <input type="hidden" class="form-control" name="serial_number[]" placeholder="Collage Name" value="<? echo $pa->serial_number ?>" >
										</div>
									  </div>
									 </div>
									 <div class="col-md-1">
									 	<? //if(($pa->pmobile != "") && ($pa->pemail != "")){ ?>
									 		<button type="button" class="btn btn-primary verifynonParticipant" vp="vparticipant" style="margin-top: 24px;">Verify</button>
									 	<? //} ?>		
									 </div>
								  <div class="clearfix"></div>
								</div>
								
						<? }} ?>				
					  </div>


					</div>

					<input type="hidden" name="order_id" value="<? echo $r->order_id ?>">

					<div class="row" align="center">	
						<button type="submit" class="btn btn-success btnSubmit" style="margin-top: 20px;">Update Participants</button>	
					</div>	
					<div class="clearfix"></div>
				  </div>



				  </form>
				</div>
			</div>
		</div>
	</div>
</section>	

<!-- Modal -->
<div id="enterOtp" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="font-size: 30px;color: black;margin-top: -8px;">&times;</button>
        <h4 class="modal-title" style="color: black">Verify Participant</h4>
      </div>
      <div class="modal-body">
          <form method="post" id="confirmOtp">
			  <div class="form-content"> 
			  <div class="pmsg"></div>
				  <div class="row">
					  <div class="col-md-6">
						<label style="color: black">Mobile OTP</label>
						<div class="form-group">
						  <input type="text" class="form-control" placeholder="Enter mobile otp" value="" name="motp" required>
						</div>
					  </div>
					  <div class="col-md-6">
						<label style="color: black">Email OTP</label>
						<div class="form-group">
						  <input type="text" class="form-control" placeholder="Enter email otp" value="" name="eotp" required>
						</div>
					  </div>
				  </div>

				  <div class="row">

					<div class="col-md-3"></div>
					<div class="col-md-6" align="center" style="margin-top: 20px">
						<input type="hidden" name="mobile" id="prmobile">	
						<input type="hidden" name="email" id="premail">	
						<input type="hidden" name="participant_id" id="participant_id">	
						<button type="submit" class="btnSubmit btn btn-info">Confirm</button>

					</div>
					<div class="col-md-3"></div>

				  </div>
			  </div>
		  </form>
      
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div>
   </div>
  </div>
</div>

  </div>
</div>

<? front_footer() ?>

<script type="text/javascript">
	
	$(".verifyParticipant").click(function(){
		
		$(".pmsg").html("");
		var institute_id = $(this).attr("institute_id");
		var email = $(this).attr("email");
		var mobile = $(this).attr("mobile");
		var participant_id = $(this).attr("participant_id");
		
		$.ajax({
			type : "post",
			data : {institute_id:institute_id,email:email,mobile:mobile},
			url : "<? echo base_url('verifyParticipant') ?>",
			success : function(data){
				$(".pmsg").html('<div class="alert alert-success">OTP successfully sent to participant email('+email+') & mobile number('+mobile+').</div>');
				$("#prmobile").val(mobile);
				$("#premail").val(email);
				$("#participant_id").val(participant_id);
				$("#enterOtp").modal("show");
				console.log(data);
			},
			error : function(data){
				$(".pmsg").html("");
			}
		})
		
	})
	
	$(".verifynonParticipant").click(function(){
		
		$(".pmsg").html("");
		var institute_id = $(this).attr("institute_id");
		var email = $(this).attr("email");
		var mobile = $(this).attr("mobile");
		var participant_id = $(this).attr("participant_id");
		
		$.ajax({
			type : "post",
			data : {institute_id:institute_id,email:email,mobile:mobile},
			url : "<? echo base_url('verifyParticipant') ?>",
			success : function(data){
				$(".pmsg").html('<div class="alert alert-success">OTP successfully sent to participant email('+email+') & mobile number('+mobile+').</div>');
				$("#prmobile").val(mobile);
				$("#premail").val(email);
				$("#participant_id").val(participant_id);
				$("#enterOtp").modal("show");
				console.log(data);
			},
			error : function(data){
				$(".pmsg").html("");
			}
		})
		
	})
	
	$("#confirmOtp").submit(function(e){
		$(".pmsg").html("");
		e.preventDefault();
		var fdata = $(this).serialize();
		$.ajax({
			type : "post",
			data : fdata,
			dataType : "json",
			url : "<? echo base_url('confirmOtp') ?>",
			success : function(data){
				if(data.status == "success"){
					$(".pmsg").html(data.emsg);
					setTimeout(function(){location.reload()},3000);
				}else{
					$(".pmsg").html(data.emsg);
				}
			},
			error : function(data){
				$(".pmsg").html("");
			}
		})
	})

	$("#formdata").on("submit",function(e){
	
		e.preventDefault();
		
		var data = $("#formdata").serialize();
		
		$.ajax({
			
			"type" : "post",
			data : data,
			url : "<? echo base_url('updateParticipants') ?>",
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
	
	function addFields(){
		var number = parseInt(document.getElementById("students").value);
//		alert(number)
		/*if(number > 5){
			
			swal(
				'Error!',
				'maximum participants count 5.',
				'warning'
			) 
			$("#students").val(5);
			return false;
			
		}*/
		
//		var total = number*5000;
		
//		$("#total").val(total);
//		$("#totalPrice").html('<strong>Total Participation Fee- <i class="fa fa-rupee"></i> '+total+' </strong>');
		
		var container = document.getElementById("detais");
		while (container.hasChildNodes()) {
			container.removeChild(container.lastChild);
		}
		
		var html = '';
		
		for (i=<? echo count($participants) ?>;i<number;i++){
//			container.appendChild(document.createTextNode("Member " + (i+1)));
//			var input = document.createElement("input");
//			input.type = "text";
//			container.appendChild(input);
//			container.appendChild(document.createElement("br"));
			
html += '<div class="col-md-12" id="detais"><div class="fbox"><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" name="pname[]" placeholder="Name" value="" required></div></div><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" name="designation[]" placeholder="Designation & Department" value="" required></div></div><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" placeholder="Mobile" maxlength="10" autocomplete="off" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" name="pmobile[]" value="" required></div></div><div class="col-md-6"><div class="form-group"><input type="email" class="form-control" name="pemail[]" placeholder="Email" value="" required></div></div> <div class="col-md-6"><div class="form-group"><input type="text" class="form-control" name="collage_name[]" placeholder="Collage Name" value="" ><input type="hidden" class="form-control" name="serial_number[]" placeholder="Collage Name" value="" ></div></div><div class="col-md-6"><div class="form-group"><select  class="form-control" name="category_name[]"><option value="">Select Category</option><?php foreach ($alist as $row) { ?><option <?php if($pa->category_name == $row->category){ echo 'selected';}?> value="<?php echo $row->category;?>"><?php echo $row->category;?></option><?php } ?></select></div></div><div class="clearfix"></div></div></div>'
			
		}
		
		$("#detais").append(html);
	}


</script>
