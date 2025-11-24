<?php
class Mdlweb extends CI_Model {       
	function __construct(){            
	  	parent::__construct();
	
	}
	
 
 function get_rule($limit,$start)
 {
	
  $output = '';
  $this->db->select("*");
  $this->db->from("rule");
  $this->db->order_by("RuleId","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Title</th>
	<th>Status</th>
	<th>Added</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->RuleId;
           $del_url = base_url().'dailyupdate/delete_rule/'.$id;
		   $edit_url = base_url().'dailyupdate/edit_form/edit_rule/rule/RuleId/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
		   $Status = $row->Status;
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
	<td>'.$row->Title.'</td>
	<td>'.$status.'</td>
	<td>'.date('d-M-Y',strtotime($row->Added)).'</td>
	 <td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 

function get_blood_doner($limit,$start)
 {
	
  $output = '';
  $this->db->select("*");
  $this->db->from("blood_doner");
  $this->db->order_by("groupId",'asc');
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
	<th>Blood Group</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->id;
           $del_url = base_url().'dailyupdate/delete_blood_doner/'.$id;
		   $edit_url = base_url().'dailyupdate/edit_form/edit_blood_doner/blood_doner/id/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
		 
		
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$row->name.'</td>
    <td>'.$row->mobile.'</td>
	<td>'.$row->groupId.'</td>	
	<td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 	
   
  
  function get_other_contact($limit,$start)
 {
	
  $output = '';
  $this->db->select("*");
  $this->db->from("contactlist");
  $this->db->order_by("name",'asc');
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
	<th>Alt. Mobile</th>
	<th>Address</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->id;
           $del_url = base_url().'dailyupdate/delete_other_contact/'.$id;
		   $edit_url = base_url().'dailyupdate/edit_form/edit_other_contact/contactlist/id/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
		 
		
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.$row->name.'</td>
    <td>'.$row->mobile1.'</td>
	<td>'.$row->mobile2.'</td>
	<td>'.$row->address.'</td>
	<td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 	
  
  
 function get_activity($limit,$start)
 {
	
  $output = '';
  $this->db->select("*");
  $this->db->from("activity");
  $this->db->order_by("Id","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Title</th>
	<th>Status</th>
	<th>Added</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->Id;
           $del_url = base_url().'dailyupdate/delete_activity/'.$id;
		   $edit_url = base_url().'dailyupdate/edit_form/edit_activity/activity/Id/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
		   $Status = $row->Status;
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
	<td>'.$row->Title.'</td>
	<td>'.$status.'</td>
	<td>'.date('d-M-Y',strtotime($row->Added)).'</td>
	 <td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 function get_news($limit,$start)
 {
	
  $output = '';
  $this->db->select("*");
  $this->db->from("news");
  $this->db->order_by("NewsId","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Date</th>
	<th>News Title</th>
	<th>Place</th>
	<th>State</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->NewsId;
           $del_url = base_url().'dailyupdate/delete_news/'.$id;
		   $edit_url = base_url().'dailyupdate/edit_form/edit_news/news/NewsId/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
           if( $row->Status ==1){
			   $status = "<span class='btn btn-xs btn-success'>Active</span>";
		   }
		   else
		   {
			   $status = "<span class='btn btn-xs btn-danger'>Deactive</span>";
		   }
		  
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
	<td>'.date('d-M-Y',strtotime($row->Date)).'</td>
	<td>'.$row->NewsTitle.'</td>
	<td>'.$row->Place.'</td>
	<td>'. $status.'</td>
	 <td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 function get_greeting($limit,$start)
 {
	
  $output = '';
  $this->db->select("*");
  $this->db->from("greeting");
  $this->db->order_by("Id","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Title</th>
	<th>Status</th>
	<th>Added</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->Id;
           $del_url = base_url().'dailyupdate/delete_greeting/'.$id;
		   $edit_url = base_url().'dailyupdate/edit_form/edit_greeting/greeting/Id/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
		   $Status = $row->Status;
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
	<td>'.$row->Title.'</td>
	<td>'.$status.'</td>
	<td>'.date('d-M-Y',strtotime($row->Added)).'</td>
	 <td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 function get_message($limit,$start)
 {
	
  $output = '';
  $this->db->select("*");
  $this->db->from("message");
  $this->db->order_by("Id","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Title</th>
	<th>Status</th>
	<th>Added</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->Id;
           $del_url = base_url().'dailyupdate/delete_message/'.$id;
		   $edit_url = base_url().'dailyupdate/edit_form/edit_message/message/Id/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
		   $Status = $row->Status;
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
	<td>'.$row->Title.'</td>
	<td>'.$status.'</td>
	<td>'.date('d-M-Y',strtotime($row->Added)).'</td>
	 <td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 
 function get_image_category($limit,$start){
	
  $output = '';
  $this->db->select("*");
  $this->db->from("imagecategory");
  $this->db->order_by("id","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
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
           $id = $row->id;
           $del_url = base_url().'dailyupdate/delete_image_category/'.$id;
		   $edit_url = base_url().'dailyupdate/edit_form/edit_image_category/imagecategory/id/'.$id;
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
 
 function get_image_gellery($limit,$start){
	
  $output = '';
  $this->db->select("*");
  $this->db->from("imagegellery");
  $this->db->order_by("category","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
	<th>Category Name</th>
	<th>Image</th>
	<th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->id;
           $del_url = base_url().'dailyupdate/delete_image_gellery/'.$id;
		   $edit_url = base_url().'dailyupdate/edit_form/edit_image_category/imagecategory/id/'.$id;
		   $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
		   
		   $catName = $this->Mdlmaster->get_col_by_key('imagecategory','id',$row->category,'name');
		   $file = $row->image;
		   $path = 'uploads/image_gellery/'.$file;
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
	<td>'.$catName.'</td>
	<td>'.$img.'</td>
	 <td>'.$delete_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 
 function getNews($limit,$start)
 {
	
  $output = '';
  $this->db->select("*");
  $this->db->from("news");
  $this->db->order_by("NewsId","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  
  
  foreach($query as $row)
  {
           $id = $row->NewsId;
           
            $file = $row->Image1;
		   $path = 'uploads/news/'.$file;
		   if(!empty($file) && file_exists($path)){
		      $imgUrl = base_url().$path;  
		   }
		   else
		   {
		       $imgUrl = base_url().'uploads/no_file.png';   
		   }
		   
		   
           $string = strip_tags($row->Text);
		  $string = strip_tags($string);
if (strlen($string) > 500) {

    // truncate string
    $stringCut = substr($string, 0, 500);
    $endPoint = strrpos($stringCut, ' ');
   $urlSingle = base_url().'web/single_news/'.$id;
   
    //if the string doesn't contain any space then it will cut without word basis.
    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $string .= "... <a href='$urlSingle'>Read More</a>";
}
   $output .= '  <article class="entry" data-aos="fade-up">

              <div class="entry-img">
                <img src="'.$imgUrl.'" alt="" class="img-fluid" style="max-height:200px;">
              </div>
              <h2 class="entry-title">
                <a href="blog-single.html">'.$row->NewsTitle.'</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">'.$row->Place.'</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">'.date('d-M-Y',strtotime($row->Date)).'</time></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                 '.$string.'
                 </p>
                
              </div>

            </article>
            
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 function mdlmore_news($id)
 {
    $this->db->select("*");
     $this->db->from("news");
    $this->db->where('newsid',$id);
    return $query =  $this->db->get()->result();
 
 }
 function mdlmore_activity($id)
 {
    $this->db->select("*");
     $this->db->from("activity");
    $this->db->where('id',$id);
    return $query =  $this->db->get()->result();
 
 }
 
 function getfacilities($limit,$start)
 {
	
  $output = '';
  $this->db->select("*");
  $this->db->from("activity");
  $this->db->order_by("id","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  
  
  foreach($query as $row)
  {
           $id = $row->Id;
           
            $file = $row->Image;
		   $path = 'uploads/activity/'.$file;
		   if(!empty($file) && file_exists($path)){
		      $imgUrl = base_url().$path;  
		   }
		   else
		   {
		       $imgUrl = base_url().'uploads/no_file.png';   
		   }
		   
		  $urlSingle = base_url().'web/single_facility/'.$id;
		  
		  
           $string = strip_tags($row->Text);
		  $string = strip_tags($string);
if (strlen($string) > 500) {

    // truncate string
    $stringCut = substr($string, 0, 500);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $string .= "... <a href='$urlSingle'>Read More</a>";
}
   $output .= '  <article class="entry" data-aos="fade-up">

              <div class="entry-img">
                <img src="'.$imgUrl.'" alt="" class="img-fluid" style="max-height:200px;">
              </div>

              <h2 class="entry-title">
                <a href="'.$urlSingle.'">'.$row->Title.'</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">'.date('d-M-Y',strtotime($row->Added)).'</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                 '.$string.'
                 </p>
                
              </div>

            </article>
            
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 

}
?>