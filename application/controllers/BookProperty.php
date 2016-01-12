<?php
class BookProperty extends CI_Controller {
	public function __construct() {
		parent::__construct ();
	}
	public function index() {
		if (isset ( $_POST ['propertyId'] )) {
			$this->session->set_userdata ( 'propertyId', $_POST ['propertyId'] );
		}
		$this->bookingProperty();
		//$this->load->view ( 'BOOKING.html' );
	}
	public function bookingProperty(){
		$this->load->view ( 'Booking.html' );
	}
}