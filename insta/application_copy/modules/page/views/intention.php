  <div class="row">
        <div class="col-md-12">
		<form id="insertFormFix">
		<input type="hidden" value="<?php echo base_url(); ?>page/add_intention/add" id="post_link">
				
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
              Pricipals Message
				
                
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
                <div class="mb-3">
                                        <label>Photo</label><br>
                     <?php 
				 $File = $Image1;	   
		if(!empty($File))
		{ 
	        $load_url = 'uploads/principal_photo/'.$File;
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
				 ?>
				 
                <div class="fileinput fileinput-new" data-provides="fileinput" style="border:1px solid #dcdcdc;">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								
									<img src="<?php echo $url; ?>" alt="...">
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
                
                <div class="mb-3">
                    <label>Name</label>
			  <input type="text" name="name" value="<?php echo$name; ?>" class="form-control">
			  </div>
			  
			    <div class="mb-3">
                    <label>Mobile Number</label>
			  <input type="text" name="mobile_number"  value="<?php echo$mobile_number; ?>" class="form-control">
			  </div>
			  
			    <div class="mb-3">
                    <label>About</label>
			  <input type="text" name="about"  value="<?php echo$about; ?>" class="form-control">
			  </div>
			  
			  
              <div class="mb-3">
			  <input type="hidden" name="ss" value="11">
                <textarea class="textarea" name="intention" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo$intention; ?></textarea>
              </div>
             
            </div>
			
			 <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                 
              </div>
				
          </div>
		  </form>
        </div>
        <!-- /.col-->
      </div>
    