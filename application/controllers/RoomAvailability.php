<?php
class RoomAvailability extends CI_Controller {
    public function __construct() {
        parent::__construct ();
        session_cache_limiter ( 'private, must-revalidate' );
        session_cache_expire ( 60 );
        $this->load->library ( 'session' );
        //$this->load->model ( 'PropertyModel' );
    }
    public function index() {

        if (isset ( $_POST ['submit'] ) )
        {

            echo $checkin = $_POST ['checkIn'];
            exit;
            $checkin = date ('Y-m-d', strtotime ( $checkin ));
            $checkout = $_POST ['checkOut'];
            //	$checkout = str_replace ( '/', '-', $checkout );
            $checkout = date ('Y-m-d', strtotime ( $checkout ));

            $this->session->set_userdata ( 'checkIn', $checkin );
            $this->session->set_userdata ( 'checkOut', $checkout );
            $this->session->set_userdata ( 'guestCount',$_POST['guestCount'] );
            $this->session->set_userdata ( 'destination', $_POST['inpDestination'] );
            $this->session->set_userdata ( 'propertyType',$_POST['propertyType']);
            $this->session->set_userdata ( 'featured', '');

            $data1 = array(
                'inpDestination' => $_POST['inpDestination'],
                'checkIn' => $checkin,
                'checkOut'=> $checkout,
                'guestCount' =>$_POST['guestCount'],
                'propertyType'=>$_POST['propertyType'],
                'featured' => ""
            );


        } else { // Page accessed via Quick Search MENU

            if ($_POST['inpDestination'] == "Featured"){


                $this->session->set_userdata ( 'checkIn', '' );
                $this->session->set_userdata ( 'checkOut', '' );
                $this->session->set_userdata ( 'guestCount','1' );
                $this->session->set_userdata ( 'destination', '' );
                $this->session->set_userdata ( 'propertyType','0');
                $this->session->set_userdata ( 'featured', $_POST['inpDestination']);

                $data1 = array(
                    'inpDestination' => '',
                    'checkIn' => "",
                    'checkOut'=> "",
                    'guestCount' => "1",
                    'propertyType'=> "0",
                    'featured' => $_POST['inpDestination']
                );
            } else {

                $this->session->set_userdata ( 'checkIn', '2016-01-01' );
                $this->session->set_userdata ( 'checkOut', '2020-12-31' );
                $this->session->set_userdata ( 'guestCount','1' );
                $this->session->set_userdata ( 'destination', $_POST['inpDestination'] );
                $this->session->set_userdata ( 'propertyType','0');
                $this->session->set_userdata ( 'featured', '');
                $this->session->set_userdata ( 'featured', '');

                $data1 = array(
                    'inpDestination' => $_POST['inpDestination'],
                    'checkIn' => "2016-01-01",
                    'checkOut'=> "2020-12-31",
                    'guestCount' => "1",
                    'propertyType'=> "0",
                    'featured' => ""
                );
            }



        }

        $this->load->view ( 'search-new.php', $data1 );


    }
    public function checkRoomAvailabilty() {
//        $postdata = file_get_contents("php://input");
//        $request = json_decode($postdata);
        $sortBCriteria = null;
        $sortFCriteria = null;
        //$sortByFilter = $request->sortByFilter;

        //echo $request->inputDestination . " -- " . $this->session->userdata ( 'guestCount' );

        $this->load->model ( 'PropertyModel' );
        /*$destination =  $request->inputDestination == '' ? $this->session->userdata ( 'destination' ) : $request->inputDestination;
        $guestCount = $request->selectGuestHeadCount == '' ? $this->session->userdata ( 'guestCount' ) : $request->selectGuestHeadCount;
        $propertyType = $request->selectAccomodationType == '' ? $this->session->userdata ( 'propertyType' ) : $request->selectAccomodationType;
        $checkIn = $request->checkInDate == '' ? $this->session->userdata ( 'checkIn' ) : $request->checkInDate;
        $checkOut = $request->checkOutDate == '' ? $this->session->userdata ( 'checkOut' ) : $request->checkOutDate;*/

		//var_dump($_POST);
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if(isset($_POST['changeFilter'])){
                $sortFCriteria = $_POST['changeFilter'] != "" ? $_POST['changeFilter'] : null;
            }
            if(isset($_POST['changeFilter'])){
                $sortBCriteria = $_POST['bedrooms-filter'] != "" ? $_POST['bedrooms-filter'] : null;
            }
            $this->session->set_userdata ( 'checkIn',$_POST['checkIn']);
            $this->session->set_userdata ( 'checkOut',$_POST['checkOut']);
            if($_POST['room']){
                $this->session->set_userdata ( 'guestCount',$_POST['room'] );
            }
            $this->session->set_userdata ( 'location',$_POST['location']);
            $this->session->set_userdata ( 'propertyType','0');
            $this->session->set_userdata ( 'featured', '');
            $this->session->set_userdata ( 'sortFCriteria',$sortFCriteria);
            $this->session->set_userdata ( 'sortBCriteria',$sortBCriteria);

        }
        $destination =  $this->session->userdata('location');
        $guestCount =   1;
        $propertyType = 0;
        $checkIn = 		$this->session->userdata('checkIn');
        $checkOut = $this->session->userdata('checkOut');
        $featured = $this->session->userdata('featured');
        $searchArray=array(
            'checkIn'=>$checkIn,
            'checkOut'=>$checkOut,
            'guestCount'=>$guestCount,
            'destination'=>$destination,
            'propertyType'=>$propertyType,
            'featured'=>$featured,
        );

