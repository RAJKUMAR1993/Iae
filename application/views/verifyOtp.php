<? front_header() ?>
  
<style>
.note {
    text-align: center;
    height: 69px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
.form-content {
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control {
    border-radius: 1.5rem;
}
.btnSubmit {
    border: none;
    border-radius: 30px;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}
	
.btnSubmit:hover {
   
    background: #00225c;
    color: #fff;
}
.pbtnSubmit {
    border: none;
    border-radius: 30px;
    padding: 1%;
    width: 29%;
    cursor: pointer;
    background:#058797;
    color: #fff;
}
	.alert{
		margin-bottom: 0px !important;
		padding: 8px !important;
	}	
	
.pbtnSubmit:hover {
   
    background:#045C8E;
    color: #fff;
}
.form-control {
    display: block !important;
    width: 100% !important;
    padding: .375rem .75rem !important;
    font-size: 14px !important;
    line-height: 1.5 !important;
    color: #495057 !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    border: 1px solid #ced4da !important;
    border-radius: 2px !important;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
}
.fbox {
    background: #fff;
    padding: 15px 0px 0px 0px;
    text-align: center;
    -webkit-box-shadow: 0 0 35px rgba(2, 6, 32, 0.15);
    -moz-box-shadow: 0 0 35px rgba(2, 6, 32, 0.15);
    -ms-box-shadow: 0 0 35px rgba(2, 6, 32, 0.15);
    -o-box-shadow: 0 0 35px rgba(2, 6, 32, 0.15);
    box-shadow: 0 0 35px rgba(2, 6, 32, 0.15);
    margin-bottom: 15px;
}
	.modal-title{
		color: #000;
	}	
</style>  
  
  <!-- [/MAIN-HEADING]
 ============================================================================================================================-->
  <section class="main-heading" id="home">
    <div class="baner"> <img src="<? echo base_url('assets/') ?>images/inbanner.jpg" class="img-responsive" /> </div>
  </section>
  
  <!-- [/MAIN-HEADING]
 ============================================================================================================================--> 
  
  <!-- [ABOUT US]
 ============================================================================================================================-->
  <section class="white-background black" id="inpage">
    <div class="container">
      <div class="row">
        <div class="col-md-12  black">
          <h3 class="title"> </h3>
          <div class="container register-form">
            <div class="form">
              <div class="note">
                <h1 style="padding-top: 15px;"> Verify OTP </h1>
              </div>
             
              <form method="post" action="<? echo base_url('home/confirmOtp') ?>">
              <div class="form-content"> 
               <? echo $this->session->flashdata("emsg") ?>
                <div class="row">
                  <div class="col-md-6">
                    <label>Mobile OTP</label>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Enter mobile otp" value="" name="motp" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Email OTP</label>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Enter email otp" value="" name="eotp" required>
                    </div>
                  </div>
              </div>
              
              <div class="row">
              	
              	<div class="col-md-3"></div>
              	<div class="col-md-6" align="center" style="margin-top: 20px">
              		
              		<button type="submit" class="btnSubmit">Confirm</button>
              		<? if($this->session->userdata("promo_status") == "Active"){ ?>
              			<button type="button" class="pbtnSubmit" data-toggle="modal" data-target="#myModal">Apply Promocode</button>
              		<? } ?>
              	</div>
              	<div class="col-md-3"></div>
              	
              </div>
              
              </form>
              
            </div>
          </div>
          <br/>
        </div>
      </div>
      <div class="gap"> </div>
      
      <!-- /row --> 
      
    </div>
  </section>
  
  <!-- [CONTACT]
 ============================================================================================================================--> 
<? front_footer() ?>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Apply Promocode</h4>
        <div class="emsg"></div>
      </div>
      <div class="modal-body">
      	<form method="post" id="checkPromo">
			<div class="form-group">
			  <input type="text" class="form-control" name="promocode" required placeholder="Enter Promocode">
			</div>
			<div class="form-group">
			  <button type="submit" class="btn btn-primary">Apply</button>
			</div>
     	</form>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">

$("#checkPromo").submit(function(e){
	e.preventDefault();
	var fdata = $(this).serialize();
	$.ajax({
		type : "post",
		data : fdata,
		dataType : "json",
		url : "<? echo base_url('checkPromo') ?>",
		success : function(data){
			console.log(data);
			if(data.status == "success"){
				$(".emsg").html(data.emsg);
				setTimeout(function(){$("#myModal").modal("hide");},5000);
			}else{
				$(".emsg").html(data.emsg);
			}
		},
		error :function(data){
			console.log(data);
		}
	})
})

</script>



