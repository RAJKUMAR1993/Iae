<? front_header();
?>

<style>
/* plus glyph for showing collapsible panels */
.panel-heading .accordion-plus-toggle:before {
   font-family: FontAwesome;
   content: "\f068";
   float: right;
   color: silver;
}

.panel-heading .accordion-plus-toggle.collapsed:before {
   content: "\f067";
   color: silver;
}

/* arrow glyph for showing collapsible panels */
.panel-heading .accordion-arrow-toggle:before {
   font-family: FontAwesome;
   content: "\f078";
   float: right;
   color: silver;
}

.panel-heading .accordion-arrow-toggle.collapsed:before {
   content: "\f054";
   color: silver;
}

/* sets the link to the width of the entire panel title */
.panel-title > a {
   display: block;
}
	
#customers{

	color: white !important;
}	
	
.slick-slide {
  margin: 0px 20px;
}
	
.our-team h2 {
    font-size: 22px;
    color: #00225c;
    margin: 0;
    font-family: Raleway;
}
	
	.our-team h4 {
    color: #000 !important;
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
  height: auto;
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
.tbox12 h4{ font-size:16px; color:#333; padding:0px 0px 20px 0px; font-weight:700;}
.test_bg{
    background: url(<?php echo base_url(); ?>assets/images/gallery-bg.jpg);
}
#seven p{
	color:white;
}
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
    padding: 60px 20px;
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
	.techpic .noborder .img-circle{
		border: 0px solid white !important;
	}	
	
	@media screen and (min-width: 768px){
.carousel-button {
   top: 50% !important;
    left: 50% !important;
    transform: translate(68%, 173%) !important;
	}
	.carousel-button {
    position: absolute;
    z-index: 10;
    color: #fff;
    text-align: center;
    text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
}
		.btn-size{font-size: 19px; text-transform: uppercase; border-radius:30px;  padding-left: 28px; padding-right: 28px;}
	
	
	}
	
		@media screen and (max-width: 767px){
.carousel-button {
   top: 50% !important;
    left: 50% !important;
       transform: translate(-5%, 66%) !important;
	}
	.carousel-button {
    position: absolute;
    z-index: 10;
    color: #fff;
    text-align: center;
    text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
}
		.btn-size{font-size: 12px; text-transform: uppercase; border-radius:30px;  padding-left: 10px; padding-right: 10px; padding-top: 4px; padding-bottom:4px; }

	
	}
</style>
<script>
/* var owl = $('.owl-carousel');
owl.owlCarousel({
    items:4,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
}) */
$('.owl-carousel').owlCarousel({
	autoplay: true,
	autoplayTimeout: 5000,
	navigation: false,
	margin: 10,
	responsive: {
		0: {
			items: 1
		},
		600: {
			items: 2
		},
		1000: {
			items: 2
		}
	}
})


</script>

<!-- [/MAIN-HEADING]
 ============================================================================================================================-->
<section class="main-heading" id="home">
  <div id="themeSlider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
<!--
      <li data-target="#themeSlider" data-slide-to="0" class="active"></li>
      <li data-target="#themeSlider" data-slide-to="1"></li>
-->
<!--      <li data-target="#themeSlider" data-slide-to="2"></li>-->
    </ol>
    <div class="carousel-inner">
      <!--<div class="item active">-->
<!--        <div class="imgOverlay"></div>-->
        <!--<img src="<? echo base_url('assets/') ?>images/banner1.jpg" alt="">
        <div class="carousel-caption">
<!--
          <h3 class="animated wow fadeInDownBig " data-wow-duration="1.15s">Two Day National Workshop on</h3>
  <h3 class="animated wow fadeInLeftBig " data-wow-duration="1.35s">Quality Enhancement Measures in Higher, Technical, Professional and Management Education with a Special Focus on NIRF Ranking</h3>

			 <h3 class="animated wow fadeInUpBig" data-wow-duration="1.55s"> Achieving Excellence Together</h3>-->
        <!--</div>
      </div>0-->
      

      <div class="item active">
        <img src="<? echo base_url('assets/images/iae-banner3.jpg') ?>" alt="">
        <div class="carousel-caption">
        </div>
        
        <div class="carousel-button">
			
			<a href="#schedule" class="page-scroll"><button class="btn btn-info btn-lg btn-size"> Schedule </button> </a>
			<a href="<? echo base_url('webinar') ?>"><button class="btn btn-primary btn-lg btn-size"> Join Webinar </button> </a>
        </div> 
      </div>

    </div>
  </div>
</section>

<!-- [/MAIN-HEADING]
 ============================================================================================================================--> 

<br>




<section class="aboutus white-background black" id="one">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center black">
        <h3 class="title">Workshop <span class="themecolor">Overview</span></h3>
        <p class="a-slog">The focus of governments for the past few years has been to achieve three important goals – “access, equality and excellence”. Although substantial progress has been made over the years a lot more needs to be done to achieve all the three goals, particularly on the excellence front. The Ministry of HRD and regulatory bodies have initiated a series of reforms and have also introduced several schemes to bring ‘quality’ to the top agenda of Indian Higher Education. Hence We (IAE) organise this workshop</p>
        <br>
        <h3 class="title">Objectives of the Workshop</h3>
        <ul>
          <p class="a-slog" align="left" style="margin-left: -20px;max-width: 100%">To bring an awareness of and to present critical insights into</p>
          <li>The parameters and their relative weights in scoring and ranking.</li>
          <li>Quality research publications and patents.</li>
          <li>The avenues of funding to pursue research projects.</li>
          <li>Placement opportunities and its role in the ranking process.</li>
          <li>The diversity, inclusivity and outreach activities.</li>
          <li>The ways and means for enhancing perception rating of institutions.</li>
        </ul>
        <br/>
        
        <h3 class="title">Why Participate ?</h3>
        <ul>
          <li>To understand the innate value of the data.</li>
          <li>For Data interpretation </li>
          <li>To ensure data consistency.</li>
          <li>To get clarifications on queries and apprehensions on NIRF parameters.</li>
          <li>To gain real time experience for predictive analysis.</li>
        </ul>
        
        <br>
        <h3 class="title">Expected Outcomes</h3>
        <ul>
          <li>Building-up capacity for data capturing </li>
          <li>SWOC analysis </li>
          <li><strong>Gap analysis</strong> for remedial purposes.</li>
          <li>Encourage peer comparison</li>
          <li>Exploration of the best practices</li>
        </ul>
        
        <br>
        
      </div>
    </div>
    <div class="gap"> </div>
    
    <!-- /row --> 
    
  </div>
</section>


<section class="aboutus  black2" id="venue">
  <div class="container">
    <div class="row">
      <div class="col-md-12 black1">
        <div class="col-md-6" align="center" style="margin-top: 65px">
        	<a href="<? echo base_url('home/register') ?>">
        		<img class="img-responsive" src="<? echo base_url('assets/images/register.png') ?>" alt="" width="35%">
        	</a>
        	<br>
        	<p style="color: white; font-weight: bold;text-align: center"> Last date for registration - 15-Jan-2021</p>
        </div>
        <div class="col-md-6">
          <h2> Date:</h2>
          <p > 18th & 19th January 2021</p>
          <h2>Time:</h2>
          <p >10AM - 6PM</p>
          <h2>Mode:</h2>
          <p> Online </p>
        </div>
      </div>
    </div>
</section>

<br>
    
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
						<img src="<? echo base_url().$g->image ?>" height="200px" width="200px">
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
<!--
    <div style="height:20px;"></div>
	<div class="clearfix"></div>
	<div style="height:20px;"></div>
-->
    <h2 class="text-center title" style="color: black">Speakers</h2>
<!--	  <div style="height:20px;"></div>-->
	
	  
		<section class="our-team customer-logos slider" style="margin-bottom:28px;">
			
			<? 
			
				foreach($speakers as $sp){
					
			?>
					<a href="<? echo base_url('home/speakers/').$year ?>">
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
			<? 		}
				 ?>	

		</section>
<? 		}
				 ?>	
				 
				 
		<section class="our-stats" id="schedule">
	<div class="container1">



		<div class="row">
			<div class="col-md-12 col-md-offset-0">
				<h3 class="text-center" style="margin: 0px 0px 10px 0px; !important; font-weight: 700;color: white">Awareness Workshop<br>NIRF INDIA RANKINGS - 2021<br>For Higher Educational Institutions</h3><br>
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
									</tr>
										
									<? 
										$techsession = [];	
										$session_time = [];	
										foreach($data1 as $d1){ 
						
											$categories = json_decode($d1->category);
											$schedulecategories = $this->session->userdata("category");
											
									?>	

										<tr <? if($d1->type == "break"){ ?> style="background-color: #54b5ff" <? } ?>>
											<td width="200x">
												<? 
													if(!in_array(date("h:i A",strtotime($d1->schedule_start_time))." - ".date("h:i A",strtotime($d1->schedule_end_time)),$session_time)){
														echo date("h:i A",strtotime($d1->schedule_start_time))." - ".date("h:i A",strtotime($d1->schedule_end_time)); 
													}
												?>
											</td>

											<? if($d1->type == "break"){ ?>

												<td colspan="3" align="center"><p><strong><? echo $d1->description ?></strong></p></td>
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
<!--																	<img src="<? echo base_url('assets/') ?>transparent.png" width="90" height="90" class="img-circle">-->
																<? } ?>
																<? echo $d1->type_description ?>
															</td>
															<td valign="middle"></td>

														</tr>

													</table>
												</td>

											<? }elseif($d1->type == "mentor"){ ?>
												<td>
													<? if(!in_array($d1->technical_session,$techsession)){ ?>
														<p><strong><? echo $d1->technical_session ?></strong></p>
													<? } ?>	
												</td>
												<td>
													<p><strong><? echo $d1->description ?></strong>
													</p>
												</td>
												<td>
													<table class="techpic">
														<? foreach(json_decode($d1->mentor_data) as $m1){ ?>
															<!--<tr colspan="2">
																<? //if(in_array("all",json_decode($d1->category))){}else{echo '<strong>Categories</strong> : '.implode(", ",json_decode($d1->category));} ?>
															</tr>-->
															<tr>
																<td valign="middle" align="center" class="<? echo ($m1->mentor_image) ? '' : 'noborder' ?>">
																	<? if($m1->mentor_image){ ?>
																		<img src="<? echo base_url().$m1->mentor_image ?>" width="120" height="120" class="img-circle">
																	<? }else{ ?>
<!--																		<img src="<? echo base_url('assets/') ?>transparent.png" width="90" height="90" class="img-circle">-->
																	<? } ?>	<br>
																	<p><strong><? echo $m1->mentor_name ?></strong> <br><? echo nl2br($m1->mentor_designation) ?><br></p>
																</td>
<!--																<td valign="middle"></td>-->
															</tr>
															
														<? } ?>
													</table>
												</td>
											<? }else{ ?>

												<td><p><strong><? echo $d1->technical_session ?></strong></p></td>
												<td></td>
												<td></td>
												<td></td>
											<?	} ?>

										</tr>

									<? 
										array_push($techsession,$d1->technical_session);
										array_push($session_time,date("h:i A",strtotime($d1->schedule_start_time))." - ".date("h:i A",strtotime($d1->schedule_end_time)));
										} ?>
									
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
									</tr>
										
									<? 
										$session_time1 = [];	
										$techsession1 = [];		
										foreach($data2 as $d2){ 
						
											$categories1 = json_decode($d2->category);
											$schedulecategories1 = $this->session->userdata("category");

									?>	

										<tr <? if($d2->type == "break"){ ?> style="background-color: #54b5ff" <? } ?>>
											<td width="200x">
												<? 
													if(!in_array(date("h:i A",strtotime($d2->schedule_start_time))." - ".date("h:i A",strtotime($d2->schedule_end_time)),$session_time1)){
														echo date("h:i A",strtotime($d2->schedule_start_time))." - ".date("h:i A",strtotime($d2->schedule_end_time)); 
													}
												?>
											</td>

											<? if($d2->type == "break"){ ?>

												<td colspan="3" align="center"><p><strong><? echo $d2->description ?></strong></p></td>
												<td></td>

											<? }elseif($d2->type == "desc"){ ?>

												<td><p><strong><? echo $d2->technical_session ?></strong></p></td>
												<td><p><strong><? echo $d2->description ?></strong></p></td>
												<td>
													<table class="techpic">

														<tr>
															<td valign="middle" align="center" class="<? echo ($d2->desc_image) ? '' : 'noborder' ?>">
																<? if($d2->desc_image){ ?>
																	<img src="<? echo base_url().$d2->desc_image ?>" width="120" height="120" class="img-circle"><br>
																<? }else{ ?>
<!--																	<img src="<? echo base_url('assets/') ?>transparent.png" width="90" height="90" class="img-circle">-->
																<? } ?><? echo $d2->type_description ?>
															</td>
<!--															<td valign="middle"></td>-->

														</tr>

													</table>
												</td>

											<? }elseif($d2->type == "mentor"){ ?>
												<td><? if(!in_array($d2->technical_session,$techsession1)){ ?>
														<p><strong><? echo $d2->technical_session ?></strong></p>
													<? } ?>
												</td>
												<td>
													<p><strong><? echo $d2->description ?></strong>
													</p>
												</td>
												<td>
													<table class="techpic">
														<? foreach(json_decode($d2->mentor_data) as $m2){ ?>
														    <!--<tr colspan="2">
																<? //if(in_array("all",json_decode($d2->category))){}else{echo '<strong>Categories</strong> : '.implode(", ",json_decode($d2->category));} ?>
															</tr>-->
															<tr>
																<td valign="middle" align="center" class="<? echo ($m2->mentor_image) ? '' : 'noborder' ?>">
																	<? if($m2->mentor_image){ ?>
																		<img src="<? echo base_url().$m2->mentor_image ?>" width="120" height="120" class="img-circle">
																	<? }else{ ?>
<!--																		<img src="<? echo base_url('assets/') ?>transparent.png" width="90" height="90" class="img-circle">-->
																	<? } ?>	<br>
																	<p><strong><? echo $m2->mentor_name ?></strong> <br><? echo nl2br($m2->mentor_designation) ?></p>
																</td>
<!--																<td valign="middle"></td>-->
															</tr>
														<? } ?>
													</table>
												</td>
											<? }else{ ?>

												<td><p><strong><? echo $d2->technical_session ?></strong></p></td>
												<td></td>
												<td></td>
												<td></td>
											<?	} ?>

										</tr>

									<? array_push($techsession1,$d2->technical_session);
									   array_push($session_time1,date("h:i A",strtotime($d2->schedule_start_time))." - ".date("h:i A",strtotime($d2->schedule_end_time)));		
										} ?>
									
								</table>
							</div>

						</div>
					</div>
				</div>	
	
				<? } ?>	
				
			</div>
		</div>
	</div>
	<div class="row">

	</div>
	</div>
