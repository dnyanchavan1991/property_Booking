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
	$response=array('count'=>$count);
	echo json_encode($response);
		
	}



}
