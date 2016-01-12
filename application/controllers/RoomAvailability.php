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
		
		/*
		 * $checkin = $request->checkin;
		 * $checkin = str_replace ( '/', '-', $checkin );
		 * $checkout = $request->checkout;
		 * $checkout = str_replace ( '/', '-', $checkout );
		 * $MysqlCheckin = date ( 'Y-m-d', strtotime ( $checkin ) );
		 * $MysqlCheckout = date ( 'Y-m-d', strtotime ( $checkout ) );
		 */
		$roomAvailableInfo = $this->PropertyModel->checkRoomAvailabilty ( $this->session->userdata ( 'checkIn' ), $this->session->userdata ( 'checkOut' ) );
		/*
		 * while ( $row = mysql_fetch_array ( $roomAvailableInfo, MYSQL_ASSOC ) ) {
		 * if (! isset ( $propertyInfo [$row ['propertyId']] ['AccomodationTypeName'] )) {
		 * $propertyInfo [$row ['propertyId']] ['AccomodationTypeName'] = array ();
		 * }
		 * $propertyInfo [$row ['propertyId']] ['AccomodationTypeName'] [] = $row ['AccomodationTypeName'];
		 * $propertyInfo [$row ['propertyId']] ['roomidCount'] [] = $row ['roomidCount'];
		 * $propertyInfo [$row ['propertyId']] ['ImagePath'] = $row ['ImagePath'];
		 * $propertyInfo [$row ['propertyId']] ['propertyName'] = $row ['propertyName'];
		 * }
		 */
		foreach ( $roomAvailableInfo as $q => $data ) {
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