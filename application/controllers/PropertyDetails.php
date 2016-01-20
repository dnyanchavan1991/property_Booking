<?php
class PropertyDetails extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		session_cache_limiter ( 'private, must-revalidate' );
		session_cache_expire ( 60 );
		$this->load->library ( 'session' );
	}
	public function index() {
		if (isset ( $_POST ['propertyId'] )) {
			$this->session->set_userdata ( 'propertyId', $_POST ['propertyId'] );
		}
		$this->getRoomDetail();
		
	}
	public function getRoomDetail() {
		$this->load->model ( 'PropertyModel' );
		$roomDetailInfo = $this->PropertyModel->getroomRentDetail ( $this->session->userdata ( 'propertyId' ) );
		$propertyDetailInfo = $this->PropertyModel->getPropertyDetail ( $this->session->userdata ( 'propertyId' ) );
		$data['propertyName']=$propertyDetailInfo->row()->propertyName;
		$data['propertyDescription']=$propertyDetailInfo->row()->description;
		$data['imagePath']=$propertyDetailInfo->row()->imagePath;
		$data['way_to_reach']=$propertyDetailInfo->row()->Direction;
		$data['rentresult']=$roomDetailInfo;
		$this->load->view ( 'contact',$data );
	}
}