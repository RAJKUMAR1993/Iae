
<?php $this->load->view("admin/back_common/header"); ?>
<?php $participants = $this->db->get_where("tbl_participants",["inst_id"=>$rdata->id])->result(); ?>
 <section class="white-background black" id="inpage">
 <div class="row heading-bg">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">Update OrderID of <? echo $r->order_id ?></h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li><a href="<?php echo base_url() ?>admin/users/payments">Payments</a></li>
				<li class="active"><span>Update Order</span></li>
			</ol>
		</div>
			<!-- /Breadcrumb -->
	</div>
    </section>	
	<div class="container">
    	<div class="row">
    		<div class="panel-wrapper collapse in">
				<div class="card-view row" style="padding: 20px;">
					<div class="col-md-6 pull-left">
						<p>
							<strong>Name</strong> : <? echo $r->cpname ?><br>
							<strong>Designation/Department</strong> : <? echo $r->contact_person_designation.", ".$r->contact_person_department; ?><br>
						</p>
					</div>
					<div class="col-md-6">
						<p>
							<strong>Name of the Institution</strong> : <? echo $r->institutionName; ?><br>
							<strong>Type of the Institution</strong> : <? echo $r->institution_type.", ".$r->institution_subtype; ?><br>
						</p>
					</div>
				</div>
   			</div>
    		
    		<div class="panel-wrapper collapse in">
						        
			<div class="container">

				<form id="formdata" method="post">
				  <div class="form-content card-view">
				   <? echo $this->session->flashdata("emsg") ?>
				   <div id="error"></div>
					    <div class="row" style="padding: 20px;">
					        <div class="col-md-12">
						      <?
							   $pcount = $r->participants;
							   for($i=0;$i<$pcount;$i++){
								   $pa =  $cparticipants = $this->db->order_by("id","asc")->get_where("tbl_participants",["inst_id"=>$r->id])->result()[$i];
						      ?>
							
								<label style="margin-bottom: 10px"><strong>Participant <? echo $i+1 ?></strong></label>
								<div class="row">
								  
									<div class="col-md-11">
									  <div class="col-md-4">
										<div class="form-group">
										  <input type="text" class="form-control vparticipant<? echo $i ?>pname" name="pname[]" placeholder="Name" value="<? echo $pa->pname ?>">
										</div>
									  </div>
									  <div class="col-md-4">
										<div class="form-group">
										  <input type="text" class="form-control vparticipant<? echo $i ?>designation" name="designation[]" placeholder="Designation" value="<? echo $pa->designation ?>">
										</div>
									  </div>
									  <div class="col-md-4">
										<div class="form-group">
										  <input type="text" class="form-control vparticipant<? echo $i ?>department" name="department[]" placeholder="Department" value="<? echo $pa->department ?>">
										</div>
									  </div>
									  <div class="col-md-6">
										<div class="form-group">
										  <input type="text" class="form-control vparticipant<? echo $i ?>pmobile" name="pmobile[]" placeholder=" Mobile" maxlength="10" autocomplete="off" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" <? echo ($pa->verification_status != "Active") ? '' : 'readonly' ?> value="<? echo $pa->pmobile ?>">
										</div>
									  </div>
									  <div class="col-md-6">
										<div class="form-group">
										  <input type="email" class="form-control vparticipant<? echo $i ?>pemail" name="pemail[]" placeholder="Email" value="<? echo $pa->pemail ?>" <? echo ($pa->verification_status != "Active") ? '' : 'readonly' ?>>
										  <input type="hidden" class="form-control" name="serial_number[]" placeholder="Collage Name" value="<? echo $pa->serial_number ?>" >
										  <input type="hidden" class="form-control" name="verification_status[]" placeholder="Collage Name" value="<? echo $pa->verification_status ?>" >
										  <input type="hidden" class="form-control vparticipant<? echo $i ?>participant_id" name="participant_id[]" placeholder="Collage Name" value="<? echo $pa->id ?>" >
										</div>
									  </div>
									 </div>
									 <div class="col-md-1">
									 	<? if($pa->verification_status != "Active"){ ?>
									 		<button type="button" class="btn btn-primary btn-sm verifynonParticipant" vp="vparticipant<? echo $i ?>" style="margin-top: 24px;">Verify</button>
									 	<? } ?>		
									 </div>
								  <div class="clearfix"></div>
								</div>
								
                                <? } ?>				
                            </div>
					     </div>

                            <input type="hidden" name="order_id" value="<? echo $r->order_id ?>">
                            <input type="hidden" name="institution_id" value="<? echo $r->id ?>">

                            <div class="row" align="center">	
                                <button type="submit" class="btn btn-success btnSubmit" style="margin-top: 20px;">Update Participants</button>	
                                <!-- <a href="<? //echo base_url('webinar/joinevent/').$this->session->userdata("event_id") ?>" class="btn btn-primary" style="margin-top: 20px;"><i class="fa fa-chevron-left"></i> Back</a>	 -->
					         </div>	
					        <div class="clearfix"></div>
				        </div>
				    </form>
			    </div>
		    </div>
	    </div>
  
<? $this->load->view( "admin/back_common/footer" ); ?>
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
						<input type="hidden" name="pname" id="pname">	
						<input type="hidden" name="designation" id="designation">	
						<input type="hidden" name="department" id="department">	
						<input type="hidden" name="participant_id" id="participant_id">	
						<input type="hidden" name="institution_id" value="<? echo $r->id ?>">	
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



<script type="text/javascript">
		
	$(".verifynonParticipant").click(function(){
		
		var ref = $(this).attr("vp");
		$(".pmsg").html("");
		var email = $("."+ref+"pemail").val();
		var mobile = $("."+ref+"pmobile").val();
		var pname = $("."+ref+"pname").val();
		var designation = $("."+ref+"designation").val();
		var department = $("."+ref+"department").val();
		var participant_id = $("."+ref+"participant_id").val();
		
		if(mobile == ""){
			swal("Error","Please Enter Mobile Number","error")
			return false;
		}
		if(email == ""){
			swal("Error","Please Enter Email","error")
			return false;
		}
		
		$.ajax({
			type : "post",
			data : {email:email,mobile:mobile},
			url : "<? echo base_url('admin/users/verifyParticipant') ?>",
			success : function(data){
				$(".pmsg").html('<div class="alert alert-success">OTP successfully sent to participant email('+email+') & mobile number('+mobile+').</div>');
				$("#prmobile").val(mobile);
				$("#premail").val(email);
				$("#pname").val(pname);
				$("#designation").val(designation);
				$("#department").val(department);
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
//		console.log(fdata);
//		return false;
		$.ajax({
			type : "post",
			data : fdata,
			dataType : "JSON",
			url : "<? echo base_url('admin/users/confirmOtp') ?>",
			success : function(data){
				if(data.status == "success"){
					$(".pmsg").html(data.emsg);
					setTimeout(function(){location.reload()},3000);
					
				}else{
					$(".pmsg").html(data.emsg);
				}
				console.log(data);
			},
			error : function(data){
				$(".pmsg").html("");
				console.log(data);
			}
		})
	})

	$("#formdata").on("submit",function(e){
	
		e.preventDefault();
		
		var data = $("#formdata").serialize();
		
		$.ajax({
			
			"type" : "post",
			data : data,
			url : "<? echo base_url('admin/users/updateParticipants') ?>",
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

</script>
