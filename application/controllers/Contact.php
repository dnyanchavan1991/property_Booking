<?php
class Contact extends CI_Controller {

	public function index() {
		$this->load->view ( 'contact.html' );
	}
	public function  Contact_to_customer($propertyId){
		$postdata = file_get_contents("php://input");
		$post= json_decode($postdata);
		$checkin = $post->checkIn;
		$checkin = str_replace ( '/', '-', $checkin );
		$checkout = $post->checkOut;
		$checkout = str_replace ( '/', '-', $checkout );
		$checkin = date ( 'Y-m-d', strtotime ( $checkin ) );
		$checkout = date ( 'Y-m-d', strtotime ( $checkout ) );
		$full_name=$post->full_name;
		if($post->phone==null){
			$contactInfo=$post->email_id;
		}
		else{
			$contactInfo=$post->phone;
		}
		$contactArray=array(
		'checkIn'=>$checkin,
		'checkOut'=>$checkout,
		'full_name'=>$full_name,
				'contact'=>$contactInfo
		);
		  $config = Array(
     'protocol' => 'smtp',
     'smtp_host' => 'smtp.gmail.com',
     'smtp_port' => 465,
     'smtp_user' => 'shrutikharge@gmail.com', // change it to yours
     'smtp_pass' => 'operatingsystem', // change it to yours
     'mailtype' => 'html',
     'charset' => 'iso-8859-1',
     'wordwrap' => TRUE
  );
		  $this->load->library('email', $config);
		  $this->email->from('shrutikharge@gmail.com');
		  $this->email->to("shrutikharge@gmail.com");
		 // $this->email->cc("testcc@domainname.com");
		  $this->email->subject("This is test subject line");
		  $this->email->message("Mail sent test message...");
		   
		  $data['message'] = "Sorry Unable to send email...";
		  $this->email->send();
	}
	
}