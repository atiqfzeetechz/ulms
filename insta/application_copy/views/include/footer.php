         
   <?php 
    $SchoolName    =    getSystemColumn('CompanyName');
	$SchoolMobile1 =    getSystemColumn('CompanyMobile');
	$SchoolEmail   =    getSystemColumn('CompanyEmail');
	$SchoolSession =    getActiveSession();
	$SchoolAddress =    getSystemColumn('CompanyAddress');
	?>
	</div>
		</section>
		 </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021<a href="javascript:void(0)"><?php echo$SchoolName; ?></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
		
		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		
	   <script>
$("#validate_form").validate();
</script>
<script type="text/javascript"> 
$('.add').click(function() {
    $('.block:last').before('<div class="block"><div class="row"><div class="col-md-3"><div class="form-group"><label class="control-label"><?php echo get_phrase('name');?></label><input type="text" class="form-control input-sm" name="name[]" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/></div></div><div class="col-md-3 col-md-offset-1"> <div class="form-group"><label class="control-label"><?php echo get_phrase('class_fee');?></label><input type="text" class="form-control input-sm" name="class_fee[]" data-rule-required="true" data-msg-required="Please enter SOMETHING." ></div></div><div class="col-md-3 col-md-offset-1"><div class="form-group"><label class="control-label"><?php echo get_phrase('teacher');?></label><select name="teacher_id[]" class="form-control myselect" id="" style="width:100%;"><option value=""><?php echo get_phrase('select');?></option><?php foreach($teachers as $row):?><option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option><?php endforeach; ?></select> </div></div><div class="col-md-1 remove"> <div class="form-group"><label class="control-label">&nbsp;</label><br>&nbsp;<i class="fa fa-trash"></i></div></div></div></div>');
});
$('.optionBox').on('click','.remove',function() {
    $(this).parent().remove();
});


</script>

<script type="text/javascript"> 
$('.add_doc').click(function() {
    $('.block_doc:last').before('<div class="block_doc"><div class="row"><div class="col-md-8"><div class="form-group"><label class="control-label"><?php echo get_phrase('document_name');?></label><input type="text" class="form-control input-sm" name="doc_category[]" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/></div></div><div class="col-md-1 remove_doc"> <div class="form-group"><label class="control-label">&nbsp;</label><br>&nbsp;<i class="fa fa-trash"></i></div></div></div></div>');
});
$('.optionBox_doc').on('click','.remove_doc',function() {
    $(this).parent().remove();
});


</script>



<script type="text/javascript"> 
$('.add1').click(function() {
    $('.block1:last').before('<div class="block1"><div class="row"><div class="col-md-3"><div class="form-group"><label class="control-label"><?php echo get_phrase('name');?></label><input type="text" class="form-control input-sm" name="name[]" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/></div></div><div class="col-md-3 col-md-offset-1"> <div class="form-group"><label class="control-label"><?php echo get_phrase('class');?></label><select name="class_id[]" class="form-control myselect" id="" style="width:100%;"><option value=""><?php echo get_phrase('select');?></option><?php foreach($classes as $row):?><option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option><?php endforeach; ?></select> </div></div><div class="col-md-3 col-md-offset-1"><div class="form-group"><label class="control-label"><?php echo get_phrase('teacher');?></label><select name="teacher_id[]" class="form-control myselect" id="" style="width:100%;"><option value=""><?php echo get_phrase('select');?></option><?php foreach($teachers as $row):?><option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option><?php endforeach; ?></select> </div></div><div class="col-md-1 remove1"> <div class="form-group"><label class="control-label">&nbsp;</label><br>&nbsp;<i class="fa fa-trash"></i></div></div></div></div>');
});
$('.optionBox1').on('click','.remove1',function() {
    $(this).parent().remove();
});


</script>

<script type="text/javascript"> 
$('.add2').click(function() {
    $('.block2:last').before('<div class="block2"><div class="row"><div class="col-md-3"><div class="form-group"><label class="control-label"><?php echo get_phrase('name');?></label><input type="text" class="form-control input-sm" name="name[]" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/></div></div><div class="col-md-3 col-md-offset-1"><div class="form-group"><label class="control-label"><?php echo get_phrase('teacher');?></label><select name="teacher_id[]" class="form-control myselect" id="" style="width:100%;"><option value=""><?php echo get_phrase('select');?></option><?php foreach($teachers as $row):?><option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option><?php endforeach; ?></select> </div></div><div class="col-md-1 remov2"> <div class="form-group"><label class="control-label">&nbsp;</label><br>&nbsp;<i class="fa fa-trash"></i></div></div></div></div>');
});
$('.optionBox2').on('click','.remove2',function() {
    $(this).parent().remove();
});


