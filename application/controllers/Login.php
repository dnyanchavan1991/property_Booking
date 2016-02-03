<?php
class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	public function index() {
		
	}
	public function authenticate() {
		$this->load->model ( 'PropertyModel' );
		$postdata = file_get_contents("php://input");
		$post= json_decode($postdata);
		$username=$post->username;
		$password=$post->password;
		$accesstype=$post->access_type;
		
		$count=$this->PropertyModel->authenticate($username,$password,$accesstype);
		if($count==1){
			$loginDetailsArray=array(
				'user_name'=>$username,
			    'password'=>$password,
				'logged_in_dateTime'=>date("y-m-d h:i:s")
					
			);
			$this->PropertyModel->insertLoginData ($loginDetailsArray);
			$this->session->set_userdata('user', $username);
			$this->session->set_userdata('password', $password);
		}
		$response=array('count'=>$count,'user_name'=>$username,'password'=>$password, 'access_type'=>$accesstype);
		echo json_encode($response);
			
	}
}
