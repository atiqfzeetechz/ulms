<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Page extends CI_Controller {

  function __construct() {
	 //
    parent::__construct();
	
	$this->load->model('Mdlpage');
  
  }
 //////////HISTOEY//////////////// 
function about_us(){
		 is_login();
		 
		    
            $title['page_title'] = 'About us';
			$validate = $this->db->get_where('singlepage',array('Type'=>'history'));
			if($validate->num_rows()>0)
			{
				$Text = $validate->row()->Text;
				$page_data['history'] = $Text;
			}
			else
			{
			$page_data['history'] = '';
			}
			$this->load->view('include/header',$title);
            $this->load->view('history',$page_data);                
            $this->load->view('include/footer');  
	 }
function add_history($param1 = '', $param2 = '', $param3 = ''){
	  
	   if($param1=='add')
			{
			    
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('ss','Session Name','required');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			$data['Text']  = $this->input->post('history');
			$data['Type']      ='history';
			$validate = $this->db->get_where('singlepage',array('Type'=>$data['Type']));
			if($validate->num_rows()>0)
			{
				$RowId = $validate->row()->PageId;
				$this->db->where('PageId',$RowId);
				$reponse = $this->db->update('singlepage',$data);
			}
			else
			{
			$reponse = $this->Mdlmaster->save_DB('singlepage',$data);
			}
			
			if($reponse)
			{
		   echo"1";
            }	
            else 
            {
		   echo $error = "Data not Saved!";
		    }	
			   
			   
			}
			  
		
			    
	    
				
				
				
			}
			
	 
	 
	  if($param1=='edit')
			{
			    
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('ClassName','Class Name','required');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			$data['ClassName']  = $this->input->post('ClassName');
			$data['ReAdmission']  = $this->input->post('ReAdmission');
			$data['isTermExam']  = $this->input->post('isTermExam');
			
			$ClassId  = $this->input->post('ClassId');
			
			
			$this->db->where('ClassId',$ClassId);
			$reponse = $this->db->update('classmaster',$data);
			
			if($reponse)
			{
		   echo"1";
            }	
            else 
            {
		   echo $error = "Data not Saved!";
		    }	
			   
			   
			}
		
			}
	} 	  
 //////////INTENTION///////////
function principal_message(){
		 is_login();
		 
		    
            $title['page_title'] = 'Principal Message';
			$validate = $this->db->get_where('singlepage',array('Type'=>'intention'));
			if($validate->num_rows()>0)
			{
				$Text = $validate->row()->Text;
				$page_data['intention'] = $Text;
				
				
				$Image1 = $validate->row()->Image1;
				$page_data['Image1'] = $Image1;
				
				$page_data['name'] = $validate->row()->name;
					$page_data['about'] = $validate->row()->about;
						$page_data['mobile_number'] = $validate->row()->mobile_number;
			}
			else
			{
			$page_data['intention'] = '';
			$page_data['Image1'] = '';
				$page_data['name'] = '';
					$page_data['about'] = '';
						$page_data['mobile_number'] = '';
			}
			$this->load->view('include/header',$title);
            $this->load->view('intention',$page_data);                
            $this->load->view('include/footer');  
	 }
function add_intention($param1 = '', $param2 = '', $param3 = ''){
	  
	   if($param1=='add')
			{
			    
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('ss','Session Name','required');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			$data['Text']  = $this->input->post('intention');
			$data['name']  = $this->input->post('name');
			$data['mobile_number']  = $this->input->post('mobile_number');
			$data['about']  = $this->input->post('about');
			$data['Type']      ='intention';
			
			if (isset($_FILES["Image1"]) && !empty($_FILES["Image1"]["name"])){
                 
          //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_photo/';
          $upload_base_dir = 'uploads/principal_photo/';
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
                     
					 $data['Image1'] =  $Image_data["file_name"]; 
				 
                }  
		 
		 //END UPLOADING IMAGE 
		 
					
					
	 
      } 
	 
	 
			$validate = $this->db->get_where('singlepage',array('Type'=>$data['Type']));
			if($validate->num_rows()>0)
			{
				$RowId = $validate->row()->PageId;
				$this->db->where('PageId',$RowId);
				$reponse = $this->db->update('singlepage',$data);
			}
			else
			{
			$reponse = $this->Mdlmaster->save_DB('singlepage',$data);
			}
			
			if($reponse)
			{
		   echo"1";
            }	
            else 
            {
		   echo $error = "Data not Saved!";
		    }	
			   
			   
			}
			  
		
			    
	    
				
				
				
			}
			
	 
	 
	 
	} 	  

function slider(){
		    $title['page_title'] = 'Slider';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'page/get_slider/';
			$this->load->view('include/header',$title);
		    $this->load->view('slider');                
            $this->load->view('include/footer',$footer);
	 }
function add_slider($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('category','Category Name', 'required');
if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
    
    
    	
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
          $upload_base_dir = 'uploads/slider/';
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
                    
					 $save['image'] =  $Image_data["file_name"]; 
				 
                }  
		 
		 $response = $this->Mdlmaster->save_DB('slider',$save);
		 
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
function get_slider($rowno=0){  
   is_login();
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
$allcount = $this->Mdlmaster->count_all('slider');
    // Get records
    $users_record = $this->Mdlpage->get_slider($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'page/slider/';
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
function delete_slider($id=''){
	   is_login();
	   $this->unlinkGelleryFile($id);
	   $this->db->where('id',$id);
	   $del = $this->db->delete('slider');
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
    $fileNmae = $this->Mdlmaster->get_col_by_key('slider','id',$imgId,'image');
    if(!empty($fileNmae) || $fileNmae!='NA'){
         $filePath = 'uploads/slider/'.$fileNmae;
		   if(file_exists($filePath)){
		      unlink($filePath); 
		   }
    }
}
}
?>