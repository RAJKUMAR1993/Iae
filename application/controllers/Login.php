<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		
		$id = $this->session->userdata("admin_id");
		
		if($id){
			
			redirect("dashboard");
			
		}
		
	}
	
	public function index()
	{
		$this->load->view('login');
	}
	
	function do_login(){

		$email = $this->input->post("email",true);
		$pass = $this->input->post("password",true);

		if(empty($email)){
			$msg = '<div class="alert alert-danger alert-dismissable"><button type = "button" class ="close" data-dismiss = "alert" aria-hidden = "true">&times;</button>Please Enter User Name</div>';	
			$this->session->set_flashdata("fmsg",$msg);
			redirect("login");

		}
		if(empty($pass)){
			$msg = '<div class="alert alert-danger alert-dismissable"><button type = "button" class ="close" data-dismiss = "alert" aria-hidden = "true">&times;</button>Please Enter Password</div>';	
			$this->session->set_flashdata("fmsg",$msg);
			redirect("login");
		}
			
		$a = $this->db->get_where("tbl_auths",array("email"=>$email,"deleted"=>0,"status"=>"Active"))->row();

		if($a){

			$u = $this->db->get_where("tbl_auths",array("email"=>$email,"deleted"=>0,"status"=>"Active"))->row();
			$cpassword = $this->secure->decrypt($u->password);

			if($pass==$cpassword){

					$this->session->set_userdata(array("admin_id"=>$u->id,"email"=>$u->email));

					redirect("dashboard");

			}else{

				$msg = '<div class="alert alert-danger alert-dismissable"><button type = "button" class ="close" data-dismiss = "alert" aria-hidden = "true">&times;</button>Please Enter Correct Password</div>';	
				$this->session->set_flashdata("fmsg",$msg);
				redirect("login");	
			}
		}else{
			$msg = '<div class="alert alert-danger alert-dismissable"><button type = "button" class ="close" data-dismiss = "alert" aria-hidden = "true">&times;</button>Please Enter Correct Email Address</div>';	
				$this->session->set_flashdata("fmsg",$msg);
				redirect("login");
		}

				
	}

}
