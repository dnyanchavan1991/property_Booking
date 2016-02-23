<?php
class PropertyDetails extends CI_Controller {
	public function __construct() 
	{
		parent::__construct ();
		session_cache_limiter ( 'private, must-revalidate' );
		session_cache_expire ( 60 );
		$this->load->library ( 'session' );
		$this->load->library ( 'pagination' );
		$this->load->model ( 'PropertyModel' );
		
	}
	public function index()
	{
		if (isset ( $_POST ['propertyId'] )) 
		{
			$this->session->set_userdata ( 'propertyId', $_POST ['propertyId'] );
		}
		$this->getRoomDetail();
	}
	public function getRoomDetail() 
	{
		$roomDetailInfo = $this->PropertyModel->getroomRentDetail ( $this->session->userdata ( 'propertyId' ) );
		$propertyDetailInfo = $this->PropertyModel->getPropertyDetail ( $this->session->userdata ( 'propertyId' ) );
		/* -- review pagination --*/
		$config = array();
        $config["base_url"] = "PropertyDetails/getRoomDetail";
        $config["total_rows"] = $this->PropertyModel->review_count($this->session->userdata ( 'propertyId' ));
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;		
		//$data['propertyReviews'] = $this->PropertyModel->getReviewsByPropertyId ( $this->session->userdata ( 'propertyId' ) );
		$data["propertyReviews"] = $this->PropertyModel->getReviewsByPropertyId($this->session->userdata ( 'propertyId' ),$config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		/* -- //review pagination --*/
		$data['propertyName']=$propertyDetailInfo->row()->propertyName;
		$data['propertyDescription']=$propertyDetailInfo->row()->description;
		$data['imagePath']=$propertyDetailInfo->row()->imagePath;
		$data['way_to_reach']=$propertyDetailInfo->row()->Direction;
		
		$get_latlong = $this->PropertyModel->getlatlongById( $this->session->userdata ( 'propertyId' ) );
		$data['latitude']=$get_latlong->latitude;
		$data['longitude']=$get_latlong->longitude;
		
		$data['rentresult']=$roomDetailInfo;
		$data['property_id']=$this->session->userdata ( 'propertyId' );
		if($this->session->userdata('user_id'))
		{
			$get_user = $this->PropertyModel->getUser($this->session->userdata('user_id'));
			$data['name'] = $get_user->name;
			$data['email_address'] = $get_user->email_address;
		}
		$this->load->view ( 'contact',$data );
	}
}