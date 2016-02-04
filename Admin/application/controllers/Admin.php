<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		if (!$this->session->userdata('user_name') && !$this->session->userdata('password'))
		{ 
			//echo "hghf";
			header("location: ../");
			//echo $_SERVER['REQUEST_URI']."</br>";
			//echo $_SERVER['SCRIPT_NAME']."</br>";
			//echo FCPATH."</br>";
			//echo SELF."</br>";
			//echo BASEPATH."</br>";
			//echo APPPATH."</br>";
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
			header("location: ../");
		}
	}
}
