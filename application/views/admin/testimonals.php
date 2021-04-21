	<?php $this->load->view("admin/back_common/header"); ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">List of Messages </h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span>Messages  </span></li>
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
									  <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-top:10px">Add Messages </button>
								   </div>
								</div> 
						         
						         
							
								<div  class="table-responsive" style="padding:20px;">
									
										<table class="table table-hover display  pb-30" id="myTable">
											<thead>
												<th>S.no</th>
												<th>Name</th>
												<th>Designation</th>
												<th>Photo </th>
												<th>Testimony Description</th>
												<th>Sort Order</th>
												<th>Operations</th>
												
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
													<td><img src="<?php echo base_url(); ?>assets/testimonals/<? echo $row->photo;?>" width="100px" height="80px" alt="No Image Uploaded"></td>
													<td><? echo $row->description;?></td>
													<td><? echo $row->sort_order;?></td>
													<td><a href="javascript:void(0)" class="mr-25 edit_cat" data-toggle="tooltip" data-original-title="Edit" cname="<?php echo $row->name ?>" sorder="<? echo $row->sort_order;?>" designation="<?php echo $row->designation ?>" test_id="<?php echo $row->testimony_id ?>" photo="<?php echo $row->photo; ?>" desc="<?php echo $row->description ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
													<a href="<?php echo base_url("admin/users/deltest/").$row->testimony_id ?>" data-toggle="tooltip" data-original-title="Delete" onClick="return confirm('Are you sure want to delete')"><i class="fa fa-trash" aria-hidden="true"></a></td>
												</tr>
											<? $key++;}?>
											</tbody>
										</table>
									
									
								</div>
							</div>
						</div>
							
					</div>
				</div>
 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <form method="post" action="<?php echo base_url(); ?>admin/users/add_testimonal" enctype="multipart/form-data">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:black;text-align:center">Add Message</h4>
        </div>
        <div class="modal-body">
		
		
			<div class="form-group">
			  <label for="email">Name of the Person:</label>
			  <input type="text" class="form-control" name="name" placeholder="Enter name" required>
			</div>
			<div class="form-group">
			  <label for="pwd">Designation:</label>
			  <input type="text" class="form-control" name="designation"  placeholder="Enter designation" required>
			</div>
			<div class="form-group">
			  <label for="pwd">Photo of the Person:</label>
			  <input type="file" class="form-control" name="files">
			</div>
			<div class="form-group">
			  <label for="pwd">Testimony Description:</label>
			  <textarea class="form-control" rows="5" name="desc" required></textarea>
			</div>
			<div class="form-group">
			  <label for="email">Sorting Order:</label>
			  <input type="text" class="form-control" name="sort_order" placeholder="Enter Sorting Order">
			</div>
		 
        </div>
        <div class="modal-footer">
		  <button type="submit" class="btn btn-danger">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
	</form>
  </div></div>	

<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" style="color: black">Update</h5>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?php echo base_url('admin/users/update_test');?>" enctype="multipart/form-data">
					    <input type="hidden" name="test_id" id="test_id">
						<div class="form-group">
							<label for="recipient-name" class="control-label mb-10">Name</label>
							<input type="text" class="form-control" name="name" id="cname" required>
						</div>
						<div class="form-group online_box">
							<label for="message-text" class="control-label mb-10">Designation</label>
							<input type="text" class="form-control" name="designation" id="designation" required>
						</div>
                        <div class="form-group offline_box">
							<label for="message-text" class="control-label mb-10">Photo</label>
							<input type="file" class="form-control" name="files">
							<input type="hidden" class="form-control" name="file_name" id="photo">
						</div>
						<div class="form-group">
							<label for="message-text" class="control-label mb-10">Testimony Description:</label>
							<textarea class="form-control" rows="5" name="desc" id="desc" required></textarea>
						</div>
						<div class="form-group">
						  <label for="email">Sorting Order:</label>
						  <input type="text" class="form-control" name="sort_order">
						</div>
						<input type="hidden" name="category_id" value="" id="cid_modal">
					
				</div>
				<div class="modal-footer">
				    <button type="submit" class="btn btn-danger">Update</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>

  <!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>
<script type="text/javascript">
$(document).ready( function () {
    $('#myTable').DataTable();
	$(".edit_cat").on("click",function(){
		
		var sorder = $(this).attr("sorder");
		
		$.ajax({
			
			type : "post",
			data : {sorder : sorder},
			url : "<? echo base_url('admin/users/getTsortorder') ?>",
			success : function(data){
				
				$("#mySelect").html(data);
				
			},
			error : function(data){
				
				
			}
			
		})
		
		var cname = $(this).attr('cname');
		var designation = $(this).attr('designation');
		var photo = $(this).attr('photo');
		var desc = $(this).attr('desc');
		var test_id = $(this).attr('test_id');

		$("#cname").val(cname);
		$("#designation").val(designation);
		$("#photo").val(photo);
		$("#desc").val(desc);
		$("#test_id").val(test_id);
		$("#mySelect").val(sorder);
		$("#responsive-modal").modal('show');


	});
} );
</script>












