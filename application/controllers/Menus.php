<?php
class Menus extends CI_Controller {

	public function index() {
		$this->load->view ( 'menus.html' );
	}
}