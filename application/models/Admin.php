<?php

defined("BASEPATH") OR exit("No direct script access allow");


class Admin extends CI_Model{
	
	public function __construct(){
		
		parent::__construct();

	}
	
	function get_ordinal_suffix($i) {
		$j = $i % 10;
		$k = $i % 100;
		if ($j == 1 && $k != 11) {
			return $i."st";
		}
		if ($j == 2 && $k != 12) {
			return $i."nd";
		}
		if ($j == 3 && $k != 13) {
			return $i."rd";
		}
		return $i."th";
	}
	
	public function ripf_columns($category){
		
		$columns = [
			"Institution" => 
				[
					["column"=>"Name of the Institution","db_column"=>institutionName,"type"=>1],
					["column"=>"Organization Mobile Number","db_column"=>"institution_phone_number","type"=>1],
					["column"=>"Organization Email ID","db_column"=>"orgemail","type"=>1],
					["column"=>"Website","db_column"=>"website","type"=>1],
					["column"=>"Address","db_column"=>"address","type"=>1],
					["column"=>"Name of the Contact Person","db_column"=>"cpname","type"=>1],
					["column"=>"Contact Person Mobile No","db_column"=>"mobile","type"=>1],
					["column"=>"Contact Person Email ID","db_column"=>"email","type"=>1],
					["column"=>"Contact Person Designation","db_column"=>"contact_person_designation","type"=>1],
					["column"=>"Contact Person Department","db_column"=>"contact_person_department","type"=>1],
					["column"=>"Contact Person Stream","db_column"=>"contact_person_stream","type"=>1],
					["column"=>"Number of Participants","db_column"=>"participants","type"=>1],
					["column"=>"Participant Number","db_column"=>"par_number","type"=>0],
					["column"=>"Participant Serial Number","db_column"=>"serial_number","type"=>0],
					["column"=>"Participant Name","db_column"=>"pname","type"=>0],
					["column"=>"Participant Mobile No","db_column"=>"pmobile","type"=>0],
					["column"=>"Participant Email ID","db_column"=>"pemail","type"=>0],
					["column"=>"Participant Designation","db_column"=>"designation","type"=>0],
					["column"=>"Participant Department","db_column"=>"department","type"=>0],
					["column"=>"Participant Stream","db_column"=>"category_name","type"=>0],
					["column"=>"Participant Topic","db_column"=>"program","type"=>0],
					["column"=>"Management Details","db_column"=>"managementdetails","type"=>1],
					["column"=>"Type of Institution","db_column"=>"institution_type","type"=>1],
					["column"=>"Category of the Institution","db_column"=>"categories","type"=>1]
				],
			"Individual-Faculty" =>
				[
					["column"=>"Full Name","db_column"=>"ifsrp_fullName","type"=>1],
					["column"=>"Email Id","db_column"=>"ifsrp_emailId","type"=>1],
					["column"=>"Mobile Number","db_column"=>"ifsrp_mobileNumber","type"=>1],
					["column"=>"Address","db_column"=>"address","type"=>1],
					["column"=>"Number of Participants","db_column"=>"participants","type"=>1],
					["column"=>"Participant Number","db_column"=>"par_number","type"=>0],
					["column"=>"Participant Serial Number","db_column"=>"serial_number","type"=>0],
					["column"=>"Participant Name","db_column"=>"pname","type"=>0],
					["column"=>"Participant Mobile No","db_column"=>"pmobile","type"=>0],
					["column"=>"Participant Email ID","db_column"=>"pemail","type"=>0],
					["column"=>"Participant Designation","db_column"=>"designation","type"=>0],
					["column"=>"Participant Department","db_column"=>"department","type"=>0],
					["column"=>"Participant Stream","db_column"=>"category_name","type"=>0],
					["column"=>"Participant Topic","db_column"=>"program","type"=>0],			
					["column"=>"Designation","db_column"=>"contact_person_designation","type"=>1],
					["column"=>"Department","db_column"=>"contact_person_department","type"=>1],
					["column"=>"Name of the Institution (If Working)","db_column"=>"if_nameoftheInstitution_working","type"=>1],
					["column"=>"Social Status","db_column"=>"caste_type","type"=>1],
					["column"=>"Physically Challenged","db_column"=>"physically_challenged","type"=>1],
					["column"=>"Gender","db_column"=>"gender","type"=>1],
				],
			"Students" =>
				[
					["column"=>"Full Name","db_column"=>"ifsrp_fullName","type"=>1],
					["column"=>"Email Id","db_column"=>"email","type"=>1],
					["column"=>"Mobile Number","db_column"=>"mobile","type"=>1],
					["column"=>"Address","db_column"=>"address","type"=>1],
					["column"=>"Stream","db_column"=>"contact_person_stream","type"=>1],
					["column"=>"Number of Participants","db_column"=>"participants","type"=>1],
					["column"=>"Participant Number","db_column"=>"par_number","type"=>0],
					["column"=>"Participant Serial Number","db_column"=>"serial_number","type"=>0],
					["column"=>"Participant Name","db_column"=>"pname","type"=>0],
					["column"=>"Participant Mobile No","db_column"=>"pmobile","type"=>0],
					["column"=>"Participant Email ID","db_column"=>"pemail","type"=>0],
					["column"=>"Participant Designation","db_column"=>"designation","type"=>0],
					["column"=>"Participant Department","db_column"=>"department","type"=>0],					
					["column"=>"Participant Stream","db_column"=>"category_name","type"=>0],
					["column"=>"Participant Topic","db_column"=>"program","type"=>0],			
					["column"=>"Course & Specialization Studying/Studied","db_column"=>"student_course_specialization","type"=>1],
					["column"=>"Social Status","db_column"=>"caste_type","type"=>1],
					["column"=>"Physically Challenged","db_column"=>"physically_challenged","type"=>1],
					["column"=>"Gender","db_column"=>"gender","type"=>1],
				],
			"Industry" =>
				[
					["column"=>"Name of the  Industry","db_column"=>"name_of_the_industry","type"=>1],
					["column"=>"Company / Industry  Email ID ","db_column"=>"orgemail","type"=>1],
					["column"=>"Company / Industry Phone Number","db_column"=>"institution_phone_number","type"=>1],
					["column"=>"Website","db_column"=>"website","type"=>1],
					["column"=>"Address","db_column"=>"address","type"=>1],
					["column"=>"Number of Participants","db_column"=>"participants","type"=>1],
					["column"=>"Name of the Contact Person","db_column"=>"cpname","type"=>1],
					["column"=>"Contact Person Mobile No","db_column"=>"mobile","type"=>1],
					["column"=>"Contact Person Email ID","db_column"=>"email","type"=>1],
					["column"=>"Contact Person Designation","db_column"=>"contact_person_designation","type"=>1],
					["column"=>"Contact Person Department","db_column"=>"contact_person_department","type"=>1],
					["column"=>"Contact Person Stream","db_column"=>"contact_person_stream","type"=>1],
					["column"=>"Number of Participants","db_column"=>"participants","type"=>1],
					["column"=>"Participant Number","db_column"=>"par_number","type"=>0],
					["column"=>"Participant Serial Number","db_column"=>"serial_number","type"=>0],
					["column"=>"Participant Name","db_column"=>"pname","type"=>0],
					["column"=>"Participant Mobile No","db_column"=>"pmobile","type"=>0],
					["column"=>"Participant Email ID","db_column"=>"pemail","type"=>0],
					["column"=>"Participant Designation","db_column"=>"designation","type"=>0],
					["column"=>"Participant Department","db_column"=>"department","type"=>0],
					["column"=>"Participant Stream","db_column"=>"category_name","type"=>0],
					["column"=>"Participant Topic","db_column"=>"program","type"=>0],		
					["column"=>"Management Details","db_column"=>"managementdetails","type"=>1],
				],
			"R&D-Labs" =>
				[
					["column"=>"Name of the Organization","db_column"=>"rd_name_of_the_organization","type"=>1],
					["column"=>"Organization Email ","db_column"=>"orgemail","type"=>1],
					["column"=>"Organization Phone Number","db_column"=>"institution_phone_number","type"=>1],
					["column"=>"Website","db_column"=>"website","type"=>1],
					["column"=>"Address","db_column"=>"address","type"=>1],
					["column"=>"Number of Participants","db_column"=>"participants","type"=>1],
					["column"=>"Name of the Contact Person","db_column"=>"cpname","type"=>1],
					["column"=>"Contact Person Mobile No","db_column"=>"mobile","type"=>1],
					["column"=>"Contact Person Email ID","db_column"=>"email","type"=>1],
					["column"=>"Contact Person Designation","db_column"=>"contact_person_designation","type"=>1],
					["column"=>"Contact Person Department","db_column"=>"contact_person_department","type"=>1],
					["column"=>"Contact Person Stream","db_column"=>"contact_person_stream","type"=>1],
					["column"=>"Number of Participants","db_column"=>"participants","type"=>1],
					["column"=>"Participant Number","db_column"=>"par_number","type"=>0],
					["column"=>"Participant Serial Number","db_column"=>"serial_number","type"=>0],
					["column"=>"Participant Name","db_column"=>"pname","type"=>0],
					["column"=>"Participant Mobile No","db_column"=>"pmobile","type"=>0],
					["column"=>"Participant Email ID","db_column"=>"pemail","type"=>0],
					["column"=>"Participant Designation","db_column"=>"designation","type"=>0],
					["column"=>"Participant Department","db_column"=>"department","type"=>0],
					["column"=>"Participant Stream","db_column"=>"category_name","type"=>0],
					["column"=>"Participant Topic","db_column"=>"program","type"=>0],		
					["column"=>"Management Details","db_column"=>"managementdetails","type"=>1],
				],
			"Retired-Professional" =>
				[
					["column"=>"Name","db_column"=>"rp_name","type"=>1],
					["column"=>"Email ID","db_column"=>"email","type"=>1],
					["column"=>"Mobile Number","db_column"=>"mobile","type"=>1],
					["column"=>"Designation at the time of Retirement","db_column"=>"rp_designation_Retirement","type"=>1],
					["column"=>"Name of the last worked Organisation","db_column"=>"rp_name_organization_retirement","type"=>1],
					["column"=>"Address","db_column"=>"address","type"=>1],
					["column"=>"Number of Participants","db_column"=>"participants","type"=>1],
					["column"=>"Stream","db_column"=>"contact_person_stream","type"=>1],
					["column"=>"Number of Participants","db_column"=>"participants","type"=>1],
					["column"=>"Participant Number","db_column"=>"par_number","type"=>0],
					["column"=>"Participant Serial Number","db_column"=>"serial_number","type"=>0],
					["column"=>"Participant Name","db_column"=>"pname","type"=>0],
					["column"=>"Participant Mobile No","db_column"=>"pmobile","type"=>0],
					["column"=>"Participant Email ID","db_column"=>"pemail","type"=>0],
					["column"=>"Participant Designation","db_column"=>"designation","type"=>0],
					["column"=>"Participant Department","db_column"=>"department","type"=>0],
					["column"=>"Participant Stream","db_column"=>"category_name","type"=>0],
					["column"=>"Participant Topic","db_column"=>"program","type"=>0],
					["column"=>"Social Status","db_column"=>"caste_type","type"=>1],
					["column"=>"Physically Challenged","db_column"=>"physically_challenged","type"=>1],
					["column"=>"Gender","db_column"=>"gender","type"=>1],
				]
		];
		
		return($columns[$category]);
		
	}
	
