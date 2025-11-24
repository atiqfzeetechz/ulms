<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Dashboard extends CI_Controller {

  function __construct() {
	
    parent::__construct();
	 }

  /**
     * This function is used to load page view
     * @return Void
     */
  public function index($param1='',$param2=''){  
  is_login();
  $user_type          = isset($this->session->userdata('user_details')[0]->user_type) ? $this->session->userdata('user_details')[0]->user_type : 'admin';
  $user_id            = isset($this->session->userdata('user_details')[0]->users_id) ? $this->session->userdata('user_details')[0]->users_id : 1;
 
  if($user_type=='admin')
  {
           	$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'dailyupdate/getEnquiry/';
		  
	        $title['page_title'] = 'Dashboard';
			$this->load->view('include/header',$title);
            $this->load->view('dashboard');                
            $this->load->view('include/footer',$footer);            
        
  }
  
    if($user_type=='subadmin')
  {
	        $title['page_title'] = 'Dashboard';
			$this->load->view('include/header',$title);
            $this->load->view('dashboard');                
            $this->load->view('include/footer');            
        
  }
  
  
  
  }
	
}
?>