<?php
class Index1 extends CI_Controller {

	public function index() {
		$this->load->view ( 'index.html' );
	}
	
	public  function getlastMinDeal(){
		$this->load->model ( 'PropertyModel' );
		$lastMinDealData = $this->PropertyModel->getlastMinDeal ();
		$i=0;
	    $list = array();
		foreach($lastMinDealData as $row)
		{
			
			  $list[] = array('name' =>$row->name, 'desc' => $row->des,'image'=>$row->imagepath);
		}
		echo json_encode( $list);
		
	}
}