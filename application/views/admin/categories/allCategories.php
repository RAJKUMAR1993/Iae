	<?php $this->load->view("admin/back_common/header"); ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">List of Categories</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span>Categories List</span></li>
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
									<div class="col-md-12" style="padding: 5px 0px 0px 20px">
										<a href="<? echo base_url('admin/Categories/category') ?>" class="btn btn-primary">Add</a>
									</div>
								</div>    
						         
							
								<div class="table-responsive" style="padding:20px;">
									
										<table class="table table-hover display pb-30" id="myTable">
											<thead>
											
												<th>S.no</th>
												<th>Category</th>
												<th>Status</th>
												<th>Action</th>
												
											</thead>
											<tbody>
											<?
												$key = 1;
												foreach ($alist as $row) {
											?>
												<tr>
													<td><? echo $key; ?></td>
													<td><? echo $row->category; ?></td>
													<td><? echo ($row->status == 'Active') ? '<label class="badge badge-success">Active</label>' : '<label class="badge badge-danger">Inctive</label>'; ?></td>
													<td>
													    <a href="<?php echo base_url("admin/users?category=").$row->category;?>" ><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
														<a href="<? echo base_url("admin/Categories/category/").$row->id?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
														<a href="<? echo base_url("admin/Categories/delCategory/").$row->id?>" onclick="return confirm('Are you sure want to delete.')"><i class="fa fa-trash"></i></a>

													</td>
												</tr>
												
											<? 
											   $key++;
											   } 
											?>
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
} );
</script>











