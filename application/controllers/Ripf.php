<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ripf extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function register($cid,$event){
		
		$event_id = explode("~",$event)[1];
		$event_name = str_replace("-"," ",explode("~",$event)[0]);
		$data["edata"] = $this->db->get_where("tbl_schedule_dates",["id"=>$event_id])->row();
		$category = str_replace("-"," ",$cid);
		$data["streams"] = $this->db->from('tbl_streams')->like('events', $id)->get()->result();
		$data["cdata"] = $this->db->get_where("tbl_ripf_categories",["category_name"=>$category])->row();
		$this->load->view('ripf/ripfregistration',$data);
		
	}
	
	public function getPrice(){
		
		$topics = $this->input->post("topics");
		$category = $this->input->post("category");
		$caste = $this->input->post("caste");
		$gender = $this->input->post("gender");
		$physically_challenged = $this->input->post("physically_challenged");
		$managementdetails = $this->input->post("managementdetails");
		
		$discount = false;
		$gdiscount = false;
		if(($caste == "SC") || ($caste == "ST") || ($caste == "OBC")){
			$discount = true;
		}
		if($physically_challenged == "Yes"){
			$discount = true;
		}
		if($gender == "Female"){
			$gdiscount = true;
		}
		
		$amount = 0;
		foreach($topics as $t){
			if($t == "all"){
				$amount = $this->db->get_where("tbl_ripf_categories",["id"=>$category])->row()->overall_discount_amount;
			}else{
				$amount += $this->db->get_where("tbl_ripf_topics",["topic_name"=>$t,"ripf_category"=>$category])->row()->amount;
			}
		}
		
		$discount_charges = json_decode($this->admin->get_option("ripf_discount"));
		if($managementdetails){
			$discount_amount = ($amount/100)*($discount_charges[0]->$managementdetails);
		}
		
		if($gdiscount){
			$discount_amount = ($amount/100)*25;
		}
		if($discount){
			$discount_amount = ($amount/100)*25;
		}
		
		$total_amount = ($amount - $discount_amount);
		echo json_encode(["total"=>$total_amount,"discount"=>$discount_amount,"participation_fee"=>$amount]);
		
	}
	
	public function insertData(){

		$idata = $this->input->post();
		$idata["created_date"] = date("Y-m-d H:i:s");
		
		unset($idata["topic"]);
		
		$mobile = $idata["mobile"];
		$email = $idata["email"];
		$idata["event_data"] = json_encode($this->db->get_where("tbl_schedule_dates",["id"=>$this->input->post("event_name")])->row());
		$idata["topic"] = json_encode($this->input->post("topic"));
		
		$id = $this->db->insert("tbl_ripf_registrations",$idata);
		$lid = $this->db->insert_id();
		
		if($id){
			
			$this->session->set_userdata("ripf_form_data",$idata);
			$this->session->set_userdata("event_type","RIPF");
			$this->session->set_userdata("reg_id",$lid);
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
		
	public function addParticipants($eid =''){
		
		$data["r"] = $this->db->order_by("id","desc")->get_where("tbl_ripf_registrations",["id"=>$this->session->userdata("id"),"event_name"=>$eid])->row();
		$this->load->view("ripf/addparticipants",$data);
		
	}
	
	public function verifyParticipant(){
		
		$mobile = $this->input->post("mobile");
		$email = $this->input->post("email");
		
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
		
	}
	
	public function confirmOtp(){
		
		$motp = $this->input->post("motp");
		$eotp = $this->input->post("eotp");
		
		$mobile = $this->input->post("mobile");
		$email = $this->input->post("email");
		$pname = $this->input->post("pname");
		$designation = $this->input->post("designation");
		$department = $this->input->post("department");
		$institution_id = $this->input->post("institution_id");
		$participant_id = $this->input->post("participant_id");
		$program = $this->input->post("program");
		$stream = $this->input->post("stream");
		
		$frdata = $this->db->get_where("tbl_ripf_registrations",["id"=>$institution_id])->row();
		$status = "";
		
		$mchk = $this->db->order_by("id","desc")->get_where("tbl_mobile_otp",array("mobile"=>$mobile,"otp"=>$motp))->num_rows();
		
		if($mchk == 1){
			
		}else{
			echo json_encode(array("status"=>"error","emsg"=>'<div class="alert alert-danger">Mobile OTP is wrong</div>'));
			exit();
		}
		
		$echk = $this->db->order_by("id","desc")->get_where("tbl_email_otp",array("email"=>$email,"otp"=>$eotp))->num_rows();
		
		if($echk == 1){
		
		}else{
			echo json_encode(array("status"=>"error","emsg"=>'<div class="alert alert-danger">Email OTP is wrong</div>'));
			exit();
		}
		
		if($mchk == 1 && $echk == 1){
			
			$this->db->delete("tbl_mobile_otp",array("mobile"=>$mobile));
			$this->db->delete("tbl_email_otp",array("email"=>$email));
			
			$pchk = $this->db->get_where("tbl_ripf_participants",["pemail"=>$email,"pmobile"=>$mobile,"inst_id"=>$institution_id,"program"=>$program])->num_rows();
			if($pchk == 0){
				$iserial = $this->admin->generateripfSerialnumber($frdata->register_year);
				$ptdata =
				[
					"inst_id"=>$frdata->id,
					"pname"=>$pname,
					"designation"=>$designation,
					"department"=>$department,
					"pmobile"=>$mobile,
					"pemail"=>$email,
					"category_name"=>$stream,
					"program"=>$program,
					"verification_status"=>"Active",
					"serial_number"=>$iserial
				];
				
				$this->db->insert("tbl_ripf_participants",$ptdata);
			}else{
				$this->db->where("id",$participant_id)->update("tbl_ripf_participants",["verification_status"=>"Active"]);
			}
			
			
			echo json_encode(array("status"=>"success","emsg"=>'<div class="alert alert-success">OTP\'s Verified successfully.</div>'));
			exit();
			
		}else{
			
			echo json_encode(array("status"=>"error","emsg"=>'<div class="alert alert-danger">Error Occured</div>'));
			exit();
			
		}
		
	}
	
	public function updateParticipants(){
		
		$orderid = $this->input->post("order_id");
		$institution_id = $this->input->post("institution_id");
		
		
		$frdata = $this->db->get_where("tbl_ripf_registrations",["id"=>$institution_id])->row();
		
		$pdata = array();
		
		$programs = json_decode($frdata->topic); 
		   foreach($programs as $k => $p){
			   
			   $pname = $this->input->post("pname".$k);
			   $designation = $this->input->post("designation".$k);
			   $department = $this->input->post("department".$k);
			   $pmobile = $this->input->post("pmobile".$k);
			   $pemail = $this->input->post("pemail".$k);
			   $serial_number = $this->input->post("serial_number".$k);
			   $pstream = $this->input->post("pstream".$k);
			   $program = $this->input->post("program".$k);
			   $verification_status = $this->input->post("verification_status".$k);
			   
			   foreach($pname as $key => $val){
					if($val != ""){
						$pdata[] = array(
							"pname" => $val,
							"designation" => $designation[$key],
							"department" => $department[$key],
							"pmobile" => $pmobile[$key],
							"pemail" => $pemail[$key],
							"serial_number"=>$serial_number[$key],
							"category_name"=>$pstream[$key],
							"program"=>$p,
							"verification_status"=>$verification_status[$key],
						);
					}
				}
		   }
		
		
		$pd = $this->db->where("inst_id",$frdata->id)->delete("tbl_ripf_participants");

		foreach($pdata as $pval){
			$iserial = $this->admin->generateSerialnumber($frdata->register_year);
			$ptdata =
			[
				"inst_id"=>$frdata->id,
				"pname"=>$pval["pname"],
				"designation"=>$pval["designation"],
				"department"=>$pval["department"],
				"pmobile"=>$pval["pmobile"],
				"pemail"=>$pval["pemail"],
				"category_name"=>$pval["category_name"],
				"program"=>$pval["program"],
				"verification_status"=>$pval["verification_status"],
				"serial_number"=>($pval["serial_number"] != "") ? $pval["serial_number"] : $iserial
			];

			$this->db->insert("tbl_ripf_participants",$ptdata);

		}

		$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-success">Participants Updated Successfully</div>'));
		echo "success";
		exit();
			
	}

	
}
