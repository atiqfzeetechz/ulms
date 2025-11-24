<?php
class User_model extends CI_Model {       
	function __construct(){            
	  	parent::__construct();
		$this->user_id =isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}

	/**
      * This function is used authenticate user at login
      */
  	function auth_user() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$this->db->where("is_deleted='0' AND (username='$email' OR email='$email')");
		$result = $this->db->get('users')->result();
		if(!empty($result)){       
			if (password_verify($password, $result[0]->password)) {       
				if($result[0]->status != 'active') {
				return 'not_varified';
				}
				elseif($result[0]->user_type=='admin')
				{
				
				return $result;
				}
               elseif($result[0]->user_type=='subadmin'){
				return $result; 
				
                 }
               else 
               {

               }	
				
			}
			else {             
				return false;
			}
		} else {
			return false;
		}
  	}

  	/**
     * This function is used to delete user
     * @param: $id - id of user table
     */
	function delete($id='') {
		$this->db->where('users_id', $id);  
		$this->db->delete('users'); 
	}
	
	/**
      * This function is used to load view of reset password and varify user too 
      */
	function mail_varify() {    
		$ucode = $this->input->get('code');     
		$this->db->select('email as e_mail');        
		$this->db->from('users');
		$this->db->where('var_key',$ucode);
		$query = $this->db->get();     
		$result = $query->row();   
		if(!empty($result->e_mail)){      
			return $result->e_mail;         
		}else{     
			return false;
		}
	}


	/**
      * This function is used Reset password  
      */
	function ResetPpassword(){
		$email = $this->input->post('email');
		if($this->input->post('password_confirmation') == $this->input->post('password')){
			$npass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$data['password'] = $npass;
			$data['var_key'] = '';
			return $this->db->update('users',$data, "email = '$email'");
		}
	}
 
  	/**
      * This function is used to select data form table  \
      */
	 function get_userss()
	 {
		 	return $this->db->get('users')->result_array();
	 }
	 
	function get_data_by($tableName='', $value='', $colum='',$condition='') {	
		if((!empty($value)) && (!empty($colum))) { 
			$this->db->where($colum, $value);
		}
		$this->db->select('*');
		$this->db->from($tableName);
		$query = $this->db->get();
		return $query->result();
  	}

  	/**
      * This function is used to check user is alredy exist or not  
      */
	function check_exists($table='', $colom='',$colomValue=''){
		$this->db->where($colom, $colomValue);
		$res = $this->db->get($table)->row();
		if(!empty($res)){ return false;} else{ return true;}
 	}

 	/**
      * This function is used to get users detail  
      */
	function get_users($userID = '') {
		$this->db->where('is_deleted', '0');                  
		if(isset($userID) && $userID !='') {
			$this->db->where('users_id', $userID); 
		} else if($this->session->userdata('user_details')[0]->user_type == 'admin') {
			$this->db->where('user_type', 'admin'); 
		} else {
			$this->db->where('users.users_id !=', '1'); 
		}
		$result = $this->db->get('users')->result();
		return $result;
  	}

  	/**
      * This function is used to get email template  
      */
  	function get_template($code){
	  	$this->db->where('code', $code);
	  	return $this->db->get('templates')->row();
	}

	/**
      * This function is used to Insert record in table  
      */
  	public function insertRow($table, $data){
	  	$this->db->insert($table,$data);
	  	return  $this->db->insert_id();
	}

	/**
      * This function is used to Update record in table  
      */
  	public function updateRow($table, $col, $colVal, $data) {
  		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
  	}
	
	

  function get_subadmin($limit,$start){
	
  $output = '';
  
   $output = '';
  $this->db->select("*");
  $this->db->from("users");
  $this->db->order_by("users_id","DESC");
  $this->db->where('user_type','subadmin');
  $this->db->limit($limit,$start);
  $query = $this->db->get()->result();

  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Name</th>
	<th>Mobile</th>
	<th>Email</th>
	<th>Username</th>
	<th>Status</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->users_id;
           $del_url  = base_url().'user/delete_users/'.$id;
		   $edit_url = base_url().'user/edit_form/edit_user/users/users_id/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
          if($row->user_type=='admin')
		  {
			$delete_link = '';  
		  }
		  else
		  {
			$delete_link = $delete_link;  
		  }
		  
		  if($row->status=='active')
		  {
			$status = "<div class='btn btn-xs btn-success'>Active</div>";  
		  }
		  else
		  {
			$status = '<span class="btn btn-xs btn-danger">Deactive</span>';
		  }
		  
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$row->name.'</td>
	<td>'.$row->mobile.'</td>
	<td>'.$row->email.'</td>
	<td>'.$row->username.'</td>
	<td>'.$status.'</td>
	<td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 function get_user_company_link($limit,$start){
	
  $output = '';
  
   $output = '';
  $this->db->select("*");
  $this->db->from("usercompanylink");
  $this->db->order_by("UserCompanyLinkId","DESC");
  $this->db->limit($limit,$start);
  $query = $this->db->get()->result();

  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>User</th>
	<th>Company</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->UserCompanyLinkId;
           $del_url  = base_url().'user/delete_company_link/'.$id;
		   $edit_url = base_url().'user/edit_form/edit_user/users/users_id/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
         $UserName = $this->Mdlmaster->get_col_by_key('users','users_id',$row->UserId,'name');
		 $CompanyName = $this->Mdlmaster->get_col_by_key('companymaster','CompanyId',$row->CompanyId,'CompanyName');
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$UserName.'</td>
	<td>'.$CompanyName.'</td>
	<td>'.$delete_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 
 
}