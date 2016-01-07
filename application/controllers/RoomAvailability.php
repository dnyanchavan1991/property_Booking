<?php
class RoomAvailability extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->library ( 'session' );
	}
	public function index() {
		$checkin =$_POST ['checkIn'];
		$checkin = str_replace ( '/', '-', $checkin );
		$checkout =$_POST ['checkOut'];
		$checkout = str_replace ( '/', '-', $checkout );
		$checkin = date ( 'Y-m-d', strtotime ( $checkin ) );
		$checkout = date ( 'Y-m-d', strtotime ( $checkout ) );
		
		$this->session->set_userdata ( 'checkIn',$checkin  );
		$this->session->set_userdata ( 'checkOut', $checkout );
		$this->load->view ( 'search.html' );
	}
	public function checkRoomAvailabilty() {
		$this->load->model ( 'PropertyModel' );
		
		/*$checkin = $request->checkin;
		$checkin = str_replace ( '/', '-', $checkin );
		$checkout = $request->checkout;
		$checkout = str_replace ( '/', '-', $checkout );
		$MysqlCheckin = date ( 'Y-m-d', strtotime ( $checkin ) );
		$MysqlCheckout = date ( 'Y-m-d', strtotime ( $checkout ) );*/
		$roomAvailableInfo = $this->PropertyModel->checkRoomAvailabilty ($this->session->userdata('checkIn'), $this->session->userdata('checkOut'));
		while ( $row = mysql_fetch_array ( $roomAvailableInfo, MYSQL_ASSOC ) ) {
			if (! isset ( $propertyInfo [$row ['propertyId']] ['AccomodationTypeName'] )) {
				$propertyInfo [$row ['propertyId']] ['AccomodationTypeName'] = array ();
			}
			$propertyInfo [$row ['propertyId']] ['AccomodationTypeName'] [] = $row ['AccomodationTypeName'];
			$propertyInfo [$row ['propertyId']] ['roomidCount'] [] = $row ['roomidCount'];
			$propertyInfo [$row ['propertyId']] ['ImagePath'] = $row ['ImagePath'];
			$propertyInfo [$row ['propertyId']] ['propertyName'] = $row ['propertyName'];
		}
		foreach ( $propertyInfo as $q => $data ) {
			$responce ['roomavAilableInfo'] [] = ( object ) array (
					"propertyId" => $q,
					"propertyName" => $data ['propertyName'],
					"ImagePath" => $data ['ImagePath'],
					"AccomodationTypeName" => ( object ) array (
							"accomdation" => $data ['AccomodationTypeName'],
							"availability" => $data ['roomidCount'] 
					) 
			);
		}
		echo json_encode ( $responce );
	}
}