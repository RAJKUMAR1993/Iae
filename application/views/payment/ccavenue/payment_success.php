<? front_header(); 

$rdata = $this->db->get_where("tbl_registrations",["id"=>$this->session->userdata("id")])->row();
?>


 <section class="white-background black" id="inpage">
	<div class="container" style="height: 300px">
    	<div class="row">
    		
    		<div class="col-md-4"></div>
			
   			<div class="col-md-4" style="margin-top: 80px" align="center">
<!--   				<img src="<? echo base_url('assets/images/check.png') ?>" width="40%"><br><br>-->
   				<i class="fa fa-check-circle" style="color: green; font-size: 100px"></i><br><br>
   				<p style="text-align: center">Your payment has been successfully done.</p><br>
   				
   				<a href="<? echo base_url('add-participants/').$rdata->event_name ?>" class="btn btn-primary" style="border-radius: 10px;">Add Participants</a>
   			</div>
   			
   			<div class="col-md-4"></div>
    	
		</div>
	</div>
</section>	

<? front_footer() ?>