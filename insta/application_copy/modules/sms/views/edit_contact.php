<div class="row">
  <div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
              <h3> Edit News</h3>
              </div>
              <div class="card-body">
                  
   <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>sms/add_contact/edit" id="updateGetForm">
      <input type="hidden" value="<?php echo base_url(); ?>sms/add_contact/edit" id="update_post_link">
     <input type="hidden" name="id" value="<?php echo $row[0]->id; ?>">
	 
               
                 <div class="card-body">
				   <div class="row">
                   <?php  $this->db->select('id,name');
                         $this->db->from('group');
                        $this->db->where('status','1');
                        $Group = $this->db->get()->result(); ?>
                             <div class="form-group col-md-6">
                                <label for="" class="from-label">Group Name</label>
                                <select name="groupid" class="form-control">
                                     <option value=""> Select Group Name</option>
                                     <?php foreach($Group as $account ){ ?>
                               <option value="<?php echo $account->id;?>"<?php if($row[0]->groupid==$account->id){ echo'selected'; }?>><?php echo $account->name;?></option>
                            <?php  } ?>
                        </select>
                             
                          </div>
                  
                  <div class="form-group col-md-6">
                    <label for="from-label">Name</label>
                    <input type="text" class="form-control"name="name" value="<?php echo $row[0]->name; ?>">
                   </div>
			
                 
                </div>
                 <div class="row">
                  <div class="form-group col-md-6">
                    <label for="from-label">Mobile</label>
                    <input type="number" class="form-control" name="mobile" value="<?php echo $row[0]->mobile; ?>">
                   </div>
                  
                 <div class="form-group col-md-6">
                    <label for="from-label">Alt Mobile</label>
                    <input type="number" class="form-control" name="alt_mobile" value="<?php echo $row[0]->alt_mobile; ?>">
                   </div>
                 
                 
                </div>
                 <div class="row">
                  <div class="form-group col-md-6">
                    <label for="from-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $row[0]->email; ?>">
                   </div>
                  
                  
                	 
                <div class="col-md-6">
                                <label for="" class="form-label">Status</label>
                                
                                <select name="status" class="form-control input-sm">
                                    <option value="">Status</option>
                                    <option value="1" <?php if($row[0]->status=='1'){ echo'selected'; } ?>>Active</option>
                                    <option value="2" <?php if($row[0]->status=='2'){ echo'selected'; } ?>>Deactive</option
                                    ></select>
                                
                                
                          </div>
				   
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
			  
			  
                      
                
                
                
              </div>
              <!-- /.card -->
            </div>
          </div>
        
</div>   


<script>
  $("#updateGetForm").on('submit',(function(e) {

      $(".loading").show();
var post_link = $("#update_post_link").val();
	  
e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(msg){
     
	  if(msg==1)
            {
 
     $(".loading").hide();
      toastr.success('Success!');
    
        var page_no = 1; 
	 load_country_data(page_no); 
       
     
        
             }
            else
            {
              
            $(".loading").hide();
           toastr.error(msg);
                
                
                
            }
	  
	},
	error: function(){} 	        
});
}));

  </script>
  
  <script>
  $('.textarea').summernote('code');
  </script>