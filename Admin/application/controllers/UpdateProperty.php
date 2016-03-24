<?php

//session_start();
class UpdateProperty extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if (!$this->session->userdata('authenticate'))
		{ 
			header("location: ../");
		}
		$this->load->model('SqlQueryModel');
	}
	public function index($id)
	{
		$_SESSION['edit_id'] = $id;
		$getResult['data'] = $this->SqlQueryModel->getUpdateProperty($id);
		$this->load->view('UpdateProperty', $getResult);
	}
	
	public function unlinkImg()
	{
		if(isset($_GET['val']))
		{
			$img_path = strstr($_GET['val'], "P");
			unlink($img_path);
			echo $img_path;
		}
	}
	
	public function getUpdateData()
	{
		/*-- post property --*/
		
		/*$property_type = $_POST['property_type'];
		$shiftarray = array();
		//$shift=$_POST['selectShift'];

		if ($property_type)
		{
			foreach ($property_type as $value)
			{
				array_push($shiftarray,$value);
			}
		}
		$property_type = implode(",",$shiftarray);*/
		$property_type = $_POST['property_type'];
		$PropertyName = $_POST['PropertyName'];
		$Street = $_POST['Street'];
		$City = $_POST['City'];
		$State = $_POST['State'];
		$PostalCode = $_POST['PostalCode'];
		$StarRate = $_POST['StarRate'];
		$old_path = $_POST['old_path'];
		
		/* image handling */
		if(isset($_FILES['mainImage']))
		{
			/*--upload main img--*/
			$fdata_mainImg=$_FILES['mainImage'];
			$exetention = explode(".", $fdata_mainImg["name"]);
			$mainImg = "mainImage.".end($exetention);
			move_uploaded_file($fdata_mainImg["tmp_name"], $old_path.$mainImg);
		}
		if(isset($_FILES['mainImage']))
		{
			/*--upload gallery img--*/
			$fdata=$_FILES['propertyImages'];
			for($i=0 ; $i<count($fdata['name']) ; $i++)
			{
				$temp = $fdata['tmp_name'][$i];
				$files = $fdata['name'][$i];
				move_uploaded_file($temp,$old_path.$files);
			}
		}
		
		/*-- remane directory --*/
		//$new_path = "Property gallery/$PropertyName".mt_rand()."/";
		//rename($old_path,$new_path);
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		$description = $_POST['description'];
		$how_to_reach = $_POST['how_to_reach'];
		$activation_flag = $_POST['activation_flag'];
		/*--end post property --*/
		
		/*--post property info--*/
		$Bedrooms = $_POST['Bedrooms'];
		$beds = $_POST['beds'];
		$Bathrooms = $_POST['Bathrooms'];
		$accommodates = $_POST['accommodates'];
		$Meals = $_POST['Meals'];
		$Pool = $this->input->post('Pool');
		if($Pool == FALSE)
		{
			$Pool = 'No';
		}
		
		$internet_access = $this->input->post('internet_access');
		if($internet_access == FALSE)
		{
			$internet_access = 'No';
		}
		
		$smoking_allowd = $this->input->post('smoking_allowd');
		if($smoking_allowd == FALSE)
		{
			$smoking_allowd = 'No';
		}
		
		$television_access = $this->input->post('television_access');
		if($television_access == FALSE)
		{
			$television_access = 'No';
		}
		
		$pet_friendly = $this->input->post('pet_friendly');
		if($pet_friendly == FALSE)
		{
			$pet_friendly = 'No';
		}
		
		$air_condition = $this->input->post('air_condition');
		if($air_condition == FALSE)
		{
			$air_condition = 'No';
		}
		
		$payment_facility = $this->input->post('payment_facility');
		if($payment_facility == FALSE)
		{
			$payment_facility = 'No';
		}
		
		$in_house_kitchen = $this->input->post('in_house_kitchen');
		if($in_house_kitchen == FALSE)
		{
			$in_house_kitchen = 'No';
		}
		
		$restaurant = $this->input->post('restaurant');
		if($restaurant == FALSE)
		{
			$restaurant = 'No';
		}
		
		$free_parking = $this->input->post('free_parking');
		if($free_parking == FALSE)
		{
			$free_parking = 'No';
		}
		
		$first_aid_available = $this->input->post('first_aid_available');
		if($first_aid_available == FALSE)
		{
			$first_aid_available = 'No';
		}
		
		$EntertainMent = $_POST['EntertainMent'];
		$OtherAmenities = $_POST['OtherAmenities'];
		$Theme = $_POST['Theme'];
		$Attractions = $_POST['Attractions'];
		$LeisureActivities = $_POST['LeisureActivities'];
		$General = $_POST['General'];
		/*--end post property info--*/
		
		/*--post property owner info--*/
		$PropertyOwnerName = $_POST['name'];
		$PropertyOwnerEmail = $_POST['email'];
		$PropertyOwnerAddress = $_POST['address'];
		$input_date = str_replace('/', '-', $_POST['registred_date']);
		$PropertyOwnerRegistred_date = date("Y-m-d", strtotime($input_date));
		$PropertyOwnerPhone = $_POST['phone'];
		$alternative_phone = $_POST['alternative_phone'];
		
		/*-- property --*/
		$postdata_update1 = array(
							'property_name' => $PropertyName,
							'street' => $Street,
							'city' => $City,
							'postal_code' => $PostalCode,
							'star_rate' => $StarRate,
							'state' => $State,
							'image_path' => $old_path,
							'description' => $description,
							'how_to_reach' => $how_to_reach,
							'property_type_id' => $property_type,
							'activation_flag' => $activation_flag
						);
		
		/*-- property info--*/
		$postdata_update2 = array(				
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
							'payment_facility' => $payment_facility,
							'latitude' => $latitude,
							'longitude' => $longitude
						);
		
		/*-- property owner info --*/
		$postdata_update3 = array(
							'owner_name' => $PropertyOwnerName,
							'phone' => $PropertyOwnerPhone,
							'alternative_phone' => $alternative_phone,
							'email' => $PropertyOwnerEmail,
							'address' => $PropertyOwnerAddress,
							'registred_date' => $PropertyOwnerRegistred_date
							
						);
		$for_id = $_SESSION['edit_id'];
		$res = $this->SqlQueryModel->doUpdateProperty($for_id,$postdata_update1);	
		if($res)
		{
			$this->SqlQueryModel->doUpdateProperty_info($for_id,$postdata_update2);
		}
		$this->SqlQueryModel->doUpdateProperty_owner_info($for_id,$postdata_update3);
		$_SESSION['edit_id'] = null;
		//$update_confirm_flag = "alert";
		header("location: ../../Admin");
		//echo "last insert id ".$id;
		
		//$this->load->view('AddPropertyOwnerInfo');
	}
}
