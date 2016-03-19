<?php
class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	public function index() {
			$this->load->view ( 'login.html' );
	}
	public function authenticate() {
		$this->load->model ( 'PropertyModel' );
		$postdata = file_get_contents("php://input");
		$post= json_decode($postdata);
		$username=$post->username;
		$password=$post->password;
		$accesstype=$post->access_type;
		$this->session->set_userdata('call_back_url',$post->call_back_url);
		$user_count = 0;
		if ($username != '' && $username != null )
		{
			$validate = $this->PropertyModel->authenticate($username,$password,$accesstype);
			$user_id = $validate->user_id;
			$user_count = $validate->user_count;
		}
		if($user_count == 1)
		{
			$loginDetailsArray=array(
				'user_name'=>$username,
			    'password'=>$password,
				'logged_in_dateTime'=>date("y-m-d h:i:s")
					
			);
			$this->PropertyModel->insertLoginData ($loginDetailsArray);
			$this->session->set_userdata('user_id', $user_id);
			$this->session->set_userdata('user_name', $username);
			$this->session->set_userdata('access_type', $accesstype);
		}
		$response=array('count'=>$user_count);
		echo json_encode($response); 
			
	}
}
