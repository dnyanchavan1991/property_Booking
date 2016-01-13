<?php
class RoomAvailability extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		session_cache_limiter('private, must-revalidate');
		session_cache_expire(60);
		$this->load->library ( 'session' );
	}
	public function index() {
		if (isset($_POST['submit'])) {
			
			$checkin = $_POST ['checkIn'];
			$checkin = str_replace ( '/', '-', $checkin );
			$checkout = $_POST ['checkOut'];
			$checkout = str_replace ( '/', '-', $checkout );
			$checkin = date ( 'Y-m-d', strtotime ( $checkin ) );
			$checkout = date ( 'Y-m-d', strtotime ( $checkout ) );
			
			$this->session->set_userdata ( 'checkIn', $checkin );
			$this->session->set_userdata ( 'checkOut', $checkout );
		}
		
		$this->load->view ('search.html');
	}
	public function checkRoomAvailabilty() {
		$this->load->model ( 'PropertyModel' );
		
	
		$roomAvailableInfo = $this->PropertyModel->checkRoomAvailabilty ( $this->session->userdata ( 'checkIn' ), $this->session->userdata ( 'checkOut' ) );
		foreach ( $roomAvailableInfo as $row ) {
			if (! isset ( $propertyInfo [$row ['propertyId']] ['AccomodationTypeName'] )) {
				$propertyInfo [$row ['propertyId']] ['AccomodationTypeName'] = array ();
			}
			$propertyInfo [$row ['propertyId']] ['AccomodationTypeName'] [] = $row ['AccomodationTypeName'];
			$propertyInfo [$row ['propertyId']] ['roomidCount'] [] = $row ['roomidCount'];
			$propertyInfo [$row ['propertyId']] ['ImagePath'] = $row ['ImagePath'];
			$propertyInfo [$row ['propertyId']] ['propertyName'] = $row ['propertyName'];
			$propertyInfo [$row ['propertyId']] ['propertyAddress'] = $row ['propertyAddress'];
			$propertyInfo [$row ['propertyId']] ['basePrice'] = $row ['priceBase'];
		}
		
		foreach ( $propertyInfo as $q => $data ) {
			$responce ['roomavAilableInfo'] [] = ( object ) array (
					"propertyId" => $q,
					"propertyName" => $data ['propertyName'],
					"propertyAddress" => $data ['propertyAddress'],
					"ImagePath" => $data ['ImagePath'],
					"AccomodationTypeName" => ( object ) array (
							"accomdation" => $data ['AccomodationTypeName'],
							"availability" => $data ['roomidCount'] 
					)
					,
					"basePrice" => $data ['basePrice'] 
			);
		}
		echo json_encode ( $responce );
	}
}