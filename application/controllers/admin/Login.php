<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/index');
	}

	public function do_login(){
		$log_user = $this->input->post("email");
		$log_pass = $this->login_model->app_password_crypt($this->input->post('userpass'),'e');
		
		if($log_user!='' &&$log_pass!=''){
			$data = $this->login_model->login($log_user,$log_pass);
		    echo json_encode($data);

		}else{
			$data=["Status"=>'InActive',"Message"=>"Please check login credentials."];
			echo json_encode($data);
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}


	
}
