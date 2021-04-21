<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ripf extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata['adminid'])
		{
			redirect('admin');
		}
		
	}

	public function index(){	
		$data["rcategories"] = $this->db->order_by("id","desc")->get_where("tbl_ripf_categories",["deleted"=>0])->result();
		$data["rtopics"] = $this->db->order_by("id","desc")->get_where("tbl_ripf_topics",["deleted"=>0])->result();
		$this->load->view("admin/ripf/ripf",$data);
	}
	
	public function insertCategory(){
		
		$category_name = $this->input->post("category_name");
		$overall_discount_amount = $this->input->post("overall_discount_amount");
		$members_count = $this->input->post("members_count");
		$sid = $this->input->post("id");
		
		if($sid){
			$mochk = $this->db->get_where("tbl_ripf_categories",array("category_name"=>$category_name,"id !="=>$sid))->num_rows();
		}else{
			$mochk = $this->db->get_where("tbl_ripf_categories",array("category_name"=>$category_name))->num_rows();
		}
		
		if($mochk >= 1){
			$this->secure->pnotify("error","Already exists.","error");
			redirect("admin/ripf");
		}
		
		$idata = array(
			"category_name" => $category_name,
			"overall_discount_amount" => $overall_discount_amount,
			"members_count" => $members_count
		);
		
		if($sid){
			$id = $this->db->where("id",$sid)->update("tbl_ripf_categories",$idata);
		}else{
			$id = $this->db->insert("tbl_ripf_categories",$idata);	
		}
		
		if($id){
			$status = ($sid) ? "Updated" : "Added";
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/ripf");
		}else{
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/ripf");
		}
		
	}
	
	public function delCategory($id){
		
		$d = $this->db->where(array("id"=>$id))->update("tbl_ripf_categories",array("deleted"=>1));
		
		if($d){
			
			$this->secure->pnotify("success","Successfully deleted.","Success");
			redirect("admin/ripf");
			
		}else{
			
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/ripf");
			
		}
		
	}
	
	public function insertTopic(){
		
		$ripf_category = $this->input->post("ripf_category");
		$topic_name = $this->input->post("topic_name");
		$amount = $this->input->post("amount");
		$sid = $this->input->post("id");
		
		$idata = array(
			"ripf_category" => $ripf_category,
			"topic_name" => $topic_name,
			"amount" => $amount
		);
		
		if($sid){
			$id = $this->db->where("id",$sid)->update("tbl_ripf_topics",$idata);
		}else{
			$id = $this->db->insert("tbl_ripf_topics",$idata);	
		}
		
		if($id){
			$status = ($sid) ? "Updated" : "Added";
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/ripf");
		}else{
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/ripf");
		}
		
	}
	
	public function delTopic($id){
		
		$d = $this->db->where(array("id"=>$id))->update("tbl_ripf_topics",array("deleted"=>1));
		
		if($d){
			
			$this->secure->pnotify("success","Successfully deleted.","Success");
			redirect("admin/ripf");
			
		}else{
			
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/ripf");
			
		}
		
	}
	
	public function registration(){
		//echo $event;die;
	
		$data["categories"] = $this->db->get_where("tbl_ripf_categories",["deleted"=>0])->result();
		$this->load->view("admin/ripf/ripf_categories",$data);	
	}

	public function off_line_registration($cid="",$event=""){
		$category = str_replace("-"," ",$cid);
		$data["streams"] = $this->db->from('tbl_streams')->like('events', $id)->get()->result();
		$data["cdata"] = $this->db->get_where("tbl_ripf_categories",["category_name"=>$category])->row();
	    $this->load->view("admin/ripf/new_ripf_registration",$data);		
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
		if(($caste == "SC") || ($caste == "ST") || ($caste == "EBC")){
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
	
	//inserting data//
	public function insertdata(){
	    $idata = $this->input->post();
	    //echo "<pre/>";print_r($idata);die;
		$idata["created_date"] = date("Y-m-d H:i:s");
		$order_id = $this->secure->generateOrderId();
		
		unset($idata["payment_status"]);
		unset($idata["bank_ref_no"]);
		unset($idata["txn_id"]);
		unset($idata["payment_mode"]);
		
		
		$mobile = $idata["mobile"];
		$email = $idata["email"];
		$idata["event_data"] = json_encode($this->db->get_where("tbl_schedule_dates",["id"=>$this->input->post("event_name")])->row());
		$idata["topic"] = json_encode($this->input->post("topic"));
		$idata["serial_number"] = $this->admin->generateripfSerialnumber();
		$idata["type"] = "offline";
		$idata["registration_status"] = "Active";
		$idata["order_id"] = $order_id;
		$id = $this->db->insert("tbl_ripf_registrations",$idata);
		$lid = $this->db->insert_id();
		if($id){
			
			$pdata = [
				"total_amount" => $this->input->post("totalPrice"),
				"order_id" => $order_id,
				"txn_id" => $this->input->post("txn_id"),
				"payment_mode" => $this->input->post("payment_mode"),
				"bank_ref_no" => $this->input->post("bank_ref_no"),
				"payment_status" => $this->input->post("payment_status"),
				"payment_type" => "offline",
				"payment_date" => date("Y-m-d H:i:s"),
				"temp_registration_id" => $lid
			];
			
			$this->db->insert("tbl_ripf_orders",$pdata);
			
//			$this->session->set_userdata("ripf_form_data",$idata);
//			$this->session->set_userdata("event_type","RIPF");
			/*$this->session->set_userdata("reg_id",$lid);
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
			
			$this->session->set_userdata(array("reg_id"=>$lid,"mobile"=>$mobile,"email"=>$email));*/
			
			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-success">successfully Registered.</div>'));
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
	
	
	
	
	
	
	//offline ripfregistration//


	public function ripf_registrations(){
		
		$category = $this->input->get('category');
		$data["columns"] = $this->admin->ripf_columns($category);
		$event = $this->input->get('id');
		$type = $this->input->get('registration_type');
		$topic = $this->input->get('topic');
		$stream = $this->input->get('stream');
		
		if($category && $event){
			if($category){
				$this->db->where("event_category",$category);
			}
		    if($event){
		 	  $this->db->where("event_name",$event);
			}
			if($type != "total"){
				$this->db->where("type",$type);
			}
			if($topic){
				$this->db->like("topic",$topic);
			}
			if($stream){
				$this->db->where("contact_person_stream",$stream);
			}
		
      		$data["ripf_registrations"] = $this->db->order_by("id","desc")->get_where("tbl_ripf_registrations",["registration_status"=>"active"])->result_array();
      		// participants count
	        if($category){
				$this->db->where("event_category",$category);
			}
		    if($event){
		 	  $this->db->where("event_name",$event);
			}
			if($type != "total"){
				$this->db->where("type",$type);
			}
			if($topic){
				$this->db->like("topic",$topic);
			}
			if($stream){
				$this->db->where("contact_person_stream",$stream);
			}
		
			$data['participants_count'] = $this->db->select_sum("participants")->from('tbl_ripf_registrations')->where(["registration_status"=>"active"])->get()->row();
// Total price

			if($category){
				$this->db->where("event_category",$category);
			}
		    if($event){
		 	  $this->db->where("event_name",$event);
			}
			if($type != "total"){
				$this->db->where("type",$type);
			}
			if($topic){
				$this->db->like("topic",$topic);
			}
			if($stream){
				$this->db->where("contact_person_stream",$stream);
			}
		
	   		$data['total_amount'] = $this->db->select_sum("totalPrice")->from('tbl_ripf_registrations')->where(["registration_status"=>"active"])->get()->row();

		}
			
        $this->load->view("admin/ripf/ripfregistration", $data);

	}


	public function ripfview($id="",$event_category=""){
		$data["ripf_ata"] = $this->db->get_where("tbl_ripf_registrations",array("id" => $id ))->row();
        $this->load->view("admin/ripf/ripf_view",$data);
	}



	public function downloadpdf($id){

		$drdata = $this->db->get_where("tbl_ripf_registrations",array("id"=>$id))->row();
	
		if($drdata){
			$data["ripf_data"] = $this->db->get_where("tbl_ripf_registrations",array("id"=>$id))->row();
		}else{
			$data["ripf_data"] = $this->db->get_where("tbl_temp_registrations",array("order_id"=>$id))->row();
		}

		$data["part"] = $this->db->get_where("tbl_ripf_participants",array("inst_id"=>$data["ripf_data"]->id))->result();

		$data["odata"] = $this->db->get_where("tbl_ripf_orders",array("order_id"=>$data["ripf_data"]->order_id))->row();
	    $this->load->helper('download');
		$this->load->view('admin/ripf_application',$data);
	}
	
		
	public function reports(){
		
		$event_id = $this->input->get("id");
		if($event_id){
			$data["streams"] = $this->db->like("events",$event_id)->order_by("id","asc")->get_where("tbl_streams")->result();
			$data["ripf_category"] = $this->db->order_by("id","asc")->get_where("tbl_ripf_categories")->result();
			$data["topics"]= $this->db->order_by("id","asc")->group_by("topic_name")->get("tbl_ripf_topics")->result();
		}

		$this->load->view('admin/ripf/ripf_report',$data);	
	}
}
