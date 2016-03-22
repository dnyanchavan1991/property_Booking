<?php
class Registration extends CI_Controller {

	public function index() {
		$this->load->view ( 'registration.html' );
	}
	public function insertRegistrationData() {
	
		$postdata = file_get_contents("php://input");
		$post= json_decode($postdata);
	
		$registerInfo = array (
				'user_name' => $post->username,
				'password' => $post->password,
				'first_name' => $post->firstName,
				'last_name' => $post->lastName,
				'mobile_number'=>$post->mobileNumber,
				'email_address'=>$post->email
				
				
					
		);
		$this->load->model ( 'PropertyModel' );
		$registerInfo = $this->PropertyModel->insertRegistrationData ( $registerInfo );
	
	}
}