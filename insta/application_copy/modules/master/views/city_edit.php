 <h4>Edit City</h4>
<?php $states   = $this->Mdlmaster->get_order_table_result('statemaster','StateId','asc');?>
  <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>master/add_city_details/edit" id="updateGetForm">
      <input type="hidden" value="<?php echo base_url(); ?>master/add_city_details/edit" id="update_post_link">
			<input type="hidden" name="CityId" value="<?php echo $row[0]->CityId; ?>">
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>State Name : <b></div>
			<div class="col-md-4 col-xs-12">
			<select class="form-control" name="StateId">
			 <option value="">Select</option>
			 <?php foreach($states as $state){ ?>
             <option value="<?php echo$state->StateId; ?>" <?php if($state->StateId==$row[0]->StateId){ echo'selected'; }?>><?php echo$state->StateName; ?></option>
			 <?php } ?>
			</select>
			</div>
			
			<div class="col-md-2 col-xs-12"><b>City Name : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="CityName" value="<?php echo $row[0]->CityName; ?>"></div>
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
  
		
			
			 