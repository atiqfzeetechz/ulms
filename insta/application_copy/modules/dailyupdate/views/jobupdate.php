<div class="row">
  <div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">All</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Add New</a>
                  </li>
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                      <p>
			<div id="page_number" style="display:none;"></div>
                          
                               <div class="table-responsive" id="country_table">
                                   
                                   <h3>Data is loading please wait..   <i class="fa fa-refresh fa-spin"></i> </h3>
                               </div>
                               <div align="right" id="pagination_link"></div>
                                          
						       
                      
                                           
                                       </p> 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
				  
				  <form class="form-horizontal" id="insertForm" action="<?php echo base_url(); ?>dailyupdate/add_jobupdate/add" method="POST">
             <input type="hidden" value="<?php echo base_url(); ?>dailyupdate/add_jobupdate/add" id="post_link">
		
                <div class="card-body">
				   <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Job Title</label>
                    <input type="text" class="form-control" id="jobupdatetitle" name="jobupdatetitle" placeholder="Enter Title">
                   </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Place</label>
                    <input type="text" class="form-control" id="place" name="place" placeholder="Enter Place">
                   </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Post</label>
                    <input type="text" class="form-control" id="post" name="post" placeholder="Enter Post">
                   </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
                   </div>
                  </div>
                   <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" class="form-control" id="Date" name="Date" placeholder="dd-mm-yy">
                   </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Last Date</label>
                    <input type="date" class="form-control" id="lastdate" name="lastdate" placeholder="dd-mm-yy">
                   </div>
                  </div>
				  <div class="row">
                  
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Image1</label><br>
                 
<div class="fileinput fileinput-new" data-provides="fileinput" style="border:1px solid #dcdcdc;">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								
									<img src="<?php echo base_url(); ?>uploads/no_file.jpg" alt="...">
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
                    <label for="exampleInputPassword1">PDF File</label><br>
                 
<div class="fileinput fileinput-new" data-provides="fileinput" style="border:1px solid #dcdcdc;">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								
									<img src="<?php echo base_url(); ?>uploads/no_file.jpg" alt="...">
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
                
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        
</div>   


  