	function moneyFormatIndia($num){

		$explrestunits = "" ;
		$num = preg_replace('/,+/', '', $num);
		$words = explode(".", $num);
		$des = "00";
		if(count($words)<=2){
			$num=$words[0];
			if(count($words)>=2){$des=$words[1];}
			if(strlen($des)<2){$des="$des";}else{$des=substr($des,0,2);}
		}
		if(strlen($num)>3){
			$lastthree = substr($num, strlen($num)-3, strlen($num));
			$restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
			$restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
			$expunit = str_split($restunits, 2);
			for($i=0; $i<sizeof($expunit); $i++){
				// creates each of the 2's group and adds a comma to the end
				if($i==0)
				{
					$explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
				}else{
					$explrestunits .= $expunit[$i].",";
				}
			}
			$thecash = $explrestunits.$lastthree;
		} else {
			$thecash = $num;
		}
		return "$thecash"; // writes the final format where $currency is the currency symbol.

	}

	public function insertoption($option_name,$option_value){
		
		$on=$this->db->get_where("tbl_options",array('option_name'=>$option_name));
		$os=$on->num_rows();
		
		if($os=='0'){
			
			$data=array("option_name"=>$option_name,
					   "option_value"=>$option_value);
			
			$oss=$this->db->insert("tbl_options",$data);
			
			if($oss){
				return true;
			}else{
				return false;
			}
			
		}
		
		if($os='1'){
			
			$data=array("option_name"=>$option_name,
					   "option_value"=>$option_value);
			
			$this->db->set($data);
			$this->db->where("option_name",$option_name);
			$oss=$this->db->update("tbl_options");
			
			if($oss){
				return true;
			}else{
				return false;
			}
		}		
		
	}
	
	
	public function get_option($option_name){
		
		$option=$this->db->get_where("tbl_options",array("option_name"=>$option_name));
		$o=$option->row();
		if($o){
		
		return $o->option_value;	
		}else{
			$oo='0';
		return $oo;
		}
	}
	
