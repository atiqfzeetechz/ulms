<div class="container">
    <div class="row">
        <div class="col-md-12">
<section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><strong>  प्रिंसिपल की कलम से ......
</strong></h2>
        </div>

        <div class="row content">
          <div class="col-lg-4" data-aos="fade-right">
              <div class="row">
                  <div class="col-lg-12 col-12">
                      
                                 <?php 
				 $File =$intention->row()->Image1;  
		if(!empty($File))
		{ 
	        $load_url = 'uploads/principal_photo/'.$File;
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
				 
           <img src="<?php echo $url; ?>" class="img img-fluid img-thumbnail">
          <center>
           <br>
          <h3> <b><?php echo $intention->row()->name; ?></b></h3>
          <a href="tel:<?php echo $intention->row()->mobile_number; ?>">  <?php echo $intention->row()->mobile_number; ?></a>
           <p> <?php echo $intention->row()->about; ?></p>
           </center>
           </div>
            <!--<div class="col-lg-12 col-6">
           <img src="<?php echo base_url(); ?>uploads/advertise/home.png" class="img img-fluid">
           
           </div> -->
              </div>
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0" data-aos="fade-left">
            <p style="font-family:'Arya', sans-serif !important;background:red !important;font-size:18px;">
                <?php echo $intention->row()->Text; ?>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us -->
  </div>  
  </div>
    </div>
