<?php
class Mdlsms extends CI_Model {       
	function __construct(){            
	  	parent::__construct();
	
	}
 function get_group($limit,$start,$filters = [])
 {
	
  $output = '';
  $this->db->select("*");
  $this->db->from("group");
  if (!empty($filters['name'])) {
    $this->db->where('name', $filters['name']);
  }
  if (!empty($filters['status'])) {
    $this->db->where('status', $filters['status']);
  }
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
	<th>Status</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->id;
           $del_url = base_url().'sms/delete_group/'.$id;
		   $edit_url = base_url().'sms/edit_form/edit_groups/group/id/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
		   $Status = $row->status;
		   if( $Status ==1){
			   $status = "<span class='btn btn-xs btn-success'>Active</span>";
		   }
		   else
		   {
			   $status = "<span class='btn btn-xs btn-danger'>Deactive</span>";
		   }
		   
		
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$row->name.'</td>
	<td>'.$status.'</td>
	 <td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
function get_contact($limit,$start, $filters = [])
 {
	
  $output = '';
  $this->db->select("*");
  $this->db->from("contact");
  if (!empty($filters['name'])) {
    $this->db->where('name', $filters['name']);
  }
  if (!empty($filters['mobile'])) {
    $this->db->where('mobile', $filters['mobile']);
  }
  if (!empty($filters['groupid'])) {
    $this->db->where('groupid', $filters['groupid']);
  }
  if (!empty($filters['status'])) {
    $this->db->where('status', $filters['status']);
  }
  $this->db->order_by("id","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Group Name</th>
	<th>Name</th>
	<th>Mobile</th>
	<th>Status</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->id;
           $del_url = base_url().'sms/delete_contact/'.$id;
		   $edit_url = base_url().'sms/edit_form/edit_contact/contact/id/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
		   $Status = $row->status;
		   if( $Status ==1){
			   $status = "<span class='btn btn-xs btn-success'>Active</span>";
		   }
		   else
		   {
			   $status = "<span class='btn btn-xs btn-danger'>Deactive</span>";
		   }
		   
		
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$this->Mdlmaster->get_col_by_key('group','id',$row->groupid,'name').'</td>
	<td>'.$row->name.'</td>
	<td>'.$row->mobile.'</td>

	<td>'.$status.'</td>
	 <td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
}
?>