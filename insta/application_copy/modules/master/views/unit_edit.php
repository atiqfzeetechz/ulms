 <h4>Edit Unit</h4>

  <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>master/add_unit_details/edit" id="updateGetForm">
      <input type="hidden" value="<?php echo base_url(); ?>master/add_unit_details/edit" id="update_post_link">
			<input type="hidden" name="UnitId" value="<?php echo $row[0]->UnitId; ?>">
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>Unit Name : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="UnitName" value="<?php echo $row[0]->UnitName; ?>"></div>
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
  
		
			
			 