<?php
class Mdldailyupdate extends CI_Model {       
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
 

function get_message_history($limit,$start,$filters = [])
 {
    
  $output = '';
  $this->db->select("*");
  $this->db->from("message_history");
  if (!empty($filters['number'])) {
    $this->db->where('number', $filters['number']);
  }
  if (!empty($filters['status'])) {
    $this->db->where('status', $filters['status']);
  }
  if (!empty($filters['message'])) {
    $this->db->like('message', $filters['message']);
  }
  $this->db->order_by("id",'asc');
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
    <th>Phone Number</th>
    <th>Date</th>
    <th>Message</th>
    <th>Status</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->number.'</td>
    <td>'.$row->date.'</td>
    <td>'.$row->message.'</td>  
    <td>'.$row->status.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
    
   
  
   
  function getEnquiry($limit,$start)
 {
    
  $output = '';
  $this->db->select("*");
  $this->db->from("contact_us");
  $this->db->order_by("added",'desc');
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
    <th>Date</th>
    <th>Name</th>
    <th>Mobile</th>
    <th>Address</th>
    <th>Message</th>
    <th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->id;
           $del_url = base_url().'dailyupdate/deleteEnquiry/'.$id;
           $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
        
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.date('d-M-Y h:i A',strtotime($row->added)).'</td>
    <td>'.$row->name.'</td>
    <td>'.$row->mobile.'</td>
    <td>'.$row->address.'</td>
    <td>'.$row->message.'</td>
    <td>'.$delete_link.'</td>
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
    <th>Photo</th>
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
            $file = $row->profileimage;
           $path = 'uploads/contact/'.$file;
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
    <td>'.$row->name.'</td>
    <td>'.$row->mobile1.'</td>
    <td>'.$row->mobile2.'</td>
    <td>'.$row->address.'</td>
    <td>'.$img.'</td>
    
    
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
 function get_savidhan($limit,$start)
 {
    
  $output = '';
  $this->db->select("*");
  $this->db->from("savidhan");
  $this->db->order_by("id","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
    <th>Title</th>
    <th>Photo</th>
    <th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->id;
           $del_url = base_url().'dailyupdate/delete_savidhan/'.$id;
           $edit_url = base_url().'dailyupdate/edit_form/edit_savidhan/savidhan/id/'.$id;
           $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
            $file = $row->file;
           $path = 'uploads/savidhan/'.$file;
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
    <td>'.$row->title.'</td>
        <td>'.$img.'</td>
     <td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 function get_accounting($limit,$start)
 {
    
  $output = '';
  $this->db->select("*");
  $this->db->from("accounting");
  $this->db->order_by("id","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
    <th>Title</th>
    <th>Date</th>
    <th>Income</th>
    <th>Expense</th>
    <th>Details</th>
    <th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
   
  foreach($query as $row)
  {
           $id = $row->id;
           $del_url = base_url().'dailyupdate/delete_accounting/'.$id;
           $edit_url = base_url().'dailyupdate/edit_form/edit_accounting/accounting/id/'.$id;
           $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
            
          
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->title.'</td>
    <td>'.$row->Date.'</td>
    <td>'.$row->income.'</td>
    <td>'.$row->expense.'</td>
    <td>'.$row->details.'</td>
     <td>'.$delete_link.' '.$edit_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 
 function get_jobupdate($limit,$start)
 {
    
  $output = '';
  $this->db->select("*");
  $this->db->from("jobupdate");
  $this->db->order_by("id","desc");
  $this->db->limit($limit,$start);
  $query =  $this->db->get()->result();
  
 
  $sr = $start+1;
  
    $output .='
    <table class="table table-bordered" id="datatable1" style="width:100%;overflow:auto;">
   <thead>
   <tr>
    <th>Sr. No.</th>
    <th>Title</th>
    <th>Place</th>
    <th>Post</th>
    <th>Description</th>
    <th>Date</th>
    <th>Last Date</th>
    <th>Photo1</th>
    <th>Photo2</th
    <th>Added</th>
    <th>Option</th>
   </tr>
   </thead>
   <tbody>
   
   ';
  foreach($query as $row)
  {
           $id = $row->id;
           $del_url = base_url().'dailyupdate/delete_jobupdate/'.$id;
           $edit_url = base_url().'dailyupdate/edit_form/edit_jobupdate/jobupdate/id/'.$id;
           $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
            
               $file = $row->file;
           $path = 'uploads/jobupdate/'.$file;
           if(!empty($file) && file_exists($path)){
              $imgUrl = base_url().$path;  
           }
           else
           {
               $imgUrl = base_url().'uploads/no_file.png';   
           }
        $img = "<img src='$imgUrl' style='width:80px;height:80px;' class='img-responsive img-thumbnail'>";
        
        
         $file2 = $row->file2;
           $path2 = 'uploads/jobupdate/'.$file2;
           if(!empty($file2) && file_exists($path2)){
              $imgUrl2 = base_url().$path2;  
           }
           else
           {
               $imgUrl2 = base_url().'uploads/no_file.png';   
           }
        $img2 = "<img src='$imgUrl2' style='width:80px;height:80px;' class='img-responsive img-thumbnail'>";
          
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$row->title.'</td>
    <td>'.$row->place.'</td>
    <td>'.$row->post.'</td>
    <td>'.$row->description.'</td>
    <td>'.$row->Date.'</td>
    <td>'.$row->lastdate.'</td>
    <td>'.$img.'</td>
    <td>'.$img2.'</td>
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
           $del_url = base_url().'dailyupdate/delete_image_gellery/'.$id;
           $edit_url = base_url().'dailyupdate/edit_form/edit_image_category/imagecategory/id/'.$id;
           $delete_link = "<a href='javascript:void(0)' onclick='return delete_me(this.id);' id='$del_url'><i class='fa fa-trash'></i></a>";
           $edit_link = "<a href='javascript:void(0)' onclick='edit_me(this.id);'  id='edit_$id'  name='$edit_url' ><i class='fa fa-edit'></a>";
           
           $file = $row->image;
           $path = 'uploads/image_gellery/'.$file;
           /*if(!empty($file) && file_exists($path)){
              $imgUrl = base_url().$path;  
           }
           else
           {
               $imgUrl = base_url().'uploads/no_file.png';   
           }
        $img = "<img src='$imgUrl' style='width:80px;height:80px;' class='img-responsive img-thumbnail'>
        */
    if(!empty($file) && file_exists($path)) {
    $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
    
    // Check if the file is an image
    if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
        $imgUrl = base_url().$path;
        $media = "<img src='$imgUrl' style='width:80px;height:80px;' class='img-responsive img-thumbnail'>";
    }
    // Check if the file is a video
    elseif (in_array($fileExtension, ['mp4', 'avi', 'mov', 'mkv'])) {
        $videoUrl = base_url().$path;
        $media = "<video width='80' height='80' controls>
                    <source src='$videoUrl' type='video/$fileExtension'>
                    Your browser does not support the video tag.
                  </video>";
    } else {
        $media = "<img src='".base_url()."uploads/no_file.png' style='width:80px;height:80px;' class='img-responsive img-thumbnail'>";
    }
} else {
    $media = "<img src='".base_url()."uploads/no_file.png' style='width:80px;height:80px;' class='img-responsive img-thumbnail'>";
}
        
   $output .= '
   <tr>
    <td>'.$sr++.'</td>
    <td>'.$media.'</td>
     <td>'.$delete_link.'</td>
   </tr>
   ';
  }
  
  $output .= '</tbody></table>';
  return $output;
 }
 

}
?>