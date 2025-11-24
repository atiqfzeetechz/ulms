<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdlpage extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
	
	
	function get_slider($limit,$start){
	
  $output = '';
  $this->db->select("*");
  $this->db->from("slider");
  $this->db->order_by("id","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Image</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->id;
           $del_url = base_url().'page/delete_slider/'.$id;
		   $edit_url = base_url().'page/edit_form/edit_slider/slider/id/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
		   
		   $file = $row->image;
		   $path = 'uploads/slider/'.$file;
		   if(!empty($file) && file_exists($path)){
		      $imgUrl = base_url().$path;  
		   }
		   else
		   {
		       $imgUrl = base_url().'uploads/no_file.png';   
		   }
		$img = "<img src='$imgUrl' style='width:80px;height:80px;' class='img-responsive img-thumbnail'>";
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$img.'</td>
	 <td>'.$delete_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
	


}

?>