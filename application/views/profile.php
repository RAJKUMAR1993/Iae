<?  front_header(); 

?>
  
 <style>
	.modal-body .col-md-3 {
    position: relative;
    min-height: 1px;
    padding-right: 0px;
    padding-left: 0px;
}
		
		.modal-content h4 {
    text-align: left;
    font-size: 20px;
    color: #fff;
			padding-top:20px;
}
		.modal-content h5 {
    text-align: left;
    font-size: 17px;
    color: #97a3ab;
}
		.modal-content p {
    text-align: left;
    font-size: 14px;
    color: #fff !important;
    padding-bottom: 20px;
}
		.modal-body {
    position: static;
    padding: 0px;
    display: -webkit-flex;
    display: flex;
}
	.modal-content {
    position: relative;
    background: rgb(18, 54, 81);
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #6c7275;
    /* border: 1px solid rgba(0,0,0,.8); */
    border-radius: 0px;
    outline: 0;
    -webkit-box-shadow: 0 3px 9px rgba(0,0,0,.5);
    box-shadow: 0 3px 9px rgba(0,0,0,.5);
}
		.connect {
    margin-top: 20px;
    text-align: center;
}
		.connect a {
    color: #97a3ab;
    text-align: center;
    padding: 5px 15px;
    border: solid 1px #97a3ab;
}
	</style>
  
    <!-- [/NAV]
 ============================================================================================================================--> 
  
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
      <div class="row">
<!--
		<div class="col-md-12  black ">

			<div class="modal-content">
				<div class="modal-body">
					<div class="col-md-3 col-xs-12 hidden-xs" style="background-color:#3a454b;">
						<div class="pbg"><img src="<? //echo base_url().$p->image ?>" class="img-responsive" alt="Dr. Saket Asthana" title="Dr. Saket Asthana">

						</div>
					</div>
					<div class="col-md-9  col-xs-12">
						<h4><? //echo $p->sname ?></h4>
						<h5><? //echo $p->designation ?></h5>
						<p style="text-align: justify;">
							<? //echo $p->description ?>
						</p>
					</div>
					<div class="clearfix"></div>

				</div>

			</div>

		</div>
-->
    
    	<div class="col-md-3 col-xs-12 hidden-xs" style="margin-bottom: 15px">
			<img src="<? echo base_url().$p->image ?>" class="img-responsive" alt="Dr. Saket Asthana" title="Dr. Saket Asthana">

		</div>
		<div class="col-md-9  col-xs-12">
			<h3><strong><? echo $p->sname ?></strong></h3>
			<h5><? echo $p->designation ?></h5>
			
		</div>
   	</div>	
    	
    <div class="row">	
     	<div class="col-md-12  col-xs-12">
			<p style="text-align: justify;">
				<? echo $p->description ?>
			</p>
			
		</div>
    </div>
    	
    <div align="center" style="margin-top: 15px">		  
     	
     	<a class="btn btn-info" style="text-align: center" href="<? echo base_url('home/speakers/').$this->uri->segment(3) ?>"> <i class="fa fa-chevron-left"></i> Back to speakers</a>
     
    </div>
      <div class="gap"> </div>
      
      <!-- /row --> 
      
    </div>
  </section>
  
 
<div class="clearfix"></div>

<? front_footer() ?>
