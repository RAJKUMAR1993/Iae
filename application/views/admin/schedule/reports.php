<?php $this->load->view("admin/back_common/header"); ?>

<!-- Title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">NIRF Reports</h5>
    </div>
                <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
            <li class="active"><span>NIRF Reports</span></li>
        </ol>
    </div>
                <!-- /Breadcrumb -->
</div>  
        
        <!-- Row -->
            <div class="row">
                  
                   <div class="row">
                  <form method="get" id="changeYear" action="">
             <div class="form-group col-md-5">
                <select class="form-control  changeYear" name="id">
                  <option value="">Select Event</option>
                  <? $event_name = $this->db->order_by("id","desc")->group_by("event_name")->get_where("tbl_schedule_dates",["event_type"=>"NIRF"])->result();
                   $name_event = $this->input->get("id");
                    foreach($event_name as $event){ ?>
                        <option <?php if($name_event==$event->id){ echo 'selected';}?> value="<?php echo $event->id;?>"><?php echo $event->event_name;?></option>
                      
                    <? } ?>
                </select>
              </div>
                    <div class="col-md-3">
                      <a class="btn btn-primary" href="<? echo base_url('admin/schedule/reports') ?>">Clear</a>
                    </div>
                  </form>
                </div>
                  
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
                                
                                    <table class="table table-hover  pb-30" id="myTable">
                                        <thead>
                                        <tr>
                                            <th rowspan="2" valign="middle">Category</th>
                                            <th colspan="2" align="center">Online</th>
                                            <th colspan="2" align="center">Offline</th>
                                            <th colspan="2" align="center">Total</th>
                                        </tr> 
                                        <tr>
                                            <th>Institutions</th>
                                            <th>Participants</th>
                                            <th>Institutions</th>
                                            <th>Participants</th>
                                            <th>Institutions</th>
                                            <th>Participants</th>
                                        </tr> 
                                            
                                        </thead>
                                        <tbody>
                                           <?php 
  
                        if($name_event){
                          
                        $tonlineinsts = [];     
                        $tonlinepart = [];      
                        $tofflineinsts = [];      
                        $tofflinepart = [];     
                        $tinsts = [];     
                        $tparts = [];     
//                        foreach($en as  $ev){ 
                        foreach($category as  $cat){ 
                          $online = $this->db->query("SELECT SUM(participants+1) as totalparicipants,COUNT(id) as institutes from tbl_registrations where  categories LIKE '%$cat->category%' and type='online' and event_name=$name_event and participants > 0")->row();
                          $offline = $this->db->query("SELECT SUM(participants+1) as totalparicipants,COUNT(id) as institutes from tbl_registrations where  categories LIKE '%$cat->category%' and event_name=$name_event and type='offline' and participants > 0")->row();
  
                        
                      ?>
                                                <tr>   
                                                    <td>
                                                      <a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event; ?> &category=<? echo $cat->category ?>" target="_blank"><? echo $cat->category ?></a>
                                                    </td>
                                                  <td><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event; ?>&category=<? echo $cat->category ?>" target="_blank"><? echo $online->institutes ?></a></td>
                                                    <td><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event; ?>&category=<? echo $cat->category ?>" target="_blank"><? echo $online->totalparicipants ?></a></td>
                                                    <td><a href="<? echo base_url('admin/users/offlineusers') ?>?event_id=<? echo $name_event; ?>&category=<? echo $cat->category ?>" target="_blank"><? echo $offline->institutes ?></a></td>
                                                    <td><a href="<? echo base_url('admin/users/offlineusers') ?>?event_id=<? echo $name_event; ?>&category=<? echo $cat->category ?>" target="_blank"><? echo $offline->totalparicipants ?></a></td>
                                                    <td><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event; ?>&category=<? echo $cat->category ?>&type=total" target="_blank"><? echo ($online->institutes + $offline->institutes) ?></a></td>
                                                    <td><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event; ?>&category=<? echo $cat->category ?>&type=total" target="_blank"><? echo ($online->totalparicipants + $offline->totalparicipants) ?></a></td>
                                              </tr> 
                                           <?php
                        $tonlineinsts[] = $online->institutes;
                        $tonlinepart[] = $online->totalparicipants;
                        $tofflineinsts[] = $offline->institutes;
                        $tofflinepart[] = $offline->totalparicipants;
                        $tinsts[] = ($online->institutes + $offline->institutes);
                        $tparts[] = ($online->totalparicipants + $offline->totalparicipants);
                        } //}?>
                                              <tr>
                                                <td>Total</td>
                                                <td><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event; ?>" target="_blank"><? echo array_sum($tonlineinsts) ?></a></td>
                                                <td><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event; ?>" target="_blank"><? echo array_sum($tonlinepart) ?></a></td>
                                                <td><a href="<? echo base_url('admin/users/offlineusers') ?>?event_id=<? echo $name_event; ?>" target="_blank"><? echo array_sum($tofflineinsts) ?></a></td>
                                                <td><a href="<? echo base_url('admin/users/offlineusers') ?>?event_id=<? echo $name_event; ?>" target="_blank"><? echo array_sum($tofflinepart) ?></a></td>
                                                <td><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event; ?>&type=total" target="_blank"><? echo array_sum($tinsts) ?></a></td>
                                                <td><a href="<? echo base_url('admin/users') ?>?event_id=<? echo $name_event ?>&type=total" target="_blank"><? echo array_sum($tparts) ?></a></td>
                                              </tr> 
                                        </tbody>
                           <? } ?>             
                                    
                                    </table>
                                
                                
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>
<? $this->load->view( "admin/back_common/footer" ); ?>
<script type="text/javascript">
$(document).ready( function () {
$('#myTable').DataTable({
  "order" : false
});
  $(".changeYear").change(function(){
    
    $("#changeYear").submit();
    
  })
} );
</script>












