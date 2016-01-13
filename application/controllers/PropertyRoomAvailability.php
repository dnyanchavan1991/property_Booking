<?php
class PropertyRoomAvailability extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		session_cache_limiter('private, must-revalidate');
		session_cache_expire(60);
		$this->load->library ( 'session' );
	}
	public function index() {
		
		
		//$this->load->view ('search.html');
	}
	public function getRoomAvailabilityCount(){
		
			echo 'sd';	
			$checkin = $_POST ['checkIn'];
			$checkin = str_replace ( '/', '-', $checkin );
			$checkout = $_POST ['checkOut'];
			$checkout = str_replace ( '/', '-', $checkout );
			$checkin = date ( 'Y-m-d', strtotime ( $checkin ) );
			$checkout = date ( 'Y-m-d', strtotime ( $checkout ) );
			
		
	}
}