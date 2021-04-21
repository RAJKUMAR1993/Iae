<?php 
ob_clean();

date_default_timezone_set('Asia/Kolkata');
//$eid = json_decode($pdata->event_data);
$eid = $this->uri->segment(3);
$d = $this->db->get_where("tbl_schedule_dates",["id"=>$eid])->row();
$desdept = ($this->session->userdata("participant_type") == "participant") ? $pdata->designation.", ".$pdata->department.", " : '';

/*
$pdf = new FPDF();
$pdf->AddPage("L");
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(9,72,125);

$pdf->Image("assets/IMG.jpg",8,5,285,0);
$pdf->Image("assets/Venkateshsign.png",86,168,30,0);
$pdf->Image("assets/Navinsign.png",175,162,30,0);
$pdf->Text(125,113,ucwords(strtolower($this->session->userdata("name"))).", ".ucwords(strtolower($this->session->userdata("department"))).", ");

//$pdf->SetFont('Arial','B',9);
//$pdf->Text(15,113,ucwords(strtolower($this->session->userdata("department"))).", ");
//$pdf->SetFont('Arial','B',13);

$pdf->Text(44,122,ucwords(strtolower($this->session->userdata("college_name").".")));
$pdf->Text(246,18,"Sl.No. : $pdata->serial_number");
$pdf->Output("NIRF".$this->session->userdata("reg_year")."_Certificate.pdf","D");
*/


$mpdf = new \mPDF('UTF-8', 'A4-L');
$mpdf->showImageErrors = true;	
	$html = 


'<!DOCTYPE html>
<html>
<head>
<style>
tr,td{

	font-size:16px;
	padding:5px;

}
table,td,th{
	border-collapse:collapse !important;
	border : 1px solid black;

}
				
	
.nirf{ 

float:left;
padding-top:120px;
padding-left:230px;
    width: 590px;
	font-weight:bold;
	
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
	 float:left;
    width: 889px;
}
		
.dir-sign{     
	 float:left;
    width: 374px;
	padding-left:230px;
	padding-top:8px;
}
		
.com-sign{ 
	float:left;
    width: 18%;
    padding-left:-50px;
	padding-top:0px;
}
.serialnum{ 
	float:left;
    width: 374px;
	padding-left:840px;
	padding-top:-230px;
	font-size : 18px;
	color: #09487d!important;
}	
	
.certificate p {
    display: block!important;
    width: 100%!important;
    padding: 6px 12px!important;
    font-size: 16px!important;
    line-height: 32px !important;
    color: #09487d!important;
	margin-top:110px;
	margin-left:100px;
	text-align: justify !important; 
    font-family: Arial !important;
	height : 190px;
}
	
.certificate span {
    font-size: 18px;
    color: #09487d;
    border-bottom: 1px dashed #09487d;
    border-radius: 0px;
    font-weight: 600;
    font-family: Arial;
}
.certificate{position:relative;}
body{
	
}

</style>
<link rel="stylesheet" type="text/css" href="'.base_url('assets/').'library/bootstrap/css/bootstrap.css">

</head>

<body style="background:url(\'assets/IMG.jpg\') left top no-repeat;background-size:cover;">
		<div class="certificate">
          <div class="nirf">
            '.$d->event_certificate_title.'
          </div>
		  <div class="serialnum">
            <div class="name-control"><strong>Sl.No. : '.$pdata->serial_number.'</strong></div>
          </div>
          <div class="name">
            <p style="font-family: Arial !important;"> This is to certify that Prof./Dr./Mr./Ms. <span ><strong> '.$this->session->userdata("name").', '.$desdept.', '.$this->session->userdata("college_name").' </strong></span> has participated in the two day <strong>“Awareness workshop - NIRF INDIA RANKINGS - '.$d->year.' for Higher Educational Institutions”</strong> held on-line on '.date("d",strtotime($d->event_start_date)).'th & '.date("d",strtotime($d->event_end_date)).'th '.date("F Y",strtotime($d->event_start_date)).' by Institute for Academic Excellence in collaboration with Collegiate Education & Technical Education Department, Govt. of Telangana. </p>
          </div>
          <div class="dir-sign"> <img src="'.$d->director_signature.'" /></div>
          <div class="com-sign"> <img src="'.$d->commissioner_signature.'" /></div>
        </div>
      </div>
</body>
</html>';


//echo $html;

	$mpdf->WriteHTML($html);
	$mpdf->Output("NIRF".$this->session->userdata("reg_year")."_Certificate.pdf","D");

?>
