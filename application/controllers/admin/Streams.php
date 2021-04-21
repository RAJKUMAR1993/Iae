<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Streams extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata['adminid'])
            {
                redirect('admin');
            }
	}

	public function index()
	{
		$data["alist"] = $this->db->order_by("id","desc")->get_where("tbl_streams")->result();	
		$this->load->view("admin/streams/allStreams",$data);
	}
	
	public function stream($id="")
	{
		
		$s = $this->db->get_where("tbl_streams",array("id"=>$id))->row();
        $data["s"] = $s;		
		$this->load->view("admin/streams/viewStream",$data);
		
	}	

	public function insertData(){
		
		$category = $this->input->post("category");
		$events = $this->input->post("events");
		$status = $this->input->post("status");
		$sid = $this->input->post("id");
		
		if($sid){
			
			$mochk = $this->db->get_where("tbl_streams",array("category"=>$category,"id !="=>$sid))->num_rows();
			
		}else{
			
			$mochk = $this->db->get_where("tbl_streams",array("category"=>$category))->num_rows();
			
		}
		
		
		if($mochk >= 1){
			
			$this->secure->pnotify("error","Already exists.","error");
			redirect("admin/streams/stream");
			
		}
		
		$idata = array(
			"category" => $category,
			"status" => $status,
			"events" => json_encode($events)
		);
		
		if($sid){
			$id = $this->db->where("id",$sid)->update("tbl_streams",$idata);
		}else{
			$id = $this->db->insert("tbl_streams",$idata);	
		}
		
		if($id){
			
			$status = ($sid) ? "Updated" : "Added";
			
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/streams");
				
		}else{
			
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/streams/stream");
			
		}
		
		
	}
	
	public function delCategory($id){
		
		$d = $this->db->delete("tbl_streams",array("id"=>$id));
		
		if($d){
			
			$this->secure->pnotify("success","Successfully deleted.","Success");
			redirect("admin/streams");
			
		}else{
			
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/streams");
			
		}
		
	}

		
}
