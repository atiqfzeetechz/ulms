<?php
/**
*@if(CheckPermission('crm', 'read'))
**/
 


   function  getDateFormat()
   {
	    $CI = get_instance();
	    $CI->db->select('dateFormate');
		$CI->db->from('settingmaster');
		$query = $CI->db->get();
		if($query->num_rows()>0)
		{
		if($query->row()->dateFormate=='')
		{
	     return "Y-m-d";
		}
       else
         {	
		return $query->row()->dateFormate;  
         }
       	}
		else
		{
		return "Y-m-d";
		}
   }
   
	
    function getActiveSession0()
	{
		$CI = get_instance();
		$CI->db->select('SchoolSession');
		$CI->db->from('schoolmaster');
		$query = $CI->db->get();
		if($query->num_rows()>0)
		{
		return $query->row()->SchoolSession;  
       	}
		else
		{
		return 0;
		}
	}
	function getRowPerPage()
	{  
		$CI = get_instance();
		$CI->db->select('value');
		$CI->db->from('systemsetting');
		$CI->db->where('type','row_per_page');
		$query = $CI->db->get();
		if($query->num_rows()>0)
		{
		return $query->row()->value;  
       	}
		else
		{
		return 20;
		}
		
		
	}	
	
	function is_login(){ 
      if(isset($_SESSION['user_details'])){
          return true;
      }else{
         redirect( base_url().'user/login', 'refresh');
      }
  }
   function is_login_student(){ 
      if(isset($_SESSION['student_details'])){
          return true;
      }else{
         redirect( base_url().'user/student_login', 'refresh');
      }
  }
 
 function CallAPI($method, $url, $data = false)
  {   
	  $curl = curl_init();
	  switch ($method)
	  {   
		  case "POST":
			  curl_setopt($curl, CURLOPT_POST, 1);
			  if ($data)
				  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			  break;
		  case "PUT":
			  curl_setopt($curl, CURLOPT_PUT, 1);
			  break;
		  default:
			  if ($data)
				  $url = sprintf("%s?%s", $url, http_build_query($data));
	  }
	  curl_setopt($curl, CURLOPT_HTTPHEADER, array());
	  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	  curl_setopt($curl, CURLOPT_USERPWD, "");
	  curl_setopt($curl, CURLOPT_URL, $url);
	  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	  $result = curl_exec($curl);
	  curl_close($curl);
	  return $result;
  }
  



	function getSystemInfo()
	{  
		$CI = get_instance();
		$CI->db->select('*');
		$CI->db->from('academic');
		$CI->db->where('status',1);
		$query = $CI->db->get();
		if($query->num_rows()>0)
		{
		$rr =  $query->result_array();  
       	}
		
		
	}	
	
	
	function getSystemColumn($col_name)
	{  
	     if($col_name=='CompanySession' && isset($_SESSION['SwitchSession']))
		 {
		   return $_SESSION['SwitchSession'];
		 }
		 else
		 {
		$CI = get_instance();
		$CI->db->select($col_name);
		$CI->db->from('companymaster');
		//$CI->db->where('status',1);
		$query = $CI->db->get();
		if($query->num_rows()>0)
		{
		$rr =  $query->row()->$col_name;  
       	}
		else
		{
		$rr =  'NA';
		}
		 }
		return $rr;
		
		
	}	
	
	function getActiveCompany()
	{
	   return 1;	
	}
	function getActiveSession()
	{
		return 2;
	}
	
/*	  function geneeratePdf($module, $mid, $tid) {
	  	$CI = get_instance();
	  	$template_row = getDataByid('templates',$tid,'id');
	  	$module_row = getDataByid($module,$mid,'id');
	  	$CI->load->library('Mypdf');
	  	$html = $template_row->html;
	  	//print_r($module_row);
	  	foreach ($module_row as $key => $value) {
	  		$html = str_replace('{var_'.$key.'}', $value, $html);		
	  	}

		  $CI->dompdf->load_html($html);
		  $CI->dompdf->set_paper("A4", "portrait");
		  $CI->dompdf->render();
		  $filename = "mkaTestd.pdf";
		  $path = realpath(dirname(dirname(dirname(dirname(dirname(__FILE__)))))).'/assets/images/pdf/';
		  if(file_exists($path.$filename)) {
			  unlink($path.$filename);
		  }
		  file_put_contents($path.$filename, $CI->dompdf->output());
		  return  $path.$filename;
	  }*/

	function settings(){
		$CI = get_instance();
		$CI->db->select('*');
		$CI->db->from('settingmaster');
		$query = $CI->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
			return $result;
		} else {
			return array(
				'company_name' => 'Your Company',
				'website' => 'localhost',
				'EMAIL' => 'admin@localhost.com',
				'mail_setting' => 'php_mailer'
			);
		}
	}

?>