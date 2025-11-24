<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Sms extends CI_Controller {

  function __construct() {
	
	
    parent::__construct();
    	$this->load->model('Mdlsms');
   		$this->load->helper('url');

	 }
	 
//////////////////#########BLOOD DONER##############///////////////////////	 

function groups(){
		
		    $title['page_title'] = 'Groups';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'sms/get_group/';
		    $this->load->view('include/header',$title);
		    $this->load->view('groups');                
            $this->load->view('include/footer',$footer);
	 }
function add_groups($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name', 'required|is_unique[group.name]');
$this->form_validation->set_rules('status','Status', 'required');

if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
    
    
    	
	       
			$save['name']			            = $this->input->post('name');
			$save['status']			            = $this->input->post('status');
		
		  $response = $this->Mdlmaster->save_DB('group',$save);
           
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
$this->form_validation->set_rules('name','Name', 'required|is_unique[group.name]');
$this->form_validation->set_rules('status','Status', 'required');


if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   

		 
			$save['name']	    = $this->input->post('name');
			$save['status']	    = $this->input->post('status');
		
		
    		$id = $this->input->post('id');	
	       $this->db->where('id',$id);
		   $response = $this->db->update('group',$save);
           
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
function get_group($rowno=0){  
   is_login();
   ini_set('display_errors', 1);
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
  $filter = [
        'name'      => $this->input->post('filterOne'), 
        'status'    => $this->input->post('filterTwo')
    ];
    // All records count
	$allcount = $this->Mdlmaster->count_all('group');
    // Get records
   // $users_record = $this->Mdlsms->get_group($rowperpage,$rowno);
     $users_record = $this->Mdlsms->get_group($rowperpage, $rowno, $filter);

 
    // Pagination Configuration
    $config['base_url'] = base_url().'sms/group/';
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
function delete_group($id=''){
	   is_login();
	   $this->db->where('id',$id);
	   $del = $this->db->delete('group');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }

/////////////////contact/////////////////////////


public function add_bulk_contact($param1 = ''){
    
	 if ($param1 == 'add')
		{
		move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/studentUpload.xlsx');
			// Importing excel sheet for bulk student uploads

			include 'Simplexlsx.class.php';
			
			$xlsx = new SimpleXLSX('uploads/studentUpload.xlsx');
			
			list($num_cols, $num_rows) = $xlsx->dimension();
       
           //print_r($xlsx->rows());
			$f = 0;
			foreach( $xlsx->rows() as $r ) 
			{
				// Ignore the inital name row of excel file
				if ($f == 0)
				{
					$f++;
					continue;
				}
				for( $i=0; $i < $num_cols; $i++ )
				{
					//if ($i == 0)  '';
					if ($i == 0)	$data['name']		    =	$r[$i];
					else if ($i == 1)	$data['mobile']		    =	$r[$i];
					else if ($i == 2)	$data['alt_mobile']		    =	$r[$i];
				
	      }
		  
		 
		    
		         $data['groupid']  =  $this->input->post('groupid');
			     $data['status'] = 1;
			     if(!empty($data['name'])){
			     $insert = $this->db->insert('contact' , $data);
			     }
			}
			
			  $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
              redirect(base_url() . 'sms/contact', 'refresh');
		}


   
  }
  

function contact(){
		
		    $title['page_title'] = 'Contact';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'sms/get_contact/';
		    $this->load->view('include/header',$title);
		    $this->load->view('contact');                
            $this->load->view('include/footer',$footer);
	 }
function add_contact($param1=''){
	    if($param1=='add'){
		
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name[]','Name','required');
$this->form_validation->set_rules('groupid','Group Name', 'required');
$this->form_validation->set_rules('mobile','Mobile', 'required');
//$this->form_validation->set_rules('alt_mobile','Alt Mobile', 'required');
//$this->form_validation->set_rules('email','Email', 'required');



if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {
    
    
    	
	       
			$save['name']			            = $this->input->post('name');
			$save['groupid']			        = $this->input->post('groupid');
			$save['mobile']			            = $this->input->post('mobile');
			$save['alt_mobile']			        = $this->input->post('alt_mobile');
			$save['email']			            = $this->input->post('email');
			$save['status']			            = 1;//$this->input->post('status');
		
		
		  $response = $this->Mdlmaster->save_DB('contact',$save);
           
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
$this->form_validation->set_rules('name[]','Name','required');
$this->form_validation->set_rules('groupid','Group Name', 'required');
$this->form_validation->set_rules('mobile','Mobile','required');





if ($this->form_validation->run() == FALSE) {
    
	 echo validation_errors();
	
} 
else {   
	$save['name']			            = $this->input->post('name');
			$save['groupid']			        = $this->input->post('groupid');
			$save['mobile']			            = $this->input->post('mobile');
			$save['alt_mobile']			        = $this->input->post('alt_mobile');
			$save['email']			            = $this->input->post('email');
			$save['status']			            = $this->input->post('status');
			
			
			
    		$id = $this->input->post('id');	
	       $this->db->where('id',$id);
		   $response = $this->db->update('contact',$save);
           
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
function get_contact($rowno=0){  
   is_login();
   ini_set('display_errors', 1);
   $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
   $filter = [
        'name'      => $this->input->post('filterOne'), 
        'mobile'    => $this->input->post('filterTwo'), 
        'groupid'   => $this->input->post('filterThree'),
     	'status' => $this->input->post('filterFour')
    ];
    // All records count
$allcount = $this->Mdlmaster->count_all('contact');
    // Get records
    $users_record = $this->Mdlsms->get_contact($rowperpage,$rowno,$filter);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'sms/contact/';
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
function delete_contact($id=''){
	   is_login();
	   $this->db->where('id',$id);
	   $del = $this->db->delete('contact');
	   if($del)
	   {
		
		echo"1";
	   }
	   else
	   {
	   echo"Failed!";
	   }
   }
///////////////Send Sms/////////////
function send_sms(){
		
		    $title['page_title'] = 'Send Whatsapp Msg';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'sms/get_contact/';
		    $this->load->view('include/header',$title);
		    $this->load->view('send_sms');                
            $this->load->view('include/footer',$footer);
	 }

function send_single_sms(){
		
		    $title['page_title'] = 'Send Single Whatsapp Msg';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'sms/get_contact/';
		    $this->load->view('include/header',$title);
		    $this->load->view('send_single_sms');                
            $this->load->view('include/footer',$footer);
	 }

public function get_sms_by_id($materId){
           $this->db->select('*');
    $this->db->from('sms');
    $this->db->where('id',$materId);
    $this->db->where('status',1);
    $masters = $this->db->get()->result();

    $data['sms_body'] = $masters[0]->details;
    $data['extra_div'] = $masters[0]->other_html;
    $data['tid_val'] = $masters[0]->tid;
    echo json_encode($data);
  
  }
  
  
  

  
  function register_token(){
  }
  function checkTimeNotInRanges($time_ranges) {
    // Get the current time
    $current_time = date('H:i:s');

    // Function to check if current time is within the range
    $isInRange = function($current_time, $time_range) {
        $start_time = strtotime($time_range['start']);
        $end_time = strtotime($time_range['end']);
        $current_time = strtotime($current_time);

        // Handle the overnight case
        if ($end_time < $start_time) {
            return ($current_time >= $start_time || $current_time <= $end_time);
        }

        return ($current_time >= $start_time && $current_time <= $end_time);
    };

    // Check if current time is in any of the ranges
    foreach ($time_ranges as $time_range) {
        if ($isInRange($current_time, $time_range)) {
            return; // Current time is in range; exit the function
        }
    }

        $this->db->set('status', 0);
        $this->db->update('imagegellery');
       return;
}



  function cvc(){
           // Example usage
$time_ranges = [
        ['start' => FROM_TIME_ONE, 'end' => TO_TIME_ONE], // 8 PM to 1 AM
        ['start' => FROM_TIME_TWO, 'end' => TO_TIME_TWO]  // 5 AM to 10 AM
    ];
echo $this->checkTimeNotInRanges($time_ranges);
    
  
  }
  

  function add_Story(){
    

         $current_time =  date("H:i:s");
         $start_time = date(FROM_TIME_ONE);
         $end_time = date(TO_TIME_ONE);
    
    
         $current_time2 =  date("H:i:s");
         $start_time2 = date(FROM_TIME_TWO);
         $end_time2 = date(TO_TIME_TWO);
    
      
    if (($current_time >= $start_time) || ($current_time <= $end_time)) {
            $this->db->select('image,id,media_id');
            $this->db->from('imagegellery');
            $this->db->order_by('id','desc');
            $this->db->where('status','0');
            $this->db->where('image!=','');
            //$this->db->where('image NOT LIKE', '%.mp4');
            $this->db->limit(1);
            $if_any =  $this->db->get();
            if($if_any->num_rows()>0){
              
              $iid = $if_any->row()->id;
              $iimage = $if_any->row()->image;
              ///start base64
              $imagePath = 'uploads/image_gellery/'.$iimage;
              $media_id = $if_any->row()->media_id;
              
           if (file_exists($imagePath)) {
                // Get the file content
                $fileData = file_get_contents($imagePath);

                // Encode the file data to Base64
                $base64Encoded = base64_encode($fileData);

                // Get the file extension
                $fileInfo = pathinfo($imagePath);
                $fileExtension = $fileInfo['extension'];

                // Determine MIME type based on file extension
                $mimeType = '';
                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif','webp'])) {
                    $mimeType = 'image/' . $fileExtension;
                } elseif (in_array($fileExtension, ['mp4', 'avi', 'mov'])) {
                    $mimeType = 'video/' . $fileExtension;
                } else {
                    // Handle unsupported file types if necessary
                    throw new Exception('Unsupported file type: ' . $fileExtension);
                }

                // Output the Base64 string in the data URI format
                 $bsf = 'data:' . $mimeType . ';base64,' . $base64Encoded;
                 if($media_id!=''){
                  $wap = $media_id;
                 }
                 else{
                   $wap = $bsf;
                 }
             //echo $wap;
                 $ok = $this->update_wa_story($wap);

                // Update database status
               $udata['c_time'] = $current_time;
               $udata['s_time'] = $start_time;
               $udata['e_time'] = $end_time;
               
                $udata['status'] = 1;
                $this->db->where('id', $iid);
                $this->db->update('imagegellery', $udata);
         }

              ///end base64 
              
              
              
             
            }
        }
       
    
    
    
         
    
        elseif ($current_time2 >= $start_time2 && $current_time2 <= $end_time2) {
          
           
            $this->db->select('image,id,media_id');
            $this->db->from('imagegellery');
            $this->db->order_by('id','desc');
            $this->db->where('status','0');
            $this->db->where('image!=','');
            //$this->db->where('media_id!=','');
          //$this->db->where('image NOT LIKE', '%.mp4');
          
            $this->db->limit(1);
            $if_any =  $this->db->get();
            if($if_any->num_rows()>0){
              
              $iid = $if_any->row()->id;
              $iimage = $if_any->row()->image;
              ///start base64
              $imagePath = 'uploads/image_gellery/'.$iimage;
              $media_id = $if_any->row()->media_id;
              
           if (file_exists($imagePath)) {
                // Get the file content
                $fileData = file_get_contents($imagePath);

                // Encode the file data to Base64
                $base64Encoded = base64_encode($fileData);

                // Get the file extension
                $fileInfo = pathinfo($imagePath);
                $fileExtension = $fileInfo['extension'];

                // Determine MIME type based on file extension
                $mimeType = '';
                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif','webp'])) {
                    $mimeType = 'image/' . $fileExtension;
                } elseif (in_array($fileExtension, ['mp4', 'avi', 'mov'])) {
                    $mimeType = 'video/' . $fileExtension;
                } else {
                    // Handle unsupported file types if necessary
                    throw new Exception('Unsupported file type: ' . $fileExtension);
                }

                // Output the Base64 string in the data URI format
                 $bsf = 'data:' . $mimeType . ';base64,' . $base64Encoded;
                 if($media_id!=''){
                  $wap = $media_id;
                 }
                 else{
                   $wap = $bsf;
                 }
                 $ok = $this->update_wa_story($wap);

                // Update database status
                 $udata['c_time'] = $current_time;
                 $udata['s_time'] = $start_time2;
                 $udata['e_time'] = $end_time2;
                $udata['status'] = 1;
                $this->db->where('id', $iid);
                $this->db->update('imagegellery', $udata);
         }


              ///end base64 
              
              
              
             
            }
        }
    else{
        $this->db->set('status', 0);
        $this->db->update('imagegellery');
      
    }
    
  
}

function update_wa_story($bsf,$media_id=''){
      $curl = curl_init();

      curl_setopt_array($curl, [
        CURLOPT_URL => "https://gate.whapi.cloud/stories/send/media",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
          'media' => $bsf//$bsf
        ]),
        CURLOPT_HTTPHEADER => [
          "accept: application/json",
          "authorization: Bearer ".WA_API_TOKEN,
          "content-type: application/json"
        ],
      ]);

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

     if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;
      } 
  }
  

  function send_wa_text($phone,$body,$type,$caption=''){
    
      if($type=="text"){
        $url = "https://gate.whapi.cloud/messages/text";
        $param_name = 'body';
      }else{
        $url = "https://gate.whapi.cloud/messages/image";
        $param_name = 'media';
      }
    
    
    $Phno = $phone;
           if($body!=''){
          $post_data = array(
          'typing_time' => 0,
          'to' => $Phno,
          'caption'=> $caption,
           $param_name => $body
         );
             
           }
    else{
      
       $url = "https://gate.whapi.cloud/messages/text";
        $param_name = 'body';
       $post_data = array(
          'typing_time' => 0,
          'to' => $Phno,
          'caption'=> $caption,
          $param_name => $caption
         );
    }
    
          
    
      

        // Send SMS
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, 'CURL_HTTP_VERSION_1_1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
          "accept: application/json",
          "authorization: Bearer ".WA_API_TOKEN,
          "content-type: application/json"
        ]);
    
      
      
        $output = curl_exec($ch);
        curl_close($ch);
    
        $wa_res = json_decode($output, true);
        if(isset($wa_res['sent']) && $wa_res['sent']==1){
           $wr =  'Success';
        }
        else if(isset($wa_res['error'])){
           $wr = $wa_res['error']['message'];
        } else{
           $wr = "Error";
        }
    return  $wr;
  }
    public function get_contact_by_id($ContactId){
		
	   
		$this->db->select('name,mobile');
        $this->db->from('contact');
        $this->db->where('groupid',$ContactId);
        //$this->db->where('status','1');
        $contact = $this->db->get()->result(); 
        
        foreach($contact as $res){
            
            ?>
            <option value="<?php echo $res->mobile; ?>"><?php echo $res->name; ?> <?php echo $res->mobile; ?></option>
           
            <?php 
        }


			 } 
		 

 function sent_sms() {
    is_login();
 
    $Phnos = $_POST['mobile_number'];
    $Msg = $_POST['sms_body'];
    $message_type = $_POST['msg_type'];
    $caption = $_POST['sms_body'];
 
   
 

    for ($m = 0; $m < count($Phnos); $m++) {
        $Phno = $Phnos[$m];
        sleep(120);

        

              // Handle single image upload
              if (!empty($_FILES['image']['name'])) {
          // Set file data
          $_FILES['file']['name'] = $_FILES['image']['name'];
          $_FILES['file']['type'] = $_FILES['image']['type'];
          $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];
          $_FILES['file']['error'] = $_FILES['image']['error'];
          $_FILES['file']['size'] = $_FILES['image']['size'];

          // Set upload directory
          $upload_base_dir = 'uploads/image_gallery/';
          if (!file_exists($upload_base_dir)) {
              mkdir($upload_base_dir, 0777, true); 
          }

          // Upload configuration
          $config['upload_path'] = $upload_base_dir;
          $config['allowed_types'] = '*'; // You can specify file types if needed
          $config['encrypt_name'] = TRUE;

          $this->load->library('upload', $config);

          // Perform upload
          if (!$this->upload->do_upload('file')) {
              echo $this->upload->display_errors();
              exit();
          } else {
              $image_data = $this->upload->data();
              $image_filename = $image_data['file_name'];
              $image_type = $image_data['image_type'];

              // Convert the image to Base64
              $image_path = $upload_base_dir . $image_filename;
              $image_content = file_get_contents($image_path);
              $base64_image = base64_encode($image_content);

              $data_url = 'data:image/' . $image_type . ';base64,' . $base64_image;
              // Print or use the Base64 encoded image
              
          }
      } else {
          $image_filename = ''; 
          $data_url = '';
      }

      
        
        if($message_type=='text'){
          $mb = $Msg;
        }
       else{
           $mb = $data_url;
       }
        $re_res = $this->send_wa_text($Phno,$mb,$message_type,$caption);

        // Insert data into message_history
        $date = date('Y-m-d H:i:s');
        $data = array(
            'number' => $Phno,
            'message' => $Msg,
            'date' => $date,
            'status' => $re_res, // Assuming $output contains the status of the SMS send operation
            'image' => $data_url // Single media filename for each row
        );
        //$this->db->insert('message_history', $data);
    }

    echo "1"; // Output '1' after processing all numbers
}


  
  
 

function get_msg($msg,$param1='',$param2='',$param3=''){
    $output ='';
    $param1  = 'Sunday';

$output .= "$msg";
  return $output;
    
}
  


 

//////////#####################/////////////////////////
function edit_form($page='',$table='',$key='',$value=''){
	  is_login();
	  $page_data['keyId'] = $value;
	  $page_data['row'] = $this->db->get_where($table,array($key=>$value))->result();
	  $this->load->view($page,$page_data);
  }
  
  
 
  
}