<? front_header() ?>
  

<style>.part-log{background:#fff; padding:20px 0px; box-shadow: -1px 7px 21px 0px rgba(0,0,0,0.33);
-webkit-box-shadow: -1px 7px 21px 0px rgba(0,0,0,0.33);
-moz-box-shadow: -1px 7px 21px 0px rgba(0,0,0,0.33);
}    </style>

  <!-- [/MAIN-HEADING]
 ============================================================================================================================-->
  <section class="main-heading" id="home">
 	<div class="baner"> <!--<img src="<? echo base_url('assets/') ?>images/inbanner.jpg" class="img-responsive">--></div> 
  </section>
  
  <!-- [/MAIN-HEADING]
 ============================================================================================================================--> 
  
  <!-- [ABOUT US]
 ============================================================================================================================-->
  <section class="white-background black" id="inpage" style="margin-top: 80px;background-image: url('<? echo base_url() ?>assets/images/bglogin_banner.jpg');">
    <div class="container" style="">
      <div class="row">
        <div class="col-md-6 col-md-offset-3   black">

<div class="part-log">



<!--          <h3 class="text-center">Awareness Workshop<br><strong style="font-size: 24px">NIRF INDIA RANKINGS - 2021</strong><br>For Higher Educational Institutions</h3><br>-->

          <h6 class="title" align="center" style="font-size: 22px">Login</h6>
<!--          <h6 class="title" align="center" style="font-size: 22px">Join Webinar</h6>-->
         	
         	<div style="padding-left: 10%;padding-right: 10%;padding-bottom: 8%; padding-top:10px;">
         		<? echo $this->session->flashdata("emsg") ?>
         		
         		<form method="post" action="<? echo base_url('webinar/checkParticipant') ?>">
         			<div class="form-group">
         				<label>Registered Email Id (Participant/Contact Person)</label>
         				<input type="email" name="email" class="form-control" required>
         			</div>
         			<div class="form-group">
         				<label>Registered Mobile (Participant/Contact Person) </label>
         				<input type="text" name="mobile" class="form-control" required>
         			</div>
         			<div class="form-group">
         				<label>Event Type</label><br>
         				<input type="radio" name="event_type" id="NIRF" class="event_type" value="NIRF" required>
         				<label for="NIRF">NIRF Workshop &nbsp;</label>
         				<input type="radio" name="event_type" id="NAAC" class="event_type" value="NAAC">
         				<label for="NAAC">NAAC Workshop &nbsp;</label>
         				<input type="radio" name="event_type" id="RIPF" class="event_type" value="RIPF">
         				<label for="RIPF">RIPF Symposium</label>
         			</div>
         			<div class="form-group" id="login_type" style="display: none">
         				<label>Login Type</label><br>
         				<input type="radio" name="login_type" id="Institution" class="login_type" value="Institution">
         				<label for="Institution">Institution &nbsp;</label>
         				<input type="radio" name="login_type" id="Participant" class="" value="Participant">
         				<label for="Participant">Participant &nbsp;</label>
         			</div>
         			
         			<div class="form-group" id="login_type_ripf" style="display: none">
         				<label>Login Type</label><br>
         				<? $categories = $this->db->get_where("tbl_ripf_categories")->result(); 
						   foreach($categories as $c => $cat){	
						?>
        					<input type="radio" name="login_type_ripf" id="<? echo $cat->category_name ?>" class="<? echo ($c == 0) ? 'login_type_ripf' : '' ?>" value="<? echo $cat->category_name ?>">
         					<label for="<? echo $cat->category_name ?>"><? echo $cat->category_name ?> &nbsp;</label>
        				<? } ?>
        					<input type="radio" name="login_type_ripf" id="Participant1" class="" value="Participant">
         					<label for="Participant1">Participant &nbsp;</label>
         			</div>
         			
         			<div class="form-group">
         				<button type="submit" class="btn btn-primary">Login</button>
         			</div>
         		</form>
         		
         	</div>
         	
        </div></div>
      </div>
      
      <!-- /row --> 
      
    </div>
  </section>
  <br>

 <? front_footer(); ?>
 
<script>

	$(".event_type").change(function(){
		var etype = $(this).val();
		if(etype == "RIPF"){
			$("#login_type").hide();
			$("#login_type_ripf").show();
			$(".login_type").removeAttr("required","required");
			$(".login_type_ripf").attr("required","required");
		}else{
			$("#login_type").show();
			$("#login_type_ripf").hide();
			$(".login_type").attr("required","required");
			$(".login_type_ripf").removeAttr("required","required");
		}
	})

</script>

