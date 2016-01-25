<?php
class NewRegistration extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		session_cache_limiter('private, must-revalidate');
		session_cache_expire(60);
		$this->load->library ( 'session' );
	}
	public function index() {
		echo $_POST['fname'];
		echo $_POST['lname'];
		echo $_POST['email'];
		echo $_POST['address'];
		echo $_POST['phone'];
	}
}