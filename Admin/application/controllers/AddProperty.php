<?php

session_start();
class AddProperty extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('SqlQueryModel');
	}
	public function index()
	{
		$this->load->view('AddProperty.html');
	}
	public function getPropertyInfo()
	{
		$property_type = $_POST['property_type'];
		$shiftarray = array();
		//$shift=$_POST['selectShift'];

		if ($property_type)
		{
			foreach ($property_type as $value)
			{
				array_push($shiftarray,$value);
			}
		}
		$property_type = implode(",",$shiftarray);
		$PropertyName = $_POST['PropertyName'];
		$Street = $_POST['Street'];
		$City = $_POST['City'];
		$State = $_POST['State'];
		$PostalCode = $_POST['PostalCode'];
		//$Phone = $_POST['Phone'];
		$StarRate = $_POST['StarRate'];
		$fdata_mainImg=$_FILES['mainImage'];
		$fdata=$_FILES['propertyImages'];
		if(is_array($fdata['name']))
		{
			$files="";
			$temp="";
			$path = "Property gallery/$PropertyName/";
			mkdir($path);
			/*--upload main img--*/
			$exetention = explode(".", $fdata_mainImg["name"]);
			$mainImg = "mainImage.".end($exetention);
			move_uploaded_file($fdata_mainImg["tmp_name"], $path.$mainImg);
			/*--upload gallery imgs--*/
			for($i=0 ; $i<count($fdata['name']) ; $i++)
			{
				$temp = $fdata['tmp_name'][$i];
				$files = $fdata['name'][$i];
				move_uploaded_file($temp,$path.$files);
			}
		}
		$path = "Property gallery/$PropertyName/";
		$location_map = $_POST['location_map'];
		$description = $_POST['description'];
		$how_to_reach = $_POST['how_to_reach'];
		
		$Bedrooms = $_POST['Bedrooms'];
		$Bathrooms = $_POST['Bathrooms'];
		$Meals = $_POST['Meals'];
		$Pool = $_POST['Pool'];
		$internet_access = $_POST['internet_access'];
		$smoking_allowd = $_POST['smoking_allowd'];
		$television_access = $_POST['television_access'];
		$pet_friendly = $_POST['pet_friendly'];
		$air_condition = $_POST['air_condition'];
		$EntertainMent = $_POST['EntertainMent'];
		$OtherAmenities = $_POST['OtherAmenities'];
		$Theme = $_POST['Theme'];
		$Attractions = $_POST['Attractions'];
		$LeisureActivities = $_POST['LeisureActivities'];
		$General = $_POST['General'];
		$payment_facility = $_POST['payment_facility'];

		$postdata1 = array(
							'property_type' => $property_type,
							'property_name' => $PropertyName,
							'street' => $Street,
							'city' => $City,
							'postal_code' => $PostalCode,
							'star_rate' => $StarRate,
							'state' => $State,
							'image_path' => $path,
							'location_map' => $location_map,
							'description' => $description,
							'how_to_reach' => $how_to_reach
						);
		//$id = $this->SqlQueryModel->insertProperty($postdata1);		
		//
		$postdata2 = array(				
							'bedrooms' => $Bedrooms,
							'bathrooms' => $Bathrooms,
							'pool' => $Pool,
							'meals' => $Meals,
							'internet_access' => $internet_access,
							'smoking_allowd' => $smoking_allowd,
							'television_access' => $television_access,
							'pet_friendly' => $pet_friendly,
							'air_condition' => $air_condition,
							'entertainment' => $EntertainMent,
							'other_amenities' => $OtherAmenities,
							'theme' => $Theme,
							'attractions' => $Attractions,
							'leisureActivities' => $LeisureActivities,
							'general' => $General,
							'payment_facility' => $payment_facility
						);
		$id = $this->SqlQueryModel->insertProperty($postdata1,$postdata2);	
		echo "last insert id ".$id;
		$_SESSION['lastPropertyId'] = $id;
		$this->load->view('AddPropertyOwnerInfo');
	}
	
}
