<? front_header() ?>

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
        <img src="<? echo base_url('assets/') ?>images/banner2_new.jpg" alt="">
        <div class="carousel-caption">
        </div>
      </div>
	  
	  <div class="item">
        <img src="<? echo base_url('assets/') ?>images/banner3_new.jpg" alt="">
        <div class="carousel-caption">
        </div>
      </div>
	  
	   <div class="item">
        <img src="<? echo base_url('assets/') ?>images/banner4_new.jpg" alt="">
        <div class="carousel-caption">
        </div>
      </div>
	  
	   <div class="item">
        <img src="<? echo base_url('assets/') ?>images/banner5_new.jpg" alt="">
        <div class="carousel-caption">
        </div>
      </div>
	  
	   <div class="item">
        <img src="<? echo base_url('assets/') ?>images/banner6_new.jpg" alt="">
        <div class="carousel-caption">
        </div>
      </div>
	  
	   <div class="item">
        <img src="<? echo base_url('assets/') ?>images/banner7_new.jpg" alt="">
        <div class="carousel-caption">
        </div>
      </div>
	  
	   <div class="item">
        <img src="<? echo base_url('assets/') ?>images/banner8_new.jpg" alt="">
        <div class="carousel-caption">
        </div>
      </div>

<!--
       <div class="item">
        <div class="imgOverlay"></div>
        <img src="<? echo base_url('assets/') ?>images/banner2.jpg" alt="">
        <div class="carousel-caption">
        <h3 class="animated wow fadeInDownBig " data-wow-duration="1.15s">Two Day National Workshop on</h3>
  <h3 class="animated wow fadeInLeftBig " data-wow-duration="1.35s">Quality Enhancement Measures in Higher, Technical, Professional and Management Education with a Special Focus on NIRF Ranking</h3>
			 <h3 class="animated wow fadeInUpBig" data-wow-duration="1.55s"> Achieving Excellence Together</h3>
        </div>
      </div>
-->
    </div>
    <a class="left carousel-control" href="#themeSlider" data-slide="prev"> <span class="fa fa-chevron-left"></span> </a> <a class="right carousel-control"href="#themeSlider" data-slide="next"> <span class="fa fa-chevron-right"></span> </a> 
    <!--
    <div class="main-text hidden-xs hidden-sm">
        <div class="col-md-12 text-center">
            <h1>Static Headline And Content</h1>
            <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
            <div class="clearfix"></div>
            <div class="carousel-btns">
                <a class="btn btn-md btn-default" href="">Login</a>
                <a class="btn btn-md btn-default" href="">Registration</a>
            </div>
        </div>
    </div>--> 
  </div>
</section>

<!-- [/MAIN-HEADING]
 ============================================================================================================================--> 

<!-- [NEED]
 ============================================================================================================================-->
<section class="aboutus white-background black" id="one">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center black">
        <h3 class="title">Quest for Quality Enhancement & Sustainability <span class="themecolor">- Need...</span></h3>
        <p class="a-slog">
		<ul>
		<li>Quality Assurance and Performance enhancement in higher educational institutions is the call of the day.</li>		<li>The Government is mandating assessments and accreditations for all higher educational institutions.</li>
		
<li>National Institutional Ranking Framework is introduced by MHRD to foster competitiveness in improving educational standards.</li>		<li>Educational Institutions are looking forward to guidance/advice from experts in the field of Academics and Adminstration.</li>
<li>KAB Consultants with 20 years of experience in the higher      
     educational segment sees this as a great opportunity and    
     decided to start an Institute for providing services to 
     continuously improve the quality of education.
</li>
<li>Accordingly IAE(Institute for Academic Excellence) has been  
     conceptualised, crafted carefully and launched to make   
     available tailor - made services meeting individualistic needs/ 
     requirements of Higher Educational Institutions.</li>		</ul>
	</p>
                
      </div>
    </div>
    <div class="gap"> </div>
    
    <!-- /row --> 
    
  </div>
</section>

<!-- [About IAE]
 ============================================================================================================================-->
<!--<section class="inspiration" id="four">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <article class="col-md-12 text-center">
          <div class="intermediate-container">
            <div class="heading">
              <h2> About IAE</h2>
            </div>
            <div class="subheading">
              <h4>
	
          Institute for Academic Excellence (IAE) is an independent academic service provider catering to the varied needs of the higher educational institutions. IAE has roots in the two decade old and renowned KAB consultants, an organisation striving for the cause of quality enhancement in the academic arena
