  <!-- ======= Contact Section ======= -->
   
    <section id="contact" class="contact">
      <div class="container">
          
          <center> <h4><?php echo$page_title; ?></h4></center>
          
  <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10" style="background:#F0F0F0;">
             	  <form class="form-horizontal" id="insertForm" action="<?php echo base_url(); ?>hostel/add_hostler/add" method="POST">
             <input type="hidden" value="<?php echo base_url(); ?>hostel/add_hostler/add" id="post_link">
		
                <div class="card-body">
				<div class="row">
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name">
                   </div>
				    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">DOB</label>
                    <input type="date" class="form-control" id="Dob" name="Dob">
                   </div>
                 
                  </div>
				   
				  
				<div class="row">
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="number" class="form-control" id="Mobile" name="Mobile">
                   </div>
				    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Alt Mobile</label>
                    <input type="number" class="form-control" id="AltMobile" name="AltMobile">
                    </div>
                 
                  </div>
				  
				  <div class="row">
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Registration Date</label>
                    <input type="hidden" name="Status" value="0">
                    <input type="date" class="form-control" id="RegistartionDate" name="RegistartionDate">
                   </div>
				    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea class="form-control" id="Address" name="Address"></textarea>
                    </div>
                 
                  </div>
				  
				   

				   
				  <div class="row">
                  
                  <div class="form-group col-md-6 col-xs-5">
                    <label for="exampleInputPassword1">Photo</label><br>
                 
<div class="fileinput fileinput-new" data-provides="fileinput" style="border:1px solid #dcdcdc;">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								
									<img src="<?php echo base_url(); ?>uploads/no_file.jpg" alt="...">
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
								
									<img src="<?php echo base_url(); ?>uploads/no_file.jpg" alt="...">
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

        </div>

      </div>
    </section>