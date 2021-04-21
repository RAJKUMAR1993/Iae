<?php $d= &get_instance(); ?> 
<?php $event_id = $this->uri->segment(3);?>


<? 
front_header();
$cdate = date( "Y-m-d" );

?>

<style>
	#customers {
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
	
	.slick-slider .slick-track,
	.slick-slider .slick-list {
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
	
	.slick-track:before,
	.slick-track:after {
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
	
	.inaugural {
		height: 140px;
	}
	
	.guest {
		margin-top: 10px;
	}
	
	.techpic img {
		margin-top: 27px;
		border: 2px solid white;
	}
	
	.techpic td {
		border-bottom: 0px!important;
		padding: 0px 10px 0px 20px !important;
		font-size: 14px
	}
	
	.customers1 p {
		font-size: 14px;
	}
	
	.customers1 td {
		font-size: 14px;
	}
	
	.our-stats> .container1 {
		padding: 60px 20px;
	}
	
	body {
		color: #000;
	}
	
	.our-stats h3 {
		color: white;
		padding-bottom: 20px;
		font-weight: 500;
		font-size: 22px;
	}
	
	.tabbable-panel {
		border: 0px solid #eee;
		padding: 10px;
	}
	/* Default mode */
	
	.tabbable-line> .nav-tabs {
		border: none;
		margin: 0px;
	}
	
	.tabbable-line> .nav-tabs> li {
		margin-right: 2px;
	}
	
	.tabbable-line> .nav-tabs> li> a {
		border: 0;
		margin-right: 0;
		color: #fff;
	}
	
	.tabbable-line> .nav-tabs> li> a> i {
		color: #a6a6a6;
	}
	
	.tabbable-line> .nav-tabs> li.open,
	.tabbable-line> .nav-tabs> li:hover {
		border-bottom: 4px solid #fbcdcf;
	}
	
	.tabbable-line> .nav-tabs> li.open> a,
	.tabbable-line> .nav-tabs> li:hover> a {
		border: 0;
		background: none !important;
		color: #EEF975;
	}
	
	.tabbable-line> .nav-tabs> li.open> a> i,
	.tabbable-line> .nav-tabs> li:hover> a> i {
		color: #a6a6a6;
	}
	
	.tabbable-line> .nav-tabs> li.open .dropdown-menu,
	.tabbable-line> .nav-tabs> li:hover .dropdown-menu {
		margin-top: 0px;
	}
	
	.tabbable-line> .nav-tabs> li.active {
		border-bottom: 4px solid #f3565d;
		position: relative;
	}
	
	.tabbable-line> .nav-tabs> li.active> a {
		border: 0;
		color: #333333;
	}
	
	.tabbable-line> .nav-tabs> li.active> a> i {
		color: #404040;
	}
	
	.tabbable-line> .tab-content {
		margin-top: -3px;
		/*  background-color: #fff;*/
		border: 0;
		border-top: 1px solid #eee;
		padding: 1px 0;
	}
	
	.portlet .tabbable-line> .tab-content {
		padding-bottom: 0;
	}
	
	.tabbable-line.tabs-below> .nav-tabs> li {
		border-top: 4px solid transparent;
	}
	
	.tabbable-line.tabs-below> .nav-tabs> li> a {
		margin-top: 0;
	}
	
	.tabbable-line.tabs-below> .nav-tabs> li:hover {
		border-bottom: 0;
		border-top: 4px solid #fbcdcf;
	}
	
	.tabbable-line.tabs-below> .nav-tabs> li.active {
		margin-bottom: -2px;
		border-bottom: 0;
		border-top: 4px solid #f3565d;
	}
	
	.tabbable-line.tabs-below> .tab-content {
		margin-top: -10px;
		border-top: 0;
		border-bottom: 1px solid #eee;
		padding-bottom: 15px;
	}
	
	.nav-tabs> li.active> a:hover,
	.nav-tabs> a:focus {
		color: #EEF975 !important;
	}
	
	.techpic tr {
		height: 210px !important;
	}
	
	#inpage {
		margin-top: 80px;
	}
	
	.title {
		font-size: 20px;
		text-align: center;
	}
	
	.a-slog {
		text-align: justify;
	}
	
	.naac {
		background: #1a9cff;
		padding: 40px;
		color: white;
		box-shadow: 5px 2px 5px 2px #888888;
	}
	
	.naac h3 {
		line-height: 30px;
	}
	
	.black4 {
		border: dashed 2px #a4d1f4;
		padding: 50px 30px;
		color: #fff;
		margin-top: 20px;
	}
	
	.black4 h1 {
		font-size: 20px;
		font-weight: bold;
	}
	
	.black4 h2 {
		padding: 15px 0px!important;
		font-size: 36px!important;
	}
	
	.cv span {
		font-size: 20px;
		margin: 0;
		/*    padding-top: 10px;*/
		/*    line-height: 31px;*/
		/*    color: #f6ff00;*/
	}
	
	.cv h2 {
		font-size: 24px !important;
	}
	
	#sd {
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
	
	#sd ul {
		margin-left: 20px;
	}
	
	.tbox h4 {
		color: #fff;
		font-size: 20px;
		font-weight: bold;
		padding-bottom: 10px;
	}
	
	.title h4 {
		font-size: 28px;
		padding: 12px 0px;
		font-weight: 500;
	}
	
	.title h1 {
		font-weight: 600;
		font-size: 35px;
		letter-spacing: 4px;
	}
	
	.heading .title {
		text-transform: capitalize;
		margin-bottom: 0px;
	}
	th{
		font-size: 14px !important;
	}
