<?php

class DisplayProperty extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if (!$this->session->userdata('user_name') && !$this->session->userdata('password'))
		{ 
			header("location: ../../dev");
			//echo "<script>alert('You are not logged in..!')</script>";
			//echo "<meta http-equiv='refresh' content='0;url=../../dev'>";
		}
		$this->load->model('SqlQueryModel');
		
	}
	public function index()
	{
		$response = $this->SqlQueryModel->propertyList();
		$response = json_encode($response);
		file_put_contents("assets/json/Properties.json",$response);
		$this->load->view('DisplayProperty.html');
	}
}
