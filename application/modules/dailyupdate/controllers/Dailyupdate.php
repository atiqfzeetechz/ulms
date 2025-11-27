<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Dailyupdate extends CI_Controller {

  function __construct() {
	
	
    parent::__construct();
    	$this->load->model('Mdldailyupdate');
   
    
	 }
	 
//////////////////#########BLOOD DONER##############///////////////////////	 
function message_history(){
		
		    $title['page_title'] = 'Message History';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'dailyupdate/get_message_history/';
			$page_data['bloodgroups'] = $this->db->get('bloodgroup')->result();
		    $this->load->view('include/header',$title);
		    $this->load->view('blood_doner',$page_data);                
            $this->load->view('include/footer',$footer);
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
function get_message_history($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 	$filter = [
        'number'      => $this->input->post('filterOne'), 
        'status'    => $this->input->post('filterTwo'),
        'message'    => $this->input->post('filterThree')
    ];
    // All records count
     $allcount = $this->Mdlmaster->count_all('message_history');
    // Get records
    $users_record = $this->Mdldailyupdate->get_message_history($rowperpage,$rowno,$filter);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/message_history/';
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

////////////#######CVONTACT LIST######/////////////////// 
 
 function other_contact(){
		
		    $title['page_title'] = 'Contact List';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'dailyupdate/get_other_contact/';
			$page_data['bloodgroups'] = $this->db->get('bloodgroup')->result();
		    $this->load->view('include/header',$title);
		    $this->load->view('other_contact',$page_data);                
            $this->load->view('include/footer',$footer);
	 }
function add_other_contact($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required');
$this->form_validation->set_rules('mobile1','Mobile Number', 'required');
if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
    
    
    	
	        $save['mobile1']			            = $this->input->post('mobile1');
			$save['name']			                = $this->input->post('name');
			$save['mobile2']			            = $this->input->post('mobile2');
		    $save['address']			            = $this->input->post('address');
		   //IMAGE START
		   if (isset($_FILES["profileimage"]) && !empty($_FILES["profileimage"]["name"]))
		   {
              $upload_base_dir = 'uploads/contact/';
              if(!file_exists($upload_base_dir)) {
              mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('profileimage'))  
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
					 $save['profileimage'] =  $Image_data["file_name"]; 
                }  
		   }
		   
		
		  $response = $this->Mdlmaster->save_DB('contactlist',$save);
           
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
$this->form_validation->set_rules('mobile1','Mobile Number', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		    $save['mobile1']			            = $this->input->post('mobile1');
			$save['name']			                = $this->input->post('name');
			$save['mobile2']			            = $this->input->post('mobile2');
		    $save['address']			            = $this->input->post('address');
		    //IMAGE START
		   if (isset($_FILES["profileimage"]) && !empty($_FILES["profileimage"]["name"]))
		   {
              $upload_base_dir = 'uploads/contact/';
              if(!file_exists($upload_base_dir)) {
              mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('profileimage'))  
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
					 $save['profileimage'] =  $Image_data["file_name"]; 
                }  
		   }
		   
    		$id = $this->input->post('id');	
	       $this->db->where('id',$id);
		   $response = $this->db->update('contactlist',$save);
           
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
function get_other_contact($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('contactlist');
    // Get records
    $users_record = $this->Mdldailyupdate->get_other_contact($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/other_contact/';
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
function delete_other_contact($id=''){
	   is_login();
	   $this->db->where('id',$id);
	   $del = $this->db->delete('contactlist');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }


////////////////########GOV PLAN#######################//////////////////////	
function govplan(){
		
		    $title['page_title'] = 'Government Plan';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'dailyupdate/get_govplan/';
		    $this->load->view('include/header',$title);
		    $this->load->view('govplan',$footer);                
            $this->load->view('include/footer');
	 }
function add_govplan($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('Title','Title', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
    
    
    	
	        $save['Title']			        = $this->input->post('Title');
			$save['Text']			        = $this->input->post('Text');
			$save['Status']			        = 1;
		//IMAGE START
		   if (isset($_FILES["Image"]) && !empty($_FILES["Image"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/rule/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image'))  
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
                     
					 $save['Image'] =  $Image_data["file_name"]; 
				 
                }  
		 
		 //END UPLOADING IMAGE 
		 
					
					
	 
      } 
	 
		  $response = $this->Mdlmaster->save_DB('rule',$save);
           
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
$this->form_validation->set_rules('Title','Title', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		 
		
		  $save['Title']			        = $this->input->post('Title');
			$save['Text']			        = $this->input->post('Text');
			$save['Status']			        = 1;
		//IMAGE START
		   if (isset($_FILES["Image"]) && !empty($_FILES["Image"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/activity/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image'))  
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
                     
					 $save['Image'] =  $Image_data["file_name"]; 
				 
                }  
		 
		 //END UPLOADING IMAGE 
		 
					
					
	 
      } 
	 
		 
	
           $RuleId = $this->input->post('RuleId');	
	       $this->db->where('RuleId',$RuleId);
		   $response = $this->db->update('rule',$save);
           
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
function get_govplan($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('rule');
    // Get records
    $users_record = $this->Mdldailyupdate->get_rule($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/rule';
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
function delete_govplan($id=''){
	   is_login();
	   $this->db->where('RuleId',$id);
	   $del = $this->db->delete('rule');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }

 
 
//////////#######RULE########/////////////////	
function rule(){
		
		    $title['page_title'] = 'Rule';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'dailyupdate/get_rule/';
		    $this->load->view('include/header',$title);
		    $this->load->view('rule',$footer);                
            $this->load->view('include/footer');
	 }
function add_rule($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('Title','Title', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
    
    
    	
	        $save['Title']			        = $this->input->post('Title');
			$save['Text']			        = $this->input->post('Text');
			$save['Status']			        = 1;
		//IMAGE START
		   if (isset($_FILES["Image"]) && !empty($_FILES["Image"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/rule/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image'))  
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
                     
					 $save['Image'] =  $Image_data["file_name"]; 
				 
                }  
		 
		 //END UPLOADING IMAGE 
		 
					
					
	 
      } 
	 
		  $response = $this->Mdlmaster->save_DB('rule',$save);
           
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
$this->form_validation->set_rules('Title','Title', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		 
		
		  $save['Title']			        = $this->input->post('Title');
			$save['Text']			        = $this->input->post('Text');
			$save['Status']			        = 1;
		//IMAGE START
		   if (isset($_FILES["Image"]) && !empty($_FILES["Image"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/activity/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image'))  
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
                     
					 $save['Image'] =  $Image_data["file_name"]; 
				 
                }  
		 
		 //END UPLOADING IMAGE 
		 
					
					
	 
      } 
	 
		 
	
           $RuleId = $this->input->post('RuleId');	
	       $this->db->where('RuleId',$RuleId);
		   $response = $this->db->update('rule',$save);
           
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
function get_rule($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('rule');
    // Get records
    $users_record = $this->Mdldailyupdate->get_rule($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/rule';
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
function delete_rule($id=''){
	   is_login();
	   $this->db->where('RuleId',$id);
	   $del = $this->db->delete('rule');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }




function getEnquiry($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('contact_us');
    // Get records
    $users_record = $this->Mdldailyupdate->getEnquiry($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dashboard/index';
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
function deleteEnquiry($id=''){
	   is_login();
	   $this->db->where('id',$id);
	   $del = $this->db->delete('contact_us');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }
   
   
 
///////////////########ACTIVITY########////////////////////	 
function facilities(){
		
		    $title['page_title'] = 'Facilities';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'dailyupdate/get_activity/';
		    $this->load->view('include/header',$title);
		    $this->load->view('activity',$footer);                
            $this->load->view('include/footer');
	 }
function add_activity($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('Title','Title', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
    
    
    	
	        $save['Title']			        = $this->input->post('Title');
			$save['Text']			        = $this->input->post('Text');
			$save['Status']			        = 1;
		//IMAGE START
		   if (isset($_FILES["Image"]) && !empty($_FILES["Image"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/activity/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image'))  
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
                     
					 $save['Image'] =  $Image_data["file_name"]; 
				 
                }  
		 
		 //END UPLOADING IMAGE 
		 
					
					
	 
      } 
	 
		  $response = $this->Mdlmaster->save_DB('activity',$save);
           
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
$this->form_validation->set_rules('Title','Title', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		 
		
		  $save['Title']			        = $this->input->post('Title');
			$save['Text']			        = $this->input->post('Text');
			$save['Status']			        = 1;
		//IMAGE START
		   if (isset($_FILES["Image"]) && !empty($_FILES["Image"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/activity/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image'))  
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
                     
					 $save['Image'] =  $Image_data["file_name"]; 
				 
                }  
		 
		 //END UPLOADING IMAGE 
		 
					
					
	 
      } 
	 
		 
	
           $Id = $this->input->post('Id');	
	       $this->db->where('Id',$Id);
		   $response = $this->db->update('activity',$save);
           
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
function get_activity($rowno=0){  
   is_login();
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
    $users_record = $this->Mdldailyupdate->get_activity($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/facilities';
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
   
function delete_activity($id=''){
	   is_login();
	   $this->db->where('Id',$id);
	   $del = $this->db->delete('activity');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }
/////////########NEWS SECTION START HERE######///////////////////
function news(){
		
		    $title['page_title'] = 'News';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'dailyupdate/get_news/';
		    $this->load->view('include/header',$title);
		    $this->load->view('news',$footer);                
            $this->load->view('include/footer');
	 }

function add_news($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('NewsTitle','News Title', 'required');
$this->form_validation->set_rules('Date','News Date', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
             $save['NewsTitle']			        = $this->input->post('NewsTitle');
			 $save['Date']			            = $this->input->post('Date');
			 $save['Place']			            = $this->input->post('Place');
			 $save['Status']			        = 1;
			 $save['Text']			            = $this->input->post('Text');
			 $save['Status']			        = 1;
		//IMAGE START
		   if (isset($_FILES["Image1"]) && !empty($_FILES["Image1"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/news/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image1'))  
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
                     
					 $save['Image1'] =  $Image_data["file_name"]; 
				 
                }  
		 
		   }
		   if (isset($_FILES["Image2"]) && !empty($_FILES["Image2"]["name1"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/news/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image2'))  
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
                     
					 $save['Image2'] =  $Image_data["file_name"]; 
				 
                }
				
		 //END UPLOADING IMAGE 
		 
					
					
	 
      } 
	 
		  $response = $this->Mdlmaster->save_DB('news',$save);
           
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
$this->form_validation->set_rules('NewsTitle','News Title', 'required');
$this->form_validation->set_rules('Date','News Date', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		 
		 $save['NewsTitle']			        = $this->input->post('NewsTitle');
			 $save['Date']			            = $this->input->post('Date');
			 $save['Place']			            = $this->input->post('Place');
			 $save['Status']			        = $this->input->post('Status');
			 $save['Text']			            = $this->input->post('Text');
			 
		//IMAGE START
		   if (isset($_FILES["Image1"]) && !empty($_FILES["Image1"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/news/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image1'))  
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
                     
					 $save['Image1'] =  $Image_data["file_name"]; 
				 
                }  
		 
		   }
		   if (isset($_FILES["Image2"]) && !empty($_FILES["Image2"]["name1"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/news/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image2'))  
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
                     
					 $save['Image2'] =  $Image_data["file_name"]; 
				 
                }
				
		 //END UPLOADING IMAGE 
		 
					
					
	 
      } 
	 
		 
		 
	
           $NewsId = $this->input->post('NewsId');	
	       $this->db->where('NewsId',$NewsId);
		   $response = $this->db->update('news',$save);
           
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
   function savidhan(){
		is_login();
		    $title['page_title'] = 'Savidhan';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'dailyupdate/get_savidhan/';
		    $this->load->view('include/header',$title);
		    $this->load->view('savidhan',$footer);                
            $this->load->view('include/footer');
	 }
	 function accounting(){
		is_login();
		    $title['page_title'] = 'Accounting';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'dailyupdate/get_accounting/';
		    $this->load->view('include/header',$title);
		    $this->load->view('accounting',$footer);                
            $this->load->view('include/footer');
	 }
	 function jobupdate(){
		is_login();
		    $title['page_title'] = 'Jobupdate';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'dailyupdate/get_jobupdate/';
		    $this->load->view('include/header',$title);
		    $this->load->view('jobupdate',$footer);                
            $this->load->view('include/footer');
	 }
   function add_savidhan($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('savidhanTitle','Savidhan Title', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
             $save['title']			        = $this->input->post('savidhanTitle');
		//IMAGE START
		   if (isset($_FILES["Image1"]) && !empty($_FILES["Image1"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/savidhan/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image1'))  
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
                     
					 $save['file'] =  $Image_data["file_name"]; 
				 
                }  
		 
		   }
	 
		  $response = $this->Mdlmaster->save_DB('savidhan',$save);
           
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
$this->form_validation->set_rules('savidhanTitle','Savidhan Title', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		 
		 $save['title']			        = $this->input->post('savidhanTitle');
			 
		//IMAGE START
		   if (isset($_FILES["Image1"]) && !empty($_FILES["Image1"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/savidhan/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image1'))  
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
                     
					 $save['file'] =  $Image_data["file_name"]; 
				 
                }  
		 
		   }
	
           $id = $this->input->post('id');	
	       $this->db->where('id',$id);
		   $response = $this->db->update('savidhan',$save);
           
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
   function add_accounting($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('accountingtitle','Accounting Title', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
             $save['title']			        = $this->input->post('accountingtitle');
             $save['Date']			        = $this->input->post('Date');
             $save['income']			        = $this->input->post('income');
              $save['expense']			        = $this->input->post('expense');
              $save['details']                  = $this->input->post('details');
		  $response = $this->Mdlmaster->save_DB('accounting',$save);
           
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
$this->form_validation->set_rules('accountingtitle','Accounting Title', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		$save['title']			        = $this->input->post('accountingtitle');
             $save['Date']			        = $this->input->post('Date');
             $save['income']			        = $this->input->post('income');
              $save['expense']			        = $this->input->post('expense');
              $save['details']                  = $this->input->post('details');
	
           $id = $this->input->post('id');	
	       $this->db->where('id',$id);
		   $response = $this->db->update('accounting',$save);
           
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
    function add_jobupdate($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('jobupdatetitle','Job Title', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
             $save['title']			        = $this->input->post('jobupdatetitle');
              $save['place']			        = $this->input->post('place');
               $save['post']			        = $this->input->post('post');
                $save['description']			        = $this->input->post('description');
                 $save['Date']			        = $this->input->post('Date');
                  $save['lastdate']			        = $this->input->post('lastdate');
                  
		//IMAGE START
		   if (isset($_FILES["Image1"]) && !empty($_FILES["Image1"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/jobupdate/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image1'))  
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
                     
					 $save['file'] =  $Image_data["file_name"]; 
				 
                }  
		 
		   }
		   
		   //IMAGE START
		   if (isset($_FILES["Image2"]) && !empty($_FILES["Image2"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/jobupdate/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image2'))  
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
                     
					 $save['file2'] =  $Image_data["file_name"]; 
				 
                }  
		 
		   }
	 
		  $response = $this->Mdlmaster->save_DB('jobupdate',$save);
           
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
$this->form_validation->set_rules('jobupdatetitle','Job Title', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
             $save['title']			        = $this->input->post('jobupdatetitle');
              $save['place']			        = $this->input->post('place');
               $save['post']			        = $this->input->post('post');
                $save['description']			        = $this->input->post('description');
                 $save['Date']			        = $this->input->post('Date');
                  $save['lastdate']			        = $this->input->post('lastdate');
                  
		//IMAGE START
		   if (isset($_FILES["Image1"]) && !empty($_FILES["Image1"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/jobupdate/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image1'))  
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
                     
					 $save['file'] =  $Image_data["file_name"]; 
				 
                }  
		 
		   }
		   
		   //IMAGE START
		   if (isset($_FILES["Image2"]) && !empty($_FILES["Image2"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/jobupdate/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image2'))  
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
                     
					 $save['file2'] =  $Image_data["file_name"]; 
				 
                }  
		 
		   }
	
           $id = $this->input->post('id');	
	       $this->db->where('id',$id);
		   $response = $this->db->update('jobupdate',$save);
           
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
function get_news($rowno=0){  
   is_login();
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
    $users_record = $this->Mdldailyupdate->get_news($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/news';
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
function delete_news($id=''){
	   is_login();
	   $this->db->where('NewsId',$id);
	   $del = $this->db->delete('news');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }
   function get_savidhan($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('savidhan');
    // Get records
    $users_record = $this->Mdldailyupdate->get_savidhan($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/savidhan';
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
   function get_accounting($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('accounting');
    // Get records
    $users_record = $this->Mdldailyupdate->get_accounting($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/accounting';
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
   function get_jobupdate($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('jobupdate');
    // Get records
    $users_record = $this->Mdldailyupdate->get_jobupdate($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/jobupdate';
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
   function delete_savidhan($id=''){
	   is_login();
	   $this->db->where('id',$id);
	   $del = $this->db->delete('savidhan');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }
   function delete_accounting($id=''){
	   is_login();
	   $this->db->where('id',$id);
	   $del = $this->db->delete('accounting');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }
function delete_jobupdate($id=''){
	   is_login();
	   $this->db->where('id',$id);
	   $del = $this->db->delete('jobupdate');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }

/////////########GREETING SECTION START HERE######///////////////////
function greeting(){
		
		    $title['page_title'] = 'Greeting';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'dailyupdate/get_greeting/';
		    $this->load->view('include/header',$title);
		    $this->load->view('greeting',$footer);                
            $this->load->view('include/footer');
	 }
function add_greeting($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('Title','Title', 'required');
if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
             $save['Title']			            = $this->input->post('Title');
			 $save['Text']			            = $this->input->post('Text');
			 $save['Status']			        = 1;
		//IMAGE START
		   if (isset($_FILES["Image"]) && !empty($_FILES["Image"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/greeting/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image'))  
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
                     
					 $save['Image'] =  $Image_data["file_name"]; 
				 
                }  
		 
		   }
		
		  $response = $this->Mdlmaster->save_DB('greeting',$save);
           
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
$this->form_validation->set_rules('Title','Title', 'required');
if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		 
		     $save['Title']			            = $this->input->post('Title');
			 $save['Text']			            = $this->input->post('Text');
			 $save['Status']			        = $this->input->post('Status');
		
		//IMAGE START
		   if (isset($_FILES["Image"]) && !empty($_FILES["Image"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/greeting/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image'))  
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
                     
					 $save['Image'] =  $Image_data["file_name"]; 
				 
                }  
		 
		   }
		
		 
		 
	
           $Id = $this->input->post('Id');	
	       $this->db->where('Id',$Id);
		   $response = $this->db->update('greeting',$save);
           
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
function get_greeting($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('greeting');
    // Get records
    $users_record = $this->Mdldailyupdate->get_greeting($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/greeting';
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
function delete_greeting($id=''){
	   is_login();
	   $this->db->where('Id',$id);
	   $del = $this->db->delete('greeting');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }

/////////########GREETING SECTION START HERE######///////////////////
function message(){
		
		    $title['page_title'] = 'Message';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'dailyupdate/get_message/';
		    $this->load->view('include/header',$title);
		    $this->load->view('message',$footer);                
            $this->load->view('include/footer');
	 }
function add_message($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('Title','Title', 'required');
if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
             $save['Title']			            = $this->input->post('Title');
			 $save['Text']			            = $this->input->post('Text');
			 $save['Status']			        = 1;
		//IMAGE START
		   if (isset($_FILES["Image"]) && !empty($_FILES["Image"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/message/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image'))  
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
                     
					 $save['Image'] =  $Image_data["file_name"]; 
				 
                }  
		 
		   }
		
		  $response = $this->Mdlmaster->save_DB('message',$save);
           
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
$this->form_validation->set_rules('Title','Title', 'required');
if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		 
		     $save['Title']			            = $this->input->post('Title');
			 $save['Text']			            = $this->input->post('Text');
			 $save['Status']			        = $this->input->post('Status');
		
		//IMAGE START
		   if (isset($_FILES["Image"]) && !empty($_FILES["Image"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/message/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('Image'))  
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
                     
					 $save['Image'] =  $Image_data["file_name"]; 
				 
                }  
		 
		   }
		
		 
		 
	
           $Id = $this->input->post('Id');	
	       $this->db->where('Id',$Id);
		   $response = $this->db->update('message',$save);
           
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
function get_message($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('message');
    // Get records
    $users_record = $this->Mdldailyupdate->get_message($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/message';
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
function delete_message($id=''){
	   is_login();
	   $this->db->where('Id',$id);
	   $del = $this->db->delete('message');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }
/////////////##########IMAGE CATEGORY#########//////////////////////

function image_category(){
		    $title['page_title'] = 'Image Category';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'dailyupdate/get_image_category/';
			$this->load->view('include/header',$title);
		    $this->load->view('image_category');                
            $this->load->view('include/footer',$footer);
	 }
function add_image_category($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Category Name', 'required|is_unique[imagecategory.name]');
if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
    
    
    	
	      $save['name']			            = $this->input->post('name');
			
		  $response = $this->Mdlmaster->save_DB('imagecategory',$save);
           
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
$this->form_validation->set_rules('name','Category Name', 'required|is_unique[imagecategory.name]');
if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		   $save['name']			            = $this->input->post('name');
			
		
    		$id = $this->input->post('id');	
	       $this->db->where('id',$id);
		   $response = $this->db->update('imagecategory',$save);
           
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
function get_image_category($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('imagecategory');
    // Get records
    $users_record = $this->Mdldailyupdate->get_image_category($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/image_category/';
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
function delete_image_category($id=''){
	   is_login();
	  $filesRes =  $this->db->get_where('imagegellery',array('category'=>$id));
	  if($filesRes->num_rows()>0){
	      $AllFile = $filesRes->result();
	      foreach($AllFile as $fileIma){
	         $iii =  $fileIma->id;
	   $this->unlinkGelleryFile($iii);
	      }
	  }
	   $this->db->where('id',$id);
	   $del = $this->db->delete('imagecategory');
	   if($del)
	   {
		 $this->db->where('category',$id);
	     $this->db->delete('imagegellery');
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }
/////////////##START INSTA###////////////



function insta_gellery(){
            $title['page_title'] = 'Insta Gellery';
            $footer['table_data']   = 1;
            $footer['data_link']   = base_url().'dailyupdate/get_insta_gellery/';
            $this->load->view('include/header',$title);
            $this->load->view('insta_gellery');                
            $this->load->view('include/footer',$footer);
     }
function add_insta_gellery($param1=''){
  
   if($param1=='add'){
        $this->form_validation->set_error_delimiters('', '');
        //$this->form_validation->set_rules('category', 'Category Name', 'required');
        $this->form_validation->set_rules('abc', 'ABC', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            $save['media_type'] = $this->input->post('media_type');
            $save['caption'] = $this->input->post('caption');
            $save['common_key'] = uniqid('', true); // adds extra entropy
            $save['status'] = 0;
            $save['media_id'] = '';
            $save['c_time'] = '';
            $save['s_time'] = '';
            $save['e_time'] = '';
            $save['added'] = date('Y-m-d H:i:s');

            $cpt = count($_FILES['image']['name']);
            
            for($i = 0; $i < $cpt; $i++) {
                // Check if image is not empty
                if(!empty($_FILES['image']['name'][$i])){
                    $_FILES['file']['name'] = $_FILES['image']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['image']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['image']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['image']['size'][$i];

                    $upload_base_dir = 'uploads/image_gellery/';
                    if (!file_exists($upload_base_dir)) {
                        mkdir($upload_base_dir, 0777, true);  // Create directory if not exists
                    }

                    // Configure upload settings
                    $config['upload_path'] = $upload_base_dir;
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|mov|avi|mkv'; //'jpg|jpeg|png|gif';

                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; //
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                        exit();
                    } else {
                        $Image_data = $this->upload->data();
                        

                        $save['image'] = $Image_data["file_name"];
                      
                        $response = $this->Mdlmaster->save_DB('insta_gellery', $save);
                    }
                }
            }

            if ($response) {
                echo "1";
            } else {
                echo 'Error try again!';
            }
        }
    }
  
    
            if($param1=='edit'){
$this->form_validation->set_rules('name','Category Name', 'required|is_unique[imagecategory.name]');
if ($this->form_validation->run() == FALSE) {
    
     echo validation_errors();
    
} 
else {   

           $save['name']                        = $this->input->post('name');
            
        
          $id = $this->input->post('id');   
           $this->db->where('id',$id);
           $response = $this->db->update('imagecategory',$save);
           
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


   public function get_media_by_common_key() {
    $common_key = $this->input->post('common_key');
    
    $this->db->where('common_key', $common_key);
    $query = $this->db->get('insta_gellery')->result();

    $output = '<div class="row">';

    foreach ($query as $row) {
        $file = $row->image;
        $path = 'uploads/image_gellery/' . $file;
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

        if (!empty($file) && file_exists($path)) {
            if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                $imgUrl = base_url($path);
                $output .= "<div class='col-md-3'><img src='$imgUrl' class='img-thumbnail mb-2' style='width:100%;height:auto;'></div>";
            } elseif (in_array($fileExtension, ['mp4', 'avi', 'mov', 'mkv'])) {
                $videoUrl = base_url($path);
                $output .= "<div class='col-md-3'><video width='100%' height='auto' controls><source src='$videoUrl' type='video/$fileExtension'></video></div>";
            }
        } else {
            $output .= "<div class='col-md-3'><img src='".base_url("uploads/no_file.png")."' class='img-thumbnail mb-2' style='width:100%;height:auto;'></div>";
        }
    }

    $output .= '</div>';
    echo $output;
}


function get_insta_gellery($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
   $allcount = $this->Mdlmaster->count_all('insta_gellery');
    // Get records
    $users_record = $this->Mdldailyupdate->get_insta_gellery($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/insta_gellery/';
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
function delete_insta_gellery($id=''){
       is_login();
       $this->unlinkInstaFile($id);
       $this->db->where('common_key',$id);
       $del = $this->db->delete('insta_gellery');
       if($del)
       {
        
        echo"1";
       }
       else
       {
       echo"Failed!";
       }
   }


   ////////###END INSTA ##////////
/////////////##########IMAGE CATEGORY#########//////////////////////

function image_gellery(){
		    $title['page_title'] = 'Image Gellery';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'dailyupdate/get_image_gellery/';
			$page_data['imagecategory'] = $this->db->get('imagecategory')->result();
			$this->load->view('include/header',$title);
		    $this->load->view('image_gellery',$page_data);                
            $this->load->view('include/footer',$footer);
	 }
function add_image_gellery($param1=''){
  
   if($param1=='add'){
        $this->form_validation->set_error_delimiters('', '');
        //$this->form_validation->set_rules('category', 'Category Name', 'required');
        $this->form_validation->set_rules('abc', 'ABC', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            $save['media_type'] = $this->input->post('media_type');
            $cpt = count($_FILES['image']['name']);
            
            for($i = 0; $i < $cpt; $i++) {
                // Check if image is not empty
                if(!empty($_FILES['image']['name'][$i])){
                    $_FILES['file']['name'] = $_FILES['image']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['image']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['image']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['image']['size'][$i];

                    $upload_base_dir = 'uploads/image_gellery/';
                    if (!file_exists($upload_base_dir)) {
                        mkdir($upload_base_dir, 0777, true);  // Create directory if not exists
                    }

                    // Configure upload settings
                    $config['upload_path'] = $upload_base_dir;
                    $config['allowed_types'] = '*'; //'jpg|jpeg|png|gif';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                        exit();
                    } else {
                        $Image_data = $this->upload->data();
                        /****$config['image_library'] = 'gd2';
                        $config['source_image'] = $upload_base_dir . $Image_data["file_name"];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['quality'] = '100%';
                        $config['width'] = '100%';
                        $config['height'] = '100%';
                        $config['new_image'] = $upload_base_dir . $Image_data["file_name"];

                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize(); ****/

                        $save['image'] = $Image_data["file_name"];
                      
                        $response = $this->Mdlmaster->save_DB('imagegellery', $save);
                    }
                }
            }

            if ($response) {
                echo "1";
            } else {
                echo 'Error try again!';
            }
        }
    }
  
  if($param1=='add_bkp_9_24'){
        $this->form_validation->set_error_delimiters('', '');
        //$this->form_validation->set_rules('category', 'Category Name', 'required');
        $this->form_validation->set_rules('abc', 'ABC', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
           // $save['category'] = $this->input->post('category');
            $cpt = count($_FILES['image']['name']);
            
            for($i = 0; $i < $cpt; $i++) {
                // Check if image is not empty
                if(!empty($_FILES['image']['name'][$i])){
                    $_FILES['file']['name'] = $_FILES['image']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['image']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['image']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['image']['size'][$i];

                    $upload_base_dir = 'uploads/image_gellery/';
                    if (!file_exists($upload_base_dir)) {
                        mkdir($upload_base_dir, 0777, true);  // Create directory if not exists
                    }

                    // Configure upload settings
                    $config['upload_path'] = $upload_base_dir;
                    $config['allowed_types'] = '*'; //'jpg|jpeg|png|gif';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                        exit();
                    } else {
                        $Image_data = $this->upload->data();
                        /****$config['image_library'] = 'gd2';
                        $config['source_image'] = $upload_base_dir . $Image_data["file_name"];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['quality'] = '100%';
                        $config['width'] = '100%';
                        $config['height'] = '100%';
                        $config['new_image'] = $upload_base_dir . $Image_data["file_name"];

                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize(); ****/

                        $save['image'] = $Image_data["file_name"];
                        $response = $this->Mdlmaster->save_DB('imagegellery', $save);
                    }
                }
            }

            if ($response) {
                echo "1";
            } else {
                echo 'Error try again!';
            }
        }
    }
  
	    if($param1=='add_bkp'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('category','Category Name', 'required');
if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
    
    
    	
	      $save['category']	= $this->input->post('category');
          $cpt = count($_FILES['image']['name']);
          for($i=0;$i<$cpt;$i++){			
					///image start
                   if(!empty($_FILES['image']['name'][$i])){
                 
		  $_FILES['file']['name'] = $_FILES['image']['name'][$i];
          $_FILES['file']['type'] = $_FILES['image']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['image']['error'][$i];
          $_FILES['file']['size'] = $_FILES['image']['size'][$i];

				
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/image_gellery/';
          if(!file_exists($upload_base_dir)) {
          mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('file'))  
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
                     $config['width'] = 300;  
                     $config['height'] = 400;  
                     $config['new_image'] = $upload_base_dir.$Image_data["file_name"];  
                     $this->load->library('image_lib', $config);  
                     $this->image_lib->resize();  
                     
					 $save['image'] =  $Image_data["file_name"]; 
				 
                }  
		 
		 $response = $this->Mdlmaster->save_DB('imagegellery',$save);
		 
		   }
		
   

}        
	
		  
           
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
$this->form_validation->set_rules('name','Category Name', 'required|is_unique[imagecategory.name]');
if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		   $save['name']			            = $this->input->post('name');
			
		
    	  $id = $this->input->post('id');	
	       $this->db->where('id',$id);
		   $response = $this->db->update('imagecategory',$save);
           
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
function get_image_gellery($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('imagegellery');
    // Get records
    $users_record = $this->Mdldailyupdate->get_image_gellery($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'dailyupdate/image_gellery/';
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
function delete_image_gellery($id=''){
	   is_login();
	   $this->unlinkGelleryFile($id);
	   $this->db->where('id',$id);
	   $del = $this->db->delete('imagegellery');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }
function unlinkGelleryFile($imgId){
    $fileNmae = $this->Mdlmaster->get_col_by_key('imagegellery','id',$imgId,'image');
    if(!empty($fileNmae) || $fileNmae!='NA'){
         $filePath = 'uploads/image_gellery/'.$fileNmae;
		   if(file_exists($filePath)){
		      unlink($filePath); 
		   }
    }
}


function unlinkInstaFile($imgId){
    $allgellery = $this->db->get_where('insta_gellery',array('common_key'=>$imgId))->result();
    foreach($allgellery as $gell){
     $fileNmae = $gell->image;
    if(!empty($fileNmae) || $fileNmae!='NA'){
         $filePath = 'uploads/image_gellery/'.$fileNmae;
           if(file_exists($filePath)){
              unlink($filePath); 
           }
    }
  }
}

//////////#####################/////////////////////////
function edit_form($page='',$table='',$key='',$value=''){
	  is_login();
	  $page_data['keyId'] = $value;
	  $page_data['row'] = $this->db->get_where($table,array($key=>$value))->result();
	  $this->load->view($page,$page_data);
  }
  
  
}