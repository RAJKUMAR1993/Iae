<? $d= &get_instance(); ?>
<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Welcome to Institute for Academic Excellence </title>

<!-- [ FONT-AWESOME ICON ] 
        =========================================================================================================================-->
<link rel="stylesheet" type="text/css" href="<? echo base_url('assets/') ?>library/font-awesome-4.3.0/css/font-awesome.min.css">

<!-- [ PLUGIN STYLESHEET ]
        =========================================================================================================================-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<link rel="stylesheet" type="text/css" href="<? echo base_url('assets/') ?>css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<? echo base_url('assets/') ?>css/owl.theme.css">
<link rel="stylesheet" type="text/css" href="<? echo base_url('assets/') ?>css/magnific-popup.css">
<!-- [ Boot STYLESHEET ]
        =========================================================================================================================-->
<link rel="stylesheet" type="text/css" href="<? echo base_url('assets/') ?>library/bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="<? echo base_url('assets/') ?>library/bootstrap/css/bootstrap.css">
<!-- [ DEFAULT STYLESHEET ] 
        =========================================================================================================================-->
<link rel="stylesheet" type="text/css" href="<? echo base_url('assets/') ?>css/style.css">
<link rel="stylesheet" type="text/css" href="<? echo base_url('assets/') ?>css/responsive.css">
<link rel="stylesheet" type="text/css" href="<? echo base_url('assets/') ?>css/color/rose.css">
<link rel="stylesheet" type="text/css" href="<? echo base_url('assets/') ?>sweetalert/sweetalert.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Abel|Roboto:100,100i,300,300i,400,400i,500" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand&display=swap" rel="stylesheet">

<!-- Google Tag Manager -->

<!--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W2D3DQ9');</script>-->

<!-- End Google Tag Manager -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YEB7TSPGFB"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YEB7TSPGFB');
</script>

</head>
<body >

<!-- Google Tag Manager (noscript) -->
<!--<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W2D3DQ9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>-->
<!-- End Google Tag Manager (noscript) -->

<!-- [ LOADERs ]
================================================================================================================================--> 
<!--  <div class="preloader">
    <div class="loader theme_background_color">
        <span></span>
      
    </div>
</div>-->

	<style>
		
		
	.dropdown-menu > li.kopie > a {
    padding-left:5px;
}
 
.dropdown-submenu {
    position:relative;
}
.dropdown-submenu>.dropdown-menu {
   top:0;left:100%;
   margin-top:-6px;margin-left:-1px;
   -webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;
 }
  
.dropdown-submenu > a:after {
  border-color: transparent transparent transparent #333;
  border-style: solid;
  border-width: 5px 0 5px 5px;
  content: " ";
  display: block;
  float: right;  
  height: 0;     
  margin-right: -10px;
  margin-top: 5px;
  width: 0;
}
 
.dropdown-submenu:hover>a:after {
    border-left-color:#555;
 }

.dropdown-menu > li > a:hover, .dropdown-menu > .active > a:hover {
  text-decoration: none;
}  
  
@media (max-width: 767px) {

  .navbar-nav  {
     display: block;
  }
  .navbar-default .navbar-brand {
    display: inline;
  }
  .navbar-default .navbar-toggle .icon-bar {
    background-color: #fff;
  }

  .navbar-default .navbar-nav .dropdown-menu > li > a {
    color: #fff;
    background-color: #083154;
    border-radius: 4px;
    margin-top: 2px;   
  }
   .navbar-default .navbar-nav .open .dropdown-menu > li > a {
     color: #333;
   }
   .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
   .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
     background-color: #ccc;
   }

   .navbar-nav .open .dropdown-menu {
     border-bottom: 1px solid white; 
     border-radius: 0;
   }
  .dropdown-menu {
      padding-left: 10px;
  }
  .dropdown-menu .dropdown-menu {
      padding-left: 20px;
   }
   .dropdown-menu .dropdown-menu .dropdown-menu {
      padding-left: 30px;
   }
   li.dropdown.open {
    border: 0px solid red;
   }

}
 
