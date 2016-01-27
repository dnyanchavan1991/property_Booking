<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class PropertyIndetail extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('SqlQueryModel');
	}
	public function SessionStorage()
	{
		echo $_SESSION['propertyDetailId'] = $_POST['id'];
		//$this->load->view('DisplayPropertyIndetail.html');
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
			$property_type = $row['property_type'];
			$property_name = $row['property_name'];
			$street = $row['street'];
			$city = $row['city'];
			$postal_code = $row['postal_code'];
			$star_rate = $row['star_rate'];
			$state = $row['state'];
			/*- directory path -*/
			 $image_path = $row['image_path'];
			 $image_path = trim($image_path, "/");
			//echo $directory_path = site_url('Property gallery').$image_path;
			/*--get all images in directory--*/
			//$map = directory_map('./'.$image_path);
			//var_dump($map);
			//$relative_path = base_url().$image_path;
			/*echo $handle = opendir('C:\xampp\htdocs\SVN_propertybooking\branches\dev\Admin\\'.$image_path);
			while($file = readdir($handle)){
				if($file !== '.' && $file !== '..'){
					$get_result = $image_path.$file;
					array_push($img_array,$get_result);
				}
			}*/
			/*foreach ($map as $result)
			{
				$get_result = $image_path.$result;
				array_push($img_array,$get_result);
			}*/
			/*- main image path -*/
			/*$matches = preg_grep("/mainImage/", $img_array);
			$matches = implode($matches);
			$main_img_path = $matches;*/
			
			$location_map = str_replace("<br />","\r\n",$row['location_map']);
			$description = str_replace("<br />","\r\n",$row['description']);
			$how_to_reach = str_replace("<br />","\r\n",$row['how_to_reach']);
			$bedrooms = $row['bedrooms'];
			$bathrooms = $row['bathrooms'];
			$pool = $row['pool'];
			$meals = $row['meals'];
			$internet_access = $row['internet_access'];
			$smoking_allowd = $row['smoking_allowd'];
			$television_access = $row['television_access'];
			$pet_friendly = $row['pet_friendly'];
			$air_condition = $row['air_condition'];
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
			$address = str_replace("<br />","\r\n",$row['address']);
			$registred_date = $row['registred_date'];
			
		}
		/* for time being removed images value in $response_data array*/
		$response_data = array(
								'property_type'=>$property_type,
								'property_name'=>$property_name,
								'street'=>$street,
								'city'=>$city,
								'postal_code'=>$postal_code,
								'star_rate'=>$star_rate,
								'state'=>$state,
								'main_img_path'=>'',
								'images'=>'',
								'location_map'=>$location_map,
								'description'=>$description,
								'how_to_reach'=>$how_to_reach,
								'bedrooms'=>$bedrooms,
								'bathrooms'=>$bathrooms,
								'pool'=>$pool,
								'meals'=>$meals,
								'internet_access'=>$internet_access,
								'attractions'=>$attractions,
								'smoking_allowd'=>$smoking_allowd,
								'television_access'=>$television_access,
								'pet_friendly'=>$pet_friendly,
								'air_condition'=>$air_condition,
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
		//echo $image_path=$response['image_path'];
		$data = json_encode($response_data);
		echo $data;
		//$this->load->view('DisplayPropertyIndetail');
	}
	
}
