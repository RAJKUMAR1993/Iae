<?php $this->load->view("admin/back_common/header"); 
$getyear = $this->input->get("year");
?>



	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">List of Topics/Categories</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span>Topics/Categories</span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
	</div>	
			
			<!-- Row -->
				<div class="row">
               		<div class="col-lg-12 col-xs-12" >
               		   <ul class="nav nav-tabs" role="tablist">
						  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><span>Topics</span></a></li>
						  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><span>Categories</span></a></li>
						</ul>
               			<div class="tab-content">
               			
							<div role="tabpanel" class="tab-pane active" id="home">
								<div class="panel panel-default card-view pa-0">
									<form method="post" action="<? echo base_url('admin/ripf/insertTopic') ?>">
										<div class="panel panel-default">	
											<div class="panel-heading">Create Topic</div>
											<div class="panel-body">
												<div class="row" style="padding: 10px;">
													<div class="col-md-3">
														<div class="form-group">
															<select class="form-control" name="ripf_category" required>
																<option value="">Select Category</option>
																<?
																	foreach($rcategories as $rcp){
																		echo '<option value="'.$rcp->id.'">'.$rcp->category_name.'</option>';
																	}
																?>
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<input type="text" class="form-control" name="topic_name" placeholder="Topic Name" required>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<input type="number" class="form-control" name="amount" placeholder="Amount" required>
														</div>
													</div>
													<div>
														<div class="form-group">
															<button type="submit" class="btn btn-primary">Submit</button>
														</div>
													</div>
												</div>
											</div>
										</div>	
										
									</form>
									<div class="panel-wrapper collapse in">
									
										<div class="table-responsive" style="padding:20px;">
											<table class="table table-hover display  pb-30" id="myTable1">
												<thead>
													<th>S.no</th>
													<th>Category</th>
													<th>Topic Name</th>
													<th>Amount</th>
													<th>Action</th>
												</thead>
												<tbody>
												<?
													$key1 = 1;
													foreach ($rtopics as $drow) {

												?>
													<tr>

														<td><? echo $key1; ?></td>
														<td><? echo $this->db->get_where("tbl_ripf_categories",["id"=>$drow->ripf_category])->row()->category_name; ?></td>
														<td><? echo $drow->topic_name; ?></td>
														<td><i class="fa fa-rupee"></i> <? echo $drow->amount; ?></td>
														<td>
															<a href="javascript:void(0)" class="updateTopic" ripf_category="<? echo $drow->ripf_category ?>" topic_name="<? echo $drow->topic_name ?>" amount="<? echo $drow->amount ?>" sid="<? echo $drow->id ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
															<a href="<?php echo base_url("admin/ripf/delTopic/").$drow->id ?>" data-toggle="tooltip" data-original-title="Delete" onClick="return confirm('Are you sure want to delete')"><i class="fa fa-trash" aria-hidden="true"></i></a>
														</td>

													</tr>
												<? $key1++;}?>
												</tbody>

											</table>

										</div>
									</div>
								</div>

							</div>

							<div role="tabpanel" class="tab-pane" id="profile">
								<div class="panel panel-default card-view pa-0">
									<form method="post" action="<? echo base_url('admin/ripf/insertCategory') ?>">
										<div class="panel panel-default">	
											<div class="panel-heading">Create Category</div>
											<div class="panel-body">
												<div class="row" style="padding: 10px;">
													<div class="col-md-3">
														<div class="form-group">
															<input type="text" class="form-control" name="category_name" placeholder="Category Name" required>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<input type="number" class="form-control" name="overall_discount_amount" placeholder="Overall Discount Amount" required>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<input type="number" class="form-control" name="members_count" placeholder="Members Count" required>
														</div>
													</div>
													<div>
														<div class="form-group">
															<button type="submit" class="btn btn-primary">Submit</button>
														</div>
													</div>
												</div>
											</div>
										</div>	
										
									</form>
									<div class="panel-wrapper collapse in">
										<div class="table-responsive" style="padding:20px;">
											<table class="table table-hover display pb-30" id="myTable">
												<thead>
													<th>S.no</th>
													<th>Category Name</th>
													<th>Amount after Discount</th>
													<th>Members</th>
													<th>Action</th>
												</thead>
												<tbody>
												<?
													$key = 1;
													foreach ($rcategories as $rc) {

												?>
													<tr>

														<td><? echo $key; ?></td>
														<td><? echo $rc->category_name; ?></td>
														<td><i class="fa fa-rupee"></i> <? echo $rc->overall_discount_amount; ?></td>
														<td><? echo $rc->members_count; ?></td>
														<td>
															<a href="javascript:void(0)" class="updateCategory" category_name="<? echo $rc->category_name ?>" overall_discount_amount="<? echo $rc->overall_discount_amount ?>" members_count="<? echo $rc->members_count ?>" sid="<? echo $rc->id ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
															<a href="<?php echo base_url("admin/ripf/delCategory/").$rc->id ?>" data-toggle="tooltip" data-original-title="Delete" onClick="return confirm('Are you sure want to delete')"><i class="fa fa-trash" aria-hidden="true"></i></a>
														</td>

													</tr>
												<? $key++;}?>
												</tbody>

											</table>

										</div>
									</div>
								</div>

							</div>
					
						</div>
							
					</div>
				</div>

				<!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: grey">Update Category</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<? echo base_url('admin/ripf/insertCategory') ?>">
			<div class="form-group">
				<label>Category Name</label>
				<input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" required>
			</div>
			<div class="form-group">
				<label>Overall Discount Amount</label>
				<input type="number" class="form-control" name="overall_discount_amount" id="overall_discount_amount" placeholder="Overall Discount Amount" required>
			</div>
			<div class="form-group">
				<label>Members Count</label>
				<input type="number" class="form-control" name="members_count" id="members_count" placeholder="Members Count" required>
			</div>
			<div class="form-group">
				<input type="hidden" name="id" id="sid">
				<button type="submit" class="btn btn-primary" style="margin-top: 20px;">Update</button>
			</div>
		</form>
      </div>
    </div>

  </div>
