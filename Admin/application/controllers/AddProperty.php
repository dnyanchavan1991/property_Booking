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
		$beds = $_POST['beds'];
		$Bathrooms = $_POST['Bathrooms'];
		$accommodates = $_POST['accommodates'];
		$Meals = $_POST['Meals'];
		
		$Pool = $this->input->post('Pool');
		if($Pool == FALSE)
		{
			$Pool = '';
		}
		
		$internet_access = $this->input->post('internet_access');
		if($internet_access == FALSE)
		{
			$internet_access = '';
		}
		
		$smoking_allowd = $this->input->post('smoking_allowd');
		if($smoking_allowd == FALSE)
		{
			$smoking_allowd = '';
		}
		
		$television_access = $this->input->post('television_access');
		if($television_access == FALSE)
		{
			$television_access = '';
		}
		
		$pet_friendly = $this->input->post('pet_friendly');
		if($pet_friendly == FALSE)
		{
			$pet_friendly = '';
		}
		
		$air_condition = $this->input->post('air_condition');
		if($air_condition == FALSE)
		{
			$air_condition = '';
		}
		
		$payment_facility = $this->input->post('payment_facility');
		if($payment_facility == FALSE)
		{
			$payment_facility = '';
		}
		
		$in_house_kitchen = $this->input->post('in_house_kitchen');
		if($in_house_kitchen == FALSE)
		{
			$in_house_kitchen = '';
		}
		
		$restaurant = $this->input->post('restaurant');
		if($restaurant == FALSE)
		{
			$restaurant = '';
		}
		
		$free_parking = $this->input->post('free_parking');
		if($free_parking == FALSE)
		{
			$free_parking = '';
		}
		
		$first_aid_available = $this->input->post('first_aid_available');
		if($first_aid_available == FALSE)
		{
			$first_aid_available = '';
		}
		
		/*$internet_access = $_POST[''];
		$smoking_allowd = $_POST[''];
		$television_access = $_POST[''];
		$pet_friendly = $_POST[''];
		$air_condition = $_POST[''];
		$payment_facility = $_POST[''];
		$in_house_kitchen = $_POST[''];
		$restaurant = $_POST[''];
		$free_parking = $_POST[''];
		$first_aid_available = $_POST['first_aid_available'];*/
		$EntertainMent = $_POST['EntertainMent'];
		$OtherAmenities = $_POST['OtherAmenities'];
		$Theme = $_POST['Theme'];
		$Attractions = $_POST['Attractions'];
		$LeisureActivities = $_POST['LeisureActivities'];
		$General = $_POST['General'];
		

		$postdata1 = array(
							'property_name' => $PropertyName,
							'street' => $Street,
							'city' => $City,
							'postal_code' => $PostalCode,
							'star_rate' => $StarRate,
							'state' => $State,
							'image_path' => $path,
							'location_map' => $location_map,
							'description' => $description,
							'how_to_reach' => $how_to_reach,
							'property_type' => $property_type
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
							'in_house_kitchen' => $in_house_kitchen,
							'restaurant' => $restaurant,
							'beds' => $beds,
							'accommodates' => $accommodates,
							'free_parking' => $free_parking,
							'first_aid_available' => $first_aid_available,
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
