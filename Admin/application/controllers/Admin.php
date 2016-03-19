<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		if (!$this->session->userdata('authenticate'))
		{ 
			header("location: ../");
		}
		$this->load->view('index');
	}
	public function setLoginSession()
	{
		$this->load->library('session');
		if($this->session->userdata('access_type') == 'admin')
		{
			$this->session->set_userdata('authenticate', 'yes');
			header("location: ../Admin");
		}
		else
		{
			//alert($this->session->userdata('call_back_url'));
			  header("location:../");// + $this->session->userdata('call_back_url'));
			//$this->load-view($this->session->userdata('call_back_url'));
		}
	}
}
