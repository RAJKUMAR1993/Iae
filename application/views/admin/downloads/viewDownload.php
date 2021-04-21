<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    border-radius: 0;
    color: #887a7a !important;
    padding: 8px 10px;
    margin-bottom: 10px;
    margin-right: 5px;
    display: inline-block;
    text-align: center;
    vertical-align: baseline;
    white-space: nowrap;
    background: #76c880;
    border: none;
    line-height: 10px;
    font-size: 12px;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #e4e4e4;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 8px !important; 
}	

</style>	
	
	<?php $this->load->view("admin/back_common/header"); ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark"><? echo isset($s->id) ? 'Update' : 'Add' ?> Download</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li><a href="<?php echo base_url() ?>admin/downloads">Downloads</a></li>
				<li class="active"><span><? echo isset($s->id) ? 'Update' : 'Add' ?> Download </span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>	
			
			<!-- Row -->
				<div class="row">
               		<div class="col-lg-12 col-xs-12" >
						<div class="panel panel-default card-view">
						
							<div class="panel-wrapper collapse in">
						        
						        <div class="container">
						        
						         <form method="post" action="<? echo base_url('admin/Downloads/insertData') ?>" enctype="multipart/form-data">
								  <div class="form-content">
								   <? echo $this->session->flashdata("emsg") ?>

								   <div id="error"></div>

									  <div class="col-md-3">
									  	<label>Topic</label>
										<div class="form-group">
										  <input type="text" class="form-control" placeholder="Topic" value="<? echo isset($s->name) ? $s->name : '' ?>" name="name" required>
										</div>
									  </div>
								  	  
								  	  <div class="col-md-3">
									  	<label>Image</label>
										<div class="form-group">
										  <input type="file" accept="image/*" class="form-control" name="file">
<!--										  <small style="color: red">Note : Please select width 350px</small>-->
										</div>
									  </div>

								  	   <div class="col-md-3">
									  	<label>File</label>
										<div class="form-group">
										  <input type="file" class="form-control" name="image" <? echo isset($s->id) ? '' : 'required' ?>>
<!--										  <small style="color: red">Note : Please select width 350px</small>-->
										</div>
									  </div>
									  <div class="col-md-3">
									  	<label>Name & Designation</label>
										<div class="form-group">
										  <textarea class="form-control" placeholder="Name & Designation" name="ndesignation" required><? echo isset($s->ndesignation) ? $s->ndesignation : '' ?></textarea>
										</div>
									  </div>
									 
									  <div class="col-md-5">
									  	<label>Event</label>
										<div class="form-group">
										  <select class="form-control js-select2" name="event_id" required>
										  	<? $event_name = $this->db->order_by("id","desc")->get("tbl_schedule_dates")->result();
												foreach($event_name as $event){ ?>
													<option <?php if($event->id == $s->event_id){ echo 'selected';}?>  value="<?php echo $event->id;?>"><?php echo $event->event_name;?></option>
												<? } ?>
										  </select>
										</div>
									  </div>
									   
									   <div class="col-md-3">
									  	<label>Youtube Embed Link</label>
										<div class="form-group">
										  <input type="text" placeholder="Youtube Embed Link" class="form-control" name="youtube_link" value="<? echo isset($s->youtube_link) ? $s->youtube_link : '' ?>">
<!--										  <small style="color: red">Note : Please select width 350px</small>-->
										</div>
									  </div>
									  
									  <div class="clearfix"></div>
									  <div class="col-md-12" style="padding-bottom: 20px">
									  	<input type="hidden" name="id" value="<? echo isset($s->id) ? $s->id : '' ?>">
									  	<button type="submit" class="btn btn-success btnSubmit pull-right"><? echo isset($s->id) ? 'Update' : 'Submit' ?></button>
									  </div>	
								  </div>

									
									<div class="clearfix"></div>
								  </div>



								  </form>
					         
					         		
										<div class="row">
											<? if($s->file){ ?>
												<div class="col-md-4">
													<div style="padding:5px;background:#f1f1f1;width:100%;margin-bottom: 20px;">
														<iframe src="//docs.google.com/gview?url=<? echo base_url().$s->file ?>&embedded=true" width="100%"></iframe>
													</div>

												</div>
											<? } ?>
											
											<? if($s->image){ ?>
												<div class="col-md-4">
													<div style="padding:5px;background:#f1f1f1;width:100%;margin-bottom: 20px;">
														<img src="<? echo base_url().$s->image ?>" class="img-responsive img-thumbnail" width="100%">
													</div>
												</div>
											<? } ?>
										</div>
									 
						         
						        </div>
						        
						        
							</div>
						</div>
							
					</div>
				<!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" /> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>

<script type="text/javascript">
$(document).ready( function () {
    $('#myTable').DataTable();
	
	$(".js-select2").select2({
		closeOnSelect : false,
		placeholder : "Select Event",
		allowHtml: true,
		allowClear: true,
		tags: true
	});
	
});
	
$(".js-select2").val(["<? echo $s->event_id ?>"]).trigger('change');	
</script>


<script type="text/javascript">

$("#desc").summernote({
	
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











