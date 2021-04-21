
<? front_header() ?>
  
  <!-- [/MAIN-HEADING]
 ============================================================================================================================-->
  <section class="main-heading" id="home">
 <div class="baner"> <img src="<? echo base_url('assets/') ?>images/inbanner.jpg" class="img-responsive" />
	  </div> 
	  
	  
	  
	  
	
  </section>
  
  <!-- [/MAIN-HEADING]
 ============================================================================================================================--> 
  
  <!-- [ABOUT US]
 ============================================================================================================================-->
  <section class="white-background black" id="inpage">
    <div class="container">
	 <?php if($this->session->flashdata('msg')): ?>
	 <div class="alert alert-success alert-dismissible" id="success-alert">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <strong>Success !</strong>&nbsp;<?php echo $this->session->flashdata('msg'); ?>
	</div>
    <?php endif; ?>
      <div class="row" style="font-weight:bold;">
        <div class="col-md-12  black">
         <?php $system_ip = $this->input->ip_address(); $res = $this->db->get_where("tbl_users_download",array("ip"=>$system_ip))->row();   if($res->ip == $system_ip){ ?>
			<div class="list-group">
			<a class="list-group-item list-group-item-action active">Download</a>
			<a href="<?php echo base_url(); ?>assets/NIRF/1-NIRF&AICTE-INITIATIVES-Prof-Poonia.pptx" class="list-group-item list-group-item-action">1-NIRF&AICTE-INITIATIVES-Prof-Poonia </a>
			<a href="<?php echo base_url(); ?>assets/NIRF/2-Graduate-Outcomes-Prof-N-Siva-Prasad.pptx" class="list-group-item list-group-item-action">2-Graduate-Outcomes-Prof-N-Siva-Prasad</a>
			<a href="<?php echo base_url(); ?>assets/NIRF/3-Research-and-Teaching-Quality-Parameters-Pandhari-Pande.pptx" class="list-group-item list-group-item-action">3-Research-and-Teaching-Quality-Parameters-Pandhari-Pande</a>
			<a href="<?php echo base_url(); ?>assets/NIRF/4-Quality-Out-come-based-education-and-Accreditation-Prof-SC-Sahasrabudhe-Presentation.pptx" class="list-group-item list-group-item-action">4-Quality-Out-come-based-education-and-Accreditation-Prof-SC-Sahasrabudhe-Presentation</a>
			<a href="<?php echo base_url(); ?>assets/NIRF/5-NBA-Anil-Kumar-Nasaa.pptx" class="list-group-item list-group-item-action">5-NBA-Anil-Kumar-Nasaa</a>
			<a href="<?php echo base_url(); ?>assets/NIRF/6-NIRF-Ranking-Dr-Meena-Chintamaneni.pptx" class="list-group-item list-group-item-action">6-NIRF-Ranking-Dr-Meena-Chintamaneni</a>
			<a href="<?php echo base_url(); ?>assets/NIRF/7-VLE-K-R-Srivathsan.pdf" class="list-group-item list-group-item-action">7-VLE-K-R-Srivathsan</a>
			<a href="<?php echo base_url(); ?>assets/NIRF/8-Teaching-Learning-and-Resources-Prof-B-Raja Shekhar.pptx" class="list-group-item list-group-item-action">8-Teaching-Learning-and-Resources-Prof-B-Raja Shekhar</a>
			<a href="<?php echo base_url(); ?>assets/NIRF/9-Changing-Paradim-Dr-B-S-Madhukar.pptx" class="list-group-item list-group-item-action">9-Changing-Paradim-Dr-B-S-Madhukar</a>
			<a href="<?php echo base_url(); ?>assets/NIRF/10-Perception-Aniruddha-S-Dasu.pptx" class="list-group-item list-group-item-action">10-Perception-Aniruddha-S-Dasu</a>
			<a href="<?php echo base_url(); ?>assets/NIRF/11-Perception--Prof-S-Ramachandram.pptx" class="list-group-item list-group-item-action">11-Perception--Prof-S-Ramachandram</a>
			<a href="<?php echo base_url(); ?>assets/NIRF/12-Engineering-Knowledge-Graph(EKG).pptx" class="list-group-item list-group-item-action">12-Engineering-Knowledge-Graph(EKG)</a>
		  </div> 
		 <?php }else{ ?>
			<div class="list-group">
			<a href="#" class="list-group-item list-group-item-action active">Download</a>
			<a data-toggle="modal" data-target="#myModal" class="list-group-item list-group-item-action">1-NIRF&AICTE-INITIATIVES-Prof-Poonia </a>
			<a data-toggle="modal" data-target="#myModal" class="list-group-item list-group-item-action">2-Graduate-Outcomes-Prof-N-Siva-Prasad</a>
			<a data-toggle="modal" data-target="#myModal" class="list-group-item list-group-item-action">3-Research-and-Teaching-Quality-Parameters-Pandhari-Pande</a>
			<a data-toggle="modal" data-target="#myModal" class="list-group-item list-group-item-action">4-Quality-Out-come-based-education-and-Accreditation-Prof-SC-Sahasrabudhe-Presentation</a>
			<a data-toggle="modal" data-target="#myModal" class="list-group-item list-group-item-action">5-NBA-Anil-Kumar-Nasaa</a>
			<a data-toggle="modal" data-target="#myModal" class="list-group-item list-group-item-action">6-NIRF-Ranking-Dr-Meena-Chintamaneni</a>
			<a data-toggle="modal" data-target="#myModal" class="list-group-item list-group-item-action">7-VLE-K-R-Srivathsan</a>
			<a data-toggle="modal" data-target="#myModal" class="list-group-item list-group-item-action">8-Teaching-Learning-and-Resources-Prof-B-Raja Shekhar</a>
			<a data-toggle="modal" data-target="#myModal" class="list-group-item list-group-item-action">9-Changing-Paradim-Dr-B-S-Madhukar</a>
			<a data-toggle="modal" data-target="#myModal" class="list-group-item list-group-item-action">10-Perception-Aniruddha-S-Dasu</a>
			<a data-toggle="modal" data-target="#myModal" class="list-group-item list-group-item-action">11-Perception--Prof-S-Ramachandram</a>
			<a data-toggle="modal" data-target="#myModal" class="list-group-item list-group-item-action">12-Engineering-Knowledge-Graph(EKG)</a>
		  </div> 
		 <?php } ?>
		

        </div>
      </div>
      <div class="gap"> </div>
      
      <!-- /row --> 
      <div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
            <form method="post" class="form-horizontal" action="<?php echo base_url(); ?>home/users_download">
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="font-weight:bold;">Enter Details To Download</h4>
			  </div>
			  <div class="modal-body">
				
					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Name:</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Enter Name" name="name" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="pwd">Email:</label>
					  <div class="col-sm-10">          
						<input type="email" class="form-control"  placeholder="Enter Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Phone:</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Enter Phone" placeholder="Enter Phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="phone" minlength="10" maxlength="10" required>
					  </div>
					</div>
					
				  
			  </div>
			  <div class="modal-footer">
			    <button type="submit" class="btn btn-primary">Submit</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>
            </form>
		  </div>
		</div> 
    </div>
  </section>
 <script>


window.setTimeout(function() {
    $("#success-alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
 </script>
 <? front_footer() ?>