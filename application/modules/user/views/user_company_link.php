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
                <input type="hidden" value="<?php echo base_url(); ?>user/add_user_company_link/add" id="post_link">
				
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>User : <b></div>
			<div class="col-md-4 col-xs-12">
			<select class="form-control" name="UserId">
			<option value="">Select</option>
			<?php foreach($users as $user){ ?>
            <option value="<?php echo$user->users_id; ?>"><?php echo$user->name; ?></option>
			<?php }?>
			</select>
			</div>
			
			<div class="col-md-2 col-xs-12"><b>Company : <b></div>
			<div class="col-md-4 col-xs-12">
			<select class="form-control" name="CompanyId">
			<option value="">Select</option>
			<?php foreach($companies as $company){ ?>
            <option value="<?php echo$company->CompanyId; ?>"><?php echo$company->CompanyName; ?></option>
			<?php }?>
			</select>
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


