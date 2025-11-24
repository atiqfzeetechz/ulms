<div class="row">
  <div class="col-12 col-sm-12 col-lg-12">
  <h4 style="padding:10px;margin-bottom:-10px;">Edit Details</h4>
              
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
              </div>
              <div class="card-body">
                  
				  <form class="form-horizontal" id="updateGetForm" action="<?php echo base_url(); ?>hostel/add_hostler/edit" method="POST">
             <input type="hidden" value="<?php echo base_url(); ?>hostel/add_hostler/edit" id="update_post_link">
		      <input type="hidden" name="Id" value="<?php echo$row[0]->Id; ?>">
                <div class="card-body">
				<div class="row">
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="Name" name="Name"  value="<?php echo$row[0]->Name; ?>"placeholder="Enter Name">
                   </div>
				    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">DOB</label>
                    <input type="date" class="form-control" id="Dob" name="Dob" value="<?php echo$row[0]->Dob; ?>">
                   </div>
                 
                  </div>
				   
				  
				<div class="row">
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="number" class="form-control" id="Mobile" name="Mobile" value="<?php echo$row[0]->Mobile; ?>">
                   </div>
				    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Alt Mobile</label>
                    <input type="number" class="form-control" id="AltMobile" name="AltMobile" value="<?php echo$row[0]->AltMobile; ?>">
                    </div>
                 
                  </div>
				  
				  <div class="row">
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Registration Date</label>
                    <input type="date" class="form-control" id="RegistartionDate" name="RegistartionDate" value="<?php echo $row[0]->RegistartionDate; ?>">
                   </div>
				    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Status</label><br>
                    <input type="radio"  name="Status" value="1" <?php if($row[0]->Status==1){ echo'checked'; }?>>Active
					 <input type="radio"  name="Status" value="0" <?php if($row[0]->Status==0){ echo'checked'; }?>>Deactive
                   </div>
				    
                 
                  </div>
				  
				   <div class="row">
                 
                 <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Address</label>
                <textarea class="form-control" id="Address" name="Address"><?php echo$row[0]->Address; ?></textarea>
                    </div>
                  </div>
				  
				   
				   <?php 
				 $File = $row[0]->Photo;	   
		if(!empty($File))
		{ 
	        $load_url = 'uploads/hostler/'.$File;
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
				
				 $File1 = $row[0]->IdCard;	   
		if(!empty($File1))
		{ 
	        $load_url1 = 'uploads/hostler/'.$File1;
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

				   
				  <div class="row">
                  
                  <div class="form-group col-md-6 col-xs-5">
                    <label for="exampleInputPassword1">Photo</label><br>
                 
<div class="fileinput fileinput-new" data-provides="fileinput" style="border:1px solid #dcdcdc;">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								
									<img src="<?php echo$url; ?>" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="Photo" accept="image/*">
									</span>
									<a href="#" class="btn btn-xs btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
				</div>

				</div>
				
				  <div class="form-group col-md-6 col-xs-5">
                    <label for="exampleInputPassword1">ID Card</label><br>
                 
<div class="fileinput fileinput-new" data-provides="fileinput" style="border:1px solid #dcdcdc;">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								
									<img src="<?php echo$url1; ?>" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="IdCard" accept="image/*">
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

	<script src="<?php echo base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>
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
  

  