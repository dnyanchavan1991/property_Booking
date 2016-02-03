<?php
//session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class PropertyIndetail extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if (!$this->session->userdata('user_name') && !$this->session->userdata('password'))
		{ 
			header("location: ../../dev");
		}
		$this->load->model('SqlQueryModel');
	}
	public function SessionStorage()
	{
		echo $_SESSION['propertyDetailId'] = $_POST['id'];
	}
	public function loadIndetailView()
	{
		
		$this->load->view('DisplayPropertyIndetail');
	}
	public function singleProperty()
	{
		$localId = $_SESSION['propertyDetailId'];
		$sessionID = json_decode($localId);
		$sessionID = $sessionID[0]->id;
		$response =$this->SqlQueryModel->getSingleProperty($sessionID);
		$img_array = array();
		foreach($response as $row)
		{
			$property_id = $row['property_id'];
			$property_type_id = $row['property_type_id'];
			$property_type = $this->SqlQueryModel->getPropertyTypeById($property_type_id);
			foreach($property_type as $type_row)
			{
				$property_type = $type_row['property_type_name'];
			}
			 
			$property_name = $row['property_name'];
			$street = $row['street'];
			$city = $row['city'];
			$postal_code = $row['postal_code'];
			$star_rate = $row['star_rate'];
			$state = $row['state'];
			/*- directory path -*/
			$image_path = $row['image_path'];
			$directory_path = './'.$image_path;
			/*--get all images in directory--*/
			$map = directory_map($directory_path);
			foreach ($map as $result)
			{
				$get_result = $image_path.$result;
				array_push($img_array,$get_result);
			}
			/*- main image path -*/
			$matches = preg_grep("/mainImage/", $img_array);
			$matches = implode($matches);
			$main_img_path = $matches;
			
			$location_map = nl2br(str_replace(" ",'&nbsp;',$row['location_map']));
			$description = nl2br(str_replace(" ",'&nbsp;',$row['description']));
			$how_to_reach = nl2br(str_replace(" ",'&nbsp;',$row['how_to_reach']));
			$bedrooms = $row['bedrooms'];
			$beds = $row['beds'];
			$bathrooms = $row['bathrooms'];
			$accommodates = $row['accommodates'];
			$pool = $row['pool'];
			$meals = $row['meals'];
			$internet_access = $row['internet_access'];
			$smoking_allowd = $row['smoking_allowd'];
			$television_access = $row['television_access'];
			$pet_friendly = $row['pet_friendly'];
			$air_condition = $row['air_condition'];
			$in_house_kitchen = $row['in_house_kitchen'];
			$restaurant = $row['restaurant'];
			$free_parking = $row['free_parking'];
			$first_aid_available = $row['first_aid_available'];
			$entertainment = $row['entertainment'];
			$other_amenities = $row['other_amenities'];
			$theme = $row['theme'];
			$attractions = $row['attractions'];
			$leisureActivities = $row['leisureActivities'];
			$general = $row['general'];
			$payment_facility = $row['payment_facility'];
			$owner_name = $row['owner_name'];
			$phone = $row['phone'];
			$alternative_phone = $row['alternative_phone'];
			$email = $row['email'];
			$address = nl2br(str_replace(" ",'&nbsp;',$row['address']));
			$registred_date = $row['registred_date'];
			
		}
		/* for time being removed images value in $response_data array*/
		$response_data = array(
								'property_id'=>$property_id,
								'property_type'=>$property_type,
								'property_name'=>$property_name,
								'street'=>$street,
								'city'=>$city,
								'postal_code'=>$postal_code,
								'star_rate'=>$star_rate,
								'state'=>$state,
								'main_img_path'=>$main_img_path,
								'images'=>$img_array,
								'location_map'=>$location_map,
								'description'=>$description,
								'how_to_reach'=>$how_to_reach,
								'bedrooms'=>$bedrooms,
								'beds'=>$beds,
								'accommodates'=>$accommodates,
								'bathrooms'=>$bathrooms,
								'pool'=>$pool,
								'meals'=>$meals,
								'internet_access'=>$internet_access,
								'attractions'=>$attractions,
								'smoking_allowd'=>$smoking_allowd,
								'television_access'=>$television_access,
								'pet_friendly'=>$pet_friendly,
								'air_condition'=>$air_condition,
								'in_house_kitchen'=>$in_house_kitchen,
								'restaurant'=>$restaurant,
								'free_parking'=>$free_parking,
								'first_aid_available'=>$first_aid_available,
								'entertainment'=>$entertainment,
								'other_amenities'=>$other_amenities,
								'theme'=>$theme,
								'leisureActivities'=>$leisureActivities,
								'general'=>$general,
								'payment_facility'=>$payment_facility,
								'owner_name'=>$owner_name,
								'phone'=>$phone,
								'alternative_phone'=>$alternative_phone,
								'email'=>$email,
								'address'=>$address,
								'registred_date'=>$registred_date
							);
		$data = json_encode($response_data);
		echo $data;
	}
	
}
