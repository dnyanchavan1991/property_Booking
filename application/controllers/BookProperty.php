<?php
class BookProperty extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		session_cache_limiter('private, must-revalidate');
		session_cache_expire(60);
		$this->load->library ( 'session' );
		
	}
	public function index() {
		$this->bookingProperty();
	
	}
	public function bookingProperty(){
		$this->load->view ( 'booking' );
	}
	public function booking(){
	$postdata = file_get_contents("php://input");
		$post= json_decode($postdata);
		$checkin = $post->checkin;
		$checkin = str_replace ( '/', '-', $checkin );
		$checkout = $post->checkout;
		$checkout = str_replace ( '/', '-', $checkout );
		$checkin = date ( 'Y-m-d', strtotime ( $checkin ) );
		$checkout = date ( 'Y-m-d', strtotime ( $checkout ) );
		$accomodates=$post->accomodates;
		$reservationArray=array(
				'accomodates'=>$accomodates,
				'check_in'=>$checkin,
				'check_out'=>$checkout,
				'property_id'=>$this->session->userdata ( 'propertyId' ),
				'customer_id'=>'1',
				'reservation_date'=>date('Y-m-d')
		);
		$this->load->model('PropertyModel');
		$reservationAffectedRow= $this->PropertyModel->booking( $reservationArray);
		$response=array('reservationcount'=>$reservationAffectedRow);
		echo json_encode($response);
	}
}