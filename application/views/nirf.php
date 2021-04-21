
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
</style>
  
  <!-- [/MAIN-HEADING]
 ============================================================================================================================-->
  <section class="main-heading" id="home">
 <div class="baner"> <img src="<?php echo base_url(); ?><?php echo $nirf->banner_image ?>" class="img-responsive" />
	  </div> 
	  
	  
	  
	  
	
  </section>
  
  <!-- [/MAIN-HEADING]
 ============================================================================================================================--> 
  
  <!-- [ABOUT US]
 ============================================================================================================================-->
  <section class="white-background black" id="inpage">
    <div class="container">
      <div class="row">
        <div class="col-md-12  black">

          	<?php

              if (!empty($nirf->description)) {

             $year = $ydata->year;  

               ?>
           <h3 class="title"> NIRF - <?php echo $year;  ?> </h3>

          <p><?php  echo $nirf->description;   ?></p>
        <?php }else{ } ?>
          
		 <!--  <p>The National Institutional Ranking Framework (NIRF) was launched on 29th September 2015 by MHRD to rank Higher Educational Institutions in the Country based on objective, verifiable criteria to promote competitive excellence in the higher educational institutions. For the use of the participating institutions (institutes accredited/affiliated to the AICTE/UGC) a web based platform has been set up, in which the institutions are invited to register themselves.</p> 
		  <br>
		  <p>Ranking promotes competition among the Universities and drives them to strive for excellence. The rankings assume significance as performance of institutions has been linked with “Institutions of Eminence” scheme. Only Higher Educational Institutions currently placed in the top 500 of Global Rankings or top 50 of the National Institutional Ranking Framework (NIRF) are eligible to apply for the eminence tag. Institutions with the eminence tag would be allowed greater autonomy without having to report to the University Grants Commission (UGC). They would be able to admit foreign students and recruit faculty from abroad, and follow a flexible course and fee structure to enable them to vault to the ranks of the top Global Institution. The private Institutions of Eminence can also come up as ‘greenfield ventures’ - provided the sponsoring organization submits a convincing perspective plan for 15 years.</p>
		  <br>
		  <p>The parameters used for ranking broadly cover :</p>
		<ul>
		
			<li>Teaching, Learning & Resources (30% Weight in Total Score)</li>
			<li>Research and Professional Practice (30% Weight in Total Score )</li>
			<li>Graduation Outcomes (20% Weight in Total Score)</li>
			<li>Outreach and Inclusivity (10% Weight in Total Score)</li>
			<li>Perception (10% Weight in Total Score)</li>
			
		</ul>
		<p>The Educational Institutions across the Country were ranked in nine categories –Overall, Universities, Engineering, Colleges, Management, Pharmacy, Medical, Architecture and Law</p>
		<br>	
		<p>As Industry and Services sector in India would require a gross incremental work force of 250 million by 2030. Given the expected socio economic scenario in 2030 India would need a robust Higher Education System that can deliver on multiple imperatives. To achieve the envisioned state in 2030 transformational and innovative interventions would be required across all levels of the Higher Education system.NIRF plays a key role in identifying the top level institutions which can occupy a prominent place among higher educational institutions globally.</p> -->

        </div>
      </div>
      <div class="gap"> </div>

      
      <!-- /row --> 
      
    </div>
  </section>

<!-- [ABOUT US]
 ============================================================================================================================-->
<section class="aboutus white-background black" id="one">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center black">
        <?php if (!empty($nirf->workshop)) { ?>
        <h3 class="title">Workshop <span class="themecolor">Overview</span></h3>
        <p class="a-slog"><?php  echo $nirf->workshop;   ?></p>
      <?php }else{ 


       }?>
        <br>
        <?php if (!empty($nirf->objectives)) { ?>
        <h3 class="title">Objectives</h3>
        <ul >
        <?php  echo $nirf->objectives; ?>
         
        </ul>
      <?php  }else{  }  ?>
        <br/>
        <?php if (!empty($nirf->why_participate)) { ?>
         <h2 class="title">WHY PARTICIPATE ?</h2>
         <ul >
          <?php  echo $nirf->why_participate;   ?>
         </ul>
        <!-- <p class="a-slog">The deliberations of the workshop build the capacity of the institutions in data uploading process for NIRF Ranking and also helps them in identifying their score position. </p> -->
     <?php }else{  } ?>
      <br/>
      <?php  if (!empty($nirf->expected_outcome)) { ?>
        <h2 class="title"> EXPECTED OUTCOME</h2>
         <ul >
          <?php  echo $nirf->expected_outcome;  ?>
         </ul>
         <?php  }else{  } ?>
        <!-- <p class="a-slog">The deliberations of the workshop build the capacity of the institutions in data uploading process for NIRF Ranking and also helps them in identifying their score position. </p> -->
      </div>
    </div>
    <div class="gap"> </div>
    
    <!-- /row --> 
    
  </div>
