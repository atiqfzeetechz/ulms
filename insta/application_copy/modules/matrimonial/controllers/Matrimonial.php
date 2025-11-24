<?php
class Matrimonial extends CI_Controller
{
	
	function __construct()
  	{
	    parent::__construct();
	   // $this->load->model('matrimonial'); 
	   
  	}
	function add()
	{
	    		$this->load->view('front/header');

		$this->load->view('matrimonial_form');
				$this->load->view('front/footer');

	}
	function insertdata(){
	    $this->load->model('Model_matrimonial');
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name','required');

    if ($this->form_validation->run() == FALSE)
    {
        
    	 echo validation_errors();
    	
    } 
    else 
    {
    
    
    	
	      $data['name']			            = $this->input->post('name');
	      $data['gender']			            = $this->input->post('gender');
			$data['com']			            = $this->input->post('com');
			$data['education']				= $this->input->post('education');
			$data['dob']				= $this->input->post('dob');
			$data['time']				=  $this->input->post('time');;
			$data['place']			        = $this->input->post('place');
			$data['height']			            = $this->input->post('height');
			$data['weight']			            = $this->input->post('weight');
			$data['color']			            = $this->input->post('color');
			$data['work_data']			            = $this->input->post('work_data');
			$data['work_place']			            = $this->input->post('work_place');
			$data['email']			            = $this->input->post('email');
			$data['mobile']			            = $this->input->post('mobile');
			$data['father_name']			            = $this->input->post('father_name');
			$data['workplace_number']			            = $this->input->post('workplace_number');
			$data['father_occuption']			            = $this->input->post('father_occuption');
			$data['father_income']			            = $this->input->post('father_income');
			$data['father_occuption_place']			            = $this->input->post('father_occuption_place');
			$data['living_place']			            = $this->input->post('living_place');
			$data['district']			            = $this->input->post('district');
			$data['state']			            = $this->input->post('state');
			
			
			$data['house']			            = $this->input->post('house');
			$data['brother']			            = $this->input->post('brother');
			$data['sister']			            = $this->input->post('sister');
			$data['vehicle']			            = $this->input->post('vehicle');
			
			$data['uncle_name']			            = $this->input->post('uncle_name');
			$data['address']			            = $this->input->post('address');
			$data['uncle_mobile_no']			            = $this->input->post('uncle_mobile_no');
			$data['relative']			            = $this->input->post('relative');
			$data['known_name']			            = $this->input->post('known_name');
			$data['known_address']			            = $this->input->post('known_address');
			$data['known_mobile']			            = $this->input->post('known_mobile');
			$data['expectations']			            = $this->input->post('expectations');
			$data['age']			            = $this->input->post('age');
			$data['partner_education']			            = $this->input->post('partner_education');
			$data['partner_height']			            = $this->input->post('partner_height');
			$data['other_details']			            = $this->input->post('other_details');
			
		//IMAGE START
		   if (isset($_FILES["profileimage"]) && !empty($_FILES["profileimage"]["name"]))
		   {
                 
              //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_profileimage/';
              $upload_base_dir = 'uploads/matrimonial/';
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
					 $data['profileimage'] =  $Image_data["file_name"]; 
                }  
		   }
		   
		   $response = $this->Model_matrimonial->insert_data('matrimony',$data);
           
           if($response)
           {
			echo"1";
           }
           else
           {
            echo 'Error try again!';
           }
		  // $this->matrimonial->insertdata($data);
		  //$this->db->insert('matrimony',$data);
		   
}
}
function pending_registration()
	{
	    is_login();
	    $title['page_title'] = 'Registartion';
	    $this->load->model('Model_matrimonial');
	    		$this->load->view('include/header',$title);
        $data=$this->Model_matrimonial->get_data();
		$this->load->view('registration_table',['data'=>$data]);
				$this->load->view('include/footer');

	}
	function matrimonial_edit($id='')
	{
	    is_login();
	    $title['page_title'] = 'Registartion';
	     $this->load->model('Model_matrimonial');
	   
	    $data['row'] =$this->Model_matrimonial->edit_data($id);
	   
	    		$this->load->view('include/header',$title);
		$this->load->view('matrimonial_edit',$data);
				$this->load->view('include/footer');

	}
	function matrimonial_update(){
	    $this->load->model('Model_matrimonial');
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name','required');

    if ($this->form_validation->run() == FALSE)
    {
        
    	 echo validation_errors();
    	
    } 
    else 
    {
    
    
    	$data['id']			            = $this->input->post('id');
	      $data['name']			            = $this->input->post('name');
	      $data['gender']			            = $this->input->post('gender');
			$data['com']			            = $this->input->post('com');
			$data['education']				= $this->input->post('education');
			$data['dob']				= $this->input->post('dob');
			$data['time']				=  $this->input->post('time');;
			$data['place']			        = $this->input->post('place');
			$data['height']			            = $this->input->post('height');
			$data['weight']			            = $this->input->post('weight');
			$data['color']			            = $this->input->post('color');
			$data['work_data']			            = $this->input->post('work_data');
			$data['work_place']			            = $this->input->post('work_place');
			$data['email']			            = $this->input->post('email');
			$data['mobile']			            = $this->input->post('mobile');
			$data['father_name']			            = $this->input->post('father_name');
			$data['workplace_number']			            = $this->input->post('workplace_number');
			$data['father_occuption']			            = $this->input->post('father_occuption');
			$data['father_income']			            = $this->input->post('father_income');
			$data['father_occuption_place']			            = $this->input->post('father_occuption_place');
			$data['living_place']			            = $this->input->post('living_place');
			$data['district']			            = $this->input->post('district');
			$data['state']			            = $this->input->post('state');
			
			
			$data['house']			            = $this->input->post('house');
			$data['brother']			            = $this->input->post('brother');
			$data['sister']			            = $this->input->post('sister');
			$data['vehicle']			            = $this->input->post('vehicle');
			
			$data['uncle_name']			            = $this->input->post('uncle_name');
			$data['address']			            = $this->input->post('address');
			$data['uncle_mobile_no']			            = $this->input->post('uncle_mobile_no');
			$data['relative']			            = $this->input->post('relative');
			$data['known_name']			            = $this->input->post('known_name');
			$data['known_address']			            = $this->input->post('known_address');
			$data['known_mobile']			            = $this->input->post('known_mobile');
			$data['expectations']			            = $this->input->post('expectations');
			$data['age']			            = $this->input->post('age');
			$data['partner_education']			            = $this->input->post('partner_education');
			$data['partner_height']			            = $this->input->post('partner_height');
			$data['other_details']			            = $this->input->post('other_details');
			
		//IMAGE START
		   if (isset($_FILES["profileImage"]) && !empty($_FILES["profileImage"]["name"]))
		   {
                 
              //$upload_base_dir = 'uploads/student_data/'.$data['AdmissionNo'].'/profile_profileimage/';
              $upload_base_dir = 'uploads/matrimonial/';
              if(!file_exists($upload_base_dir)) {
              mkdir($upload_base_dir, 0777, true);  //create directory if not exist
          }
		  
		 //START UPLOADING IMAGE
		 
		 
                $config['upload_path'] = $upload_base_dir;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
				$config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('profileImage'))  
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
					 $data['profileImage'] =  $Image_data["file_name"]; 
                }  
		   }
		   			    $id    = $this->input->post('id');
		   $response = $this->Model_matrimonial->update_data($id,$data);
           
           if($response)
           {
			echo"1";
           }
           else
           {
            echo 'Error try again!';
           }
		  // $this->matrimonial->insertdata($data);
		  //$this->db->insert('matrimony',$data);
		   
}
}

}
?>
	