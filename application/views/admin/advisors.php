	<?php $this->load->view("admin/back_common/header"); ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">List of Advisors</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span>Advisors </span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>	
			
			<!-- Row -->
				<div class="row">
               		<div class="col-lg-12 col-xs-12" >
						<div class="panel panel-default card-view pa-0">
						
							<div class="panel-wrapper collapse in">
						       <div class="row">
								   <div class="col-md-10">
								   </div>
								   <div class="col-md-2">
								      <a href="<? echo base_url('admin/users/add_edit_advisors') ?>" class="btn btn-primary">Add Advisors</a>
								   </div>
								</div> 
						         
						         
							
								<div  class="table-responsive" style="padding:20px;">
									
										<table class="table table-hover display  pb-30" id="myTable">
											<thead>
												<th>S.no</th>
												<th>Name</th>
												<th>Photo</th>
												<th>Qualification</th>
												<th>Designation</th>
												<th>Area of Expertise </th>
												<th>Years of Experience</th>
												<th>Sorting</th>
												<th>Actions</th>
												
											</thead>
											<tbody>
											<?
												$key = 1;
					   
												foreach ($pdata as $row) {
													
													
											?>
												<tr>
													<td><? echo $key;?></td>
													<td><? echo $row->name;?></td>
													
													<td><img src="<?php echo base_url(); ?><? echo $row->photo;?>" width="100px" height="80px" alt="No Image" ></td>
													<td><? echo $row->qualification;?></td>
													<td><? echo $row->designation;?></td>
													<td><? echo $row->area_of_expertise;?></td>
													<td><? echo $row->years_of_exp;?></td>
													<td><? echo $row->sorting_order;?></td>
													<td><a href="<? echo base_url("admin/users/add_edit_advisors/").$row->ad_id?>"><i class="fa fa-edit"></i></a>
													<a href="<?php echo base_url("admin/users/deladvisors/").$row->ad_id ?>" data-toggle="tooltip" data-original-title="Delete" onClick="return confirm('Are you sure want to delete')"><i class="fa fa-trash" aria-hidden="true"></a></td>
												</tr>
											<? $key++;}?>
											</tbody>
										</table>
									
									
								</div>
							</div>
						</div>
							
					</div>
				</div>


  <!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>
<script type="text/javascript">
$(document).ready( function () {
    $('#myTable').DataTable();
});
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
</script>












