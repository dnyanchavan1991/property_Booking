<?php
class RoomAvailability extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->library ( 'session' );
		session_cache_limiter ( 'private, must-revalidate' );
		session_cache_expire ( 60 );
	}
	public function index() {
		if (isset ( $_POST ['submit'] )) {
			
			$checkin = $_POST ['checkIn'];
			$checkin = str_replace ( '/', '-', $checkin );
			$checkin = date ('Y-m-d', strtotime ( $checkin ));
			
			$checkout = $_POST ['checkOut'];
			$checkout = str_replace ( '/', '-', $checkout );
			$checkin = date ('Y-m-d', strtotime ( $checkout ));
				
			$this->session->set_userdata ( 'checkIn', $checkin );
			$this->session->set_userdata ( 'checkOut', $checkout );
			$this->session->set_userdata ( 'guestCount',$_POST['guestCount'] );
			$this->session->set_userdata ( 'destination', $_POST['inpDestination'] );
			$this->session->set_userdata ( 'propertyType',$_POST['propertyType']);
		}
		
		
	$this->load->view ( 'search.html' );
	$this->load->view ( 'search1.txt' );
	}
	public function checkRoomAvailabilty() {
		$this->load->model ( 'PropertyModel' );
		$searchArray=array(
				'checkIn'=>$this->session->userdata ( 'checkIn' ),
				'checkOut'=>$this->session->userdata ( 'checkOut' ),
				'guestCount'=>$this->session->userdata ( 'guestCount' ),
				'destination'=>$this->session->userdata ( 'destination' ),
				'propertyType'=>$this->session->userdata ( 'propertyType' )
				
				
		);
                	
		$roomAvailableInfo = $this->PropertyModel->checkRoomAvailabilty ($searchArray);
		
                $i=0;
                foreach($roomAvailableInfo as $row)
			{
                    $row=(array)$row;
                    $response[$i]=array('propertyId'=>$row['propertyId'],'propertyName'=>$row['property'],'ImagePath' => $row['imagePath'],'propertyAddress'=>$row['propertyAddress']);
                    $i++; 
       
			}
		echo json_encode ( $response );
        }
        public function checkFilterRoomAvailabilty() {
        	$postdata = file_get_contents("php://input");
        	$post= json_decode($postdata);
        	//echo $post->selectedstarRateList[0]->name;
        	/*$this->load->model ( 'PropertyModel' );
        	$searchArray=array(
        			'checkIn'=>$this->session->userdata ( 'checkIn' ),
        			'checkOut'=>$this->session->userdata ( 'checkOut' ),
        			'guestCount'=>$this->session->userdata ( 'guestCount' ),
        			'destination'=>$this->session->userdata ( 'destination' ),
        			'propertyType'=>$this->session->userdata ( 'propertyType' )
        
        
        	);
        	 
        	$roomAvailableInfo = $this->PropertyModel->checkRoomAvailabilty ($searchArray);
        
        	$i=0;
        	foreach($roomAvailableInfo as $row)
        	{
        		$row=(array)$row;
        		$response[$i]=array('propertyId'=>$row['propertyId'],'propertyName'=>$row['property'],'ImagePath' => $row['imagePath'],'propertyAddress'=>$row['propertyAddress']);
        		$i++;
        		 
        	}
        	echo json_encode ( $response );*/
        }
}