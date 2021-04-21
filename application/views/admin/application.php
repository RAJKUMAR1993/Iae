<?php 
//error_reporting(E_ERROR | E_PARSE);
ob_clean();

date_default_timezone_set('Asia/Kolkata');

	$categories = json_decode($rdata->categories);
	$mds = json_decode($rdata->managementdetails);

	if(count($part) > 0){
															
		$participants = $this->db->get_where("tbl_participants",array("inst_id"=>$rdata->id))->result();

	}else{

		$participants = json_decode($rdata->participantsData);

	}
	
	$mpdf = new \mPDF('UTF-8', 'A4',30, 'dejavuserif');
	
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
</style>
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>';


	$html .= '
	
			<p style="text-align:center;font-size:22px"><strong>Organization Details</strong></p>
			<table class="table table-bordered">
			<tr>
				<td style="font-weight: bold;">Institution Name</td>
				<td>'.$rdata->institutionName.'</td>
				<td style="font-weight: bold;">Contact Mobile Number</td>
				<td>'.$rdata->mobile.'</td>

			</tr>
			<tr>
				<td style="font-weight: bold;">Contact Person Name</td>
				<td>'.$rdata->cpname.'</td>
				<td style="font-weight: bold;">Contact Person Email</td>
				<td>'.$rdata->email.'</td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Organization Email</td>
				<td>'.$rdata->orgemail.'</td>
				<td style="font-weight: bold;">Website</td>
				<td>'.$rdata->website.'</td>
			</tr>
			<tr>
				<td style="font-weight: bold;">Address</td>
				<td colspan="3">'.nl2br($rdata->address).'</td>
			</tr>';
	$html .= '<tr>
				<td style="font-weight: bold;">Categories:</td>
				<td colspan="3">';
				
						foreach ($categories as $c) {
							$html .= $c;
						}
					
	$html .=	'</td>
			</tr>';
	
	$html .= '<tr>
				<td style="font-weight: bold;">Management Details:</td>
				<td colspan="3">';
				
						foreach ($mds as $md) {
							$html .= $md;
						}
					
	$html .=	'</td>
			</tr>';

	$html .= '<tr>
				<td style="font-weight: bold;">Participants</td>
				<td colspan="3">

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

						<tbody>';

					$i = 1;
					foreach($participants as $p){

					$html .= '<tr>
								<td>'.$i.'</td>
								<td>'.$p->pname.'</td>
								<td>'.$p->pemail.'</td>
								<td>'.$p->pmobile.'</td>
								<td>'.$p->designation.'</td>
								<td>'.$p->department.'</td>
							  </tr>';

					$i++;
					}	
			$html .= '</tbody>

					</table>

				</td>
			</tr>

			<tr>';


	$html .= '<tr>
				<td style="font-weight: bold;">Payment Details</td>
				<td colspan="3">

					<table class="table table-bordered">

						<thead>
							<tr>
								<td>Order ID</td>
								<td>Amount</td>
								<td>Txn ID</td>
								<td>Payment Status</td>
								<td>Payment Mode</td>
								<td>Payment Date</td>
							</tr>
						</thead>

						<tbody>


							<tr>
								<td>'.$odata->order_id.'</td>
								<td><i class="fa fa-rupee"></i> '.$odata->total_amount.'</td>
								<td>'.$odata->txn_id.'</td>
								<td>'.$odata->payment_status.'</td>
								<td>'.$odata->payment_mode.'</td>
								<td>'.$odata->payment_date.'</td>
							</tr>

						</tbody>

					</table>

				</td>
			</tr>';

		
$html .=		
		
	
	'</table>
	
	
</body>
</html>';


//echo $html;

	$mpdf->WriteHTML($html);
	$mpdf->Output($rdata->institutionName.".pdf","D");

?>
