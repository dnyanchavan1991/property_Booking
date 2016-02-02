<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class AddPropertyOwnerInfo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('SqlQueryModel');
	}
	public function getPropertyOwnerInfo()
	{
		$PropertyOwnerName = $_POST['name'];
		$PropertyOwnerEmail = $_POST['email'];
		$PropertyOwnerAddress = $_POST['address'];
		$input_date = str_replace('/', '-', $_POST['registred_date']);
		$PropertyOwnerRegistred_date = date("Y-m-d", strtotime($input_date));
		$PropertyOwnerPhone = $_POST['phone'];
		$alternative_phone = $_POST['alternative_phone'];

		$data = array(
						'property_id' => $_SESSION['lastPropertyId'],
						'owner_name' => $PropertyOwnerName,
						'phone' => $PropertyOwnerPhone,
						'alternative_phone' => $alternative_phone,
						'email' => $PropertyOwnerEmail,
						'address' => $PropertyOwnerAddress,
						'registred_date' => $PropertyOwnerRegistred_date
					);
		if($this->SqlQueryModel->insertPropertyOwner_info($data))	
		{
			$_SESSION['lastPropertyId'] = NULL;
			$flag = 1;
			$this->load->view('AddPropertyOwnerInfo', $flag);
			//header('location:'.base_url());
		}
		else
		{
			echo "errrrrrrrrrrrrorrrrr";
		}
	}
}
