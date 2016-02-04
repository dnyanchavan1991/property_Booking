<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddPropertyOwnerInfo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if (!$this->session->userdata('user_name') && !$this->session->userdata('password'))
		{ 
			header("location: ../");
		}
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
						'property_id' => $this->session->userdata('lastPropertyId'),
						'owner_name' => $PropertyOwnerName,
						'phone' => $PropertyOwnerPhone,
						'alternative_phone' => $alternative_phone,
						'email' => $PropertyOwnerEmail,
						'address' => $PropertyOwnerAddress,
						'registred_date' => $PropertyOwnerRegistred_date
					);
		if($this->SqlQueryModel->insertPropertyOwner_info($data))	
		{
			$this->session->unset_userdata('lastPropertyId');
			echo "<script>alert('Property added successfully..!')</script>";
			$this->load->view('AddPropertyOwnerInfo');
			//header('location:'.base_url());
		}
		else
		{
			echo "errrrrrrrrrrrrorrrrr";
		}
	}
}
