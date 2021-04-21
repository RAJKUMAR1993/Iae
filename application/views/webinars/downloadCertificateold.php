<? front_header() ?>

  <section class="main-heading" id="home">
 	<div class="baner"> <!--<img src="<? echo base_url('assets/') ?>images/inbanner.jpg" class="img-responsive">--></div> 
  </section>
  
<section class="our-team1 white-background black" id="three" style="margin-top: 80px;">
  
	<!--<section class="our-stats" id="five" style="background-color: transparent !important; margin-bottom: 20px">
		<div class="container" align="center" style="height: 200px">
			<p style="font-size: 24px; font-weight: 700;">Participation Certificate will be available soon, please check back here.</p><br>
			<a class="btn btn-primary" href="<? echo base_url('webinar/joinevent') ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
</a>
		</div>
		
	</section>-->
   
</section>
  
 <? front_footer() ?>
 
<script type="text/javascript">

	$(".join").click(function(){
		
		var schedule_id = $(this).attr("schedule_id");
		
		$.ajax({
			
			type : "post",
			url : "<? echo base_url('webinar/storeJoindata') ?>",
			data : {schedule_id : schedule_id},
			success : function(data){
				
				console.log(data)
				
			}
			
		})
		
		
	})

</script>

