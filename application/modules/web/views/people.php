<div class="container">
    <div class="row">
        <div class="col-md-12">

    
    <section id="team" class="team ">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2> <strong><?php echo $page_title; ?> </strong></h2>
        </div>

        <div class="row">

<?php foreach($query as $row)
  {
   $File = $row->photo;
		   
		if(!empty($File))
		{ 
	        $load_url = 'uploads/our_pride/'.$File;
			if(file_exists($load_url))
			{
		   $url = base_url().$load_url;			
			}
			else
			{
			$url = base_url().'uploads/no_file.jpg';		
			}
		}
		else
		{
		$url = base_url().'uploads/no_file.jpg';	
		}
  ?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" style="margin-top:20px;width:100%">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="<?php echo$url; ?>" class="img-fluid" alt="" style="width:100%">
                <div class="social">
                 <!-- <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>-->
                </div>
              </div>
              <div class="member-info">
                <h4><?php echo$row->name; ?></h4>
                <span style="color:#222;font-size:17px;"><?php echo$row->post; ?></span>
                <span style="color:#222;font-size:17px;">मोबाइल  - <a href="tel:<?php echo$row->mobile; ?>"><?php echo$row->mobile; ?></a></span>
                <span style="color:#222;font-size:17px;">पता  - <?php echo$row->address; ?></span>
              </div>
            </div>
          </div>

          <?php } ?>
        </div>

      </div>
    </section><!-- End Our Team Section -->



  </div>  
  </div>
    </div>
