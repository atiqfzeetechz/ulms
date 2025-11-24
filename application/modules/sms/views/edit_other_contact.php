<div class="row">
  <div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
              <h3> Edit Blood Doner Details</h3>
              </div>
              <div class="card-body">
                  
   <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>dailyupdate/add_other_contact/edit" id="updateGetForm">
      <input type="hidden" value="<?php echo base_url(); ?>dailyupdate/add_other_contact/edit" id="update_post_link">
     <input type="hidden" name="id" value="<?php echo $row[0]->id; ?>">
	 
                <div class="card-body">
				
				<div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row[0]->name; ?>" placeholder="Enter Name">
                   </div>
                 
                  </div>
				  
				 
				    <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile1" value="<?php echo $row[0]->mobile1; ?>" placeholder="Enter Mobile Number">
                   </div>
                 
                  </div>
				   
				   
				   <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Alt Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile2" value="<?php echo $row[0]->mobile2; ?>" placeholder="Enter Alt Mobile Number">
                   </div>
                 
                  </div>
				  
				   <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" id="mobile" name="address" value="<?php echo $row[0]->address; ?>" placeholder="Enter Address">
                   </div>
                 
                  </div>
                  				   <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Photo</label>
                    </div>
                 
                  </div>
                  <?php
                      	$File = $row[0]->profileimage;	  
                      	 $load_url = 'uploads/contact/'.$File;
        		if(!empty($File) && file_exists($load_url))
        		{ 
        	       
        		   $url = base_url().$load_url;			
        		
        			
        		}
        		else
        		  {
        		$url = base_url().'uploads/no_file.jpg';	
        		    }
        		    ?>
                  <div class="row">
                  <div class="form-group col-md-6">
                     <div class="fileinput fileinput-new" data-provides="fileinput" style="border:1px solid #dcdcdc;">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								
									<img src="<?php echo $url; ?>" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="profileimage" accept="image/*">
									</span>
									<a href="#" class="btn btn-xs btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
				</div>
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