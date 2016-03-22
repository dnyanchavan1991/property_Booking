<?php
class Redirecting extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	
	public function index(){
		
		$controller=$this->session->userdata ( 'controller');
		header("location:$controller");
	}
}