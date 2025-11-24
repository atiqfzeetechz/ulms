 <!-- ======= Hero Section ======= -->
  
         <style>
      .carousel-inner > .item > img, .carousel-inner > .item > a > img {
        display: block;
        height: 400px;
        min-width: 100%;
        width: 100%;
        max-width: 100%;
        line-height: 1;
    }

  </style>
        <!-- CAROUSEL START -->
        <section style="margin-top:-50px;">
        <div class="container-fluid">      
 <div class="row">
      <div class="col-md-8 col-12">
 <?php if($sliders->num_rows()>0){  $sliderRes = $sliders->result(); ?>
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
      <?php  $sliderNo = 0;
        foreach($sliderRes as $sliderRo){ ?>
    <li data-target="#demo" data-slide-to="<?php echo$sliderNo; ?>" class="<?php if($sliderNo==0){ echo'active'; } ?>"></li>
    
    <?php $sliderNo++; } ?>
  </ul>

  <!-- The slideshow -->
    <div class="carousel-inner">

  <?php
       $sliderNo2 = 0;
        foreach($sliderRes as $sliderRo2){
            
            $file = $sliderRo2->image;
		   $path = 'uploads/slider/'.$file;
		   if(!empty($file) && file_exists($path)){
		      $imgUrl = base_url().$path;  
		   }
		   else
		   {
		       $imgUrl = base_url().'uploads/no_file.png';   
		   }
       ?>
    <div class="carousel-item <?php if($sliderNo2==0){ echo'active'; } ?>">
      <img src="<?php echo$imgUrl; ?>" class="img-fluid" alt="Los Angeles"  style="width:100%">
    </div>
    
   <?php $sliderNo2++; } ?>
   </div>
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
<?php }  ?>
</div>
      <div class="col-md-4 col-12">
          <h4>NOTIFICATION </h4>
             <p>
                  <table class="table table-bordered">
               
              <?php if($news->num_rows()>0){
                  $newsRow = $news->result();
                  foreach($newsRow as $newsRes){
                      
                      $file = $newsRes->Image1;
		   $path = 'uploads/news/'.$file;
		   if(!empty($file) && file_exists($path)){
		      $imgUrl = base_url().$path;  
		   }
		   else
		   {
		       $imgUrl = base_url().'uploads/no_file.png';   
		   }
		   $string = strip_tags($newsRes->Text);
		   ?>
                 
                    
                    <tr>
                   <td><a data-toggle="modal" data-target="#myModal<?php echo$newsRes->NewsId; ?>" href="<?php echo base_url(); ?>web/singleNews/<?php echo$newsRes->NewsId; ?>/<?php echo$newsRes->NewsTitle; ?>"><?php echo$newsRes->NewsTitle; ?> </a> <br>
                   <span style="text-align:right;color:red"><i class="icofont-calendar"></i> <?php echo$newsRes->Date; ?></span>
                   </td>     
                    </tr>
                 
                
                <div class="modal" id="myModal<?php echo$newsRes->NewsId; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
      <center>  <img src="<?php echo $imgUrl?>" alt="" class="img-fluid" style="max-height:200px; width:50%;"></center>
        <div class="modal-header">
          <h4 class="modal-title"> <?php echo$newsRes->NewsTitle; ?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        
         <?php echo  $string ?>
        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
  
                  <?php 
                  }
                  ?>
                  <tr><td align="right"><a href="<?php echo base_url(); ?>web/news">All Notification...</a></td></tr>
                  <?php 
              }
              ?>
              </table>             
               
           </p>
      </div>      
</div>
</div>
    </section>
     

  <!-- The Modal -->
  
                <!--CAROUSEL END -->
  <main id="main">
      <div class="container-fluid">
<div class="row" >
    <div class="col-md-12" style="background:#203E38;padding:10px;">
        <marquee><ul><li>Welcome to Jagriti Higher Sec. School</li> <li><i class="fas fa-info-circle"></i>  Admission starts  for the Session 2020-21</li></ul></marquee>
        
        
    </div>
</div>
</div>
    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><strong>जागृति हायर सेकेंडरी स्कूल  