. IAE endeavours towards the institutional building, adoption of best practices in the journey towards academic excellence of the educational institutions with which it partners. IAE bench marks with the world best standards in academic & administrative areas and makes recommendations along with a clearly spelt road map to accomplish the same
. IAE operates through a strong resource base and pool of best brains in each of the areas of operation.

        </h4>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>-->

<!--
<section class="aboutus white-background black" id="one">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center black">
        <h3 class="title">Workshop <span class="themecolor">Overview</span></h3>
        <p class="a-slog">The focus of governments for the past few years has been to achieve three important goals – “access, equality and excellence”. Although substantial progress has been made over the years a lot more needs to be done to achieve all the three goals, particularly on the excellence front. The Ministry of HRD and regulatory bodies have initiated a series of reforms and have also introduced several schemes to bring ‘quality’ to the top agenda of  Indian Higher Education.</p>
        <p class="a-slog">This workshop aims to cover the following objectives to strengthen the quality enhancement measures of higher educational institutions, accordingly technical sessions have been designed. </p>
        <br>
        <h3 class="title">Objectives</h3>
        <ul >
          <li>To bring awareness about the parameters with relative weights.</li>
          <li>To bring awareness on innovative and best teaching learning practices for enhancing knowledge and employable skills of the students.</li>
          <li>To bring awareness about the quality research publications and patents.</li>
          <li>Deliberations on inclusivity and diversity in ranking process.</li>
          <li>Discussing different outreach programs with national priority for better ranking.</li>
          <li>Explaining the methods to enhance the perception levels of peers and other stakeholders of Higher Educational Institutions.</li>
        </ul>
        <br/>
        <h2> EXPECTED OUTCOME</h2>
        <p class="a-slog">The deliberations of the workshop build the capacity of the institutions in data uploading process for NIRF Ranking and also helps them in identifying their score position. </p>
      </div>
    </div>
    <div class="gap"> </div>
    
    <!-- /row --> 
    
 <!-- </div>
</section>  -->

<!-- [/ABOUTUS]
 ============================================================================================================================--> 

<!-- [SERVICE]
 ============================================================================================================================-->
<section class="aboutus  black2" id="venue">
  <div class="container">
    <div class="row">
      <div class="col-md-12 black1">
	<h2 align="center"> INSTITUTE FOR ACADEMIC EXCELLENCE </h2></br></br>
<h3 align="center">Best Support Services provided for Higher Educational Institutions</h3>
		<p class="a-slog" align="justify">We provide services to Higher Educational Institutions to help them to raise their profiles on a global scale and become top performers in their field.
We provide meaningful and actionable inputs, to refine the strategies and to apply course corrections and to prepare “Roadmap” to further enhance Ranking position, Recognition, Accreditation and Grading process.</p>

        <div class="col-md-7"><img src="/assets/images/services.jpg" class="img-responsive" width="90%" heigh="auto"/></div>
        <div class="col-md-5">

<!--          <h2> Services Offered</h2> -->

<p><b>1) NBA, NAAC, NIRF Support</b></p>
<li>Preparation of SAR, SSR Reports</li>
<li>Assessment and Data Analysis</li>
<li>Collaboration for organizing Workshops</li>

<p><b>2) Academic & Administrative Audit</b></p>
<li>Institution SWOC Analysis</li>
<li>Best Practices implementation Strategies</li>
<li>Continues Assessment and Evaluation</li>

<p><b>3) Assessment & Enhancement</b></p>
<li>Faculty Performance</li>
<li>Teaching-Learning and Evaluation</li>
<li>Research and Professional Practice</li>
<li>Graduate Outcomes</li>
<li>Curriculum Design & Development </li>

<!--          	   <p class="a-slog">Assessment, Accreditation(NAAC and NBA), Ranking related services(NIRF)</p>
		  	   <p class="a-slog">Quality Assurance and improvement initiatives related services(Academic and Administrative Audit)</p>
			   <p class="a-slog">Introduction of State of the Art Courses in the emerging domains</p>

-->
        </div>
      </div>
    </div>
    <div class="gap"> </div>
    
    <!-- /row -->
    
   
    <!--<div class="col-md-4">
      <div class="box">
        <h4> Sri K. Venkatesh </h4>
        <small>Director, </br>Institute for Academic Excellence,<br>
        Hyderabad.</small> </div>
    </div>
  </div>-->
