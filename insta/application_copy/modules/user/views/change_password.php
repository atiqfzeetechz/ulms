
<div class="card card-info">

<div class="card-body">
 	 <div class="row" style="background:#FFFFFF;padding:10px;">
	
      <div class="col-md-6">	
      <p>
          <!--<h6>Note - Password should be atleast 6 digit,atleast on capital letter atleast one number atleast one special character.</h6> -->
          <form method="POST" id="ChangePassForm"> 
	  
<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-4 col-xs-12"><b>Current Password : </b></div>
			<div class="col-md-8 col-xs-12">
			 <input value="" name="password1" id="password1" class="form-control form-sm" type="password" placeholder="Currunt Password"  required></div>
			</div>
<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-4 col-xs-12"><b>New Password : </b></div>
			<div class="col-md-8 col-xs-12">
		<input value="" name="password2" class="form-control form-sm" id="password2" type="password" placeholder="New Password" required></div>
			</div>
<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-4 col-xs-12"><b>Confirm Password : </b></div>
			<div class="col-md-8 col-xs-12">
			   <input value="" name="password3" class="form-control form-sm" type="password" placeholder="Confirm New Password" required></div>
			</div>
 
<input value="<?php echo$this->session->userdata('user_details')[0]->users_id; ?>" name="users_id" type="hidden">
      
<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
	  <div class="col-md-12">
        <button type="submit" name="edit" class="btn  btn-info">Submit</button>
		</div>
		</div>
        </form></p>
          
              <!---- ---->
        </div>
</div>		
      
      </div>
      
    </div>
  <!---Change Profile Password --->
  <?php if($this->session->userdata('user_details')[0]->user_type=="superadmin"){ ?>
<div class="card card-info">

<div class="card-body">
 	 <div class="row" style="background:#FFFFFF;padding:10px;">
	
      <div class="col-md-6">	
      <p>
          <h4>Change Profile Pin</h4>
          <!--<h6>Note - Password should be atleast 6 digit,atleast on capital letter atleast one number atleast one special character.</h6> -->
          <form method="POST" id="ChangeProfilePassForm"> 
	  
<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-4 col-xs-12"><b>Current Pin : </b></div>
			<div class="col-md-8 col-xs-12">
			 <input value="" name="password1" id="password1" class="form-control form-sm" type="password" placeholder="Currunt Pin"  required></div>
			</div>
<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-4 col-xs-12"><b>New Pin : </b></div>
			<div class="col-md-8 col-xs-12">
		<input value="" name="password2" class="form-control form-sm" id="password2" type="password" placeholder="New Pin" required></div>
			</div>
<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-4 col-xs-12"><b>Confirm New Pin : </b></div>
			<div class="col-md-8 col-xs-12">
			   <input value="" name="password3" class="form-control form-sm" type="password" placeholder="Confirm New Pin" required></div>
			</div>
 
<input value="<?php echo$this->session->userdata('user_details')[0]->users_id; ?>" name="users_id" type="hidden">
      
<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
	  <div class="col-md-12">
        <button type="submit" name="edit" class="btn  btn-info">Submit</button>
		</div>
		</div>
        </form></p>
          
              <!---- ---->
        </div>
</div>		
      
      </div>
      
    </div>
  <?php } ?>

<!--Footer-part-->

<!--Footer-part-->

