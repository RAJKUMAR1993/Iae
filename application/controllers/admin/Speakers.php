<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speakers extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata['adminid']){
			redirect('admin');
		}
	}

	public function index()
	{
		$data["alist"] = $this->db->order_by("id","desc")->get_where("tbl_speakers")->result();	
		$this->load->view("admin/speakers/allSpeakers",$data);
	}
	
	public function reorderspeakers()
	{
		$data["alist"] = $this->db->get_where("tbl_speakers_reorder")->row();
		$this->load->view("admin/speakers/reorderspeaker",$data);
	}
	
	public function speaker($id="")
	{
		
		$s = $this->db->get_where("tbl_speakers",array("id"=>$id))->row();
        $sorting = $this->db->get_where("tbl_speakers")->result();
	    foreach($sorting as $so){
			if($so->sorting_order != $s->sorting_order){
				$sst[] = $so->sorting_order;
			}else{
				
			}
		
	    }
        $data['sort'] = $sst;
        $data["s"] = $s;		
		$this->load->view("admin/speakers/viewSpeaker",$data);
		
	}	

	public function insertData(){
		
		$sname = $this->input->post("sname");
		$route = $this->input->post("route");
		$desc = $this->input->post("desc");
		$designation = $this->input->post("designation");
		$sid = $this->input->post("id");
//		$sorting = $this->input->post("sorting");
		$year = $this->input->post("year");
		$event_name = $this->input->post("event_id");
		
		if($sid){
			
			$mochk = $this->db->get_where("tbl_speakers",array("sname"=>$sname,"id !="=>$sid))->num_rows();
			
		}else{
			
			$mochk = $this->db->get_where("tbl_speakers",array("sname"=>$sname))->num_rows();
			
		}
		
		
		if($mochk >= 1){
			
//			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-danger">Mobile Number already registered</div>'));
			
//			echo '<div class="alert alert-danger">Already exists.</div>';
//			exit();
			
			$this->secure->pnotify("error","Already exists.","error");
			redirect("admin/speakers/speaker");
			
//			redirect("home/register");
			
		}
		
		if($sid){
			
			$udata = $this->db->get_where("tbl_speakers",array("id"=>$sid))->row();
			
			if($_FILES['image']['size']!='0'){
			
				   $config["upload_path"] = 'uploads/speakers/';
				   $config["allowed_types"] = 'png|jpg|jpeg';
				   $config["overwrite"] = TRUE;	

				   $this->load->library("upload",$config);

				   $this->upload->do_upload("image");
				   $d = $this->upload->data();
				   $profile_pic = "uploads/speakers/".$d["file_name"];

			}else{

				   $profile_pic = $udata->image;

			}
			
		}else{
			
			if($_FILES['image']['size']!='0'){
			
				   $config["upload_path"] = 'uploads/speakers/';
				   $config["allowed_types"] = 'png|jpg|jpeg';
				   $config["overwrite"] = TRUE;	

				   $this->load->library("upload",$config);

				   $this->upload->do_upload("image");
				   $d = $this->upload->data();
				   $profile_pic = "uploads/speakers/".$d["file_name"];

			}
			
		}
		
		$idata = array(
		
			"sname" => $sname,
			"description" => $desc,
			"designation" => $designation,
			"route" => $route,
			"image" => $profile_pic,
			"event_id" => json_encode($event_name),
//			"sorting_order" => $sorting,
//			"year" => json_encode($year)
			
		);
		//print_r($idata);die;
		if($sid){
		
			$id = $this->db->where("id",$sid)->update("tbl_speakers",$idata);
			
		}else{
			
			$id = $this->db->insert("tbl_speakers",$idata);
			
		}
		
		
		if($id){
			
			$status = ($sid) ? "Updated" : "Added";
			
//			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-success">Successfully '.$status.'</div>'));
//			echo 'success';
//			redirect("home/verifyOtp");
			
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/speakers");
				
		}else{
			
//			echo '<div class="alert alert-danger">Error occured.</div>';
//			exit();
			
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/speakers/speaker");
			
		}
		
		
	}
	
	public function delSpeaker($id){
		
		$d = $this->db->delete("tbl_speakers",array("id"=>$id));
		
		if($d){
			
			$this->secure->pnotify("success","Successfully deleted.","Success");
			redirect("admin/speakers");
			
		}else{
			
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/speakers");
			
		}
		
	}
	
	public function insertOrder(){
		
		$ids = $this->input->post("s_ids");
		
		$data = array("speakers_order"=>json_encode($ids));
		
		$d = $this->db->where("id",1)->update("tbl_speakers_reorder",$data);
		
		if($d){
				
			$this->secure->pnotify("success","Successfully updated.","Success");
			redirect("admin/speakers/reorderspeakers");
			
		}else{
			
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/speakers/reorderspeakers");
			
		}
		
	}

	public function sort_order(){

		$speaker_id = $this->input->post("speaker_id");
		$sort = $this->input->post("sort");
		
		foreach($speaker_id as $k => $mid){
			
			$this->db->where("id",$mid)->update("tbl_speakers",["sorting_order"=>$sort[$k]]);
			
		}
		
	}
		
}
