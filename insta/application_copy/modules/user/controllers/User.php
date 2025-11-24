<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class User extends CI_Controller {

    function __construct(){
        parent::__construct(); 
		$this->load->model('User_model');
		
		$this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
    }

    /**
      * This function is redirect to users profile page
      * @return Void
      */
    public function index() {
    	if(is_login()){
    		redirect( base_url().'dashboard', 'refresh');
    	} 
    }

    /**
      * This function is used to load login view page
      * @return Void
      */
    public function login(){
    	if(isset($_SESSION['user_details'])){
    		redirect( base_url().'dashboard', 'refresh');
    	}   
		
    	//$this->load->view('include/script');
        $this->load->view('login'); 
    }
  
  
    
    /**
      * This function is used to logout user
      * @return Void
      */
    public function logout(){
        is_login();
        $this->session->unset_userdata('user_details'); 
		if($this->session->userdata('SwitchSession'))
		{
        $this->session->unset_userdata('SwitchSession');	
		}		
        redirect( base_url().'user/login', 'refresh');
    }

    /**
     * This function is used to registr user
     * @return Void
     */
   
    
    /**
     * This function is used for user authentication ( Working in login process )
     * @return Void
     */
	public function auth_user($page =''){ 
		$return = $this->User_model->auth_user();
		
		if(empty($return)) { 
			$this->session->set_flashdata('messagePr', 'Invalid details');	
            redirect( base_url().'user/login', 'refresh');  
        } else { 
			if($return == 'not_varified'){
				$this->session->set_flashdata('messagePr', 'This accout is not varified. Please contact to your admin..');
                redirect( base_url().'user/login', 'refresh');
			} else {
				
				$this->session->set_userdata('user_details',$return);
			}
            redirect( base_url().'dashboard', 'refresh');
        }
    }
    
    /**
     * This function is used send mail in forget password
     * @return Void
     */
    public function forgetpassword(){
        $page['title'] = 'Forgot Password';
        if($this->input->post()){
            $setting = settings();
            $res = $this->User_model->get_data_by('users', $this->input->post('email'), 'email',1);
            if(isset($res[0]->users_id) && $res[0]->users_id != '') { 
                $var_key = $this->getVarificationCode(); 
                $this->User_model->updateRow('users', 'users_id', $res[0]->users_id, array('var_key' => $var_key));
                $sub = "Reset password";
                $email = $this->input->post('email');      
                $data = array(
                    'user_name' => $res[0]->name,
                    'action_url' =>base_url(),
                    'sender_name' => $setting['company_name'],
                    'website_name' => $setting['website'],
                    'varification_link' => base_url().'user/mail_varify?code='.$var_key,
                    'url_link' => base_url().'user/mail_varify?code='.$var_key,
                    );
                $body = $this->User_model->get_template('forgot_password');
                $body = $body->html;
                foreach ($data as $key => $value) {
                    $body = str_replace('{var_'.$key.'}', $value, $body);
                }
                if($setting['mail_setting'] == 'php_mailer') {
                    $this->load->library("send_mail");         
                    $emm = $this->send_mail->email($sub, $body, $email, $setting);
                } else {
                    // content-type is required when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= 'From: '.$setting['EMAIL'] . "\r\n";
                    $emm = mail($email,$sub,$body,$headers);
                }
                if($emm) {
                    $this->session->set_flashdata('messagePr', 'To reset your password, link has been sent to your email');
                    redirect( base_url().'user/login','refresh');
                }
            } else {    
                $this->session->set_flashdata('forgotpassword', 'This account does not exist');//die;
                redirect( base_url()."user/forgetpassword");
            }
        } else {
            $this->load->view('include/script');
            $this->load->view('forget_password');
        }
    }

    /**
      * This function is used to load view of reset password and varify user too 
      * @return : void
      */
    public function mail_varify(){
      	$return = $this->User_model->mail_varify();         
      	$this->load->view('include/script');
      	if($return){          
        	$data['email'] = $return;
        	$this->load->view('set_password', $data);        
      	} else { 
	  		$data['email'] = 'allredyUsed';
        	$this->load->view('set_password', $data);
    	} 
    }
	
    /**
      * This function is used to reset password in forget password process
      * @return : void
      */
    public function reset_password(){
        $return = $this->User_model->ResetPpassword();
        if($return){
        	$this->session->set_flashdata('messagePr', 'Password Changed Successfully..');
            redirect( base_url().'user/login', 'refresh');
        } else {
        	$this->session->set_flashdata('messagePr', 'Unable to update password');
            redirect( base_url().'user/login', 'refresh');
        }
    }

    /**
     * This function is generate hash code for random string
     * @return string
     */
    public function getVarificationCode(){        
        $pw = $this->randomString();   
        return $varificat_key = password_hash($pw, PASSWORD_DEFAULT); 
    }

    

    /**
     * This function is used for show users list
     * @return Void
     */
   

    /**
     * This function is used to create datatable in users list page
     * @return Void
     */

    /**
     * This function is Showing users profile
     * @return Void
     */
    public function profile($id='') {   
        is_login();
        if(!isset($id) || $id == '') {
          $id = $this->session->userdata ('user_details')[0]->users_id;
        }
		$header['page_title'] = 'My Profile';
        $data['user_data'] = $this->db->get_where('users',array('users_id'=>$id))->result();
        $this->load->view('include/header',$header); 
        $this->load->view('profile', $data);
        $this->load->view('include/footer');
    }

public function update_profile()
  {
	   is_login();
	   
$users_id = $this->input->post('users_id');	
$this->form_validation->set_error_delimiters('', '');
//$this->form_validation->set_rules('mobile','Mobile Number','required|regex_match[/^[0-9]{10}$/]|edit_uniqueusers[users.mobile.'.$users_id.']');
//$this->form_validation->set_rules('email','Email Id','required|edit_uniqueusers[users.email.'.$users_id.']');
$this->form_validation->set_rules('name','Full Name', 'required');
//$this->form_validation->set_rules('pincode','Pincode', 'required');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
	
} 
else {
	
	
	  $data['name'] = $this->input->post('name'); 
	 // $data['dob'] = $this->input->post('dob');
	  //$data['gender'] = $this->input->post('gender');
	  $data['email'] = $this->input->post('email');
	  $data['mobile'] = $this->input->post('mobile');
	  $data['address'] = $this->input->post('address');
	  //$data['pincode'] = $this->input->post('pincode');
	  
	   
	 
	  
	  $this->db->where('users_id',$users_id);
	  $ins = $this->db->update('users',$data);
	  if($ins)
			{
			echo"1";	
			}
			else
			{
	  echo 'Error try again!';
			}
			
			
}  


	 } 
    /**
     * This function is used to show popup of user to add and update
     * @return Void
     */
 	
    /**
     * This function is used to upload file
     * @return Void
     */
  
  	function users()
	 {      
	        is_login();
		    $title['page_title'] = 'User Master';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'user/get_users/';
		    $this->load->view('include/header',$title);
            $this->load->view('users');                
            $this->load->view('include/footer',$footer); 
	}
	
	function get_users($rowno=0){
  $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $allcount = $this->db->get_where('users',array('user_type'=>'subadmin'))->num_rows();

    // Get records
    $users_record = $this->User_model->get_subadmin($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'user/users/';
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



  public function add_user($param1='')
  { 
        if($param1=='add'){
			
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name','required');
$this->form_validation->set_rules('username','Username','required|is_unique[users.username]');
$this->form_validation->set_rules('email','Email','is_unique[users.email]');
$this->form_validation->set_rules('mobile','Mobile','is_unique[users.mobile]');
$this->form_validation->set_rules('password','Password','required');
$this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	
	
	        
			$data['name']  = $this->input->post('name');
			$data['username']  = $this->input->post('username');
			$data['email']  = $this->input->post('email');
			$data['mobile']  = $this->input->post('mobile');
			$password  = $this->input->post('password');
			$data['password'] =  password_hash($password, PASSWORD_DEFAULT);
			$data['status'] = 'active';
			$data['is_deleted'] = '0';
			$data['user_type'] = $this->input->post('user_type');
			$reponse = $this->Mdlmaster->save_DB('users',$data);
			
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
		
		
		
		if($param1=='edit'){
$users_id = $this->input->post('users_id');			
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('name','Name','required');
$this->form_validation->set_rules('email','Email','edit_uniqueallusers[users.email.'.$users_id.']');
$this->form_validation->set_rules('mobile','Mobile','edit_uniqueallusers[users.mobile.'.$users_id.']');
$this->form_validation->set_rules('status','Status','required');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	
	
	        
			$data['name']  = $this->input->post('name');
			$data['status']  = $this->input->post('status');
			$data['email']  = $this->input->post('email');
			$data['mobile']  = $this->input->post('mobile');
			$this->db->where('users_id',$users_id);
			$reponse = $this->db->update('users',$data);
			
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
 ///////###############USER COMPANY LINK######///////////////////////
 
 function user_company_link()
	 {      
	        is_login();
		    $title['page_title'] = 'User Company Link';
			$footer['table_data']   = 1;
			$footer['data_link']    = base_url().'user/get_user_company_link/';
			$page_data['users']     = $this->db->get_where('users',array('user_type'=>'subadmin'))->result();
		    $page_data['companies']     = $this->db->get('companymaster')->result();
		    $this->load->view('include/header',$title);
            $this->load->view('user_company_link',$page_data);                
            $this->load->view('include/footer',$footer); 
	}
	

   function add_user_company_link($param1='')
  { 
        if($param1=='add'){
			
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('UserId','User','required');
$this->form_validation->set_rules('CompanyId','Company','required');

if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	
	
	        
			$data['UserId']  = $this->input->post('UserId');
			$data['CompanyId']  = $this->input->post('CompanyId');
			$data['Status'] = 1;
	$validate = $this->db->get_where('usercompanylink',array('UserId'=>$data['UserId'],'CompanyId'=>$data['CompanyId']));
			if($validate->num_rows()>0){
				echo"Already Exist.";
			}
			else {
			$reponse = $this->Mdlmaster->save_DB('usercompanylink',$data);
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
		
  } 	  
 
 	function get_user_company_link($rowno=0){
  $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $allcount = $this->db->get_where('usercompanylink')->num_rows();

    // Get records
    $users_record = $this->User_model->get_user_company_link($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'user/users/';
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

 
 
  function delete_company_link($id=''){
	   is_login();
	   $this->db->where('UserCompanyLinkId',$id);
	   $del = $this->db->delete('usercompanylink');
	   if($del)
	   {
    echo"1";
	   }
	   else
	   {
	echo"Failed!";
	   }
   }
  
 /////////////////END USERS///////////////
  public function generate_token(){
        $alpha = "abcdefghijklmnopqrstuvwxyz";
        $alpha_upper = strtoupper($alpha);
        $numeric = "0123456789";
        $special = ".-+=_,!@$#*%<>[]{}";
        $chars = $alpha . $alpha_upper . $numeric ;            
        $token = '';  
        $up_lp_char = $alpha . $alpha_upper .$special;
        $chars = str_shuffle($chars);
        $token = substr($chars, 10,10).strtotime("now").substr($up_lp_char, 8,8) ;
        return $token;
    }

    /**
     * This function is used to Generate a random string
     * @return String
     */
    public function randomString(){
        $alpha = "abcdefghijklmnopqrstuvwxyz";
        $alpha_upper = strtoupper($alpha);
        $numeric = "0123456789";
        $special = ".-+=_,!@$#*%<>[]{}";
        $chars = $alpha . $alpha_upper . $numeric;            
        $pw = '';    
        $chars = str_shuffle($chars);
        $pw = substr($chars, 8,8);
        return $pw;
    }
	
  function change_password()
	{
		is_login();
		
	        $title['page_title'] = 'Change Password';
			
			$this->load->view('include/header',$title);
            $this->load->view('change_password');                
            $this->load->view('include/footer'); 
	}
	
function changed_password(){
      $users_id             = $this->input->post('users_id');

      $password1 = $this->input->post('password1'); 
      $password2 = $this->input->post('password2');
     
$this->form_validation->set_rules('password1','Password', 'required');




$rules = array(
                [
                    'field' => 'password2',
                    'label' => 'Password',
                    //'rules' => 'min_length[6]|callback_valid_password',
                    'rules' =>'required',
                ],
               
            );
            $this->form_validation->set_rules($rules);
            
            
$this->form_validation->set_rules('password3','Confirm Password','required|matches[password2]');//
if ($this->form_validation->run() == FALSE) {
   echo  validation_errors();
     
} 
else {
    
    if($password1==$password2)
    {
       echo"Please choose different password"; 
    }
    else
    {
     $gets =   $this->db->get_where('users',array('users_id'=>$users_id))->row()->password;
     
     if(password_verify($password1, $gets))
      {
     $data['password'] =  password_hash($password2, PASSWORD_DEFAULT);
    
      $this->db->where('users_id',$users_id);
      $change =  $this->db->update('users',$data);
      //print_r($data);
      if($change)
       {
       echo"1"; }
      else
      {
        echo"Error!";
}
      }
      else
      {
          echo"Old Password Not Matched!";
       }
    }
      	
}

    	
      
  }
    
  
  function delete_users($id=''){
	   is_login();
	   $this->db->where('users_id',$id);
	   $del = $this->db->delete('users');
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

?>