  <div class="row">
        <div class="col-md-12">
		<form id="insertFormFix">
		<input type="hidden" value="<?php echo base_url(); ?>page/add_history/add" id="post_link">
				
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                About School
				
                
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
			  <input type="hidden" name="ss" value="11">
                <textarea class="textarea" name="history" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo$history; ?></textarea>
              </div>
             
            </div>
			
			 <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                 
              </div>
				
          </div>
		  </form>
        </div>
        <!-- /.col-->
      </div>
    