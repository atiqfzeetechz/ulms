<?php if(isset($student_jquery)){ if($student_jquery==1){ ?>
<script>

$(document).ready(function(){
get_admission_no();
});
</script>

<script>
 
$(document).ready(function(){
 load_student_data(1);
});

 </script>
 
<?php } } ?>

<script>
function load_student_data(page)
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
	
	 student_data_table();
	 
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
$("#insertStudentForm").on('submit',(function(e) {

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
	  if(msg>0)
            {
  /** $('#insertStudentForm').find("textarea,select,input[type=file]").val("");
   $(".myselect").select2("val", "0");
   $("input[type=checkbox]").prop("checked", false);
   
   $(':input','#insertStudentForm')
  .not(':button, :submit, :reset, :hidden')
  .val('')
  .prop('checked', false)
  .prop('selected', false); **/
   get_admission_no();
   $(".loading").hide();
   toastr.success('Success!');
   StudentPayModal(msg);
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




$("#updateStudentForm").on('submit',(function(e) {

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
function get_admission_no()
{
	
	$(".loading").show();
	var data_link = "<?php echo base_url(); ?>students/get_admission_no";
	var url = data_link;
	
	
  $.ajax({
   url:url,	  
   method:"GET",
   //dataType:"json",
   success:function(data)
   {
	  
	$('#AdmissionNo').val(data);
   $(".loading").hide();
    
    }
  });
 }
</script>
<script>
  function student_data_table()
  {
	  
	    $('#studentsDataTable').DataTable( {
       "fixedHeader":true,
	    "dom": '<"pull-left"f><"pull-right"l>tip',
		"autoWidth": true,
	    responsive: true,
       "bPaginate": false,
     } );
	  
  
  

  }
  </script>
  