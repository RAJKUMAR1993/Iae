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
//	$tracking_id = "IRO4719298";
//	$bank_ref_no = "62174436804";
//	$order_id = "ORD7614832";
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


	$odata = $this->db->get_where("tbl_orders",array("order_id"=>$order_id))->row();

	$oid = $odata->order_id;
	$reg_id = $odata->temp_registration_id;
	$rdata = $this->db->get_where("tbl_temp_registrations",array("id"=>$reg_id))->row();
			
		$mobile = $rdata->mobile;
		$email = $rdata->email;
		
		$categories = json_decode($rdata->categories);
		$managementdetails = json_decode($rdata->managementdetails);
		$edata = json_decode($rdata->event_data);
//		$participants = json_decode($rdata->participantsData);

	if($order_status==="Success")
	{
		
		$this->session->set_flashdata(array("payment_status"=>'<div class="alert alert-success alert-dismissible">Your Payment Has Been Successfully Done.</div>'));
		
		
		$data = array("txn_id"=>$tracking_id,"bank_ref_no"=>$bank_ref_no,"payment_status"=>"Success","payment_date"=>date("Y-m-d H:i:s"),"payment_mode"=>$payment_mode);
		
		$this->db->set($data);
		$this->db->where("order_id",$oid);
		$this->db->update("tbl_orders");
		
		$year = $this->db->where("registration_start_date <=",date("Y-m-d"))->where("registration_end_date >=",date("Y-m-d"))->get_where("tbl_schedule_dates")->row()->year;
		
		$iserial = $this->admin->generateSerialnumber($year);
		
		$idata = array(
			"institutionName" => $rdata->institutionName,
			"mobile" => $mobile,
			"orgemail" => $rdata->orgemail,
			"address" => $rdata->address,
			"email" => $email,
			"website" => $rdata->website,
			"categories" => $rdata->categories,
			"managementdetails" => $rdata->managementdetails,
			"participants" => $rdata->participants,
			"totalPrice" => $rdata->totalPrice,
			"order_id" => $order_id,
			"cpname" => $rdata->cpname,
			"created_date" => date("Y-m-d H:i:s"),
			"register_year" => ($year != "") ? $year : date("Y"),
			"serial_number" => $iserial,
			"event_name" => $rdata->event_name,
			"event_data" => $rdata->event_data,
			"institution_type" => $rdata->institution_type,
			"institution_subtype" => $rdata->institution_subtype,
			"contact_person_designation" => $rdata->contact_person_designation,
			"contact_person_department" => $rdata->contact_person_department,
		);
		
		$iins = $this->db->insert("tbl_registrations",$idata);
		$iid = $this->db->insert_id();
		
		if($iins){
			
			$this->db->where("id",$reg_id)->update("tbl_temp_registrations",array("order_id"=>$order_id));
			
			$this->session->set_userdata(["participant_email"=>$email,"participant_mobile"=>$mobile,"participant_type"=>"institute","id"=>$iid,"name"=>$rdata->cpname,"reg_year"=>$year,"category"=>json_decode($rdata->categories),"college_name"=>$rdata->institutionName,"event_id"=>$rdata->event_name]);
			
			/*$pdata = json_decode($rdata->participantsData);
			
			foreach($pdata as $pd){
				$pserial = $this->admin->generateSerialnumber($year);
				$parData = array(
				
					"inst_id" => $iid,
					"pname" => $pd->pname,
					"designation" => $pd->designation,
					"pmobile" => $pd->pmobile,
					"pemail" => $pd->pemail,
					"serial_number" => $pserial
				
				);
				
				$this->db->insert("tbl_participants",$parData);
				
			}*/
			
			
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
		Your registration for participation in Two Day National Workshop on <strong>'.$edata->event_name.'</strong> has been completed successfully.<br><br>
		
	</p>
	
	
	<p style="font-size:18px;font-weight:bold;text-align:center">Acknowledgement Details</p>		
	<table width="900px" border="1px">
		<tbody>
			<tr>
				<td width="50%"><strong>Name of the Institution/Organization:</strong></td>
				<td colspan="3">'.$rdata->institutionName.'</td>
			</tr>
			<tr>
				<td width="25%"><strong>Organization Email ID:</strong></td>
				<td width="25%">'.$rdata->orgemail.'</td>
				<td width="25%"><strong>Website</strong></td>
				<td width="25%">'.$rdata->website.'</td>
			</tr>
			<tr>
				<td><strong>Address for Correspondence:</strong></td>
				<td colspan="3">'.nl2br($rdata->address).'</td>
				
			</tr>
			
			<tr>
				<td><strong>Name of the Contact Person:</strong></td>
				<td colspan="3">'.$rdata->cpname.'</td>
				
			</tr>
			<tr>
				<td width="25%"><strong>Contact Person’s Mobile No.:</strong></td>
				<td width="25%">'.$rdata->mobile.'</td>
				<td width="25%"><strong>Contact Person’s Email ID:</strong></td>
				<td width="25%">'.$rdata->email.'</td>
			</tr>
			<tr>
				<td width="25%"><strong>Contact Person’s Designation.:</strong></td>
				<td width="25%">'.$rdata->contact_person_designation.'</td>
				<td width="25%"><strong>Contact Person’s Department:</strong></td>
				<td width="25%">'.$rdata->contact_person_department.'</td>
			</tr>
			<tr>
				<td width="25%"><strong>Management Details</strong></td>
				<td width="75%">
					'.implode(",",$managementdetails).'
				</td>
			</tr>
			
			<tr>

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
			'.$this->admin->get_ordinal_suffix(date("d",strtotime($edata->event_start_date))).' & '.$this->admin->get_ordinal_suffix(date("d",strtotime($edata->event_end_date))).' '.date("F Y",strtotime($edata->event_start_date)).'<br>
			'.date("h-i A",$edata->event_start_time)." - ".date("h-i A",$edata->event_end_time).'<br><br>
			Regards<br>
			Team IAE<br><br>
			
			<img src="'.base_url('assets/images/logo.png').'" style="width:60%"><br>
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
Your registration for participation in Two Day $edata->event_name has been completed successfully.
Team IAE
www.iae.education
";
			$this->secure->sms_otp($mobile,$msg);
			
			
		}
		
		$this->session->unset_userdata("form_data");
		redirect("payment/payment_success");
		
	}
	else
	{
		$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-danger">Payment Failed</div>'));
		
		$data = array("payment_status"=>"Failed");
		
		$this->db->set($data);
		$this->db->where("order_id",$oid);
		$this->db->update("tbl_orders");
		
		
		$this->db->where("id",$reg_id)->update("tbl_temp_registrations",array("order_id"=>$order_id));
		
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
		Your registration for participation in Two Day National Workshop on <strong>'.$edata->event_name.'</strong> has been failed.<br><br>
		
	</p>
	
	
	<p style="font-size:18px;font-weight:bold;text-align:center">Acknowledgement Details</p>		
	<table width="900px" border="1px">
		<tbody>
			<tr>
				<td width="50%"><strong>Name of the Institution/Organization:</strong></td>
				<td colspan="3">'.$rdata->institutionName.'</td>
			</tr>
			<tr>
				<td width="25%"><strong>Organization Email ID:</strong></td>
				<td width="25%">'.$rdata->orgemail.'</td>
				<td width="25%"><strong>Website</strong></td>
				<td width="25%">'.$rdata->website.'</td>
			</tr>
			<tr>
				<td><strong>Address for Correspondence:</strong></td>
				<td colspan="3">'.nl2br($rdata->address).'</td>
				
			</tr>
			
			<tr>
				<td><strong>Name of the Contact Person:</strong></td>
				<td colspan="3">'.$rdata->cpname.'</td>
				
			</tr>
			<tr>
				<td width="25%"><strong>Contact Person’s Mobile No.:</strong></td>
				<td width="25%">'.$rdata->mobile.'</td>
				<td width="25%"><strong>Contact Person’s Email ID:</strong></td>
				<td width="25%">'.$rdata->email.'</td>
			</tr>
			<tr>
				<td width="25%"><strong>Contact Person’s Designation.:</strong></td>
				<td width="25%">'.$rdata->contact_person_designation.'</td>
				<td width="25%"><strong>Contact Person’s Department:</strong></td>
				<td width="25%">'.$rdata->contact_person_department.'</td>
			</tr>
			<tr>
				<td width="25%"><strong>Management Details</strong></td>
				<td width="75%">
					'.implode(",",$managementdetails).'
				</td>
			</tr>
			
			<tr>

				<td style="font-weight: bold;">Payment Details</td>
				<td colspan="3">

					<table class="table table-bordered">

						<thead>
							<tr>
								<td><strong>Order ID</strong></td>
								<td><strong>Amount in Rs</strong></td>
								<td><strong>Payment Status</strong></td>
								<td><strong>Payment Date</strong></td>
							</tr>
						</thead>

						<tbody>


							<tr>
								<td>'.$order_id.'</td>
								<td>Rs.'.$rdata->totalPrice.' /-</td>
								<td>Failed</td>
								<td>'.date("Y-m-d H:i:s").'</td>
							</tr>

						</tbody>

					</table>

				</td>
			</tr>
			
			
		</table>
		
		<p>
		
			<strong>Date & Time:</strong><br>
			'.$this->admin->get_ordinal_suffix(date("d",strtotime($edata->event_start_date))).' & '.$this->admin->get_ordinal_suffix(date("d",strtotime($edata->event_end_date))).' '.date("F Y",strtotime($edata->event_start_date)).'<br>
			'.date("h-i A",$edata->event_start_time)." - ".date("h-i A",$edata->event_end_time).'<br><br>
			Regards<br>
			Team IAE<br><br>
			
			<img src="'.base_url('assets/images/logo.png').'" style="width:60%"><br>
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
Your registration for participation in Two Day $edata->event_name  has been failed.
Team IAE
www.iae.education
";
			$this->secure->sms_otp($mobile,$msg);
		
		
		redirect("home/register");
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

