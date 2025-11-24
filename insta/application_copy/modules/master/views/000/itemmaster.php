    <div class="row">
        <div class="col-sm-12">
    	<!------CONTROL TABS START------>
		<!------CONTROL TABS END------>
        
		
	
	<div class="panel panel-default">
  <div class="panel-heading">
  
 <ul class="nav nav-tabs bordered">
 
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('#');?>
                    	</a></li>
			<li>
            	 <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add');?>
                    	</a></li>
		</ul>
	
    	</div>
  <div class="panel-body">
 	
	<?php 
	$digits = 2;
//echo str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
	?>
	<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				
             <p>
			<div id="page_number" style="display:none;"></div>
                          
                               <div class="table-responsive" id="country_table">
                                   
                                   <h3>Data is loading please wait..   <i class="fa fa-refresh fa-spin"></i> </h3>
                               </div>
                               <div align="right" id="pagination_link"></div>
                                          
						       
                      
                                           
                                       </p>
			 </div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
				
             <form class="form-horizontal" id="insertForm">
                <input type="hidden" value="<?php echo base_url(); ?>master/add_itemmaster/add" id="post_link">
				
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>Category Name : <b></div>
			<div class="col-md-4 col-xs-12">
			<select class="form-control" name="category">
			<option value="">Select</option>
			 <?php foreach($Categories as $Category){ ?>
             <option value="<?php echo$Category->CategoryId; ?>"><?php echo$Category->CategoryName; ?></option>
			 <?php } ?>
			</select>
			</div>
			
			<div class="col-md-2 col-xs-12"><b>Item Name : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="Name"></div>
			
			
			</div>
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			
			<div class="col-md-2 col-xs-12"><b>Hindi Name : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="HindiName"></div>
			
			<div class="col-md-2 col-xs-12"><b>Tax : <b></div>
			<div class="col-md-4 col-xs-12">
			<select class="form-control" name="tax">
			 <option value="">Select</option>
			 <?php foreach($Taxes as $Tax){ ?>
             <option value="<?php echo$Tax->TaxId; ?>"><?php echo$Tax->TaxName; ?> ( <?php echo$Tax->TaxPercentage; ?> %)</option>
			 <?php } ?>
			</select>
			</div>
			
			</div>
			
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			
			<div class="col-md-2 col-xs-12"><b>HSN : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="hsn"></div>
			
			<div class="col-md-2 col-xs-12"><b>Barcode : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="barcode"></div>
			
			</div>
			
			
			
			
			<div class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-xs-12 col-md-12">
			<input type="submit" class="btn btn-default" value="Submit">
			</div>
			</div>
			
		               </form>
        

                </div>                
			</div>
			<!----CREATION FORM ENDS-->
		</div>
		
	
	</div>
</div>


</div>
    </div>


