<?  front_header() ?>
  
  <!-- [/NAV]
 ============================================================================================================================--> 
  
  <!-- [/MAIN-HEADING]
 ============================================================================================================================-->
  <section class="main-heading" id="home">
 	
 	 <div class="baner"><img src="<? echo base_url('assets/') ?>images/inbanner.jpg" class="img-responsive">
	  	</div> 
	  

  </section>
  
  <!-- [/MAIN-HEADING]
 ============================================================================================================================--> 
  
  <!-- [ABOUT US]
 ============================================================================================================================-->
  <section class="white-background black" id="inpage">
    <div class="container">
      <div class="row">
<!--        <div class="col-md-12 black">-->
			<h3 class="title"> Speakers  </h3>
				
			<? 
			
				foreach($pdata as $sp){
					
			?>
					<a href="<? echo base_url('speaker/').$sp->route ?>">
						<div class="col-md-3">
							<div class="text-center" style="margin-bottom: 10px">
								<div>
									<img class="img-responsive" src="<? echo base_url().$sp->image ?>">
								</div>
								<div class="tbox">
									<h4 style="color: white"><strong><? echo $sp->sname ?></strong></h4>
<!--									<p style="color: white; font-size: 14px"><? //echo $sp->designation ?>-->
									</p>
								</div>
							</div>
						</div>
					</a>
			<? } ?>	

<!--        </div>-->
      </div>
      <div class="gap"> </div>
      
      <!-- /row --> 
      
    </div>
  </section>
  


<!-- [FOOTER]
 ============================================================================================================================-->
<div class="clearfix"></div>

<? front_footer() ?>
