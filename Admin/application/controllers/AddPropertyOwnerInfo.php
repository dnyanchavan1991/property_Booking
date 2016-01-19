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
			//$this->load->view('index');
			header('location:'.base_url());
		}
		else
		{
			echo "errrrrrrrrrrrrorrrrr";
		}
	}
}