@media (min-width: 768px) {
  ul.nav li:hover > ul.dropdown-menu {
    display: block;
  }
  #navbar {
    text-align: center;
  }
}
		

		
@media only screen and (max-width: 640px) {
.carousel-inner img {
    width: 100%;
    height: auto !important;
}
	.carousel-caption h3 {
    font-size: 12px;
    line-height: 17px;
}
	.carousel-control.left{ display: none;}
	.carousel-control.right{ display: none;}
	
	.carousel-caption {
    position: absolute;
    top: 72px !important;
	}
}		

@media (max-width: 767px){
.navbar-nav .open .dropdown-menu {
position: static;
float: none;
width: auto;
margin-top: 0;
background-color: transparent;
border: 0;
-webkit-box-shadow: none;
box-shadow: none;
}
	
		}
.open>.dropdown-menu {
display: block !important;
}		
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
color: #01f3ff!important;
background: transparent!important;
}		
		
	
	</style>

<div class="wrapper">
<nav  class="nim-menu navbar navbar-default navbar-fixed-top" style="height: 80px;padding: 15px;box-shadow: rgba(0, 0, 0, 0.3) 2px 2px 3px 3px;">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="<? echo base_url() ?>">I<span class="themecolor">A</span>E</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right menu-bg">
<!--        <li><a href="<? //echo base_url() ?>" class="page-scroll">Home</a></li>-->
        <!--<li><a href="<? //echo base_url() ?>#one" class="page-scroll">Workshop</a></li>-->
<!--        <li><a href="<? //echo base_url() ?>#venue" class="page-scroll">Venue</a></li>-->
        <!--<li><a href="<? //echo base_url() ?>#three" class="page-scroll">Guests</a></li>-->
        <li><a href="<? echo base_url('home/about') ?>" class="page-scroll">About IAE</a>
		    <!--<ul class="dropdown-menu">
			  <li><a href="<? //echo base_url('home/advisors') ?>" class="">Advisors</a></li>
			  <li><a href="<? //echo base_url('home/team') ?>" class="">Team</a></li>
			  <li><a href="<? //echo base_url('home/experts') ?>" class="">Experts</a></li>
			  <li><a href="<? //echo base_url('home/field_expert') ?>" class="">Field Experts</a></li>
			</ul>-->
		</li>
