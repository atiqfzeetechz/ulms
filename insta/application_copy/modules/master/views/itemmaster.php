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
				
             <form class="form-horizontal" id="insertForm" action="<?php echo base_url(); ?>master/add_itemmaster/add" method="POST">
                <input type="hidden" value="<?php echo base_url(); ?>master/add_itemmaster/add" id="post_link">
				
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-2 col-xs-12"><b>Category Name : <b></div>
			<div class="col-md-4 col-xs-12">
			<select class="form-control" name="CategoryId">
			<option value="">Select</option>
			 <?php foreach($Categories as $Category){ ?>
             <option value="<?php echo$Category->CategoryId; ?>"><?php echo$Category->CategoryName; ?></option>
			 <?php } ?>
			</select>
			</div>
			
			<div class="col-md-2 col-xs-12"><b>Item Name : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="ItemName"></div>
			
			
			</div>
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			
			<div class="col-md-2 col-xs-12"><b>Hindi Name : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="ItemNameHindi"></div>
			
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
			<div class="col-md-4 col-xs-12"><input class="form-control" name="ItemHsnCode"></div>
			
			<div class="col-md-2 col-xs-12"><b>Barcode : <b></div>
			<div class="col-md-4 col-xs-12"><input class="form-control" name="Barcode"></div>
			
			</div>
			
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			
			
			<div class="col-md-2 col-xs-12"><b>MRP : <b></div>
			<div class="col-md-4 col-xs-12">
			<input class="form-control" name="MRP">
			
			</div>
			<div class="col-md-2 col-xs-12"><b>Unit : <b></div>
			<div class="col-md-4 col-xs-12">
		    <select name="Unit"  class="form-control"><option value="">Select</option>
			<?php foreach($Units as $Unit){ ?><option value="<?php echo $Unit->UnitId; ?>"><?php echo $Unit->UnitName; ?></option><?php } ?>
			</select>
			
			</div>
			</div>
			
			
			<div  class="row" style="border:1px solid #dcdcdc;padding:8px;">
			<div class="col-md-12">
			 <table class="table table-bordered" id="mandi_dynemic_bag">
        <thead>
          <tr>
            <th>#</th>
            <th>Volume</th>
            <th>Unit</th>
			<th>Rate</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody id="dynemic_no_gen">
          <tr id="rec-1">
            <td><span class="sn">1</span>.</td>
            <td><input type="text" name="Volume[]" class="form-control" required></td>
            <td><select name="UnitId[]"  class="form-control" required><option value="">Select</option>
			<?php foreach($Units as $Unit){ ?><option value="<?php echo $Unit->UnitId; ?>"><?php echo $Unit->UnitName; ?></option><?php } ?>
			</select></td>
			<td><input type="number" step="any" name="Rate[]"  class="form-control" required></td>
            <td></td> 
		  </tr>
        </tbody>
      </table>	
	   <a href="javascript:void(0)" class="add btn btn-xs btn-success"><i class="fa fa-plus"></i></a>
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


<script>
 $(document).on('click','.add',function(e) {
  
    
	$('#mandi_dynemic_bag >tbody').append('<tr><td><span class="sn"></span>.</td><td><input type="text" name="Volume[]" class="form-control" required></td><td><select name="UnitId[]"  class="form-control"><option value="">Select</option><?php foreach($Units as $Unit){ ?><option value="<?php echo $Unit->UnitId; ?>"><?php echo $Unit->UnitName; ?></option><?php } ?></select></td><td><input type="text" name="Rate[]"   class="form-control" required></td><td><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td></tr>');
	
	 //$(".bag:last").focus(); 
    arrangeSno();

 
});

function arrangeSno(){
           var i=1;
		    $('#dynemic_no_gen tr').each(function() {
                $(this).find(".sn").html(i);
               i++;
             });
}


 jQuery(document).delegate('a.delete-record', 'click', function(e) {
     e.preventDefault();    
     var didConfirm = confirm("Are you sure You want to delete");
     if (didConfirm == true) {
           $(this).parent().parent().remove();
           arrangeSno();
		  
    return true;
  } else {
    return false;
  }
});

</script>

<script>
 $(document).on('click','.add_mdl',function(e) {
  
    
	$('#mandi_dynemic_bag_mdl >tbody').append('<tr><td><span class="sn_mdl"></span>.</td><td><input type="text" name="Volume[]" class="form-control" required></td><td><select name="UnitId[]"  class="form-control"><option value="">Select</option><?php foreach($Units as $Unit){ ?><option value="<?php echo $Unit->UnitId; ?>"><?php echo $Unit->UnitName; ?></option><?php } ?></select></td><td><input type="text" name="Rate[]"   class="form-control" required></td><td><a class="btn btn-xs delete-record_mdl" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td></tr>');
	
	 //$(".bag:last").focus(); 
    arrangeSno_mdl();

 
});

function arrangeSno_mdl(){
           var i=1;
		    $('#dynemic_no_gen_mdl tr').each(function() {
                $(this).find(".sn_mdl").html(i);
               i++;
             });
}


 jQuery(document).delegate('a.delete-record_mdl', 'click', function(e) {
     e.preventDefault();    
     var didConfirm = confirm("Are you sure You want to delete");
     if (didConfirm == true) {
           $(this).parent().parent().remove();
           arrangeSno();
		  
    return true;
  } else {
    return false;
  }
});

</script>


