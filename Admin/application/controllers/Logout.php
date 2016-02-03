<?php
class Logout extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		
	}
	public function index()
	{
		//$this->session->userdata('user_name') == null ;
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('password');
		//$this->session->userdata('password') == null;
		header("location: ../../dev");
	}
}
?>