<!--		<li><a href="<? echo base_url('home/experts') ?>" class="page-scroll">Experts</a></li>-->
       <li class="dropdown"><a class="dropdown-toggle12" data-toggle="dropdown" href="#">NAAC Workshop <span class="caret"></span></a>
        	<ul class="dropdown-menu">
        	<?  $naacs = $d->db->order_by("id","desc")->get_where("tbl_schedule_dates",["event_type"=>"NAAC","status"=>"Active"])->result(); 
				if(count($naacs) > 0){ 
					foreach($naacs as $naa){
			?> 
						<li><a href="<? echo base_url('home/naac/').$naa->id ?>">NAAC <? echo $naa->year ?></a></li>
       		<? }} ?>
       	
        	</ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle12" data-toggle="dropdown" href="#">RIPF Symposium <span class="caret"></span></a>
        	<ul class="dropdown-menu">
        	<?  $ripfs = $d->db->order_by("id","desc")->get_where("tbl_schedule_dates",["event_type"=>"RIPF","status"=>"Active"])->result(); 
				if(count($ripfs) > 0){ 
					foreach($ripfs as $ri){
			?> 
						<li><a href="<? echo base_url('home/ripf/').$ri->id ?>">RIPF <? echo $ri->year ?></a></li>
       		<? }} ?>
       	
        	</ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle12" data-toggle="dropdown" href="#">NIRF Workshop <span class="caret"></span></a>
        	<ul class="dropdown-menu">
        	<?  $years = $d->db->order_by("id","desc")->get_where("tbl_schedule_dates",["event_type"=>"NIRF","status"=>"Active"])->result(); 
				if(count($years) > 0){ 
					foreach($years as $year){
			?> 
						<li><a href="<? echo base_url('home/nirf/').$year->id ?>">NIRF <? echo $year->year ?></a></li>
       		<? }} ?>
       	
        	</ul>
        </li>
        
        <!--<li><a href="#" class="page-scroll">Workshop</a>
        	<ul class="dropdown-menu">
        	<? //$ne = $d->db->order_by("id","desc")->get_where("tbl_schedule_dates",["event_type"=>"NAAC","status"=>"Active"])->row(); 
				/*if(count($nevents) > 0){ 
					foreach($nevents as $ne){*/
			?> 
						<li><a href="<? //echo base_url('home/register/').str_replace(" ","-",$ne->event_name)."~".$ne->id ?>">NAAC <? //echo $ne->year ?></a></li>
       		<? //}} ?>
       	
        	</ul>
        </li>-->
        <li><a href="<? echo base_url('home/services') ?>" class="page-scroll">Services</a></li>
        <!--<li><a href="<? //echo base_url('home/speakers') ?>" class="page-scroll">Speakers</a></li>-->
        <li><a href="<? echo base_url('home/gallery') ?>" class="page-scroll">Gallery</a></li>
        <li><a href="<? echo base_url('home/downloads_event') ?>">Download </a>
             <? //$downloads = $d->db->order_by("id","desc")->group_by("year")->get_where("tbl_downloads")->result(); 
				//if(count($downloads) > 0){ ?> 
			 <!--<ul class="dropdown-menu">
				  <?  
				 	 //foreach($downloads as $dw){
				  ?>
	                  <li><a href="<? echo base_url('home/downloads/').$dw->year ?>"><strong>NIRF <? echo $dw->year ?> Workshop Downloads</strong></a></li>
	              <? //} ?>    
			</ul>-->
			<? //} ?>		  
		</li>
		  <!--<li>
             <a href="#" class="page-scroll">Registration</a> 
			 <ul class="dropdown-menu">
				  <li><a href="<? //echo base_url('home/register') ?>"><strong>Online Registration</strong></a></li>
				  <li><a href="<? //echo base_url('assets/workshop_Registration_Form.pdf') ?>" download><strong>Offline Registration</strong></a></li>
			</ul>		  
		</li>-->
       
<!--        <li><a href="<? //echo base_url() ?>#seven" class="page-scroll">Gallery</a></li>-->
<!--        <li><a href="<? echo base_url() ?>#eight" class="page-scroll">Contact</a></li>-->
<!--        <li><a href="<? //echo base_url('webinar') ?>" class="page-scroll">Join Webinar</a></li>-->
        
        <? if($d->session->userdata("name") && !empty($d->session->userdata("name"))){ ?>
       		<li>
           <a href="<? echo base_url('webinar/logout') ?>" class="page-scroll">Logout</a>
		  </li>
				<!-- <a href="#" class="page-scroll">Profile</a>  -->
       <?php }else{ ?>
        	<li><a href="<? echo base_url('webinar') ?>" class="page-scroll">Login</a></li>
        <? } ?>
        
        <? //if(!$d->session->userdata("name")){ ?>
        	
        	<li class="dropdown"><a class="dropdown-toggle12" data-toggle="dropdown" href="#">Register Now <span class="caret"></span></a> 
				<ul class="dropdown-menu">
					<li><a href="<? echo base_url('home/register/').str_replace(" ","-",$naacs[0]->event_name)."~".$naacs[0]->id ?>" class="page-scroll">NAAC Workshop</a></li> 
					<li><a href="<? echo base_url('home/register/').str_replace(" ","-",$ripfs[0]->event_name)."~".$ripfs[0]->id ?>" class="page-scroll">RIPF Symposium</a></li> 
				</ul>		  
			</li>
       
        <? //} ?>		
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>