	public function getGeo($ip){
		$country = '';
		$city = '';
		$geoloc = '';
		if($ip!=''){
			$geolocation = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=".$ip));//http://api.ipstack.com/".$ip."?access_key=63f243020216c5c0187bb70c88d085c3
			$country = $geolocation['geoplugin_city'];
			$city = $geolocation['geoplugin_region'];
			if($country!=''){$geoloc = $country;}
			if($city!=''){$geoloc = $geoloc.', '.$city;}
		}
		return $geoloc;
	}
	
	public function generateSerialnumber($year=""){
		
		$icount = $this->db->get_where("tbl_registrations")->num_rows(); 
		$pcount = $this->db->get_where("tbl_participants")->num_rows(); 
		
		$tcount = ($icount+$pcount+1);
		$uyear = ($year != "") ? $year : date("Y");
		
		return str_pad($tcount, 4, "0", STR_PAD_LEFT)."/".$uyear;
		
	}
	
	public function generateripfSerialnumber($year=""){
		
		$icount = $this->db->get_where("tbl_ripf_registrations")->num_rows(); 
		$pcount = $this->db->get_where("tbl_ripf_participants")->num_rows(); 
		
		$tcount = ($icount+$pcount+1);
		$uyear = ($year != 0) ? $year : date("Y");
		
		return str_pad($tcount, 4, "0", STR_PAD_LEFT)."/R".$uyear;
		
	}
	