</style>

<section class="main-heading" id="home">
	<!--<div class="baner"> <img src="<? echo base_url() ?>assets/images/inbanner.jpg" class="img-responsive"> </div>-->
	<div class="baner"> <img src="<?php echo base_url(); ?><?php echo $ripf->banner_image ?>" class="img-responsive"> </div>
</section>
<section class="aboutus heading">
	<div class="container">
		<div class="row">
			<div class="col-md-12" align="center">
				<!--<div class="title">
					<h4>National Symposium </h4>
					<h1 style="margin-bottom: 10px">Research Methods-IPR-Publications - Fund Raising (RIPF) </h1>
					<small>For Faculty, Students, Research Scholars, the Management and staff from Industries, Scientists, and Retired professionals</small>
				</div>-->
			</div>
		</div>
	</div>
</section>

<section class="aboutus white-background black" id="one">
	<div class="container">
		<div class="row1">
			<div class="box wow fadeInLeftBig  animated">
				<div class="col-md-5 ">
					<h3 class="title" style="text-align: left;">Major Objectives:</h3> <img src="<?php echo base_url(); ?><?php echo $ripf->m_obj_image ?>" class="img-responsive img-thumbnail">
				</div>
				<div class="col-md-7">
					<ul style="margin-top: 36px;">
					<?php echo $ripf->objectives ?>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>	
	</div>
</section>
			
<?php if(!empty($ripf->workshop)){ ?>
<section id="sd">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Overview</h1>
				<?php echo $ripf->workshop; ?>
			</div>

		</div>
	</div>
</section>
<?php } ?>
<?php if(!empty($ripf->about_symposium)){ ?>
<section id="sd">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>About the Symposium</h1>
				<?php echo $ripf->about_symposium  ?>
			</div>

		</div>
	</div>
</section>
<?php }?>
<!-- [ABOUT US]
===
=== === === === === === === === === === === === === === === === === === === === === === === === === === === === === === === === === === === === === === === === = -->
<section class="aboutus white-background black" id="one">
	<div class="container">
		<div class="row1">
			<!--<div class="box wow fadeInLeftBig  animated">
				<div class="col-md-5 ">
					<h3 class="title" style="text-align: left;">Major Objectives:</h3> <img src="<? echo base_url() ?>assets/images/services.jpg" class="img-responsive img-thumbnail">
				</div>
				<div class="col-md-7">
					<ul style="margin-top: 36px;">
						<li>To Educate, Enlighten and Empower the Researchers And to ignite their minds towards Innovation and Invention</li>
						<li>To Improve Indian IPR Ranking position in Global Innovation Scenario</li>
						<li>To train the innovators about capitalization of IP and Professional Ethics</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>-->

			<div style="height: 32px;display: block;clear: both;"></div>


			   <?php if(!empty($ripf->objective_of_the_symposium)){ ?>

			<div class="box wow fadeInRightBig  animated">


				<div class="col-md-7">
					<h3 class="title" style="text-align: left;">Objectives of the Symposium:</h3>

					<ul>
						<?php echo $ripf->objective_of_the_symposium ?>
					</ul>


				</div>

				<div class="col-md-5"><img src="<?php echo base_url(); ?><?php echo $ripf->ob_sypim_image ?>" class="img-responsive img-thumbnail">
				</div>

				<div class="clearfix"></div>
			</div>
			<?php } ?>

			<div class="clearfix"></div>
			<div style="height: 32px;display: block;clear: both;"></div>
			
			<?php if(!empty($ripf->outcomes)){ ?>
			<div class="box wow fadeInLeftBig  animated">
				<div class="col-md-5">
					<h3 class="title" style="text-align: left;">Outcomes:</h3>
					<img src="<?php echo base_url(); ?><?php echo $ripf->outcome_image ?>" class="img-responsive img-thumbnail">
				</div>

				<div class="col-md-7">
					
					
					<ul>
						<?php  echo $ripf->outcomes  ?>
					</ul>


				</div>

				<div class="clearfix"></div>
			</div>
			<?php } ?>

			<div class="clearfix"></div>
			<div style="height: 32px;display: block;clear: both;"></div>
			
        <?php if(!empty($ripf->who_can_attend)){ ?>
			<div class="box wow fadeInLeftBig  animated">


				<div class="col-md-7">
					<h3 class="title" style="text-align: left;">Who Can Attend?</h3>
					
					<ul>
						<?php echo $ripf->who_can_attend; ?>
					</ul>


				</div>

				<div class="col-md-5"><img src="<?php echo base_url(); ?><?php echo $ripf->whocan_image ?>" class="img-responsive img-thumbnail">
				</div>

				<div class="clearfix"></div>
			</div>
        <?php } ?>
			<div class="clearfix"></div>
			<div style="height: 32px;display: block;clear: both;"></div>
			
			
			
			<h3 class="title" style="text-align: center;">Participation category</h3>

			<?php
				
			foreach($rcrgty as $evnt_cat) {?>
			<div class="col-sm-4 wow fadeInLeftBig  animated text-center">
		
				<div class="tbox">
					<h4><?php echo  $evnt_cat->category ?></h4>
				</div>
			<br>
			</div>
			<?php } ?>


			<div class="col-md-12 text-center black"> <br>
				<div class="box">
					<?php
					 $ripfs = $d->db->order_by("id","desc")->get_where("tbl_schedule_dates",["event_type"=>"RIPF","status"=>"Active"])->result(); 
	                 $edata = $this->db->order_by("id","desc")->get_where('tbl_schedule_dates',["event_type"=>"RIPF","status"=>"Active"])->row();
