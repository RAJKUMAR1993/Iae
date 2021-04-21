	<?php $this->load->view("admin/back_common/header"); ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">List of Testimonials</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span>Testimonials </span></li>
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
								      <a href="<? echo base_url('admin/users/add_edit_testimonials') ?>" class="btn btn-primary">Add Testimonials</a>
								   </div>
								</div> 
						         
						         
							
								<div class="table-responsive" style="padding:20px;">
									
										<table class="table table-hover display  pb-30" id="myTable">
											<thead>
												<th>S.no</th>
												<th>Name</th>
												<th>Designation</th>
												<th>Photo </th>
												<th>Testimony Description</th>
												<th>Sorting Order</th>
												<th>Action</th>
											</thead>
											<tbody>
											<?
												$key = 1;
					   
												foreach ($pdata as $row) {
													
													
											?>
												<tr>
													<td><? echo $key;?></td>
													<td><? echo $row->name;?></td>
													<td><? echo $row->designation;?></td>
													<td><img src="<?php echo base_url(); ?><? echo $row->photo;?>" width="100px" height="80px" alt="No Image Uploaded"></td>
													<td><? echo $row->description;?></td>
													<td><? echo $row->sorting_order;?></td>
													<td><a href="<? echo base_url("admin/users/add_edit_testimonials/").$row->testimony_id?>"><i class="fa fa-edit"></i>
													<a href="<?php echo base_url("admin/users/del_new_test/").$row->testimony_id ?>" data-toggle="tooltip" data-original-title="Delete" onClick="return confirm('Are you sure want to delete')"><i class="fa fa-trash" aria-hidden="true"></a></td>
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

<script>
	$("#myTable").dataTable();
</script>











