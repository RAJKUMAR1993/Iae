
	<?php $this->load->view("admin/back_common/header"); ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark"><? echo isset($nirf->id) ? 'Update' : 'Add' ?>NIRF</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li><a href="<?php echo base_url() ?>admin/schedule/new_events_nirf">Nirf</a></li>
				<li class="active"><span><? echo isset($nirf->id) ? 'Update' : 'Add' ?> Nirf </span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>	
			<?php //print_r($nirf);  ?>
			<!-- Row -->
				<div class="row">
               		<div class="col-lg-12 col-xs-12" >
						<div class="panel panel-default card-view">
						
							<div class="panel-wrapper collapse in">
						        
						        <div class="container">
						        
						         <form method="post" action="<? echo base_url('admin/schedule/insert_nirf') ?>" enctype="multipart/form-data">
								  <div class="form-content">
								   <? echo $this->session->flashdata("emsg") ?>

								   <div id="error"></div>

									  <div class="col-md-6">
									  	<label>Workshop Overview</label>
										<div class="form-group">
										  <textarea rows="4" cols="50" class="form-control desc" id="desc" name="workshop_overview" placeholder="workshop" autocomplete="off"><? echo isset($nirf->workshop) ? $nirf->workshop : '' ?></textarea>
										</div>
									  </div>
                                      
									  <div class="col-md-6">
									  	<label>Objective</label>
										<div class="form-group">
										  <textarea rows="4" cols="50" class="form-control desc" id="desc" name="objective" placeholder="objective" autocomplete="off"><? echo isset($nirf->objectives) ? $nirf->objectives : '' ?></textarea>
										</div>
									  </div>
									  	  <div class="col-md-6">
									  	<label>Expected Outcome</label>
										<div class="form-group">
										  <textarea rows="4" cols="50" class="form-control desc" id="desc" name="expected" placeholder="Expected Outcome" autocomplete="off"><? echo isset($nirf->expected_outcome) ? $nirf->expected_outcome : '' ?></textarea>
										</div>
									  </div>
									  	  <div class="col-md-6">
									  	<label>Why Participate</label>
										<div class="form-group">
										  <textarea rows="4" cols="50" class="form-control desc" id="desc" name="why_particiption" placeholder="Profile" autocomplete="off"><? echo isset($nirf->why_participate) ? $nirf->why_participate : '' ?></textarea>
										</div>
									  </div>
									
									  <div class="col-md-6">
									  	<label>Description</label>
										<div class="form-group">
										  <textarea rows="4" cols="50" class="form-control desc " id="desc" name="description" placeholder="Profile" autocomplete="off"><? echo isset($nirf->description) ? $nirf->description : '' ?></textarea>
										</div>
									  </div>
									    <div class="col-md-6">
											 <label>Event</label>
											 <select class="form-control js-select2  changeYear" name="event_id"  required>
							                  <option value="">Select Event</option>
							                   <? $event_name = $this->db->order_by("id","desc")->get(" tbl_schedule_dates")->result();
							                    foreach($event_name as $event){ ?>
							                        <option <?php if($event->id == $nirf->event_id){ echo 'selected';}?>  value="<?php echo $event->id;?>"><?php echo $event->event_name;?></option>
							                    <? } ?>
							                </select>
									  </div>
									  <div class="clearfix"></div>
									  <div class="col-md-12" style="padding-bottom: 20px">
									  	<input type="hidden" name="id" value="<? echo isset($nirf->id) ? $nirf->id : '' ?>">
									  	<button type="submit" class="btn btn-success btnSubmit pull-right"><? echo isset($nirf->id) ? 'Update' : 'Submit' ?></button>
									  </div>	
								  </div>

									
									<div class="clearfix"></div>
								  </div>



								  </form>
						         
						        </div>
						         
							</div>
						</div>
							
					</div>
				<!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>
<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>


<script type="text/javascript">

$(".desc").summernote({
	
	height : 200,
	toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ]
});

$("#formdata").on("submit",function(e){
		
		e.preventDefault();
		
		var data = $("#formdata").serialize();
		
		$.ajax({
			
			"type" : "post",
			data : data,
			url : "<? echo base_url('admin/speakers/insertData') ?>",
			success : function(data){
				console.log(data);
				
				if(data == "success"){
					
					location.reload();
					
				}else{
					
					$("#error").html(data);
					return false;
					
				}
				
				
			},
			error : function(data){
				
				console.log(data);
				
			}
			
		});
		
	});

</script>











