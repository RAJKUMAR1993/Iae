<? front_header();
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
	<div class="baner"> <img src="<? echo base_url() ?>assets/images/ripf-BANNER-2.jpg" class="img-responsive"> </div>
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
					<h3 class="title" style="text-align: left;">Major Objectives:</h3> <img src="<? echo base_url() ?>assets/images/objectives1.jpg" class="img-responsive img-thumbnail">
				</div>
				<div class="col-md-7">
					<ul style="margin-top: 36px;">
						<li>To Educate, Enlighten and Empower the Researchers And to ignite their minds towards Innovation and Invention</li></br>
						<li>To Improve Indian IPR Ranking position in Global Innovation Scenario</li></br>
						<li>To train the innovators about capitalization of IP and Professional Ethics</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>	
	</div>
</section>
			

<section id="sd">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Overview</h1>
				<p>India ranks 48th in Global Innovation Index 2020 and 40th in Global Intellectual Property Index. Its investment in research is only 0.7% of its GDP on R&D, much below global practices. Further, it spends 4.6 per cent of its total GDP on education. According to NIRF Report 2020, our country’s share of the overall world publications is about 4.33%. In engineering discipline, our contribution to world publications is 6.62%, in management, it is 3.27% and in pharmacy, it is observed as 5.52%.</p>
				<p>There are 216 Indian Institutions for joint research opportunity to scientists interested to apply for Fellowship under RTF-DCS Program, with Research Areas from <br> 1) Agriculture science <br> 2) Biological and Medical Sciences<br> 3) Chemical Sciences <br> 4) Physical Sciences and Mathematics<br> 5) Earth Sciences <br> 6) Engineering Sciences<br> 7) Materials, Minerals and Metallurgy<br> 8) Multi-disciplinary and Other Areas</p>
				<p>Government of India Established National institutes / central institutes and supported by national agencies such as CSIR, ESIC, ICAR, MoHFW, DBT, DST, ICMR, DAE, MHRD etc. including the prestigious Institutes of National Importance including CFTI, NIT, IIIT, IIT, ISRO and DRDO. </p>
				<p>In our country, there are 993 Universities, 39931 colleges, 3.73crores of students and 14.16Lakhs of teachers are involved in Higher education system.</p>
				<p>Each Indian institution is distinctive and very special due to the diversity in tradition, culture, heritage as well as socio-economic environment. Talented human resource is their potent tools to adapt for latest technologies and research methods in teaching learning process to impart quality education to fostering global competencies among students and to position the institutions in global scale.</p>
				<p>Today, Higher Educational Institutions (HEIs) aspire for equity in Academics and Research along with profound, measurable social outcomes.</p>
				<p>As a catalyst institution, IAE is taking novel initiatives which supports, the reputation enhancement of HEIs with a motto to bring the quality in education by featuring in National Institutional Ranking Framework (NIRF), accreditations like NAAC, NBA etc. IAE also plays an important role in collaboration with HEIs to implement such practices and take them to new heights of success.</p>
			</div>

		</div>
	</div>
</section>
<section id="sd">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>About the Symposium</h1>
				<p>IAE is conducting a National symposium to create awareness on 1) Research Methodology 2) IPR 3) Paper Publication 4) Fund Raising topics for Faculty Members, Students, Professionals, Scientists, Management of HEIs of India, Retired Professionals and the management and staff from Industries. </p>
				<p>The deliberations highlight the various Government initiatives for inculcation of the innovation and Entrepreneurship culture among the leading academic institutions and Research Establishments to make the country and its citizens independent and self-reliant in all respects.</p>
				<p>We have involved the leading Academicians, Directors of R&D laboratories and Experts from industries to share their knowledge and experience to the participants.</p>
			</div>

		</div>
	</div>
