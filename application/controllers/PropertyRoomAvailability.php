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
	public function getAvailablePropertyAccomodatesCount(){
		
		$postdata = file_get_contents("php://input");
		$post= json_decode($postdata);
		$checkin = $post->checkin;
		$checkin = str_replace ( '/', '-', $checkin );
		$checkout = $post->checkout;
		$checkout = str_replace ( '/', '-', $checkout );
		$checkin = date ( 'Y-m-d', strtotime ( $checkin ) );
		$checkout = date ( 'Y-m-d', strtotime ( $checkout ) );
		$accomodates=$post->accomodates;
		
		$confirmArray=array(
								'accomodates'=>$accomodates,
								'checkIn'=>$checkin,
								'checkOut'=>$checkout,
								'propertyId'=>$this->session->userdata ( 'propertyId' )
							);
		$this->load->model('PropertyModel');
		
		$availabilityofRoomCount= $this->PropertyModel->getAvailablePropertyAccomodatesCount( $confirmArray );
		$response=array('count'=>$availabilityofRoomCount);
		echo json_encode($response);
	}
	public function getLogedInUserDetails(){
		$postdata = file_get_contents("php://input");
		$post= json_decode($postdata);
		$user_name = $post->user_name;
			
		$this->load->model('PropertyModel');
		$userInfo = $this->PropertyModel->getLogedInUserDetails( $user_name );
		 $i=0;
		 foreach($userInfo as $row)
		 {
		 	$row=(array)$row;
		 $response=array('username'=>$row['user_name'],'email'=>$row['email_address'],'mobile' => $row['mobile_number']);
		 $i++;
		 }
		 echo json_encode($response);
	}
}