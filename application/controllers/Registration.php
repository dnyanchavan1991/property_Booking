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
				'first_name' => $post->fname,
				'last_name' => $post->lname,
				'mobile_number'=>$post->phone,
				'email_address'=>$post->email,
				'address'=>$post->address
				
					
		);
		$this->load->model ( 'PropertyModel' );
		$registerInfo = $this->PropertyModel->insertRegistrationData ( $registerInfo );
	
	}
}