</section>

<!-- [/ABOUTUS]
 ============================================================================================================================--> 

<!-- [Venue]
 ============================================================================================================================-->
<!--<section class="aboutus  black2" id="venue">
  <div class="container">
    <div class="row">
      <div class="col-md-12 black1">
        <div class="col-md-6"><img src="https://cdn.telanganatoday.com/wp-content/uploads/2017/03/JNTU-1024x680.jpg" class="img-responsive"/></div>
        <div class="col-md-6" style="color: white">
          <h2> Date:</h2>
          <p > <? //echo date("d",strtotime($sdates->event_start_date)) ?>th & <? //echo date("d",strtotime($sdates->event_end_date)) ?>th <? //echo date("F Y",strtotime($sdates->event_start_date)) ?></p>
          <h2>Time:</h2>
          <p ><? //echo $sdates->event_time ?></p>
          <h2>Venue:</h2>
          <p> <? //echo $sdates->event_mode ?> </p>
        </div>
      </div>
    </div>
    <div class="gap"> </div>
</section>-->

<section class="aboutus  black2" id="venue">
  <div class="container">
    <div class="row">
      <div class="col-md-12 black1">
        <div class="col-md-6" align="center" style="margin-top: 65px">
        	<a href="<? echo base_url('home/register') ?>">
        		<img class="img-responsive" src="<? echo base_url('assets/images/register.png') ?>" alt="" width="35%">
        	</a>
        	<br>
        	<p style="color: white; font-weight: bold;text-align: center"> <? echo ($cdate > $ydata->registration_end_date) ? 'Registration Closed' : 'Last date for registration - "'.date('d-M-Y',strtotime($ydata->registration_end_date)).'"' ?></p>
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
</section>


<!-- [/OUR-RECENT WORKS]
 ============================================================================================================================--> 

<!-- [OUR TEAM]
 ============================================================================================================================-->
<section class="our-team white-background black" id="three">
  <div class="container">
  
<!--
    <div class="row text-center">
      <div class="col-md-12">
		  
		  
		   <h3 class="title text-center"> Patrons </h3>

<div class="col-md-6 text-center animated wow fadeInLeftBig " data-wow-duration="1.15s">
	<div>
        <img src="<? echo base_url('assets/') ?>images/jayesh_ranjan.jpg"/>
         </div>
      <div class="tbox text-center">
        <h2>Sri Jayesh Ranjan, IAS, </h2>
        <p>In-charge Vice-chancellor,</br> Jawaharlal Nehru Technological University, Kukatpally, Hyderabad. </p> </div>
    </div>    


<div class="col-md-6 text-center animated wow fadeInRightBig " data-wow-duration="1.15s">
	<div>
        <img src="<? echo base_url('assets/') ?>images/Navin_Mittal.jpg"/>
         </div>
      <div class="tbox text-center">
        <h2> Sri Navin Mittal, IAS, </h2>
        <p>Commissioner of Collegiate Education & Technical Education,</br> Government of Telangana, Hyderabad. </p> </div>
    </div>
		 <div class="gap"> </div> 
		   
		 <div class="clearfix"></div> 
