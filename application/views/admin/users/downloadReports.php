	<?php $this->load->view("admin/back_common/header"); ?>

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">List of Users</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span>Download reports</span></li>
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
												<th>Email</th>
												<th>Mobile</th>
												<th>Address</th>
												<th>Registration Date</th>
												<th>Amount</th>
												<th>Payment Mode</th>
												<th>Participant Name</th>
												<th>Mobile Number</th>
												<th>Email ID</th>
												
											</thead>
											<tbody>
			<?
			$key = 1;

			$tamount = array();
			$tpar = array();

			foreach ($alist as $row) {

				$odata = $this->db->get_where("tbl_orders",array("order_id"=>$row->order_id))->row();	

				$part = $this->db->get_where("tbl_participants",array("inst_id"=>$row->id))->result();
					
				$iid = 0;
				
				
				
				foreach($part as $key1 => $p){
					if(count($part) == 1){	
					 ?>
				
					<tr>
						<td><? echo $key;?></td>
						<td><? echo $row->institutionName;?></td>
						<td><? echo $row->email;?></td>
						<td><? echo $row->mobile;?></td>
						<td><? echo nl2br($row->address);?></td>
						<td><? echo date("d-M-Y",strtotime($row->created_date));?></td>
						<td><i class="fa fa-rupee"></i> <? echo $odata->total_amount;?></td>
						<td><? echo $odata->payment_type;?></td>
						<td><? echo $p->pname;  ?></td>
						<td><? echo $p->pmobile;  ?></td>
						<td><? echo $p->pemail;  ?></td>
					</tr>	
					
				<? }else{  
					
//						foreach($part as $p){
					?>		
					<tr>		
					<?	if($key1 == 0){ ?>
					
						<td><? echo $key;?></td>
						<td><? echo $row->institutionName;?></td>
						<td><? echo $row->email;?></td>
						<td><? echo $row->mobile;?></td>
						<td><? echo nl2br($row->address);?></td>
						<td><? echo date("d-M-Y",strtotime($row->created_date));?></td>
						<td><i class="fa fa-rupee"></i> <? echo $odata->total_amount;?></td>
						<td><? echo $odata->payment_type;?></td>
						<td><? echo $p->pname;  ?></td>
						<td><? echo $p->pmobile;  ?></td>
						<td><? echo $p->pemail;  ?></td>
						
					<? }else{ ?>
				 	
					 	<td><? //echo $key;?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><? echo $p->pname;  ?></td>
						<td><? echo $p->pmobile;  ?></td>
						<td><? echo $p->pemail;  ?></td>
						
					<? } ?>	
					</tr>
					
			<?	} 
				$iid++;
				}
			$key++;
			} ?>
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
			"ordering": false
		});
	});
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