</section>

<!-- [STRENGTHS]
 ============================================================================================================================-->
<section class="aboutus white-background black" id="one">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center black">
        <h3 class="title">Our Strengths and <span class="themecolor">competencies </span></h3>
        <p class="a-slog">
	<h3 align="left">Advisory Board Comprising:</h3>
		<ul>
		<li>Dr. D. N. Reddy, Former Vice Chancellor, Jawaharlal Nehru Technological University, Hyderabad.</li>		
		</ul>
<br/>
<h3 align="left">Operational Team consists of:</h3>
		<ul>
		<li>Distinguished Professors having vast experience in their 	respective domains and areas of operation.</li>		
		</ul>
<br/>
<h3 align="left">Foolproof Technology platform support.</h3>
<br/>
<h3 align="left">Key Differentiators</h3>
	<ul>
	<li> Team of Academic experts, experience in different audit processes</li>
	<li> Ability to hand hold in implementing the Best Practices recommended in the chosen areas</li>
	<li> Rich question bank drawn from past experience and best frameworks for review purposes</li>
	<li> Professionals with the past experience in managing the program engagement of Internal Quality System, Assessments and Accreditations</li>
	<li> Leveraging the existing quality Assets of the institute</li>
	</p>
                
      </div>
    </div>
 
  </div>
</section>


<!-- [OUR TEAM]
 ============================================================================================================================-->
<!--<section class="our-team white-background black" id="three">
  <div class="container">-->
  
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

<!--
<div class="row text-center">
	<div class="col-md-12">


		<h3 class="title text-center"> Inaugural & Valedictory Guests </h3>

		
			<div class="col-md-6 text-center animated wow fadeInLeftBig guest" data-wow-duration="1.15s">
			<div>
				<img src="<? echo base_url('assets/') ?>images/mppooma.jpg"/>
			</div>
			<div class="tbox text-center inaugural">
				<h2>Prof. M.P. Poonia </h2>
				<p>Vice Chairman,</br> AICTE, New Delhi. </p>
			</div>
		</div>

		<div class="col-md-6 text-center animated wow fadeInLeftBig guest" data-wow-duration="1.15s">
			<div>
				<img src="<? echo base_url('assets/') ?>images/dr-b-janardhan-reddy-ias.jpg"/>
			</div>
			<div class="tbox text-center inaugural">
				<h2>Dr. B. Janardhan Reddy, IAS </h2>
				<p>Secretary to Government,</br> Department of Higher Education, Telangana State. </p>
			</div>
		</div>


		<div class="col-md-6 text-center animated wow fadeInRightBig guest" data-wow-duration="1.15s">
			<div>
				<img src="<? echo base_url('assets/') ?>images/jayesh.jpg"/>
			</div>
			<div class="tbox text-center inaugural">
				<h2>Sri. Jayesh Ranjan, IAS </h2>
				<p>Principal Secretary, Information Technology (IT),</br> Government of Telangana, Hyderabad.<br>In-charge Vice Chancellor, JNTUH. </p>
			</div>
		</div>
		
		<div class="col-md-6 text-center animated wow fadeInRightBig guest" data-wow-duration="1.15s">
			<div>
				<img src="<? echo base_url('assets/') ?>images/navinmittal.jpg"/>
			</div>
			<div class="tbox text-center inaugural">
				<h2> Sri. Navin Mittal, IAS </h2>
				<p>Commissioner, Collegiate Education &<br> Technical Education Department,<br>Govt. of Telangana, Hyderabad.</p>
			</div>
		</div>

<!--
		<div class="col-md-6 animated wow fadeInLeftBig guest" data-wow-duration="1.35s">
			<div>
				<img src="<? echo base_url('assets/') ?>images/anilkumar.jpg"/>
			</div>
			<div class="tbox text-center inaugural">
				<h2>Dr. Anil Kumar Nassa</h2>
				<p>Member Secretary, NBA, <br>MHRD, Govt. of India, New Delhi.</p>
			</div>
		</div>
-->

