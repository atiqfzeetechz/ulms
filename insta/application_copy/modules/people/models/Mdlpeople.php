<?php
class Mdlpeople extends CI_Model {       
	function __construct(){            
	  	parent::__construct();
	
	}
	
  
 function get_our_pride($limit,$start)
 {
	
  $output = '';
  $this->db->select("*");
  $this->db->from("ourpride");
  $this->db->order_by("id","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Name</th>
	<th>Post</th>
	<th>Mobile</th>
	<th>Address</th>
	<th>About</th>
	<th>Photo</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->id;
           $del_url = base_url().'people/delete_our_pride/'.$id;
		   $edit_url = base_url().'people/edit_form/edit_our_pride/ourpride/id/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
		   $File = $row->photo;
		   
		if(!empty($File))
		{ 
	        $load_url = 'uploads/our_pride/'.$File;
			if(file_exists($load_url))
			{
		   $url = base_url().$load_url;			
			}
			else
			{
			$url = base_url().'uploads/no_file.jpg';		
			}
		}
		else
		{
		$url = base_url().'uploads/no_file.jpg';	
		}
		
         $img = "<img src='$url' style='width:100px;height:100px;'>";
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$row->name.'</td>
	<td>'.$row->post.'</td>
	<td>'.$row->mobile.'</td>
	<td>'.$row->address.'</td>
	<td>'.$row->about.'</td>
	<td>'.$img.'</td>
	 <td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
  function get_posts($limit,$start)
 {
	
  $output = '';
  $this->db->select("*");
  $this->db->from("posts");
  $this->db->order_by("id","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Name</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->id;
           $del_url = base_url().'people/delete_posts/'.$id;
		   $edit_url = base_url().'people/edit_form/edit_post/posts/id/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
		 
		
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$row->name.'</td>

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