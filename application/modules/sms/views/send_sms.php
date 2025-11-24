	
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emojionearea@3.4.2/dist/emojionearea.min.css"
      integrity="sha256-LKawN9UgfpZuYSE2HiCxxDxDgLOVDx2R4ogilBI52oc=" crossorigin="anonymous">

				 <script>
        // Function to show or hide elements based on selected message type
        function toggleSmsDetails() {
            var smsDetailsDiv = document.getElementById('smsDetails');
            var imageDiv = document.getElementById('imageDiv');
            var msgType = document.querySelector('input[name="msg_type"]:checked').value;

            if (msgType === 'text') {
                smsDetailsDiv.style.display = 'block';
                imageDiv.style.display = 'block';
            } else if (msgType === 'multimedia') {
                smsDetailsDiv.style.display = 'block';
                imageDiv.style.display = 'block';
            }
        }

    </script>
				
				  <form class="form-horizontal" id="insertFormFix" action="<?php echo base_url(); ?>sms/sent_sms/sent" method="POST"  enctype="multipart-formdata">
             <input type="hidden" value="<?php echo base_url(); ?>sms/sent_sms/sent" id="post_link">
		
                <div class="card-body">
				   <div class="row">
                  <?php  $this->db->select('id,name');
                         $this->db->from('group');
                        $this->db->where('status','1');
                        $Group = $this->db->get()->result(); ?>
                            <div class="form-group col-md-6">
                                <label for="" class="from-label">Group Name</label>
                                <select name="groupid" class="category form-control" onchange="getContact(this.value)" >
                                     <option value=""> Select Group Name</option>
                                     <?php foreach($Group as $account ){ ?>
                               <option value="<?php echo $account->id;?>"> <?php echo $account->name;?></option>
                            <?php  } ?>
                        </select>
                             
                          </div>
                           </div>
                           
                           
                            <div class="row">
                                
                            <div class="form-group col-md-6">
                                <label for="" class="from-label">Contact</label><br>
				<input type="checkbox" id="checkbox" >Select All

                                <select  name="mobile_number[]" class="category form-control checkbox" id="sSid" multiple >
                                
                                     <option value=""> Select Contact Name</option>
                                    
                        </select>
                             
                          </div>
                           </div>
                                <input type="hidden" name="title" class="form-control">
                                <input type="hidden"   name="msg_type" value="multimedia">

                            <!-- <div class="row">
                              <div class="form-group col-md-6">
                                <label for="sms_body" class="form-label">Message Type</label> <br>
                                <input type="radio" id="msg_type_text" name="msg_type" value="text" checked onclick="toggleSmsDetails()">&nbsp;&nbsp;Text &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="msg_type_multimedia" name="msg_type" value="multimedia" onclick="toggleSmsDetails()">&nbsp;&nbsp;Multi Media
                              </div>
                            </div>   -->   
                          <div class="row" id="smsDetails">   <div class="form-group col-md-6">        
                          <label for="" class="from-label">SMS Details</label>        
                          <textarea class="form-control" id="sms_body" name="sms_body"></textarea>           
                          </div></div>
                     <input type="hidden" name="tid" id="tid_val">
                      <div id="extra_div">
                       
                      </div>
                  
                <div class="row" id="imageDiv" style="display:block;">
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">MultiMedia</label><br>
                    <input type="file" name="image" class="form-control">

                      </div>
                    </div>
                  
                  
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Send Sms</button>
                </div>
              </form>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>

<script src="https://cdn.jsdelivr.net/npm/emojionearea@3.4.2/dist/emojionearea.min.js" 
        integrity="sha256-ImIFrmJd7ymGlVw2MbtI96BNPW4NfcKqM3d1Go665Ig=" crossorigin="anonymous"></script>
   
  <script>
    $('#sms_body').emojioneArea({
    pickerPosition:'right'
    });
</script>
		