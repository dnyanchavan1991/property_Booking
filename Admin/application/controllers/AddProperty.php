<?php

session_start();
class AddProperty extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('SqlQueryModel');
	}
	public function index()
	{
		$this->load->view('AddProperty.html');
	}
	public function getPropertyInfo()
	{
		$PropertyName = $_POST['PropertyName'];
		$Street = $_POST['Street'];
		$City = $_POST['City'];
		$State = $_POST['State'];
		$PostalCode = $_POST['PostalCode'];
		$Phone = $_POST['Phone'];
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
		$path = "Admin/Property gallery/$PropertyName";
		$location_map = $_POST['location_map'];
		$description = $_POST['description'];
		
		$Bedrooms = $_POST['Bedrooms'];
		$Bathrooms = $_POST['Bathrooms'];
		$Pool = $_POST['Pool'];
		$Meals = $_POST['Meals'];
		$EntertainMent = $_POST['EntertainMent'];
		$OtherAmenities = $_POST['OtherAmenities'];
		$Theme = $_POST['Theme'];
		$Attractions = $_POST['Attractions'];
		$LeisureActivities = $_POST['LeisureActivities'];
		$General = $_POST['General'];

		$postdata1 = array(
							'PropertyName' => $PropertyName,
							'Street' => $Street,
							'City' => $City,
							'PostalCode' => $PostalCode,
							'Phone' => $Phone,
							'StarRate' => $StarRate,
							'State' => $State,
							'ImagePath' => $path,
							'location_map' => $location_map,
							'description' => $description
						);
		//$id = $this->SqlQueryModel->insertProperty($postdata1);		
		//
		$postdata2 = array(				
							'Bedrooms' => $Bedrooms,
							'Bathrooms' => $Bathrooms,
							'Pool' => $Pool,
							'Meals' => $Meals,
							'EntertainMent' => $EntertainMent,
							'OtherAmenities' => $OtherAmenities,
							'Theme' => $Theme,
							'Attractions' => $Attractions,
							'LeisureActivities' => $LeisureActivities,
							'General' => $General
						);
		$id = $this->SqlQueryModel->insertProperty($postdata1,$postdata2);	
		$_SESSION['lastPropertyId'] = $id;
		$this->load->view('AddPropertyOwnerInfo.html');
	}
	public function getPropertyOwnerInfo()
	{
		$PropertyOwnerName = $_POST['name'];
		$PropertyOwnerEmail = $_POST['email'];
		$PropertyOwnerAddress = $_POST['address'];
		$input_date = str_replace('/', '-', $_POST['registred_date']);
		$PropertyOwnerRegistred_date = date("Y-m-d", strtotime($input_date));
		$PropertyOwnerPhone = $_POST['phone'];

		$data = array(
						'PropertyId' => $_SESSION['lastPropertyId'],
						'name' => $PropertyOwnerName,
						'phone' => $PropertyOwnerPhone,
						'email' => $PropertyOwnerEmail,
						'address' => $PropertyOwnerAddress,
						'registred_date' => $PropertyOwnerRegistred_date
					);
		if($this->SqlQueryModel->insertPropertyOwner_info($data))	
		{
			$_SESSION['lastPropertyId'] = NULL;
			$this->load->view('DisplayProperty.html');
		}
		else
		{
			echo "errrrrrrrrrrrrorrrrr";
		}
	}
}