</div>

<div id="myModaltopic" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: grey">Update Topic</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<? echo base_url('admin/ripf/insertTopic') ?>">
			<div class="form-group">
				<select class="form-control" name="ripf_category" id="ripf_category" required>
					<option value="">Select Category</option>
					<?
						foreach($rcategories as $rcp){
							echo '<option value="'.$rcp->id.'">'.$rcp->category_name.'</option>';
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Topic Name</label>
				<input type="text" class="form-control" name="topic_name" id="topic_name" placeholder="Topic Name" required>
			</div>
			<div class="form-group">
				<label>Amount</label>
				<input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" required>
			</div>
			<div class="form-group">
				<input type="hidden" name="id" id="id">
				<button type="submit" class="btn btn-primary" style="margin-top: 20px;">Update</button>
			</div>
		</form>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">
	
	$(".updateCategory").click(function(){
		$("#sid").val($(this).attr("sid"));
		$("#category_name").val($(this).attr("category_name"));
		$("#overall_discount_amount").val($(this).attr("overall_discount_amount"));
		$("#members_count").val($(this).attr("members_count"));
		$("#myModal").modal("show");
	});
	
	$(".updateTopic").click(function(){
		$("#id").val($(this).attr("sid"));
		$("#ripf_category").val($(this).attr("ripf_category"));
		$("#topic_name").val($(this).attr("topic_name"));
		$("#amount").val($(this).attr("amount"));
		$("#myModaltopic").modal("show");
	});
	
	$('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
//            'pdfHtml5'
        ], 
    });

$(document).ready( function () {
    
	$('#myTable1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
//            'pdfHtml5'
        ], 
    });
	
} );
</script>










