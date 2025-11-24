<script>
function printPurchaseBil(refs)
{
  var strWindowFeatures = "width=1000,height=500,scrollbars=yes,resizable=yes";
  var appRoot = '<?php echo base_url(); ?>';
  window.open(appRoot+"transaction/printPurchaseBil/"+refs, 'Print', strWindowFeatures);
}

$("#insertModalForm").on('submit',(function(e) {

      $(".loading").show();
var post_link = $("#modal_post_link").val();
	 
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
       $("#PartyNameSearch").val(obj.cname);
	   $("#PartyIdSearch").val(obj.cid);
	   
	   //$(".cstdetails").html(obj.clink);
	   
      $(".loading").hide();
      toastr.success('Success!');
	  }
	  
	},
	error: function(){} 	        
});


}));


 function getStudentListBySearch()
 {
  var ClassId   = $("#ClassId").val();
  var SectionId = $("#SectionId").val();
  var MediumId  = $("#MediumId").val();
  var getUrl    = $("#ListPageName").html();

  var UrlLink = getUrl+'/'+ClassId+'/'+MediumId+'/'+SectionId;
  $.ajax({
            url: UrlLink,
            success: function(response)
            {
			$(".getStudentListBySearch").html(response);	
            }
        });
}


 function getStudentListBySearchUpdate()
 {
  var ClassId   = $("#ClassId").val();
  var SectionId = $("#SectionId").val();
  var MediumId  = $("#MediumId").val();
  var ColName  = $("#ColName").val();
  var getUrl    = "<?php echo base_url(); ?>students/get_student_update_list";

  var UrlLink = getUrl+'/'+ClassId+'/'+MediumId+'/'+SectionId+'/'+ColName;
  $.ajax({
            url: UrlLink,
            success: function(response)
            {
			$(".getStudentListBySearch").html(response);	
            }
        });
}


</script>