</section>
		 
				 
				 
				 
	</div>				 
</section>	

	<section class="our-team white-background black" id="three" style="margin-bottom: 20px">
  		<div class="container" style="padding: 0px 0px !important;">
			<h3 class="title text-center"> Technical Sessions </h3> 
			 
		 	<div class="panel-group" id="accordion7401210" role="tablist" aria-multiselectable="false">
			   <div class="panel panel-default">
				  <div class="panel-heading" role="tab" id="heading8122873">
					 <h5 class="panel-title">
						<a role="button" data-toggle="collapse" class="accordion-plus-toggle" data-parent="#accordion7401210" href="#collapse8122873" aria-expanded="false" aria-controls="collapse8122873" style="color: black">NIRF - overview and significance</a>
					 </h5>
				  </div>
				  <div id="collapse8122873" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading8122873">
					 <div class="panel-body">National Institutional Ranking Framework (NIRF) is an initiative of the Ministry of Human Resource Development (MHRD) to rank higher education institutions across India. The NIRF is a framework, introduced in 2016, to objectively compare institutions on parameters such as teaching performance, research output, diversity, and reputation. The NIRF aims to identify and recognize top performing institutions, promote competitiveness among institutions and assist prospective students in their decision-making process when selecting institutions. A bird’s-eye-view on all the above will be presented.</div>
				  </div>
			   </div>
			   <div class="panel panel-default">
				  <div class="panel-heading" role="tab" id="heading411391">
					 <h5 class="panel-title">
						<a role="button" data-toggle="collapse" class="accordion-plus-toggle collapsed" data-parent="#accordion7401210" href="#collapse411391" aria-expanded="false" aria-controls="collapse411391" style="color: black">Methodology and metrics of the ranking framework</a>
					 </h5>
				  </div>
				  <div id="collapse411391" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading411391">
					 <div class="panel-body">Methodology for ranking is based on a set of metrics on five parameters divided into suitable subheads. This technical session deals with details of these metrics and the relevant data to be provided by institutions of diverse 	disciplines. The parameters broadly cover Teaching, Learning and Resources, Research and Professional Practices, Graduation Outcomes, Outreach and Inclusivity, and Perception. All the metrics will be discussed at length</div>
				  </div>
			   </div>
			   <div class="panel panel-default">
				  <div class="panel-heading" role="tab" id="heading2183316">
					 <h5 class="panel-title">
						<a role="button" data-toggle="collapse" class="accordion-plus-toggle collapsed" data-parent="#accordion7401210" href="#collapse2183316" aria-expanded="false" aria-controls="collapse2183316" style="color: black">Data capturing system (DCS) guidelines and data requirement</a>
					 </h5>
				  </div>
				  <div id="collapse2183316" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2183316">
					 <div class="panel-body">The entire exercise is data driven. Collecting, collating, compiling and uploading of institutional data will be explained in detail. Its impact on ranking will be examined. Vexing questions will be answered. Pitfalls to be avoided will be discussed.</div>
				  </div>
			   </div>
			   
			   <div class="panel panel-default">
				  <div class="panel-heading" role="tab" id="heading218331612">
					 <h5 class="panel-title">
						<a role="button" data-toggle="collapse" class="accordion-plus-toggle collapsed" data-parent="#accordion7401210" href="#collapse218331612" aria-expanded="false" aria-controls="collapse218331612" style="color: black">Perception-Importance and Measures to enhance</a>
					 </h5>
				  </div>
				  <div id="collapse218331612" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading218331612">
					 <div class="panel-body">Perception has significant importance in rankings. What it involves will be explained. This session will explore and explain in detail the measures to enhance the perception the stakeholders have on the institution.</div>
				  </div>
			   </div>
			   <div class="panel panel-default">
				  <div class="panel-heading" role="tab" id="heading218331613">
					 <h5 class="panel-title">
						<a role="button" data-toggle="collapse" class="accordion-plus-toggle collapsed" data-parent="#accordion7401210" href="#collapse218331613" aria-expanded="false" aria-controls="collapse218331613" style="color: black">Quality enhancement measures to get better rank in NIRF INDIA RANKINGS</a>
					 </h5>
				  </div>
				  <div id="collapse218331613" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading218331613">
					 <div class="panel-body">The different methods and strategies of quality enhancement strategies followed by Institutions with high ranking shall be discussed. How to introduce and implement those “best” practices will be discussed.</div>
				  </div>
			   </div>
			   <div class="panel panel-default">
				  <div class="panel-heading" role="tab" id="heading218331614">
					 <h5 class="panel-title">
						<a role="button" data-toggle="collapse" class="accordion-plus-toggle collapsed" data-parent="#accordion7401210" href="#collapse218331614" aria-expanded="false" aria-controls="collapse218331614" style="color: black">NIRF - RANK analysis of previous years</a>
					 </h5>
				  </div>
				  <div id="collapse218331614" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading218331614">
					 <div class="panel-body">A comparative analysis of the top ranked institutions during 2016-2020 shall be made in this session so as to arrive at the key strategic points for standing in the race in the years to come. The insights thus gleaned can be used in one’s own institution.</div>
				  </div>
			   </div>
			   
			   <div class="panel panel-default">
				  <div class="panel-heading" role="tab" id="heading218331615">
					 <h5 class="panel-title">
						<a role="button" data-toggle="collapse" class="accordion-plus-toggle collapsed" data-parent="#accordion7401210" href="#collapse218331615" aria-expanded="false" aria-controls="collapse218331615" style="color: black">Case studies from NIRF TOP RANKED INSTITUTIONS</a>
					 </h5>
				  </div>
				  <div id="collapse218331615" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading218331615">
					 <div class="panel-body">Statistical data of top ranked institutions will be discussed and their competitive advantages will be explored to provide a route map for other institutions to emulate.</div>
				  </div>
			   </div>
			   <div class="panel panel-default">
				  <div class="panel-heading" role="tab" id="heading218331616">
					 <h5 class="panel-title">
						<a role="button" data-toggle="collapse" class="accordion-plus-toggle collapsed" data-parent="#accordion7401210" href="#collapse218331616" aria-expanded="false" aria-controls="collapse218331616" style="color: black">Action plan and Suggestions for data uploading</a>
					 </h5>
				  </div>
				  <div id="collapse218331616" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading218331616">
					 <div class="panel-body">Experienced nodal officers share their knowledge in framing action plans for different criteria. Hints and clues will be offered for uploading the data without any difficulty.</div>
				  </div>
			   </div>
			</div>
			 			 
		</div>				 
	</section>
	
	
