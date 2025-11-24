<div class="card card-info">
   
    <div class="card-body">
        
        <div class="row">
<!-- Main content -->
  <div class="col-md-12 form f-label">

    <!-- Profile Image -->
    <div class="box box-success pad-profile">
     
      <form id="updateForm" class="form-label-left" method="POST" action="<?php echo base_url(); ?>user/update_profile" enctype="multipart/form-data">
  <input type="hidden" id="post_link" value="<?php echo base_url(); ?>user/update_profile">
        <div class="box-body box-profile">
          <div class="col-md-5">
		  
					<div class="form-group has-feedback clear-both">
		              <label for="exampleInputname">Full Name:</label>
		              <input type="text" id="name" name="name" value="<?php echo (isset($user_data[0]->name)?$user_data[0]->name:'');?>" required="required" class="form-control" placeholder="Full Name">
		              <span class="glyphicon glyphicon-user form-control-feedback"></span>
		            </div>

                   
                  

					<div class="form-group has-feedback clear-both">
		              <label for="exampleInputname">Mobile Number:</label>
		              <input type="text" id="name" name="mobile" value="<?php echo (isset($user_data[0]->mobile)?$user_data[0]->mobile:'');?>" class="form-control" placeholder="Mobile Number">
		              <span class="glyphicon glyphicon-phone form-control-feedback"></span>
		            </div>
					
					

					<div class="form-group has-feedback clear-both">
		              <label for="exampleInputemail">Email:</label>
		              <input type="text" id="email" name="email" value="<?php echo (isset($user_data[0]->email)?$user_data[0]->email:'');?>" class="form-control" placeholder="Email" style="text-transform:lowercase">
		              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		            </div>

                     <div class="form-group has-feedback clear-both">
		              <label for="exampleInputname">Address:</label>
		              <input type="text" id="name" name="address" value="<?php echo (isset($user_data[0]->address)?$user_data[0]->address:'');?>"  class="form-control" placeholder="Address">
		              <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
		            </div>
		            
		           
		            
		            
			     <div class="form-group has-feedback sub-btn-wdt" >
              <input type="hidden" name="users_id" value="<?php echo isset($user_data[0]->users_id)?$user_data[0]->users_id:''; ?>">
            
              <button class="btn btn-info">Submit</button><!-- <div class=" pull-right">
              </div> -->
            </div>
          </div>
         <!-- /.box-body -->
        </div>
      </form>                     
      <!-- /.box -->
    </div>
    <!-- /.content -->
  </div>
</div>
    </div>
</div>