</strong></h2>
        </div>

        <div class="row content">
             
          
       
          <div class="col-lg-12" data-aos="fade-left">
               <img src="<?php echo base_url(); ?>uploads/home.jpg" class="img img-fluid img-thumbnail" style="float: left;  
            margin: 5px; ">
           
            <p style="font-family:'Arya', sans-serif !important;background:red !important;font-size:18px;margin-top:30px;">
                <?php echo ($itihaas->num_rows() > 0) ? $itihaas->row()->Text : 'Content not available'; ?>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->
     <section style="border-top:3px solid #dcdcdc"><div class="container-fluid"><div class="row">
        <div class="col-lg-3 col-6">
          
         <div class="card card-succss" style="padding-bottom:40px;text-align:center;background:#1DAAF2;color:#FFFFFF;margin-top:50px;">
             
            <center> 
            <div style="padding:40px;border-radius:50%;border:3px solid #1DAAF2;background:#FFFFFF;width:50px;height:50px;margin-top:-30px;"></div> 
            <h2>Certified teacher</h2> 
              </center>
         </div>
        
        </div>
        
         <div class="col-lg-3 col-6">
          
         <div class="card card-succss" style="padding-bottom:40px;text-align:center;background:#8CC052;color:#FFFFFF;margin-top:50px;">
             
            <center> 
            <div style="padding:40px;border-radius:50%;border:3px solid #8CC052;background:#FFFFFF;width:50px;height:50px;margin-top:-30px;"></div> 
            <h2>Special education</h2> 
              </center>
         </div>
        
        </div>
        
        
        <div class="col-lg-3 col-6">
          
         <div class="card card-succss" style="padding-bottom:40px;text-align:center;background:#5D50C6;color:#FFFFFF;margin-top:50px;">
             
            <center> 
            <div style="padding:40px;border-radius:50%;border:3px solid #5D50C6;background:#FFFFFF;width:50px;height:50px;margin-top:-30px;"></div> 
            <h2>Books & library</h2> 
              </center>
         </div>
        
        </div>
        
        
        
        <div class="col-lg-3 col-6">
          
         <div class="card card-succss" style="padding-bottom:40px;text-align:center;background:#F2453F;color:#FFFFFF;margin-top:50px;">
             
            <center> 
            <div style="padding:40px;border-radius:50%;border:3px solid #F2453F;background:#FFFFFF;width:50px;height:50px;margin-top:-30px;"></div> 
            <h2>Sports</h2> 
              </center>
         </div>
        
        </div>
        
        
        
    </div></div></section>
    <!-- ======= Services Section ======= -->
  


<section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><strong>  हमारे बारे में  
</strong></h2>
        </div>

        <div class="row content">
         
          <div class="col-lg-12 pt-4 pt-lg-0" data-aos="fade-left">
            <p style="font-family:'Arya', sans-serif !important;background:red !important;font-size:18px;">
                <?php echo ($intention->num_rows() > 0) ? $intention->row()->Text : 'Content not available'; ?>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us 
    
    
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>फोटो </h2>
        </div>

       <!-- <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div> -->

       
   <?php if(count($images)>0){?>  <div class="row portfolio-container" data-aos="fade-up"> <?php  foreach($images as $image){ 
           $image_file = $image->image;
		   $image_path = 'uploads/image_gellery/'.$image_file;
		   if(!empty($image_file) && file_exists($image_path)){
		      $imgFileUrl = base_url().$image_path;  
		   }
		   else
		   {
		       $imgFileUrl = base_url().'uploads/no_file.png';   
		   }
   ?>
          <div class="col-lg-4 col-md-6 col-6 portfolio-item filter-app">
           <a href="<?php echo$imgFileUrl; ?>" data-gall="portfolioGallery" class="venobox preview-link" >
               <img src="<?php echo$imgFileUrl; ?>" class="img-fluid" alt="" style="height:300px;width:100%">
            </a>
          </div>
 <?php } ?> 
 </div>
 <div class="row">
 <div class="col-md-12">
 <a href="<?php echo base_url(); ?>web/image_gellery" class="pull-right">More Photo....</a><?php } ?>
</div>
        </div>

      </div>
    </section>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58271.18072285562!2d75.04653041686672!3d24.103296111178352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39642b61b5b17c2f%3A0xc28f7f05207a513d!2sjagrati%20h.s.%20school%20sabakheda!5e0!3m2!1sen!2sin!4v1598622244812!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </section>
    
    <!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <!-- <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Clients</h2>
        </div>

        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-7.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-8.png" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>
    </section>--> <!-- End Our Clients Section -->

  </main><!-- End #main -->
