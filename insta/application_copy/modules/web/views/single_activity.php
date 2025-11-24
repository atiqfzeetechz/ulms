
<div class="container">
    <br/>
    <div class="card">
        <div class="card-header">
            
        </div>
         <article data-aos="fade-up">
        <?php
        foreach($query as $row)
        {
           
            $file = $row->Image;
		   $path = 'uploads/activity/'.$file;
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
		   <h3><?php echo $row->Title;?></h3>
		   </div>
		   <div class="cantainer">
		    <div class="row">
		        <div class="col-sm-12">
                <ul>
                  <i class="icofont-user"></i> <?php echo $row->Added;?>&nbsp &nbsp 
                  
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