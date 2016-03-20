<?php
class PropertyDetails extends CI_Controller {
	public function __construct() 
	{
		parent::__construct ();
		session_cache_limiter ( 'private, must-revalidate' );
		session_cache_expire ( 60 );
		$this->load->library ( 'session' );
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
		$propertyOtherInfo = $this->PropertyModel->getPropertyInfoDetail ( $this->session->userdata ( 'propertyId' ) );
		
		/* get reviews*/
		$data['propertyReviews'] = $this->PropertyModel->getReviewsByPropertyId ( $this->session->userdata ( 'propertyId' ) );
		$response = json_encode($data['propertyReviews']);
		file_put_contents("json/ReviewsPerProperty.json",$response);
		/* //get reviews*/
		/* general info*/
		$data['propertyId']=$this->session->userdata ( 'propertyId' );
		$data['propertyName']=$propertyDetailInfo->row()->propertyName;
		$data['propertyDescription']=$propertyDetailInfo->row()->description;
		$data['imagePath']=$propertyDetailInfo->row()->imagePath;
		$data['way_to_reach']=$propertyDetailInfo->row()->Direction;
		/* //general info*/
		/* Property Other Info */
		$data['bedrooms']=$propertyOtherInfo->row()->bedrooms;
		$data['bathrooms']=$propertyOtherInfo->row()->bathrooms;
		$data['pool']=$propertyOtherInfo->row()->pool;
		$data['meals']=$propertyOtherInfo->row()->meals;
		$data['internet_access']=$propertyOtherInfo->row()->internet_access;
		$data['television']=$propertyOtherInfo->row()->television;
		$data['pet_friendly']=$propertyOtherInfo->row()->pet_friendly;
		$data['air_condition']=$propertyOtherInfo->row()->air_condition;
		$data['in_house_kitchen']=$propertyOtherInfo->row()->in_house_kitchen;
		$data['other_amenities']=$propertyOtherInfo->row()->other_amenities;
		$data['leisureActivities']=$propertyOtherInfo->row()->leisureActivities;
		$data['accommodates']=$propertyOtherInfo->row()->accommodates;
		/* Property Other Info */	
		
		/* map*/
		$get_latlong = $this->PropertyModel->getlatlongById( $this->session->userdata ( 'propertyId' ) );
		$data['latitude']=$get_latlong->latitude;
		$data['longitude']=$get_latlong->longitude;
		/* //map*/
		/* available accomodates*/
		$data['avail_accomodates']= $this->PropertyModel->getAvailableAccomodates( $this->session->userdata ( 'propertyId' ) );
		/* //available accomodates*/
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