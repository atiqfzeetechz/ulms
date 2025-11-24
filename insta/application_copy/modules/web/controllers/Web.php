<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Web extends CI_Controller {

  function __construct() {
	
	
    parent::__construct();
    	$this->load->model('Mdlweb');
   
	 }
	 
//////////////////#########BLOOD DONER##############///////////////////////	 
function index(){
		
		    $title['page_title'] = 'HOME';
		    $this->load->view('front/header',$title);
		    $page_data['sliders'] = $this->db->get('slider');
		    $page_data['itihaas'] = $this->db->get_where('singlepage',array('type'=>'history'));
		    $page_data['intention'] = $this->db->get_where('singlepage',array('type'=>'intention'));
		    
		    $this->db->limit('6');
		    $page_data['images'] = $this->db->get_where('imagegellery')->result();
		    $this->db->limit('4');
		    $page_data['news'] = $this->db->get_where('news');
		    $this->load->view('index',$page_data);                
            $this->load->view('front/footer');
	 }
	 
function principal_message(){
		
		    $title['page_title'] = 'Principals Message';
		    $this->load->view('front/header',$title);
		    $page_data['intention'] = $this->db->get_where('singlepage',array('type'=>'intention'));
		    $this->load->view('mission',$page_data);                
            $this->load->view('front/footer');
	 }	 
	 
function contact(){
		
		    $title['page_title'] = 'Contact Us';
		    $this->load->view('front/header',$title);
		    $this->load->view('contact');                
            $this->load->view('front/footer');
	 }
	 
	 
	 function about(){
		
		    $title['page_title'] = 'About Us';
		    $this->load->view('front/header',$title);
		      $page_data['intention'] = $this->db->get_where('singlepage',array('type'=>'history'));
		  
		    $this->load->view('about',$page_data);                
            $this->load->view('front/footer');
	 }
	 
	 
function contact_us(){
		$data['name']= $this->input->post('name');
		$data['mobile']= $this->input->post('mobile');
		$data['address']= $this->input->post('address');
		$data['message']= $this->input->post('message');
		$this->db->insert('contact_us',$data);
		echo"1";
	 }	 
function staff($param=''){
		
		    $title['page_title'] = 'Staff';
		    $this->load->view('front/header',$title);
		    $page_data['query'] = $this->db->get('ourpride')->result();
		    $this->load->view('people',$page_data);                
            $this->load->view('front/footer');
	 }	
function image_gellery($param=''){
		
		
		    $title['page_title'] = 'फोटो गेलेरी';
		    $this->load->view('front/header',$title);
		    $page_data['imagecategory'] = $this->db->get('imagecategory')->result();
		    if(!empty($param)){
		    $page_data['query'] = $this->db->get_where('imagegellery',array('category'=>$param))->result();
		    }
		    else{
		    $page_data['query'] = $this->db->get('imagegellery')->result();    
		    }
		    $this->load->view('image_gellery',$page_data);                
            $this->load->view('front/footer');
	 }	
function news($param=''){
	     	$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'web/getNews/';
		   
		     $title['page_title'] = 'समाचार ';
		     $this->load->view('front/header',$title);
		    $this->load->view('news');                
            $this->load->view('front/footer',$footer);
	 }
function single_news($param=''){
	       $id=$this->uri->segment(3);
		     $title['page_title'] = 'समाचार ';
		     $this->load->view('front/header',$title);
		     $data['query']=$this->Mdlweb->mdlmore_news($id);
		    $this->load->view('single_news',$data);  
            $this->load->view('front/footer');
	 }
function getNews($rowno=0){  
  
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('news');
    // Get records
    $users_record = $this->Mdlweb->getNews($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'web/news/';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
 
 
 
 ///mysql_affected_rows
    $config['full_tag_open'] = '<div class="paginations"><ul class="pagination">';
    $config['full_tag_close'] = '</ul></div>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '«';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '»';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] =  '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config["num_links"] = 1;
	 
	 
	            $config['next_link'] = 'Next Page';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';

                $config['prev_link'] = 'Previous Page';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
 //end mysql_affected_rows
    // Initialize
    $this->pagination->initialize($config);
    $pageNo = $this->uri->segment(3);
    // Initialize $data Array
    $data['pagination_link'] = $this->pagination->create_links();
    $data['country_table'] = $users_record;
    $data['page_number'] = $pageNo;

    echo json_encode($data);
	
   }	
function facilities($param=''){
	     	$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'web/getFacilities/';
		   
		     $title['page_title'] = 'Facilities';
		     $this->load->view('front/header',$title);
		    $this->load->view('facilities');                
            $this->load->view('front/footer',$footer);
	 }
function getFacilities($rowno=0){  
  
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('activity');
    // Get records
    $users_record = $this->Mdlweb->getfacilities($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'web/facilities/';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
 
 
 
 ///mysql_affected_rows
    $config['full_tag_open'] = '<div class="paginations"><ul class="pagination">';
    $config['full_tag_close'] = '</ul></div>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '«';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '»';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] =  '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config["num_links"] = 1;
	 
	 
	            $config['next_link'] = 'Next Page';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';

                $config['prev_link'] = 'Previous Page';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
 //end mysql_affected_rows
    // Initialize
    $this->pagination->initialize($config);
    $pageNo = $this->uri->segment(3);
    // Initialize $data Array
    $data['pagination_link'] = $this->pagination->create_links();
    $data['country_table'] = $users_record;
    $data['page_number'] = $pageNo;

    echo json_encode($data);
	
   }	 
function single_facility($param=''){
	       $id=$this->uri->segment(3);
		     $title['page_title'] = 'समाचार ';
		     $this->load->view('front/header',$title);
		     $data['query']=$this->Mdlweb->mdlmore_activity($id);
		    $this->load->view('single_activity',$data);  
            $this->load->view('front/footer');
	 }
	 
function add_blood_doner($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('groupId','Blood Group', 'required');
if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
    
    
    	
	        $save['groupId']			        = $this->input->post('groupId');
			$save['name']			            = $this->input->post('name');
			$save['mobile']			            = $this->input->post('mobile');
		
		  $response = $this->Mdlmaster->save_DB('blood_doner',$save);
           
           if($response)
           {
			echo"1";
           }
           else
           {
            echo 'Error try again!';
           }
			}
		
		
     }
    
		    if($param1=='edit'){
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('groupId','Blood Group', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		    $save['groupId']			        = $this->input->post('groupId');
			$save['name']			            = $this->input->post('name');
			$save['mobile']			            = $this->input->post('mobile');
		
		
    		$id = $this->input->post('id');	
	       $this->db->where('id',$id);
		   $response = $this->db->update('blood_doner',$save);
           
           if($response)
           {
			echo"1";
           }
           else
           {
            echo 'Error try again!';
           }
			}
		
		
     }
 
   }
	 
function get_blood_doner($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('blood_doner');
    // Get records
    $users_record = $this->Mdldailyupdate->get_blood_doner($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/blood_doner/';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
 
 
 
 ///mysql_affected_rows
    $config['full_tag_open'] = '<div class="paginations"><ul class="pagination">';
    $config['full_tag_close'] = '</ul></div>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '«';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '»';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] =  '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config["num_links"] = 1;
	 
	 
	            $config['next_link'] = 'Next Page';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';

                $config['prev_link'] = 'Previous Page';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
 //end mysql_affected_rows
    // Initialize
    $this->pagination->initialize($config);
    $pageNo = $this->uri->segment(3);
    // Initialize $data Array
    $data['pagination_link'] = $this->pagination->create_links();
    $data['country_table'] = $users_record;
    $data['page_number'] = $pageNo;

    echo json_encode($data);
	
   }
function delete_blood_doner($id=''){
	   is_login();
	   $this->db->where('id',$id);
	   $del = $this->db->delete('blood_doner');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }
   
   
} 

?>