<?php
class Index1 extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('PropertyModel');
		$this->load->library('session');
	}

	public function index() {
		$this->load->view ( 'index-new.php' );
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
	
	
	public function galleryImgFetch(){
		$getImgData = $this->PropertyModel->galleryImgFetch();
		
		$i=0;
		$list = array();
		foreach($getImgData as $row)
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
						$list[] = array('property_id' =>$row->property_id,'property_name' =>$row->property_name,'property_description' =>$row->description,'image'=>$get_result);
					}
				}
			}
		}
		echo json_encode( $list);
	}
	public function RedirectToAdmin() {
		if ($this->session->userdata('user_id') && $this->session->userdata('access_type') == 'admin') { 
			header("location: ../Admin");
		} else {
			echo "<script>alert('You are not logged in');</script>";
			echo "<meta http-equiv='refresh' content='0;url=../'>";
		}
	}
}