<!--		<div class="col-md-6 animated wow fadeInLeftBig guest" data-wow-duration="1.35s">
			<div>
				<img src="<? echo base_url('assets/') ?>images/venkataramana.jpg"/>
			</div>
			<div class="tbox text-center inaugural">
				<h2>Prof. V. Venkata Ramana</h2>
				<p>Vice Chairman,  <br>Telangana State Council of Higher Education <br>Hyderabad. </p>
			</div>
		</div>
		
		
		
		<div class="col-md-6 animated wow fadeInLeftBig guest" data-wow-duration="1.35s">
			<div>
				<img src="<? echo base_url('assets/') ?>images/yadaiah.jpg"/>
			</div>
			<div class="tbox text-center inaugural">
				<h2>Dr. N. Yadaiah</h2>
				<p>Registrar, <br>JNT University, Hyderabad.</p>
			</div>
-->
		
<!--
		<div class="col-md-6 animated wow fadeInLeftBig guest" data-wow-duration="1.35s">
			<div>
				<img src="<? echo base_url('assets/') ?>images/dnreddy.jpg"/>
			</div>
			<div class="tbox text-center inaugural">
				<h2>Dr. D. N. Reddy</h2>
				<p>'Former Vice-Chancellor, JNT University, Hyderabad. <br>Chairman, Appellate Committee, NBA, <br>New Delhi.</p>
			</div>
		</div>
-->
		
<!--
		<div class="col-md-6 animated wow fadeInLeftBig guest" data-wow-duration="1.35s">
			<div>
				<img src="<? echo base_url('assets/') ?>images/venkatesh.jpg"/>
			</div>
			<div class="tbox text-center inaugural">
				<h2>K. Venkatesh</h2>
				<p>Director, <br>Institute for Academic Excellence,<br>Hyderabad.</p>
			</div>
		</div>
-->
<!--</div>
</div>
-->

<!--
</br>
  


    <div style="height:20px;"></div>
  
		<div class="clearfix"></div>
<div style="height:20px;"></div>
    <h2 class="text-center">Speakers</h2>
	  <div style="height:20px;"></div>
	
	  
		<section class="customer-logos slider" style="margin-bottom:28px;">
			
			<? 
	
				$speakers = $this->db->get_where("tbl_speakers_reorder")->row(); 
			
				foreach(json_decode($speakers->speakers_order) as $s){

				$sp = $this->db->get_where("tbl_speakers",array("id"=>$s))->row();	
					
			?>
					<a href="<? echo base_url('home/speakers') ?>">
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
			<? } ?>	

		</section>
	  
</div>	   -->
<!--	  <section class="our-stats" id="five">
  <div class="container">
    <div class="row">
      <h3 class="text-center" style="margin-bottom: 0px !important;">Workshop on Quality enhancement measures in Higher, Technical, Professional and <br>Management Educational Institutions with special focus on NIRF India Rankings - 2020
</h3>
				  
