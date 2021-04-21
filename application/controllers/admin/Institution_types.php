<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institution_types extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata['adminid'])
            {
                redirect('admin');
            }
	}

	public function index()
	{
		$data["alist"] = $this->db->order_by("id","desc")->get_where("tbl_institution_types")->result();	
		$this->load->view("admin/institution_types/allInstitution_types",$data);
	}
	
	public function addType($id="")
	{
		
		$s = $this->db->get_where("tbl_institution_types",array("id"=>$id))->row();
        $data["s"] = $s;		
		$this->load->view("admin/institution_types/viewInstitution_types",$data);
		
	}	

	public function insertData(){
		
		$type = $this->input->post("type");
		$amount = $this->input->post("amount");
		$participants = $this->input->post("participants");
		$status = $this->input->post("status");
		$sub_types = $this->input->post("sub_types");
		$sid = $this->input->post("id");
		
		if($sid){
			
			$mochk = $this->db->get_where("tbl_institution_types",array("type"=>$type,"id !="=>$sid))->num_rows();
			
		}else{
			
			$mochk = $this->db->get_where("tbl_institution_types",array("type"=>$type))->num_rows();
			
		}
		
		
		if($mochk >= 1){
			
			$this->secure->pnotify("error","Already exists.","error");
			redirect("admin/Institution_types/addType");
			
		}
		
		$idata = array(
			"type" => $type,
			"amount" => $amount,
			"participants" => $participants,
			"status" => $status,
			"sub_types" => json_encode($sub_types)
		);
		
		if($sid){
			$id = $this->db->where("id",$sid)->update("tbl_institution_types",$idata);
		}else{
			$id = $this->db->insert("tbl_institution_types",$idata);	
		}
		
		if($id){
			
			$status = ($sid) ? "Updated" : "Added";
			
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/Institution_types");
				
		}else{
			
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/Institution_types/addType");
			
		}
		
	}
	
	public function delType($id){
		
		$d = $this->db->delete("tbl_institution_types",array("id"=>$id));
		
		if($d){
			
			$this->secure->pnotify("success","Successfully deleted.","Success");
			redirect("admin/Institution_types");
			
		}else{
			
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/Institution_types");
			
		}
		
	}
}
