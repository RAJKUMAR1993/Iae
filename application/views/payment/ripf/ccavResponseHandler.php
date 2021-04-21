<?php 
	include('Crypto.php');
	//error_reporting(0);.
require_once(APPPATH.'libraries/sendinblue/Mailin.php');

//date_default_timezone_set('Asia/Kolkata');

//	$workingKey='C6B73D4C552683B50A859D3E0C449D33';		//test key


	$workingKey='449E060CE890459DE29D0679E455742D';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	

//	$order_status="Success";
//	$tracking_id = "IRO4719294";
//	$bank_ref_no = "62174436814";
//	$order_id = "ORD3401625";
//	$payment_mode = "online";


	$order_status="";
	$tracking_id = "";
	$bank_ref_no = "";
	$order_id = "";
	$payment_mode = "";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==0) $order_id = $information[1];
		if($i==1) $tracking_id = $information[1];
		if($i==2) $bank_ref_no = $information[1];
		if($i==3) $order_status = $information[1];
		if($i==5) $payment_mode = $information[1];
	}

	$odata = $this->db->get_where("tbl_ripf_orders",array("order_id"=>$order_id))->row();

	$oid = $odata->order_id;
	$reg_id = $odata->temp_registration_id;
	$rdata = $this->db->get_where("tbl_ripf_registrations",array("id"=>$reg_id))->row();
			
		$mobile = $rdata->mobile;
		$email = $rdata->email;
		
		$categories = json_decode($rdata->categories);
		$managementdetails = json_decode($rdata->managementdetails);
		$edata = $this->db->get_where("tbl_schedule_dates",["id"=>$rdata->event_name])->row();


	if($order_status==="Success")
	{
		
		$this->session->set_flashdata(array("payment_status"=>'<div class="alert alert-success alert-dismissible">Your Payment Has Been Successfully Done.</div>'));
		
		
		$data = array("txn_id"=>$tracking_id,"bank_ref_no"=>$bank_ref_no,"payment_status"=>"Success","payment_date"=>date("Y-m-d H:i:s"),"payment_mode"=>$payment_mode);
		
		$this->db->set($data);
		$this->db->where("order_id",$oid);
		$this->db->update("tbl_ripf_orders");
		
		$year = $edata->year;
		
		$iserial = $this->admin->generateripfSerialnumber($year);
		
		$idata = array(
			"serial_number" => $iserial,
			"registration_status" => "Active",
			"order_id"=>$order_id
		);
		
		$iins = $this->db->where("id",$reg_id)->update("tbl_ripf_registrations",$idata);
		
		if($iins){
			
			$this->session->set_userdata(["participant_email"=>$email,"participant_mobile"=>$mobile,"participant_type"=>$rdata->event_category,"id"=>$reg_id,"name"=>$rdata->cpname,"reg_year"=>$year,"event_id"=>$rdata->event_name,"institute_name"=>$rdata->institutionName,""]);
			
			
			$html ='<!DOCTYPE html>
<html>
<head>
<style>
tr,td{

	font-size:16px;
	padding:5px;

}

</style>
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body >
	
	';


	$html .= '
	
	<p>Dear '.$rdata->cpname.',<br><br>		
		Your registration for participation in <strong>'.$edata->event_name.'</strong> has been completed successfully.<br><br>
		
	</p>
	
	
	<p style="font-size:18px;font-weight:bold;text-align:center">Acknowledgement Details</p>		
	<table width="900px" border="1px">
		<tbody>';
			
			$html .= $this->admin->get_eventtype_data($reg_id);
			
			$html .= '<tr>

				<td style="font-weight: bold;">Payment Details</td>
				<td colspan="3">

					<table class="table table-bordered">

						<thead>
							<tr>
								<td><strong>Order ID</strong></td>
								<td><strong>Amount in Rs</strong></td>
								<td><strong>Transaction ID</strong></td>
								<td><strong>Payment Status</strong></td>
								<td><strong>Payment Date</strong></td>
							</tr>
						</thead>

						<tbody>


							<tr>
								<td>'.$order_id.'</td>
								<td>Rs.'.$rdata->totalPrice.' /-</td>
								<td>'.$tracking_id.'</td>
								<td>Success</td>
								<td>'.date("Y-m-d H:i:s").'</td>
							</tr>

						</tbody>

					</table>

				</td>
			</tr>
			
			
		</table>
		
		<p>
		
			<strong>Date & Time:</strong><br>
			'.$this->admin->get_ordinal_suffix(date("d",strtotime($edata->event_start_date))).' - '.$this->admin->get_ordinal_suffix(date("d",strtotime($edata->event_end_date))).' '.date("F Y",strtotime($edata->event_start_date)).'<br>
			'.date("h-i A",$edata->event_start_time)." - ".date("h-i A",$edata->event_end_time).'<br><br>
			Regards<br>
			Team IAE<br><br>
			
			<img src="'.base_url('assets/images/logo.png').'" style="width:30%"><br>
			<strong>Institute for Academic Excellence</strong><br><br>
			#3-6-692, Street No.12, Himayathnagar,<br>
			Hyderabad - 500029, Telangana.<br>
			Mobile No.: '.$edata->mobile_numbers.'.<br>
			Phone No.: '.$edata->phone_number.'<br>
			WhatsApp: '.$edata->whatsapp_number.'<br><br>

			Email : <a href="mailto:'.$edata->event_email.'">'.$edata->event_email.'</a><br>
			Website: <a href="www.iae.education">www.iae.education</a>
		
		</p>
	
	</body>
</html>';
			
			$subject = "IAE - $edata->event_name Registration Confirmation";

			$this->secure->send_email($email,$subject,$html);
			
			
			$msg = "Dear $rdata->cpname,
Your registration for participation in $edata->event_name has been completed successfully.
Team IAE
www.iae.education
";
			$this->secure->sms_otp($mobile,$msg);
			
			
		}
		
		$this->session->unset_userdata("ripf_form_data");
		redirect("payment/ripfpayment_success");
		
	}
	else
	{
		$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-danger">Payment Failed</div>'));
		
		$data = array("payment_status"=>"Failed");
		
		$this->db->set($data);
		$this->db->where("order_id",$oid);
		$this->db->update("tbl_ripf_orders");
		
		
		$this->db->where("id",$reg_id)->update("tbl_ripf_registrations",array("order_id"=>$order_id));
		
		$html = '<!DOCTYPE html>
<html>
<head>
<style>
tr,td{

	font-size:16px;
	padding:5px;

}

</style>
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body >
	
	';


	$html .= '
	
	<p>Dear '.$rdata->cpname.',<br><br>		
		Your registration for participation in <strong>'.$edata->event_name.'</strong> has been failed.<br><br>
		
	</p>
	
	
	
	</body>
</html>';
			$subject = "IAE - $edata->event_name Registration Confirmation";

			$this->secure->send_email($email,$subject,$html);
			
			
			$msg = "Dear $rdata->cpname,
Your registration for participation in $edata->event_name  has been failed.
Team IAE
www.iae.education
";
			$this->secure->sms_otp($mobile,$msg);
		
		redirect("webinar");
	}

//	echo "<br><br>";
//
//	echo "<table cellspacing=4 cellpadding=4>";
//	for($i = 0; $i < $dataSize; $i++) 
//	{
//		$information=explode('=',$decryptValues[$i]);
//	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
//	}
//
//	echo "</table><br>";
//	echo "</center>";
?>

