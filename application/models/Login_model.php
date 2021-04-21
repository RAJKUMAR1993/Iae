<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_model {

	public function login($email = null,$password=null){
		$check_email = $this->db->where('Email',$email)->get('admins');
		if($check_email->num_rows() > 0){
			$row = $check_email->row_array();
			if($row["User_Password"] != $password){
				 return $data=["Status"=>'InActive',"Message"=>"Please check login credentials."];
				 exit();
			}
			if($row['Status']=='Active'){
				$this->session->set_userdata(array("adminid"=>$row['UserId'],"admin_email"=>$row['Email'],"role"=>$row['Role'],"status"=>$row['Status'],"admin_mobile"=>$row['Mobile'],"admin_name"=>$row['Name'],"logged_in"=>true));
				$data=["Status"=>$row['Status'],"Role"=>$row['Role'],"UserId"=>$row['UserId'],"Message"=>"Success"];
				return $data;
			}else{
  				$data=["Status"=>$row['Status'],"Message"=>"Your accout has been deactivated, please contact Admin."];
			}
		}/*elseif($check_email->num_rows() == 0){

			$check_user_email = $this->db->where("student_email",$email)->get("tbl_students");

			if($check_user_email->num_rows() > 0){

				$urow = $check_user_email->row_array();	
				if($urow["password"] != $password){
				 return $data = ["Status"=>'InActive',"Message"=>"Please check login credentials."];
				 exit();
				}
					$this->session->set_userdata(array("user_id"=>$urow['student_id'],"user_email"=>$urow['student_email'],"user_mobile"=>$urow['student_mobile'],"user_name"=>$urow['student_name'],"logged_in"=>true,"role"=>'user'));
					$data = ["Status"=>'Active',"Role"=>'user',"user_id"=>$urow['student_id'],"Message"=>"Success"];
					return $data;
				
			}else{
				return $data = ["Status"=>'InActive',"Message"=>"Please check login credentials."]; exit;
			}
		}*/else{
			 $data =["Status"=>'InActive',"Message"=>"Please check login credentials."];
			}
			return $data;
		
	}


	public function student_login($email = null,$password=null){
	

			$check_user_email = $this->db->where("student_email",$email)->get("tbl_students");

			if($check_user_email->num_rows() > 0){

				$urow = $check_user_email->row_array();	
				if($urow["password"] != $password){
				 return $data = ["Status"=>'InActive',"Message"=>"Please check login credentials."];
				 exit();
				}
					$this->session->set_userdata(array("user_id"=>$urow['student_id'],"user_email"=>$urow['student_email'],"user_mobile"=>$urow['student_mobile'],"user_name"=>$urow['student_name'],"logged_in"=>true,"role"=>'user'));
					$data = ["Status"=>'Active',"Role"=>'user',"user_id"=>$urow['student_id'],"Message"=>"Success"];
					return $data;
				
			}else{
				return $data = ["Status"=>'InActive',"Message"=>"Please check login credentials."]; exit;
			}
		
			return $data;
		
	}


	public function app_password_crypt( $string, $action ) {
		    $secret_key = '828569b50d33337c3fe5f45650fa7c21';
		    $secret_iv = 'cd187735dbfa1bf3a395ed52eaf82911';

		    $output = false;
		    $encrypt_method = "AES-256-CBC";
		    $key = hash( 'sha256', $secret_key );
		    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

		    if( $action == 'e' ) {
		        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
		    }
		    else if( $action == 'd' ){
		        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
		    }

		    return $output;
	}

	public function agent(){
		if ($this->agent->is_browser())
			{
			        $data['agent'] = $this->agent->browser().' '.$this->agent->version();
			}
			elseif ($this->agent->is_robot())
			{
			       $data['agent'] = $this->agent->robot();
			}
			elseif ($this->agent->is_mobile())
			{
			       $data['agent'] = $this->agent->mobile();
			}
			else
			{
			       $data['agent'] = 'Unidentified User Agent';
			}

			$data['platform']= $this->agent->platform(); 
			$data['ip_address'] = $_SERVER['SERVER_ADDR'];
			return $data;
	}
}

