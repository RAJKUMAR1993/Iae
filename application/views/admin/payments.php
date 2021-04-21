	<?php $this->load->view("admin/back_common/header"); ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">List of Payments</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span>Payments </span></li>
			</ol>
		</div>
					<!-- /Breadcrumb -->
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
												<th>Institution Name</th>
												<th>Order ID</th>
												<th>Transaction ID</th>
												<th>Amount</th>
												<th>Discount Amount</th>
												<th>Payment Status</th>
												<th>Payment Date</th>
												<th>Payment Type</th>
												<th>Reference ID</th>
												<th>Action</th>
												
											</thead>
											<tbody>
											<?
												$key = 1;
					   
												foreach ($pdata as $row) {
													
													$iname = "";
													
													$idata = $this->db->get_where("tbl_registrations",array("order_id"=>$row->order_id))->row();	
												
													if($idata){
													
														$iname = $idata->institutionName;
														
													}else{
														
														$idata = $this->db->get_where("tbl_temp_registrations",array("order_id"=>$row->order_id))->row();
														$iname = $idata->institutionName;
														
													}
													
											?>
												<tr>
													<td><? echo $key;?></td>
													<td><? echo $iname ?></td>
													<td><? echo $row->order_id;?></td>
													<td><? echo $row->txn_id;?></td>
													<td><i class="fa fa-rupee"></i> <? echo $row->total_amount;?></td>
													<td><i class="fa fa-rupee"></i> <? echo ($row->total_discount_amount > 0) ? ($row->total_discount_amount - $row->total_amount) : $row->total_discount_amount;?></td>
													<td><label class="badge badge-<? echo ($row->payment_status == "Success") ? 'success' : 'danger' ?>"><? echo $row->payment_status;?></label></td>
													<td><? echo date("d-M-Y",strtotime($row->payment_date));?></td>
													<td><? echo $row->payment_type;?></td>
													<td><? echo $row->bank_ref_no;?></td>
													<td>
														<? if($row->payment_status == "Success"){ ?>
															<a href="<? echo base_url("admin/users/updateOrder/").$row->order_id ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
														<? } ?>
														<a href="<? echo base_url("admin/users/viewUserpayment/").$row->order_id ?>"><i class="fa fa-eye"></i></a>
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

				<!-- /Row -->
<? $this->load->view( "admin/back_common/footer" ); ?>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
//            'pdfHtml5'
        ],
		
    } );
} );
</script>


<script type="text/javascript">

//function archiveFunction(id) {
//     swal({   
//            title: "Are you sure?",   
//            text: "You will not be able to recover this imaginary file!",   
//            type: "warning",   
//            showCancelButton: true,   
//            confirmButtonColor: "#e3c94b",   
//            confirmButtonText: "Yes, delete it!",   
//            closeOnConfirm: false 
//        }, function(){   
//            swal("Deleted!", "Your imaginary file has been deleted.", "success"); 
//        });
//	return false;
//    $.ajax({
//        method: 'POST',
//        data: {'id' : id },
//        url: '<?php //echo base_url("admin/agents/delAgent/") ?>'+id,
//        success: function(data) {
//			if(data == 1){
//					
//				swal(
//					'Error!',
//					'succes.',
//					'success'
//				) 
//				
//			}else{
//				
//					
//				swal(
//					'Error!',
//					'Error Occured Please Try Again.',
//					'warning'
//				) 
//			}
//			
////            location.reload();   
//        }
//    });
// 
//  } 




</script>