</section>

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



			<div class="box wow fadeInRightBig  animated">


				<div class="col-md-7">
					<h3 class="title" style="text-align: left;">Objectives of the Symposium:</h3>

					<ul>
						<li>To understand the modalities and focal points in Research Methodology, thrust areas of Research</li>
						<li>IPR and its associated processes like Creating IPR, filing of Patents, Copyrights, Trademarks, and Geographical Indicators</li>
						<li>Paper Publication Process, Selection of Journals, Presenting Research papers in conferences, Poster Presentation etc</li>
						<li>To create awareness on Government initiatives and special schemes available to Researchers</li>
						<li>Strategies for networking of academia with R&D Labs and Industries</li>
						<li>Elaborately address the queries through question and answers (Q&A) sessions</li>
					</ul>


				</div>

				<div class="col-md-5"><img src="<? echo base_url() ?>assets/images/objectives2.jpg" class="img-responsive img-thumbnail">
				</div>

				<div class="clearfix"></div>
			</div>

			<div class="clearfix"></div>
			<div style="height: 32px;display: block;clear: both;"></div>
			
			
			<div class="box wow fadeInLeftBig  animated">
				<div class="col-md-5">
					<h3 class="title" style="text-align: left;">Outcomes:</h3>
					<img src="<? echo base_url() ?>assets/images/outcome.jpg" class="img-responsive img-thumbnail">
				</div>

				<div class="col-md-7">
					
					
					<ul>
						<li>Self motivation to the beginners to do innovative research and inputs to the guides for scholar enrollment</li>
						<li>Research methods, formulation of problem, literature survey and hypothesis testing</li>
						<li>To write a thesis report for their Master’s and Doctoral programs</li>
						<li>How to do prior art search of Inventions</li>
						<li>How to write patent documents and get approval</li>
						<li>Identifying the reputed journals with high impact factor and indexing metrics</li>
						<li>Publishing technical papers in journals and presenting their papers in conferences</li>
						<li>Ways and means for Fund Raising through Technology Transfer, consultancy and professional practice</li>
						<li>Submission of project proposals to government funding agencies and review methods</li>
					</ul>


				</div>

				<div class="clearfix"></div>
			</div>

			<div class="clearfix"></div>
			<div style="height: 32px;display: block;clear: both;"></div>
			
			
			<div class="box wow fadeInLeftBig  animated">


				<div class="col-md-7">
					<h3 class="title" style="text-align: left;">Who Can Attend?</h3>
					
					<ul>
						<li>Management, Faculty, Students of Higher Educational Institutions (HEIs)</li>
						<li>Scholars and Research Fellows</li>
						<li>The Management and staff from Industries </li>
						<li>Scientists from R&D Labs</li>
						<li>Retired Professionals</li>
					</ul>


				</div>

				<div class="col-md-5"><img src="<? echo base_url() ?>assets/images/whocan.jpg" class="img-responsive img-thumbnail">
				</div>

				<div class="clearfix"></div>
			</div>

			<div class="clearfix"></div>
			<div style="height: 32px;display: block;clear: both;"></div>
			
			
			
			<h3 class="title" style="text-align: center;">Participation category</h3>
			<div class="col-sm-4 wow fadeInLeftBig  animated text-center">
				<div class="tbox">
					<h4>Engineering and Technology</h4>
				</div>
			</div>
			<div class="col-sm-4 text-center">
				<div class="tbox">
					<h4>Arts and Humanities</h4>
				</div>
			</div>
			<div class="col-sm-4 wow fadeInRightBig  animated text-center">
				<div class="tbox">
					<h4>Science</h4>
				</div><br>
			</div>
			<div class="col-sm-6 wow fadeInLeftBig  animated text-center">
				<div class="tbox">
					<h4>Health and Life Sciences</h4>
				</div>
			</div>
			<div class="col-sm-6 wow fadeInRightBig  animated text-center">
				<div class="tbox">
					<h4>Commerce and Business Management</h4>
				</div>
			</div>




			<div class="col-md-12 text-center black"> <br>

				<div class="box">

					<? 
	$edata = $this->db->order_by("id","desc")->get_where('tbl_schedule_dates',["event_type"=>"RIPF","status"=>"Active"])->row();
