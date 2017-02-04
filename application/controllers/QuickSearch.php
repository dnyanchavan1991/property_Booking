<?php
class QuickSearch extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('PropertyModel');
        $this->load->library('session');
        $this->load->helper('url');
    }
    public function search($name){




        $this->load->view('quick_search.php');

    }
}