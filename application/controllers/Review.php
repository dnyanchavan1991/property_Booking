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
		//$postdata = file_get_contents("php://input");
		//$post = json_decode($postdata);
		$property_id= $_POST['property_id'];
		$customer_name= $_POST['customer_name'];
		$customer_email = $_POST['customer_email'];
		$rating_given = $_POST['rating_given'];
		$review_given = $_POST['review_given'];
		$reviewArray = array(
							'property_id'=>$property_id,
							'customer_name'=>$customer_name,
							'customer_email'=>$customer_email,
							'star_rating'=>$rating_given,
							'review_text'=>$review_given
						);
		$send_review = $this->PropertyModel->submitReview($reviewArray);
		
		/*$propertyDetailInfo = $this->PropertyModel->getPropertyDetail ( $this->session->userdata ( 'propertyId' ) );
		$data['propertyName']=$propertyDetailInfo->row()->propertyName;
		$data['propertyDescription']=$propertyDetailInfo->row()->description;
		$data['imagePath']=$propertyDetailInfo->row()->imagePath;
		$data['way_to_reach']=$propertyDetailInfo->row()->Direction;
		$data['rentresult']=$roomDetailInfo;
		if($this->session->userdata('user_id'))
		{
			$get_user = $this->PropertyModel->getUser($this->session->userdata('user_id'));
			$data['name'] = $get_user->name;
			$data['email_address'] = $get_user->email_address;
		}*/
		//$this->load->view ('index.html');
		header("location: ../../");
	}
}