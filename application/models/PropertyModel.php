<?php
class PropertyModel extends CI_Model {
	
	public  function  checkRoomAvailabilty($checkin,$checkout){
		$this->load->database();

		$reservationTable='reservation';
		$accomodationTable='accomodationtype';
		$propertyTable='property';
		$roomTable='room';
		
		$this->db->select("room.propertyId,property.propertyName,room.roomid,COUNT(distinct(room.roomid))as roomidCount,acc.AccomodationTypeName,property.ImagePath");
		$this->db->from("$roomTable room");
		$this->db->join("$reservationTable res","res.RoomId=room.RoomId","left");
		$this->db->join("$propertyTable property","property.PropertyId=room.PropertyId");
		$this->db->join("$accomodationTable acc","acc.AccomodationTypeId=room.AccomodationTypeId");
		$this->db->where("res.RoomId",NULL);
		$where="checkout >= '$checkout' AND checkin >='$checkin'";
		$this->db->or_where($where);
		$where="checkout <= '$checkout' AND checkout <='$checkout'";
		$this->db->or_where($where);
		$this->db->group_by(array("property.PropertyId", "room.AccomodationTypeId"));
		$roomAvailableInfo=$this->db->get();
		print_r($roomAvailableInfo);
		$roomAvailableInfo1=$roomAvailableInfo->result_id;
	while ( $row = mysql_fetch_array ( $roomAvailableInfo1) ) {
			if (! isset ( $propertyInfo [$row ['propertyId']] ['AccomodationTypeName'] )) {
				$propertyInfo [$row ['propertyId']] ['AccomodationTypeName'] = array ();
			}
			$propertyInfo [$row ['propertyId']] ['AccomodationTypeName'] [] = $row ['AccomodationTypeName'];
			$propertyInfo [$row ['propertyId']] ['roomidCount'] [] = $row ['roomidCount'];
			$propertyInfo [$row ['propertyId']] ['ImagePath'] = $row ['ImagePath'];
			$propertyInfo [$row ['propertyId']] ['propertyName'] = $row ['propertyName'];
		}
		
		return $propertyInfo;
		/*$AvailabilityQuery = "SELECT room.propertyId,property.propertyName,room.roomid,COUNT(distinct(room.roomid))as roomidCount,
		PropertyName,AccomodationTypeName,ImagePath
		FROM room
		LEFT JOIN reservation ON room.RoomId=reservation.RoomId
		inner join property on property.PropertyId=room.PropertyId
		inner join accomodationtype on accomodationtype.AccomodationTypeId=room.AccomodationTypeId
		WHERE reservation.RoomId IS NULL
		OR (reservation.checkout >= '$Dout' AND reservation.checkin >='$Din')
		OR (reservation.checkout <= '$Dout' AND reservation.checkout <= '$Dout')
		group by property.PropertyId,room.AccomodationTypeId";*/
		
	}
	
	
}