<script>
toastr.options.timeOut = 3000; 
$("#insertForm").on('submit',(function(e) {

      $(".loading").show();
var post_link = $("#post_link").val();
	 
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
     $('#insertForm').find("input[type=text],input[type=file],input[type=number],textarea").val("");
   $(".myselect").select2("val", "0");
  
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

$("#insertFormFix").on('submit',(function(e) {

      $(".loading").show();
var post_link = $("#post_link").val();
	 
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


$("#insertGetForm").on('submit',(function(e) {

    $(".loading").show();
var post_link = $("#post_link").val();
	  
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
   $('#insertGetForm').find("input[type=text],input[type=number],textarea").val("");
   $(".myselect").select2("val", "0");
     $(".loading").hide();
     toastr.success('Success!');
	 load_country_data(1); 
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

///redirectForm

$("#insertRedirectForm").on('submit',(function(e) {

      ///$(".loading").show();
var post_link = $("#post_link").val();
var redirect_link = $("#redirect_link").val();

e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(msg){
     
	  if(msg==0)
            {
 
       $(".loading").hide();
           toastr.error('Failed');
           
        
             }
            else
            {
              
           
$(".loading").hide();
     toastr.success('Success!');
	 window.location.href =  redirect_link+msg;
     		   
                
                
            }
	  
	},
	error: function(){} 	        
});
}));

///endRedirectForm
$("#updateForm").on('submit',(function(e) {

      $(".loading").show();
var post_link = $("#post_link").val();
	  
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
    
        //var page_no = 1; 
	 //load_country_data(page_no); 
       
     
        
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
<script>
function getCity(sid)
{
	url = "<?php echo base_url(); ?>master/getStateCity/"+sid;
	$(".loading").show();
	$.ajax({
   url:url,	  
   method:"GET",
   success:function(data)
   {
	$('#CityId').html(data);
   
	 $(".loading").hide();
    
    }
  });
	
}
</script>


	
	
<?php if(isset($table_data)){
	if($table_data==1){ ?>
 <script>
 
$(document).ready(function(){
	load_country_data(1);
});

 </script>
 
 
<?php } } ?>
 

 
 
 <script>

 
  function load_country_data(page)
 {
	
	$(".loading").show();
	var data_link = "<?php echo $data_link; ?>"+page;
	var url = data_link;
	
	
  $.ajax({
   url:url,	  
   method:"GET",
   dataType:"json",
   success:function(data)
   {
	  
	$('#country_table').html(data.country_table);
    $('#pagination_link').html(data.pagination_link);
    $("#page_number").html(data.page_number);
	
	 data_table();
	 
   $(".loading").hide();
    
    }
  });
 }
 


 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  load_country_data(page);
 });
 
 
 
 </script>
 <script>
 function delete_me(id)
{
 var x = confirm("Are you sure you want to delete?");
    if(x)
    {

  
   $(".loading").show();
         $.ajax({
         type: "GET",     
         url: id,
    
        success: function(msg) {
     $(".loading").hide();
            if(msg=='1')
               {
       var page_no =$("#page_number").html();   
	
       load_country_data(page_no); 
       toastr.success("success!");
                }
            else
            {
            
               toastr.error(msg);
      
            }
        
        }               
    });  
    }
    else
    {
        return false;
    }
}



 
  function delete_me_modal(id)
{
 var x = confirm("Are you sure you want to delete?");
 var RowId = document.getElementById(id).getAttribute('cat_id');
 
    if(x)
    {

  
   $(".loading").show();
         $.ajax({
         type: "GET",     
         url: id,
    
        success: function(msg) {
     $(".loading").hide();
            if(msg=='1')
               {
       $("tr.del_row_"+RowId+" #Amount").val('');
       toastr.success("success!");
                }
            else
            {
            
               toastr.success(error);
      
            }
        
        }               
    });  
    }
    else
    {
        return false;
    }
}




 </script>
 
 
 <script>
 function delete_me_hide(id)
{
	
 var x = confirm("Are you sure you want to delete?");
    if(x)
    {

  
   $(".loading").show();
         $.ajax({
         type: "GET",     
         url: id,
    
        success: function(msg) {

     $(".loading").hide();
            if(msg>0)
               {
				$("tr#hide_"+msg).hide();   
               toastr.success("success!");
               }
            else
            {
            
               toastr.error(msg);
      
            }
        
        }               
    });  
    }
    else
    {
        return false;
    }
}



 
  
 </script>
 
 
 
 <script>
     
         function change_status_global(id)
{
    
 var x = confirm("Do you want to change status?");
    if(x)
    {
         var status = document.getElementById(id).getAttribute('status');
         var id = document.getElementById(id).getAttribute('cat_id');
         var s_link = '<?php echo base_url(); ?>'+status;
        
    
   $(".loading").show();
         $.ajax({
         type: "POST",     
         url: s_link,
       
        success: function(msg) {
  
            if(msg==1)
            {
               
      var page_no = $("#page_number").html(); 
     load_country_data(page_no); 
    
            $(".loading").hide();
            
            }
            else
            {
            $(".loading").hide();
            }
        
        }               
    });  
    }
    else
    {
        return false;
    }
}

 </script>
 
 
 <script>

function StudentPayModal(sid)
{

    $("#StudentPayModal .modal-body").html('Loading');
  
     var get_link = "<?php echo base_url(); ?>fee/student_fee_chart/"+sid;

 $.ajax({
         type: "POST",     
         url: get_link,
        success: function(msg) {
           
         $("#StudentPayModal .modal-body").html(msg);
		 $(".myselect").select2();
       
        }               
    });  
    
  $("#StudentPayModal").modal('show')
  
}


function StudentPaymentHistoryModal(sid)
{

    $("#StudentPaymentHistoryModal .modal-body").html('Loading');
  
     var get_link = "<?php echo base_url(); ?>fee/student_fee_history/"+sid;

 $.ajax({
         type: "POST",     
         url: get_link,
        success: function(msg) {
           
         $("#StudentPaymentHistoryModal .modal-body").html(msg);
		 
       
        }               
    });  
    
  $("#StudentPaymentHistoryModal").modal('show')
  
}


</script>



<script>

function edit_me(id)
{
     $("#editModal .modal-body").html('Loading');
  
     var get_link = document.getElementById(id).getAttribute('name');
 $.ajax({
         type: "POST",     
         url: get_link,
        success: function(msg) {
         $("#editModal .modal-body").html(msg);
		}               
    });  
    
  $("#editModal").modal('show');
   
}




function fee_details(id)
{
     $("#editModal .modal-body").html('Loading');
  
     var get_link = document.getElementById(id).getAttribute('name');

 $.ajax({
         type: "POST",     
         url: get_link,
        success: function(msg) {
           
         $("#editModal .modal-body").html(msg);
		 $(".myselect").select2();
       
        }               
    });  
    
  $("#editModal").modal('show');
   
}




function upload_student_docx(id)
{
     $("#studentUploadModal .modal-body").html('Loading');
     var ids = document.getElementById(id).getAttribute('cat_id');
     
 $.ajax({
         type: "POST",     
         url: "<?php echo base_url(); ?>document/student_document_upload/",
         data:{id:ids},
        success: function(msg) {
           
         $("#studentUploadModal .modal-body").html(msg);
		 
       
        }               
    });  
    
  $("#studentUploadModal").modal('show');
   
}


</script>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
         <h2>Data loading pls wait....</h2>
        </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
  
</div>

 
<div class="modal fade" id="studentUploadModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
         <h2>Data loading pls wait....</h2>
        </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
  
</div>



<div class="modal fade" id="StudentPayModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
         <h2>Data loading pls wait....</h2>
        </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
  
</div>



<div class="modal fade" id="StudentPaymentHistoryModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
         <h2>Data loading pls wait....</h2>
        </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
  
</div>


 <script>
  function data_table()
  {
	  
	    $('#datatable1').DataTable( {
       "fixedHeader":true,
	  "dom": '<"pull-left"f><"pull-right"l>tip',
	 "autoWidth": true,
	    responsive: true,
       "bPaginate": false,
     } );
 }
 

	 
	 
  </script>
  
  
  