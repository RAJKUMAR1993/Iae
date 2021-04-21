<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Schedule extends CI_Controller {

	public function __construct(){
		
		parent::__construct();

	
		if(!$this->session->userdata['adminid'])
            {
                redirect('admin');
            }
	}

	public function index()
	{
		$event = $this->input->get("event");
		
		if($event){
			
			$this->db->where("event_id",$event);
			
		}
		$data["alist"] = $this->db->order_by("id","desc")->get_where("tbl_schedule")->result();	
		$data["events"] = $this->db->order_by("id","desc")->get("tbl_schedule_dates")->result();
		$this->load->view("admin/schedule/allSchedules",$data);
	}
	
	public function events()
	{
		$this->load->view("admin/schedule/events",$data);
	}
	
	public function createEvent($id="")
	{
		$data["s"] = $this->db->get_where("tbl_schedule_dates",array("id"=>$id))->row();	
		$this->load->view("admin/events/createEvent",$data);
	}
	
	public function createSchedule($id="")
	{
		$data["events"] = $this->db->order_by("id","desc")->get("tbl_schedule_dates")->result();
		$data["tsessions"] = $this->db->order_by("id","desc")->get("tbl_technical_sessions")->result();
		$data["s"] = $this->db->get_where("tbl_schedule",array("id"=>$id))->row();	
		$this->load->view("admin/schedule/viewSchedule",$data);
	}
	
	public function getScheduleddates(){
		
		$year = $this->input->post("year");
		$dates = $this->db->get_where("tbl_schedule_dates",["id"=>$year])->row();
		
		$data = '<option value="">Select Date</option>';
		$data .= '<option value="'.$dates->event_start_date.'">'.$dates->event_start_date.'</option>';
		$data .= '<option value="'.$dates->event_end_date.'">'.$dates->event_end_date.'</option>';
		echo $data;
		
	}
	
    public function insertSchedule(){ 
		
		/*echo '<pre>';
		print_r($_FILES);
		exit();*/
		
		$id = $this->input->post("id");
		$category = $this->input->post("category");
		$schedule_year = $this->input->post("schedule_year");
		$schedule_date = $this->input->post("schedule_date");
		$schedule_start_time = $this->input->post("schedule_start_time");
		$schedule_end_time = $this->input->post("schedule_end_time");
		$join_link = $this->input->post("join_link");
		$type = $this->input->post("type");
		$type_description = $this->input->post("type_description");
		$description = $this->input->post("description");
		$technical_session = $this->input->post("technical_session");
		
		$pname = $this->input->post("pname");
		$designation = $this->input->post("designation");
		$old_image = $this->input->post("old_image");
		$mentor_topic = $this->input->post("topic");
		
		$config["upload_path"] = 'uploads/schedules/';
	    $config["allowed_types"] = 'gif|jpg|png|jpeg';  
	    $this->load->library('upload');
		
		$this->upload->initialize($config);
		
		$mentors = [];
		
		if($id){
			
			foreach($pname as $count => $p){

				if($_FILES["mentor_image"]["size"][$count] > 0){
				
					$_FILES["file"]["name"] = $_FILES["mentor_image"]["name"][$count];
					$_FILES["file"]["type"] = $_FILES["mentor_image"]["type"][$count];
					$_FILES["file"]["tmp_name"] = $_FILES["mentor_image"]["tmp_name"][$count];
					$_FILES["file"]["error"] = $_FILES["mentor_image"]["error"][$count];
					$_FILES["file"]["size"] = $_FILES["mentor_image"]["size"][$count];
					if($this->upload->do_upload('file')){
						$d = $this->upload->data();
						$image = 'uploads/schedules/'.$d["file_name"];
					}else{
						$image = '';
					}
					
				}else{
					
					$image = $old_image[$count];
					
				}

				$mentors[] = ["mentor_name"=>$p,"mentor_designation"=>$designation[$count],"mentor_image"=>$image,"mentor_topic"=>$mentor_topic[$count]];

			}
			
		}else{
			
			foreach($pname as $count => $p){

				$_FILES["file"]["name"] = $_FILES["mentor_image"]["name"][$count];
				$_FILES["file"]["type"] = $_FILES["mentor_image"]["type"][$count];
				$_FILES["file"]["tmp_name"] = $_FILES["mentor_image"]["tmp_name"][$count];
				$_FILES["file"]["error"] = $_FILES["mentor_image"]["error"][$count];
				$_FILES["file"]["size"] = $_FILES["mentor_image"]["size"][$count];
				if($this->upload->do_upload('file')){
					$d = $this->upload->data();
					$image = 'uploads/schedules/'.$d["file_name"];
				}else{
					$image = '';
				}	

				$mentors[] = ["mentor_name"=>$p,"mentor_designation"=>$designation[$count],"mentor_image"=>$image,"mentor_topic"=>$mentor_topic[$count]];

			}
			
		}
		
		if($_FILES['desc_image']['size']!='0'){
			
		   $config1["upload_path"] = 'uploads/schedules/';
		   $config1["allowed_types"] = 'gif|jpg|png|jpeg';

		   $this->upload->initialize($config1);

		   $this->upload->do_upload("desc_image");
		   $d = $this->upload->data();
		   $desc_image = "uploads/schedules/".$d["file_name"];

		}else{

		   $desc_image = $this->input->post("old_desc_image");

		}
		
		$data = [
			"category" => json_encode($category),
			"schedule_date" => $schedule_date,
			"event_id" => $this->input->post("event_id"),
//			"schedule_year" => $schedule_year,
			"schedule_start_time" => $schedule_start_time,
			"schedule_end_time" => $schedule_end_time,
			"technical_session" => $technical_session,
			"description" => $description,
			"type" => $type,
			"mentor_data" => json_encode($mentors),
			"type_description" => $type_description,
			"join_link" => $join_link,
			"desc_image" => $desc_image
		];
		
		if($id){
			$d = $this->db->where("id",$id)->update("tbl_schedule",$data);
		}else{
			$d = $this->db->insert("tbl_schedule",$data); 
		}
		
		if($d){
			
			$status = ($id != "") ? "updated" : "created";
			$this->secure->pnotify("success","Successfully $status.","success");
			redirect("admin/schedule/createSchedule/".$id);
			
		}else{
			
			$this->secure->pnotify("error","Error Occured.","error");
			redirect("admin/schedule/createSchedule/".$id);
			
		}
	}
	
	public function updateSchedulestatus(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_schedule");
		
		if($d){
			if($status=="Active"){
				echo $this->secure->pnotify("Success","Successfully Enabled","success");
			}else{
				echo $this->secure->pnotify("Success","Successfully Disabled","success");	
			}

		}else{
			if($status=="Active"){
				echo $this->secure->pnotify("Error","Error Occured While Enabling Schedule","error");
			}else{
				echo $this->secure->pnotify("Error","Error Occured While Disabling Schedule","error");
			}	
		}
		
	}
	
	public function deleteSchedule($id){
		$query = $this->db->where("id",$id)->delete("tbl_schedule");
		if($query){
			
			$this->secure->pnotify("success","Successfully Deleted.","success");
			redirect("admin/schedule");
			
		}else{
			
			$this->secure->pnotify("error","Error Occured.","error");
			redirect("admin/schedule");
			
		}
	}
	
 // scheduled dated start  
	
	public function createScheduledate(){
		
		$id = $this->input->post("id");
		$startDate = date("Y-m-d",strtotime($this->input->post("startDate")));
		$endDate = date("Y-m-d",strtotime($this->input->post("endDate")));
		$startDate1 = date("Y-m-d",strtotime($this->input->post("startDate1")));
		$endDate1 = date("Y-m-d",strtotime($this->input->post("endDate1")));
		$year = $this->input->post("year");
		$event_start_time = $this->input->post("event_start_time");
		$event_end_time = $this->input->post("event_end_time");
		$event_mode = $this->input->post("mode");
		$event_address = $this->input->post("event_address");
		$event_name = $this->input->post("event_name");
		$event_type = $this->input->post("event_type");
		$institution_type = $this->input->post("institution_type");
		$technical_session = $this->input->post("technical_session");
		
		
		if($startDate == $endDate){
//			$this->secure->pnotify("error","Start & End Dates cannot be same.","error");
//			redirect("admin/schedule/events");
			echo json_encode(["Status"=>"Error","Message"=>'<div class="alert alert-danger">Start & End Dates cannot be same.</div>']);
			exit();
		}
		
		$sd = $this->db->where("id",$id)->get("tbl_schedule_dates")->row();
		
		$this->load->library("upload");
		
		if($_FILES['director_signature']['size']!='0'){
			
		    $config["upload_path"] = 'uploads/signatures/';
		    $config["allowed_types"] = 'png';
			$config['max_width'] = '210';
			$config['max_height'] = '60';

		    $this->upload->initialize($config);
		    $u = $this->upload->do_upload("director_signature");
			if($u){
				$d = $this->upload->data();
				$director_signature = "uploads/signatures/".$d["file_name"];
			}else{
				echo json_encode(["Status"=>"Error","Message"=>'<div class="alert alert-danger">'.$this->upload->display_errors().'</div>']);
				exit();
			}
		}else{
			$director_signature = $sd->director_signature;
		}
		if($_FILES['commissioner_signature']['size']!='0'){
			
		    $config1["upload_path"] = 'uploads/signatures/';
		    $config1["allowed_types"] = 'png';
			$config1['max_width'] = '210';
			$config1['max_height'] = '60';

		    $this->upload->initialize($config1);
		    $u1 = $this->upload->do_upload("commissioner_signature");
			if($u1){
				$d1 = $this->upload->data();
				$commissioner_signature = "uploads/signatures/".$d1["file_name"];
			}else{
				echo json_encode(["Status"=>"Error","Message"=>'<div class="alert alert-danger">'.$this->upload->display_errors().'</div>']);
				exit();
			}
		}else{

			$commissioner_signature = $sd->commissioner_signature;

		}
		
		
		$data = [
			"year"=>$year,
			"event_start_date"=>$startDate,
			"event_end_date"=>$endDate,
			"registration_start_date"=>$startDate1,
			"registration_end_date"=>$endDate1,
			"event_start_time"=>strtotime($event_start_time),
			"event_end_time"=>strtotime($event_end_time),
			"event_mode"=>$event_mode,
			"event_type"=>$event_type,
			"event_name"=>$event_name,
			"event_address"=>$event_address,
			"institution_type"=>$institution_type,
			"technical_session"=>$technical_session,
			"commissioner_signature"=>$commissioner_signature,
			"director_signature"=>$director_signature,
			"event_certificate_title"=>$this->input->post("event_certificate_title"),
			"phone_number"=>$this->input->post("phone_number"),
			"whatsapp_number"=>$this->input->post("whatsapp_number"),
			"event_email"=>$this->input->post("event_email"),
			"mobile_numbers"=>$this->input->post("mobile_numbers"),
		];
		
		if($id){
			$d = $this->db->where("id",$id)->update("tbl_schedule_dates",$data);
		}else{
			$d = $this->db->insert("tbl_schedule_dates",$data);
		}
		
		if($d){
			$status = ($id != "") ? "updated" : "created";
			$this->secure->pnotify("success","Successfully $status.","success");
//			redirect("admin/schedule/events");
			echo json_encode(["Status"=>"Success","Message"=>'<div class="alert alert-success">Successfully '.$status.'</div>']);
			exit();
		}else{
			$this->secure->pnotify("error","Error Occured.","error");
//			redirect("admin/schedule/events");
			
			echo json_encode(["Status"=>"Error","Message"=>'<div class="alert alert-danger">Error Occured.</div>']);
			exit();
		}
	}
	
	public function delScheduledate($id){
		$query = $this->db->where("id",$id)->delete("tbl_schedule_dates");
		if($query){
			
			$this->secure->pnotify("success","Successfully Deleted.","success");
			redirect("admin/schedule/events");
			
		}else{
			
			$this->secure->pnotify("error","Error Occured.","error");
			redirect("admin/schedule/events");
			
		}
	}
	
// scheduled date ends	
	
	public function schedulejoindata(){
		$data['joindata'] = $this->db->order_by("id","desc")->get_where("tbl_schedule_joindata")->result();		
		$this->load->view("admin/schedule/schedulejoindata",$data);
	}
	
	public function reports(){
		$data["category"] = $this->db->order_by("id","desc")->get_where("tbl_categories")->result();
		$data["en"] =$this->db->order_by("id","desc")->get(" tbl_registrations")->result();
		$this->load->view("admin/schedule/reports",$data);
	}

	public function updateEventstatus(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_schedule_dates");
		
		if($d){
			if($status=="Active"){
				echo $this->secure->pnotify("Success","Successfully Enabled","success");
			}else{
				echo $this->secure->pnotify("Success","Successfully Disabled","success");	
			}

		}else{
			if($status=="Active"){
				echo $this->secure->pnotify("Error","Error Occured While Enabling Schedule","error");
			}else{
				echo $this->secure->pnotify("Error","Error Occured While Disabling Schedule","error");
			}	
		}
		
	}

	public function add_edit_event($type="",$event_id="")
	{
		
		$data["nirf"] = $this->db->get_where("tbl_event_schedule",array("event_id"=>$event_id))->row();	
		$this->load->view("admin/schedule/event_nirf",$data);
	}

	public function insert_nirf(){
		$sid = $this->input->post("id");
	    $workshop_overview =   $this->input->post("workshop_overview");
		$objective =            $this->input->post("objective");
		$expected =             $this->input->post("expected");
		$why_particiption =     $this->input->post("why_particiption");
		$description =          $this->input->post("description");
		$event_id =             $this->input->post("event_id");
		$event_type =           $this->input->post("event_type");
		$onlne_registration	 =  $this->input->post("online_registration");
		$oflne_registration =   $this->input->post("offline_registration");
		$bank_deposit =         $this->input->post("bank_deposit");
        $key_takeaways =        $this->input->post("key_takeaways");
		$about_symposium =     $this->input->post("about_symposium");
		$objective_of_the_symposium = $this->input->post("objective_of_the_symposium");
		$outcomes =            $this->input->post("outcomes");
		$who_can_attend =      $this->input->post("who_can_attend");
		$about_workshop =      $this->input->post("about_workshop");
		$note =      $this->input->post("note");
		


	// image upload start///

	$this->load->library("upload");
	if($_FILES['obj_image']['name'] != ""){
		$config1['upload_path'] = 'uploads/naac/';
		$config1['allowed_types'] = '*';
		$config1['file_name'] = $_FILES['obj_image']['name'];				 
		$this->load->library('upload',$config1);
		$this->upload->initialize($config1);
		if($this->upload->do_upload('obj_image')){
			$uploadData = $this->upload->data();
			$obj_image = 'uploads/naac/'.$uploadData['file_name'];
			}
		 }else{
				$obj_image = $this->input->post("old_obj_image");

    	}

		if($_FILES['key_take_image']['name'] != ""){
			$config1['upload_path'] = 'uploads/naac/';
			$config1['allowed_types'] = '*';
			$config1['file_name'] = $_FILES['key_take_image']['name'];				 
			$this->load->library('upload',$config1);
			$this->upload->initialize($config1);
			if($this->upload->do_upload('key_take_image')){
				$uploadData = $this->upload->data();
				$key_take_image = 'uploads/naac/'.$uploadData['file_name'];
				}
			 }else{
				$key_take_image = $this->input->post("old_key_take_image");
	
			}
		
			if($_FILES['banner_image']['name'] != ""){
				$config1['upload_path'] = 'uploads/ripf/';
				$config1['allowed_types'] = '*';
				$config1['file_name'] = $_FILES['banner_image']['name'];				 
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if($this->upload->do_upload('banner_image')){
					$uploadData = $this->upload->data();
					$banner_image = 'uploads/ripf/'.$uploadData['file_name'];
					}
				 }else{
						$banner_image = $this->input->post("old_banner_image");
		
				}
			if($_FILES['whocan_image']['name'] != ""){
				$config1['upload_path'] = 'uploads/ripf/';
				$config1['allowed_types'] = '*';
				$config1['file_name'] = $_FILES['whocan_image']['name'];				 
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if($this->upload->do_upload('whocan_image')){
					$uploadData = $this->upload->data();
					$whocan_image = 'uploads/ripf/'.$uploadData['file_name'];
					}
				 }else{
						$whocan_image = $this->input->post("old_whocan_image");
		
				}
				
			if($_FILES['outcome_image']['name'] != ""){
				$config1['upload_path'] = 'uploads/ripf/';
				$config1['allowed_types'] = '*';
				$config1['file_name'] = $_FILES['outcome_image']['name'];				 
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if($this->upload->do_upload('outcome_image')){
					$uploadData = $this->upload->data();
					$outcome_image = 'uploads/ripf/'.$uploadData['file_name'];
					}
				 }else{
						$outcome_image = $this->input->post("old_outcome_image");
		
				}
			if($_FILES['ob_sypim_image']['name'] != ""){
				$config1['upload_path'] = 'uploads/ripf/';
				$config1['allowed_types'] = '*';
				$config1['file_name'] = $_FILES['ob_sypim_image']['name'];				 
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if($this->upload->do_upload('ob_sypim_image')){
					$uploadData = $this->upload->data();
					$ob_sypim_image = 'uploads/ripf/'.$uploadData['file_name'];
					}
				 }else{
						$ob_sypim_image = $this->input->post("old_ob_sypim_image");
		
				}
			if($_FILES['m_obj_image']['name'] != ""){
				$config1['upload_path'] = 'uploads/ripf/';
				$config1['allowed_types'] = '*';
				$config1['file_name'] = $_FILES['m_obj_image']['name'];				 
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if($this->upload->do_upload('m_obj_image')){
					$uploadData = $this->upload->data();
					$m_obj_image = 'uploads/ripf/'.$uploadData['file_name'];
					}
				 }else{
						$m_obj_image = $this->input->post("old_m_obj_image");
		
				}
		// image upload End///
		
		$data = array(
			"workshop" =>            $workshop_overview,
			"workshop_overview" =>   $workshop_overview,
			"objectives" =>          $objective,
			"expected_outcome" =>    $expected,
			"why_participate" =>     $why_particiption,
			"description" =>         $description,
			"event_id" => 		     $event_id,
			"type" =>                $event_type,
			"online_registration" => $onlne_registration,
			"offline_registration" => $oflne_registration,
			"bank_deposit" =>         $bank_deposit,
			"about_workshop " =>      $about_workshop,
			"banner_image" =>         $banner_image,
			"obj_image" =>           $obj_image,
			"key_take_image" =>      $key_take_image,
			"whocan_image" =>        $whocan_image,
			"outcome_image" =>       $outcome_image,
			"ob_sypim_image" =>      $ob_sypim_image,
			"key_takeaways" =>       $key_takeaways,
			"m_obj_image" =>         $m_obj_image,
			"who_can_attend" =>      $who_can_attend,
			"outcomes"  =>           $outcomes,
			"about_symposium" =>     $about_symposium,
			"objective_of_the_symposium" => $objective_of_the_symposium,
			"note" => $note,
			"create_date" =>         date('Y-m-d'),
			
		);
	
		if($sid){
			$id = $this->db->where("id",$sid)->update("tbl_event_schedule",$data);
		}else{
			
			$id = $this->db->insert("tbl_event_schedule",$data);
					}
		if($id){
			$status = ($sid) ? "Updated" : "Added";
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/schedule/events");	
		}else{
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/schedule/add_edit_event");	
		}
	}

		public function del_new_nirf($id){
		$query = $this->db->where("id",$id)->delete("tbl_event_schedule");
		redirect("admin/schedule/events");	
	}
	
	public function techinal_create(){

		$session_name = $this->input->post("session_name");
		$event_id = $this->input->post("event_id");
		$sid = $this->input->post("tid");
	
		$data = array(
			"session_name" =>  $session_name,
			"event_id" =>  $event_id,
		);
		   
		if($sid){
			$id = $this->db->where("id",$sid)->update("tbl_technical_sessions",$data);	
		}else{
			$id = $this->db->insert("tbl_technical_sessions",$data);
		}
		if($id){
			$status = ($sid) ? "Updated" : "Added";
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/schedule");	
		}else{
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/schedule");	
		}
	}
	
	public function naacreports(){
		$data["category"] = $this->db->order_by("id","desc")->get_where("tbl_institution_types")->result();
		$this->load->view("admin/schedule/naacreports",$data);
	}

	public function edit_sess($id=""){
		$data["sess"] = $this->db->get_where("tbl_technical_sessions",array("id"=>$id))->row();	
		redirect("admin/schedule");
	}
	public function del_sess($id){
		$query = $this->db->where("id",$id)->delete("tbl_technical_sessions");
		$this->secure->pnotify("success","Successfully Deleted.","Success");
		redirect("admin/schedule");
	}

}
