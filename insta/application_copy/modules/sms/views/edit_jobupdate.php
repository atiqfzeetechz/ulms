<div class="row">
  <div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
              <h3> Edit Jobupdate</h3>
              </div>
              <div class="card-body">
                  
   <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>dailyupdate/add_jobupdate/edit" id="updateGetForm">
      <input type="hidden" value="<?php echo base_url(); ?>dailyupdate/add_jobupdate/edit" id="update_post_link">
     <input type="hidden" name="id" value="<?php echo $row[0]->id; ?>">
	 
                <div class="card-body">
				<div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="jobupdatetitle" name="jobupdatetitle" value="<?php echo $row[0]->title; ?>" placeholder="Enter Title">
                   </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Place</label>
                    <input type="text" class="form-control" id="place" name="place" value="<?php echo $row[0]->place; ?>" placeholder="Enter Place">
                   </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Post</label>
                    <input type="text" class="form-control" id="post" name="post" value="<?php echo $row[0]->post; ?>" placeholder="Enter Post">
                   </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="<?php echo $row[0]->description; ?>" placeholder="Enter Description">
                   </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" class="form-control" id="Date" name="Date" value="<?php echo $row[0]->Date; ?>" placeholder="Enter Date">
                   </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Last Date</label>
                    <input type="date" class="form-control" id="lastdate" name="lastdate" value="<?php echo $row[0]->lastdate; ?>" placeholder="Enter Last Date">
                   </div>
                  </div>
				  <div class="row">
                  
				  <?php 
				 $File1 = $row[0]->file;	   
		if(!empty($File1))
		{ 
	        $load_url1 = 'uploads/jobupdate/'.$File1;
			if(file_exists($load_url1))
			{
		   $url1 = base_url().$load_url1;			
			}
			else
			{
			$url1 = base_url().'uploads/no_file.jpg';		
			}
		}
		else
		{
		$url1 = base_url().'uploads/no_file.jpg';	
		}
		
				 ?>
				 
				 
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Image1</label><br>
                 
<div class="fileinput fileinput-new" data-provides="fileinput" style="border:1px solid #dcdcdc;">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								
									<img src="<?php echo $url1; ?>" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="Image1" accept="image/*">
									</span>
									<a href="#" class="btn btn-xs btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
				</div>

				</div>
				
			<?php 
				 $File2 = $row[0]->file2;	   
		if(!empty($File2))
		{ 
	        $load_url2 = 'uploads/jobupdate/'.$File2;
			if(file_exists($load_url2))
			{
		   $url2 = base_url().$load_url2;			
			}
			else
			{
			$url2 = base_url().'uploads/no_file.jpg';		
			}
		}
		else
		{
		$url2 = base_url().'uploads/no_file.jpg';	
		}
		
				 ?>
				 
				 
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Image2</label><br>
                 
<div class="fileinput fileinput-new" data-provides="fileinput" style="border:1px solid #dcdcdc;">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								
									<img src="<?php echo $url2; ?>" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="Image2" accept="image/*">
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