<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Events extends CI_Controller {

	public function index($event){
		
		$this->load->view("webinars/pricing_list");
		
	}
	
	public function selectPackage(){
		
		$package = $this->input->post("package");
		$event_id = $this->input->post("event_id");
		$event_name = $this->input->post("event_name");
		$promo_status = $this->input->post("promo_status");
		
		$this->session->set_userdata(["package"=>$package,"event_id"=>$event_id,"event_name"=>$event_name,"promo_status"=>$promo_status]);
		echo "success";
		
	}
	
	public function addParticipants($eid =''){
		
		$data["alist"] = $this->db->order_by("id","desc")->get_where("tbl_categories")->result();
	
		$data["r"] = $this->db->order_by("id","desc")->get_where("tbl_registrations",["email"=>$this->session->userdata("participant_email"),"event_name" => $eid])->row();
	
		$this->load->view("webinars/addparticipants",$data);
		
	}
	
	public function updateParticipants(){
		
		$orderid = $this->input->post("order_id");
		
		$pname = $this->input->post("pname");
		$designation = $this->input->post("designation");
		$department = $this->input->post("department");
		$pmobile = $this->input->post("pmobile");
		$pemail = $this->input->post("pemail");
		$serial_number = $this->input->post("serial_number");
		$verification_status = $this->input->post("verification_status");
		
		$frdata = $this->db->get_where("tbl_registrations",["order_id"=>$orderid])->row();
		
		$pdata = array();
		
		foreach($pname as $key => $val){
			
			if($val != ""){
				$pdata[] = array(

					"pname" => $val,
					"designation" => $designation[$key],
					"department" => $department[$key],
					"pmobile" => $pmobile[$key],
					"pemail" => $pemail[$key],
					"serial_number"=>$serial_number[$key],
					"verification_status"=>$verification_status[$key],

				);
			}
		}
		
		$d = $this->db->where(["order_id"=>$orderid])->update("tbl_temp_registrations",["participantsData"=>json_encode($pdata)]);
		
		if($d){
			
			$pd = $this->db->where("inst_id",$frdata->id)->delete("tbl_participants");

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
					"verification_status"=>$pval["verification_status"],
					"serial_number"=>($pval["serial_number"] != "") ? $pval["serial_number"] : $iserial
				];
				
				$this->db->insert("tbl_participants",$ptdata);
					
			}
			
			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-success">Participants Updated Successfully</div>'));
			echo "success";
			exit();
			
		}else{
			
			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-danger">Error Occured</div>'));
			echo '<div class="alert alert-danger">Error Occured</div>';
			exit();
			
		}
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
		
//		print_r($this->input->post());
//		exit();
		
		$motp = $this->input->post("motp");
		$eotp = $this->input->post("eotp");
		
		$mobile = $this->input->post("mobile");
		$email = $this->input->post("email");
		$pname = $this->input->post("pname");
		$designation = $this->input->post("designation");
		$department = $this->input->post("department");
		$institution_id = $this->input->post("institution_id");
		$participant_id = $this->input->post("participant_id");
		
		$frdata = $this->db->get_where("tbl_registrations",["id"=>$institution_id])->row();
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
			
			$pchk = $this->db->get_where("tbl_participants",["pemail"=>$email,"pmobile"=>$mobile,"inst_id"=>$institution_id])->num_rows();
			if($pchk == 0){
				$iserial = $this->admin->generateSerialnumber($frdata->register_year);
				$ptdata =
				[
					"inst_id"=>$frdata->id,
					"pname"=>$pname,
					"designation"=>$designation,
					"department"=>$department,
					"pmobile"=>$mobile,
					"pemail"=>$email,
					"verification_status"=>"Active",
					"serial_number"=>$iserial
				];
				$this->db->insert("tbl_participants",$ptdata);
			}else{
				$this->db->where("id",$participant_id)->update("tbl_participants",["verification_status"=>"Active"]);
			}
			
			
			echo json_encode(array("status"=>"success","emsg"=>'<div class="alert alert-success">OTP\'s Verified successfully.</div>'));
			exit();
			
		}else{
			
			echo json_encode(array("status"=>"error","emsg"=>'<div class="alert alert-danger">Error Occured</div>'));
			exit();
			
		}
		
	}
	
	public function checkPromo(){
		
		$temp_id = $this->session->userdata("reg_id");
		$promocode = $this->input->post("promocode");
		$date = strtotime(date("Y-m-d"));
		
		if($promocode){
			
			$rdata = $this->db->get_where("tbl_temp_registrations",["id"=>$temp_id])->row();
			$chkCode = $this->db->get_where("tbl_promocodes",["promocode"=>$promocode,"status"=>"Active"])->row();
			
			if($rdata->promo_status == "Active"){
					
				echo json_encode(array("status"=>"error","emsg"=>'<div class="alert alert-danger">Promocode Already Applied</div>'));
				exit();

			}else{
				

					

				if($rdata->totalPrice > $chkCode->amount){
			
					if($chkCode){

						if((strtotime($chkCode->start_date) <= $date) && (strtotime($chkCode->end_date) >= $date)){

							$discount_amount = ($rdata->totalPrice - $chkCode->amount);
							$this->db->where(["id"=>$temp_id])->update("tbl_temp_registrations",["total_discount_amount"=>$rdata->totalPrice,"totalPrice"=>$discount_amount,"promo_status"=>"Active"]);

							echo json_encode(array("status"=>"success","emsg"=>'<div class="alert alert-success">Promocode Applied Successfully, Total amount you have to pay is <br>Rs/- '.$discount_amount.' </div>'));
							exit();

						}else{
							echo json_encode(array("status"=>"error","emsg"=>'<div class="alert alert-danger">Promocode Expired</div>'));
							exit();
						}

					}else{
						echo json_encode(array("status"=>"error","emsg"=>'<div class="alert alert-danger">Invalid Promocode</div>'));
						exit();
					}
					
				}else{
					echo json_encode(array("status"=>"error","emsg"=>'<div class="alert alert-danger">Promocode Cannot be applied.</div>'));
					exit();
				}
			}
			
		}else{
			
			echo json_encode(array("status"=>"error","emsg"=>'<div class="alert alert-danger">Enter Promocode</div>'));
			exit();
			
		}
		
	}
	
	
	

}
