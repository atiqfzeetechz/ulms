    <div class="row">
        <div class="col-sm-12">
    	<!------CONTROL TABS START------>
		<!------CONTROL TABS END------>
        
		
	
	<div class="panel panel-default">
  <div class="panel-heading">
  Item Stock
  </div>
<div class="panel-body">
<form id="insertFormFix" action="<?php echo base_url(); ?>master/add_itemstock/add" method="POST">
<input type="hidden" value="<?php echo base_url(); ?>master/add_itemstock/add" id="post_link">
				
<table class="table table-bordered table-hover">
<thead>
<tr>
<th>Sr.No</th>
<th>Item Name</th>
<th>Opening Stock</th>
<th>Current Stock</th>
</tr>
</thead>
<tbody>
 <?php
$sr = 1; 
 foreach($items as $item){ 
 ?>
 <tr>
 <td><?php echo$sr++; ?></td>
 <td><?php echo$item->ItemName; ?></td>
 <td>
 <input type="hidden" name="ItemId[]" value="<?php echo$item->ItemId; ?>">
 <input type="number" class="form-control" name="OpeningStock[]" step="any" value="<?php echo$this->Mdlmaster->getOpeningStock($item->ItemId);?>">
 </td>
 <td><?php echo $this->Mdlmaster->getItemCurrentStock($item->ItemId); ?></td>
 </tr>
 <?php 
 }
 ?>	
 <tr>
<td colspan="4">
<input type="submit" class="btn btn-default" value="Submit">
</td>
 </tr>
</tbody>
</table> 
</form>
</div>
</div>


</div>
    </div>


