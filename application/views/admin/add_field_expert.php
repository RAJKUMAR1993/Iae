	<?php $this->load->view("admin/back_common/header"); ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark"><? echo isset($s->f_id) ? 'Update' : 'Add' ?> Field Experts</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span><? echo isset($s->f_id) ? 'Update' : 'Add' ?> Field Experts </span></li>
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
						        
						         <form method="post" action="<? echo base_url('admin/users/insert_field_Data') ?>" enctype="multipart/form-data">
								  <div class="form-content">
								   <? echo $this->session->flashdata("emsg") ?>

								   <div id="error"></div>

									  <div class="col-md-3">
									  	<label>Name</label>
										<div class="form-group">
										  <input type="text" class="form-control" name="name" id="cname" placeholder="Enter Name" value="<? echo isset($s->name) ? $s->name : '' ?>" required>
										</div>
									  </div>
                                      <div class="col-md-3">
									  	<label>Qualification</label>
										<div class="form-group">
									  	  <input type="text" class="form-control" name="quali" value="<? echo isset($s->qualification) ? $s->qualification : '' ?>"  placeholder="Enter Qualification">
										</div>
									  </div>
								  	  
									  <div class="col-md-3">
									  	<label>Area of Expertise</label>
										<div class="form-group">
										  <input type="text" class="form-control" name="area_of_exp" value="<? echo isset($s->area_of_expertise) ? $s->area_of_expertise : '' ?>"  placeholder="Enter Area of Expertise">
										</div>
									  </div>
									  <div class="col-md-3">
									  	<label>Years of Experience</label>
										<div class="form-group">
										  <input type="text" class="form-control" name="yrs_of_exp" value="<? echo isset($s->years_of_exp	) ? $s->years_of_exp	 : '' ?>"  placeholder="Enter Years of Experience" >
										</div>
									  </div>
									  <div class="col-md-3">
									  	<label>Photo of the Person</label>
										<div class="form-group">
										  <input type="file" class="form-control" name="image" <? echo isset($s->f_id) ? '' : 'required' ?>>
										</div>
									  </div>
									  <div class="col-md-3">
									  	<label>Designation</label>
										<div class="form-group">
										  <textarea class="form-control" rows="5" name="designation"><? echo isset($s->designation) ? $s->designation : '' ?></textarea>
										</div>
									  </div>
									  <div class="col-md-3">
									  	<label>Short Description</label>
										<div class="form-group">
										  <textarea class="form-control" rows="5" name="short_desc"><? echo isset($s->short_desc) ? $s->short_desc : '' ?></textarea>
										</div>
									  </div>
									  <div class="col-md-3">
									  	<label>Sorting Order</label>
										<div class="form-group">
										  <input type="text" class="form-control" name="sorting" placeholder="Enter Sorting Order" value="<? echo isset($s->sorting_order) ? $s->sorting_order : '' ?>">
										</div>
									  </div>
									  <div class="col-md-12">
									  	<label>Profile</label>
										<div class="form-group">
										  <textarea rows="4" cols="50" class="form-control" id="desc" name="profile" placeholder="Profile" autocomplete="off"><? echo isset($s->profile) ? $s->profile : '' ?></textarea>
										</div>
									  </div>
									  <div class="clearfix"></div>
									  <div class="col-md-12" style="padding-bottom: 20px">
									  	<input type="hidden" name="id" value="<? echo isset($s->f_id) ? $s->f_id : '' ?>">
									  	<button type="submit" class="btn btn-success btnSubmit pull-right"><? echo isset($s->f_id) ? 'Update' : 'Submit' ?></button>
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











