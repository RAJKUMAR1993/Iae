
<? front_header(); 
$cdate = date("Y-m-d");
$event_id = $this->uri->segment(3);
?>

<style>

	#customers{
		
		color: white !important;
	}	
	
.slick-slide {
  margin: 0px 20px;
}
.slick-slide img {
  width: 100%;
}
.slick-slider {
  position: relative;
  display: block;
  box-sizing: border-box;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-touch-callout: none;
  -khtml-user-select: none;
  -ms-touch-action: pan-y;
  touch-action: pan-y;
  -webkit-tap-highlight-color: transparent;
}
.slick-list {
  position: relative;
  display: block;
  overflow: hidden;
  margin: 0;
  padding: 0;
}
.slick-list:focus {
  outline: none;
}
.slick-list.dragging {
  cursor: pointer;
  cursor: hand;
}
.slick-slider .slick-track, .slick-slider .slick-list {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}
.slick-track {
  position: relative;
  top: 0;
  left: 0;
  display: block;
}
.slick-track:before, .slick-track:after {
  display: table;
  content: '';
}
.slick-track:after {
  clear: both;
}
.slick-loading .slick-track {
  visibility: hidden;
}
.slick-slide {
  display: none;
  float: left;
  height: 100%;
  min-height: 1px;
}
[dir='rtl'] .slick-slide {
  float: right;
}
.slick-slide img {
  display: block;
}
.slick-slide.slick-loading img {
  display: none;
}
.slick-slide.dragging img {
  pointer-events: none;
}
.slick-initialized .slick-slide {
  display: block;
}
.slick-loading .slick-slide {
  visibility: hidden;
}
.slick-vertical .slick-slide {
  display: block;
  height: auto;
  border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
  display: none;
}
.customer-logos {
  margin-top: 40px;
}

	.inaugural{
		
		height: 140px;
		
	}

	.guest{
		
		margin-top: 10px;
		
	}
	
	.techpic img{
		
		margin-top: 27px;
		border: 2px solid white;
		
	}
	.techpic td{border-bottom:0px!important;  padding: 0px 10px 0px 20px !important;font-size: 14px}
	
	.customers1 p{
		
		font-size: 14px;
		
	}
	.customers1 td{
		
		font-size: 14px;
		
	}
  .our-stats > .container1 {
    padding: 60px 20px;
}
body{
  color: #000;
}
	
	.our-stats h3{
		
		color: white;
		padding-bottom: 20px;
		font-weight: 500;
    	font-size: 22px;
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
	
	.techpic tr{
		height: 210px !important;
	}
	
	#inpage{
		margin-top: 80px;
	}
	.title{
		font-size: 20px;
		text-align: center;
	}
	.a-slog{
		text-align: justify;
	}
	.naac{
		background: #1a9cff;
		padding: 40px;
		color: white;
		box-shadow: 5px 2px 5px 2px #888888;
	}
	.naac h3{
		line-height: 30px;
	}
	
	.black4{ border: dashed 2px #a4d1f4;
    padding: 50px 30px;
    color: #fff;
	margin-top: 20px;}
	
	.black4 h1{font-size: 20px; font-weight: bold;}
	.black4 h2{ padding: 15px 0px!important; font-size: 36px!important;}
	
	.cv span {
    font-size: 20px;
    margin: 0;
	/*    padding-top: 10px;*/
	/*    line-height: 31px;*/
	/*    color: #f6ff00;*/
	}
	.cv h2{
		font-size: 24px !important;
	}
	
	#sd{ 
    padding: 30px 30px;
    color: #000;
/*	background: #3b2518;*/

	}
	
	
	
#sd p {
    font-size: 19px;
    padding-top: 10px;
    line-height: 27px;
	text-align: justify;
}
	
