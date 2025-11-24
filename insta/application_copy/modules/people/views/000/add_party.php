    <div class="row">
        <div class="col-sm-12">
    	<!------CONTROL TABS START------>
		<!------CONTROL TABS END------>
        
		
	
	<div class="panel panel-default">
  <div class="panel-heading">
  
 <ul class="nav nav-tabs bordered">
 
 <li class="active">
            	 <a href="<?php echo base_url(); ?>party/add_party"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add');?>
                    	</a></li>
						
			<li>
            	<a href="<?php echo base_url(); ?>party/vendor"><i class="entypo-menu"></i> 
					<?php echo get_phrase('Vendor');?>
                    	</a></li>
						<li>
            	<a href="<?php echo base_url(); ?>party/customer"><i class="entypo-menu"></i> 
					<?php echo get_phrase('Customer');?>
                    	</a></li>
			
		</ul>
	
    	</div>
  <div class="panel-body">
 	
	
	<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box" id="list">
				
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
			<div class="tab-pane box active" id="add" style="padding: 5px">
                <div class="box-content">
				
             <form class="form-horizontal" id="insertForm" action="<?php echo base_url(); ?>party/add_vendor_details/add" method="POST">
             <input type="hidden" value="<?php echo base_url(); ?>party/add_vendor_details/add" id="post_link">
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			
			<div class="col-md-2 col-xs-12"><b>Party Type : <b></div>
			<div class="col-md-4 col-xs-12">
			<select class="form-control" name="Type">
			<option value="">Select</option>
			<option value="Vendor">Vendor</option>
			<option value="Customer">Customer</option>
			</select>
			
			</div>
	
	 </div>
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			
			<div class="col-md-2 col-xs-12"><b>Name : <b></div>
			<div class="col-md-4 col-xs-12">
			<input class="form-control" name="VendorName">
			</div>
			<div class="col-md-2 col-xs-12"><b>Mobile : <b></div>
			<div class="col-md-4 col-xs-12">
			<input class="form-control" name="VendorMobile">
			
			</div>
			</div>
			
			
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>Email : <b></div>
			<div class="col-md-4 col-xs-12">
			<input type="email" class="form-control" name="VendorEmail">
			
			</div>
			
			<div class="col-md-2 col-xs-12"><b>Address: <b></div>
			<div class="col-md-4 col-xs-12">
			<input class="form-control" name="VendorAddress">
			
			</div>
			</div>
			
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>State : <b></div>
			<div class="col-md-4 col-xs-12">
			<select class="form-control" name="StateId" Onchange="getCity(this.value)">
			 <option value="">Select</option>
			 <?php foreach($states as $state){ ?>
             <option value="<?php echo$state->StateId; ?>"><?php echo$state->StateName; ?></option>
			 <?php } ?>
			</select>
			</div>
			
			<div class="col-md-2 col-xs-12"><b>City: <b></div>
			<div class="col-md-4 col-xs-12">
			<select class="form-control" name="CityId" id="CityId">
			<option value="">Select</option>
			</select>
			</div>
			</div>
			
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>GSTIN : <b></div>
			<div class="col-md-4 col-xs-12">
			<input type="text" class="form-control" name="GSTIN">
			</div>
			<div class="col-md-2 col-xs-12"><b>Opening Balance : <b></div>
			<div class="col-md-4 col-xs-12">
			<input type="number" step="any" min="0" class="form-control" name="OpeningBalance">
			
			</div>
			
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


