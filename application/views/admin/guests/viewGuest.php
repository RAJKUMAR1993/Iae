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
			<h5 class="txt-dark"><? echo isset($s->id) ? 'Update' : 'Add' ?> Guest</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li><a href="<?php echo base_url() ?>admin/guests">Guests</a></li>
				<li class="active"><span><? echo isset($s->id) ? 'Update' : 'Add' ?> Guest </span></li>
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
						        
						         <form method="post" action="<? echo base_url('admin/guests/insertData') ?>" enctype="multipart/form-data">
								  <div class="form-content">
								   <? echo $this->session->flashdata("emsg") ?>

								   <div id="error"></div>

									  <div class="col-md-4">
									  	<label>Name</label>
										<div class="form-group">
										  <input type="text" class="form-control" placeholder="Name of the Guest" value="<? echo isset($s->sname) ? $s->sname : '' ?>" name="sname" required>
										</div>
									  </div>

								  	   <div class="col-md-4">
									  	<label>Image</label>
										<div class="form-group">
										  <input type="file" class="form-control" name="image" <? echo isset($s->id) ? '' : 'required' ?>>
										  <small style="color: red">Note : Please select width 350px</small>
										</div>
									  </div>
									  
									  <div class="col-md-4">
									  	<label>Designation</label>
										<div class="form-group">
										  <textarea rows="4" cols="50" class="form-control" id="" name="designation" placeholder="Designation" autocomplete="off" required><? echo isset($s->designation) ? $s->designation : '' ?></textarea>
										</div>
									  </div>
									  
									  <div class="col-md-7">
									  	<label>Event</label>
										<div class="form-group">
										  	<select class="form-control js-select2" name="event_id[]" multiple required>
											  <option value="">Select Event</option>
											   <? $event_name = $this->db->order_by("id","desc")->get("tbl_schedule_dates")->result();
												foreach($event_name as $event){ ?>
													<option <?php if($event->id == $nirf->event_id){ echo 'selected';}?>  value="<?php echo $event->id;?>"><?php echo $event->event_name;?></option>
												<? } ?>
											</select>
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
	
$(".js-select2").val(<? echo $s->event_id ?>).trigger('change');	
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