#sd ul li {
    font-size: 19px;
 	padding-top: 10px;
    line-height: 27px;
	text-align: justify;
	list-style: square;
	color: #262525;
}  
#sd ul{ margin-left: 20px;}  
.tbox h4{ color: #fff; font-size: 20px; font-weight: bold; padding-bottom: 10px;} 

	.title h4{
		font-size: 28px;
		padding:12px 0px;
		font-weight: 500;
	}
	.title h1{
		font-weight: 600;
		font-size: 40px;
		letter-spacing: 4px;
	}
	.heading .title{
		text-transform: capitalize;
		margin-bottom: 0px;
	}
	
</style>
  
<section class="main-heading" id="home">
    <!--<div class="baner"> <img src="<? echo base_url() ?>assets/images/inbanner.jpg" class="img-responsive"> </div> -->
	<div class="baner"> <img src="<?php echo base_url(); ?><?php echo $naac->banner_image ?>" class="img-responsive"> </div>
  </section>
  <!-- <section class="aboutus heading"> */
    <div class="container">
      <div class="row">
        <div class="col-md-12" align="center">
            <div class="title">
              <h4>Transformation through </h4>
              <h1>NAAC Accreditation Process </h1>
              <h4>National Workshop for Higher Educational Institutions </h4>
            </div>
        </div>
      </div>
    </div>
  </section> -->

  <section id="sd">
  	<div class="container">
	  <div class="row">
   
		<div class="col-md-12">
    <?php if(!empty($naac->workshop )){ ?>
		  <h1>Overview</h1>
		  <ul>
		 <?php echo $naac->workshop ?>
			 </ul>
       <?php } ?>
			<br>
      <?php if(!empty($naac->about_workshop )){ ?>
			<h1>About Workshop</h1>			
			 <!-- <p>IAE, with the experience of conducting two phenomenally successful workshops on NIRF India Rankings, is planning to organize a two-day national level workshop to make NAAC accreditation process easy for HEIs by providing a comprehensive step by step run down.</p> -->
		</div>
		  <div style="height: 32px;display: block;clear: both;"></div>
		<div class="col-md-12">

		  <ul>
			<?php echo  $naac->about_workshop ?>
		  </ul>
		</div>
	  </div>
	</div>
  </section>
  <?php } ?>
  <!-- [ABOUT US]
 ============================================================================================================================-->
 
  <section class="aboutus white-background black" id="one">
    <div class="container">
      <div class="row1">
      <?php if(!empty($naac->objectives )){ ?>
		  <div class="box wow fadeInLeftBig  animated">
        <div class="col-md-5 "><h3 class="title" style="text-align: left;">Objectives:</h3> <img src="<?php echo base_url(); ?><?php echo $naac->obj_image ?>" class="img-responsive img-thumbnail"></div>
       <div class="col-md-7">
          <ul style="margin-top: 36px;">
           <?php  echo $naac->objectives  ?>
          </ul></div>
			  <div class="clearfix"></div>
		  </div>
      <?php } ?>
		  
		 <div style="    height: 32px;
    display: block;
    clear: both;"></div>
		  
		  
     
      <div class="box wow fadeInRightBig  animated">
        
      <?php if(!empty($naac->key_takeaways )){ ?>
        <div class="col-md-7"><h3 class="title" style="text-align: left;">KEY TAKEAWAYS:</h3>
        
        <ul >
              <?php echo $naac->key_takeaways  ?>
            </ul>
        
        
        </div>
      
        
        <div class="col-md-5">
        <img src="<?php echo base_url(); ?><?php echo $naac->key_take_image ?>" class="img-responsive img-thumbnail">
        </div>
        
        <div class="clearfix"></div>
      </div>
    <?php } ?>

    <?php $uni = $this->db->get_where("tbl_institution_types")->result(); ?>
		  <div class="clearfix"></div> <div style="    height: 32px;
    display: block;
    clear: both;"></div>
		  <h3 class="title" style="text-align: center;">Who can participate?</h3>
      <?php foreach ($uni as  $v) {
      	# code...
      ?>
		  <div class="col-sm-3 wow fadeInRightBig   text-center animated">
        <div class="tbox">
          <h4><?php echo $v->type ?></h4>
         <p><!--Registration Fees- <?php //echo $v->amount ?>/-</br>-->
          Number of Participants: <?php echo $v->participants ?>
        </p>
        </div>
      </div>
      <?php } ?>
      
      <div class="col-md-12 text-center black"> <br>
          
          <div class="box">
          <h3 class="title" style="text-align: center;">Participation Fee:</h3>
          	  <div class="table-responsive">
          	  	  <table class="table table-bordered">
          	  	  	<thead>
          	  	  		<tr>
          	  	  			<th>Category of the Institution</th>
          	  	  			<th>Sub-Category of the Institution</th>
          	  	  			<th>Participation Fee in Rs.</th>
          	  	  		</tr>
          	  	  	</thead>
          	  	  	<tbody>
          	  	  		<tr>
          	  	  			<td>Universities</td>
          	  	  			<td>
          	  	  				<table class="table table-bordered">
          	  	  					<tbody>
										<tr>
											<td>Central University</td>
										</tr>
										<tr>
											<td>State University</td>
										</tr>
										<tr>
											<td>State Private University</td>
										</tr>
										<tr>
											<td>Institution of National Importance</td>
										</tr>
										<tr>
											<td>Deemed to be University</td>
										</tr>
         	  	  					</tbody>
          	  	  				</table>
          	  	  			</td>
          	  	  			<td>Rs.10,000/-</td>
          	  	  		</tr>
          	  	  		<tr>
          	  	  			<td>Autonomous Institutions</td>
          	  	  			<td>
          	  	  				<table class="table table-bordered">
          	  	  					<tbody>
										<tr>
											<td>Degree Colleges</td>
										</tr>
										<tr>
											<td>Engineering Colleges</td>
										</tr>
         	  	  					</tbody>
          	  	  				</table>
          	  	  			</td>
          	  	  			<td>Rs.10,000/-</td>
          	  	  		</tr>
          	  	  		<tr>
          	  	  			<td>Health Science Institutions</td>
          	  	  			<td>
          	  	  				<table class="table table-bordered">
          	  	  					<tbody>
										<tr>
											<td>Medical Colleges</td>
										</tr>
										<tr>
											<td>Dental Colleges</td>
										</tr>
         	  	  					</tbody>
          	  	  				</table>
          	  	  			</td>
          	  	  			<td>Rs.10,000/-</td>
          	  	  		</tr>
          	  	  		<tr>
          	  	  			<td>Affiliated Colleges</td>
          	  	  			<td>
          	  	  				<table class="table table-bordered">
          	  	  					<tbody>
										<tr>
											<td>Affiliated UG Colleges</td>
										</tr>
										<tr>
											<td>Affiliated PG & Above Colleges </td>
										</tr>
										<tr>
											<td>Pharmacy Colleges</td>
										</tr>
         	  	  					</tbody>
          	  	  				</table>
          	  	  			</td>
          	  	  			<td>Rs.5,000/-</td>
          	  	  		</tr>
          	  	  	</tbody>
				  </table>
			  </div>
		  </div>
	  </div>
		  
		  
		  
        <div class="col-md-12 text-center black"> <br>
          
          <div class="box">
        <? 
          $edata = $this->db->order_by("id","desc")->get_where('tbl_schedule_dates',["event_type"=>"NAAC","status"=>"Active"])->row();
        ?>         
       
         
          <h3 class="title" style="text-align: center;"> Online Registration: </h3>
          <p class="a-slog" style="text-align: center;"> <?php echo $naac->online_registration  ?><br>
          <a href="<? echo base_url('home/register/').str_replace(" ","-",$edata->event_name)."~".$edata->id ?>" class="btn btn-primary">Click here to Register</a></p>
          <br>
          <h3 class="title"> Offline Registration: </h3>
          
			  <div class="row">
				  <div class="col-md-3"></div>
				  <div class="col-md-8">
            <div><?php echo $naac->offline_registration  ?></div>    
				  </div>
			  </div>
          
			  <br>
			  <h3 class="title" style="text-align: center;"> Bank Deposit: </h3>
        <?php echo $naac->bank_deposit  ?>
		  <br>
       <?php if(!empty($naac->note)){ ?>
			  <div class="row" style="color: red">
				  <div class="col-md-3"></div>
				  <div class="col-md-8" align="left">
				  	<?php echo $naac->note  ?>
				  </div>
			  </div>	
      <?php } ?>
          <br>
			</div></div>
     <div></div>
      </div>
      <!-- /row --> 
      
    </div>
    
    		<section class="aboutus  black2" id="venue">
			  <div class="container">
				<div class="row">
				  <div class="col-md-12 black1">
					<div class="col-md-6" align="center" style="margin-top: 25px">
						<a href="<? echo base_url('home/register/').str_replace(" ","-",$edata->event_name)."~".$edata->id ?>">
							<img class="img-responsive" src="<? echo base_url() ?>assets/images/register.png" alt="" width="40%">
						</a>
						<br>
<!--						<p style="color: white; font-weight: bold;text-align: center"> Registration Closed</p>-->
					</div>
					<div class="col-md-6" style="color: white">
          <h2> Date:</h2>
          <p > <? echo $this->admin->get_ordinal_suffix(date("d",strtotime($ydata->event_start_date))) ?> & <? echo $this->admin->get_ordinal_suffix(date("d",strtotime($ydata->event_end_date))) ?> <? echo date("F Y",strtotime($ydata->event_start_date)) ?></p>
          <h2>Time:</h2>
          <p ><? echo date("h-i A",$ydata->event_start_time)." - ".date("h-i A",$ydata->event_end_time) ?></p>
          
          <? if($ydata->event_mode == "offline"){ ?>
          
			  <h2>Venue:</h2>
			  <p> <? echo $ydata->event_address ?> </p>
       	  
       	  <? }else{ ?>		
       	  
			  <h2>Mode:</h2>
			  <p> <? echo $ydata->event_mode ?> </p>
       
       	  <? } ?>	
        </div>
				  </div>
				</div>
			  </div>
     	   </section>
  </section>
  <section class="our-team white-background black" id="three">
  <div class="container">
  <? if(count($guests) > 0){ ?>

<div class="row text-center">
  <div class="col-md-12">


    <h3 class="title text-center"> Inaugural & Valedictory Guests </h3>

    <? 
       foreach($guests as $g){

    ?>

      <div class="col-md-6 text-center animated wow fadeInLeftBig guest" data-wow-duration="1.15s">
        <div>
          <img src="<? echo base_url().$g->image ?>" height="200px" width="200px"/>
        </div>
        <div class="tbox text-center inaugural">
          <h2><? echo $g->sname ?> </h2>
          <p><? echo nl2br($g->designation) ?> </p>
        </div>
      </div>

    <? } ?>	

  </div>
  </div>
</br>

<? } ?>  


<? if(count($speakers) > 0){ ?>
    <div style="height:20px;"></div>
		<div class="clearfix"></div>
<div style="height:20px;"></div>
    <h2 class="text-center">Speakers</h2>
	  <div style="height:20px;"></div>
	
	  
		<section class="customer-logos slider" style="margin-bottom:28px;">
			
			<? 
	
				foreach($speakers as $sp){

			?>
					<a href="<? echo base_url()?>home/speakers/<?php echo $event_id; ?>">
						<div class="slide">
							<div class="text-center" style="margin-bottom: 10px">
								<div>
									<img src="<? echo base_url().$sp->image ?>">
								</div>
								<div class="tbox" style="min-height: 190px;">
									<h4><? echo $sp->sname ?></h4>
									<p><? echo $sp->designation ?>
									</p>
								</div>
							</div>
						</div>
					</a>
			<? }
			 ?>	

		</section>

  <? } ?>
</div>
 <? front_footer() ?>
 

