	<?php $this->load->view("admin/back_common/header"); ?>
	<link href='http://localhost/freedombank_final/admin/assets/css/dragula.css' rel='stylesheet' type='text/css' />
	<link href='http://localhost/freedombank_final/admin/assets/css/example.css' rel='stylesheet' type='text/css' />
	
<style type="text/css">

	.page-wrapper{
		
		width: 225%;
		
	}

</style>
	
	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">Reorder Speaker</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li><a href="<?php echo base_url() ?>admin/speakers">Speakers</a></li>
				<li class="active"><span>Reorder Speaker </span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>	
			
			<!-- Row -->
				<div class="row">
               		<div class="col-md-12 col-xs-12" >
						<div class="panel panel-default card-view">
						
							<div class="panel-wrapper collapse in">
						        
						        <div class="row">
						        
									<div class="col-md-6">
										<form method="post" action="<?php echo base_url() ?>admin/speakers/insertOrder">
											<div id='left-events' class='row_drag'>

												<?php


												if ( count( $alist ) > 0 ) {

													foreach (json_decode($alist->speakers_order) as $a ) {

														$s = $this->db->get_where("tbl_speakers",array("id"=>$a))->row();	
														
														?>

												<div>
													<p style="color: white; text-align: center">
														<?php echo $s->sname ?>
													</p>
													<input type="hidden" name="s_ids[]" value="<?php echo $a ?>">
												</div>
												<?php 
													}
												}
					   							$speakers = $this->db->get_where("tbl_speakers",["deleted"=>0])->result();
					   							foreach($speakers as $sp){
													
													if(!in_array($sp->id,json_decode($alist->speakers_order))){
										   ?>
												<div>
													<p style="color: white; text-align: center">
														<?php echo $sp->sname ?>
													</p>
													<input type="hidden" name="s_ids[]" value="<?php echo $sp->id ?>">
												</div>
										
											<? }} ?>
										
											</div>
											<div class="form-group" style="margin-top: 20px;">

												<button class="btn btn-primary" type="submit">Submit</button>
											</div>
										</form>

									</div>
						         
						        </div>
						         
							</div>
						</div>
							
					</div>
				</div>
				<!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>


	<script src="http://localhost/freedombank_final/admin/assets/js/dragula.js"></script>
	<script src="http://localhost/freedombank_final/admin/assets/js/example.min.js"></script>


<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>


<script type="text/javascript">

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);

}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}
</script>











