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
		//$this->load->view ( 'contact.html' );
		$this->Contact_to_customer_enquiry($_POST ['propertyId'], $_POST ['full_name'], $_POST ['email'], $_POST ['phone'], $_POST ['checkIn'], $_POST ['checkOut'], $_POST ['enquiry']);
	}
	
	public function  Contact_to_customer_enquiry($propertyId, $fullName, $email, $phone, $checkIn, $checkOut, $enquiry){
	/*echo($propertyId);
	echo($fullName);
	echo($email);
	echo($phone);
	echo($checkIn);
	echo($checkOut);
	echo($enquiry); */
		$this->load->model('PropertyModel');
		
		$checkin = $checkIn;//$post->checkIn;
		$checkin = str_replace ( '/', '-', $checkin );
		$checkout = $checkOut;//$post->checkOut;
		$checkout = str_replace ( '/', '-', $checkout );
		$checkin = date ( 'Y-m-d', strtotime ( $checkin ) );
		$checkout = date ( 'Y-m-d', strtotime ( $checkout ) );
		$full_name = $fullName;//$post->full_name;
	//	$guestCount = $post->guestCount;
		if($phone == null ){//$post->phone==null
			$contactInfo = $email; //$post->email_id;
		}
		else{
			$contactInfo = $phone; //$post->phone;
		}
		$contactArray=array(
		'checkIn'=>$checkin,
		'checkOut'=>$checkout,
		'full_name'=>$full_name,
		'contact'=>$contactInfo
		);
		$messageContentQuery=$this->PropertyModel->getmessageContent('Enq');
		$dbMessageContent=$messageContentQuery->row()->message_content;
	
		if($phone == null){//$post->phone==null
			
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
			}*/
		}
		else if( $phone != null ){ //$post->phone!=null
		//	echo "<br/> else block : $propertyId<br/>";	
			
			
			///
			
		/*	$SMSURL="http://bhashsms.com/api/sendmsg.php?user=8796151636&pass=tabrez&sender=KDHLTH&phone=8796151636&text=PROPERTY BOOKED&priority=sdnd&stype=normal";
					 //http://bhashsms.com/api/sendmsg.php?user=8796151636&pass=tabrez&sender=KDHLTH&phone=8796151636&text=PROPERTY BOOKED&priority=sdnd&stype=normal
			//"http://bhashsms.com/api/sendmsg.php?user={0}&pass={1}&sender={2}&phone={3}&text={4}&priority=sdnd&stype=normal";
		     $ch = curl_init();
		     curl_setopt($ch, CURLOPT_URL, $SMSURL);
			curl_setopt($ch, CURLOPT_HEADER, 0);
		        curl_exec($ch);
		        
		        //Open the URL to send the message
		        $response = httpRequest($SMSURL); */
			////
			$propertyOwnerInfo = $this->PropertyModel->getOwnerDetail($propertyId);
		//	print_r($propertyOwnerInfo->row()->phone);
			$recepient = $propertyOwnerInfo->row()->phone . ',' . $contactInfo;
		//	echo "<br/>"; echo $recepient;
		//	$subject=$messageContent.'for'.$propertyOwnerInfo->row()->propertyName;
			
			$subject='Enquiry from:'.$fullName.' For: '.$propertyOwnerInfo->row()->propertyName;
			$message = $subject.' From: '.$checkIn.' To: '.$checkOut.' Message:'.$enquiry;
					
	//		$message = $messageContent.'for'.$propertyOwnerInfo->row()->propertyName.'from'.$checkin.'to'.$checkout;
//			if(sendMsg ($recepient, $message, $debug=false))
//			{
				
//				$SMSURL="http://bhashsms.com/api/sendmsg.php?user={0}&pass={1}&sender=&phone={2}&text={3}&priority=sdnd&stype=normal";
//		        $SMSUser="Test";
//		        $SMSPassword="Test";
//		        $url = 'username='. $SMSUser;
//		        $url.= '&password='.$SMSPassword;
//		        $url.= '&action=sendmessage';
//		        $url.= '&messagetype=SMS:TEXT';
//		        $url.= '&recepient='.urlencode($phone);
//		        $url.= '&messagedata='.urlencode($message);
//		        $urltouse =  $SMSURL.$url;
//		        if ($debug) { echo "Request: <br>$urltouse<br><br>"; }
		        
		        //Open the URL to send the message
		         
		         
//		        $response = httpRequest($urltouse);
			$method="POST";
			$data="false";
				//$url="http://bhashsms.com/api/sendmsg.php?user=8796151636&pass=tabrez&sender=KDHLTH&phone=7249612636&text=hello1Hi&priority=sdnd&stype=normal";
			$phone1= $propertyOwnerInfo->row()->phone;
			$this->sendSMS($method,$data,$phone1,$message);
			$message1="Enquiry has been sent.";
			$this->sendSMS($method,$data,$phone,$message1);
			
			//echo $url;
			        //	return("$response"); 
	         
//			}
		
//			else{
//				echo 'message  not sent';
//			}
		}
	}
	public function sendSMS($method,$data,$phone,$message)
	{
		$url="http://bhashsms.com/api/sendmsg.php?user=8796151636&pass=tabrez&sender=KDHLTH&phone=".$phone."&text=".urlencode($message)."&priority=sdnd&stype=normal";
		
		 $curl = curl_init();

		    switch ($method)
		    {
		        case "POST":
		            curl_setopt($curl, CURLOPT_POST, 1);

		            if ($data)
		                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		            break;
		        case "PUT":
		            curl_setopt($curl, CURLOPT_PUT, 1);
		            break;
		        default:
		            if ($data)
		                $url = sprintf("%s?%s", $url, http_build_query($data));
		    }

		    // Optional Authentication:
		    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

		    curl_setopt($curl, CURLOPT_URL, $url);
		    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		    curl_exec($curl);

		    curl_close($curl);



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