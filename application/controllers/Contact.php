<?php
class Contact extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		session_cache_limiter ( 'private, must-revalidate' );
		session_cache_expire ( 60 );
		$this->load->library('session');
		$this->load->model('PropertyModel');
		ini_set('max_execution_time', 6000);
//		if (!$this->session->userdata('user') && !$this->session->userdata('password'))
//		{
//			$this->load->view ( 'index-new.php' );
//		}

	}
//	public function index() {
//		//$this->load->view ( 'contact.html' );
//		$this->Contact_to_customer_enquiry($_POST ['propertyId'], $_POST ['full_name'], $_POST ['email'], $_POST ['phone'], $_POST ['checkIn'], $_POST ['checkOut'], $_POST ['enquiry']);
//	}

	public function sendEmail(){
	    $email = null;
        $phone = null;
        $propertyId = $_POST['property_id'];
        $full_name = $_POST['full_name'];
        $checkin = $_POST['checkIn'];
        $checkout = $_POST['checkOut'];
        $enquiry = $_POST['enquiry'];
        if(isset($_POST['phone'])){
            $phone = $_POST['phone'] ? $_POST['phone'] : null;
        }
        if(isset($_POST['email'])){
            $email = $_POST['email'] ? $_POST['email'] : null;
        }

		if($phone == null){//$post->phone==null

            $propertyOwnerInfo = $this->PropertyModel->getOwnerDetail($propertyId);

            $recepient = $propertyOwnerInfo[0]->email;
            //$recepient = 'shubhamkamat83352@gmial.com';
            $subject = " Enquiry for Property - ".$propertyOwnerInfo[0]->propertyName;
            $message = $full_name. ' - ' .$email . '  is interested in renting property "'.$propertyOwnerInfo[0]->propertyName;
            $message .= '" From: '.$checkin.' To: '.$checkout.' Message:'.$enquiry;

            $this->sendMail($recepient,$subject,$message);

            //$subject1 = "Enquiry for Property - " .$propertyOwnerInfo[0]->propertyName;
            $message2 = " Hello " .$full_name ." \n Your enquiry for renting this property has been sent to The Property Owner. They will contact you soon. \n Thanks for using our services \n Team, TrueHolidays";

            $this->sendMail($email,$subject,$message2);
//            redirect(base_url().'/index.php/Index1/PropertyDetails/'.$propertyId);
        }
		else if( $phone != null ){ //$post->phone!=null
            $propertyOwnerInfo = $this->PropertyModel->getOwnerDetail($propertyId);
            $subject= $full_name. '-' .$phone . '  interested in renting property "'.$propertyOwnerInfo[0]->propertyName;
            $message = $subject.'" From: '.$checkin.' To: '.$checkout.' Message:'.$enquiry;

            $method="POST";
            $data="false";
            //$url="http://bhashsms.com/api/sendmsg.php?user=8796151636&pass=tabrez&sender=KDHLTH&phone=7249612636&text=hello1Hi&priority=sdnd&stype=normal";
            $phone1= $propertyOwnerInfo[0]->phone;
//            $phone1= '9404920014';
            $this->sendSMS($method,$data,$phone1,$message);

            $message1="Your Enquiry has been sent to property owner for Property '" . $propertyOwnerInfo[0]->propertyName . "' Thanks for using our services - Team Holidaybay";
            $this->sendSMS($method,$data,$phone,$message1);
//            redirect(base_url().'/index.php/Index1/PropertyDetails/'.$propertyId);
		}
        $msg = "Thank you..Your Request has been send";
        echo json_encode($msg);
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
	
	/*public function  sendMail1($mailDetailArray) {
		echo $mailDetailArray;
	}*/
	public function  sendMail($recepient,$subject,$message) {
	
		//echo "Inside sendMail function ";
		 //Email information
		  $admin_email = "travel@holidaybay.com";
		  $email = $recepient;
		  $subject1 = $subject;
		  $comment =$message;
		  
		  //send email
 		   mail($email, "$subject1", $comment, "From:" . $admin_email);
		//   mail("vishu.awate@gmail.com", "HI VISH", $comment, "From:vishwanath.awate@klouddata.com");
		  /*if(mail($admin_email, "$subject", $comment, "From:" . $email))
		  {
			  return 'success';
		  }
		  else
		  {
			  return 'fail';
		  }*/
		  
 	}
	
}