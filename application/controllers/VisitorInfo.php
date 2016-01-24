<?php
class VisitorInfo extends CI_Controller {
	public function index() {
		$this->load->view ( 'about.html' );
	}
	public function insertVisitorData() {
		
			
			$visitorInfo = array (
					'visitor_ip' => $_POST ['ip'],
					'city' => $_POST ['city'],
					'region' => $_POST ['region'],
					'country' => $_POST ['country'] ,
					'date_visited'=>date('Y-m-d'),
					'location'=>$_POST ['loc'],
					'Service_Provider'=>$_POST ['org']
					//'Postal'=>$_POST ['postal']
					
			);
			$this->load->model ( 'PropertyModel' );
			$visitorInfo = $this->PropertyModel->insertVisitorData ( $visitorInfo );
		
	}
	
	public function getVisitorCount(){
		$this->load->model ( 'PropertyModel' );
		$visitorCount = $this->PropertyModel->getVisitorCount ();
		$response=array('count'=>$visitorCount);
		echo json_encode($response);
	}
}