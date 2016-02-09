<?php
class AccomodationType extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		//session_cache_limiter('private, must-revalidate');
		//session_cache_expire(60);
		$this->load->library ( 'session' );
	}
	public function index() {
		
		}
		public function getAccomodationType($id){
			$this->load->model ( 'PropertyModel' );
			if($id==1){
			$propertyId=$this->session->userdata ( 'propertyId' );}
			elseif ($id==2){
				$propertyId=null;
			}
			$accomodationTypeList = $this->PropertyModel->getAccomodationType ( $propertyId );
			echo json_encode($accomodationTypeList);
		}
	}
	