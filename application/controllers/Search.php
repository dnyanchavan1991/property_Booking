<?php
class Search extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('PropertyModel');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('pagination');
    }
    public function QuickSearch($name){

        $this->load->library('pagination');
        $config['base_url']= base_url().'index.php/Search/QuickSearch/'.$name.'';
        $config['total_rows'] = count($this->PropertyModel->getQuickSearchCount($name));
        $config['per_page'] = 9;
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

        if($this->uri->segment(4)){
            $page = ($this->uri->segment(4)) ;
        }
        else{
            $page = 1;
        }
        $this->pagination->initialize($config);
        $property_type = $this->PropertyModel->getPropertyTypeList();
        $data['result'] = $this->PropertyModel->getQuickSearchData($config['per_page'], $page,$name);
        $offer_count = count($this->PropertyModel->getOffersCount());
        $this->load->view('quick_search.php',array('data' => $data['result'],'count' => $config['total_rows'],'formData' => null,'propertyTypes'=>$property_type,'offer_count'=>$offer_count));

    }

    public function featuredSearch(){
        $this->load->library('pagination');
        $config['base_url']= base_url().'index.php/Search/FeaturedSearch/';
        $config['total_rows'] = count($this->PropertyModel->getFeaturedSearchCount());
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
        $property_type = $this->PropertyModel->getPropertyTypeList();
        $data['result'] = $this->PropertyModel->getFeaturedSearchData($config['per_page'], $page);
        $offer_count = count($this->PropertyModel->getOffersCount());
        $this->load->view('quick_search.php',array('data' => $data['result'],'count' => $config['total_rows'],'formData' => null,'propertyTypes'=>$property_type,'offer_count'=>$offer_count));
    }

}