<!--		<p align="center" style="color: white; font-size: 18px">Eminent Professors, Experts from AICTE, NIRF, NBA, MHRD and NAAC are invited for interaction with participants.</p><br>-->


 <!--     <div class="col-md-10 col-md-offset-1">

       <div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#tab_default_1" data-toggle="tab">
							PROGRAM SCHEDULE  18th October, 2019 </a>
						</li>
						<li>
							<a href="#tab_default_2" data-toggle="tab">
							PROGRAM SCHEDULE  19th October, 2019 </a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
							
							
							<table border="0" cellspacing="0" cellpadding="0" width="100%" id="customers" class="customers1">
          
							  <tr>

								<th>Time</th>
								<th>Description</th>
								<th></th>

							  </tr>
							  
						 	  <tr>
								<td width="200x">10:00 AM - 10:10 AM</td>
								<td><p><strong>Welcoming Guests on to dais</strong></p></td>
								<td>
									<table class="techpic">

										<tr>

											<td valign="middle">Lighting of the Lamp by <br>All the dignitaries </td>

										</tr>

									</table>
								</td>
							   </tr>			
							 				
							  <tr>
								<td width="200x">10:10 AM - 10:20 AM</td>
								<td><p><strong>Welcome address by</strong></p></td>
								<td>
									<table class="techpic">

										<tr>

											<td valign="middle"><img src="<? echo base_url('assets/techs/navin.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Sri. Navin Mittal, IAS</strong> <br>Commissioner <br> Collegiate Education & Technical Education Department,<br>Govt. of Telangana, Hyderabad.</p></td>

										</tr>

									</table>
								</td>
							   </tr>

								<tr>
								<td width="200x">10:20 AM - 10:40 AM</td>
								<td><p><strong>Addressed by</strong></p></td>
								<td>
									<table class="techpic">

										<tr>

											<td valign="middle"><img src="<? echo base_url('assets/techs/jayesh.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Sri. Jayesh Ranjan, IAS</strong> <br>Vice Chancellor, JNTUH.<br>	Principal Secretary,<br>IT & Industry, Government of Telangana.</p></td>

										</tr>

									</table>
								</td>
							   </tr>

								<tr>
								<td width="200x">10:40 AM - 10:50 AM</td>
								<td><p><strong>Addressed by</strong></p></td>
								<td>
									<table class="techpic">

										<tr>

											<td valign="middle"><img src="<? echo base_url('assets/techs/ramana.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Prof. V. Venkata Ramana</strong> <br> Vice Chairman,<br> Telangana State Council of Higher Education Hyderabad.</p></td>

										</tr>

									</table>
								</td>
							   </tr>
							   
							   	<tr>
								<td width="200x">10:50 AM - 11:10 AM</td>
								<td><p><strong>Key note Address by Chief Guest</strong></p></td>
								<td>
									<table class="techpic">

										<tr>

											<td valign="middle"><img src="<? echo base_url('assets/techs/poonia.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Prof. M.P. Poonia</strong> <br> Vice Chairman, AICTE, New Delhi.</p></td>

										</tr>

									</table>
								</td>
							   </tr>
							   
							   	<tr>
								<td width="200x">11:10 AM - 11:20 AM</td>
								<td><p><strong>Vote of thanks</strong></p></td>
								<td>
									<table class="techpic">

										<tr>

											<td valign="middle"><img src="<? echo base_url('assets/techs/venkatesh.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>K. Venkatesh</strong> <br>Director,  <br>Institute for Academic Excellence, Hyderabad.</p></td>

										</tr>

									</table>
								</td>
							   </tr>
							   
							   	<tr>
								<td width="200x">11:30 AM - 12:30 PM</td>
								<td><p><strong>Graduate Outcome - Attainments</strong></p></td>
								<td>
									<table class="techpic">

										<tr>

											<td valign="middle"><img src="<? echo base_url('assets/techs/shiva.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Prof. N. Siva Prasad </strong> <br>Pro. Vice Chancellor, <br>GITAM University, Hyderabad Campus.<br>Former Prof. IIT, Madras.</p></td>

										</tr>

									</table>
								</td>
							   </tr>
							   
							   	<tr>
								<td width="200x">12:30 PM - 1:30 PM</td>
								<td><p><strong>Perception</strong></p></td>
								<td>
									<table class="techpic">

										<tr>
											
											<td valign="middle"><img src="<? echo base_url('assets/techs/ram.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Prof. S. Ramachandram </strong> <br>Former Vice Chancellor, <br>Osmania University, Hyderabad.</p></td>

										</tr>

									</table>
								</td>
							   </tr>				
			
							   <tr>
								<td width="200x">1:30 PM - 2:00 PM</td>
								<td colspan="2" align="center"><p><strong>LUNCH BREAK</strong></p></td>
								
							   </tr>
							   
							   <tr>
								<td width="200x">2:00 PM - 3:00 PM</td>
								<td><p><strong>NIRF Case Study</strong></p></td>
								<td>
									<table class="techpic">

										<tr>
											
											<td valign="middle"><img src="<? echo base_url('assets/techs/sunder.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Dr. Mangala Sunder Krishnan,  </strong> <br>Ph.D.(McGill,Canada) <br>Professor and Head, Department of Chemistry,<br>Indian Institute of Technology Madras, Chennai.</p></td>

										</tr>

									</table>
								</td>
							   </tr>
							   
							   <tr>
								<td width="200x">3:00 PM - 3:45 PM</td>
								<td><p><strong>Quality of Research in Higher Education System</strong></p></td>
								<td>
									<table class="techpic">

										<tr>
											
											<td valign="middle"><img src="<? echo base_url('assets/techs/pande.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Prof. Pandhari Pande  </strong> <br>Ex-Vice Chancellor,  <br>Dr. Babasaheb Ambedkar Marathwada <br>University, Aurangabad, Maharashtra.<br>Ex Director, VNIT, Nagpur, Maharashtra</p></td>

										</tr>

									</table>
								</td>
							   </tr>
							   
							   <tr>
								<td width="200x">3:45 PM - 4:00 PM</td>
								<td colspan="2" align="center"><p><strong>TEA BREAK</strong></p></td>
								
							   </tr>
							   
							   <tr>
								<td width="200x">4:00 PM - 5:00 PM</td>
								<td><p><strong>Presentation and Interaction on NIRF Data Capturing System </strong></p></td>
								<td>
									<table class="techpic">

										<tr>
											
											<td><p><strong>1)  Dr. Ram Prasad  </strong> <br><strong>2)  Dr. M. Kamala Rani  </strong> <br>Senior Academic Consultant,<br>IAE, Hyderabad.</p></td>

										</tr>

									</table>
								</td>
							   </tr>
							   
							   <tr>
								<td width="200x">5:00 PM - 6:00 PM</td>
								<td><p><strong>Effective Virtual Learning Environment (VLE) for Enhanced Quality Education</strong></p></td>
								<td>
									<table class="techpic">

										<tr>
											
											<td valign="middle"><img src="<? echo base_url('assets/techs/sriva.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Prof. K.R. Srivathsan </strong> <br>Professor (Retd.) IIT Kanpur<br>First Director, IIITM - Kerala</p></td>

										</tr>

									</table>
								</td>
							   </tr>
							</table>


							
						</div>
						<div class="tab-pane" id="tab_default_2">
						
							<table border="0" cellspacing="0" cellpadding="0" width="100%" id="customers" class="customers1">
          
							  <tr>

								<th>Time</th>
								<th>Description</th>
								<th></th>

							  </tr>

							  <tr>
								<td width="200x">9:30 AM - 10:15 AM</td>
								<td><p><strong>Academic Excellence in Higher <Education></Education></strong></p></td>
								<td>
									<table class="techpic">

										<tr>

											<td valign="middle"><img src="<? echo base_url('assets/techs/surendra.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Prof. Surendra Prasad</strong> <br> Former Director, IIT, New Delhi. <br> Former Chairman, National Board of Accreditation (NBA).</p></td>

										</tr>

									</table>
								</td>
							   </tr>

								<tr>
								<td width="200x">10:15 AM - 11:00 AM</td>
								<td><p><strong>Best Practices in Teaching and Learning in outcome based education </strong></p></td>
								<td>
									<table class="techpic">

										<tr>

											<td valign="middle"><img src="<? echo base_url('assets/techs/sahasra.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Prof. S.C. Sahasrabudhe</strong> <br>Former Deputy Director, IIT Bombay<br>Former Director, <br>Dhirubhai Ambani Institute of Information and Communication Technology, Gandhinagar, Gujarat.</p></td>

										</tr>

									</table>
								</td>
							   </tr>

								<tr>
								<td width="200x">11:00 AM - 11:45 AM</td>
								<td><p><strong>Addressed by</strong></p></td>
								<td>
									<table class="techpic">

										<tr>

											<td valign="middle"><img src="<? echo base_url('assets/techs/anil.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Dr. Anil Kumar Nassa</strong> <br> Member Secretary, NBA, <br> MHRD, Govt. of India, New Delhi.</p></td>

										</tr>

									</table>
								</td>
							   </tr>
							   
							   <tr>
								<td width="200x">11:45 AM - 12:00 NOON</td>
								<td colspan="2" align="center"><p><strong>TEA BREAK</strong></p></td>
								
							   </tr>
							   
							   <tr>
								<td width="200x">12:00 PM - 12:45 PM</td>
								<td><p><strong>Outreach and Inclusivity - Strategies</strong></p></td>
								<td>
									<table class="techpic">

										<tr>

											<td valign="middle"><img src="<? echo base_url('assets/techs/yajula.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Dr. Yajulu Medury</strong> <br> Director,  <br> Mahindra Ecole Centrale College of Engineering, Hyderabad.</p></td>

										</tr>

									</table>
								</td>
							   </tr>
							   
							   <tr>
								<td width="200x">12:45 PM - 1:30 PM</td>
								<td><p><strong>Achieving Excellence in Research and Professional Practice by</strong></p></td>
								<td>
									<table class="techpic">

										<tr>

											<td valign="middle"><img src="<? echo base_url('assets/techs/madhukar.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Prof. B. S. Madhukar</strong> <br>Formerly, Adviser and General Council , Executive Committee member in NAAC.  <br>Member of the Assessment Committee of Yoga Certification Board (YCB), Ministry of AYUSH.</p></td>

										</tr>

									</table>
								</td>
							   </tr>
							   
							   <tr>
								<td width="200x">1:30 PM - 2:00 PM</td>
								<td colspan="2" align="center"><p><strong>LUNCH BREAK</strong></p></td>
								
							   </tr>	
							   
							   	<tr>
								<td width="200x">2:00 PM - 3:00 PM</td>
								<td><p><strong>Role of Teaching, Learning & Resources in NIRF Ranking</strong></p></td>
								<td>
									<table class="techpic">

										<tr>

											<td valign="middle"><img src="<? echo base_url('assets/techs/raja.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Prof. B. Raja Sekhar</strong> <br> Pro Vice Chancellor,  <br>Hyderabad Central University, Hyderabad.</p></td>

										</tr>

									</table>
								</td>
							   </tr>

							   
							   	<tr>
								<td width="200x">3:00 PM - 3:45 PM</td>
								<td><p><strong>NIRF Ranking Case Study</strong></p></td>
								<td>
									<table class="techpic">

										<tr>

											<td valign="middle"><img src="<? echo base_url('assets/techs/saket.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>Prof. Saket Asthana</strong> <br>Professor, Advanced Functional Materials Laboratory<br>Department of Physics, Indian Institute of Technology, Hyderabad.</p></td>

										</tr>

									</table>
								</td>
							   </tr>
							   
							   <tr>
								<td width="200x">3:45 PM - 4:00 PM</td>
								<td colspan="2" align="center"><p><strong>TEA BREAK</strong></p></td>
								
							   </tr>
							   
							   	<tr>
								<td width="200x">4:00 PM onwards</td>
								<td><p><strong>Participation Certificates Distribution & Valedictory</strong></p></td>
								<td>
									<table class="techpic">

										<tr>

											<td valign="middle"><img src="<? echo base_url('assets/techs/navin.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>i) Sri. Navin Mittal, IAS</strong> <br>Commissioner, Collegiate Education &<br>Technical Education Department,<br>Govt. of Telangana, Hyderabad.</p></td>

										</tr>
										
										<tr>

											<td valign="middle"><img src="<? echo base_url('assets/techs/yadaiah.jpg') ?>" width="50" height="50" class="img-circle"></td>
											<td><p><strong>ii) Dr. N. Yadaiah</strong> <br>Registrar, <br>JNT University, Hyderabad.</p></td>

										</tr>

									</table>
								</td>
							   </tr>
							   
							   
							</table>-->
							
	<!--					</div>
					
					</div>
				</div>
			</div>
       -->
       
        
		  
