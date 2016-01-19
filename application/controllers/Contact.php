<?php
class Contact extends CI_Controller {

	public function index() {
		$this->load->view ( 'contact.html' );
	}
	public function  Contact_to_customer($propertyId){
		$this->load->model('PropertyModel');
		$postdata = file_get_contents("php://input");
		$post= json_decode($postdata);
		$checkin = $post->checkIn;
		$checkin = str_replace ( '/', '-', $checkin );
		$checkout = $post->checkOut;
		$checkout = str_replace ( '/', '-', $checkout );
		$checkin = date ( 'Y-m-d', strtotime ( $checkin ) );
		$checkout = date ( 'Y-m-d', strtotime ( $checkout ) );
		$full_name=$post->full_name;
		if($post->phone==null){
			$contactInfo=$post->email_id;
		}
		else{
			$contactInfo=$post->phone;
		}
		$contactArray=array(
		'checkIn'=>$checkin,
		'checkOut'=>$checkout,
		'full_name'=>$full_name,
		'contact'=>$contactInfo
		);
		$messageContentQuery=$this->PropertyModel->getmessageContent('Enq');
		$messageContent=$messageContentQuery->row()->message_content;
	
		if($post->phone==null){
			
			$propertyOwnerInfo=$this->PropertyModel->getOwnerDetail($propertyId);
			$recepient=$propertyOwnerInfo->row()->email.','.$contactInfo;
			$subject=$messageContent.'for'.$propertyOwnerInfo->row()->propertyName;
			
			$message = $messageContent.'for'.$propertyOwnerInfo->row()->propertyName.'from'.$checkin.'to'.$checkout;
		$header = 'MIME-Version: 1.0' . "\r\n";
		$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$header .= "From:vilasgalave14@gmail.com \r\n";
		//echo $recepient.'<br>'.$subject.'<br>'.$message.'<br>'.$header;
		if( mail ($recepient,$subject,$message,$header)){
			echo 'message sent';
		}
		else{
			echo 'message  not sent';
		}
		}
	}
	
}