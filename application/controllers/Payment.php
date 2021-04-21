<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function index()
	{
		
		$order_id = $this->secure->generateOrderId();
		$rid = $this->session->userdata("reg_id");
	
		$rdata = $this->db->get_where("tbl_temp_registrations",array("id"=>$rid))->row();

		$total_amount = $rdata->totalPrice;
		$payment_status = "Pending";
		$promo_status = ($this->session->userdata("promo_status")) ? $this->session->userdata("promo_status") : 'Inactive';
		
		$data = array(
			"order_id"=>$order_id,
			"total_amount"=>$total_amount,
			"payment_status"=>$payment_status,
			"temp_registration_id" => $rid,
			"promo_status" => $promo_status,
			"total_discount_amount" => $rdata->total_discount_amount
		);
		
		
		$ps = $this->db->insert("tbl_orders",$data);
		
		if($ps){
			
			redirect("payment/pay/".$order_id);
		
		}else{
			
			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-danger">Error Occured Please Try Again</div>'));
			redirect("home/verifyOtp");
			
		}
		
	}
	
	public function paymentRequest(){
		
		$this->load->view('payment/ccavenue/ccavRequestHandler');
		
	}
	
	public function paymentResponse(){
		
		$this->load->view('payment/ccavenue/ccavResponseHandler');
		
	}
	
	public function pay(){
		
		$this->load->view('payment/ccavenue/index');
		
	}
	
	public function payment_success(){
		
		$this->load->view('payment/ccavenue/payment_success');
		
	}
	
	public function ripfpayment()
	{
		
		$order_id = $this->secure->generateOrderId();
		$rid = $this->session->userdata("reg_id");
	
		$rdata = $this->db->get_where("tbl_ripf_registrations",array("id"=>$rid))->row();

		$total_amount = $rdata->totalPrice;
		$payment_status = "Pending";
		
		$data = array(
			"order_id"=>$order_id,
			"total_amount"=>$total_amount,
			"payment_status"=>$payment_status,
			"temp_registration_id" => $rid,
//			"total_discount_amount" => $rdata->total_discount_amount
		);
		
		$ps = $this->db->insert("tbl_ripf_orders",$data);
		
		if($ps){
			
			redirect("payment/ripfpay/".$order_id);
		
		}else{
			
			$this->session->set_flashdata(array("emsg"=>'<div class="alert alert-danger">Error Occured Please Try Again</div>'));
			redirect("home/verifyOtp");
			
		}
		
	}
	
	public function ripfpaymentRequest(){
		
		$this->load->view('payment/ripf/ccavRequestHandler');
		
	}
	
	public function ripfpaymentResponse(){
		
		$this->load->view('payment/ripf/ccavResponseHandler');
		
	}
	
	public function ripfpay(){
		
		$this->load->view('payment/ripf/index');
		
	}
	
	public function ripfpayment_success(){
		
		$this->load->view('payment/ripf/payment_success');
		
	}
	

	
}
