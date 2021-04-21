<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scripts extends CI_Controller {

	public function updateYears()
	{
		$alist = $this->db->get_where("tbl_registrations")->result();
		foreach ($alist as $row) {
		
			$year = $this->db->where("registration_start_date <=",date("Y-m-d",strtotime($row->created_date)))->where("registration_end_date >=",date("Y-m-d",strtotime($row->created_date)))->get_where("tbl_schedule_dates")->row()->year;
			
			$this->db->where("id",$row->id)->update("tbl_registrations",["register_year"=>($year != "") ? $year : date("Y")]);
			
		}
	}
	
	public function updateSerialnumbers(){
		
		$id = 1;
		
		$institutes = $this->db->order_by("id","asc")->get("tbl_registrations")->result();

		foreach($institutes as $ins){
			
			$iserial = str_pad($id, 4, "0", STR_PAD_LEFT)."/".$ins->register_year;
			$this->db->where("id",$ins->id)->update("tbl_registrations",["serial_number"=>$iserial]);
			
			$participants = $this->db->get_where("tbl_participants",["inst_id"=>$ins->id])->result();
			
			foreach($participants as $p){
				
				$id++;
				$pserial = str_pad($id, 4, "0", STR_PAD_LEFT)."/".$ins->register_year;
				$this->db->where("id",$p->id)->update("tbl_participants",["serial_number"=>$pserial]);	
				
			}
			
			$id++;
			
		}
		
	}
	
	public function updateEvents(){
		
		$institutes = $this->db->order_by("id","asc")->get("tbl_registrations")->result();

		foreach($institutes as $ins){
			
			$sdata = $this->db->where("registration_start_date <=",date("Y-m-d",strtotime($ins->created_date)))->where("registration_end_date >=",date("Y-m-d",strtotime($ins->created_date)))->get_where("tbl_schedule_dates")->row();
			
			$this->db->where("id",$ins->id)->update("tbl_registrations",["event_name"=>$sdata->id,"event_data"=>json_encode($sdata)]);
			
		}
		
	}
	
	public function updateEventidsschedule(){
		$institutes = $this->db->order_by("id","asc")->get("tbl_schedule")->result();

		foreach($institutes as $ins){
			
			$sdata = $this->db->where("year",$ins->schedule_year)->get_where("tbl_schedule_dates")->row();
			$this->db->where("id",$ins->id)->update("tbl_schedule",["event_id"=>$sdata->id]);
			
		}
	}

}
