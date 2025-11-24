<div class="row">
  <div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">All</a>
                  </li>
                 
                  
                </ul>
              </div>
              <div class="card-body">
                   <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="group_name">Name</label>
                  <input type="text" id="filterOne" class="form-control" placeholder="Enter Mobile">
                </div>
              </div>
                     <div class="col-md-3">
                <div class="form-group">
                  <label for="message">Message</label>
                  <input type="text" id="filterThree" class="form-control" placeholder="Enter Message">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="status">Status</label>
                  <select id="filterTwo" class="form-control">
                    <option value="">Select Status</option>
                    <option value="Success">Success</option>
                    <option value="Failed">Failed</option>
                  </select>
                </div>
              </div>

              <div class="col-md-12">
                <button class="btn btn-primary" onclick="filter_data('<?php echo base_url(); ?>dailyupdate/get_message_history')">Search</button>
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
				  
				  <form class="form-horizontal" id="insertForm" action="<?php echo base_url(); ?>party/add_blood_doner/add" method="POST">
             <input type="hidden" value="<?php echo base_url(); ?>dailyupdate/add_blood_doner/add" id="post_link">
		
                <div class="card-body">
				<div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                   </div>
                 
                  </div>
				  
				  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Blood Group</label>
                    <select class="form-control" name="groupId">
					<option>Select</option>
					<?php foreach($bloodgroups as $bg){ ?> 
					<option value="<?php echo$bg->BloodGroup; ?>"><?php echo$bg->BloodGroup; ?></option>
					<?php } ?>
					</select>
                   </div>
                 
                  </div>
				   
				   
				   
				   <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number">
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


  