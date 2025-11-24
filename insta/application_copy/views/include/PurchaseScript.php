<script>
 var i = 2;

 $(document).on('click','.add',function(e) {
	$('#purchase_dynemic_row').append('<tr id="rec-1" style="margin-top:30px;border-top:2px;solid #000;"><td><label>Sr</label><br><span class="sn"></span>.</td><td><label>Code</label><br><input type="text" name="ItemCode[]"  class="form-control autocomplete_txt3" data-type="code" id="ItemCode_'+i+'"></td><td><label>Item Name</label><br><input type="text" name="ItemName[]" class="form-control autocomplete_txt3" data-type="name" id="ItemName_'+i+'" ><input type="hidden" name="ItemId[]" id="ItemId_'+i+'"></td><td><label>MRP</label><br><input type="number" step="any" name="ItemMRP[]"  id="ItemMRP_'+i+'" class="form-control" value="0"></td><td><label>Purchase Price</label><br><input type="number" step="any" name="PurchasePrice[]"  id="PurchasePrice_'+i+'" class="form-control PurchasePrice" value="0"></td><td><label>Item Qty</label><br><input type="number" step="any" name="ItemQty[]"  id="ItemQty_'+i+'" class="form-control Qty" value="1"></td><td><label>Item Unit</label><br><select name="ItemUnit[]" id="ItemUnit_'+i+'"  class="form-control" onChange="getunitPrice(this.id)"><option value="">Select Unit</option></select></td><td><label>Amount</label><br><input type="number" step="any" name="ItemAmountQtyMrp[]" id="ItemAmountQtyMrp_'+i+'" class="form-control ItemAmountQtyMrp" value="0"></td><td><label>Discount %</label><br><input type="number" step="any" name="ItemDiscountPercentage[]" id="ItemDiscountPercentage_'+i+'"   class="form-control" value="0"></td></tr><tr><td><label>Discount Amount</label><br><input type="number" step="any" name="ItemDiscountAmount[]" id="ItemDiscountAmount_'+i+'"   class="form-control" value="0"></td><td><label>Amount</label><br><input type="number" step="any" name="ItemAmountAfterDiscount[]" id="ItemAmountAfterDiscount_'+i+'"   class="form-control" value="0"></td><td><label>Cash Dis.%</label><br><input type="number" step="any" name="ItemCashDiscountPercentage[]"  id="ItemCashDiscountPercentage_'+i+'" class="form-control" value="0"></td><td><label>Cash Disc. Amount</label><br><input type="number" step="any" name="ItemCashDiscountAmount[]" id="ItemCashDiscountAmount_'+i+'"  class="form-control" value="0"></td><td><label>Amount</label><br><input type="number" step="any" name="ItemAmountAfterCashDiscount[]" id="ItemAmountAfterCashDiscount_'+i+'" class="form-control" value="0"></td><td><label>GST%</label><br><input type="number" step="any" name="TaxId[]" id="TaxId_'+i+'"  class="form-control" value="0"></td><td><label>GST Amount</label><br><input type="number" step="any" name="TaxAmount[]" id="TaxAmount_'+i+'"  class="form-control" value="0"></td><td><label>Other Amount</label><br><input type="number" step="any" name="OtherAmount[]" id="OtherAmount_'+i+'"  class="form-control" value="0"></td><td><label>Net Amount</label><br><input type="number" step="any" name="NetAmount[]" id="NetAmount_'+i+'" class="form-control" value="0"></td></tr>');
    
	$(document).on('focus','.autocomplete_txt3',function(){
	type = $(this).data('type');
	if(type =='code' )autoTypeNo=0;
	if(type =='name' )autoTypeNo=1; 
	
	$(this).autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'http://localhost/stock/transaction/itemSearch',
			dataType: "json",
			method: 'post',
			data: {
			   name_startsWith: request.term,
			   type: 'country_table',
			   row_num : i
			},
			 success: function( data ) {
				 //start
			
				 if(data.length>0)
				 {
					
				    response( $.map( data, function( item ) {
				 	var code = item.split("|");
					return {
						label: code[autoTypeNo],
						value: code[autoTypeNo],
						data : item
					}
				}));
				}
				else
				{
			
			  response([{ label: 'No results found.', val: -1, id:'rama',}]);
				}
				
			}
		});
	},
	autoFocus: true,	      	
	minLength: 0,
	select: function( event, ui ) {
		var names = ui.item.data.split("|");
		id_arr = $(this).attr('id');
  		id = id_arr.split("_");
		$('#ItemCode_'+id[1]).val(names[0]);
		$('#ItemName_'+id[1]).val(names[1]);
		$('#ItemMRP_'+id[1]).val(names[2]);
		$('#ItemId_'+id[1]).val(names[3]);
		$('#TaxId_'+id[1]).val(names[4]);
		
		getItemUnits(names[7],names[5],id[1])
		
		countTotalAmt();
	
	}		      	
});
});


	//
    arrangeSno();
 i++;

});

