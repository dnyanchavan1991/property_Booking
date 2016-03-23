<?php
class Logout extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model ( 'PropertyModel' );
	}
	
	public function index(){
		$validate = $this->PropertyModel->deleteLoginUser($this->session->userdata ( 'last_user_id' ));
		session_destroy();
		header("location:Index1");
	}
}