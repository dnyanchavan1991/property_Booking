<?php
class PropertyModel extends CI_Model {
	// this function returns available rooms according to checkin &checkout date
	public function checkRoomAvailabilty($checkin, $checkout) {
		$this->load->database ();
		
		$reservationTable = 'reservation';
		$accomodationTable = 'accomodationtype';
		$propertyTable = 'property';
		$propertyInfo='property_info';
		$roomTable = 'room';
		
		$this->db->select ( "room.property_id as propertyId,property.property_name as property,room.room_id,COUNT(distinct(room.room_id))as roomidCount,acc.accomodation_type_name as Accomodation,property.image_path as imagePath ,concat(property.street,',',property.city,',',property.state,',',property.postal_code)as propertyAddress,room.base_price as basePrice" );
		$this->db->from ( "$roomTable room" );
		$this->db->join ( "$reservationTable res", "res.room_id=room.room_id", "left" );
		$this->db->join ( "$propertyTable property", "property.property_id=room.property_id" );
		$this->db->join ( "$accomodationTable acc", "acc.accomodation_type_id=room.accomodation_type_id" );
		//$this->db->join ( "$propertyInfo propertyInfo", "propertyInfo.accomodation_type_id=room.accomodation_type_id" );
		$this->db->where ( "res.room_id", NULL );
		 $where = "check_out >= '$checkout' AND check_in >='$checkin'";
		$this->db->or_where ( $where );
		$where = "check_out <= '$checkout' AND check_out <='$checkout'";
		$this->db->or_where ( $where );
		$this->db->group_by ( array (
				"property.property_id",
				"room.accomodation_type_id" 
		) );
		$roomAvailableInfo = $this->db->get ();
		$roomAvailableInfoResult=$roomAvailableInfo->result_array () ;
	
		return $roomAvailableInfoResult;
			
	}
	/*checkRoomAvailabilty ends here*/
	
	/*this function gets property detail on click on particular property of search.html*/
	public function getPropertyDetail($propertyId) {
		$this->load->database ();
		$this->db->select ( 'property_name as propertyName,description,image_path as imagePath,how_to_reach as Direction' );
		$query = $this->db->get_where ( 'property' ,array('property_id' =>$propertyId));
		return $query;
	}
	/*this function gives accomodation type as abhk/2 bhk*/
	public function getAccomodationType($propertyId) {
		$roomTable = 'room';
		$accomodationTable = 'accomodationtype';
		$this->load->database ();
		$this->db->select ( 'distinct(room.accomodation_type_id)as accomodationTypeId,acc.accomodation_type_name as accomodationTypeName' );
		$this->db->from ( "$roomTable room" );
		$this->db->join ( "$accomodationTable acc", "acc.accomodation_type_id=room.accomodation_type_id" );
		$query = $this->db->get_where ( 'property' ,array('room.property_id' =>$propertyId));
		return $query->result();
	}
	/*this function gives rooms available for particular is ,for it's particular accomodation type*/
	public function getRoomAvailabilityCount($confirmArray) {
		$this->load->database ();	
		$reservationTable = 'reservation';
		$accomodationTable = 'accomodationtype';
		$propertyTable = 'property';
		$roomTable = 'room';
		$checkIn=$confirmArray['checkin'];
		$checkOut=$confirmArray['checkout'];
	
		$this->db->select ( "COUNT(distinct(room.room_id))as count");
		$this->db->from ( "$roomTable room" );
		$this->db->join ( "$reservationTable res", "res.room_id=room.room_id", "left" );
		$this->db->join ( "$propertyTable property", "property.property_id=room.property_id" );
		$this->db->join ( "$accomodationTable acc", "acc.accomodation_type_id=room.accomodation_type_id" );
		$this->db->where ( "res.room_id", NULL );
		$this->db->where("room.accomodation_type_id",$confirmArray['accomodationTypeId']);
		$where = "check_out >= '$checkOut' AND check_in >='$checkIn'";
		$this->db->or_where ( $where );
		$where = "check_out <= '$checkOut' AND check_out <='$checkOut'";
		$this->db->or_where ( $where );
		
		$this->db->group_by ( array (
				"property.property_id",
				"room.accomodation_type_id"
		) );
		$availabilityofRoomCount = $this->db->get ();
		$roomAvailableCount=$availabilityofRoomCount->row()->count;
		return 	$roomAvailableCount;			
	}
	public function verifyDuplicateIPData($ip_address, $date_visited)
	{
		$this->load->database ();
		$visitorTable = 'visitors_info';
		$this->db->select ( " COUNT(visitor_id)as count");
		$this->db->from ( "$visitorTable visitor" );
		$where = "visitor_ip = '$ip_address' AND date_visited = '$date_visited'";
		$this->db->where($where);
		
		$result = $this->db->get();	
		$resultCount = $result->row()->count;	
		
		return $resultCount;
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
	/*this function gives last minute deal data*/
	public  function getlastMinDeal(){
		$currentDate=date('Y-m-d');
		$this->load->database ();
		$propertyTable = 'property';
		$auditRentTable = 'audit_rent';
		$this->db->select ( "property.property_name as name,auditRent.rent_description as des,property.image_pathas imagePath");
		$this->db->from ( "$propertyTable property" );
		$this->db->join ( "$auditRentTable auditRent", "auditRent.property_id=property.property_id" );
		$where = "start_date<= '$currentDate' AND end_date <='$currentDate'";
		$this->db->where ($where);
		$this->db->order_by('rent_id','desc');
		$query=$this->db->get();
		$lastMinDealData=$query->result();
		return  $lastMinDealData;
	
	
	}
	/*this function gives owner detail particular to proprty */
	public  function getOwnerDetail($propertyId){
		$ownerInfoTable='property_owner_info';
		$propertyTable='property';
		$this->load->database ();
		$this->db->select ( "owner_name as name,phone,email,property_name as propertyName");
		$this->db->from (" $ownerInfoTable  owner" );
		$this->db->join ( "$propertyTable property", "owner.property_id=property.property_id" );
		$this->db->where ('owner.property_id',$propertyId);
	   $query=$this->db->get();
	   return  $query;
	}
	/*this function gives message content from db depending upon message type*/
	public function  getmessageContent($messageType){
		$templateMessageTable='msg_template_table';
		$this->load->database ();
		$this->db->select ( "template_content as message_content");
		$this->db->from ( "$templateMessageTable" );
		$this->db->where ('type',$messageType);
		$query=$this->db->get();
		return  $query;
	}
	/*this function gives room reant per property per accomodation Type*/
	public  function  getroomRentDetail($propertyId){
		$roomTable='room';
		$accomodationTable='accomodationtype';
		$this->load->database ();
		$this->db->select ( "base_price as basePrice,price_per_adult as adultPrice,price_per_child as childPrice,accomodation_type_name as accomodation,room_capacity as capacity");
		$this->db->from ( "$roomTable room" );
		$this->db->join ( "$accomodationTable acc", "acc.accomodation_type_id=room.accomodation_type_id");
		
		$this->db->where ( "property_id", $propertyId );
		$query=$this->db->get();
		return  $query->result();
		
	}
	/*this function inserts registration data in Customer table*/
	public function insertCustomerData ($customerData)
	{
			
		$customerTable='visitors_info';
		$this->load->database ();
		$query=$this->db->insert($customerTable,$customerData);
			
	
	}

}