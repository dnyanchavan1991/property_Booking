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
		//echo $image_path=$response->row()->image_path;
		$response = json_encode($response);
		echo $response;
		//$this->load->view('DisplayPropertyIndetail');
	}
	
}
