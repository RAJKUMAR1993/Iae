<?php $this->load->view("admin/back_common/header"); ?>
<?php
	$category = $this->uri->segment(5); //print_r($category); ?>
<div class="row heading-bg">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

  </div>
        <!-- Breadcrumb -->
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>admin/dashboard">Dashboard</a></li>
      <li><a href="<?php echo base_url() ?>admin/users">Users</a></li>
      <li class="active"><span><? echo $category ?></span></li>
    </ol>
  </div>
        <!-- /Breadcrumb -->
</div>
      <!-- Row -->
      <div class="row">
        <div class="col-lg-12 pull-right">

          <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
              <div class="panel-body row pb-0" style="padding:20px; margin-bottom: 20px">
                <div class="col-md-3">
                  <h5 class="txt-dark">Organization Details</h5>
                </div>
                <div class="col-md-9 pull-right">
                  <a class="btn btn-info pull-right" style="margin-bottom: 10px;margin-left: 10px" onclick="printDiv('print')">Print</a>
                  <?php    $str = preg_replace('@((https?://)?([-\w]+\.[-\w\.]+)+\w(:\d+)?(/([-\w/_\.~]*(\?\S+)?)?)*)@');?>
                          
                  <a target="_blank" style="margin-bottom: 10px" href="<? echo base_url('admin/ripf/downloadpdf/').$ripf_ata->id.'/'.str_replace(" ",$str,$category) ?>" class="btn btn-info pull-right"><i class="fa fa-download"> Download</i></a><br>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-12 col-xs-12" >
          <div class="panel panel-default card-view pa-0" id="print">
            <div class="panel-wrapper collapse in">
              <div class="panel-body pb-0" style="padding:20px;">

                  <table class="table table-bordered table-stripped" id="sdata">
                    <thead>

                    </thead>
                    <tbody>
                      <tr>
                        <?php if ($category == "Institution") {  ?>
                        <td style="font-weight: bold;">Institution Name</td>
                        <td><?php echo $ripf_ata->institutionName;?></td>
                        <td style="font-weight: bold;">Organization Mobile Number</td>
                        <td><?php echo $ripf_ata->institution_phone_number;?></td>
                        <td style="font-weight: bold;">Organization Email Id</td>
                        <td><?php echo $ripf_ata->orgemail;?></td>
                        <?php  } ?>
                        <?php if ($category == "Students" || $category == "IndividualFaculty" || $category == "RetiredProfessional" ) {  ?>
                        <td style="font-weight: bold;">Full Name</td>
                        <td><?php echo $ripf_ata->ifsrp_fullName;?></td>
                        <td style="font-weight: bold;">Email Id</td>
                        <td><?php echo $ripf_ata->ifsrp_emailId;?></td>
                        <td style="font-weight: bold;">Mobile Number</td>
                        <td><?php echo $ripf_ata->ifsrp_mobileNumber;?></td>
                        <?php  } ?>
                      </tr>
                      <tr>
                        <?php if ($category == "Industry") {  ?>
                        <td style="font-weight: bold;">Name Of The Company</td>
                        <td><?php echo $ripf_ata->name_of_the_industry;?></td>
                        <td style="font-weight: bold;">Company Emai Id</td>
                        <td><?php echo $ripf_ata->industry_email_id;?></td>
                        <td style="font-weight: bold;">Company mobile Number</td>
                        <td><?php echo $ripf_ata->industry_phone_number;?></td>
                        <?php  } ?>
                        <?php if ($category == "R&DLabs") {  ?>
                        <td style="font-weight: bold;">Name Of The Organization</td>
                        <td><?php echo $ripf_ata->rd_name_of_the_organization;?></td>
                        <td style="font-weight: bold;">Organization Email Id</td>
                        <td><?php echo $ripf_ata->rd_organization_email;?></td>
                        <td style="font-weight: bold;"> Organization Mobile Number</td>
                        <td><?php echo $ripf_ata->rd_organization_phoneNumber;?></td>
                        <?php  } ?>
                      <?php if ($category == "Institution" || $category == "IndividualFaculty" || $category == "Students" || $category == "Industry" || $category == "Retired Professional" || $category == "R&DLabs") {  ?>
                      </tr>
                      <tr>
                        <td style="font-weight: bold;">Contact Mobile Number</td>
                        <td><?php echo $ripf_ata->mobile;?></td>
                        <td style="font-weight: bold;">Contact Person Name</td>
                        <td><?php echo $ripf_ata->cpname;?></td>
                        <td style="font-weight: bold;">Contact Person Email</td>
                        <td><?php echo $ripf_ata->email;?></td>
                      </tr>
                      <tr>
                        <td style="font-weight: bold;">Contact Person Designation</td>
                        <td><?php echo $ripf_ata->contact_person_designation;?></td>
                        <td style="font-weight: bold;">Contact Person Department</td>
                        <td><?php echo $ripf_ata->contact_person_department;?></td>
                      <?php } ?>
                        <?php if ($category == "Institution" || $category == "IndividualFaculty" || $category == "Students" || $category == "Industry" || $category == "RetiredProfessional" || $category == "R&DLabs") {  ?>

                        <td style="font-weight: bold;">Serial Number</td>
                        <td><?php echo $ripf_ata->serial_number;?></td>

                      </tr>
                    <?php } ?>
                    <?php if ($category == "RetiredProfessional") {  ?>
                        <tr>
                             <td style="font-weight: bold;">Name Of the Organization Time Retirement </td>
                             <td colspan="3"><?php echo nl2br($ripf_ata->rp_name_organization_retirement);?></td>
                             <td style="font-weight: bold;">Designation Time Retirement </td>
                             <td colspan="3"><?php echo nl2br($ripf_ata->rp_designation_Retirement);?></td>
                        </tr>
                          <?php } ?>
                    <?php if ($category == "Institution" || $category == "IndividualFaculty" || $category == "Students" || $category == "Industry" || $category == "RetiredProfessional" || $category == "R&DLabs") {  ?>
                    <tr>
                      <td style="font-weight: bold;">Stream</td>
                      <td><?php echo $ripf_ata->contact_person_stream;?></td>
                    <?php } ?>
                      <?php if ($category == "Students") {  ?>
                      <td style="font-weight: bold;">Course Specialization</td>
                      <td><?php echo $ripf_ata->student_course_specialization;?></td>
                    <?php } ?>
                    <?php if ($category == "Institution"  || $category == "Industry" || $category == "RetiredProfessional" || $category == "R&DLabs" || $category == "IndividualFaculty" ) {  ?>
                      <td style="font-weight: bold;">Reservation category</td>
                      <td><?php echo $ripf_ata->caste_type;?></td>
                      <?php } ?>
                      <?php if ($category == "Students" || $category == "Industry" || $category == "RetiredProfessional" || $category == "R&DLabs" || $category == "IndividualFaculty") {  ?>
                      <td style="font-weight: bold;">physically Challenged</td>
                      <td><?php echo $ripf_ata->physically_challenged;?></td>
                    </tr>
                  <?php } ?>




                      <?php if ($category == "Institution") {  ?>
                      <tr>
                        <td style="font-weight: bold;">Type Of Institution</td>
                        <td><?php echo $ripf_ata->institution_type;?></td>
                    <?php } ?>

                    <? if($category == "Institution" || $category == "IndividualFaculty" || $category == "Students" || $category == "R&DLabs"  || $category == "Industry" ){ ?>
                        <td style="font-weight: bold;">Website</td>
                        <td><?php echo $ripf_ata->website;?></td>
                    <?php } ?>
                    <? if($category == "Institution" || $category == "IndividualFaculty" || $category == "Students" || $category == "Industry" || $category == "R&DLabs"  ||  $category == "RetiredProfessional"  ){ ?>
                        <td style="font-weight: bold;">Address</td>
                        <td colspan="3"><?php echo nl2br($ripf_ata->address);?></td>
                      <?php } ?>
                     <?php if ($category == "IndividualFaculty") {  ?>
                        <td style="font-weight: bold;">Name Of the Institution(Working) </td>
                        <td colspan="3"><?php echo nl2br($ripf_ata->if_nameoftheInstitution_working);?></td>
                      </tr>
                    <?php } ?>

                      <?php if ($category == "Institution") {  ?>
                      <tr>
                        <? $categories = $ripf_ata->categories   ?>
                        <td style="font-weight: bold;">Categories</td>
                        <td colspan="3"> <?php echo $categories; ?>
                          <? //foreach($categories as $c){
                            //echo $c."<br>";
                         // } ?>
                        </td>
                      </tr>
                    <?php } ?>
                        <?php if ($category == "Industry" || $category == "R&DLabs" || $category == "Institution" ) { ?>
                        <tr>
                      	<? $mds = $ripf_ata->managementdetails; ?>
                        <td style="font-weight: bold;">Management Details</td>
                        <td colspan="3"> <?php echo $mds; ?>
                          
                        </td>
                      </tr>
                    <?php } ?>
                      <tr>
                        <?
                          $part = $this->db->get_where("tbl_ripf_participants",array("inst_id"=>$ripf_ata->id))->result();
                          if(count($part) > 0){
                            $participants = $this->db->get_where("tbl_ripf_participants",array("inst_id"=>$ripf_ata->id))->result(); 
                          }else{
                            $participants = json_decode($ripf_ata->participantsData);
                          }
                        ?>
                        <td style="font-weight: bold;">Participants</td>
                        <td colspan="6">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <td>Sno</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Mobile</td>
                                <td>Designation</td>
                                <td>Department</td>
                              </tr>
                            </thead>

                            <tbody>

                            <? $i = 1;
                              foreach($participants as $p){ ?>

                              <tr>
                                <td><? echo $i ?></td>
                                <td><? echo $p->pname ?></td>
                                <td><? echo $p->pemail ?></td>
                                <td><? echo $p->pmobile ?></td>
                                <td><? echo $p->designation ?></td>
                                <td><? echo $p->department ?></td>
                              </tr>

                            <? $i++;
                              } ?>
                            </tbody>

                          </table>

                        </td>
                      </tr>

                      <tr>

                        <? $odata = $this->db->get_where("tbl_ripf_orders",array("order_id"=>$ripf_ata->order_id))->row(); ?>


                        <td style="font-weight: bold;">Payment Details</td>
                        <td colspan="6">

                          <table class="table table-bordered">

                            <thead>
                              <tr>
                                <td>Order ID</td>
                                <td>Amount</td>
                                <td>Txn ID</td>
                                <td>Payment Status</td>
                                <td>Payment Mode</td>

                                <? if(count($part) > 0){ ?>

                                  <td>Payment Date</td>

                                <? } ?>
                              </tr>
                            </thead>

                            <tbody>


                              <tr>
                                <td><? echo $odata->order_id ?></td>
                                <td><i class="fa fa-rupee"></i> <? echo $odata->total_amount ?></td>
                                <td><? echo $odata->txn_id ?></td>
                                <td><? echo $odata->payment_status ?></td>
                                <td><? echo $odata->payment_mode ?></td>

                                <? if(count($part) > 0){ ?>
                                  <td><? echo $odata->payment_date ?></td>
                                <? } ?>
                              </tr>

                            </tbody>

                          </table>

                        </td>
                      </tr>

                    </tbody>
                  </table>



