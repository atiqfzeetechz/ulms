<div class="row">
  <div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
              <h3> Edit Accounting</h3>
              </div>
              <div class="card-body">
                  
   <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>dailyupdate/add_accounting/edit" id="updateGetForm">
      <input type="hidden" value="<?php echo base_url(); ?>dailyupdate/add_accounting/edit" id="update_post_link">
     <input type="hidden" name="id" value="<?php echo $row[0]->id; ?>">
	 
                <div class="card-body">
				<div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="accountingtitle" name="accountingtitle" value="<?php echo $row[0]->title; ?>" placeholder="Enter Title">
                   </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" class="form-control" id="Date" name="Date" value="<?php echo $row[0]->Date; ?>" placeholder="dd-mm-yy">
                   </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Income</label>
                    <input type="text" class="form-control" id="income" name="income" value="<?php echo $row[0]->income; ?>" placeholder="Enter Income">
                   </div>
                  </div>
                 <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Expense</label>
                    <input type="text" class="form-control" id="expense" name="expense" value="<?php echo $row[0]->income; ?>" placeholder="Enter Expense">
                   </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Details</label>
                    <textarea type="text" class="form-control" id="details" name="details" value="<?php echo $row[0]->details; ?>" placeholder="Enter Expense"><?php echo $row[0]->details; ?></textarea>
                   </div>
                  </div>
				   
				   
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
			  
			  
                      
                
                
                
              </div>
              <!-- /.card -->
            </div>
          </div>
        
</div>   


<script>
  $("#updateGetForm").on('submit',(function(e) {

      $(".loading").show();
var post_link = $("#update_post_link").val();
	  
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

  </script>
  
  <script>
  $('.textarea').summernote('code');
  </script>