	public function get_eventtype_data($reg_id){
		
		$rdata = $this->db->get_where("tbl_ripf_registrations",array("id"=>$reg_id))->row();
		$categories = json_decode($rdata->categories);
		$edata = json_decode($rdata->event_data);
		$topics = json_decode($rdata->topic);
		
		if($rdata->event_category == "Institution"){
		
			$html = '<tr>
					<td width="25%"><strong>Name of the Institution:</strong></td>
					<td width="25%">'.$rdata->institutionName.'</td>
					<td width="25%"><strong>Institution Phone Number:</strong></td>
					<td width="25%">'.$rdata->institution_phone_number.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Institution Email ID:</strong></td>
					<td width="25%">'.$rdata->orgemail.'</td>
					<td width="25%"><strong>Website</strong></td>
					<td width="25%">'.$rdata->website.'</td>
				</tr>
				<tr>
					<td><strong>Address for Correspondence:</strong></td>
					<td colspan="3">'.nl2br($rdata->address).'</td>

				</tr>

				<tr>
					<td width="25%"><strong>Name of the Contact Person:</strong></td>
					<td width="25%">'.$rdata->cpname.'</td>
					<td width="25%"><strong>Stream:</strong></td>
					<td width="25%">'.$rdata->contact_person_stream.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Contact Person’s Mobile No.:</strong></td>
					<td width="25%">'.$rdata->mobile.'</td>
					<td width="25%"><strong>Contact Person’s Email ID:</strong></td>
					<td width="25%">'.$rdata->email.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Contact Person’s Designation.:</strong></td>
					<td width="25%">'.$rdata->contact_person_designation.'</td>
					<td width="25%"><strong>Contact Person’s Department:</strong></td>
					<td width="25%">'.$rdata->contact_person_department.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Category of the institution:</strong></td>
					<td width="25%">'.$rdata->categories.'</td>
					<td width="25%"><strong>Management Details</strong></td>
					<td width="25%">
						'.$rdata->managementdetails.'
					</td>
				</tr>
				<tr>
					<td width="25%"><strong>Topics</strong></td>
					<td colspan="3">
						'.implode(",",$topics).'
					</td>
				</tr>';
			
		}
		elseif($rdata->event_category == "Individual-Faculty"){
			
			$html = '<tr>
					<td width="25%"><strong>Full Name:</strong></td>
					<td width="25%">'.$rdata->ifsrp_fullName.'</td>
					<td width="25%"><strong>Phone Number:</strong></td>
					<td width="25%">'.$rdata->mobile.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Email ID:</strong></td>
					<td width="25%">'.$rdata->email.'</td>
					<td width="25%"><strong>Name of the institution</strong></td>
					<td width="25%">'.$rdata->if_nameoftheInstitution_working.'</td>
				</tr>
				<tr>
					<td><strong>Address for Correspondence:</strong></td>
					<td colspan="3">'.nl2br($rdata->address).'</td>

				</tr>

				<tr>
					<td width="25%"><strong>Designation.:</strong></td>
					<td width="25%">'.$rdata->contact_person_designation.'</td>
					<td width="25%"><strong>Department:</strong></td>
					<td width="25%">'.$rdata->contact_person_department.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Caste:</strong></td>
					<td width="25%">'.$rdata->caste_type.'</td>
					<td width="25%"><strong>Physically Challenged</strong></td>
					<td width="25%">'.$rdata->physically_challenged.'
					</td>
				</tr>
				<tr>
					<td width="25%"><strong>Topics</strong></td>
					<td width="25%">
						'.implode(",",$topics).'
					</td>
					<td width="25%"><strong>Stream:</strong></td>
					<td width="25%">'.$rdata->contact_person_stream.'</td>
				</tr>';
			
		}
		elseif($rdata->event_category == "Students"){
			
			$html = '<tr>
					<td width="25%"><strong>Full Name:</strong></td>
					<td width="25%">'.$rdata->ifsrp_fullName.'</td>
					<td width="25%"><strong>Phone Number:</strong></td>
					<td width="25%">'.$rdata->mobile.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Email ID:</strong></td>
					<td width="25%">'.$rdata->email.'</td>
					<td width="25%"><strong>Course & Specialization</strong></td>
					<td width="25%">'.$rdata->student_course_specialization.'</td>
				</tr>
				<tr>
					<td><strong>Address for Correspondence:</strong></td>
					<td colspan="3">'.nl2br($rdata->address).'</td>

				</tr>
				<tr>
					<td width="25%"><strong>Caste:</strong></td>
					<td width="25%">'.$rdata->caste_type.'</td>
					<td width="25%"><strong>Physically Challenged</strong></td>
					<td width="25%">'.$rdata->physically_challenged.'
					</td>
				</tr>
				<tr>
					<td width="25%"><strong>Topics</strong></td>
					<td width="25%">
						'.implode(",",$topics).'
					</td>
					<td width="25%"><strong>Stream:</strong></td>
					<td width="25%">'.$rdata->contact_person_stream.'</td>
				</tr>';
			
		}
		elseif($rdata->event_category == "Industry"){
			
			$html = '<tr>
					<td width="25%"><strong>Name of the  Industry:</strong></td>
					<td width="25%">'.$rdata->name_of_the_industry.'</td>
					<td width="25%"><strong>Company / Industry Phone Number:</strong></td>
					<td width="25%">'.$rdata->institution_phone_number.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Company / Industry  Email ID:</strong></td>
					<td width="25%">'.$rdata->orgemail.'</td>
					<td width="25%"><strong>Course & Specialization</strong></td>
					<td width="25%">'.$rdata->student_course_specialization.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Address for Correspondence:</strong></td>
					<td width="25%">'.nl2br($rdata->address).'</td>
					<td width="25%"><strong>Website</strong></td>
					<td width="25%">'.$rdata->website.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Name of the Contact Person:</strong></td>
					<td width="25%">'.$rdata->cpname.'</td>
					<td width="25%"><strong>Stream:</strong></td>
					<td width="25%">'.$rdata->contact_person_stream.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Contact Person’s Mobile No.:</strong></td>
					<td width="25%">'.$rdata->mobile.'</td>
					<td width="25%"><strong>Contact Person’s Email ID:</strong></td>
					<td width="25%">'.$rdata->email.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Contact Person’s Designation.:</strong></td>
					<td width="25%">'.$rdata->contact_person_designation.'</td>
					<td width="25%"><strong>Contact Person’s Department:</strong></td>
					<td width="25%">'.$rdata->contact_person_department.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Topics</strong></td>
					<td width="25%">
						'.implode(",",$topics).'
					</td>
					<td width="25%"><strong>Management Details</strong></td>
					<td width="25%">
						'.$rdata->managementdetails.'
					</td>
				</tr>';
			
		}
		elseif($rdata->event_category == "R&D-Labs"){
			
			$html = '<tr>
					<td width="25%"><strong>Name of the Organization:</strong></td>
					<td width="25%">'.$rdata->rd_name_of_the_organization.'</td>
					<td width="25%"><strong>Organization Phone Number:</strong></td>
					<td width="25%">'.$rdata->institution_phone_number.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Organization Email:</strong></td>
					<td width="25%">'.$rdata->orgemail.'</td>
					<td width="25%"><strong>Course & Specialization</strong></td>
					<td width="25%">'.$rdata->student_course_specialization.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Address for Correspondence:</strong></td>
					<td width="25%">'.nl2br($rdata->address).'</td>
					<td width="25%"><strong>Website</strong></td>
					<td width="25%">'.$rdata->website.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Name of the Contact Person:</strong></td>
					<td width="25%">'.$rdata->cpname.'</td>
					<td width="25%"><strong>Stream:</strong></td>
					<td width="25%">'.$rdata->contact_person_stream.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Contact Person’s Mobile No.:</strong></td>
					<td width="25%">'.$rdata->mobile.'</td>
					<td width="25%"><strong>Contact Person’s Email ID:</strong></td>
					<td width="25%">'.$rdata->email.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Contact Person’s Designation.:</strong></td>
					<td width="25%">'.$rdata->contact_person_designation.'</td>
					<td width="25%"><strong>Contact Person’s Department:</strong></td>
					<td width="25%">'.$rdata->contact_person_department.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Topics</strong></td>
					<td width="25%">
						'.implode(",",$topics).'
					</td>
					<td width="25%"><strong>Management Details</strong></td>
					<td width="25%">
						'.$rdata->managementdetails.'
					</td>
				</tr>';
			
		}
		elseif($rdata->event_category == "Retired-Professional"){
			
			$html = '<tr>
					<td width="25%"><strong>Name:</strong></td>
					<td width="25%">'.$rdata->rp_name.'</td>
					<td width="25%"><strong>Phone Number:</strong></td>
					<td width="25%">'.$rdata->mobile.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Email Id:</strong></td>
					<td width="25%">'.$rdata->orgemail.'</td>
					<td width="25%"><strong>Designation at the time Retirement</strong></td>
					<td width="25%">'.$rdata->rp_designation_Retirement.'</td>
				</tr>
				<tr>
					<td width="25%"><strong>Address for Correspondence:</strong></td>
					<td width="25%">'.nl2br($rdata->address).'</td>
					<td width="25%"><strong>Stream:</strong></td>
					<td width="25%">'.$rdata->contact_person_stream.'</td>
					
				</tr>
				<tr>
					<td width="25%"><strong>Caste:</strong></td>
					<td width="25%">'.$rdata->caste_type.'</td>
					<td width="25%"><strong>Physically Challenged</strong></td>
					<td width="25%">'.$rdata->physically_challenged.'
					</td>
				</tr>
				<tr>
					<td width="50%"><strong>Name of the Organization at the time Retirement</strong></td>
					<td width="50%">'.$rdata->rp_name_organization_retirement.'</td>
				</tr>
				<tr>
					<td><strong>Topics</strong></td>
					<td colspan="3">
						'.implode(",",$topics).'
					</td>
				</tr>';
			
		}
		
		return $html;
		
	}

}