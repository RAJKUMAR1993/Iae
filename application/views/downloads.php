
<? front_header() ?>
    <style>
.pointer {cursor: pointer;}
  </style>
  <!-- [/MAIN-HEADING]
 ============================================================================================================================-->
  <section class="main-heading" id="home">
 <div class="baner"> <img src="<? echo base_url('assets/') ?>images/inbanner.jpg" class="img-responsive" />
	  </div> 
	  
	  
	  
	  
	
  </section>
  
  <!-- [/MAIN-HEADING]
 ============================================================================================================================--> 
  
  <!-- [ABOUT US]
 ============================================================================================================================-->
  <section class="white-background black" id="inpage">
    <div class="container">
	 <?php if($this->session->flashdata('msg')): ?>
	 <div class="alert alert-success alert-dismissible" id="success-alert">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <strong>Success !</strong>&nbsp;<?php echo $this->session->flashdata('msg'); ?>
	</div>
    <?php endif; ?>
      <div class="row" style="font-weight:bold;">
        <div class="col-md-12  black">
        
			<div class="list-group">
			<a class="list-group-item list-group-item-action active"><? echo $this->db->get_where("tbl_schedule_dates",["id"=>$this->uri->segment(3)])->row()->event_name; ?> Downloads</a>
	
			<? if(count($downloads) > 0){
				$system_ip = $this->input->ip_address(); $res = $this->db->get_where("tbl_users_download",array("ip"=>$system_ip))->row(); ?> 
			
				<div class="table-responsive">
					
					<table class="table table-bordered">
						
						<thead>
							<tr style="background-color: antiquewhite;">
								<th>Sl.No</th>
								<th>Photo</th>
								<th>Name & Designation</th>
								<th>Topic</th>
								<th>Download PPT</th>
								<th>Youtube Video</th>
							</tr>
						</thead>
						<tbody>
							<?	$i=1;
								foreach($downloads as $dw){ 
							?>
								<tr>
									<td><? echo $i ?></td>
									<td><? echo ($dw->image != "") ? '<img src="'.base_url().$dw->image.'" width="90px" height="120px" class="img-responsive img-thumbnail">' : '' ?></td>
									<td><? echo nl2br($dw->ndesignation) ?></td>
									<td><? echo $dw->name ?></td>
									<td><?	
										if($res->ip == $system_ip){		
									?>	

										<a href="<?php echo base_url().$dw->file; ?>" class="download_store btn btn-sm btn-primary" file_name="<? echo basename($dw->file) ?>" style="font-size: 12px">Download <i class="fa fa-download" aria-hidden="true"></i></a>

									<? }else{ ?>	

										<a data-toggle="modal" class="btn btn-sm btn-primary" data-target="#myModal" style="font-size: 12px">Download <i class="fa fa-download" aria-hidden="true"></i></a>

									<? } ?>
									</td>
									<td>
										<? if($dw->youtube_link != ""){ ?>
										
											<a data-toggle="modal" data-target="#youtube_video<? echo $i ?>" class="btn btn-sm btn-info" style="font-size: 12px">View <i class="fa fa-eye" aria-hidden="true"></i></a>
										
										<? } ?>
									</td>
								</tr>
								
								<div id="youtube_video<? echo $i ?>" class="modal fade popup" role="dialog">
								  <div class="modal-dialog">
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title" style="font-weight:bold;">Youtube Video</h4>
										  </div>
										  <div class="modal-body">
											<iframe width="100%" height="300px" allowfullscreen src="<? echo $dw->youtube_link ?>"></iframe>	
										  </div>
										</div>
								   </div>
								</div>
								
							<? $i++; } ?>	
						</tbody>
						
					</table>
					
				</div>
			<? }else{
				echo '<p style="text-align:center;font-size:24px;padding: 20px;">No downloads found</p>';
			} ?>
		  	</div>  
		 
		

        </div>
      </div>
      <div class="gap"> </div>
      
      
      
      
      
      
      
      <!-- /row --> 
      <div id="myModal" class="modal fade popup" role="dialog">
		  <div class="modal-dialog">
            <form method="post" class="form-horizontal" action="<?php echo base_url(); ?>home/users_download">
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="font-weight:bold;">Enter Details To Download</h4>
			  </div>
			  <div class="modal-body">
				    <div class="chaptcha_msg"></div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Name:</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" id="sub_name" placeholder="Enter Name" name="name" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="pwd">Email:</label>
					  <div class="col-sm-10">          
						<input type="email" class="form-control" id="sub_email" placeholder="Enter Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Phone:</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" id="sub_phone" placeholder="Enter Phone" placeholder="Enter Phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="phone" minlength="10" maxlength="10" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Captcha:</label>
					  <div class="col-sm-10">
						<p id="captImg"><?php echo $captchaImg; ?></p>
						<p>Can't read the image? click <a href="javascript:void(0);" class="refreshCaptcha">here</a> to refresh.</p>
					  </div>
					</div>
				    <div class="form-group">
					  <label class="control-label col-sm-2" for="email"></label>
					  <div class="col-sm-10">
						<input type="text" name="captcha" id="sub_captcha" maxlength="6" value=""/>
					  </div>
					</div>
			  </div>
			  <div class="modal-footer">
			    <button type="submit" id="idForm" class="btn btn-primary">Submit</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>
            </form>
		  </div>
		</div> 
    </div>
  </section>
 <script>



 </script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- captcha refresh code -->
