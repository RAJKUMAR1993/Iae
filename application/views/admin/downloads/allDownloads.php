	<?php $this->load->view("admin/back_common/header"); ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">List of Downloads</h5>
		</div>
					<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
				<li class="active"><span>Downloads List</span></li>
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
										<a href="<? echo base_url('admin/downloads/addDownload') ?>" class="btn btn-primary">Add</a>
									</div>
								</div>    
						         
							
								<div class="table-responsive" style="padding:20px;">
									
										<table class="table table-hover display pb-30" id="myTable">
											<thead>
											
												<th>S.no</th>
												<th>Number of Users Downloaded</th>
												<th>Number of Downloads</th>
												<th>Topic</th>
												<th>Name & Designation</th>
												<th>File Name</th>
												<th>Event</th>
												<th>Date</th>
												<th>Action</th>
												
											</thead>
											<tbody>
											<?
												$key = 1;
					   
												foreach ($alist as $row) {
													
													$nou = $this->db->group_by("name")->get_where("tbl_users_download",["file_name"=>basename($row->file)])->num_rows();
													$nod = $this->db->get_where("tbl_users_download",["file_name"=>basename($row->file)])->num_rows();
											?>
											
												<tr>
													<td><? echo $key; ?></td>
													<td><? echo '<a href="users/users_download?file='.basename($row->file).'&ref=users">'.$nou.'</a>'; ?></td>
													<td><? echo '<a href="users/users_download?file='.basename($row->file).'&ref=downloads">'.$nod.'</a>'; ?></td>
													<td><? echo $row->name; ?></td>
													<td><? echo $row->ndesignation; ?></td>
													<td><? echo basename($row->file); ?></td>
													<td><? echo $this->db->get_where("tbl_schedule_dates",["id"=>$row->event_id])->row()->event_name; ?></td>
													<td><? echo date("d-m-Y",strtotime($row->created_date)); ?></td>
													<td>
														<a href="<? echo base_url("admin/downloads/addDownload/").$row->id?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
														<a href="<? echo base_url("admin/downloads/delSpeaker/").$row->id?>" onclick="return confirm('Are you sure want to delete.')"><i class="fa fa-trash"></i></a>
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
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>-->
<script type="text/javascript">
$(document).ready( function () {
 
	/*var fixHelperModified = function(e, tr) {
		var $originals = tr.children();
		var $helper = tr.clone();
		$helper.children().each(function(index) {
			$(this).width($originals.eq(index).width())
		});
		return $helper;
	},
	updateIndex = function(e, ui) {
		$('td.index', ui.item.parent()).each(function (i) {
			$(this).html(i+1);
		});
		$('.sorting', ui.item.parent()).each(function (i) {
			$(this).val(i + 1);			
		});
		
		var speaker_id = $("input[name='speaker_id[]']").map(function(){return $(this).val();}).get();
		var sort = $("input[name='sort[]']").map(function(){return $(this).val();}).get();
		
//		console.log(speaker_id);
//		console.log(sort);
//		return false;
		
		$.ajax({
			type : "post",
			url : "<? echo base_url('admin/speakers/sort_order') ?>",
			data : {speaker_id:speaker_id,sort:sort},
			success : function(data){
				console.log(data);
			},
			error : function(data){
				console.log(data);
			}
		})
		
	};
	$("#myTable tbody").sortable({
		helper: fixHelperModified,
		stop: updateIndex
	}).disableSelection();*/
	
	$("#myTable").dataTable();
	
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