?>


					<h3 class="title" style="text-align: center;"> Online Registration: </h3>
					<p class="a-slog" style="text-align: center;"> <?php echo $ripf->online_registration; ?> <br>
						<a href="<? echo base_url('home/register/').str_replace(" ","-",$ripfs[0]->event_name)."~".$ripfs[0]->id ?>" class="btn btn-primary">Click here to Register</a>
					</p>

					<div class="row">
						<div class="col-md-12 table-responsive">
						<h3 class="title" style="text-align: left;"> Topic wise Participation Fees: </h3>
							<table class="table table-bordered">
								<thead>
								  
									<tr>
										<th>Category</th>
										<th>Research Methodology <!--<br>Day 1--></th>
										<th>Intellectual Property Rights <!--<br>Day 2--></th>
										<th>Paper Publications <!--<br> Day 3--></th>
										<th>Fund Raising <!--<br> Day 4--></th>
										<th style="width: 80px;">For All Topics</th>
										<th>After Discount</th>
									</tr>
								
								</thead>
								<tbody>
								<?php foreach($rcategories as $rcp1){
								  $tamount =	$this->db->get_where("tbl_ripf_topics",array("ripf_category"=>$rcp1->id))->result();
								?>
									<tr>
										<td style="text-align: left;"><?php echo $rcp1->category_name  ?> (<?php echo $rcp1->members_count  ?> Members)</td>
										<?php 
											$total_amount=0;
											
										foreach($tamount as $a){  
											
											?>
										<td>
										<i class="fa fa-rupee"></i> <?php echo  $a->amount; ?>
										</td>
										<?php
												$total_amount+=$a->amount;  
											}  
										?>
										<td>
										<i class="fa fa-rupee"></i> <?php echo $total_amount; ?>   </td>
										<td><i class="fa fa-rupee"></i><?php echo $rcp1->overall_discount_amount  ?></td>
									</tr>
									<?php } ?>
									
									<tr>
										<td colspan="7" style="text-align: left;">Note: Students and Individual Faculty belongs to SC/ST/OBC/PwD/Female can avail 25% Discount.</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				<?php if(!empty($ripf->note)){ ?>
					<div class="row" style="color: red">
						<div class="col-md-12" align="left">
							<?php echo $ripf->note;  ?>
						</div>
					</div>
				<?php } ?>
					<br>
				</div>
			</div>

		</div>
		<!-- /row -->

	</div>

	<section class="aboutus  black2" id="venue">
		<div class="container">
			<div class="row">
				<div class="col-md-12 black1">
					<div class="col-md-6" align="center" style="margin-top: 25px">
						<a href="<? echo base_url('home/register/').str_replace(" ","-",$ripfs[0]->event_name)."~".$ripfs[0]->id ?>">
							<img class="img-responsive" src="<? echo base_url() ?>assets/images/register.png" alt="" width="40%">
						</a>
					
						<br>
						<!--						<p style="color: white; font-weight: bold;text-align: center"> Registration Closed</p>-->
					</div>
					<div class="col-md-6" style="color: white">
						<h2> Date:</h2>
						<p > <? echo $this->admin->get_ordinal_suffix(date("d",strtotime($ydata->event_start_date))) ?> - <? echo $this->admin->get_ordinal_suffix(date("d",strtotime($ydata->event_end_date))) ?> <? echo date("F Y",strtotime($ydata->event_start_date)) ?></p>
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


    <h1 class="title text-center"> Inaugural & Valedictory Guests </h1>

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
    <h1 class="text-center">Speakers</h1>
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
<? front_footer()
?>