<!--
                <div align="center" style="margin-bottom: 10px">
                  <button type="button" class="btn btn-info" id="updprofile">Update Profile</button>
                </div>
-->

              </div>
            </div>
          </div>

        </div>

      </div>
      <!-- /Row -->


<?php $this->load->view("admin/back_common/footer"); ?>

<script type="text/javascript">

function printDiv(divName) {
   var printContents = document.getElementById(divName).innerHTML;
   var originalContents = document.body.innerHTML;

   document.body.innerHTML = printContents;

   window.print();

   document.body.innerHTML = originalContents;
}

$("#datepicker").datepicker();

$("#updprofile").click(function(){

      $("#upddata").toggle();
      $("#sdata").hide();
    $("#updprofile").hide();

  });
   $("#back").click(function(){

      $("#sdata").toggle();
      $("#updprofile").toggle();
      $("#upddata").hide();

  });


$("#std_state").on("change",function() {
  var state = $(this).val();
  //alert(state);
  $.ajax({
    type:"POST",
    url:"<?php echo base_url() ?>front/Studentregister/get_std_city",
    data:{state:state},
    beforeSend:function(){
      $("#ploader").show();

    },
    success:function(cities){
      $("#ploader").hide();
      $("#std_city").html(cities);
      //console.log(cities);
    }

  });
});

</script>
