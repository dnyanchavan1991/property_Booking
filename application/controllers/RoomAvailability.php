<?php
class RoomAvailability extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		session_cache_limiter ( 'private, must-revalidate' );
		session_cache_expire ( 60 );
		$this->load->library ( 'session' );
		//$this->load->model ( 'PropertyModel' );
	}
	public function index() {
		
	 	 if (isset ( $_POST ['submit'] ) )  
			{ 
		 	
			$checkin = $_POST ['checkIn']; 			
			$checkin = date ('Y-m-d', strtotime ( $checkin ));  
			$checkout = $_POST ['checkOut'];
		//	$checkout = str_replace ( '/', '-', $checkout );
		 	$checkout = date ('Y-m-d', strtotime ( $checkout ));
			 
			$this->session->set_userdata ( 'checkIn', $checkin );
			$this->session->set_userdata ( 'checkOut', $checkout );
			$this->session->set_userdata ( 'guestCount',$_POST['guestCount'] );
			$this->session->set_userdata ( 'destination', $_POST['inpDestination'] );
			$this->session->set_userdata ( 'propertyType',$_POST['propertyType']);
			
			$data1 = array(
				'inpDestination' => $_POST['inpDestination'],
				'checkIn' => $checkin,
				'checkOut'=> $checkout,
				'guestCount' =>$_POST['guestCount'],
				'propertyType'=>$_POST['propertyType']				
			);
			
			
	 	} else { // Page accessed via Quick Search MENU
	 	 
	 		$this->session->set_userdata ( 'checkIn', '2016-01-01' );
	 		$this->session->set_userdata ( 'checkOut', '2020-12-31' );
	 		$this->session->set_userdata ( 'guestCount','1' );
	 		$this->session->set_userdata ( 'destination', $_POST['inpDestination'] );
	 		$this->session->set_userdata ( 'propertyType','0');
	 		
	 		$data1 = array(
	 				'inpDestination' => $_POST['inpDestination'],
	 				'checkIn' => "2016-01-01",
	 				'checkOut'=> "2020-12-31",
	 				'guestCount' => "1",
	 				'propertyType'=> "0"
	 		);
	 		
	 	}
	 	
	$this->load->view ( 'search-new.php', $data1 );
	
	
	}
	public function checkRoomAvailabilty() {
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$sortFCriteria = $request->sortByFilter;
		$sortBCriteria = $request->sortByBedrooms;
		//$sortByFilter = $request->sortByFilter;
	 
	 //echo $request->inputDestination . " -- " . $this->session->userdata ( 'guestCount' );
	 
		$this->load->model ( 'PropertyModel' );
		/*$destination =  $request->inputDestination == '' ? $this->session->userdata ( 'destination' ) : $request->inputDestination;
		$guestCount = $request->selectGuestHeadCount == '' ? $this->session->userdata ( 'guestCount' ) : $request->selectGuestHeadCount;
		$propertyType = $request->selectAccomodationType == '' ? $this->session->userdata ( 'propertyType' ) : $request->selectAccomodationType;
		$checkIn = $request->checkInDate == '' ? $this->session->userdata ( 'checkIn' ) : $request->checkInDate;
		$checkOut = $request->checkOutDate == '' ? $this->session->userdata ( 'checkOut' ) : $request->checkOutDate;*/
		
		$destination =  $this->session->userdata ( 'destination' ) ;
		$guestCount =   $this->session->userdata ( 'guestCount' );
		$propertyType =  $this->session->userdata ( 'propertyType' ) ;
		$checkIn = 		$this->session->userdata ( 'checkIn' ) ;
		$checkOut = $this->session->userdata ( 'checkOut' )  ;
		/*echo $destination;
		echo $guestCount;
		echo $propertyType;
		echo $checkIn;
		echo $checkOut;*/
		$searchArray=array(
				'checkIn'=>$checkIn,
				'checkOut'=>$checkOut,
				'guestCount'=>$guestCount,
				'destination'=>$destination,
				'propertyType'=>$propertyType
		);
		
		$filterData=null;
		
	//	 $roomAvailableCount = $this->PropertyModel->getRoomAvailabilityCount ($searchArray, $filterData);
		 
		//$roomBooked = $this->PropertyModel->checkRoomBooked ($searchArray);
		
		$roomAvailableInfo = $this->PropertyModel->checkRoomAvailabilty ($searchArray,$filterData, $sortFCriteria, $sortBCriteria);
		 
		$i=0;
		$response=new stdClass();
		//$response->records =$roomAvailableCount;
		foreach($roomAvailableInfo as $row)
		{
				$row=(array)$row;
				$image_path = $row['imagePath'];
				$directory_path = './Admin/'.$image_path;
				$map = directory_map($directory_path);
				if($map)
				{
					foreach ($map as $result)
					{
						if(strpos($result ,"mainImage") !==false)
						{
							$get_result = "Admin/".$image_path.$result;
							$response->rows[$i]=array('propertyId'=>$row['propertyId'],'propertyName'=>$row['property'],'ImagePath' => $get_result,
							'starRate'=>$row['star_rate'],'propertyAddress'=>$row['propertyAddress'],
							'pool'=>$row['pool'], 'free_parking'=>$row['free_parking'], 'air_condition'=>$row['air_condition'],
							'television_access'=>$row['television_access'], 'internet_access'=>$row['internet_access'],
							'smoking_allowd'=>$row['smoking_allowd'], 'free_breakfast'=>$row['free_breakfast'], 'pet_friendly'=>$row['pet_friendly']
							, 'Featured'=>$row['Featured']
							);
							
							$i++;
						}
					}
				}
		}
			echo json_encode ( $response ); 
        }
        public function checkFilterRoomAvailabilty() {
        	$postdata = file_get_contents("php://input");
        	$filterData= json_decode($postdata);
        	//echo sizeof($post->selectedFeatureList);
        	$this->load->model ( 'PropertyModel' );
        	$searchArray=array(
        			'checkIn'=>$this->session->userdata ( 'checkIn' ),
        			'checkOut'=>$this->session->userdata ( 'checkOut' ),
        			'guestCount'=>$this->session->userdata ( 'guestCount' ),
        			'destination'=>$this->session->userdata ( 'destination' ),
        			'propertyType'=>$this->session->userdata ( 'propertyType' )
        
        
        	);
        	//echo $searchArray;
        	if(sizeof($filterData->selectedstarRateList)==0 &&  sizeof($filterData->selectedFeatureList)==0 && sizeof($filterData->selectedFacilityList)==0 
			 && ($filterData->selectedPropertyTypeList)==0 && ($filterData->selectedBathroomList)==0 ){
        		$filterData=NULL;
        	} 
        //	$roomAvailableCount = $this->PropertyModel->getRoomAvailabilityCount ($searchArray,$filterData);
        	$roomAvailableInfo = $this->PropertyModel->checkRoomAvailabilty ($searchArray, $filterData, '', '');
        	$response=new stdClass();
        	//$response->records =$roomAvailableCount;
        
        	$i=0;
        	foreach($roomAvailableInfo as $row)
        	{
        		$row=(array)$row;
				$image_path = $row['imagePath'];
				$directory_path = './Admin/'.$image_path;
				$map = directory_map($directory_path);
				if($map)
				{
					foreach ($map as $result)
					{
						if(strpos($result ,"mainImage") !==false)
						{
							$get_result = "Admin/".$image_path.$result;
							$response->rows[$i]=array('propertyId'=>$row['propertyId'],'propertyName'=>$row['property'],'ImagePath' => $get_result,
							'starRate'=>$row['star_rate'],'propertyAddress'=>$row['propertyAddress'],
							'pool'=>$row['pool'], 'free_parking'=>$row['free_parking'], 'air_condition'=>$row['air_condition'],
							'television_access'=>$row['television_access'], 'internet_access'=>$row['internet_access'],
							'smoking_allowd'=>$row['smoking_allowd'], 'free_breakfast'=>$row['free_breakfast'], 'pet_friendly'=>$row['pet_friendly']
							, 'Featured'=>$row['Featured']
							);
							$i++;
						}
					}
				}
        	}
        	echo json_encode ( $response );
        }
}