</script>


	    <?php include('form_js.php'); ?>
		
		
       
	  
	    <?php include('datatable.php'); ?>
<!--<script src="<?php echo base_url(); ?>assets/js/state.js"></script>-->
		
	<script type="text/javascript">  
	
	 $("#clickToGen").click(function(e){
        e.preventDefault();
		var student_id = $("#student_id").val();
        var strWindowFeatures = "width=1000,height=500,scrollbars=yes,resizable=yes";
   
   var appRoot = '<?php echo base_url(); ?>';
        
        window.open(appRoot+"students/printProfileSingle/"+student_id, 'Print', strWindowFeatures);
    });
  function printProfile(student_id)
  {
  var strWindowFeatures = "width=1000,height=500,scrollbars=yes,resizable=yes";
  var appRoot = '<?php echo base_url(); ?>';
  window.open(appRoot+"students/printProfileSingle/"+student_id, 'Print', strWindowFeatures);
 }
  

	</script>
	
	<script type="text/javascript">  
	
	 $("#all_profile_print").click(function(e){
        e.preventDefault();
		var class_id = $("#class_id").val();
        var strWindowFeatures = "width=1000,height=500,scrollbars=yes,resizable=yes";
   
   var appRoot = '<?php echo base_url(); ?>';
        
        window.open(appRoot+"students/print_profile_all/"+class_id, 'Print', strWindowFeatures);
    });


	</script>
	
	
		<script src="<?php echo base_url(); ?>assets/js/toastr.min.js"></script>
	
	
	<?php include('form_table.php');  ?>
	
	
	
	
	 

 <script src="<?php echo base_url(); ?>assets/js/autobank.js"></script>
 
 
 



	<!-- Script -->

 <script>
 function RunSelect2(){
  $('#select-id').select2({
     allowClear: true,
     closeOnSelect: false,
  }).on('select2:open', function() {  

    setTimeout(function() {
        $(".select2-results__option .select2-results__group").bind( "click", selectAlllickHandler ); 
    }, 0);

  });
}

RunSelect2();


var selectAlllickHandler = function() {
	$(".select2-results__option .select2-results__group").unbind( "click", selectAlllickHandler );        
  $('#select-id').select2('destroy').find('option').prop('selected', 'selected').end();
  RunSelect2();
};
 </script>
 

 <script>
     $('.textarea').summernote({
    toolbar: [
  ['style', ['style']],
  ['font', ['bold', 'underline', 'clear']],
  ['fontname', ['fontname']],
  ['color', ['color']],
   ['size', ['fontsize']],
  ['para', ['ul', 'ol', 'paragraph']],
  ['table', ['table']],
  ['insert', ['link', 'picture', 'video']],
  ['view', ['fullscreen', 'codeview', 'help']],
],
});



function getSMS(sid){


        $(".loading").show();	
        $.ajax({
            url: '<?php echo base_url();?>sms/get_sms_by_id/'+sid,
            dataType:"json",
            success: function(data)
            {
                
                $('#shtml_html').html(data);
             	$('#sms_body').html(data.sms_body);
                $('#extra_div').html(data.extra_div);
                $("#tid_val").val(data.tid_val);
                $(".loading").hide();
               
				
            }
        });	 
	  
    }
    
    function getContact(ssid){

      
        $(".loading").show();	
        $.ajax({
            url: '<?php echo base_url();?>sms/get_contact_by_id/'+ssid,
         
            success: function(data)
            {
            
                $('#sSid').html(data);
   
                $(".loading").hide();
               
				
            }
        });	 
	  
    }
    
    

    
 </script>	
 
 
 
 
 
 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />




<script type="text/javascript">

$('.category').select2();
$('#sSid').select2();
	  
       
                 $("#checkbox").click(function(){
    if($("#checkbox").is(':checked') ){
        $("#sSid > option").prop("selected","selected");
        $("#sSid").trigger("change");
    }else{
         $("#sSid > option").removeAttr("selected");
         $("#sSid").trigger("change");
     }
});

             




  
</script>


















