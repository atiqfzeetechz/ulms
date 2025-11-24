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
                <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="group_name">Group Name</label>
                  <input type="text" id="filterOne" class="form-control" placeholder="Enter Group Name">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="status">Status</label>
                  <select id="filterTwo" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1">Active</option>
                    <option value="2">Deactive</option>
                  </select>
                </div>
              </div>

              <div class="col-md-12">
                <button class="btn btn-primary" onclick="filter_data('<?php echo base_url(); ?>sms/get_group')">Search</button>
              </div>
            </div>
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
				  
				  <form class="form-horizontal" id="insertForm" action="<?php echo base_url(); ?>sms/add_groups/add" method="POST">
             <input type="hidden" value="<?php echo base_url(); ?>sms/add_groups/add" id="post_link">
		
                <div class="card-body">
				   <div class="row">
                  <div class="form-group col-md-12">
                    <label for="from-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Title">
                   </div>
                  </div>
                	  <div class="row">
                  <div class="col-md-12">
                                <label for="" class="form-label">Status</label>
                                
                                <select name="status" class="form-control input-sm">
                                  <option value="">Status</option>
                         <option value="1">Active</option>
                         <option value="2">Deactive</option>
                         
                         </select>
                                
                                
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


  