<!--
		<br>
		<p align="center" style="color: white; font-size: 18px;">Schedule and Session Plan along with Experts will be updated shortly.</p>

		  
      </div>
		
			
		
    </div>
  </div>
</section> -->
    <!-- end row -->
<!--    <div class="gap"></div>
    <h2 class="text-center"> Organizing Secretary </h2>
    <div class="gap"></div>
    <div class="col-md-6 col-md-offset-3">
      <div class="box">
        <h6><strong>Sri K Venkatesh Director, Institute for Academic Excellence.</strong></h6>
      </div>
    </div>-->
<!--    <div class="clearfix"></div>
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
 <!--           <li>Degree Colleges </li>
            
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
<!--  </div>
</section>

<!-- [ABOUT]
 ============================================================================================================================-->
<section class="inspiration" id="four">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <article class="col-md-12 text-center">
          <div class="intermediate-container">
            <div class="heading">
              <h2> About IAE</h2>
            </div>
<div class="subheading">
<h4>The Institute for Academic Excellence (IAE) is an independent academic service provider dedicated in serving the Higher Educational Institutions to achieve success through developing Best practices & Bench marking standards in curriculum and other related aspects. The IAE promotes / suggests academic institutions in developing academic programs, strategies and methods to enhance Institution reputation.</h4><h4><a href="<? echo base_url('home/about') ?>"><strong>Read more..</strong></a></h4>
<!--              <h4> 
Institute for Academic Excellence (IAE) is an independent academic service provider catering to the varied needs of the higher educational institutions. IAE has roots in the two decade old and renowned KAB consultants, an organisation striving for the cause of quality enhancement in the academic arena. IAE endeavours towards the institutional building, adoption of best practices in the journey towards academic excellence of the educational institutions with which it partners. IAE bench marks with the world best standards in academic & administrative areas and makes recommendations along with a clearly spelt road map to accomplish the same. IAE operates through a strong resource base and pool of best brains in each of the areas of operation.</h4> -->
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>