?>


					<h3 class="title" style="text-align: center;"> Online Registration: </h3>
					<p class="a-slog" style="text-align: center;"> Online Payment through Debit Card / Credit Card / Net Banking / UPI (GPay / Paytm / PhonePe) <br>
						<a href="#<? //echo base_url('home/register/').str_replace(" ","- ",$edata->event_name)."~ ".$edata->id ?>" class="btn btn-primary">Click here to Register</a>
					</p>
					<br>
					
					<div class="row">
						<div class="col-md-12 table-responsive">
						<h3 class="title" style="text-align: left;"> Topic wise Participation Fees: </h3>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Category</th>
										<th>Research Methodology <br>Day 1</th>
										<th>Intellectual Property Rights <br>Day 2</th>
										<th>Paper Publications <br> Day 3</th>
										<th>Fund Raising <br> Day 4</th>
										<th style="width: 80px;">For All Topics</th>
										<th>After Discount</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="text-align: left;">Institution (1-5 Members)</td>
										<td><i class="fa fa-rupee"></i> 5000</td>
										<td><i class="fa fa-rupee"></i> 10000</td>
										<td><i class="fa fa-rupee"></i> 5000</td>
										<td><i class="fa fa-rupee"></i> 10000</td>
										<td><i class="fa fa-rupee"></i> 30000</td>
										<td><i class="fa fa-rupee"></i> 25000</td>
									</tr>
									<tr>
										<td style="text-align: left;">Individual Faculty</td>
										<td><i class="fa fa-rupee"></i> 1000</td>
										<td><i class="fa fa-rupee"></i> 2000</td>
										<td><i class="fa fa-rupee"></i> 1000</td>
										<td><i class="fa fa-rupee"></i> 2000</td>
										<td><i class="fa fa-rupee"></i> 6000</td>
										<td><i class="fa fa-rupee"></i> 5000</td>
									</tr>
									<tr>
										<td style="text-align: left;">Students</td>
										<td><i class="fa fa-rupee"></i> 500</td>
										<td><i class="fa fa-rupee"></i> 1000</td>
										<td><i class="fa fa-rupee"></i> 500</td>
										<td><i class="fa fa-rupee"></i> 1000 </td>
										<td><i class="fa fa-rupee"></i> 2000</td>
										<td><i class="fa fa-rupee"></i> 2000</td>
									</tr>
									<tr>
										<td style="text-align: left;">Industry (1-3 Members)</td>
										<td><i class="fa fa-rupee"></i> 5000</td>
										<td><i class="fa fa-rupee"></i> 10000</td>
										<td><i class="fa fa-rupee"></i> 5000</td>
										<td><i class="fa fa-rupee"></i> 10000 </td>
										<td><i class="fa fa-rupee"></i> 30000</td>
										<td><i class="fa fa-rupee"></i> 25000</td>
									</tr>
									<tr>
										<td style="text-align: left;">R&D Labs (1-3 Members)</td>
										<td><i class="fa fa-rupee"></i> 5000</td>
										<td><i class="fa fa-rupee"></i> 10000</td>
										<td><i class="fa fa-rupee"></i> 5000</td>
										<td><i class="fa fa-rupee"></i> 10000 </td>
										<td><i class="fa fa-rupee"></i> 30000</td>
										<td><i class="fa fa-rupee"></i> 25000</td>
									</tr>
									<tr>
										<td style="text-align: left;">Retired Professional</td>
										<td><i class="fa fa-rupee"></i> 1000</td>
										<td><i class="fa fa-rupee"></i> 2000</td>
										<td><i class="fa fa-rupee"></i> 1000</td>
										<td> - </td>
										<td><i class="fa fa-rupee"></i> 4000</td>
										<td><i class="fa fa-rupee"></i> 3000</td>
									</tr>
									<tr>
										<td colspan="7"  style="text-align: left;">Note: 50% Discount is available for SC/ST/PH/EBC Students and Individual Faculty</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					
					<div class="row" style="color: red">
						<div class="col-md-8" align="left">
							<strong>Note:</strong> <br> 
							1. Each topic has parallel sessions separately for 1) Engineering and Technology 2) Health and Life Sciences 3) Science 4) Commerce and    Business Management streams 5) Arts and Humanities streams <br> 
							2. Participants may choose to attend one or more Topics as mentioned in the above table<br> 
							3. Institutions can have choice to sponsor maximum  of 5 faculty members for each Topic<br>
							4. Industry and R&D Labs can nominate maximum of 3 participants  for each topic
						</div>
					</div>
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
						<a href="<? echo base_url() ?>home/register">
							<img class="img-responsive" src="<? echo base_url() ?>assets/images/register.png" alt="" width="40%">
						</a>
					
						<br>
						<!--						<p style="color: white; font-weight: bold;text-align: center"> Registration Closed</p>-->
					</div>
					<div class="col-md-6 cv" style="color: white">
						<h2>DATE: <span> <strong>21<sup>st</sup> and 24<sup>th</sup> June 2021</strong></span></h2>
						<h2>TIME: <span><strong>10-00 AM - 06-00 PM</strong></span></h2>
						<h2>MODE: <span> <strong>online</strong> </span></h2>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>

<? front_footer()
?>