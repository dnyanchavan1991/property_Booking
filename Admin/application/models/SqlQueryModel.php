<?php

class SqlQueryModel extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function propertyList()
	{
		$this->db->select ("P.PropertyId,P.PropertyName,P.City,PO.name,PO.phone,PO.registred_date");
		$this->db->from ("property P");
		$this->db->join ( "property_info PI", "P.PropertyId = PI.PropertyId", "inner" );
		$this->db->join ( "ad_property_owner_info PO", "PI.PropertyId = PO.PropertyId", "inner" );
		$getList = $this->db->get();
		return $getList->result();
	}
	public function insertProperty($postdata1,$postdata2)
	{
		$this->db->insert('property', $postdata1);
		$lastId = $this->db->insert_id();
		
		$lastId1 = array('PropertyId' => $lastId);
		$reault_array = array_merge($lastId1,$postdata2);
		
		$this->db->insert('property_info', $reault_array);
		return $lastId;
	}
	/*public function insertProperty_info($postdata2)
	{
		$this->db->insert('property_info', $postdata2);
		return $this->db->insert_id();
	}*/
	public function insertPropertyOwner_info($data)
	{
		return $this->db->insert('ad_property_owner_info', $data);
	}
	
	public function getSingleProperty($id)
	{
		$this->db->select ("P.PropertyName,P.Street,P.City,P.PostalCode,P.Phone,P.StarRate,P.State,P.ImagePath,P.location_map,P.description,
			PI.Bedrooms,PI.Bathrooms,PI.Pool,PI.Meals,PI.EntertainMent,PI.OtherAmenities,PI.Theme,PI.Attractions,PI.LeisureActivities,PI.General,
			PO.name,PO.phone,PO.email,PO.address,PO.registred_date");
		$this->db->from ("property P");
		$this->db->join ( "property_info PI", "P.PropertyId = PI.PropertyId", "inner" );
		$this->db->join ( "ad_property_owner_info PO", "PI.PropertyId = PO.PropertyId", "inner" );
		$this->db->where("P.PropertyId",$id);
		$getList = $this->db->get();
		return $getList->result();
	}
}
?>