<?php
class PropertyModel extends CI_Model {
	// this function returns available rooms according to checkin &checkout date
	public function checkRoomAvailabilty($checkin, $checkout) {
		$this->load->database ();
		
		$reservationTable = 'reservation';
		$accomodationTable = 'accomodationtype';
		$propertyTable = 'property';
		$roomTable = 'room';
		
		$this->db->select ( "room.propertyId,property.propertyName,room.roomid,COUNT(distinct(room.roomid))as roomidCount,acc.AccomodationTypeName,property.ImagePath,concat(property.street,',',property.City,',',property.State,',',property.postalCode)as propertyAddress,room.priceBase" );
		$this->db->from ( "$roomTable room" );
		$this->db->join ( "$reservationTable res", "res.RoomId=room.RoomId", "left" );
		$this->db->join ( "$propertyTable property", "property.PropertyId=room.PropertyId" );
		$this->db->join ( "$accomodationTable acc", "acc.AccomodationTypeId=room.AccomodationTypeId" );
		$this->db->where ( "res.RoomId", NULL );
		$where = "checkout >= '$checkout' AND checkin >='$checkin'";
		$this->db->or_where ( $where );
		$where = "checkout <= '$checkout' AND checkout <='$checkout'";
		$this->db->or_where ( $where );
		$this->db->group_by ( array (
				"property.PropertyId",
				"room.AccomodationTypeId" 
		) );
		$roomAvailableInfo = $this->db->get ();
		
		foreach ( $roomAvailableInfo->result_array () as $row ) {
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
		
		return $propertyInfo;
			
	}
	public function getPropertyDetail($propertyId) {
		$this->load->database ();
		$this->db->select ( 'PropertyName,Description,ImagePath' );
		$query = $this->db->get_where ( 'property' ,array('PropertyId' =>$propertyId));
		return $query;
	}
	public function getAccomodationType($propertyId) {
		$roomTable = 'room';
		$accomodationTable = 'accomodationtype';
		$this->load->database ();
		$this->db->select ( 'distinct(room.AccomodationTypeId),acc.accomodationTypeName' );
		$this->db->from ( "$roomTable room" );
		$this->db->join ( "$accomodationTable acc", "acc.AccomodationTypeId=room.AccomodationTypeId" );
		$query = $this->db->get_where ( 'property' ,array('room.PropertyId' =>$propertyId));
		return $query->result();
	}
}