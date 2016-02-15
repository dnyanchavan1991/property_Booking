<?php
class PropertyModel extends CI_Model {
	// this function returns available rooms according to checkin &checkout date
public function checkRoomAvailabilty($searchArray,$filterData) {
		$this->load->database ();
		
		$reservationTable = 'reservation';
		$accomodationTable = 'accomodationtype';
		$propertyTable = 'property';
		$propertyInfo='property_info';
		$roomTable = 'room';
		
		
		$checkout=$searchArray['checkOut'];
		$checkin=$searchArray['checkIn'];
                $guestCountstring=$searchArray['guestCount'];
                $guestCount=(int)substr($guestCountstring,7);
                $propertyType=$searchArray['propertyType'];
                $destination=$searchArray['destination'];
     
       $this->db->select ("property.property_id as propertyId,property.property_name as property,property.property_type_id,property.image_path as imagePath ,concat(property.street,',',property.city,',',property.state,',',property.postal_code)as propertyAddress,propertyInfo.accommodates,propertyInfo.accommodates-IFNULL(sum(res.accomodates),0) as availableAccomodes");
		$this->db->from ( "$propertyInfo propertyInfo" );
		$this->db->join ( "$reservationTable res", "res.property_id=propertyInfo.property_id", "left" );
		$this->db->join ( "$propertyTable property", "propertyInfo.property_id=property.property_id" );
		//$this->db->where ( "res.property_id", NULL );
        $where = "city  like'%$destination%' or state like '%$destination%'";
		$this->db->where( $where );
         $where = "property_type_id='$propertyType'";
		$this->db->where ( $where );
		$where = "((check_out >= '$checkout' AND check_in >='$checkin')";
		$this->db->where ( $where );
		$where = "(check_out <= '$checkout' AND check_out <='$checkout'))";
		$this->db->or_where ( $where );
		if($filterData!=null){
			if(sizeof($filterData->selectedstarRateList)!=0){
				foreach($filterData->selectedstarRateList as $starList){
					$this->db->or_where('property.star_rate', $starList->name);
					
				}
			}
			/*if(sizeof($filterData->selectedFeatureList)!=0){
				foreach($filterData->selectedFeatureList as $featurerList){
					$this->db->or_where("`propertyInfo."."$featurerList->name`", 'Yes');
						
				}
			}*/
		}
		$this->db->group_by ( array (
				"property.property_id"
		) );
		$this->db->having("availableAccomodes>=$guestCount");
		$roomAvailableInfo = $this->db->get ();
		$roomAvailableInfoResult=$roomAvailableInfo->result() ;
	
	return  $roomAvailableInfoResult;
			
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
		if($propertyId!=null){
			$this->db->select ( 'distinct(room.accomodation_type_id)as accomodationTypeId,acc.accomodation_type_name as accomodationTypeName' );
			$this->db->from ( "$roomTable room" );
			$this->db->join ( "$accomodationTable acc", "acc.accomodation_type_id==room.accomodation_type_id" );
			$query = $this->db->get_where ( 'property' ,array('room.property_id' =>$propertyId));
		}
		else{
			$this->db->select ( 'accomodation_type_id as accomodationTypeId,accomodation_type_name as accomodationTypeName' );
			$this->db->from ( "$accomodationTable" );
			$query = $this->db->get();
			}

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
		$this->db->select ( "template_content as message_content,template_id");
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
	/*this function inserts registration data in registration table*/
	public function insertRegistrationData ($registerData)
	{
			
		$registrationTable='registration';
		$this->load->database ();
		$query=$this->db->insert($registrationTable,$registerData);
	
	}
	/*this function checks registration table for username and password availability*/
	
	public function authenticate ($username,$password,$accestype)
	{
			
		$registrationTable='registration';
		$this->load->database ();
		$this->db->select('count(*) as count');
		$this->db->from($registrationTable);
		$this->db->where('user_name',$username);
		$this->db->where('password',$password);
		$this->db->where('access_type',$accestype);
		$query=$this->db->get();
		
		return $query->row()->count;
	
	}
	/*this function inserts username,pass and datetime  in login table*/
	public function insertLoginData ($loginData)
	{
			
		$loginTable='login';
		$this->load->database ();
		$query=$this->db->insert($loginTable,$loginData);
	
	}
	/*this function used to fetch proprty images randomly*/
	public function galleryImgFetch()
	{
			
		$propertyTable='property';
		$this->load->database ();
		$this->db->select('property_id,image_path');
		$this->db->from($propertyTable);
		$this->db->order_by('rand()');
		$this->db->limit(5);
		$query=$this->db->get();
	
		return $query->result();
	
	}
	/*this function inserts data in enquiry table*/
	public function insertEnquiryData ($enquiryData)
	{
			
		$enquiryTable='enquiry';
		$this->load->database ();
		$query=$this->db->insert($enquiryTable,$enquiryData);
	
	}
	/*this function used to retrive values fron registration table based on cokkie value */
	public function getLogedInUserDetails($user_name){
		$registrationTable='registration';
		$this->load->database ();
		$this->db->select('user_name,email_address,mobile_number');
		$this->db->from($registrationTable);
		$this->db->where('user_name',$user_name);
		$query=$this->db->get();
		
		return $query->result();
		
	}
}