function arrangeSno(){
           var i=1;
		    $('#dynemic_no_gen tr#rec-1').each(function() {
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
$(document).on('focus','.autocomplete_txt3',function(){
	type = $(this).data('type');
	if(type =='code' )autoTypeNo=0;
	if(type =='name' )autoTypeNo=1; 
	
$(this).autocomplete({
     source: function( request, response ) {
		 
		$.ajax({
			url : 'http://localhost/stock/transaction/itemSearch',
			dataType: "json",
			method: 'post',
			data: {
			   name_startsWith: request.term,
			   type: 'country_table',
			   row_num : 1
			},
			 success: function( data ) {
				 //start
			
				 if(data.length>0)
				 {
					
				    response( $.map( data, function( item ) {
				 	var code = item.split("|");
					return {
						label: code[autoTypeNo],
						value: code[autoTypeNo],
						data : item
					}
				}));
				}
				else
				{
			
			  response([{ label: 'No results found.', val: -1, id:'rama',}]);
				}
				
			}
		});
	},
	autoFocus: true,	      	
	minLength: 0,
	select: function( event, ui ) {
		var names = ui.item.data.split("|");
		$('#ItemCode_1').val(names[0]);
		$('#ItemName_1').val(names[1]);
		$('#ItemMRP_1').val(names[2]);
		$('#ItemId_1').val(names[3]);
		$('#TaxId_1').val(names[4]);
	    
	    getItemUnits(names[7],names[5],1)
	    countTotalAmt();
	
	}		      	
});
});
</script>


<script>
$(document).ready(function(){
$('#dynemic_no_gen').on('mouseover mouseout',function(){
	countTotalAmt();
});
});

function countTotalAmt(){
            var i = 1;
			var GrandTotal = 0;
			var TotalDiscount = 0;
			var TotalCashDiscount = 0;
			var TotalGstAmount = 0;
			var TotalGrossAmount = 0;
			var TotalOtherCharges = 0;
			
			
		    $('#dynemic_no_gen tr#rec-1').each(function() {
				var PurchasePrice              = $("#PurchasePrice_"+i).val();
				var Qty                        = $("#ItemQty_"+i).val();
				var ItemAmountQtyMrp = PurchasePrice*Qty;
				//$(".hres").html(ItemAmountQtyMrp);
				var Total_ItemAmountQtyMrp = ItemAmountQtyMrp.toFixed(2);
				$("#ItemAmountQtyMrp_"+i).val(Total_ItemAmountQtyMrp);
				
				
				//discount section
				
				var ItemDiscountPercentage     = $("#ItemDiscountPercentage_"+i).val();
				var ItemDiscountAmount         = $("#ItemDiscountAmount_"+i).val();
				var ItemAmountAfterDiscount    = $("#ItemAmountAfterDiscount_"+i).val();
				//start percenatge
				if(ItemDiscountPercentage=='')
				{
				$("#ItemDiscountAmount_"+i).val('');	
				$("#ItemAmountAfterDiscount_"+i).val(Total_ItemAmountQtyMrp);	
				}
				else
				{
				ItemDiscountPercentage = ItemDiscountPercentage;
				var DiscountPercentageValue = Total_ItemAmountQtyMrp*ItemDiscountPercentage/100;				
				$("#ItemDiscountAmount_"+i).val(DiscountPercentageValue);
				var ItemAmountAfterDiscount = Total_ItemAmountQtyMrp-DiscountPercentageValue;
				$("#ItemAmountAfterDiscount_"+i).val(ItemAmountAfterDiscount);
				}
            	//end discount section 
				
				
				//cash discount section
				
				var ItemCashDiscountPercentage     = $("#ItemCashDiscountPercentage_"+i).val();
				var ItemCashDiscountAmount         = $("#ItemCashDiscountAmount_"+i).val();
				var ItemAmountAfterCashDiscount    = $("#ItemAmountAfterCashDiscount_"+i).val();
				//start percenatge
				if(ItemDiscountPercentage=='')
				{
				$("#ItemCashDiscountAmount_"+i).val('');	
				$("#ItemAmountAfterCashDiscount_"+i).val(ItemAmountAfterDiscount);	
				}
				else
				{
				ItemCashDiscountPercentage = ItemCashDiscountPercentage;
				var CashDiscountPercentageValue = ItemAmountAfterDiscount*ItemCashDiscountPercentage/100;				
				$("#ItemCashDiscountAmount_"+i).val(CashDiscountPercentageValue);
				var ItemAmountAfterCashDiscount = ItemAmountAfterDiscount-CashDiscountPercentageValue;
				$("#ItemAmountAfterCashDiscount_"+i).val(ItemAmountAfterCashDiscount);
				}
            	//end cash discount section 
				
				//apply GST
				var gstType = $("input[name=GstType]:checked").val();

				var TaxAmount = $("#ItemAmountAfterCashDiscount_"+i).val();
				var gstPercentage  = $("#TaxId_"+i).val();
				if(gstType=='exclude')
				{
				var gstAmount     = TaxAmount*gstPercentage/100;
				var NetAmount   = Number(ItemAmountAfterCashDiscount)+ Number(gstAmount);
				}
				else if(gstType=='include')
				{
				var calculateNet = 	ItemAmountAfterCashDiscount*100/(100+Number(gstPercentage));
				var gstAmount    =  ItemAmountAfterCashDiscount-calculateNet
				
				var NetAmount   = calculateNet ; //Number(ItemAmountAfterCashDiscount)- Number(gstAmount);
			    //$(".hres").html(calculateNet);
				}
				else
				{
				var gstAmount     = TaxAmount*gstPercentage/100;
                var NetAmount   = Number(ItemAmountAfterCashDiscount)+ Number(gstAmount);				
				}
				$("#TaxAmount_"+i).val(gstAmount.toFixed(2));
                //end GST aPPLy
				
			    var OtherCost = $("#OtherAmount_"+i).val();
				
				var NetAfterOther = NetAmount+Number(OtherCost);
				$("#NetAmount_"+i).val(NetAfterOther.toFixed(2));
				///other Amount
				
				TotalOtherCharges+=Number(OtherCost);
				$("#TotalOtherAmount").val(TotalOtherCharges.toFixed(2));
				
				
				GrandTotal+=Number(ItemAmountQtyMrp);
				$("#GrandTotalQtyMRP").val(GrandTotal.toFixed(2));
				
				TotalDiscount+=Number(DiscountPercentageValue);
				$("#TotalDiscount").val(TotalDiscount.toFixed(2));
				
				
				TotalCashDiscount+=Number(CashDiscountPercentageValue);
				$("#TotalCashDiscount").val(TotalCashDiscount.toFixed(2));
				
				
				
				TotalGstAmount+=Number(gstAmount);
				$("#TotalGstAmount").val(TotalGstAmount.toFixed(2));
				
				TotalGrossAmount+=Number(NetAfterOther);
				$("#TotalGrossAmount").val(TotalGrossAmount.toFixed(2));
				
				
				
				i++;
             });
}

//$(document).ready()
</script>

<script>
    function getunitPrice(id){
	   var ItemunitId = $("#"+id).val(); 
	   var RowId = id.split("_")[1];
       
	     $(".loading").show();
url = "<?php echo base_url(); ?>transaction/getItemUnitPrice/"+ItemunitId;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	   
	$('#ItemMRP_'+RowId).val(data);
   
	 $(".loading").hide();
    
    }
  });
  
		
	 }
 
 function getItemUnits(id,unit,row_id)
 {
	  $(".loading").show();
url = "<?php echo base_url(); ?>transaction/getItemUnits/"+id+'/'+unit;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#ItemUnit_'+row_id).html(data);
   
	 $(".loading").hide();
    
    }
  });
 }
</script>

<script>

$("#PurchaseForm").on('submit',(function(e) {
$(".loading").show();
var post_link = "<?php echo base_url(); ?>transaction/savePurchase/save";
	 
e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(msg){
   
   var obj = JSON.parse(msg);

	 if(obj.status==0)
            {
			
		   $(".loading").hide();
           toastr.error(obj.error);
           }
            else
            {
	 ///$("#PurchaseForm").reset();
				$('#PurchaseForm')[0].reset();

	  var Isprints = obj.Isprint;			
	  var PurchaseId = obj.PurchaseId;
       		   
      $(".loading").hide();
      toastr.success('Success!');
	  }
	  
	},
	error: function(){} 	        
});


}));



</script>