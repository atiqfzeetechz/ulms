<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Master extends CI_Controller {

  function __construct() {
	 //
    parent::__construct();
	
	$this->load->model('Mdlmasters');
  
  }
   function swicth_session($Session='')
   {
	   
	   if($Session!='')
	   {
		 $is_A = $this->db->get_where('sessionmaster',array('SessionId'=>$Session));
         if($is_A->num_rows()==1)
		 {
	$this->session->set_userdata('SwitchSession',$Session); 
		echo"1";
		 }
         else
         {
echo"Unknown Session";
         }	
	   }
	   else
	   {
	echo"Error";
	   }
   }
 function session_details()
	 {
		 is_login();
		 
		    
            $title['page_title'] = 'Session Details';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'master/get_sessions/';
		   
			$this->load->view('include/header',$title);
            $this->load->view('session_details');                
            $this->load->view('include/footer',$footer);  
	 }
 function add_session_details($param1 = '', $param2 = '', $param3 = '')
  {
	  
	   if($param1=='add')
			{
			    
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('Session','Session Name','required|is_unique[sessionmaster.Session]');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			$data['Session']  = $this->input->post('Session');
			
			$reponse = $this->Mdlmaster->save_DB('sessionmaster',$data);
			
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
 function get_sessions($rowno=0){
  $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $allcount = $this->Mdlmaster->count_all('sessionmaster');

    // Get records
    $users_record = $this->Mdlmasters->get_sessionmaster($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'master/session_details/';
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
 function delete_session_details($id='')
   {
	   is_login();
	   $this->db->where('SessionId',$id);
	   $del = $this->db->delete('sessionmaster');
	   if($del)
	   {
	    echo"1";
	   }
	   else
	   {
		   echo"Failed!";
	   }
   }
  
  /////////////#######COMPANY########/////////////////
  
 function company(){
		 is_login();
		    $title['page_title'] = 'Company Master';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'master/get_company/';
		   
			$this->load->view('include/header',$title);
            $this->load->view('company');                
            $this->load->view('include/footer',$footer);  
	 }
 function add_company_details($param1 = '', $param2 = '', $param3 = ''){
	  
	   if($param1=='add')
			{
			    
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('CompanyName','Comoany Name','required|is_unique[companymaster.CompanyName]');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			$data['CompanyName']         = $this->input->post('CompanyName');
			$data['CompanyMobile']       = $this->input->post('CompanyMobile');
			$data['CompanyAltMobile']    = $this->input->post('CompanyAltMobile');
			$data['CompanyEmail']        = $this->input->post('CompanyEmail');
			$data['CompanyAddress']      = $this->input->post('CompanyAddress');
			$data['CompanyRegNo']        = $this->input->post('CompanyRegNo');
			$data['CompanyGstNo']        = $this->input->post('CompanyGstNo');
			$data['CompanyStatus']       = 1;
			
			$reponse = $this->Mdlmaster->save_DB('companymaster',$data);
			
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
 function get_company($rowno=0){
  $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $allcount = $this->Mdlmaster->count_all('companymaster');

    // Get records
    $users_record = $this->Mdlmasters->get_companymaster($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'master/company/';
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
 function delete_company_details($id=''){
	   is_login();
	   $this->db->where('CompanyId',$id);
	   $del = $this->db->delete('companymaster');
	   if($del)
	   {
	    echo"1";
	   }
	   else
	   {
		echo"Failed!";
	   }
   }
  
   /////////////#######CATEGORY########/////////////////
  
 function category()
	 {
		 is_login();
		 
		    
            $title['page_title'] = 'Category Details';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'master/get_category/';
		   
			$this->load->view('include/header',$title);
            $this->load->view('category');                
            $this->load->view('include/footer',$footer);  
	 }
 function add_category_details($param1 = '', $param2 = '', $param3 = '')
  {
	  
	   if($param1=='add')
			{
			    
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('CategoryName','Category Name','required|is_unique[categorymaster.CategoryName]');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			$data['CategoryName']  = $this->input->post('CategoryName');
			$data['CategoryStatus']  = 1;
			$data['AddedBy'] = $this->session->userdata('user_details')[0]->users_id;
            $data['Added'] = date('Y-m-d h:i:s');
			
			$reponse = $this->Mdlmaster->save_DB('categorymaster',$data);
			
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
$this->form_validation->set_rules('CategoryName','Category Name','required|is_unique[categorymaster.CategoryName]');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			$data['CategoryName']  = $this->input->post('CategoryName');
			$CategoryId  = $this->input->post('CategoryId');
			$data['EditedBy'] = $this->session->userdata('user_details')[0]->users_id;
            $data['Edited'] = date('Y-m-d h:i:s');
			
			$this->db->where('CategoryId',$CategoryId);
			$reponse = $this->db->update('categorymaster',$data);
			
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
 function get_category($rowno=0){
  $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $allcount = $this->Mdlmaster->count_all('categorymaster');

    // Get records
    $users_record = $this->Mdlmasters->get_categorymaster($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'master/category/';
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
 function delete_category_details($id='')
   {
	   is_login();
	   $this->db->where('CategoryId',$id);
	   $del = $this->db->delete('categorymaster');
	   if($del)
	   {
	    echo"1";
	   }
	   else
	   {
		   echo"Failed!";
	   }
   }
  
   ///////////////////#########CITY###########/////////////////////
 function items(){
		    is_login();
		    $title['page_title'] = 'Items Details';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'master/get_items/';
		    $page_data['Categories'] = $this->Mdlmaster->get_order_table_result('categorymaster','CategoryId','asc');
			$page_data['Units'] = $this->Mdlmaster->get_order_table_result('unitmaster','UnitId','asc');
			$page_data['Taxes'] = $this->Mdlmaster->get_order_table_result('taxmaster','TaxId','asc');
			$this->load->view('include/header',$title);
            $this->load->view('itemmaster',$page_data);                
            $this->load->view('include/footer',$footer);  
	 }
		
function add_itemmaster($param1 = '', $param2 = '', $param3 = ''){
	  
	   if($param1=='add')
			{
			    
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('CategoryId','Category Name','required');
$this->form_validation->set_rules('ItemName','Item Name','required|is_unique[itemmaster.ItemName]');
$this->form_validation->set_rules('ItemHsnCode','HSN','required|is_unique[itemmaster.ItemHsnCode]');
$this->form_validation->set_rules('Barcode','Barcode','is_unique[itemmaster.Barcode]');
$this->form_validation->set_rules('MRP','MRP','required');
$this->form_validation->set_rules('Unit','Unit','required');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			$data['CategoryId']      = $this->input->post('CategoryId');
			$data['ItemName']          = $this->input->post('ItemName');
			$data['ItemNameHindi']     = $this->input->post('ItemNameHindi');
			$data['ItemHsnCode']           = $this->input->post('ItemHsnCode');
			if($this->input->post('Barcode')!='')
			{
			$data['Barcode']       = $this->input->post('Barcode');
			}
			else
			{
			$data['Barcode']       =  $this->generateBarcode();	
			}
			$data['Tax']           = $this->input->post('tax');
			$data['ItemStatus']    = 1;
			$data['UnitId']  = $this->input->post('Unit');
			$data['MRP']  = $this->input->post('MRP');
		    $data['AddedBy'] = $this->session->userdata('user_details')[0]->users_id;
			$data['Added'] = date('Y-m-d h:i:s');
			$reponse = $this->Mdlmaster->save_DB('itemmaster',$data);
			
			if($reponse)
			{
				$ItemId = $this->db->insert_id();
				
				//add itemUni
            $Volume = $this->input->post('Volume');
			$UnitId = $this->input->post('UnitId');
			$Rate   = $this->input->post('Rate');
			for($v=0;$v<count($Volume);$v++)
			{
				if($Volume[$v]!='' && $UnitId[$v]!='' && $Rate[$v]!='')
				{
			$this->addItemUnit($ItemId,$Volume[$v],$UnitId[$v],$Rate[$v]);
			    }			
			}
            //add ItemUnit	
			
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
$ItemId = $this->input->post('ItemId');			    
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('CategoryId','Category Name','required');
$this->form_validation->set_rules('ItemName','Item Name','required|edit_uniqueallitems[itemmaster.ItemName.'.$ItemId.']');
$this->form_validation->set_rules('ItemHsnCode','HSN','required|edit_uniqueallitems[itemmaster.ItemHsnCode.'.$ItemId.']');
$this->form_validation->set_rules('Barcode','Barcode','edit_uniqueallitems[itemmaster.Barcode.'.$ItemId.']');
$this->form_validation->set_rules('MRP','MRP','required');
$this->form_validation->set_rules('Unit','Unit','required');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			$data['CategoryId']      = $this->input->post('CategoryId');
			$data['ItemName']          = $this->input->post('ItemName');
			$data['ItemNameHindi']     = $this->input->post('ItemNameHindi');
			$data['ItemHsnCode']           = $this->input->post('ItemHsnCode');
			if($this->input->post('Barcode')!='')
			{
			$data['Barcode']       = $this->input->post('Barcode');
			}
			else
			{
			$data['Barcode']       =  $this->generateBarcode();	
			}
			$data['Tax']           = $this->input->post('tax');
			$data['UnitId']  = $this->input->post('Unit');
			$data['MRP']  = $this->input->post('MRP');
		    $data['EditedBy'] = $this->session->userdata('user_details')[0]->users_id;
			$data['Edited'] = date('Y-m-d h:i:s');
			$this->db->where('ItemId',$ItemId);
			$reponse = $this->db->update('itemmaster',$data);
			
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

 function get_items($rowno=0){
  $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $allcount = $this->Mdlmaster->count_all_by_sess_com('itemmaster');

    // Get records
    $users_record = $this->Mdlmasters->get_itemmaster($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'master/items/';
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
   
   function delete_itemmaster($id='')
   {
	   is_login();
	   $this->db->where('ItemId',$id);
	   $del = $this->db->delete('itemmaster');
	   if($del)
	   {
		   $this->db->where('ItemId',$id);
	      $this->db->delete('itemunit');
	    echo"1";
	   }
	   else
	   {
		   echo"Failed!";
	   }
   }
   
 /////////////#######CATEGORY########/////////////////
  
 function units()
	 {
		 is_login();
		 
		    
            $title['page_title'] = 'Unit Details';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'master/get_unit/';
		   
			$this->load->view('include/header',$title);
            $this->load->view('units');                
            $this->load->view('include/footer',$footer);  
	 }
 function add_unit_details($param1 = '', $param2 = '', $param3 = '')
  {
	  
	   if($param1=='add')
			{
			    
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('UnitName','Unit Name','required|is_unique[unitmaster.UnitName]');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			$data['UnitName']  = $this->input->post('UnitName');
			$data['UnitStatus']  = 1;
			$data['AddedBy'] = $this->session->userdata('user_details')[0]->users_id;
            $data['Added'] = date('Y-m-d h:i:s');
			$reponse = $this->Mdlmaster->save_DB('unitmaster',$data);
			
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
$this->form_validation->set_rules('UnitName','Unit Name','required|is_unique[unitmaster.UnitName]');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			$data['UnitName']  = $this->input->post('UnitName');
			$UnitId  = $this->input->post('UnitId');
			$data['EditedBy'] = $this->session->userdata('user_details')[0]->users_id;
            $data['Edited'] = date('Y-m-d h:i:s');
			
			$this->db->where('UnitId',$UnitId);
			$reponse = $this->db->update('unitmaster',$data);
			
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
 function get_unit($rowno=0){
  $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $allcount = $this->Mdlmaster->count_all('unitmaster');

    // Get records
    $users_record = $this->Mdlmasters->get_unitmaster($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'master/units/';
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
 function delete_unit_details($id='')
   {
	   is_login();
	   $this->db->where('UnitId',$id);
	   $del = $this->db->delete('unitmaster');
	   if($del)
	   {
	    echo"1";
	   }
	   else
	   {
		   echo"Failed!";
	   }
   }
  
  /////////////#######ITEMS########/////////////////
  
  function getCatItem($cat)
  {
	  $return = $this->db->get_where('items',array('category'=>$cat));
	  if($return->num_rows()>0)
	  {
		  echo"<option value=''>Select Item</option>";
		 $res =  $return->result();
		 foreach($res as $ires){
			 echo"<option value='$ires->Id'>$ires->Name</option>";
		 }
	  }
	  else
	  {
		  echo"<option value=''>No Item Found.</option>";
	  }
  }
  

 	
function add_item_unit($param1='')
	{
		
	   if($param1=='add')
			{
			    
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('ItemId','Item Name','required');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        $ItemId = $this->input->post('ItemId');
			$Volume = $this->input->post('Volume');
			$UnitId = $this->input->post('UnitId');
			$Rate   = $this->input->post('Rate');
			for($v=0;$v<count($Volume);$v++)
			{
				if($Volume[$v]!='' && $UnitId[$v]!='' && $Rate[$v]!='')
				{
			$this->addItemUnit($ItemId,$Volume[$v],$UnitId[$v],$Rate[$v]);
			    }			
			}
		echo"1";
}
}
	}
 function addItemUnit($ItemId,$Volume,$UnitId,$Rate)
{
 $u['ItemId']	= $ItemId;
 $u['Volume']	= $Volume;
 $u['UnitId']	= $UnitId;
 $u['Rate']  	= $Rate;
 $is_A = $this->db->get_where('itemunit',array('ItemId'=>$ItemId,'Volume'=>$Volume,'UnitId'=>$UnitId));
 if($is_A->num_rows()>0)
 {  
           $Id = $is_A->row()->Id;
           $this->db->where('Id',$Id);
    return $this->db->update('itemunit',$u); 	 
 }
 else
 {
	return $this->db->insert('itemunit',$u); 
 }
}	

   function delete_itemunit_details($id='')
   {
	   is_login();
	   $this->db->where('Id',$id);
	   $del = $this->db->delete('itemunit');
	   if($del)
	   {
	    echo$id;
	   }
	   else
	   {
		echo"Failed!";
	   }
   }
  
  ///////////////////#########STATES###########/////////////////////
function state(){
		 is_login();
		 
		    
            $title['page_title'] = 'States Details';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'master/get_state/';
		   
			$this->load->view('include/header',$title);
            $this->load->view('state');                
            $this->load->view('include/footer',$footer);  
	 }
function add_state_details($param1 = '', $param2 = '', $param3 = ''){
	  
	   if($param1=='add')
			{
			    
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('StateName','State Name','required|is_unique[statemaster.StateName]');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			$data['StateName']  = $this->input->post('StateName');
			$data['StateCode']  = $this->input->post('StateCode');
			$data['StateStatus']  = 1;
			$data['AddedBy'] = $this->session->userdata('user_details')[0]->users_id;
            $data['Added'] = date('Y-m-d h:i:s');
			
			$reponse = $this->Mdlmaster->save_DB('statemaster',$data);
			
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
$this->form_validation->set_rules('StateName','State Name','required|is_unique[statemaster.StateName]');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			$data['StateName']  = $this->input->post('StateName');
			$data['EditedBy'] = $this->session->userdata('user_details')[0]->users_id;
            $data['Edited'] = date('Y-m-d h:i:s');
			$StateId  = $this->input->post('StateId');
			
			
			$this->db->where('StateId',$StateId);
			$reponse = $this->db->update('statemaster',$data);
			
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
function get_state($rowno=0){
  $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $allcount = $this->Mdlmaster->count_all('statemaster');

    // Get records
    $users_record = $this->Mdlmasters->get_statemaster($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'master/state/';
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
function delete_state_details($id='')
   {
	   is_login();
	   $this->db->where('StateId',$id);
	   $del = $this->db->delete('statemaster');
	   if($del)
	   {
	    echo"1";
	   }
	   else
	   {
		   echo"Failed!";
	   }
   }
  
   ///////////////////#########CITY###########/////////////////////
function city(){
		 is_login();
		    $title['page_title'] = 'States Details';
			$footer['table_data']   = 1;
			$footer['data_link']   = base_url().'master/get_city/';
		    $page_data['states']   = $this->Mdlmaster->get_order_table_result('statemaster','StateId','asc');
			$this->load->view('include/header',$title);
            $this->load->view('city',$page_data);                
            $this->load->view('include/footer',$footer);  
	 }
function getStateCity($StateId='')
{
 $cities = $this->Mdlmaster->getStateCity($StateId);
 if(count($cities)>0)
 {
	 foreach($cities as $city){
	echo"<option value='$city->CityId'>$city->CityName</option>";	 
	 }
 }
 else
 {
	 echo"<option value=''>no city found!</option>";
 }
}	
function add_city_details($param1 = '', $param2 = '', $param3 = ''){
	  
	   if($param1=='add')
			{
			    
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('StateId','State Name','required');
$this->form_validation->set_rules('CityName','City Name','required|is_unique[citymaster.CityName]');
if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			$data['StateId']  = $this->input->post('StateId');
			$data['CityName']  = $this->input->post('CityName');
			$data['AddedBy'] = $this->session->userdata('user_details')[0]->users_id;
            $data['Added'] = date('Y-m-d h:i:s');
			$reponse = $this->Mdlmaster->save_DB('citymaster',$data);
			
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
				$CityId  = $this->input->post('CityId');
		    
$this->form_validation->set_error_delimiters('', '');
$this->form_validation->set_rules('StateId','State Name','required');
$this->form_validation->set_rules('CityName','City Name','required|edit_uniqueallcity[citymaster.CityName.'.$CityId.']');

if ($this->form_validation->run() == FALSE) {
    echo validation_errors();
} 
else       {
	        
			$data['StateId']  = $this->input->post('StateId');
			$data['CityName']  = $this->input->post('CityName');
			
			$data['EditedBy'] = $this->session->userdata('user_details')[0]->users_id;
            $data['Edited'] = date('Y-m-d h:i:s');
			
			$this->db->where('CityId',$CityId);
			$reponse = $this->db->update('citymaster',$data);
			
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
function get_city($rowno=0){
  $this->load->library("pagination");
    // Row per page
    $rowperpage = getRowPerPage();

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $allcount = $this->Mdlmaster->count_all('citymaster');

    // Get records
    $users_record = $this->Mdlmasters->get_citymaster($rowperpage,$rowno);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'master/city/';
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

function delete_city_details($id=''){
	   is_login();
	   $this->db->where('CityId',$id);
	   $del = $this->db->delete('citymaster');
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
  
   
   public function generateBarcode(){
        
        $pw = rand(00000000,99999999);
		$exist = $this->db->get_where('itemmaster',array('Barcode'=>$pw));
		if($exist->num_rows()>0)
		{
		$results = generateBarcode();
		}
		else
		{
		$results = $pw;
		return $results;
		}
		
    }
  
  function stock()
  {
            is_login();
            $title['page_title'] = 'Item Stock Details';
			$page_data['items']   = $this->Mdlmaster->get_order_table_result('itemmaster','ItemId','asc');
			$this->load->view('include/header',$title);
            $this->load->view('item_stock',$page_data);                
            $this->load->view('include/footer'); 
	  
  }
  function add_itemstock()
  {
	is_login();
	
	        $ItemId = $this->input->post('ItemId');
			$OpeningStock = $this->input->post('OpeningStock');
			$CompanyId = getActiveCompany();
			for($v=0;$v<count($ItemId);$v++)
			{
				if($OpeningStock[$v]!='' && $OpeningStock[$v]>'0')
				{
			  
 $u['ItemId']	    = $ItemId[$v];
 $u['OpeningStock']	= $OpeningStock[$v];
 $u['CompanyId']	= $CompanyId;
 $is_A = $this->db->get_where('companystock',array('ItemId'=>$ItemId[$v],'CompanyId'=>$CompanyId));
 if($is_A->num_rows()>0)
 {  
           $Id = $is_A->row()->CompanyStockId;
           $this->db->where('CompanyStockId',$Id);
    $ins =  $this->db->update('companystock',$u); 	 
 }
 else
 {
	$ins =  $this->db->insert('companystock',$u); 
 }
 
 
			    }
else
{
	$ins = '';
}	
			}
              
			  if($ins)
			  {
				  echo"1";
			  }
			  else
			  {
				  echo"Error";
			  }
				  
  }
}


?>