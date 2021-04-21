<? front_header() ?>

<link rel="stylesheet" href="<?php echo base_url("assets/dist/css/lightgallery.css") ?>">

 <style>
#gallery .col-md-4, .col-md-3 {
  padding: 2px !important;
}
.slick-track p {
  background: #000;
  color: #fff;
  text-align: center;
  display: block;
  font-size: 17px;
  padding: 5px;
}
.gal-item .box {
  height: 240px;
  overflow: hidden;
}
.box img {
  height: 100%;
  width: 100%;
  object-fit: cover;
  -o-object-fit: cover;
}
.gal-item a:focus {
  outline: none;
}
.gal-item a:after {
  content: "\e003";
  font-family: 'Glyphicons Halflings';
  opacity: 0;
  background-color: rgba(0, 0, 0, 0.75);
  position: absolute;
  right: 2px;
  left: 2px;
  top: 2px;
  bottom: 2px;
  text-align: center;
  line-height: 240px;
  font-size: 30px;
  color: #fff;
  -webkit-transition: all 0.5s ease-in-out 0s;
  -moz-transition: all 0.5s ease-in-out 0s;
  transition: all 0.5s ease-in-out 0s;
}
.gal-item a:hover:after {
  opacity: 1;
}
.modal-open .gal-container .modal {
  background-color: rgba(0, 0, 0, 0.4);
}
.modal-open .gal-item .modal-body {
  padding: 0px;
}
.modal-open .gal-item button.close {
  position: absolute;
  width: 25px;
  height: 25px;
  background-color: #000;
  opacity: 1;
  color: #fff;
  z-index: 999;
  right: -12px;
  top: -12px;
  border-radius: 50%;
  font-size: 15px;
  border: 2px solid #fff;
  line-height: 25px;
  -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.35);
  box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.35);
}
.modal-open .gal-item button.close:focus {
  outline: none;
}
.modal-open .gal-item button.close span {
  position: relative;
  top: -3px;
  font-weight: lighter;
  text-shadow: none;
}
.gal-container .modal-dialogue {
  width: 80%;
}
.gal-container .description {
  position: relative;
  height: 40px;
  top: -40px;
  padding: 10px 25px;
  r /*background-color: rgba(0,0,0,0.5);*/
  color: #fff;
  text-align: left;
}
.gal-container .description h4 {
  margin: 0px;
  font-size: 15px;
  font-weight: 300;
  line-height: 20px;
}
.gal-container .modal.fade .modal-dialog {
  -webkit-transform: scale(0.1);
  -moz-transform: scale(0.1);
  -ms-transform: scale(0.1);
  transform: scale(0.1);
  top: 100px;
  opacity: 0;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
}
.gal-container .modal.fade.in .modal-dialog {
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
  -webkit-transform: translate3d(0, -100px, 0);
  transform: translate3d(0, -100px, 0);
  opacity: 1;
}
@media (min-width: 768px) {
  .gal-container .modal-dialog {
    width: 55%;
    margin: 50 auto;
  }
}
@media (max-width: 768px) {
  .gal-container .modal-content {
    height: 250px;
  }
}


#filters {
    margin: 0;
    text-align: center;
    width: 100%;
    opacity: 1;
    max-height: 200px;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
#filters li {
  margin-right: 5px;
  margin-bottom: 10px; 
  display: inline-block;	
}
 #filters li a {
    background: #f7f7f9 none repeat scroll 0 0;
    border-radius: 60px;
    color: #878787;
    display: inline-block;
    padding: 10px 20px;
    text-transform: capitalize;
    font-size: 14px; 
}
	
#filters li a.active, #filters li a:active, #filters li a:hover, #filters li a:focus {
      background: #76c880;
      color: #fff; 
}

li{

	list-style: none;	
}	
	
#filters:last-child {
  margin-right: 0; 
}

a{

	text-decoration: none !important;

}
	 
.overlay {
      position: absolute;
    top: -2px;
    left: 7px;
    width: 95%;
    height: 67%;
    background: rgba(0, 0, 0, 0);
    transition: background 0.5s ease;
}

.image:hover .overlay {
  display: block;
  background: rgba(0, 0, 0, .3);
}
.button {
position: absolute;
    width: 120px;
    left: 85px;
    top: 50px;
    text-align: center;
    opacity: 0;
    transition: opacity .35s ease;
	border-radius: 20px;
}
	
.button1 {
position: absolute;
    width: 120px;
    left: 85px;
    top: 100px;
    text-align: center;
    opacity: 0;
	border-radius: 20px;
    transition: opacity .35s ease;
}	 
.image:hover .button {
  opacity: 1;
}
.image:hover .button1 {
  opacity: 1;
}	 
	 
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
<section class="cast text-center">

  <section id="gallery">
    <div class="container gal-container center-block text-center">
      <div class="clearfix"></div>
	  <div class="panel-body">
	  
	  <h3 class="title"> Gallery  </h3>
				
				<?php		
								
					$gall1 = $this->db->group_by("gallery_title")->where("deleted",0)->get("tbl_gallery")->result(); 

					$i1 = 0;

					if(count($gall1) > 0){	

				?>	
				

				<div class="gallery-wrap">

					<div class="portfolio-wrap project-gallery">
					
						
						
						<div class="row">
						<?php 

						foreach($gall1 as $gg1){

						?>
							<div class="col-lg-3 col-12">
								<div class="card">
									<div class="image"> 
									
										<img src="<?php echo base_url().$gg1->coverImage ?>" class="img-fluid" style="width: 100%">

<!--										<div class="overlay"></div>-->
										<div class="button btn btn-default"><a href="<? echo base_url('home/galleryImages/').$gg1->route ?>"> Images </a></div>
										<div class="button1 btn btn-default"><a href="<? echo base_url('home/galleryVideos/').$gg1->route ?>"> Videos </a></div>
									</div>
									<div class="card-body">
										<h5 class="card-title" style="font-size: 20px; padding-top: 10px"><? echo $gg1->gallery_title ?></h5>
									</div>
								</div>

							</div>
							
						<?php 
						$i1++;
						} ?>
							
						</div>
						

					</div>

				</div>
				
				<?php
					}else{

						echo '<h4 align="center" style="color:black;margin-bottom:20px">No Images Found</h4>';

					}			

					?>
					
				<br>	
					
				<div class="row">
				
					<? $rimages = $this->db->limit(12)->order_by("id","random")->get_where("tbl_gallery",["type"=>"image","deleted"=>0])->result();
						foreach($rimages as $ri){	?>
					
					<div class="col-lg-3 col-12">
						<div class="card" style="margin-bottom: 10px">
							<div class="image"> 
								<img src="<?php echo base_url().$ri->images ?>" class="img-fluid img-thumbnail" style="width: 100%; height: 180px !important">
							</div>			
						</div>

					</div>
					<? }?>
				</div>	
				
			</div>
    </div>

  </section>
</section>
      
      <!-- /row --> 
      
    </div>
  </section>

 <? front_footer() ?>
 
<script src="<?php echo base_url("assets/") ?>dist/js/lightgallery-all.js"></script>
<script src="<?php echo base_url("assets/") ?>dist/js/froogaloop2.min.js"></script>
<script src="<?php echo base_url("assets/") ?>dist/js/isotope.js"></script>
<script src="<?php echo base_url("assets/") ?>dist/js/front-gallery-data.js"></script>