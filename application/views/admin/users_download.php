	<?php $this->load->view("admin/back_common/header"); ?>
	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">List of Users Files Downloaded</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span>List of Users Files Downloaded</span></li>
			</ol>
		</div>		<!-- /Breadcrumb -->
	</div>		
			<!-- Row -->
				<div class="row">
               		<div class="col-lg-12 col-xs-12" >
						<div class="panel panel-default card-view pa-0">						
							<div class="panel-wrapper collapse in">
								<div  class="table-responsive" style="padding:20px;">
										<table class="table table-hover display  pb-30" id="myTable">
											<thead>
												<th>S.no</th>
												<th>Name</th>
												<th>Email</th>
												<th>Phone</th>
												<th>File Name</th>
												<th>Location</th>
												<th>Date</th>
												<th>IP</th>
												
											</thead>
											<tbody>
											<? $key = 1;
                                                foreach ($downloads as $row) { ?>
												<tr>
													<td><? echo $key;?></td>
													<td><? echo $row->name; ?></td>
													<td><? echo $row->email;?></td>
													<td><? echo $row->phone;?></td>
													<td><? echo $row->file_name;?></td>
													<td><? echo $row->location;?></td>
													<td><? echo ($row->downloaded_date != "0000-00-00") ? date("d-m-Y",strtotime($row->downloaded_date)) : "";?></td>
													<td><? echo $row->ip;?></td>													
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
} );
</script>






