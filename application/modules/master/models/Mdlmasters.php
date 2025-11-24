<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdlmasters extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
	
	
	
function get_sessionmaster($limit,$start)
 {
	
  $output = '';
  $query = $this->Mdlmaster->get_order_table_result('sessionmaster','SessionId','asc',$limit,$start);	
  
  
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Session Name</th>
	</tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->SessionId;
           $del_url = base_url().'master/delete_session_details/'.$id;
		   $edit_url = base_url().'master/edit_form/edit_class/classmaster/ClassId/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
          
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$row->Session.'</td>
	
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 function get_companymaster($limit,$start)
 {
	
  $output = '';
  $query = $this->Mdlmaster->get_order_table_result('companymaster','CompanyId','asc',$limit,$start);	
  

  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Company Name</th>
	<th>Mobile</th>
	<th>Alt Mobile</th>
	<th>Email</th>
	<th>Address</th>
	<th>GSTIN</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->CompanyId;
           $del_url  = base_url().'master/delete_company_details/'.$id;
		   $edit_url = base_url().'master/edit_form/edit_class/classmaster/ClassId/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
          if(getActiveCompany()==$id)
		  {
			$delete_link = '';  
		  }
		  else
		  {
			$delete_link = $delete_link;  
		  }
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$row->CompanyName.'</td>
	<td>'.$row->CompanyMobile.'</td>
	<td>'.$row->CompanyAltMobile.'</td>
	<td>'.$row->CompanyEmail.'</td>
	<td>'.$row->CompanyAddress.'</td>
	<td>'.$row->CompanyGstNo.'</td>
	<td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 
  
 function get_categorymaster($limit,$start)
 {
	
  $output = '';
  $query = $this->Mdlmaster->get_order_table_result('categorymaster','CategoryId','asc',$limit,$start);	
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Category Name</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->CategoryId;
           $del_url = base_url().'master/delete_category_details/'.$id;
		   $edit_url = base_url().'master/edit_form/category_Edit/categorymaster/CategoryId/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
          
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$row->CategoryName.'</td>
	 <td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 
 function get_unitmaster($limit,$start)
 {
	
  $output = '';
  $query = $this->Mdlmaster->get_order_table_result('unitmaster','UnitId','asc',$limit,$start);	
  
  if($start==0)
  {
      $start = 1;
  }
  else
  {
      $start = $start;
  }
  $sr = $start;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Unit Name</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->UnitId;
           $del_url = base_url().'master/delete_unit_details/'.$id;
		   $edit_url = base_url().'master/edit_form/unit_edit/unitmaster/UnitId/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
          
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$row->UnitName.'</td>
	 <td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 
 
 
 function get_itemmaster($limit,$start)
 {
	
	//getActiveCompany();
	//getActiveSession();
  $output = '';
  //$query = $this->Mdlmaster->get_order_table_result('itemmaster','ItemId','asc',$limit,$start);	
  	
  $output = '';
  $this->db->select("*");
  $this->db->from("itemmaster");
  $this->db->order_by("ItemId","DESC");
  //$this->db->where('CompanyId',getActiveCompany());
  //$this->db->where('SessionId',getActiveSession());
  $this->db->limit($limit,$start);
  $query = $this->db->get()->result();
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Category</th>
	<th>Item Name</th>
	<th>HSN Code</th>
	<th>MRP</th>
	<th>Tax</th>
	<th>Barcode</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->ItemId;
           $del_url = base_url().'master/delete_itemmaster/'.$id;
		   $edit_url = base_url().'master/edit_form/itemmaster_edit/itemmaster/ItemId/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></i></a>";
           $CategoryName = $this->Mdlmaster->get_col_by_key('categorymaster','CategoryId',$row->CategoryId,'CategoryName');
		    $TaxName = $this->Mdlmaster->get_col_by_key('taxmaster','TaxId',$row->Tax,'TaxName');
		   $TaxPercent = $this->Mdlmaster->get_col_by_key('taxmaster','TaxId',$row->Tax,'TaxPercentage');
		   $UnitName = $this->Mdlmaster->get_col_by_key('unitmaster','UnitId',$row->UnitId,'UnitName');
		   $IsUnits = $this->db->get_where('itemunit',array('ItemId'=>$id));
		   if($IsUnits->num_rows()>0)
		   {
			   $chart_url = base_url().'master/edit_form/priceChart/itemunit/ItemId/'.$id;
		       $PriceChart  = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='show_$id'  name='$chart_url' >More</a>";
		   }
		   else
		   {
			   $chart_url = base_url().'master/edit_form/priceChart/itemunit/ItemId/'.$id;
		       $PriceChart  = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='show_$id'  name='$chart_url' >More</a>";
		   }
		   
		   
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$CategoryName.'</td>
	<td>'.$row->ItemName.'</td>
	<td>'.$row->ItemHsnCode.'</td>
	<td>'.$row->MRP.' '.$UnitName.' '.$PriceChart.'</td>
	<td>'.$TaxName.' '.$TaxPercent.'%</td>
	<td>'.$row->Barcode.'</td>
	<td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 
  function get_statemaster($limit,$start)
 {
	
  $output = '';
  $query = $this->Mdlmaster->get_order_table_result('statemaster','StateId','asc',$limit,$start);	
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>State Name</th>
	<th>State Code</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->StateId;
           $del_url = base_url().'master/delete_state_details/'.$id;
		   $edit_url = base_url().'master/edit_form/state_edit/statemaster/StateId/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
          
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$row->StateName.'</td>
	<td>'.$row->StateCode.'</td>
	<td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 
  function get_citymaster($limit,$start)
 {
	
  $output = '';
  $query = $this->Mdlmaster->get_order_table_result('citymaster','StateId','asc',$limit,$start);	
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>State Name</th>
	<th>City Name</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->CityId;
           $del_url = base_url().'master/delete_city_details/'.$id;
		   $edit_url = base_url().'master/edit_form/city_edit/citymaster/CityId/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
           $StateName = $this->Mdlmaster->get_col_by_key('statemaster','StateId',$row->StateId,'StateName');
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$StateName.'</td>
	<td>'.$row->CityName.'</td>
	<td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 

}

?>