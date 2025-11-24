  <section id="testimonials" class="testimonials section-bg">
      
      <div class="container">
 <div class="section-title" data-aos="fade-up">
          <h2> <strong><?php echo $page_title; ?> </strong></h2>
        </div>
        <div class="row">
<?php foreach($query as $row){

	$url = base_url().'uploads/phone.jpg';
?>
          <div class="col-lg-6" data-aos="fade-up">
            <div class="testimonial-item">
              <img src="<?php echo$url; ?>" class="testimonial-img" alt="">
              <h3><?php echo$row->name; ?></h3>
              <h4><a href="tel:<?php echo$row->mobile1; ?>"><?php echo$row->mobile1; ?></a></h4>
              <h4><a href="tel:<?php echo$row->mobile2; ?>"><?php echo$row->mobile2; ?></a></h4>
              <h4><?php echo$row->address; ?></h4>
              
             
            </div>
          </div>
<?php } ?>
        
        </div>

      </div>
    </section><!-- End Testimonials Section -->
