<?php
class Logout extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('SqlQueryModel');
	}
	public function index()
	{
		/*$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('access_type');
		$this->session->unset_userdata('authenticate');*/
		$validate = $this->SqlQueryModel->deleteLoginUser($this->session->userdata('last_user_id'));
		session_destroy();
		echo "<meta http-equiv='refresh' content='0;url=../'>";	
	}
	public function viewSite()
	{
		//echo "<meta http-equiv='refresh' content='0;url=../'>";	
		header("location: ../../");
	}
}
