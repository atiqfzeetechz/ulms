
<div class="container">
    <br/>
    <div class="card">
        <div class="card-header">
            
        </div>
         <article data-aos="fade-up">
        <?php
        foreach($query as $row)
        {
           
            $file = $row->Image1;
		   $path = 'uploads/news/'.$file;
		   if(!empty($file) && file_exists($path)){
		      $imgUrl = base_url().$path;  
		   }
		   else
		   {
		       $imgUrl = base_url().'uploads/no_file.png';   
		   }
		   $string = strip_tags($row->Text);
		   ?>
		   <div>
		       
		   <img src="<?php echo $imgUrl?>" alt="" class="img-fluid" style="max-height:200px;">
		   </div>
		   <div  class="container">
		       <br/>
		   <h3><?php echo $row->NewsTitle;?></h3>
		   </div>
		   <div class="cantainer">
		    <div class="row">
		        <div class="col-sm-12">
                <ul>
                  <i class="icofont-user"></i> <?php echo $row->Place;?>&nbsp &nbsp 
                  <i class="icofont-wall-clock"></i><?php echo date('d-M-Y',strtotime($row->Date));?>
                &nbsp &nbsp  <i class="icofont-comment"></i>12 Comments
                </ul>
                </div>
             </div>
             </div>
              <div class="container">
                  <?php echo  $string ?>
              </div>
              	<br/>
               </article>
               
               </div>
              	<br/>
		<?php } ?>
    </div>
</div>