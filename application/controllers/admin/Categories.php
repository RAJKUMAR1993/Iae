<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata['adminid'])
            {
                redirect('admin');
            }
	}

	public function index()
	{
		$data["alist"] = $this->db->order_by("id","desc")->get_where("tbl_categories")->result();	
		$this->load->view("admin/categories/allCategories",$data);
	}
	
	public function category($id="")
	{
		
		$s = $this->db->get_where("tbl_categories",array("id"=>$id))->row();
        $data["s"] = $s;		
		$this->load->view("admin/categories/viewCategory",$data);
		
	}	

	public function insertData(){
		
		$category = $this->input->post("category");
		$events = $this->input->post("events");
		$status = $this->input->post("status");
		$sid = $this->input->post("id");
		
		if($sid){
			
			$mochk = $this->db->get_where("tbl_categories",array("category"=>$category,"id !="=>$sid))->num_rows();
			
		}else{
			
			$mochk = $this->db->get_where("tbl_categories",array("category"=>$category))->num_rows();
			
		}
		
		
		if($mochk >= 1){
			
			$this->secure->pnotify("error","Already exists.","error");
			redirect("admin/Categories/category");
			
		}
		
		$idata = array(
			"category" => $category,
			"status" => $status,
			"events" => json_encode($events)
		);
		
		if($sid){
			$id = $this->db->where("id",$sid)->update("tbl_categories",$idata);
		}else{
			$id = $this->db->insert("tbl_categories",$idata);	
		}
		
		if($id){
			
			$status = ($sid) ? "Updated" : "Added";
			
			$this->secure->pnotify("success","Successfully $status.","Success");
			redirect("admin/Categories");
				
		}else{
			
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/Categories/category");
			
		}
		
		
	}
	
	public function delCategory($id){
		
		$d = $this->db->delete("tbl_categories",array("id"=>$id));
		
		if($d){
			
			$this->secure->pnotify("success","Successfully deleted.","Success");
			redirect("admin/Categories");
			
		}else{
			
			$this->secure->pnotify("error","Error occured","error");
			redirect("admin/Categories");
			
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

		
}