<!--REGISTRATION-->
<section class="services white-background black" id="seven12">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <h3 class="title">Reach and Recognition </h3>
        <div class="col-md-8 col-md-offset-2">
			<!--<div class="col-md-6 animated wow fadeInLeftBig " data-wow-duration="1.15s">
			<a href="<? echo base_url('assets/') ?>workshop_Registration_Form.pdf" target="_blank" download><div class="rbox">
			Offline Registration
			</div></a>
			</div>
			
			
			<div class="col-md-6 animated wow fadeInLeftBig " data-wow-duration="1.35s">
			<a href="<? echo base_url('home/register') ?>"><div class="rbox">
			Online Registration
			</div></a>
			</div>
		      -->   
        </div>
        <p class="a-slog">Expertise in organising Workshops/Conferences in sensitising the Target.</p>
		<P class="a-slog">Veracity of the claim upheld by the collaboration sought by JNTU(Jawaharlal Nehru Technological University), Hyderabad and Department of Technical Education, Government of Telangana in organising Workshop on NIRF India Rankings - 2020.</P>
      </div>
      <!-- /col --> 
    </div>
    <!-- /row -->
    <div class="gap"></div>
  </div>
  <!-- container --> 
</section>

<!--REGISTRATION-->
<!--<section class="services white-background black" id="seven12">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <h3 class="title">Registration </h3>
        <div class="col-md-8 col-md-offset-2">
			<div class="col-md-6 animated wow fadeInLeftBig " data-wow-duration="1.15s">
			<a href="<? echo base_url('assets/') ?>workshop_Registration_Form.pdf" target="_blank" download><div class="rbox">
			Offline Registration
			</div></a>
			</div>
			
			
			<div class="col-md-6 animated wow fadeInLeftBig " data-wow-duration="1.35s">
			<a href="<? echo base_url('home/register') ?>"><div class="rbox">
			Online Registration
			</div></a>
			</div>
        </div>
        <p class="a-slog">&nbsp;</p>
      </div>
    </div>
    <div class="gap"></div>
  </div>
