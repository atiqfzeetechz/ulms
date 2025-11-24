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
<li><a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add');?>
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
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
				
             <form class="form-horizontal" id="insertForm">
                <input type="hidden" value="<?php echo base_url(); ?>user/add_user/add" id="post_link">
				
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>Name : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="name"></div>
			
			<div class="col-md-2 col-xs-12"><b>Mobile : <b></div>
			<div class="col-md-4 col-xs-12"><input  class="form-control" name="mobile"></div>
			</div>
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>Email : <b></div>
			<div class="col-md-4 col-xs-12"><input type="email" class="form-control" name="email"></div>
			
			<div class="col-md-2 col-xs-12"><b>Username : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="username"></div>
			</div>
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>Password : <b></div>
			<div class="col-md-4 col-xs-12"><input type="password" class="form-control" name="password"></div>
			
			<div class="col-md-2 col-xs-12"><b>Confirm Password : <b></div>
			<div class="col-md-4 col-xs-12"><input type="password" class="form-control" name="confirm_password">
			 <input type="hidden" name="user_type" value="subadmin">
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


