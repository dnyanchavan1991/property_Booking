<?php
class Index1 extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('PropertyModel');
		$this->load->library('session');
        $this->load->helper('url');
	}

	public function index() {
	    $getPropertyListingSlider = $this->PropertyModel->getPropertyListingSlider();
//        var_dump($getPropertyListingSlider);
//        exit;
	    $property_type = $this->PropertyModel->getPropertyListing();
        $property_list_type = $this->PropertyModel->getPropertyTypeList();
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
		$this->load->view ( 'index-new.php',array('propertyType'=>$property_type,'propertyListTypes'=>$property_list_type,'galleryImages'=>$gallery_img,'sliderImages' => $getPropertyListingSlider) );
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
        $property_review = $this->PropertyModel->getPropertyReview($id);
	    $this->load->view('room_details.php',array('propertyDetails'=>$propertyDetails[0],'propertyInfoDetails' => $propertyInfoDetails[0],'review' => $property_review));
    }

    public function Login(){
        $this->load->view('login.php');
    }

    public function Registration(){
        $this->load->view('registration.php');
    }
    public function LoginCheck(){
        $this->load->model('PropertyModel');
        $result = $this->PropertyModel->LoginCheck();
        if(! $result){
            $this->session->set_flashdata('login_check', 'Wrong email or password, please try again.');
            $this->Login();

        }else{
            redirect(base_url());
           //$this->index();
        }

    }
    public function Logout(){
        $this->session->sess_destroy();
        redirect(base_url());
        //redirect(base_url().'/index.php/Index1/index');
    }
    public function registrationAction(){
        $this->load->model('PropertyModel');
        $result = $this->PropertyModel->registrationAction();
        if(!$result){
            $this->session->set_flashdata('registration_check', 'There was a problem registering, please try again later!');
            $this->Registration();
        }else{
            $this->index();
        }
    }

}