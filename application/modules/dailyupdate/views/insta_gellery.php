<div class="row">
  <div class="col-12 col-sm-12 col-lg-12">
    
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
               
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                 <div class="tab-pane fade show active" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">

                  
				  
	<form class="form-horizontal" id="insertForm" action="<?php echo base_url(); ?>dailyupdate/add_insta_gellery/add" method="POST" enctype="multipart/form-data">
             <input type="hidden" value="<?php echo base_url(); ?>dailyupdate/add_insta_gellery/add" id="post_link">
		
                <div class="card-body">


				  <input type="hidden" name="abc" value="1">
          <input type="hidden" name="media_type" value="Image">
              

                    <div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Caption</label>
                    <textarea type="text" name="caption" class="form-control"></textarea>

                  
                   </div>
                 
                  </div> 

	<div class="row" id="media-container">
  <div class="form-group col-md-2 image-picker">
    <label>Media</label>
    <input type="file" name="image[]" accept="image/*" class="form-control media-input">
  </div>
</div>

<!-- Add Button -->
<div class="form-group">
  <button type="button" class="btn btn-sm btn-secondary mt-2" id="add-media-btn">
    Add More Media
  </button>
</div>





				   
				  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
			  
			  
                      
                  </div>
                  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                      <p>
                        <table class="table table-responsive">
                    
                    <tr>
                      <td>
                        <b>Post will run on:  09:00 AM</b>
                      </td>

                      <td>
                        <b>Time interval: 04 Min</b>
                      </td>

                    </tr>
                  </table>
			<div id="page_number" style="display:none;"></div>
                          
                               <div class="table-responsive" id="country_table">
                                   
                                   <h3>Data is loading please wait..   <i class="fa fa-refresh fa-spin"></i> </h3>
                               </div>
                               <div align="right" id="pagination_link"></div>
                                          
						       
                      
                                           
                                       </p> 
                  </div>
                  
                
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        
</div>   

<script>
  function addInputListener(input) {
    input.addEventListener('change', function () {
      const allInputs = document.querySelectorAll('.media-input');
      const lastInput = allInputs[allInputs.length - 1];

      if (input === lastInput && input.files.length > 0) {
        addMediaInput();
      }
    });
  }

  function addMediaInput() {
    const newDiv = document.createElement('div');
    newDiv.className = 'form-group col-md-2 image-picker';
    newDiv.innerHTML = `
      <label>Media</label>
      <input type="file" name="image[]" accept="image/*" class="form-control media-input">
    `;
    document.getElementById('media-container').appendChild(newDiv);

    addInputListener(newDiv.querySelector('input'));
  }

  // Initial input listener
  document.querySelectorAll('.media-input').forEach(addInputListener);

  // Button click to add input
  document.getElementById('add-media-btn').addEventListener('click', function () {
    addMediaInput();
  });

  // Function to view media by common key
  function viewMedia(common_key) {
    $.post('<?php echo base_url(); ?>dailyupdate/get_media_by_common_key', {common_key: common_key}, function(data) {
      $('#mediaModal .modal-body').html(data);
      $('#mediaModal').modal('show');
    });
  }
</script>

<!-- Modal for viewing media -->
<div class="modal fade" id="mediaModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Media Gallery</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Media will be loaded here -->
      </div>
    </div>
  </div>
</div>





  