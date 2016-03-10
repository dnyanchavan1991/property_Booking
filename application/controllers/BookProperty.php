<?php
class BookProperty extends CI_Controller {
	public function __construct() {
		parent::__construct ();
	
		
	}
	public function index() {
		$this->bookingProperty();
	
	}
	public function bookingProperty(){
		$this->load->view ( 'booking' );
	}
}