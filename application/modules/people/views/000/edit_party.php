 <h4>Edit Item</h4>
 <?php 
$states = $this->Mdlmaster->get_order_table_result('statemaster','StateId','asc');
$city = $this->db->get_where('citymaster',array('StateId'=>$row[0]->StateId))->result();
			 ?>
  
		
		  <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>party/add_vendor_details/edit" id="updateGetForm">
      <input type="hidden" value="<?php echo base_url(); ?>party/add_vendor_details/edit" id="update_post_link">
     <input type="hidden" name="VendorId" value="<?php echo $row[0]->VendorId; ?>">
				<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			
			<div class="col-md-2 col-xs-12"><b>Name : <b></div>
			<div class="col-md-4 col-xs-12">
			<input class="form-control" name="VendorName" value="<?php echo $row[0]->VendorName; ?>">
			</div>
			<div class="col-md-2 col-xs-12"><b>Mobile : <b></div>
			<div class="col-md-4 col-xs-12">
			<input class="form-control" name="VendorMobile" value="<?php echo $row[0]->VendorMobile; ?>">
			
			</div>
			</div>
			
			
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>Email : <b></div>
			<div class="col-md-4 col-xs-12">
			<input type="email" class="form-control" name="VendorEmail" value="<?php echo $row[0]->VendorEmail; ?>">
			
			</div>
			
			<div class="col-md-2 col-xs-12"><b>Address: <b></div>
			<div class="col-md-4 col-xs-12">
			<input class="form-control" name="VendorAddress" value="<?php echo $row[0]->VendorAddress; ?>">
			
			</div>
			</div>
			
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>State : <b></div>
			<div class="col-md-4 col-xs-12">
			<select class="form-control" name="StateId" Onchange="getCity(this.value)">
			 <option value="">Select</option>
			 <?php foreach($states as $state){ ?>
             <option value="<?php echo$state->StateId; ?>" <?php if($state->StateId==$row[0]->StateId){ echo'selected';}?>><?php echo$state->StateName; ?></option>
			 <?php } ?>
			</select>
			</div>
			
			<div class="col-md-2 col-xs-12"><b>City: <b></div>
			<div class="col-md-4 col-xs-12">
			<select class="form-control" name="CityId" id="CityId">
			<option value="">Select</option>
			 <?php foreach($city as $cit){ ?>
             <option value="<?php echo$cit->CityId; ?>" <?php if($cit	->StateId==$row[0]->CityId){ echo'selected';}?>><?php echo$cit->CityName; ?></option>
			 <?php } ?>
			</select>
			</div>
			</div>
			
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>GSTIN : <b></div>
			<div class="col-md-4 col-xs-12">
			<input type="text" class="form-control" name="GSTIN" value="<?php echo $row[0]->GSTIN; ?>">
			</div>
			<div class="col-md-2 col-xs-12"><b>Opening Balance : <b></div>
			<div class="col-md-4 col-xs-12">
			<input type="number" step="any" min="0" class="form-control" name="OpeningBalance" value="<?php echo $row[0]->OpeningBalance; ?>">
			
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
  
		
			
			 
			 
			 