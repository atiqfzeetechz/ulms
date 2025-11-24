 <?php 
 $Units = $this->Mdlmaster->get_order_table_result('unitmaster','UnitId','asc');
 ?>  
  <div class="row">
        <div class="col-sm-12">
    	<!------CONTROL TABS START------>
		<!------CONTROL TABS END------>
   <div class="panel panel-default">
  <div class="panel-heading">
  
 <?php  
$ItemId = $keyId;
echo $ItemName =  $this->Mdlmaster->get_col_by_key('itemmaster','ItemId',$ItemId,'ItemName'); ?> Price Chart
	
    	</div>
  <div class="panel-body">
   <form id="ModalFormSubmit">
   <input type="hidden" value="<?php echo base_url(); ?>master/add_item_unit/add" id="post_link_modal">
   <input type="hidden" value="<?php echo $keyId; ?>" name="ItemId">
								
  <table class="table table-bordered table-hover" id="mandi_dynemic_bag_mdl">
  <thead>
  <tr>
  <th>Sr.No.</th>
  <th>Volume</th>
  <th>Unit</th>
  <th>Rate</th>
  <th></th>
  </tr>
  </thead>
   <tbody id="dynemic_no_gen_mdl">
     <?php if(count($row)>0){ $srs = 1; foreach($row as $res){
		 
$del_urls = base_url().'master/delete_itemunit_details/'.$res->Id;
		 ?>
          <tr id="hide_<?php echo$res->Id; ?>">
            <td><span class="sn_mdl"><?php echo$srs++; ?></span>.</td>
            <td><input type="text" name="Volume[]" class="form-control" value="<?php echo$res->Volume; ?>"></td>
            <td><select name="UnitId[]"  class="form-control"><option value="">Select</option>
			<?php foreach($Units as $Unit){ ?>
			<option value="<?php echo $Unit->UnitId; ?>" <?php if($Unit->UnitId==$res->UnitId){ echo'selected'; }?>><?php echo $Unit->UnitName; ?></option><?php } ?>
			</select></td>
			<td><input type="number" step="any" name="Rate[]"  class="form-control" value="<?php echo$res->Rate; ?>"></td>
            <td><a onclick="delete_me_hide(this.id)" id="<?php echo$del_urls; ?>">Delete</a></td> 
		  </tr>
	 <?php } } else {?>
         <tr>
            <td><span class="sn_mdl">1</span>.</td>
            <td><input type="text" name="Volume[]" class="form-control" value=""></td>
            <td><select name="UnitId[]"  class="form-control"><option value="">Select</option>
			<?php foreach($Units as $Unit){ ?>
			<option value="<?php echo $Unit->UnitId; ?>"><?php echo $Unit->UnitName; ?></option><?php } ?>
			</select></td>
			<td><input type="number" step="any" name="Rate[]"  class="form-control" value=""></td>
            <td></td> 
		  </tr>

		  <?php } ?>	  
        </tbody>
		<tfoot>
		<tr>
		<td colspan="4">
		<input type="submit" class="btn btn-default" value="Submit">
		</td>
		</tr>
		</tfoot>
  </table>
  </form>
  <a href="javascript:void(0)" class="add_mdl btn btn-xs btn-success"><i class="fa fa-plus"></i></a>
		
  </div>
		</div>
		</div>
			</div>
	
	<script src="<?php echo base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>
	<script>
	$("#ModalFormSubmit").on('submit',(function(e) {

      $(".loading").show();
var post_link = $("#post_link_modal").val();
	  
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