<script>
$(document).ready(function(){
    $('.refreshCaptcha').on('click', function(){
        $.get('<?php echo base_url().'home/refresh'; ?>', function(data){
            $('#captImg').html(data);
        });
    });
});
	
/*$(".view_youtube_video").click(function(){
	
	var video = $(this).attr("video");
	$(".youtube_video").html("");
	$("#youtube_video").modal("show");
	$(".youtube_video").html('<iframe width="100%" height="300px" allowfullscreen src="'+video+'"></iframe>');
	
})	*/
	

$(".download_store").click(function(){
	
	var file_name = $(this).attr("file_name");
	$.ajax({
		
		type : "post",
		data : {file_name:file_name},
		url : "<? echo base_url('home/store_download') ?>",
		success : function(data){
			
			console.log(data);
			
		},
		error : function(data){
			
			console.log(data);
			
		}
		
	})
	
})	
	
$("#idForm").on("click",function(e){
var name = $('#sub_name').val();
var email = $('#sub_email').val();
var phone = $('#sub_phone').val();
var captcha = $('#sub_captcha').val();
$.ajax({
           type: "POST",
           url: '<?php echo base_url();?>home/users_download',
           data: { name : name, email : email, phone : phone, captcha : captcha },
			   
           success: function(data)
           {    
			   if(data == "name"){
				   $(".chaptcha_msg").html('<div class="alert alert-danger"><strong>Name !</strong> Name Required.</div>');
			   }
               if(data == "email"){
				   $(".chaptcha_msg").html('<div class="alert alert-danger"><strong>Email !</strong> Email Required.</div>');
			   }			   
               if(data == "phone"){
				   $(".chaptcha_msg").html('<div class="alert alert-danger"><strong>Phone !</strong> Phone Required.</div>');
			   }
			   if(data == "captcha"){
				   $(".chaptcha_msg").html('<div class="alert alert-danger"><strong>Captcha !</strong> Image captcha does not matches.</div>');
			   }
			   if(data == "sucess"){
				   $(".chaptcha_msg").html('<div class="alert alert-success"><strong>Success !</strong> Successfully added you can download files.</div>');
				   
				   window.setTimeout(function() {
					$(".popup").fadeTo(500, 0).slideUp(500, function(){
						location.reload(); 
					});
				}, 3000);
			   }
           }
		   
         });
e.preventDefault();		 
});

</script>
 <? front_footer() ?>