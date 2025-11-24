 <h4>Edit User</h4>

 
                      <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>user/add_user/edit" id="updateGetForm">
                <input type="hidden" value="<?php echo base_url(); ?>user/add_user/edit" id="update_post_link">
                
                <input type="hidden" value="<?php echo base_url(); ?>user/add_user/add" id="post_link">
				<input type="hidden" name="users_id"  value="<?php echo $row[0]->users_id; ?>">
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>Name : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="name"  value="<?php echo $row[0]->name; ?>"></div>
			
			<div class="col-md-2 col-xs-12"><b>Mobile : <b></div>
			<div class="col-md-4 col-xs-12"><input  class="form-control" name="mobile" value="<?php echo $row[0]->mobile; ?>"></div>
			</div>
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>Email : <b></div>
			<div class="col-md-4 col-xs-12"><input type="email" class="form-control" name="email" value="<?php echo $row[0]->email; ?>"></div>
			
			<div class="col-md-2 col-xs-12"><b>Status : <b></div>
			<div class="col-md-4 col-xs-12">
			<input type="radio"  name="status" value="active" <?php if($row[0]->status=='active'){ echo'checked'; }?>>Active
			<input type="radio"  name="status" value="deactive" <?php if($row[0]->status=='deactive'){ echo'checked'; }?>>Deactive
			</div>
			</div>
			<div class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-xs-12 col-md-12">
			<input type="submit" class="btn btn-default" value="Submit">
			</div>
			</div>
			
		               </form>
					   
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
  
