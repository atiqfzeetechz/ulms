<?php defined("BASEPATH") OR exit("No direct script access allowed");

class People extends CI_Controller {

  function __construct() {
	
	
    parent::__construct();
    	$this->load->model('Mdlpeople');
   
	 }
	 
	 
function staff(){
		    
		    $title['page_title'] ='Staff';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'people/get_our_pride/';
		    $this->load->view('include/header',$title);
		    $page_data['param'] = 'Staff';
		    $this->load->view('our_pride',$page_data);                
            $this->load->view('include/footer',$footer);
	 }
function add_our_pride($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('post','Post Name', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
    
    
    	
	        $save['name']			        = $this->input->post('name');
	        $save['type']			        = $this->input->post('type');
			$save['post']			        = $this->input->post('post');
			$save['mobile']				    = $this->input->post('mobile');
			$save['address']				= $this->input->post('address');
			$save['status']				    = 1;
			$save['about']			        = $this->input->post('about');
			
		   	       
		//IMAGE START
		   if (isset($_FILES["photo"]) && !empty($_FILES["photo"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/our_pride/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('photo'))  
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
                     $config['quality'] = '70%';  
                     $config['width'] = 500;  
                     $config['height'] = 400;  
                     $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $this->load->library('image_lib', $config);  
                     $this->image_lib->resize();  
                     
					 $save['photo'] =  $Image_data["file_name"]; 
				 
                }  
		 
		 //END UPLOADING IMAGE 
		 
					
					
	 
      } 
	 
		  $response = $this->Mdlmaster->save_DB('ourpride',$save);
           
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
$VendorId = $this->input->post('VendorId');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('post','Post Name', 'required');


if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		 
		
		
	        $save['name']			        = $this->input->post('name');
			$save['post']			        = $this->input->post('post');
			$save['mobile']				    = $this->input->post('mobile');
			$save['address']				= $this->input->post('address');
			$save['about']			        = $this->input->post('about');
			
		   	       
		//IMAGE START
		   if (isset($_FILES["photo"]) && !empty($_FILES["photo"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/our_pride/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('photo'))  
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
                     $config['quality'] = '70%';  
                     $config['width'] = 500;  
                     $config['height'] = 400;  
                     $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $this->load->library('image_lib', $config);  
                     $this->image_lib->resize();  
                     
					 $save['photo'] =  $Image_data["file_name"]; 
				 
                }  
		 
		 //END UPLOADING IMAGE 
		 
					
					
	 
      } 
	 
	
           $id = $this->input->post('id');	
	       $this->db->where('id',$id);
		   $response = $this->db->update('ourpride',$save);
           
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
function get_our_pride($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->db->get_where('ourpride')->num_rows();
    // Get records
    $users_record = $this->Mdlpeople->get_our_pride($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'people/staff/';
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
function delete_our_pride($id=''){
	   is_login();
	   $this->db->where('id',$id);
	   $del = $this->db->delete('ourpride');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }
   
   
   
   	 
function post_name(){
		    
		    $title['page_title'] = 'POST NAME';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'people/get_posts/';
		    $this->load->view('include/header',$title);
		    $this->load->view('post_name');                
            $this->load->view('include/footer',$footer);
	 }
function add_posts($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
    
    
    	
	        $save['name']			        = $this->input->post('name');
	       	
		   	       
	
		  $response = $this->Mdlmaster->save_DB('posts',$save);
           
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
$id = $this->input->post('id');
$this->form_validation->set_rules('name','Name', 'required');


if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		 
		
		
	        $save['name']			        = $this->input->post('name');
			
	     $id = $this->input->post('id');	
	       $this->db->where('id',$id);
		   $response = $this->db->update('posts',$save);
           
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
function get_posts($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->db->get_where('posts')->num_rows();
    // Get records
    $users_record = $this->Mdlpeople->get_posts($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'people/post_name';
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
function delete_posts($id=''){
	   is_login();
	   $this->db->where('id',$id);
	   $del = $this->db->delete('posts');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }
   
   
function edit_form($page='',$table='',$key='',$value='')
  {
	  is_login();
	  $page_data['keyId'] = $value;
	  $page_data['row'] = $this->db->get_where($table,array($key=>$value))->result();
	  $this->load->view($page,$page_data);
  }
  
  
}