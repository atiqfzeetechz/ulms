<?php
class Mdlhostel extends CI_Model {       
	function __construct(){            
	  	parent::__construct();
	
	}
	
  
 function get_hostler($limit,$start)
 {
	
  $output = '';
  $this->db->select("*");
  $this->db->from("hostler");
  $this->db->order_by("Id","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Name</th>
	<th>Mobile</th>
	<th>Address</th>
	<th>Status</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->Id;
           $del_url = base_url().'hostel/delete_hostelr/'.$id;
		   $edit_url = base_url().'hostel/edit_form/edit_hostler/hostler/Id/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
          if($row->Status==1)
		  {
			  $status = "<button class='btn btn-xs btn-success'>Active</button>";
		  }
		  else
		  {
			  $status = "<button class='btn btn-xs btn-danger'>Deactive</button>";  
		  }
		  
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$row->Name.'</td>
	<td>'.$row->Mobile.'</td>
	<td>'.$row->Address.'</td>
	<td>'.$status.'</td>
	 <td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 function get_customer($limit,$start)
 {
	
  $output = '';
  $this->db->select("*");
  $this->db->from("vendormaster");
  $this->db->where('CompanyId',getActiveCompany());
  $this->db->where('SessionId',getActiveSession());
  $this->db->where("Type","Customer");
  $this->db->order_by("VendorId","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Name</th>
	<th>Mobile</th>
	<th>Email</th>
	<th>State</th>
	<th>Address</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->VendorId;
           $del_url = base_url().'party/delete_vendor_details/'.$id;
		   $edit_url = base_url().'party/edit_form/edit_party/vendormaster/VendorId/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
          $stateName = $this->Mdlmaster->get_col_by_key('statemaster','StateId',$row->StateId,'StateName');
		  $cityName = $this->Mdlmaster->get_col_by_key('citymaster','CityId',$row->CityId,'CityName');
		  if($cityName!='NA')
		  {
			  $StateCity = $stateName.','.$cityName;
		  }
		  else
		  {
			   $StateCity = $stateName;
		  }
		  
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$row->VendorName.'</td>
	<td>'.$row->VendorMobile.'</td>
	<td>'.$row->VendorEmail.'</td>
	<td>'.$StateCity.'</td>
	<td>'.$row->VendorAddress.'</td>
	 <td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 
 
}
?>