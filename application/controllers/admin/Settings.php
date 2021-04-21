<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata['adminid'])
            {
                redirect('admin');
            }
	}

	public function index()
	{	
		$this->load->view("admin/settings");
	}
	
	public function updatePcount(){
		
		$pc = $this->admin->get_option("participants_count");
 		$ams=$this->input->post("pcount");
		$up = $this->admin->insertoption("participants_count",$ams);
		
		if($up){
			
			$this->secure->pnotify("success","Successfully Updated","success");
			redirect("admin/settings");
			
		}else{
			
			$this->secure->pnotify("error","Error Occured","error");
			redirect("admin/settings");
			
		}
		
	}
	
	public function createPromocode(){
		
		$id = $this->input->post("id");
		$data = [
			"promocode" => $this->input->post('promocode'),
			"amount" => $this->input->post('amount'),
			"start_date" => date("Y-m-d",strtotime($this->input->post('startDate'))),
			"end_date" => date("Y-m-d",strtotime($this->input->post('endDate'))),
		];
		
		if($id){
			unset($data["id"]);
			$d = $this->db->where("id",$id)->update("tbl_promocodes",$data);
			$status = "Updated";
		}else{
			$d = $this->db->insert("tbl_promocodes",$data);
			$status = "Added";
		}
		
		if($d){
			$this->secure->pnotify("success","Promocode $status Successfully","success");
			redirect("admin/settings");
		}else{
			$this->secure->pnotify("error","Error Occured","error");
			redirect("admin/settings");
		}
		
	}
	
	public function updatePromostatus(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_promocodes");
		
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
	
	public function delPromocode($id){
		$query = $this->db->where("id",$id)->delete("tbl_promocodes");
		if($query){
			
			$this->secure->pnotify("success","Successfully Deleted.","success");
			redirect("admin/settings");
			
		}else{
			
			$this->secure->pnotify("error","Error Occured.","error");
			redirect("admin/settings");
			
		}
	}
	
// updates	
	
	public function updates()
	{
		$data["alist"] = $this->db->order_by("id","desc")->get_where("tbl_updates")->result();	
		$this->load->view("admin/updates/allUpdates",$data);
	}
	
	public function createUpdate($id="")
	{
		
		$s = $this->db->get_where("tbl_updates",array("id"=>$id))->row();
        $data["s"] = $s;		
		$this->load->view("admin/updates/viewUpdate",$data);
		
	}	

	public function insertData(){
		
		$title = $this->input->post("title");
		$link = $this->input->post("link");
		$sid = $this->input->post("id");
		
		
		$idata = array(
			"title" => $title,
			"link" => $link
		);
		
		if($sid){
			$id = $this->db->where("id",$sid)->update("tbl_updates",$idata);
		}else{
			$id = $this->db->insert("tbl_updates",$idata);	
		}
		
		if($id){
			
			$status = ($sid) ? "Updated" : "Added";
			
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/settings/updates");
				
		}else{
			
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/settings/createUpdate");
			
		}
		
		
	}
	
	public function delUpdate($id){
		
		$d = $this->db->delete("tbl_updates",array("id"=>$id));
		
		if($d){
			
			$this->secure->pnotify("success","Successfully deleted.","Success");
			redirect("admin/settings/updates");
			
		}else{
			
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/settings/updates");
			
		}
		
	}
	
	
}