        $filterData=null;
        $this->load->library('pagination');
        $config['base_url']= base_url().'index.php/RoomAvailability/checkRoomAvailabilty/';
        $config['total_rows'] = count($this->PropertyModel->checkRoomAvailabiltyCount($searchArray,$filterData,$this->session->userdata('sortFCriteria'),$this->session->userdata('sortBCriteria')));
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

        if($this->uri->segment(3)){
            $page = ($this->uri->segment(3)) ;
        }
        else{
            $page = 1;
        }
        $this->pagination->initialize($config);
        $property_type = $this->PropertyModel->getPropertyTypeList();
        $roomAvailableInfo = $this->PropertyModel->checkRoomAvailabilty ($searchArray,$filterData,$this->session->userdata('sortFCriteria'),$this->session->userdata('sortBCriteria'),$config['per_page'], $page);
        $offer_count = count($this->PropertyModel->getOffersCount());
        $this->load->view('quick_search.php',array('data' => $roomAvailableInfo,'count' => $config['total_rows'],'formData'=>$searchArray,'propertyTypes'=>$property_type,'offer_count'=>$offer_count));

    }

    public function checkFilterRoomAvailabilty() {
		//var_dump($_POST);
        $this->load->model ( 'PropertyModel' );
        $searchArray=array(
            'checkIn'=>$this->session->userdata ( 'checkIn' ),
            'checkOut'=>$this->session->userdata ( 'checkOut' ),
            'guestCount'=>$this->session->userdata ( 'guestCount' ),
            'destination'=>$this->session->userdata ( 'destination' ),
            'propertyType'=>$this->session->userdata ( 'propertyType' ),
            'featured' => $this->session->userdata ( 'featured' )
        );
        $filterData =array (
          'selectedstarRateList' => (isset($_POST['rating']) ? $_POST['rating'] :'0' ),
          'selectedFeatureList' => (isset($_POST['featured']) ? $_POST['featured'] :'0' ),
          'selectedFacilityList' => (isset($_POST['facility']) ? $_POST['facility'] :'0' ),
         // 'selectedPropertyTypeList' =>'0' ,
          'selectedBathroomList' => (isset($_POST['bathrooms']) ? $_POST['bathrooms'] :'0' ),

        );
        $this->session->set_userdata ( 'filterData',$filterData);
        //echo $searchArray;
        if($filterData['selectedstarRateList'] == 0 && $filterData['selectedFeatureList'] == 0 && $filterData['selectedFacilityList'] == 0 && $filterData['selectedBathroomList'] == 0  ){
            $filterData=NULL;
        }
        $roomAvailableInfo = $this->PropertyModel->checkRoomAvailabilty ($searchArray, $this->session->userdata('filterData'), '', '');

        //$count = count($this->PropertyModel->checkRoomAvailabiltyCount($searchArray,$this->session->userdata('filterData'),'',''));
        $count = count($roomAvailableInfo);
		$offer_count = count($this->PropertyModel->getOffersCount());
        $this->load->view('load_filters.php',array('data' => $roomAvailableInfo,'count' => $count,'formData'=>$searchArray,'filterData'=>$this->session->userdata('filterData'),'offer_count'=>$offer_count));
    }
}