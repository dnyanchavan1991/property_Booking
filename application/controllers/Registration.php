<?php
class Registration extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	public function index() {
		$this->load->view ( 'registration.html' );
		if(isset($_POST['page']))
            $this->session->set_userdata ( 'controller', $_POST['page']);
	}
	public function insertRegistrationData() {
	
		$postdata = file_get_contents("php://input");
		$post= json_decode($postdata);
        $date_of_birth = $post->date_of_birth;
        $date_of_birth = str_replace ( '/', '-', $date_of_birth );
        $date_of_birth = date ( 'Y-m-d', strtotime ( $date_of_birth ) );

		$registerInfo = array (
			//	'customer_id' => '1',
				'user_name' => $post->username,
				'password' => $post->password,
				'first_name' => $post->firstName,
				'last_name' => $post->lastName,
				'mobile_number'=>$post->mobileNumber,
				'email_address'=>$post->email,
             	'Gender'=>$post->gender,
            	'DOB'=>$date_of_birth,
				'account_active'=>'yes'
				 
		);
		$this->load->model ( 'PropertyModel' );
		$registerInfo = $this->PropertyModel->insertRegistrationData ( $registerInfo );
		$this->session->set_userdata('call_back_url',$post->call_back_url);
		session_cache_limiter ( 'private, must-revalidate' );
		//session_cache_expire ( 60 );
		
		
		if ($post->username != '' && $post->username != null )
		{ 
			$validate = $this->PropertyModel->authenticate($post->username,$post->password,'user');
			$user_id = $validate->user_id;
			$user_count = $validate->user_count;			 
		}
		
		if($user_count == 1)
		{
			$loginDetailsArray=array(
				'user_name'=>$post->username,
				'password'=>$post->password,
				'logged_in_dateTime'=>date("y-m-d h:i:s")				
			);
			
			$last_id = $this->PropertyModel->insertLoginData ($loginDetailsArray);
			$this->session->set_userdata('last_user_id', $last_id);
			$this->session->set_userdata('user_id', $user_id);
			$this->session->set_userdata('user_name', $post->username);
			$this->session->set_userdata('access_type', 'user');
            $this->session->set_userdata('gender', $post->gender);
		}
		$response=array('count'=>$user_count);
		echo json_encode($response); 
	
	}
    public function  sendEmail()
    {
        echo "hello";
        exit;


    }
}