<div class="row">
  <div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
              <h3> Edit News</h3>
              </div>
              <div class="card-body">
                  
   <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>dailyupdate/add_news/edit" id="updateGetForm">
      <input type="hidden" value="<?php echo base_url(); ?>dailyupdate/add_news/edit" id="update_post_link">
     <input type="hidden" name="NewsId" value="<?php echo $row[0]->NewsId; ?>">
	 
                <div class="card-body">
				<div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">News Title</label>
                    <input type="text" class="form-control" id="NewsTitle" name="NewsTitle" value="<?php echo $row[0]->NewsTitle; ?>" placeholder="Enter Title">
                   </div>
                  </div>
				   <div class="row">
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="text" class="form-control" id="Date" name="Date" value="<?php echo $row[0]->Date; ?>">
                   </div>
				   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Place</label>
                    <input type="text" class="form-control" id="Title" name="Place" value="<?php echo $row[0]->Place; ?>" placeholder="Enter Place">
                   </div>
				   
				   
                  </div>
				  	<div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Details</label>
                  <textarea class="textarea" name="Text" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row[0]->Text; ?></textarea> </div>
                 
                  </div>
				  
				   
				  <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Status</label>
                    <input type="radio"  name="Status" value="1" <?php if($row[0]->Status==1){ echo'checked'; }?>>Active
					 <input type="radio"  name="Status" value="0" <?php if($row[0]->Status==0){ echo'checked'; }?>>Deactive
                   </div>
                 
                  </div>
				  <div class="row">
                  
				  <?php 
				 $File1 = $row[0]->Image1;	   
		if(!empty($File1))
		{ 
	        $load_url1 = 'uploads/news/'.$File1;
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
		
		 $File2 = $row[0]->Image2;	   
		if(!empty($File2))
		{ 
	        $load_url2 = 'uploads/news/'.$File2;
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