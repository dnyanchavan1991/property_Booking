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
		// echo "before";
		 
	 	 if (isset ( $_POST ['submit'] ))  
			{
	 //echo "submit";
			$checkin = $_POST ['checkIn'];
		 	 
			//$checkin = str_replace ( '/', '-', $checkin );
		 	 
			$checkin = date ('Y-m-d', strtotime ( $checkn ));
			 
			  
			 
			$checkout = $_POST ['checkOut'];
		//	$checkout = str_replace ( '/', '-', $checkout );
		 	$checkout = date ('Y-m-d', strtotime ( $checkout ));
			 
			$this->session->set_userdata ( 'checkIn', $checkin );
			$this->session->set_userdata ( 'checkOut', $checkout );
			$this->session->set_userdata ( 'guestCount',$_POST['guestCount'] );
			$this->session->set_userdata ( 'destination', $_POST['inpDestination'] );
			$this->session->set_userdata ( 'propertyType',$_POST['propertyType']);
	 	}
	$this->load->view ( 'search-new.php' );
	
	
	}
	public function checkRoomAvailabilty() {
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$sortFCriteria = $request->sortByFilter;
		$sortBCriteria = $request->sortByBedrooms;
		//$sortByFilter = $request->sortByFilter;
	 
	 
		$this->load->model ( 'PropertyModel' );
		$searchArray=array(
				'checkIn'=>$this->session->userdata ( 'checkIn' ),
				'checkOut'=>$this->session->userdata ( 'checkOut' ),
				'guestCount'=>$this->session->userdata ( 'guestCount' ),
				'destination'=>$this->session->userdata ( 'destination' ),
				'propertyType'=>$this->session->userdata ( 'propertyType' )
		);
		 
		$filterData=null;
		 $roomAvailableCount = $this->PropertyModel->getRoomAvailabilityCount ($searchArray, $filterData);
		 
		
	
		$roomAvailableInfo = $this->PropertyModel->checkRoomAvailabilty ($searchArray,$filterData, $sortFCriteria, $sortBCriteria);
		
		$i=0;
		$response=new stdClass();
		$response->records =$roomAvailableCount;
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
        	
        	if(sizeof($filterData->selectedstarRateList)==0 &&  sizeof($filterData->selectedFeatureList)==0 && sizeof($filterData->selectedFacilityList)==0 
			 && ($filterData->selectedPropertyTypeList)==0 && ($filterData->selectedBathroomList)==0 ){
        		$filterData=NULL;
        	} 
        	$roomAvailableCount = $this->PropertyModel->getRoomAvailabilityCount ($searchArray,$filterData);
        	$roomAvailableInfo = $this->PropertyModel->checkRoomAvailabilty ($searchArray, $filterData, '', '');
        	$response=new stdClass();
        	$response->records =$roomAvailableCount;
        
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
							);
							$i++;
						}
					}
				}
        	}
        	echo json_encode ( $response );
        }
}