<div class="row">
  <div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
              <h3> Edit Blood Doner Details</h3>
              </div>
              <div class="card-body">
                  
   <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>dailyupdate/add_blood_doner/edit" id="updateGetForm">
      <input type="hidden" value="<?php echo base_url(); ?>dailyupdate/add_blood_doner/edit" id="update_post_link">
     <input type="hidden" name="id" value="<?php echo $row[0]->id; ?>">
	 
                <div class="card-body">
				
				<div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row[0]->name; ?>" placeholder="Enter Name">
                   </div>
                 
                  </div>
				  
				  <div class="row">
				  <?php $bloodgroups = $this->db->get('bloodgroup')->result(); ?>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Blood Group</label>
                    <select class="form-control" name="groupId">
					<option>Select</option>
					<?php foreach($bloodgroups as $bg){ ?> 
					<option value="<?php echo$bg->BloodGroup; ?>" <?php if($bg->BloodGroup==$row[0]->groupId){ echo'selected'; }?>><?php echo$bg->BloodGroup; ?></option>
					<?php } ?>
					</select>
                   </div>
                 
                  </div>
				   
				   
				   
				   <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $row[0]->mobile; ?>" placeholder="Enter Mobile Number">
                   </div>
                 
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