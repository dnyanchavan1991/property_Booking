<?php
class BookProperty extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		session_cache_limiter('private, must-revalidate');
		session_cache_expire(60);
		$this->load->library ( 'session' );
		$this->load->model('PropertyModel');
	}
	public function index() {
				$checkin = $this->session->userdata ( 'checkIn'); 							
				$checkout = $this->session->userdata ( 'checkOut');			
				 
		$this->bookingProperty($checkin, $checkout);
	
	}
	public function bookingProperty($checkin, $checkout){
		if($this->session->userdata('user_id'))
		{
			$get_user = $this->PropertyModel->getUser($this->session->userdata('user_id'));
			$get_property = $this->PropertyModel->getBookingProperty($this->session->userdata('propertyId'));
			$data['name'] = $get_user->name;
			$data['email_address'] = $get_user->email_address;
			$data['property_name'] = $get_property->property_name;
			$data['image_path'] = $get_property->image_path;
			$data['checkin'] = $checkin;
			$data['checkout'] = $checkout;
			$this->load->view ( 'booking-new',$data);
		} else {
			$this->load->view ( 'booking-new');
		}
	}
	public function booking(){
		
		$checkin = $_POST['txtCheckin'];
		$checkin = str_replace ( '/', '-', $checkin );
		$checkout = $_POST['txtCheckout'];
		$checkout = str_replace ( '/', '-', $checkout );
		$checkin = date ( 'Y-m-d', strtotime ( $checkin ) );
		$checkout = date ( 'Y-m-d', strtotime ( $checkout ) );
		$accomodates = $_POST['accomodates'];
        $property_id = $_POST['property_id'];
        $customer_id = $_POST['customer_id'];

		$reservationArray=array(
				'accomodates'=>$accomodates,				
				'check_in'=>$checkin,
				'check_out'=>$checkout,
				'property_id'=>$property_id,
				'customer_id'=>$customer_id,
				'reservation_date'=>date('Y-m-d')
		);

		//echo $reservationArray;
		$reservationAffectedRow = $this->PropertyModel->booking($reservationArray);
        if($reservationAffectedRow == 1){
            $msg = "Thank you..Your Request has been send";
        }else{
            $msg = "Please try again";
        }
        echo json_encode($msg);
	}
}