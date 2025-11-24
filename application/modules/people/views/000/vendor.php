    <div class="row">
        <div class="col-sm-12">
    	<!------CONTROL TABS START------>
		<!------CONTROL TABS END------>
        
		
	
	<div class="panel panel-default">
  <div class="panel-heading">
  
 <ul class="nav nav-tabs bordered">
 
 <li>
            	 <a href="<?php echo base_url(); ?>party/add_party"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add');?>
                    	</a></li>
						
			<li class="active">
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
            
            
			
			<!----CREATION FORM ENDS-->
		</div>
		
	
	</div>
</div>


</div>
    </div>


