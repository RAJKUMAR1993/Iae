<?php $this->load->view("admin/back_common/header"); ?>

<!-- Title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Attendees</h5>
    </div>
                <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
            <li class="active"><span>Attendees</span></li>
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
                               </div>
                            </div> 
                             
                             
                        
                            <div  class="table-responsive" style="padding:20px;">
                                
                                    <table class="table table-hover display  pb-30" id="myTable">
                                        <thead>
                                            <th>S.no</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile </th>
                                            <th>Type </th>
                                            <th>Year</th>
                                            <th>category</th>
                                            <th>Date</th>
                                            <th>Schedule Date</th>
                                            <th>Year</th>
                                            <th>Start Time </th>
                                            <th>End Time </th>
                                            <th>Session</th>
                                            
                                            
                                        </thead>
                                        <tbody>
                                        <?
                                        $key = 1;
                   
                                            foreach ($joindata as $row) {
                                                
                                               $pdata = json_decode($row->participant_data,true); 
                                               $sdata = json_decode($row->schedule_data,true);
                                        ?>
                                            <tr>
                                                <td><?  echo $key;?></td>
                                                <td><?  echo $pdata['name']; ?></td>
                                                <td><?  echo $pdata['participant_email']; ?></td>
                                                <td><?  echo $pdata['participant_mobile']; ?></td>
                                                <td><?  echo $pdata['participant_type']; ?></td>
                                                <td><?  echo $pdata['reg_year']; ?></td>
                                                <td><?  echo implode($pdata['category']); ?></td>
                                                <td><?  echo date("d-M-Y",strtotime($row->created_date));?></td>
                                                <td><?  echo date("d-M-Y",strtotime($sdata['schedule_date'])); ?></td>
                                                <td><?  echo $sdata['schedule_year']; ?></td>
                                                <td><?  echo date('g:i a',strtotime($sdata['schedule_start_time']));?></td>
                                                <td><?  echo date('g:i a',strtotime($sdata['schedule_end_time']));?></td>
                                                <td><?  echo $sdata['technical_session'];?></td>
                                               
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












