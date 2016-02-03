<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		if ($this->session->userdata('user_name') == null && $this->session->userdata('password') == null)
		{ 
			header("location: ../../dev");
		}
		$this->load->view('index');
	}
	public function setLoginSession($user_name = 'shruti', $password = 'password', $access_type = 'admin')
	{
		$this->load->library('session');
		if($access_type == 'admin')
		{
			$this->session->set_userdata('user_name', $user_name);
			$this->session->set_userdata('password', $password);
			$this->load->view('index');
			header("location: ../Admin");
		}
		else
		{
			header("location: ../../dev");
		}
	}
}
