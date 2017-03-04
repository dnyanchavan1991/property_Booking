<?php
class Review extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->library ( 'session' );
		$this->load->model ( 'PropertyModel' );
		
	}
	public function index() {
				
	}
	public function sendReview() {
		$property_id = $_POST['property_id'];
		$customer_name= $_POST['review_name'];

		$customer_email = $_POST['review_email'];
		$rating_given = $_POST['rating_given'];
		$review_given = $_POST['review_given'];

		$review_checkin = str_replace( '/', '-', $_POST['review_checkin']);
		$review_checkin = date ('Y-m-d', strtotime($review_checkin));
		$review_checkout = str_replace( '/', '-', $_POST['review_checkout']);
		 $review_checkout = date ('Y-m-d', strtotime($review_checkout));
		
		$reviewArray = array(
							'property_id'=>$property_id,
							'customer_name'=>$customer_name,
							'customer_email'=>$customer_email,
							'star_rating'=>$rating_given,
							'check_in'=>$review_checkin,
							'check_out'=>$review_checkout,
							'review_text'=>$review_given
						);
		$send_review = $this->PropertyModel->submitReview($reviewArray);
        $property_review = $this->PropertyModel->getPropertyReview($property_id);
        $this->load->view('review_result.php',array('review' => $property_review));
//		exit;
//		$propertyDetailInfo = $this->PropertyModel->getPropertyDetail ( $this->session->userdata ( 'propertyId' ) );
//		$data['propertyName']=$propertyDetailInfo->row()->propertyName;
//		$data['propertyDescription']=$propertyDetailInfo->row()->description;
//		$data['imagePath']=$propertyDetailInfo->row()->imagePath;
//		$data['way_to_reach']=$propertyDetailInfo->row()->Direction;
//		$data['rentresult']=$roomDetailInfo;
//		if($this->session->userdata('user_id'))
//		{
//			$get_user = $this->PropertyModel->getUser($this->session->userdata('user_id'));
//			$data['name'] = $get_user->name;
//			$data['email_address'] = $get_user->email_address;
//		}
//		//$this->load->view ('index.html');
//		//header("location: ../../");
	}
}