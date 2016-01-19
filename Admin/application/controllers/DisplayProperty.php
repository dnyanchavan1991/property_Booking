<?php

class DisplayProperty extends CI_Controller {
	public function index()
	{
		$this->load->model('SqlQueryModel');
		$response = $this->SqlQueryModel->propertyList();
		$response = json_encode($response);
		file_put_contents("assets/json/Properties.json",$response);
		$this->load->view('DisplayProperty.html');
	}
}
