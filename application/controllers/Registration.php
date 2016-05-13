<?php
class Registration extends CI_Controller {

	public function index() {
		$this->load->view ( 'registration.html' );
	}
	public function insertRegistrationData() {
	
		$postdata = file_get_contents("php://input");
		$post= json_decode($postdata);
	
		$registerInfo = array (
				'customer_id' => '1',
				'user_name' => $post->username,
				'password' => $post->password,
				'first_name' => $post->firstName,
				'last_name' => $post->lastName,
				'mobile_number'=>$post->mobileNumber,
				'email_address'=>$post->email,
				'account_active'=>'yes'
				 
		);
		$this->load->model ( 'PropertyModel' );
		$registerInfo = $this->PropertyModel->insertRegistrationData ( $registerInfo );
		session_cache_limiter ( 'private, must-revalidate' );
		//session_cache_expire ( 60 );
		$this->load->library ( 'session' );
		
		if ($post->username != '' && $post->username != null )
		{
			$validate = $this->PropertyModel->authenticate($post->username,$post->password,'user');
			$user_id = $validate->user_id;
			$user_count = $validate->user_count;
		}
		
		if($user_count == 1)
		{
			$loginDetailsArray=array(
				'user_name'=>$post->username,
				'password'=>$post->password,
				'logged_in_dateTime'=>date("y-m-d h:i:s")				
			);
			
			$last_id = $this->PropertyModel->insertLoginData ($loginDetailsArray);
			$this->session->set_userdata('last_user_id', $last_id);
			$this->session->set_userdata('user_id', $user_id);
			$this->session->set_userdata('user_name', $post->username);
			$this->session->set_userdata('access_type', 'user');
			
		}
	
	}
}