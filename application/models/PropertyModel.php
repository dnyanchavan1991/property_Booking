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
		$roomAvailableInfoResult=$roomAvailableInfo->result_array () ;
	
		return $roomAvailableInfoResult;
			
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
	public function getRoomAvailabilityCount($confirmArray) {
		$this->load->database ();
	
		$reservationTable = 'reservation';
		$accomodationTable = 'accomodationtype';
		$propertyTable = 'property';
		$roomTable = 'room';
		$checkIn=$confirmArray['checkin'];
		$checkOut=$confirmArray['checkout'];
	
		$this->db->select ( "COUNT(distinct(room.roomid))as count");
		$this->db->from ( "$roomTable room" );
		$this->db->join ( "$reservationTable res", "res.RoomId=room.RoomId", "left" );
		$this->db->join ( "$propertyTable property", "property.PropertyId=room.PropertyId" );
		$this->db->join ( "$accomodationTable acc", "acc.AccomodationTypeId=room.AccomodationTypeId" );
		$this->db->where ( "res.RoomId", NULL );
		$this->db->where("room.accomodationTypeId",$confirmArray['accomodationTypeId']);
		$where = "checkout >= '$checkOut' AND checkin >='$checkIn'";
		$this->db->or_where ( $where );
		$where = "checkout <= '$checkOut' AND checkout <='$checkOut'";
		$this->db->or_where ( $where );
		
		$this->db->group_by ( array (
				"property.PropertyId",
				"room.AccomodationTypeId"
		) );
		$availabilityofRoomCount = $this->db->get ();
		$roomAvailableCount=$availabilityofRoomCount->row()->count;
		return 	$roomAvailableCount;
			
	}
	public function insertVisitorData ($visitorData)
	{
		$visitorTable='visitors_info';
		$this->load->database ();
		$query=$this->db->insert($visitorTable,$visitorData);
	}
	public function getVisitorCount (){
		$visitorTable='visitors_info';
		$this->load->database ();
		$query=$this->db->select ( 'count(distinct visitor_ip) as count' );
		$this->db->from ("$visitorTable");
		$this->db->where('date_visited',date('Y-m-d'));
		$query=$this->db->get();
		return $query->row()->count;
	
	
	}
	
	public  function getlastMinDeal(){
		$currentDate=date('Y-m-d');
		$this->load->database ();
		$propertyTable = 'property';
		$auditRentTable = 'audit_rent';
		$this->db->select ( "property.propertyName as name,auditRent.description as des,property.imagepath");
		$this->db->from ( "$propertyTable property" );
		$this->db->join ( "$auditRentTable auditRent", "auditRent.PropertyId=property.PropertyId" );
		$where = "start_date<= '$currentDate' AND end_date <='$currentDate'";
		$this->db->where ($where);
		$this->db->order_by('id','desc');
		$query=$this->db->get();
		$lastMinDealData=$query->result();
		return  $lastMinDealData;
	
	
	}
	public  function getOwnerDetail($propertyId){
		$ownerInfoTable='ad_property_owner_info';
		$propertyTable='property';
		$this->load->database ();
		$this->db->select ( "name,phone,email,propertyName");
		$this->db->from (" $ownerInfoTable  owner" );
		$this->db->join ( "$propertyTable property", "owner.PropertyId=property.PropertyId" );
		$this->db->where ('owner.propertyId',$propertyId);
	   $query=$this->db->get();
	   return  $query;
	}
	public function  getmessageContent($messageType){
		$templateMessageTable='ad_msg_template_table';
		$this->load->database ();
		$this->db->select ( "template_content as message_content");
		$this->db->from ( "$templateMessageTable" );
		$this->db->where ('type',$messageType);
		$query=$this->db->get();
		return  $query;
	}
	public  function  getroomRentDetail($propertyId){
		$roomTable='room';
		$accomodationTable='accomodationtype';
		$this->load->database ();
		$this->db->select ( "pricebase,priceperadult,priceperchild,accomodationTypeName");
		$this->db->from ( "$roomTable room" );
		$this->db->join ( "$accomodationTable acc", "acc.AccomodationTypeId=room.AccomodationTypeId");
		
		$this->db->where ( "propertyId", $propertyId );
		$query=$this->db->get();
		return  $query->result();
		
	}
}