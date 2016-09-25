<?php
class Contact extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if (!$this->session->userdata('user') && !$this->session->userdata('password'))
		{
			$this->load->view ( 'index.html' );
		}
	
	}
	public function index() {
		$this->load->view ( 'contact.html' );
	}
	
	public function  Contact_to_customer_enquiry($propertyId){
	alert("hi");
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
	//	$guestCount = $post->guestCount;
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
		$dbMessageContent=$messageContentQuery->row()->message_content;
	
		if($post->phone==null){
			
			$propertyOwnerInfo=$this->PropertyModel->getOwnerDetail($propertyId);
			$recepient=$propertyOwnerInfo->row()->email.','.$contactInfo;
			$subject=$dbMessageContent.' for '.$propertyOwnerInfo->row()->propertyName;
			$replacableString=array("propertyname", "user", "checkin _date","checkout_date");
			$originalContentString=array($propertyOwnerInfo->row()->propertyName,$full_name,$checkin,$checkout);
			$originalMessageContent=str_replace($replacableString,$originalContentString, $dbMessageContent);
			$mailDetailArray=array(
				'recepient'	=>$recepient,
					'subject'=>$subject,
					'message'=>$originalMessageContent
					
			);
			$mailStatus=$this->sendMail($mailDetailArray);
            return $mailStatus;
			
			
	/*	$header = 'MIME-Version: 1.0' . "\r\n";
		$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$header .= "From:vilasgalave14@gmail.com \r\n";
		
		if( mail ($recepient,$subject,$originalMessageContent,$header)){
			echo 'message sent';
			$templateId=$messageContentQuery->row()->template_id;
			 function insertEnquiryData ($enquiryData){
			 	$enquiryDetailsArray=array(
			 			'user_name'=>$username,
			 			'property_id'=>$this->session->userdata( 'propertyId' ),
			 			'sent_date'=>date("y-m-d h:i:s"),
			 			'template_id'=>$templateId,
			 			'check_in'=>date("y-m-d h:i:s"),
			 			'check_out'=>date("y-m-d h:i:s"),
			 			//'guest_count'=>$guestcount
				);
			 	$this->PropertyModel->insertEnquiryData ($enquiryDetailsArray);
			}
		}
		else if($post->phone!=null){
			
			$propertyOwnerInfo=$this->PropertyModel->getOwnerDetail($propertyId);
			$recepient=$propertyOwnerInfo->row()->phone.','.$contactInfo;
			$subject=$messageContent.'for'.$propertyOwnerInfo->row()->propertyName;
				
			$message = $messageContent.'for'.$propertyOwnerInfo->row()->propertyName.'from'.$checkin.'to'.$checkout;
			if(sendMsg ($recepient, $message, $debug=false)){
				
		$SMSURL="http://bhashsms.com/api/sendmsg.php?user={0}&pass={1}&sender=&phone={2}&text={3}&priority=sdnd&stype=normal";
        $SMSUser="Test";
        $SMSPassword="Test";
        $url = 'username='. $SMSUser;
        $url.= '&password='.$SMSPassword;
        $url.= '&action=sendmessage';
        $url.= '&messagetype=SMS:TEXT';
        $url.= '&recepient='.urlencode($phone);
        $url.= '&messagedata='.urlencode($message);
        $urltouse =  $SMSURL.$url;
        if ($debug) { echo "Request: <br>$urltouse<br><br>"; }
        
        //Open the URL to send the message
        $response = httpRequest($urltouse);
                
        	return($response);
        }
				}
	
		else{
			echo 'message  not sent';
		}
		*/}
	}
	public function  sendMail($mailDetailArray) {
		$header = 'MIME-Version: 1.0' . "\r\n";
		$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$header .= "From:vilasgalave14@gmail.com \r\n";
		
		if( mail ($mailDetailArray['recepient'],$mailDetailArray['subject'],$mailDetailArray['message'],$header)){
			return 'success';
		}
		else{
			return 'fail';
		}
		
	}
	
}