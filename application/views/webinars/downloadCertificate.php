<? front_header();
//$eid = json_decode($pdata->event_data);
$eid = $this->uri->segment(3);

$d = $this->db->get_where("tbl_schedule_dates",["id"=>$eid])->row();
$desdept = ($this->session->userdata("participant_type") == "participant") ? $pdata->designation.", ".$pdata->department.", " : $this->session->userdata("department");
?>
<!--<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">-->
<link href="https://blogfonts.com/css/aWQ9MTQ2MTk0JnN1Yj0xOTQmYz1iJnR0Zj1CUlVTSFNDSS5UVEYmbj1icnVzaC1zY3JpcHQtbXQ/Brush Script MT.ttf" rel="stylesheet" type="text/css"/>
<style type="text/css">

	.certificate{ 
		position: relative; 
		margin-top: 100px;
	} 				
		
	
	.nirf{ 
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-49%, -200%);
		width: 590px;
   }
	.nirf h2 {
	   	font-size: 27px !important;
	   	margin: 0px;
		color: #09487d!important;
		font-weight: 700!important;
		font-family: Arial!important;
		text-align: center!important;
		padding: 0px !important;
	}
	.nirf h3 {
	    font-size: 35px !important;
		color: #bc8631!important;
		font-weight: 700!important;
		font-family: Arial!important;
		text-align: center!important;
		text-transform: uppercase;
		margin: 0px;
	}
	
	.name{ 
		position: absolute;
		top: 50%;
		left: 50%;
	   	transform: translate(-49%, 8%);
		width: 889px;
	}
		
	.dir-sign{     
		position: absolute;
		top: 48%;
		left: 50%;
		transform: translate(-81%, 412%);
		width: 374px;
    }
		
	.com-sign{ 
		position: absolute;
		top: 61%;
		left: 50%;
		transform: translate(12%, 226%);
		width: 374px;
		overflow: hidden;
    }
	
	.serialnum{ 
		position: relative; 
		margin-top: 20px;
		font-size : 18px;
		color: #09487d!important;
		transform: translate(81%, 230%);
    	font-weight: 700;
		font-family: Arial !important;
	}
		
	.certificate p {
		display: block!important;
		width: 100%!important;
		padding: 6px 12px!important;
		font-size: 20px!important;
		line-height: 36px !important;
		color: #09487d!important;
		text-align: justify !important;
		font-family: Arial !important;
	}
	.certificate span {
		font-size: 18px;
		color: #09487d;
		border-bottom: 1px dashed #09487d;
		border-radius: 0px;
		font-weight: 600;
		font-family: Arial;
	}
</style>
 <section class="white-background black" id="inpage">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        
        <div class="certificate">
          <div class="nirf">
            <!--<h2>Awareness workshop </h2> <h3>NIRF INDIA RANKINGS - <? //echo $d->year; ?></h3> <h2>for Higher Educational Institutions</h2>-->
            
            <? echo $d->event_certificate_title; ?>
          </div>
          <div class="serialnum">Sl.No. : <? echo $pdata->serial_number ?></div>
          <div class="name">
            <p> This is to certify that Prof./Dr./Mr./Ms. <span > <? echo $this->session->userdata("name").", $desdept".$this->session->userdata("college_name"); ?> </span> has participated in the two day <strong>“<? echo $d->event_name ?>”</strong> held on-line on <? echo date("d",strtotime($d->event_start_date)).'th & '.date("d",strtotime($d->event_end_date)).'th '.date("F Y",strtotime($d->event_start_date)) ?> by Institute for Academic Excellence in collaboration with Collegiate Education & Technical Education Department, Govt. of Telangana. </p>
          </div>
          <img src="<? echo base_url('assets/') ?>IMG.jpg" class="img-responsive"/>
          <div class="com-sign"> <img src="<? echo base_url().$d->commissioner_signature ?>" /></div>
          <div class="dir-sign"> <img src="<? echo base_url().$d->director_signature ?>" /></div>
        </div>
        
      </div>
    </div>
    <div class="gap"> </div>
    
    <div class="row" align="center">
    	
    	<a class="btn btn-primary" href="<? echo base_url('webinar/download/').$eid ?>">Download</a>
    	<a class="btn btn-info" href="<? echo base_url('webinar/joinevent/').$eid ?>">Back</a>
    	
    </div>
    
  </div>
</section>
  
 <? front_footer() ?>

