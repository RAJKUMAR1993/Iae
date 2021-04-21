<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/mpdf/mpdf.php');
class Users extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata['adminid'])
            {
                redirect('admin');
            }
	}

	public function index(){
		
		if($this->input->get("id")){
			$event_name = $this->input->get("id");
		}else{
			$event_name = $this->input->get("event_id");
		}
			
		$category = $this->input->get('category');
		$type = $this->input->get('type');
		$inst_type = $this->input->get('inst_type');
		$sub_type = urldecode($this->input->get('sub_type'));
		
		$management_details = $this->input->get('management_details');
		$ref_type = $this->input->get('ref_type');
		
		if($event_name){
			$this->db->where("event_name",$event_name);
		}
		if($inst_type){
			$this->db->where("institution_type",$inst_type);
		}
		if($sub_type){
			$this->db->like("institution_subtype","$sub_type");
		}
		if($category){
			$this->db->like('categories',$category);
		}
		if($management_details){
			if($management_details == "Government"){
				$govt = '["Government"]';
				$this->db->where("managementdetails",$govt);
			}else{
				$this->db->like('managementdetails',$management_details);
			}
		}
		if($ref_type){
			if($ref_type != "total")
			$this->db->where("type",$ref_type);
		}else{
			if($this->input->get("cref") != "naac")
				$this->db->where("type","online");
		}
		
		$data["alist"] = $this->db->order_by("id","desc")->get_where("tbl_registrations")->result();
		
		
	// participants count
		if($event_name){
			$this->db->where("event_name",$event_name);
		}
		if($inst_type){
			$this->db->where("institution_type",$inst_type);
		}
		if($sub_type){
			$this->db->like("institution_subtype",$sub_type);
		}
		if($category){
			$this->db->like('categories',$category);
		}
		if($management_details){
			if($management_details == "Government"){
				$govt = '["Government"]';
				$this->db->where("managementdetails",$govt);
			}else{
				$this->db->like('managementdetails',$management_details);
			}
		}
		if($ref_type){
			if($ref_type != "total")
			$this->db->where("type",$ref_type);
		}else{
			if($this->input->get("cref") != "naac")
				$this->db->where("type","online");
		}
		$data['participants_count'] = $this->db->select_sum("participants")->from('tbl_registrations')->get()->row();

	// Total price

		if($event_name){
			$this->db->where("event_name",$event_name);
		}
		if($inst_type){
			$this->db->where("institution_type",$inst_type);
		}
		if($sub_type){
			$this->db->like("institution_subtype",$sub_type);
		}
		if($category){
			$this->db->like('categories',$category);
		}
		if($management_details){
			if($management_details == "Government"){
				$govt = '["Government"]';
				$this->db->where("managementdetails",$govt);
			}else{
				$this->db->like('managementdetails',$management_details);
			}
		}
		if($ref_type){
			if($ref_type != "total")
			$this->db->where("type",$ref_type);
		}else{
			if($this->input->get("cref") != "naac")
				$this->db->where("type","online");
		}
		$data['total_amount'] = $this->db->select_sum("totalPrice")->from('tbl_registrations')->get()->row();

		$this->load->view("admin/users/allUsers",$data);
	}
	
	public function downlaodreports()
	{
		$data["alist"] = $this->db->order_by("id","desc")->get_where("tbl_registrations")->where('type','online')->result();	
		$this->load->view("admin/users/downloadReports",$data);
	}	
	

	public function offlineusers()
	{
		
		$event_name = $this->input->get("id");
		$category = $this->input->get('category');
		if($event_name){
			$this->db->where("event_name",$event_name);
		}
		if($category){
			$this->db->like('categories',$category);
		}
		$data["alist"] = $this->db->order_by("id","desc")->get_where("tbl_registrations",["participants >"=>0,"type"=>"offline"])->result();	
	  // participants count
		if($event_name){
			$this->db->where("event_name",$event_name);
		}
		if($category){
			$this->db->like('categories',$category);
		} 
		$data['participants_count'] = $this->db->select_sum("participants")->from('tbl_registrations')->where('type','offline')->get()->row();
		// Total price

		if($event_name){
			$this->db->where("event_name",$event_name);
		}
		if($category){
			$this->db->like('categories',$category);
		}
		$data['total_amount'] = $this->db->select_sum("totalPrice")->from('tbl_registrations')->where('type','offline')->get()->row();
		$this->load->view("admin/users/allofflineUsers",$data);
	}


	public function viewUser($id)
	{
		$data["rdata"] = $this->db->get_where("tbl_registrations",array("id"=>$id))->row();	
		if($data["rdata"]){
			
			
			$data["rdata"] = $this->db->get_where("tbl_registrations",array("id"=>$id))->row();	
			
		}else{
			
			$data["rdata"] = $this->db->get_where("tbl_temp_registrations",array("order_id"=>$id))->row();	
			
		}
		
		$this->load->view("admin/users/viewUser",$data);
	}
	
	public function viewUserpayment($id)
	{
		$data["rdata"] = $this->db->get_where("tbl_registrations",array("id"=>$id))->row();	
		if($data["rdata"]){
		  $data["rdata"] = $this->db->get_where("tbl_registrations",array("id"=>$id))->row();	
		}else{
		  $data["rdata"] = $this->db->get_where("tbl_temp_registrations",array("order_id"=>$id))->row();	
		}
		$this->load->view("admin/users/viewPayments",$data);
	}
	
	public function updateOrder($id)
	{
		$data["alist"] = $this->db->order_by("id","desc")->get_where("tbl_categories")->result();
		$data["r"] = $this->db->get_where("tbl_registrations",array("order_id"=>$id))->row();	
		/*if($data["rdata"]){
			
			$data["rdata"] = $this->db->get_where("tbl_registrations",array("id"=>$id))->row();	
			
		}else{
			
			$data["rdata"] = $this->db->get_where("tbl_temp_registrations",array("order_id"=>$id))->row();	
			
		}*/
		
		$this->load->view("admin/updateOrder",$data);
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
	
	// public function addParticipants(){
	// 	$orderid = $this->input->post("order_id");
	// 	$pname = $this->input->post("pname");
	// 	$designation = $this->input->post("designation");
	// 	$department = $this->input->post("department");
	// 	$pmobile = $this->input->post("pmobile");
	// 	$pemail = $this->input->post("pemail");
	// 	$collage_name = $this->input->post("collage_name");
	// 	$category_name = $this->input->post("category_name");
	// 	$serial_number = $this->input->post("serial_number");
	// 	$verification_status = $this->input->post("verification_status");
		
	// 	$frdata = $this->db->get_where("tbl_registrations",["order_id"=>$orderid])->row();
	// 	$trdata = $this->db->get_where("tbl_temp_registrations",["order_id"=>$orderid])->row();
		
	// 	$pdata = array();
		
	// 	foreach($pname as $key => $val){
			
	// 		$pdata[] = array(
		
	// 			"pname" => $val,
	// 			"designation" => $designation[$key],
	// 			"department" => $department[$key],
	// 			"pmobile" => $pmobile[$key],
	// 			"pemail" => $pemail[$key],
	// 			"collage_name"=>$collage_name[$key],
	// 			"category_name"=>$category_name[$key],
	// 			"serial_number"=>$serial_number[$key],
	// 			"verification_status"=>$verification_status[$key],

	// 		);
			
	// 	}
		
	// 	$d = $this->db->where(["order_id"=>$orderid])->update("tbl_temp_registrations",["participantsData"=>json_encode($pdata)]);
		
	// 	if($d){
			
	// 		$pd = $this->db->where("inst_id",$frdata->id)->delete("tbl_participants");
			
	// 		if($pd){
				
	// 			foreach($pdata as $pval){
	// 				$iserial = $this->admin->generateSerialnumber($frdata->register_year);
	// 				$ptdata =
	// 				[
	// 					"inst_id"=>$frdata->id,
	// 					"pname"=>$pval["pname"],
	// 					"designation"=>$pval["designation"],
	// 					"department"=>$pval["department"],
	// 					"verification_status"=>$pval["verification_status"],
	// 					"pmobile"=>$pval["pmobile"],
	// 					"pemail"=>$pval["pemail"],
	// 					"collage_name"=>$pval["collage_name"],
	// 					"category_name"=>$pval["category_name"],
	// 					"serial_number"=>($pval["serial_number"] != "") ? $pval["serial_number"] : $iserial
	// 				];
	// 				$this->db->insert("tbl_participants",$ptdata);
					
	// 			}
				
	// 		}
			
	// 		$this->db->where("id",$frdata->id)->update("tbl_registrations",["participants"=>count($pdata)]);
	// 		$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-success">Participants Added Successfully</div>'));
	// 		echo "success";
	// 		exit();
			
	// 	}else{
			
	// 		$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-danger">Error Occured</div>'));
	// 		echo '<div class="alert alert-danger">Error Occured</div>';
	// 		exit();
			
	// 	}
		
	// }
	

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






























	public function payments()
	{
		$data["pdata"] = $this->db->order_by("id","desc")->get_where("tbl_orders",array("payment_status !="=>"Pending"))->result();	
		$this->load->view("admin/payments",$data);
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
	




	public function register()
	{
	
		// $event_type = $this->input->get("event_type");
		// //print_r($event);die;
		// if($event_type){
		// 	$this->db->where("event_type",$event_type);
		// }
		// $data['events'] = $this->db->order_by("id","desc")->get("tbl_schedule_dates")->result();

		$this->load->view("admin/register");
	}

	public function get_event_type(){

		$event = $this->input->post("event");
		$edata = $this->db->get_where("tbl_schedule_dates",["id"=>$event])->row();
		
		echo $edata->event_type;
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
		$event_id = $this->input->post("event");
		$contact_person_designation = $this->input->post("contact_person_designation");
		$contact_person_department = $this->input->post("contact_person_department");
		
// participants data		
		
		$pname = $this->input->post("pname");
		$designation = $this->input->post("designation");
		$department = $this->input->post("department");
		$pmobile = $this->input->post("pmobile");
		$pemail = $this->input->post("pemail");
		$totalPrice = $this->input->post("amount");
		$order_id = $this->secure->generateOrderId();
		$collage_name = $this->input->post("collage_name");
		$category_name = $this->input->post("category_name");
		
		$mochk = $this->db->get_where("tbl_registrations",array("mobile"=>$mobile))->num_rows();
		
		if($mochk >= 1){
			
//			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-danger">Mobile Number already registered</div>'));
			echo '<div class="alert alert-danger">Mobile Number already registered</div>';
			exit();
//			redirect("home/register");
			
		}
		
		$emchk = $this->db->get_where("tbl_registrations",array("email"=>$email))->num_rows();
		
		if($emchk >= 1){
			
//			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-danger">Email already registered</div>'));
			echo '<div class="alert alert-danger">Email already registered</div>';
			exit();
//			redirect("home/register");
			
		}
		
		$pdata = array();
		foreach($pname as $key => $val){
			$pdata[] = array(
				"pname" => $val,
				"designation" => $designation[$key],
				"department" => $department[$key],
				"pmobile" => $pmobile[$key],
				"pemail" => $pemail[$key]
			);
		}
		$edata = $this->db->get_where("tbl_schedule_dates",["id"=>$event_id])->row();
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
			"event_name" => $edata->id,
			"event_data" => json_encode($edata),
			"participantsData" => json_encode($pdata),
			"institution_type" => $institution_type,
			"institution_subtype" => ($institution_subtype != "") ? $institution_subtype : '',
			"order_id" => $order_id,
			"contact_person_department"=> $contact_person_department,
			"contact_person_designation" => $contact_person_designation,
			
		);
		//echo "<pre/>";print_r($idata);die;
		$id = $this->db->insert("tbl_temp_registrations",$idata);
		$lid = $this->db->insert_id();
		
		$year = $this->db->where("registration_start_date <=",date("Y-m-d"))
		                 ->where("registration_end_date >=",date("Y-m-d"))
						 ->get_where("tbl_schedule_dates")
						 ->row()->year;
		
		if($id){
			
			$payment_status = "Success";


			$data = array(
				"order_id"=>$order_id,
				"txn_id"=>$this->input->post("txn_id"),
				"payment_date" => date("Y-m-d H:i:s"),
				"total_amount"=>$totalPrice,
				"payment_mode" => $this->input->post("payment_mode"),
				"payment_status"=>$this->input->post("payment_status"),
				"payment_type" => "offline",
				"bank_ref_no" => $this->input->post("bank_ref_no")
			);


			$ps = $this->db->insert("tbl_orders",$data);
			
			
			if($ps){
				
				$iserial = $this->admin->generateSerialnumber($year);
				
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
					"event_name" => $edata->id,
					"event_data" => json_encode($edata),
					"participants" => $participants,
					"totalPrice" =>$totalPrice,
					"order_id" => $order_id,
					"type"=>"offline",
					"register_year" => ($year != "") ? $year : date("Y"),
					"created_date" => date("Y-m-d H:i:s"),
					"serial_number" => $iserial,
					"institution_type" => $institution_type,
					"institution_subtype" => ($institution_subtype != "") ? $institution_subtype : '',
					"contact_person_department"=> $contact_person_department,
					"contact_person_designation" => $contact_person_designation,
				);

				$id = $this->db->insert("tbl_registrations",$idata);
				$iid = $this->db->insert_id(); 
				
				if($id){
					
					foreach($pdata as $pd){
				
						$pserial = $this->admin->generateSerialnumber($year);
						$parData = array(

							"inst_id" => $iid,
							"pname" => $pd["pname"],
							"designation" => $pd["designation"],
							"department" => $pd["department"],
							"pmobile" => $pd["pmobile"],
							"pemail" => $pd["pemail"],
							"serial_number" => $pserial

						);

						$this->db->insert("tbl_participants",$parData);

					}
					
				}
				
				
			}
			
			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-success">Institution Successfully registered</div>'));
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
	
	public function downloadpdf($id){
		
		$drdata = $this->db->get_where("tbl_registrations",array("id"=>$id))->row();	
		
		if($drdata){
			
			$data["rdata"] = $this->db->get_where("tbl_registrations",array("id"=>$id))->row();	
			
		}else{
			
			$data["rdata"] = $this->db->get_where("tbl_temp_registrations",array("order_id"=>$id))->row();	
			
		}
		
		$data["part"] = $this->db->get_where("tbl_participants",array("inst_id"=>$data["rdata"]->id))->result(); 
		$data["odata"] = $this->db->get_where("tbl_orders",array("order_id"=>$data["rdata"]->order_id))->row(); 
		
		$this->load->view('admin/application',$data);
		
	}
    public function users_download()
	{   
		
		$file = $this->input->get("file");
		$ref = $this->input->get("ref");
		if($ref == "users"){
			$this->db->group_by("name");
			$this->db->where("file_name",$file);
		}
		if($ref == "downloads"){
			$this->db->where("file_name",$file);
		}
		
	    $data["downloads"] = $this->db->order_by("u_id","desc")->get_where("tbl_users_download")->result();
		$this->load->view("admin/users_download",$data);
	}
	
	
	public function gallery()
	{   
		$this->load->view("admin/gallery");
	}
    
	public function insertGallery(){
		
		$gTitle = $this->input->post("gallery_title");
		$gType = $this->input->post("gallery_type");
		
		if($gTitle == "cgallery"){
			
			$galleryTitle = $this->input->post("gallery_title_new");
			
		}else{
			
			$galleryTitle = $this->input->post("gallery_title");
			
		}
		
		
		if (!is_dir('uploads/gallery/'))
		{
			mkdir('./uploads/gallery', 0777, true);
		}
		$dir_exist = true; // flag for checking the directory exist or not
		if (!is_dir('uploads/gallery/' . $galleryTitle))
		{
			mkdir('./uploads/gallery/' . $galleryTitle, 0777, true);
			$dir_exist = false; // dir not exist
		}
		
		$this->load->library('upload');
//			sleep(3);
		
		if($_FILES['coverphoto']['size']!='0'){
		
			   $config1["upload_path"] = 'uploads/gallery/cover/';
			   $config1["allowed_types"] = 'png|jpg|jpeg';
			   $config1["overwrite"] = TRUE;	

			   $this->upload->initialize($config1);

			   $this->upload->do_upload("coverphoto");
			   $d = $this->upload->data();
			   $coverphoto = "uploads/gallery/cover/".$d["file_name"];
		
		}else{
			
			$coverphoto = "";
			
		}
		
		
		$route = str_replace(array("(",")","{","}"," "),"-",str_replace("-","",$galleryTitle));
		
		if($gType == "image"){
		
			  if($_FILES["files"]["name"] != '')
			  {
			   $config["upload_path"] = 'uploads/gallery/'.$galleryTitle;
			   $config["allowed_types"] = 'jpg|jpeg|png|gif';

	//			   $config["encrypt_name"] = TRUE;   

				   $this->upload->initialize($config);

				   for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
				   {
					$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
					$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
					$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
					$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
					$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];

					if($this->upload->do_upload('file'))
					{
					 $data = $this->upload->data();

					 $imgname = 'uploads/gallery/'.$galleryTitle."/".$data["file_name"];

					 $data1 = array("gallery_title"=>$galleryTitle,"images"=>$imgname,"coverImage"=>$coverphoto,"route"=>$route,"type"=>$gType); 

					 $up = $this->db->insert("tbl_gallery",$data1);

					}

				   }
			  }
			
		}else{
			
			$data1 = array("gallery_title"=>$galleryTitle,"images"=>$this->input->post("iframe_url"),"coverImage"=>$coverphoto,"route"=>$route,"type"=>$gType); 
			$up = $this->db->insert("tbl_gallery",$data1);
			
		}
		
		$this->secure->pnotify("success","Successfully Uploaded","success");
		redirect("admin/users/gallery");

	}
	
	public function delImage($id){
		
		$this->db->set(array("deleted"=>1,"status"=>"Inactive"));
		$this->db->where("id",$id);
		$del = $this->db->update("tbl_gallery");
		
		if($del){
			
			$this->secure->pnotify("success","Successfully Deleted","success");
//			redirect("admin/gallery");

		}else{
			
			$this->secure->pnotify("error","Error Occured Please Try Again","error");
//			redirect("admin/gallery");
			
		}
		
	}
	
	public function editGallerytitle(){
		
		$extitle = $this->input->post("extgalleryTitle");
		$uptitle = $this->input->post("galleryTitle");
		
		$exc = $this->db->get_where("tbl_gallery",array("gallery_title"=>$extitle))->row();
		
		if($_FILES['coverphoto1']['size']!='0'){
		
			   $config1["upload_path"] = 'uploads/gallery/cover/';
			   $config1["allowed_types"] = 'png|jpg|jpeg';
			   $config1["overwrite"] = TRUE;	

			   $this->load->library("upload",$config1);

			   $this->upload->do_upload("coverphoto1");
			   $d = $this->upload->data();
			   $coverphoto = "uploads/gallery/cover/".$d["file_name"];
		
		}else{
			
			$coverphoto = $exc->coverImage;
			
		}
		
		$route = str_replace(array("(",")","{","}"," "),"-",str_replace("-","",$uptitle));
		
		$d = $this->db->where("gallery_title",$extitle)->update("tbl_gallery",array("gallery_title"=>$uptitle,"coverImage"=>$coverphoto,"route"=>$route));
		
		if($d){
			
			$this->secure->pnotify("success","Gallery Title Successfully Updated","success");
			redirect("admin/users/gallery");

		}else{

			$this->secure->pnotify("error","Error Occured Please Try Again","error");
			redirect("admin/users/gallery");

		}
		
	}
	
	public function editImgdesc(){
		
		$gimgid = $this->input->post("gimgid");
		$description = $this->input->post("description");
		
		$d = $this->db->where("id",$gimgid)->update("tbl_gallery",array("description"=>$description));
		
		if($d){
			
			$this->secure->pnotify("success","Successfully Updated","success");
			redirect("admin/users/gallery");

		}else{

			$this->secure->pnotify("error","Error Occured Please Try Again","error");
			redirect("admin/users/gallery");

		}
		
	}
	
	public function delGallerytitle(){
		
		$title = $this->input->post("title");
		
		$d = $this->db->where("gallery_title",$title)->update("tbl_gallery",array("status"=>"Inactive","deleted"=>1));
		
		if($d){
			
			$this->secure->pnotify("success","Gallery Title Successfully Deleted","success");
			redirect("admin/users/gallery");

		}else{

			$this->secure->pnotify("error","Error Occured Please Try Again","error");
			redirect("admin/users/gallery");

		}
		
	}	
	public function testimonals()
	{
		$data["pdata"] = $this->db->order_by("testimony_id","desc")->get_where("tbl_testimonials")->result();	
		$this->load->view("admin/testimonals",$data);
	}
    public function add_testimonal()
	{   
	    if($_FILES["files"]["name"] != '')
	  {
	   $config["upload_path"] = 'assets/testimonals/';
	   $config["allowed_types"] = 'gif|jpg|png';  
	   $this->load->library('upload', $config);
	   $this->upload->initialize($config);
		$_FILES["file"]["name"] = $_FILES["files"]["name"];
		$_FILES["file"]["type"] = $_FILES["files"]["type"];
		$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"];
		$_FILES["file"]["error"] = $_FILES["files"]["error"];
		$_FILES["file"]["size"] = $_FILES["files"]["size"];
		if($this->upload->do_upload('file'))
		{
		 $data = $this->upload->data();
		 $imgname = $data["file_name"];
		}else{
		 $imgname = '';
		}	      
	  }else{
		  $imgname = '';
	  }
	 
		$data = array(
		'name' => $this->input->post('name'),
		'designation' => $this->input->post('designation'),
		'photo' => $imgname,
		'description' => $this->input->post('desc'),
		'sort_order' => $this->input->post('sort_order')
		);
		$res = $this->db->insert("tbl_testimonials",$data);
		redirect('admin/users/testimonals');
	}
    public function update_test()
	{    
	    $id = $this->input->post('test_id');
		if($_FILES["files"]["name"] != '')
	  {
	   $config["upload_path"] = 'assets/testimonals/';
	   $config["allowed_types"] = 'gif|jpg|png|jpeg';  
	   $this->load->library('upload', $config);		
		if($this->upload->do_upload('files'))
		{
		 $data = $this->upload->data();
		 $imgname = $data["file_name"];
		}else{
		 $imgname = '';
		}		
	  }else{
		  $imgname = $this->input->post('file_name');
	  }
	    $data = array(
		'name' => $this->input->post('name'),
		'designation' => $this->input->post('designation'),
		'photo' => $imgname,
		'description' => $this->input->post('desc'),
		'sort_order' => $this->input->post('sort_order')	
		);
		$query = $this->db->where("testimony_id",$id)->update("tbl_testimonials",$data);
		redirect('admin/users/testimonals');
	}
    public function deltest($id){
		$query = $this->db->where("testimony_id",$id)->delete("tbl_testimonials");
		redirect('admin/users/testimonals');
	}
	
	public function collaborators()
	{
		$data["coll"] = $this->db->order_by("coll_id","desc")->get_where("tbl_collaborators")->result();	
		$this->load->view("admin/collaborators",$data);
	}
    public function add_collaborator()
	{   
	    if($_FILES["files"]["name"] != '')
	  {
	   $config["upload_path"] = 'assets/collaborators/';
	   $config["allowed_types"] = 'gif|jpg|png';  
	   $this->load->library('upload', $config);
	   $this->upload->initialize($config);
		$_FILES["file"]["name"] = $_FILES["files"]["name"];
		$_FILES["file"]["type"] = $_FILES["files"]["type"];
		$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"];
		$_FILES["file"]["error"] = $_FILES["files"]["error"];
		$_FILES["file"]["size"] = $_FILES["files"]["size"];
		if($this->upload->do_upload('file'))
		{
		 $data = $this->upload->data();
		 $imgname = $data["file_name"];
		}else{
		 $imgname = '';
		}	      
	  }
	 
		$data = array(
		'heading' => $this->input->post('name'),
		'sorting_order' => $this->input->post('sort_order'),
		'image' => $imgname
		);
		$res = $this->db->insert("tbl_collaborators",$data);
		redirect('admin/users/collaborators');
	}
    public function update_collaborator()
	{    
	    $id = $this->input->post('test_id');
		if($_FILES["files"]["name"] != '')
	  {
	   $config["upload_path"] = 'assets/collaborators/';
	   $config["allowed_types"] = 'gif|jpg|png|jpeg';  
	   $this->load->library('upload', $config);		
		if($this->upload->do_upload('files'))
		{
		 $data = $this->upload->data();
		 $imgname = $data["file_name"];
		}else{
		 $imgname = '';
		}		
	  }else{
		  $imgname = $this->input->post('file_name');
	  }
	    $data = array(
		'heading' => $this->input->post('name'),
		'sorting_order' => $this->input->post('sort_order'),	
		'image' => $imgname
		);
		$query = $this->db->where("coll_id",$id)->update("tbl_collaborators",$data);
		redirect('admin/users/collaborators');
	}
	public function delcoll($id){
		$query = $this->db->where("coll_id",$id)->delete("tbl_collaborators");
		redirect('admin/users/collaborators');
	}
	public function experts()
	{
		$data["pdata"] = $this->db->order_by("ex_id","desc")->get_where("tbl_experts")->result();	
		$this->load->view("admin/experts",$data);
	}
    public function add_edit_experts($id="")
	{
		$s = $this->db->get_where("tbl_experts",array("ex_id"=>$id))->row();
        $sorting = $this->db->get_where("tbl_experts")->result();
	    foreach($sorting as $so){
			if($so->sorting_order != $s->sorting_order){
				$sst[] = $so->sorting_order;
			}else{
				
			}
		
	    }
        $data['sort'] = $sst;
        $data["s"] = $s;		
		$this->load->view("admin/add_experts",$data);	
	}
    public function insert_expert_Data(){
		
		$sname = $this->input->post("name");
		$quali = $this->input->post("quali");
		$area_of_exp = $this->input->post("area_of_exp");
		$yrs_of_exp = $this->input->post("yrs_of_exp");
		$designation = $this->input->post("designation");
		$profile = $this->input->post("profile");
		$short_desc = $this->input->post("short_desc");
		$sorting = $this->input->post("sorting");
		
		$sid = $this->input->post("id");
		if($sid){
			$mochk = $this->db->get_where("tbl_experts",array("name"=>$sname,"ex_id !="=>$sid))->num_rows();
		}else{
			$mochk = $this->db->get_where("tbl_experts",array("name"=>$sname))->num_rows();
		}
		if($mochk >= 1){
			$this->secure->pnotify("error","Already exists.","error");
			redirect("admin/users/add_edit_experts");
		}
		if($sid){
			$udata = $this->db->get_where("tbl_experts",array("ex_id"=>$sid))->row();
			
			if($_FILES['image']['size']!='0'){
			
				   $config["upload_path"] = 'uploads/experts/';
				   $config["allowed_types"] = 'png|jpg|jpeg';
				   $config["overwrite"] = TRUE;	

				   $this->load->library("upload",$config);

				   $this->upload->do_upload("image");
				   $d = $this->upload->data();
				   $profile_pic = "uploads/experts/".$d["file_name"];

			}else{

				   $profile_pic = $udata->photo;

			}
		}else{
			
			if($_FILES['image']['size']!='0'){
			
				   $config["upload_path"] = 'uploads/experts/';
				   $config["allowed_types"] = 'png|jpg|jpeg';
				   $config["overwrite"] = TRUE;	

				   $this->load->library("upload",$config);

				   $this->upload->do_upload("image");
				   $d = $this->upload->data();
				   $profile_pic = "uploads/experts/".$d["file_name"];

			}
			
		}
		$idata = array(
		
			"name" => $sname,
			"qualification" => $quali,
			"designation" => $designation,
			"area_of_expertise" => $area_of_exp,
			"years_of_exp" => $yrs_of_exp,
			"profile" => $profile,
			"photo" => $profile_pic,
			"short_desc" => $short_desc,
			"sorting_order" => $sorting
			
		);
		if($sid){
			$id = $this->db->where("ex_id",$sid)->update("tbl_experts",$idata);
			
		}else{
			
			$id = $this->db->insert("tbl_experts",$idata);
			
		}
		if($id){
			$status = ($sid) ? "Updated" : "Added";
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/users/experts");	
		}else{
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/users/experts");	
		}
	}
	public function delexpertise($id){
		$query = $this->db->where("ex_id",$id)->delete("tbl_experts");
		redirect('admin/users/experts');
	}
    public function advisors()
	{
		$data["pdata"] = $this->db->order_by("ad_id","desc")->get_where("tbl_advisors")->result();	
		$this->load->view("admin/advisors",$data);
	}
    public function add_edit_advisors($id="")
	{
		$s = $this->db->get_where("tbl_advisors",array("ad_id"=>$id))->row();
        $sorting = $this->db->get_where("tbl_advisors")->result();
	    foreach($sorting as $so){
		   if($so->sorting_order != $s->sorting_order){
				$sst[] = $so->sorting_order;
			}else{
				
			}
	    }
        $data['sort'] = $sst;
        $data["s"] = $s;		
		$this->load->view("admin/add_advisors",$data);	
	}
    public function insert_advisor_Data(){
		
		$sname = $this->input->post("name");
		$quali = $this->input->post("quali");
		$area_of_exp = $this->input->post("area_of_exp");
		$yrs_of_exp = $this->input->post("yrs_of_exp");
		$designation = $this->input->post("designation");
		$profile = $this->input->post("profile");
		$short_desc = $this->input->post("short_desc");
		$sorting = $this->input->post("sorting");
		
		$sid = $this->input->post("id");
		if($sid){
			$mochk = $this->db->get_where("tbl_advisors",array("name"=>$sname,"ad_id !="=>$sid))->num_rows();
		}else{
			$mochk = $this->db->get_where("tbl_advisors",array("name"=>$sname))->num_rows();
		}
		if($mochk >= 1){
			$this->secure->pnotify("error","Already exists.","error");
			redirect("admin/users/add_edit_advisors");
		}
		if($sid){
			$udata = $this->db->get_where("tbl_advisors",array("ad_id"=>$sid))->row();
			
			if($_FILES['image']['size']!='0'){
			
				   $config["upload_path"] = 'uploads/advisors/';
				   $config["allowed_types"] = 'png|jpg|jpeg';
				   $config["overwrite"] = TRUE;	

				   $this->load->library("upload",$config);

				   $this->upload->do_upload("image");
				   $d = $this->upload->data();
				   $profile_pic = "uploads/advisors/".$d["file_name"];

			}else{

				   $profile_pic = $udata->photo;

			}
		}else{
			
			if($_FILES['image']['size']!='0'){
			
				   $config["upload_path"] = 'uploads/advisors/';
				   $config["allowed_types"] = 'png|jpg|jpeg';
				   $config["overwrite"] = TRUE;	

				   $this->load->library("upload",$config);

				   $this->upload->do_upload("image");
				   $d = $this->upload->data();
				   $profile_pic = "uploads/advisors/".$d["file_name"];

			}
			
		}
		$idata = array(
		
			"name" => $sname,
			"qualification" => $quali,
			"designation" => $designation,
			"area_of_expertise" => $area_of_exp,
			"years_of_exp" => $yrs_of_exp,
			"profile" => $profile,
			"photo" => $profile_pic,
			"short_desc" => $short_desc,
			"sorting_order" => $sorting
			
		);
		if($sid){
			$id = $this->db->where("ad_id",$sid)->update("tbl_advisors",$idata);
			
		}else{
			
			$id = $this->db->insert("tbl_advisors",$idata);
			
		}
		if($id){
			$status = ($sid) ? "Updated" : "Added";
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/users/advisors");	
		}else{
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/users/advisors");	
		}
	}
	public function deladvisors($id){
		$query = $this->db->where("ad_id",$id)->delete("tbl_advisors");
		redirect('admin/users/advisors');
	}
    public function team()
	{
		$data["pdata"] = $this->db->order_by("t_id","desc")->get_where("tbl_team")->result();	
		$this->load->view("admin/team",$data);
	}
    public function add_edit_team($id="")
	{
		$s = $this->db->get_where("tbl_team",array("t_id"=>$id))->row();
        $sorting = $this->db->get_where("tbl_team")->result();
	    foreach($sorting as $so){
			if($so->sorting_order != $s->sorting_order){
				$sst[] = $so->sorting_order;
			}else{
				
			}
		
	    }
        $data['sort'] = $sst;
        $data["s"] = $s;		
		$this->load->view("admin/add_team",$data);	
	}
    public function insert_team_Data(){
		
		$sname = $this->input->post("name");
		$quali = $this->input->post("quali");
		$area_of_exp = $this->input->post("area_of_exp");
		$yrs_of_exp = $this->input->post("yrs_of_exp");
		$designation = $this->input->post("designation");
		$profile = $this->input->post("profile");
		$short_desc = $this->input->post("short_desc");
		$sorting = $this->input->post("sorting");
		
		$sid = $this->input->post("id");
		if($sid){
			$mochk = $this->db->get_where("tbl_team",array("name"=>$sname,"t_id !="=>$sid))->num_rows();
		}else{
			$mochk = $this->db->get_where("tbl_team",array("name"=>$sname))->num_rows();
		}
		if($mochk >= 1){
			$this->secure->pnotify("error","Already exists.","error");
			redirect("admin/users/add_edit_team");
		}
		if($sid){
			$udata = $this->db->get_where("tbl_team",array("t_id"=>$sid))->row();
			
			if($_FILES['image']['size']!='0'){
			
				   $config["upload_path"] = 'uploads/team/';
				   $config["allowed_types"] = 'png|jpg|jpeg';
				   $config["overwrite"] = TRUE;	

				   $this->load->library("upload",$config);

				   $this->upload->do_upload("image");
				   $d = $this->upload->data();
				   $profile_pic = "uploads/team/".$d["file_name"];

			}else{

				   $profile_pic = $udata->photo;

			}
		}else{
			
			if($_FILES['image']['size']!='0'){
			
				   $config["upload_path"] = 'uploads/team/';
				   $config["allowed_types"] = 'png|jpg|jpeg';
				   $config["overwrite"] = TRUE;	

				   $this->load->library("upload",$config);

				   $this->upload->do_upload("image");
				   $d = $this->upload->data();
				   $profile_pic = "uploads/team/".$d["file_name"];

			}
			
		}
		$idata = array(
		
			"name" => $sname,
			"qualification" => $quali,
			"designation" => $designation,
			"area_of_expertise" => $area_of_exp,
			"years_of_exp" => $yrs_of_exp,
			"profile" => $profile,
			"photo" => $profile_pic,
			"short_desc" => $short_desc,
			"sorting_order" => $sorting
			
		);
		if($sid){
			$id = $this->db->where("t_id",$sid)->update("tbl_team",$idata);
			
		}else{
			
			$id = $this->db->insert("tbl_team",$idata);
			
		}
		if($id){
			$status = ($sid) ? "Updated" : "Added";
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/users/team");	
		}else{
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/users/team");	
		}
	}
	public function delteam($id){
		$query = $this->db->where("t_id",$id)->delete("tbl_team");
		redirect('admin/users/team');
	}
    public function field_expert()
	{
		$data["pdata"] = $this->db->order_by("f_id","desc")->get_where("tbl_field_expert")->result();	
		$this->load->view("admin/field_expert",$data);
	}
    public function add_edit_field($id="")
	{
		$s = $this->db->get_where("tbl_field_expert",array("f_id"=>$id))->row();
        $sorting = $this->db->get_where("tbl_field_expert")->result();
	    foreach($sorting as $so){
			if($so->sorting_order != $s->sorting_order){
				$sst[] = $so->sorting_order;
			}else{
				
			}
		
	    }
        $data['sort'] = $sst;
        $data["s"] = $s;			
		$this->load->view("admin/add_field_expert",$data);	
	}
    public function insert_field_Data(){
		
		$sname = $this->input->post("name");
		$quali = $this->input->post("quali");
		$area_of_exp = $this->input->post("area_of_exp");
		$yrs_of_exp = $this->input->post("yrs_of_exp");
		$designation = $this->input->post("designation");
		$profile = $this->input->post("profile");
		$short_desc = $this->input->post("short_desc");
		$sorting = $this->input->post("sorting");
		
		$sid = $this->input->post("id");
		if($sid){
			$mochk = $this->db->get_where("tbl_field_expert",array("name"=>$sname,"f_id !="=>$sid))->num_rows();
		}else{
			$mochk = $this->db->get_where("tbl_field_expert",array("name"=>$sname))->num_rows();
		}
		if($mochk >= 1){
			$this->secure->pnotify("error","Already exists.","error");
			redirect("admin/users/add_edit_team");
		}
		if($sid){
			$udata = $this->db->get_where("tbl_field_expert",array("f_id"=>$sid))->row();
			
			if($_FILES['image']['size']!='0'){
			
				   $config["upload_path"] = 'uploads/field/';
				   $config["allowed_types"] = 'png|jpg|jpeg';
				   $config["overwrite"] = TRUE;	

				   $this->load->library("upload",$config);

				   $this->upload->do_upload("image");
				   $d = $this->upload->data();
				   $profile_pic = "uploads/field/".$d["file_name"];

			}else{

				   $profile_pic = $udata->photo;

			}
		}else{
			
			if($_FILES['image']['size']!='0'){
			
				   $config["upload_path"] = 'uploads/field/';
				   $config["allowed_types"] = 'png|jpg|jpeg';
				   $config["overwrite"] = TRUE;	

				   $this->load->library("upload",$config);

				   $this->upload->do_upload("image");
				   $d = $this->upload->data();
				   $profile_pic = "uploads/field/".$d["file_name"];

			}
			
		}
		$idata = array(
		
			"name" => $sname,
			"qualification" => $quali,
			"designation" => $designation,
			"area_of_expertise" => $area_of_exp,
			"years_of_exp" => $yrs_of_exp,
			"profile" => $profile,
			"photo" => $profile_pic,
			"short_desc" => $short_desc,
			"sorting_order" => $sorting
			
		);
		if($sid){
			$id = $this->db->where("f_id",$sid)->update("tbl_field_expert",$idata);
			
		}else{
			
			$id = $this->db->insert("tbl_field_expert",$idata);
			
		}
		if($id){
			$status = ($sid) ? "Updated" : "Added";
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/users/field_expert");	
		}else{
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/users/field_expert");	
		}
	}
    public function delfield($id){
		$query = $this->db->where("f_id",$id)->delete("tbl_field_expert");
		redirect('admin/users/field_expert');
	}
	
	public function advisorstatus(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		
		$this->db->set($data);
		$this->db->where("ad_id",$id);
		$d=$this->db->update("tbl_advisors");
		
		if($d){
			if($status=="Active"){
				echo $this->secure->pnotify("Success","Successfully Advisor Enabled","success");
			}else{
				echo $this->secure->pnotify("Success","Successfully Advisor Disabled","success");	
			}

		}else{
			if($status=="Active"){
				echo $this->secure->pnotify("Error","Error Occured While Enabling Advisor","error");
			}else{
				echo $this->secure->pnotify("Error","Error Occured While Disabling Advisor","error");
			}	
		}
		
		
	}
	
	public function teamstatus(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		
		$this->db->set($data);
		$this->db->where("t_id",$id);
		$d=$this->db->update("tbl_team");
		
		if($d){
			if($status=="Active"){
				echo $this->secure->pnotify("Success","Successfully Team Enabled","success");
			}else{
				echo $this->secure->pnotify("Success","Successfully Team Disabled","success");	
			}

		}else{
			if($status=="Active"){
				echo $this->secure->pnotify("Error","Error Occured While Enabling Team","error");
			}else{
				echo $this->secure->pnotify("Error","Error Occured While Disabling Team","error");
			}	
		}
		
		
	}
	
	public function expertstatus(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		
		$this->db->set($data);
		$this->db->where("ex_id",$id);
		$d=$this->db->update("tbl_experts");
		
		if($d){
			if($status=="Active"){
				echo $this->secure->pnotify("Success","Successfully Expert Enabled","success");
			}else{
				echo $this->secure->pnotify("Success","Successfully Expert Disabled","success");	
			}

		}else{
			if($status=="Active"){
				echo $this->secure->pnotify("Error","Error Occured While Enabling Expert","error");
			}else{
				echo $this->secure->pnotify("Error","Error Occured While Disabling Expert","error");
			}	
		}
		
		
	}
	
	public function fieldexpertstatus(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		
		$this->db->set($data);
		$this->db->where("f_id",$id);
		$d=$this->db->update("tbl_field_expert");
		
		if($d){
			if($status=="Active"){
				echo $this->secure->pnotify("Success","Successfully Field Expert Enabled","success");
			}else{
				echo $this->secure->pnotify("Success","Successfully Field Expert Disabled","success");	
			}

		}else{
			if($status=="Active"){
				echo $this->secure->pnotify("Error","Error Occured While Enabling Advisor","error");
			}else{
				echo $this->secure->pnotify("Error","Error Occured While Disabling Advisor","error");
			}	
		}
		
		
	}
	public function new_testimonials()
	{
		$data["pdata"] = $this->db->order_by("testimony_id","desc")->get_where("tbl_new_testimonials")->result();	
		$this->load->view("admin/new_testimonals",$data);
	}
	public function add_edit_testimonials($id="")
	{
		$data["s"] = $this->db->get_where("tbl_new_testimonials",array("testimony_id"=>$id))->row();	
		$this->load->view("admin/new_testimonals_2",$data);	
	}
	public function insert_testimonials_Data(){
		//print_r($_POST);exit;
		$sname = $this->input->post("name");
		$designation = $this->input->post("designation");
		$short_desc = $this->input->post("description");
		$sorting = $this->input->post("sorting");
		
		$sid = $this->input->post("id");
		//echo $sid;exit;
		if($sid){
			$mochk = $this->db->get_where("tbl_new_testimonials",array("name"=>$sname,"testimony_id !="=>$sid))->num_rows();
		}else{
			$mochk = $this->db->get_where("tbl_new_testimonials",array("name"=>$sname))->num_rows();
		}
		if($mochk >= 1){
			$this->secure->pnotify("error","Already exists.","error");
			redirect("admin/users/add_edit_testimonials");
		}
		if($sid){
			$udata = $this->db->get_where("tbl_new_testimonials",array("testimony_id"=>$sid))->row();
			
			if($_FILES['image']['size']!='0'){
			
				   $config["upload_path"] = 'uploads/new_testimonals/';
				   $config["allowed_types"] = 'png|jpg|jpeg';
				   $config["overwrite"] = TRUE;	

				   $this->load->library("upload",$config);

				   $this->upload->do_upload("image");
				   $d = $this->upload->data();
				   $profile_pic = "uploads/new_testimonals/".$d["file_name"];

			}else{

				   $profile_pic = $udata->photo;

			}
		}else{
			
			if($_FILES['image']['size']!='0'){
			
				   $config["upload_path"] = 'uploads/new_testimonals/';
				   $config["allowed_types"] = 'png|jpg|jpeg';
				   $config["overwrite"] = TRUE;	

				   $this->load->library("upload",$config);

				   $this->upload->do_upload("image");
				   $d = $this->upload->data();
				   $profile_pic = "uploads/new_testimonals/".$d["file_name"];

			}
			
		}
		$idata = array(
		
			"name" => $sname,
			"designation" => $designation,
			"photo" => $profile_pic,
			"description" => $short_desc,
			"sorting_order" => $sorting
			
		);
		if($sid){
			$id = $this->db->where("testimony_id",$sid)->update("tbl_new_testimonials",$idata);
			
		}else{
			
			$id = $this->db->insert("tbl_new_testimonials",$idata);
			
		}
		if($id){
			$status = ($sid) ? "Updated" : "Added";
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/users/new_testimonials");	
		}else{
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/users/new_testimonials");	
		}
	}
	public function del_new_test($id){
		$query = $this->db->where("testimony_id",$id)->delete("tbl_new_testimonials");
		redirect('admin/users/new_testimonials');
	}
	
	public function getTsortorder(){
		
		$sort_order = $this->input->post('sorder');
		
		$mdata = $this->db->get_where("tbl_testimonials")->result();

		$sdata = [];
		
		foreach($mdata as $ms){

		  $sdata[] = $ms->sort_order;

		}

		$i = 1;
		
		if($sort_order != 0){
			
			echo '<option value="'.$sort_order.'" selected>'.$sort_order.'</option>';
		
		}else{
		
			echo '<option value="">Select Sort Order</option>';
			
		}
		for($i=1;$i<=20;$i++){ 
					   
		   if(in_array($i, $sdata)){ 

		   }else{ 
			  echo '<option value="'.$i.'">'.$i.'</option>';
		   }  
		} 
	}
	
	public function getCsortorder(){
		
		$sort_order = $this->input->post('sorder');
		
		$mdata = $this->db->get_where("tbl_collaborators")->result();

		$sdata = [];
		
		foreach($mdata as $ms){

		  $sdata[] = $ms->sorting_order;

		}

		$i = 1;
		
		if($sort_order != 0){
			
			echo '<option value="'.$sort_order.'" selected>'.$sort_order.'</option>';
		
		}else{
		
			echo '<option value="">Select Sort Order</option>';
			
		}
		for($i=1;$i<=20;$i++){ 
					   
		   if(in_array($i, $sdata)){ 

		   }else{ 
			  echo '<option value="'.$i.'">'.$i.'</option>';
		   }  
		} 
	}
	
}