<br>
		  
      <div class="col-md-6 text-center animated wow fadeInRightBig " data-wow-duration="1.15s">
		<div>
		<h3 class="title">ADVISOR</h3>
			<img src="<? echo base_url('assets/') ?>images/dnreddy.jpg"/>
			 </div>
		  <div class="tbox text-center">
			<h2> <strong>Dr. D. N. Reddy</strong> Ph.D.(IIT, Delhi) </h2>
			<p>Director, AIMSCS, Hyderabad.<br>
              Chairman, Appellate Committee, NBA, New Delhi.</p> </div>
		</div>
        
        <div class="col-md-6 animated wow fadeInLeftBig " data-wow-duration="1.35s">
          <div><h3 class="title">Organizing Secretary</h3>
			<img src="<? echo base_url('assets/') ?>images/kvenkatesh.jpg"/>
          </div>
           <div class="tbox text-center" style="height: 114px">
            <h2><strong>Sri K. Venkatesh</strong></h2>
            <p>Director, Institute for Academic Excellence, Hyderabad.</p>
          </div>
        </div>
        
        
      </div>
    </div>
-->


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
					<a href="<? echo base_url('home/speakers/').$event_id ?>">
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

    <section class="our-stats" id="schedule">
  <div class="container1">



    <div class="row">
      <div class="col-md-12 col-md-offset-0">
        <h3 class="text-center" style="margin: 0px 0px 10px 0px; !important; font-weight: 700;color: white">Awareness Workshop<br>NIRF INDIA RANKINGS - <? echo $year ?><br>For Higher Educational Institutions</h3><br>
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

                        <td><p><strong><? echo $d1->technical_session ?></strong><br><strong>Categories</strong> : <? echo implode(", ",json_decode($d1->category)) ?></p></td>
                        <td><p><strong><? echo $d1->description ?></strong></p></td>
                        <td>
                          <table class="techpic">

                            <tr>
                              <td valign="middle" align="center" class="<? echo ($d1->desc_image) ? '' : 'noborder' ?>">
                                <? if($d1->desc_image){ ?>
                                  <img src="<? echo base_url().$d1->desc_image ?>" width="120" height="120" class="img-circle"><br>
                                <? }else{ ?>
<!--                                  <img src="<? echo base_url('assets/') ?>transparent.png" width="90" height="90" class="img-circle">-->
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
                          <br><strong>Categories</strong> : <? echo implode(", ",json_decode($d1->category)) ?> 
                        </td>
                        <td>
                       		<table class="techpic">
                            <? foreach(json_decode($d1->mentor_data) as $m1){ ?>
                                
                              <tr>
                                <td>
                                  <? if($m1->mentor_topic != ""){ 
										echo $m1->mentor_topic;
									?>
                                    
                                  <? }else{ ?>
                                  	
									<p><strong><? echo $d1->description; ?></strong></p>				
                                  <? } ?>
                                </td>
                              </tr>
                            <? } ?>
                          </table>	
                       
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
<!--                                    <img src="<? echo base_url('assets/') ?>transparent.png" width="90" height="90" class="img-circle">-->
                                  <? } ?> <br>
                                  <p><strong><? echo $m1->mentor_name ?></strong> <br><? echo nl2br($m1->mentor_designation) ?><br></p>
                                </td>
<!--                                <td valign="middle"></td>-->
                              </tr>
                              
                            <? } ?>
                          </table>
                        </td>
                      <? }else{ ?>

                        <td><p><strong><? echo $d1->technical_session ?></strong></p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      <?  } ?>

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

                        <td><p><strong><? echo $d2->technical_session ?></strong><br><strong>Categories</strong> : <? echo implode(", ",json_decode($d2->category)) ?></p></td>
                        <td><p><strong><? echo $d2->description ?></strong></p></td>
                        <td>
                          <table class="techpic">

                            <tr>
                              <td valign="middle" align="center" class="<? echo ($d2->desc_image) ? '' : 'noborder' ?>">
                                <? if($d2->desc_image){ ?>
                                  <img src="<? echo base_url().$d2->desc_image ?>" width="120" height="120" class="img-circle"><br>
                                <? }else{ ?>
<!--                                  <img src="<? echo base_url('assets/') ?>transparent.png" width="90" height="90" class="img-circle">-->
                                <? } ?><? echo $d2->type_description ?>
                              </td>
