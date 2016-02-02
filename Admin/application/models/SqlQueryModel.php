<?php

class SqlQueryModel extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function propertyList()
	{
		$this->db->select ("P.property_id,P.property_name,P.city,PO.owner_name,PO.phone,DATE_FORMAT(PO.registred_date, '%d/%m/%Y') registred_date");
		$this->db->from ("property P");
		$this->db->join ( "property_info PI", "P.property_id = PI.property_id", "inner" );
		$this->db->join ( "property_owner_info PO", "PI.property_id = PO.property_id", "inner" );
		$getList = $this->db->get();
		return $getList->result();
	}
	public function propertyType()
	{
		$this->db->select ("property_type_id, property_type_name");
		$this->db->from ("property_type");
		$getTypeList = $this->db->get();
		return $getTypeList->result_array();
	}
	public function insertProperty($postdata1,$postdata2)
	{
		$this->db->insert('property', $postdata1);
		$lastId = $this->db->insert_id();
		
		$lastId1 = array('property_id' => $lastId);
		$reault_array = array_merge($lastId1,$postdata2);
		
		$this->db->insert('property_info', $reault_array);
		return $lastId;
	}
	
	public function insertPropertyOwner_info($data)
	{
		return $this->db->insert('property_owner_info', $data);
	}
	
	public function getSingleProperty($id)
	{
		$getList = $this->db->query("SELECT P.property_id,P.property_type_id,P.property_name,P.street,P.city,P.postal_code,P.star_rate,P.state,
									P.image_path,P.location_map,P.description,P.how_to_reach,PI.bedrooms,PI.bathrooms,PI.pool,PI.beds,PI.accommodates,PI.free_parking,
									PI.meals,PI.internet_access,PI.smoking_allowd,PI.television_access,PI.pet_friendly,PI.air_condition,PI.in_house_kitchen,PI.first_aid_available,
									PI.entertainment,PI.other_amenities,PI.theme,PI.attractions,PI.leisureActivities,PI.general,PI.payment_facility,PI.restaurant,
									PO.owner_name,PO.phone,PO.alternative_phone,PO.email,PO.address,DATE_FORMAT(PO.registred_date, '%d/%m/%Y') registred_date  
									FROM property P INNER JOIN property_info PI INNER JOIN property_owner_info PO ON P.property_id = PI.property_id 
									AND PI.property_id = PO.property_id
									WHERE P.property_id = $id");
		return $getList->result_array();
	}
	
	public function getPropertyTypeById($property_type_id)
	{
		$type_by_id = $this->db->query("SELECT property_type_name FROM property_type WHERE property_type_id	= $property_type_id");
		return $type_by_id -> result_array();
	}
	
	public function getUpdateProperty($id)
	{
		$editProperty = $this->db->query("SELECT P.*, PI.bedrooms, PI.bathrooms, PI.pool, PI.meals, PI.internet_access, PI.smoking_allowd, PI.television_access, 
									PI.pet_friendly, PI.air_condition, PI.in_house_kitchen, PI.restaurant, PI.beds, PI.accommodates, PI.free_parking, 
									PI.first_aid_available, PI.entertainment, PI.other_amenities, PI.theme, PI.attractions, PI.leisureActivities, PI.general, 
									PI.payment_facility, PO.owner_name,	PO.phone, PO.alternative_phone,	PO.email, PO.address, DATE_FORMAT(PO.registred_date, '%d/%m/%Y') registred_date 
									FROM property P INNER JOIN property_info PI INNER JOIN property_owner_info PO ON P.property_id = PI.property_id 
									AND PI.property_id = PO.property_id 
									WHERE P.property_id = $id");
		return $editProperty->row_array();
	}	
	public function doUpdateProperty($for_id,$postdata_update1)
	{
		$this->db->where('property.property_id',$for_id);
		return $this->db->update('property', $postdata_update1);
	}
	public function doUpdateProperty_info($for_id,$postdata_update2)
	{
		$this->db->where('property_info.property_id',$for_id);
		return $this->db->update('property_info', $postdata_update2);
	}
	public function doUpdateProperty_owner_info($for_id,$postdata_update3)
	{
		$this->db->where('property_owner_info.property_id',$for_id);
		return $this->db->update('property_owner_info', $postdata_update3);
	}
}
?>