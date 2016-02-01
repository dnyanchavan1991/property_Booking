<?php
class Login extends CI_Controller {
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
	}
	$response=array('count'=>$count);
	echo json_encode($response);
		
	}



}