</section> -->

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
</section><br/>
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
<!-- [/TESTIMONIAL]
 ============================================================================================================================--> 

<!-- [/SERVICES]
 ============================================================================================================================-->



<!-- [/SERVICES]
 ============================================================================================================================-->
<!--<section class="recent-works text-center" id="seven">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title">Gallery </h3>
      </div>
    </div>
    <div class="gap"></div>
    <div class="row">
      <div class="col-sm-4 port-item margin-bottom">
        <div class="item-img-wrap"> <img src="<? echo base_url('assets/') ?>images/work-1.jpg" class="img-responsive" alt="workimg">
          <div class="item-img-overlay"> <a href="<? echo base_url('assets/') ?>images/work-1.jpg" class="show-image"> <span></span> </a> </div>
        </div>
        <div class="work-desc">
          <h3><a href="#">Image-1</a></h3>
        </div>
      </div>
      <!-- /portfolio-item -->
      
      <!--<div class="col-sm-4 port-item margin-bottom">
        <div class="item-img-wrap"> <img src="<? echo base_url('assets/') ?>images/work-2.jpg" class="img-responsive" alt="workimg">
          <div class="item-img-overlay"> <a href="<? echo base_url('assets/') ?>images/work-2.jpg" class="show-image"> <span></span> </a> </div>
        </div>
        <div class="work-desc">
          <h3><a href="#">Image-2</a></h3>
        </div>
      </div>
      <!-- /portfolio-item -->
      
      <!--<div class="col-sm-4 port-item margin-bottom">
        <div class="item-img-wrap"> <img src="<? echo base_url('assets/') ?>images/work-3.jpg" class="img-responsive" alt="workimg">
          <div class="item-img-overlay"> <a href="<? echo base_url('assets/') ?>images/work-3.jpg" class="show-image"> <span></span> </a> </div>
        </div>
        <div class="work-desc">
          <h3><a href="#">Image-3</a></h3>
        </div>
      </div>
    </div>
  </div>
</section>-->


	
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

