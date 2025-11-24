 <h4>Edit Item</h4>
 <?php 
$Categories = $this->Mdlmaster->get_order_table_result('categorymaster','CategoryId','asc');
$Units = $this->Mdlmaster->get_order_table_result('unitmaster','UnitId','asc');
$Taxes = $this->Mdlmaster->get_order_table_result('taxmaster','TaxId','asc');
			 ?>
  <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>master/add_itemmaster/edit" id="updateGetForm">
      <input type="hidden" value="<?php echo base_url(); ?>master/add_itemmaster/edit" id="update_post_link">
			<input type="hidden" name="ItemId" value="<?php echo $row[0]->ItemId; ?>">
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>Category Name : <b></div>
			<div class="col-md-4 col-xs-12">
			<select class="form-control" name="CategoryId">
			<option value="">Select</option>
			 <?php foreach($Categories as $Category){ ?>
             <option value="<?php echo$Category->CategoryId; ?>" <?php if($Category->CategoryId==$row[0]->CategoryId){ echo'selected'; }?>><?php echo$Category->CategoryName; ?></option>
			 <?php } ?>
			</select>
			</div>
			
			<div class="col-md-2 col-xs-12"><b>Item Name : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="ItemName" value="<?php echo$row[0]->ItemName; ?>"></div>
			
			
			</div>
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			
			<div class="col-md-2 col-xs-12"><b>Hindi Name : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="ItemNameHindi" value="<?php echo$row[0]->ItemNameHindi; ?>"></div>
			
			<div class="col-md-2 col-xs-12"><b>Tax : <b></div>
			<div class="col-md-4 col-xs-12">
			<select class="form-control" name="tax">
			 <option value="">Select</option>
			 <?php foreach($Taxes as $Tax){ ?>
             <option value="<?php echo$Tax->TaxId; ?>" <?php if($Tax->TaxId==$row[0]->Tax){ echo'selected'; }?>><?php echo$Tax->TaxName; ?> ( <?php echo$Tax->TaxPercentage; ?> %)</option>
			 <?php } ?>
			</select>
			</div>
			
			</div>
			
			
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			
			<div class="col-md-2 col-xs-12"><b>HSN : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="ItemHsnCode" value="<?php echo$row[0]->ItemHsnCode; ?>"></div>
			
			<div class="col-md-2 col-xs-12"><b>Barcode : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="Barcode" value="<?php echo$row[0]->Barcode; ?>"></div>
			
			</div>
			
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			
			
			<div class="col-md-2 col-xs-12"><b>MRP : <b></div>
			<div class="col-md-4 col-xs-12">
			<input class="form-control" name="MRP" value="<?php echo$row[0]->MRP; ?>">
			
			</div>
			<div class="col-md-2 col-xs-12"><b>Unit : <b></div>
			<div class="col-md-4 col-xs-12">
		    <select name="Unit"  class="form-control"><option value="">Select</option>
			<?php foreach($Units as $Unit){ ?><option value="<?php echo $Unit->UnitId; ?>" <?php if($Unit->UnitId==$row[0]->UnitId){ echo'selected'; }?>><?php echo $Unit->UnitName; ?></option><?php } ?>
			</select>
			
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
  
		
			
			 