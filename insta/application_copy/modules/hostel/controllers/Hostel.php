<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Hostel extends CI_Controller {

  function __construct() {
	
	
    parent::__construct();
    	$this->load->model('Mdlhostel');
   
	 }
	 
	 
function new_registration(){
		
		    $title['page_title'] = 'New Registartion';
			$this->load->view('include/header',$title);
		    $this->load->view('new_registartion');                
            $this->load->view('include/footer');
	 }
function all_registration(){
	        $title['page_title'] = 'All Registartion';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'hostel/get_hostler/';
		    $this->load->view('include/header',$title);
		    $this->load->view('all_registration');                
            $this->load->view('include/footer',$footer);
}
function get_hostler($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
      $allcount = $this->Mdlmaster->count_all('hostler');
    // Get records
    $users_record = $this->Mdlhostel->get_hostler($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'hostel/all_registration';
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
function add_hostler($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('Name','Name','required');
$this->form_validation->set_rules('Mobile','Mobile Number', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
    
    
    	
	        $save['Name']			            = $this->input->post('Name');
			$save['Mobile']			            = $this->input->post('Mobile');
			$save['Dob']				= $this->input->post('Dob');
			$save['AltMobile']				= $this->input->post('AltMobile');
			if(isset($_POST['Status'])){
			 	$save['Status'] = 0;   
			}
			else
			{
			$save['Status']				= 1;
			}
			$save['Address']			        = $this->input->post('Address');
			$save['RegistartionDate']			            = $this->input->post('RegistartionDate');
			
		//IMAGE START
		   if (isset($_FILES["Photo"]) && !empty($_FILES["Photo"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/hostler/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Photo'))  
                {  
                     echo $this->upload->display_errors();  
					 exit();
                }  
                else  
                {  
                     $Image_data = $this->upload->data();  
                     $config['image_library'] = 'gd2';  
                     $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $config['create_thumb'] = FALSE;  
                     $config['maintain_ratio'] = FALSE; 
                     $config['quality'] = '60%';  
                     $config['width'] = 200;  
                     $config['height'] = 200;  
                     $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $this->load->library('image_lib', $config);  
                     $this->image_lib->resize();  
                     
					 $save['Photo'] =  $Image_data["file_name"]; 
				 
                }  
	 
      } 
	 
	        if (isset($_FILES["IdCard"]) && !empty($_FILES["IdCard"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/hostler/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('IdCard'))  
                {  
                     echo $this->upload->display_errors();  
					 exit();
                }  
                else  
                {  
                     $Image_data = $this->upload->data();  
                     $config['image_library'] = 'gd2';  
                     $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $config['create_thumb'] = FALSE;  
                     $config['maintain_ratio'] = FALSE; 
                     $config['quality'] = '60%';  
                     $config['width'] = 400;  
                     $config['height'] = 400;  
                     $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $this->load->library('image_lib', $config);  
                     $this->image_lib->resize();  
                     
					 $save['IdCard'] =  $Image_data["file_name"]; 
				 
                }  
	 
      } 
	 
	 
		  $response = $this->Mdlmaster->save_DB('hostler',$save);
           
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
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('Name','Name','required');
$this->form_validation->set_rules('Mobile','Mobile Number', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   
            


	        $save['Name']			            = $this->input->post('Name');
			$save['Mobile']			            = $this->input->post('Mobile');
			$save['Dob']				= $this->input->post('Dob');
			$save['AltMobile']				= $this->input->post('AltMobile');
			$save['Status']				=  $this->input->post('Status');;
			$save['Address']			        = $this->input->post('Address');
			$save['RegistartionDate']			            = $this->input->post('RegistartionDate');
			
		//IMAGE START
		   if (isset($_FILES["Photo"]) && !empty($_FILES["Photo"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/hostler/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Photo'))  
                {  
                     echo $this->upload->display_errors();  
					 exit();
                }  
                else  
                {  
                     $Image_data = $this->upload->data();  
                     $config['image_library'] = 'gd2';  
                     $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $config['create_thumb'] = FALSE;  
                     $config['maintain_ratio'] = FALSE; 
                     $config['quality'] = '60%';  
                     $config['width'] = 200;  
                     $config['height'] = 200;  
                     $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $this->load->library('image_lib', $config);  
                     $this->image_lib->resize();  
                     
					 $save['Photo'] =  $Image_data["file_name"]; 
				 
                }  
	 
      } 
	 
	        if (isset($_FILES["IdCard"]) && !empty($_FILES["IdCard"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/hostler/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('IdCard'))  
                {  
                     echo $this->upload->display_errors();  
					 exit();
                }  
                else  
                {  
                     $Image_data = $this->upload->data();  
                     $config['image_library'] = 'gd2';  
                     $config['source_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $config['create_thumb'] = FALSE;  
                     $config['maintain_ratio'] = FALSE; 
                     $config['quality'] = '60%';  
                     $config['width'] = 400;  
                     $config['height'] = 400;  
                     $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $this->load->library('image_lib', $config);  
                     $this->image_lib->resize();  
                     
					 $save['IdCard'] =  $Image_data["file_name"]; 
				 
                }  
	 
      } 
	 
	   $Id = $this->input->post('Id');
	 
			$this->db->where('Id',$Id);
		   $response = $this->db->update('hostler',$save);
           
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
function delete_hostelr($id=''){
	   is_login();
	   $this->db->where('Id',$id);
	   $del = $this->db->delete('hostler');
	   if($del)
	   {
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }
function hostler_profile($vendorId=''){
		 is_login();
		    $title['page_title'] = 'Vendor Profile';
			$page_data['rows'] = $this->db->get_where('users',array('users_id'=>$vendorId))->result();
			$this->load->view('include/header',$title);
            $this->load->view('vendor_profile',$page_data);                
            $this->load->view('include/footer',$footer);
	 }
function edit_form($page='',$table='',$key='',$value=''){
	  is_login();
	  $page_data['keyId'] = $value;
	  $page_data['row'] = $this->db->get_where($table,array($key=>$value))->result();
	  $this->load->view($page,$page_data);
  }
  
  
}