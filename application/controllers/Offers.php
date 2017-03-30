<?php

/**
 * Created by PhpStorm.
 * User: Vicky
 * Date: 26/03/2017
 * Time: 1:42 PM
 */
class Offers extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('PropertyModel');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function offerMenuLink(){
        $this->load->library('pagination');
        $config['base_url']= base_url().'index.php/Offers/offerMenuLink/';
        $config['total_rows'] = count($this->PropertyModel->getOffersCount());
        $config['per_page'] = 3;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";
        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        if($this->uri->segment(3)){
            $page = ($this->uri->segment(3)) ;
        }
        else{
            $page = 1;
        }
        $this->pagination->initialize($config);
        $offers = $this->PropertyModel->getOffers($config['per_page'], $page);
//        var_dump($offers);
        $this->load->view('offers.php',array('offers'=>$offers,'offer_count'=>$config['total_rows']));
    }

}