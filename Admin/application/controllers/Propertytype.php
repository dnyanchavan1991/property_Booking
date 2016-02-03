<?php
class Propertytype extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('SqlQueryModel');
	}
	public function getPropertyType()
	{
		$type_list = $this->SqlQueryModel->propertyType();
		echo $type_list = json_encode($type_list);
	}
}
?>