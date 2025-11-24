








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

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emojionearea@3.4.2/dist/emojionearea.min.css"
      integrity="sha256-LKawN9UgfpZuYSE2HiCxxDxDgLOVDx2R4ogilBI52oc=" crossorigin="anonymous">

<!-- Form -->
<form class="form-horizontal" id="insertFormFix" action="<?php echo base_url(); ?>sms/sent_sms/sent" method="POST" enctype="multipart-formdata">
  <input type="hidden" value="<?php echo base_url(); ?>sms/sent_sms/sent" id="post_link">
  <div class="card-body">
    <input type="hidden" name="title" class="form-control">
    <div class="card-body">
      <input type="hidden" name="msg_type" value="multimedia">
    <!--  <div class="row">
        <div class="form-group col-md-6">
          <label for="sms_body" class="form-label">Message Type</label> <br>
          <input type="radio" id="msg_type_text" name="msg_type" value="text" checked onclick="toggleSmsDetails()">&nbsp;&nbsp;Text &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" id="msg_type_multimedia" name="msg_type" value="multimedia" onclick="toggleSmsDetails()">&nbsp;&nbsp;Multi Media
        </div>
      </div> -->
      <div class="row" id="smsDetails">
        <div class="form-group col-md-6">
          <label for="sms_body" class="form-label">SMS Details</label>  
          <textarea id="myText" name="sms_body" class="form-control"></textarea>
          <span class="text-danger"><?php echo form_error('sms_body'); ?></span>
        </div>
      </div>
      
   
      
      
      <input type="hidden" name="tid" id="tid_val">
      <div id="extra_div"></div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="" class="from-label">Mobile Number</label>
          <input class="form-control" name="mobile_number[]" required>
        </div>
      </div>
      <div class="row" id="imageDiv" style="display:block;">
        <div class="form-group col-md-6">
          <label for="exampleInputPassword1">MultiMedia</label><br>
          <input type="file" name="image" class="form-control">
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Send Sms</button>
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>

<script src="https://cdn.jsdelivr.net/npm/emojionearea@3.4.2/dist/emojionearea.min.js" 
        integrity="sha256-ImIFrmJd7ymGlVw2MbtI96BNPW4NfcKqM3d1Go665Ig=" crossorigin="anonymous"></script>
   
  <script>
    $('#myText').emojioneArea({
    pickerPosition:'right'
    });
</script>
