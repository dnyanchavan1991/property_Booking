<?php
class Index1 extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('PropertyModel');
	}

	public function index() {
		$this->load->view ( 'index.html' );
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
	
	public  function galleryImgFetch(){
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
						$list[] = array('property_id' =>$row->property_id,'image'=>$get_result);
					}
				}
			}
		}
		echo json_encode( $list);
	
	}
}