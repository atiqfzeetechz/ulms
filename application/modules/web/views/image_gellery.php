 <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
                <li><a href="<?php echo base_url(); ?>web/image_gellery">All</a></li>
              <?php foreach($imagecategory as $icat){ ?>
              <li><a href="<?php echo base_url(); ?>web/image_gellery/<?php echo$icat->id; ?>"><?php echo$icat->name; ?></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">
<?php foreach($query as $row){
 $file = $row->image;
 $catName = $this->Mdlmaster->get_col_by_key('imagecategory','id',$row->category,'name');
		   $path = 'uploads/image_gellery/'.$file;
		   if(!empty($file) && file_exists($path)){
		      $imgUrl = base_url().$path;  
		      
		   
?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="<?php echo$imgUrl; ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?php echo$catName; ?></h4>
              <a href="<?php echo$imgUrl; ?>" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
            </div>
          </div>
<?php } } ?>
        </div>

      </div>
    </section><!-- End Portfolio Section -->
