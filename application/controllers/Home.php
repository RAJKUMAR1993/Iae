<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->helper('captcha');
	}
	
	public function index()
	{
		//redirect("home/naac");
		$this->load->view('index',$data);
	}
	
	public function register($event=""){
		
		/*$package = $this->session->userdata("package");
		$pdata = json_decode($this->admin->get_option("packages"));
		
		$data["package"] = $pdata[$package];*/
		
		$event_id = explode("~",$event)[1];
		$event_name = str_replace("-"," ",explode("~",$event)[0]);
		$promo = $this->input->get("ref");
		
		$this->session->set_userdata(["event_id"=>$event_id,"event_name"=>$event_name,"promo_status"=>($promo == "promo") ? 'Active' : 'Inactive']);
		$data["edata"] = $this->db->get_where("tbl_schedule_dates",["id"=>$event_id])->row();
		
		if($data["edata"]->event_type == "RIPF"){
			$data["categories"] = $this->db->get_where("tbl_ripf_categories",["deleted"=>0])->result();
			$this->load->view("ripf/categories",$data);	
		}else{
			$data["form_data"] = $this->session->userdata("form_data");
			$this->load->view('registration',$data);
		}
	}
	
	public function termsconditions(){
		
		$this->load->view('terms-conditions');
		
	}
	
	public function about(){
		
		$this->load->view('about');
		
	}	
	
	public function privacypolicy(){
		
		$this->load->view('privacy-policy');
		
	}
	
	public function cancellationreturnpolicy(){
		
		$this->load->view('cancellation-return-policy');
		
	}
	
	public function disclaimer(){
		
		$this->load->view('disclaimer');
		
	}
	
	public function messages(){
		
		$this->load->view('testimonials');
		
	}
	
	public function services(){
		
		$this->load->view('services');
		
	}
	
	public function nirf($id){	
		$data["nirf"] = $this->db->get_where("tbl_event_schedule",array("event_id"=>$id))->row();	
		$sdata = $this->db->get_where("tbl_schedule_dates",["id"=>$id])->row();	
		$year = $sdata->year;	
		$guests = $this->db->order_by("id","desc")->get_where("tbl_guests")->result(); 	
		$gdata = [];	
	    foreach($guests as $g){ 	
		   if(in_array($id,json_decode($g->event_id))){	
			   $gdata[] = $g;	
		   }	
	    }	
		$speakers = $this->db->query("SELECT * FROM tbl_speakers ORDER BY id DESC ")->result();	
		$pdata = [];	
		$spkdata = [];		
		foreach($speakers as $sp){ 	
			if(in_array($id,json_decode($sp->event_id))){	
				$pdata[] = $sp;	
			}	
		 }	
		$data["guests"] = $gdata;	
		$data["speakers"] = $pdata;	
		$data["ydata"] = $sdata;	
		$data["data1"] = $this->db->order_by("schedule_start_time","asc")->get_where("tbl_schedule",["event_id"=>$id,"status"=>"Active"])->result();	
		$data["data2"] = $this->db->order_by("schedule_start_time","asc")->get_where("tbl_schedule",["event_id"=>$id,"status"=>"Active"])->result();	
		$this->load->view('nirf',$data);	
			
	}	
		
	public function naac($id){	
		$data["naac"] = $this->db->get_where("tbl_event_schedule",array("event_id"=>$id))->row();
		$sdata = $this->db->get_where("tbl_schedule_dates",["id"=>$id])->row();	
		$year = $sdata->year;	
		$guests = $this->db->order_by("id","desc")->get_where("tbl_guests")->result(); 	
		$gdata = [];	
	    foreach($guests as $g){ 	
		   if(in_array($id,json_decode($g->event_id))){	
			   $gdata[] = $g;	
		   }	
	    }	
			
		$speakers = $this->db->query("SELECT * FROM tbl_speakers ORDER BY id DESC ")->result();	
		$pdata = [];	
		$spkdata = [];		
		foreach($speakers as $sp){ 	
			if(in_array($id,json_decode($sp->event_id))){	
				$pdata[] = $sp;	
			}	
		 }	
		$data["guests"] = $gdata;	
		$data["speakers"] = $pdata;	
		$data["ydata"] = $sdata;	
		$data["data1"] = $this->db->order_by("schedule_start_time","asc")->get_where("tbl_schedule",["event_id"=>$id,"status"=>"Active"])->result();	
		$data["data2"] = $this->db->order_by("schedule_start_time","asc")->get_where("tbl_schedule",["event_id"=>$id,"status"=>"Active"])->result();	
		$this->load->view('naac',$data);	
			
	}	
		
	public function ripf($id){	
        
		$data["rcrgty"] = $this->db->from('tbl_streams')->where("status","Active")->like('events', $id)->get()->result();
		$data["rcategories"] = $this->db->get_where("tbl_ripf_categories",["deleted"=>0])->result(); 
		$data["ripf"] = $this->db->get_where("tbl_event_schedule",array("event_id"=>$id))->row();
		$sdata = $this->db->get_where("tbl_schedule_dates",["id"=>$id])->row();	
		$year = $sdata->year;	
		$guests = $this->db->order_by("id","desc")->get_where("tbl_guests")->result(); 	
		$gdata = [];	
	    foreach($guests as $g){ 	
		   if(in_array($id,json_decode($g->event_id))){	
			   $gdata[] = $g;	
		   }	
	    }	
		$speakers = $this->db->query("SELECT * FROM tbl_speakers ORDER BY id DESC ")->result();	
		$pdata = [];	
		$spkdata = [];		
		foreach($speakers as $sp){ 	
			if(in_array($id,json_decode($sp->event_id))){	
				$pdata[] = $sp;	
			}	
		 }	
		 $data["speakers"] = $pdata;	
		$data["guests"] = $gdata;	
		$data["speakers"] = $pdata;	
		$data["ydata"] = $sdata;	
		$data["data1"] = $this->db->order_by("schedule_start_time","asc")->get_where("tbl_schedule",["event_id"=>$id,"status"=>"Active"])->result();	
		$data["data2"] = $this->db->order_by("schedule_start_time","asc")->get_where("tbl_schedule",["event_id"=>$id,"status"=>"Active"])->result();	
		$this->load->view('ripf',$data);	
	}
	public function insertData(){
		
		$iname = $this->input->post("institutionName");
		$cpname = $this->input->post("cpname");
		$mobile = $this->input->post("mobile");
		$address = $this->input->post("address");
		$email = $this->input->post("email");
		$orgemail = $this->input->post("orgemail");
		$website = $this->input->post("website");
		$category = $this->input->post("category");
		$managementdetails = $this->input->post("managementdetails");
		$participants = $this->input->post("participants");
		$institution_type = $this->input->post("institution_type");
		$institution_subtype = $this->input->post("institution_subtype");
		$contact_person_designation = $this->input->post("contact_person_designation");
		$contact_person_department = $this->input->post("contact_person_department");
		
// participants data		
		
		$pname = $this->input->post("pname");
		$designation = $this->input->post("designation");
		$pmobile = $this->input->post("pmobile");
		$pemail = $this->input->post("pemail");
		
		$totalPrice = $this->input->post("totalPrice");
		$cyear = date("Y");
		
		/*$mochk = $this->db->get_where("tbl_registrations",array("mobile"=>$mobile,"YEAR(created_date)"=>$cyear))->num_rows();
		
		if($mochk >= 1){
			
			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-danger">Mobile Number already registered</div>'));
			echo '<div class="alert alert-danger">Mobile Number already registered</div>';
			exit();
//			redirect("home/register");
			
		}
		
		$emchk = $this->db->get_where("tbl_registrations",array("email"=>$email,"YEAR(created_date)"=>$cyear))->num_rows();
		
		if($emchk >= 1){
			
			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-danger">Email already registered</div>'));
			echo '<div class="alert alert-danger">Email already registered</div>';
			exit();
//			redirect("home/register");
			
		}
		
		$pdata = array();
		
		foreach($pname as $key => $val){
			
			$pdata[] = array(
		
				"pname" => $val,
				"designation" => $designation[$key],
				"pmobile" => $pmobile[$key],
				"pemail" => $pemail[$key]

			);
			
		}*/
		
		$edata = $this->db->get_where("tbl_schedule_dates",["id"=>$this->session->userdata("event_id")])->row();
		$idata = array(
		
			"institutionName" => $iname,
			"mobile" => $mobile,
			"cpname" => $cpname,
			"orgemail" => $orgemail,
			"address" => $address,
			"email" => $email,
			"website" => $website,
			"categories" => json_encode($category),
			"managementdetails" => json_encode($managementdetails),
			"participants" => $participants,
			"totalPrice" =>$totalPrice,
			"event_name" => $this->session->userdata("event_id"),
			"event_data" => json_encode($edata),
			"institution_type" => $institution_type,
			"institution_subtype" => $institution_subtype,
			"contact_person_designation" => $contact_person_designation,
			"contact_person_department" => $contact_person_department,
//			"participantsData" => json_encode($pdata)
			
		);
		
		$id = $this->db->insert("tbl_temp_registrations",$idata);
		$lid = $this->db->insert_id();
		
		if($id){
			
			$this->session->set_userdata("form_data",$idata);
			$mchk = $this->db->get_where("tbl_mobile_otp",array("mobile"=>$mobile))->num_rows();
			
			if($mchk > 0){
				$mdata = $this->db->get_where("tbl_mobile_otp",array("mobile"=>$mobile))->row();
				$msg = "Welcome to iae.education, Your OTP for registration is $mdata->otp, do not share this with anyone.";
				
				$this->secure->sms_otp($mobile,$msg);
				
			}else{
				
				$motp = random_string('numeric',4);
				$mo = $this->db->insert("tbl_mobile_otp",array("mobile"=>$mobile,"otp"=>$motp));
				
				if($mo){
					
					$msg = "Welcome to iae.education, Your OTP for registration is $motp, do not share this with anyone.";
					$this->secure->sms_otp($mobile,$msg);
					
				}
				
			}
			
			$echk = $this->db->get_where("tbl_email_otp",array("email"=>$email))->num_rows();
			
			if($echk > 0){
				
				$edata = $this->db->get_where("tbl_email_otp",array("email"=>$email))->row();
				$emsg = "Welcome to iae.education, <br>Your OTP for registration is $edata->otp, <br>do not share this with anyone.";
				$subject = "OTP Verification";
				
				$this->secure->send_email($email,$subject,$emsg);
				
			}else{
				
				$eotp = random_string('numeric',4);
				$eo = $this->db->insert("tbl_email_otp",array("email"=>$email,"otp"=>$eotp));
				
				if($eo){
					
					$subject = "OTP Verification";
					$emsg = "Welcome to iae.education, <br>Your OTP for registration is $eotp, <br>do not share this with anyone.";
					$this->secure->send_email($email,$subject,$emsg);
					
				}
				
			}
			
			$this->session->set_userdata(array("reg_id"=>$lid,"mobile"=>$mobile,"email"=>$email));
			
			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-success">OTP successfully sent to contact person email('.$email.') & mobile number('.$mobile.').</div>'));
			echo "success";
			exit();
//			redirect("home/verifyOtp");
				
		}else{
			
			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-danger">Error Occured</div>'));
			echo '<div class="alert alert-danger">Error Occured</div>';
			exit();
//			redirect("home/register");
			
		}
		
		
	}
	
	public function verifyOtp(){
		
		$this->load->view("verifyOtp");
		
	}
	
	public function confirmOtp(){
		
		$motp = $this->input->post("motp");
		$eotp = $this->input->post("eotp");
		
		$mobile = $this->session->userdata("mobile");
		$email = $this->session->userdata("email");
		
		$status = "";
		
		$mchk = $this->db->order_by("id","desc")->get_where("tbl_mobile_otp",array("mobile"=>$mobile,"otp"=>$motp))->num_rows();
		
		if($mchk == 1){
			
		}else{
			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-danger">Mobile OTP is wrong</div>'));
			redirect("home/verifyOtp");
		}
		
		$echk = $this->db->order_by("id","desc")->get_where("tbl_email_otp",array("email"=>$email,"otp"=>$eotp))->num_rows();
		
		if($echk == 1){
		
		}else{
			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-danger">Email OTP is wrong</div>'));
			redirect("home/verifyOtp");
		}
		
		if($mchk == 1 && $echk == 1){
			
			$this->db->delete("tbl_mobile_otp",array("mobile"=>$mobile));
			$this->db->delete("tbl_email_otp",array("email"=>$email));
			
			if($this->session->userdata("event_type") == "RIPF"){
				redirect("payment/ripfpayment");
			}else{
				redirect("payment");
			}
			
		}else{
			
			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-danger">Error Occured</div>'));
			redirect("home/verifyOtp");
			
		}
		
	}
	
	
	public function send(){
		
	$rdata = $this->db->get_where("tbl_temp_registrations",array("id"=>7))->row();	
		
		$categories = json_decode($rdata->categories);
		$managementdetails = json_decode($rdata->managementdetails);
		$participants = json_decode($rdata->participantsData);
		
		
			$html = 		'<!DOCTYPE html>
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
		Your registration for participation in Two Day National Workshop on Quality Enhancement Measures in Higher, Technical, Professional and Management Education with a Special Focus on NIRF Ranking has been completed successfully.<br><br>
		
	</p>
	
	
	<p style="font-size:18px;font-weight:bold;text-align:center">Acknowledgement Details</p>		
	<table width="900px" border="1px">
		<tbody>
			<tr>
				<td width="25%"><strong>Institution Name</strong></td>
				<td width="25%">'.$rdata->institutionName.'</td>
				<td width="25%"><strong>Mobile Number</strong></td>
				<td width="25%">'.$rdata->mobile.'</td>
			</tr>
			<tr>
				<td width="25%"><strong>Email</strong></td>
				<td width="25%">'.$rdata->email.'</td>
				<td width="25%"><strong>Website</strong></td>
				<td width="25%">'.$rdata->website.'</td>
			</tr>
			<tr>
				<td><strong>Address</strong></td>
				<td colspan="3">'.nl2br($rdata->address).'</td>
				
			</tr>
			<tr>
				<td><strong>Categories</strong></td>
				<td colspan="3">
					'.implode(",",$categories).'
				</td>
				
			</tr>
			<tr>
				<td><strong>Management Details</strong></td>
				<td colspan="3">'.implode(",",$managementdetails).'</td>
				
			</tr>
			<tr>

				<td style="font-weight: bold;">Participants</td>
				<td colspan="3">

					<table>

						<thead>
							<tr>
								<td><strong>Sno</strong></td>
								<td><strong>Name</strong></td>
								<td><strong>Email</strong></td>
								<td><strong>Mobile</strong></td>
								<td><strong>Designation</strong></td>
							</tr>
						</thead>

						<tbody>';
		$i = 1;  		
		foreach($participants as $p){
			
		$html .=		   '<tr>
								<td>'.$i.'</td>
								<td>'.$p->pname.'</td>
								<td>'.$p->pmobile.'</td>
								<td>'.$p->pemail.'</td>
								<td>'.$p->designation.'</td>
							</tr>';
		$i++;
		}
			
		$html .=		'</tbody>

					</table>

				</td>
			</tr>
			
			<tr>

				<td style="font-weight: bold;">Payment Details</td>
				<td colspan="3">

					<table class="table table-bordered">

						<thead>
							<tr>
								<td><strong>Order ID</strong></td>
								<td><strong>Amount</strong></td>
								<td><strong>Txn ID</strong></td>
								<td><strong>Payment Status</strong></td>
								<td><strong>Payment Date</strong></td>
							</tr>
						</thead>

						<tbody>


							<tr>
								<td>5346534354</td>
								<td>'.$rdata->totalPrice.' Rs/-</td>
								<td>54354857468</td>
								<td>Success</td>
								<td>'.date("Y-m-d H:i:s").'</td>
							</tr>

						</tbody>

					</table>

				</td>
			</tr>
			
			
		</table>
		
		<p>
		
			<strong>Venue:</strong><br>
			UGC MINI Auditorium,<br>
			Jawaharlal Nehru Technological University (JNTUH) Hyderabad,<br>
			Kukatpally, Hyderabad - 500 085, Telangana, India<br><br>

			<strong>Date & Time:</strong><br>
			18th & 19th October 2019<br>
			10AM - 6PM<br><br>

			We look forward to hosting you!<br><br>

			Regards<br>
			Team IAE<br><br>
			<img src="http://iae.education/assets/images/KAB_PDFLOGO.png" style="width:10%"><br>

			<strong>Institute for Academic Excellence</strong><br><br>
			#3-6-692, Street No.12, Himayathnagar,<br>
			Hyderabad - 500029, Telangana.<br>
			+91-9618739900, +91-9491088493, +91-7702078493.<br><br>

			Email : <a href="mailto:info@iae.education">info@iae.education</a><br>
			Website: <a href="www.iae.education">www.iae.education</a>
		
		</p>
	
	</body>
</html>';

		echo $html;
		
//		exit();
		
//		echo $this->secure->sms_trans("7416232629","4563543");
		echo $this->secure->send_email("sakaraviteja.s@gmail.com","test",$html);
		
		
	}
	
	public function speaker($id){
		
		$data["p"] = $this->db->get_where("tbl_speakers",array("route"=>$id))->row();
		$this->load->view("profile",$data);
		
	}
	
	public function speakers($id){	
		$speakers = $this->db->query("SELECT * FROM tbl_speakers ORDER BY sorting_order DESC ")->result();	
		$pdata = [];	
		$spkdata = [];		
		foreach($speakers as $sp){ 	
			if(in_array($id,json_decode($sp->event_id))){	
				$pdata[] = $sp;	
			}	
		 }	
		 $data["speak"] = $pdata;	
		$this->load->view("speakers",$data);	
			
	}
	public function downloads_event(){
		
		$this->load->view('downloads/downloads_events',$data);
		
	}
	
	public function downloads($year = ""){
		
		 $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'font_path'     => base_url().'captcha_images/fonts/verdana.ttf',
            'img_width'     => '160',
            'img_height'    => 50,
            'word_length'   => 6,
            'font_size'     => 30
        );
        $captcha = create_captcha($config);
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);
        $data['captchaImg'] = $captcha['image']; 
		
		if($year){
			
			$this->db->where("event_id",$year);
			
		}
		$data["downloads"] = $this->db->get_where("tbl_downloads")->result();
		$this->load->view('downloads',$data);
		
	}
	public function refresh(){
        $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'font_path'     => base_url().'captcha_images/fonts/verdana.ttf',
            'img_width'     => '160',
            'img_height'    => 50,
            'word_length'   => 6,
            'font_size'     => 30
        );
        $captcha = create_captcha($config);
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        echo $captcha['image'];
    }
	public function users_download(){
		    $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode'); 
			if($this->input->post('name') == ""){
				echo "name";
			}
			elseif($this->input->post('email') == ""){
				echo "email";
			}
			elseif($this->input->post('phone') == ""){
				echo "phone";
			}
            elseif($inputCaptcha === $sessCaptcha){
                    $data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'ip' => $this->input->ip_address()
					);
					$result = $this->db->insert("tbl_users_download",$data);
					echo "sucess";
            }else{
                echo 'captcha';
            }
	}
	public function gallery(){
//		$data["gallery"] = $this->db->order_by("img_id","desc")->get_where("tbl_gallery")->result();
		$this->load->view('gallery');
		
	}
	
	public function galleryImages($id){
		
		$data["gallery"] = $this->db->where(array("gallery_title"=>$id,"deleted"=>0,"type"=>"image"))->get("tbl_gallery")->result();
		$this->load->view('galleryImages');
		
	}
	public function galleryVideos($id){
		
		$data["gallery"] = $this->db->where(array("gallery_title"=>$id,"deleted"=>0,"type"=>"video"))->get("tbl_gallery")->result();
		$this->load->view('galleryVideos');
		
	}
	public function experts(){
		$data["pdata"] = $this->db->order_by("sorting_order","asc")->get_where("tbl_experts",array("status"=>"Active"))->result();
		$this->load->view('experts',$data);
	}
	public function experts_detail($id){
		$data["p"] = $this->db->get_where("tbl_experts",array("ex_id"=>$id))->row();
		$this->load->view('experts',$data);
	}
	public function advisors(){
		$data["pdata"] = $this->db->order_by("sorting_order","asc")->get_where("tbl_advisors",array("status"=>"Active"))->result();
		$this->load->view('advisors',$data);
	}
	public function advisors_detail($id){
		$data["p"] = $this->db->get_where("tbl_advisors",array("ad_id"=>$id))->row();
		$this->load->view('advisors',$data);
	}
	public function team(){
		$data["pdata"] = $this->db->order_by("sorting_order","asc")->get_where("tbl_team",array("status"=>"Active"))->result();
		$this->load->view('team',$data);
	}
	public function team_detail($id){
		$data["p"] = $this->db->get_where("tbl_team",array("t_id"=>$id))->row();
		$this->load->view('team',$data);
	}
	public function field_expert(){
		$data["pdata"] = $this->db->order_by("f_id","desc")->get_where("tbl_field_expert",array("status"=>"Active"))->result();
		$this->load->view('field_expert',$data);
	}
	public function field_expert_detail($id){
		$data["p"] = $this->db->get_where("tbl_field_expert",array("f_id"=>$id))->row();
		$this->load->view('field_expert',$data);
	}
	public function new_testimonals(){
		
		$this->load->view('new_testimonals');
		
	}
	
	public function store_download(){
		
		$ip_addr = $this->input->ip_address();
		$geolocation = $this->admin->getGeo($ip_addr);
		$file_name = $this->input->post("file_name");
		$date = date("Y-m-d");
		
		$ddata = $this->db->get_where("tbl_users_download",array("ip"=>$ip_addr))->row();
		$data = ["file_name"=>$file_name,"location"=>$geolocation,"downloaded_date"=>$date,"name"=>$ddata->name,"email"=>$ddata->email,"phone"=>$ddata->phone,"ip"=>$ip_addr];
		
		$this->db->insert("tbl_users_download",$data);
		
	}
	
	public function get_subtypes(){
		$institution_type = $this->input->post("institution_type");
		$managementdetails = $this->input->post("managementdetails");
		
		$stypes = $this->db->get_where("tbl_institution_types",["type"=>$institution_type])->row();
		
		$sub_types = '<option value="">Select Sub Institution Type</option>';
		foreach(json_decode($stypes->sub_types) as $st){
			$sub_types .= '<option value="'.$st.'">'.$st.'</option>';
		}
		
		$discount_charges = json_decode($this->admin->get_option("discount"));
		
		$amount = $stypes->amount;
		if($managementdetails){
			$discount = ($amount/100)*($discount_charges[0]->$managementdetails);
		}else{
			$discount = 0;
		}
		$total = ($amount-$discount);
		
		echo json_encode(["status"=>"success","participants"=>$stypes->participants,"amount"=>$amount,"sub_types"=>$sub_types,"discount"=>$discount,"total"=>$total]);
	}
	
	public function test(){
		
		//$emsg = "Welcome to iae.education, <br>Your OTP for registration is 1234, <br>do not share this with anyone.";
		//$subject = "OTP Verification";

		//$this->secure->send_email("sakaraviteja.s@gmail.com",$subject,$emsg);
		
		$this->secure->sms_otp("917416232629","hello");
		
	}
}
