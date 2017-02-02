<?php
class Index1 extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('PropertyModel');
		$this->load->library('session');
	}

	public function index() {
	    $property_type = $this->PropertyModel->getPropertyListing();
        $gallery_img_data = $this->PropertyModel->galleryImgFetch();
        $gallery_img = array();
        foreach($gallery_img_data as $row)
        {
            $image_path = $row->image_path;
            $directory_path = './Admin/'.$image_path;
            /*--get all images in directory--*/
            $map = directory_map($directory_path);
            if($map)
            {
                foreach ($map as $result)
                {
                    if(strpos($result ,"mainImage") !==false)
                    {
                        $get_result = "Admin/".$image_path.$result;
                        $gallery_img[] = array('property_id' =>$row->property_id,'property_name' =>$row->property_name,'property_description' =>$row->description,'image'=>$get_result);
                    }
                }
            }
        }

		$this->load->view ( 'index-new.php',array('propertyTypes'=>$property_type,'galleryImages'=>$gallery_img) );
		//$this->load->view ( 'ex2.html' );
	}
	
	public  function getlastMinDeal(){
		$lastMinDealData = $this->PropertyModel->getlastMinDeal ();
		$i=0;
	    $list = array();
		foreach($lastMinDealData as $row)
		{
			
			  $list[] = array('name' =>$row->name, 'desc' => $row->des,'image'=>$row->imagepath);
		}
		echo json_encode( $list);
	}
	public function destinationFetch(){ 
		$postdata = file_get_contents("php://input");
		$post= json_decode($postdata);
		$dest=$post->inputDestination;
		
		$getDestinationData = $this->PropertyModel->destinationFetch($dest);
		
		 
		$response=array('filterDestinations'=>$getDestinationData);
		echo json_encode($response); 
		
	}

	public function RedirectToAdmin() {
		if ($this->session->userdata('user_id') && $this->session->userdata('access_type') == 'admin') { 
			header("location: ../Admin");
		} else {
			echo "<script>alert('You are not logged in');</script>";
			echo "<meta http-equiv='refresh' content='0;url=../'>";
		}
	}
	public function PropertyDetails($id){
	    $propertyDetails = $this->PropertyModel->getPropertyDetail($id);
        $propertyInfoDetails = $this->PropertyModel->getPropertyInfoDetail($id);
	    $this->load->view('room_details.php',array('propertyDetails'=>$propertyDetails[0],'propertyInfoDetails' => $propertyInfoDetails[0]));
    }
    public function QuickSearch(){

        $this->load->view('quick_search.php');

    }
}