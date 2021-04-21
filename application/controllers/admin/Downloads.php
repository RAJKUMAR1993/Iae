<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downloads extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata['adminid'])
            {
                redirect('admin');
            }
	}

	public function index()
	{
		$data["alist"] = $this->db->order_by("id","desc")->get_where("tbl_downloads")->result();	
		$this->load->view("admin/downloads/allDownloads",$data);
	}
	
	public function addDownload($id="")
	{
		$data["s"] = $this->db->order_by("id","desc")->get_where("tbl_downloads",["id"=>$id])->row();	
		$this->load->view("admin/downloads/viewDownload",$data);
	}
	
	public function insertData(){
		
		$sname = $this->input->post("name");
		$sid = $this->input->post("id");
//		$year = $this->input->post("year");
		$event_id = $this->input->post("event_id");
		
		$this->load->library("upload");
		if($sid){
			
			$udata = $this->db->get_where("tbl_downloads",array("id"=>$sid))->row();
			
			if($_FILES['image']['size']!='0'){
			
				   $config["upload_path"] = 'uploads/speakers/';
				   $config["allowed_types"] = '*';
//				   $config["overwrite"] = TRUE;	

				   $this->upload->initialize($config);

				   $this->upload->do_upload("image");
				   $d = $this->upload->data();
				   $profile_pic = "uploads/speakers/".$d["file_name"];

			}else{

				   $profile_pic = $udata->file;

			}
			
			if($_FILES['file']['size']!='0'){
			
				   $config1["upload_path"] = 'uploads/speakers/';
				   $config1["allowed_types"] = '*';
//				   $config["overwrite"] = TRUE;	

				   $this->upload->initialize($config1);

				   $this->upload->do_upload("file");
				   $d1 = $this->upload->data();
				   $image = "uploads/speakers/".$d1["file_name"];

			}else{

				   $image = $udata->image;

			}
			
		}else{
			
			if($_FILES['image']['size']!='0'){
			
				   $config["upload_path"] = 'uploads/speakers/';
				   $config["allowed_types"] = '*';
//				   $config["overwrite"] = TRUE;	

				   $this->upload->initialize($config);

				   $this->upload->do_upload("image");
				   $d = $this->upload->data();
				   $profile_pic = "uploads/speakers/".$d["file_name"];

			}
			
			if($_FILES['file']['size']!='0'){
			
				   $config1["upload_path"] = 'uploads/speakers/';
				   $config1["allowed_types"] = '*';
//				   $config["overwrite"] = TRUE;	

				   $this->upload->initialize($config1);

				   $this->upload->do_upload("file");
				   $d1 = $this->upload->data();
				   $image = "uploads/speakers/".$d1["file_name"];

			}else{
				$image = "";
			}
			
		}
		
	
		
		$idata = array(
		
			"name" => $sname,
			"image" => $image,
			"youtube_link" => $this->input->post("youtube_link"),
			"ndesignation" => $this->input->post("ndesignation"),
			"file" => $profile_pic,
			"event_id" => $event_id,
			"created_date" => date("Y-m-d H:i:s")
		);
		
		if($sid){
		
			$id = $this->db->where("id",$sid)->update("tbl_downloads",$idata);
			
		}else{
			
			$id = $this->db->insert("tbl_downloads",$idata);
			
		}
		
		
		if($id){
			
			$status = ($sid) ? "Updated" : "Added";
			
//			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-success">Successfully '.$status.'</div>'));
//			echo 'success';
//			redirect("home/verifyOtp");
			
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/downloads");
				
		}else{
			
//			echo '<div class="alert alert-danger">Error occured.</div>';
//			exit();
			
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/downloads/addDownload");
			
		}
		
		
	}
	
	public function delSpeaker($id){
		
		$d = $this->db->delete("tbl_downloads",array("id"=>$id));
		
		if($d){
			
			$this->secure->pnotify("success","Successfully deleted.","Success");
			redirect("admin/downloads");
			
		}else{
			
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/downloads");
			
		}
		
	}
		
}