<section class="client-testimonial text-center white" id="six" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title"> Messages </h3>
      </div>
      <div class="col-md-8 col-md-offset-2 grey">
        <div id="testimonial" class="owl-carousel owl-theme">
		<?php 
		$tests = $this->db->query("SELECT * FROM tbl_testimonials order by sort_order ASC")->result();
		foreach($tests as $test){ ?>
          <div class="item">
		    <?php if($test->photo != ''){ ?>
				<img src="<?php echo base_url(); ?>assets/testimonals/<?php echo $test->photo ?>" class="img-circle" alt="Cinque Terre" width="150" height="150">
			<?php }else{} ?>
            <p><strong><?php echo $test->name; ?></strong><br><?php echo $test->designation; ?></p>
            <h5><?php echo $test->description; ?></h5>
          </div>
		<?php } ?>  
        </div>
        
        <a class="btn btn-info" href="<? echo base_url('home/messages') ?>">View All</a>
      </div>
    </div>
  </div>
</section>
<section class="client-testimonial text-center white test_bg" id="seven" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title"> Testimonals </h3>
      </div>
      <div class="col-md-8 col-md-offset-2 grey">
        <div id="new_testimonial" class="owl-carousel owl-theme">
		<?php 
		$tests = $this->db->query("SELECT * FROM tbl_new_testimonials LIMIT 6")->result();
		foreach($tests as $test){ ?>
          <div class="item">
		    <?php if($test->photo != ''){ ?>
				<img src="<?php echo base_url(); ?><?php echo $test->photo ?>" class="img-circle" alt="Cinque Terre" width="150" height="150">
			<?php }else{} ?>
            <p><br><strong><?php echo $test->name; ?></strong></p><p style="color:#d1d1d1"><?php echo $test->designation; ?></p>
            <h5><?php echo nl2br($test->description); ?></h5>
          </div>
		<?php } ?>  
        </div>
        <br>
        <a class="btn btn-info" href="<? echo base_url('home/new_testimonals') ?>">View All</a>
      </div>
    </div>
  </div>
</section><br/>
<h3 class="title text-center black"> Our Collaborators &  <span class="themecolor">Associates </span></h3>
<div class="container">
		<section class="customer-logos slider" style="margin-bottom:28px;">
			<? 
			   $coll = $this->db->order_by("sorting_order","asc")->get_where("tbl_collaborators")->result(); 
			   foreach($coll as $s){ ?>
					
					<div class="slide">
						<div class="text-center" style="margin-bottom: 10px">

							<div>
								<img src="<?php echo base_url(); ?>assets/collaborators/<? echo $s->image ?>">
							</div>
							<div class="tbox12" >
								<h4><? echo $s->heading ?></h4>

							</div>

						</div>
					</div>
					
			<? } ?>	
		</section>	  
</div>	 			 			 			 	 			 			 			 

<? front_footer() ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 1
            }
        }]
    });
});

</script>	