<!--                              <td valign="middle"></td>-->

                            </tr>

                          </table>
                        </td>

                      <? }elseif($d2->type == "mentor"){ ?>
                       
                        <td><? if(!in_array($d2->technical_session,$techsession1)){ ?>
                            <p><strong><? echo $d2->technical_session ?></strong></p>
                          <? } ?>
                          <br><strong>Categories</strong> : <? echo implode(", ",json_decode($d2->category)) ?>
                        </td>
                        <td>
                       		<table class="techpic">
                            <? foreach(json_decode($d2->mentor_data) as $m2){ ?>
                                
                              <tr>
                                <td>
                                  <? if($m2->mentor_topic != ""){ 
										echo $m2->mentor_topic;
									?>
                                    
                                  <? }else{ ?>
                                  	
									<p><strong><? echo $d2->description; ?></strong></p>				
                                  <? } ?>
                                </td>
                              </tr>
                            <? } ?>
                          </table>	
                       
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
<!--                                    <img src="<? echo base_url('assets/') ?>transparent.png" width="90" height="90" class="img-circle">-->
                                  <? } ?> <br>
                                  <p><strong><? echo $m2->mentor_name ?></strong> <br><? echo nl2br($m2->mentor_designation) ?></p>
                                </td>
<!--                                <td valign="middle"></td>-->
                              </tr>
                            <? } ?>
                          </table>
                        </td>
                        
                      <? }else{ ?>

                        <td><p><strong><? echo $d2->technical_session ?></strong></p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      <?  } ?>

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
    <!-- end row -->
<!--    <div class="gap"></div>
    <h2 class="text-center"> Organizing Secretary </h2>
    <div class="gap"></div>
    <div class="col-md-6 col-md-offset-3">
      <div class="box">
        <h6><strong>Sri K Venkatesh Director, Institute for Academic Excellence.</strong></h6>
      </div>
    </div>-->
    <div class="clearfix"></div>
    <br>

    <br>
    <div class="container">
    <div class="col-md-12">
      <h3 class="title text-center">Who can Participate</h3>
      <h2 class="text-center">Management, Principal & Sr. Faculty</h2>
      <br>
      <br>
      <div class="col-md-4 animated wow fadeInLeftBig " data-wow-duration="1.15s">
        <div class="box">
          <ul>
            <li>Universities</li>
            <li>Engineering Colleges</li>
            <li>Management Institutions</li>
          </ul>
        </div>
      </div>
      <div class="col-md-4 animated wow fadeInLeftBig " data-wow-duration="1.35s">
        <div class="box">
          <ul>
            <li>Medical Colleges</li>
            <li>Law Colleges</li>
            <li>Pharmacy Colleges</li>
          </ul>
        </div>
      </div>
      <div class="col-md-4 animated wow fadeInLeftBig " data-wow-duration="1.55s">
        <div class="box" style="height: 112px">
          <ul>
            <li>Architecture Colleges</li>
<!--            <li>Other Higher Educational Institutions</li>-->
            <li>Degree Colleges </li>
            
          </ul>
        </div>
      </div>
    </div>
    </div>
    <div class="clearfix"></div>
    <br>
    
    
    
    
     <!--<div class="container">
    <div class="col-md-12">
      <h2 class="text-center">CO-ORDINATORS </h2>
      <br>
      <br>
      <div class="col-md-6 animated wow fadeInRightBig " data-wow-duration="1.55s">
        <div class="box" style="height: 110px">
          <h4>Dr. M Padmavathi</h4>
          <p>Associate Professor (Civil Engg) & Coordinator, Academic & Planning, JNT University, Hyderabad. </p>
			
        </div>
      </div>
      <div class="col-md-6 animated wow fadeInRightBig " data-wow-duration="1.15s">
        <div class="box" style="height: 110px">
          <h4>Dr. B. Bala Bhaskar</h4>
          <p>Academic Guidance Officer, Collegiate Education, Govt. of Telangana.</p>
	
      </div>
      </div>
      <div class="col-md-6 animated wow fadeInRightBig " data-wow-duration="1.35s">
        <div class="box" style="height: 110px">
          <h4>B. Sreenivas</h4>
          <p>Camp Officer, TSCET, Admissions, Govt. of Telangana.</p>
	    </div>
      </div>

      
      <div class="col-md-6 animated wow fadeInRightBig " data-wow-duration="1.55s">
        <div class="box" style="height: 110px">
          <h4>Dr. M. Kamala Rani</h4>
          <p>Senior Academic Consultant, Institute for Academic Excellence, Hyderabad.</p>

        </div>
      </div>
      
    </div>
   </div>--> 
 
    <!-- /row --> 
    <!--<div class="clearfix"></div>
    <br>-->
  </div>
</section>

  
 <? front_footer() ?>