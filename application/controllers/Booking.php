<?php
class Booking extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if (!$this->session->userdata('user') && !$this->session->userdata('password'))
		{
			$this->load->view ( 'index.html' );
		}
		
	}

	public function index() {
		$this->load->view ( 'booking.html' );
	}
}