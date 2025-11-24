 <style> 
 li a.active{color:gold;}
 
 [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
     background-color: transparent;
     color: gold;
	 font-weight:bold;
}

 </style>
  <li class="nav-item">
            <a href="<?php echo base_url(); ?>dashboard" class="nav-link <?php if($page_title=='Dashboard'){ echo'active';}?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
               
              </p>
            </a>
      </li>

        <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>dailyupdate/insta_gellery" class="nav-link <?php if($page_title=='Insta Gellery'){ echo'active';}?>">
                  <i class="nav-icon fab fa-instagram"></i>
                  <p>Instagram post</p>
                </a>
          </li>


		<li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>dailyupdate/image_gellery" class="nav-link <?php if($page_title=='Image Gellery'){ echo'active';}?>">
                  <i class="nav-icon fab fa-whatsapp"></i>
                  <p>Whatsapp status</p>
                </a>
          </li>
		  
		<!--
        <li class="nav-item has-treeview <?php if($page_title=='Image Category' || $page_title=='Image Gellery'){ echo'menu-open';}?>">
            <a href="#" class="nav-link <?php if($page_title=='Image Category' || $page_title=='Image Gellery'){ echo'active';}?>">
              <i class="nav-icon fas fa-image"></i>
              <p>
               Media Gellery
                <i class="fas fa-angle-left right"></i>
               </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <a href="<?php echo base_url(); ?>dailyupdate/image_category" class="nav-link <?php if($page_title=='Image Category'){ echo'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Image Category</p>
                </a> 
				 <a href="<?php echo base_url(); ?>dailyupdate/image_gellery" class="nav-link <?php if($page_title=='Image Gellery'){ echo'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Image Gellery</p>
                </a>
				
              </li>
            </ul>
          </li>
		 -->
	  <li class="nav-item has-treeview <?php if($page_title=='Manage SMS'|| $page_title=='Manage SMS'){ echo'menu-open';}?>">
            <a href="#" class="nav-link <?php if($page_title=='Manage SMS'|| $page_title=='Manage SMS'){ echo'active';}?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Whatsapp SMS
                <i class="fas fa-angle-left right"></i>
               </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>sms/groups" class="nav-link <?php if($page_title=='Groups'){ echo'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Groups</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>sms/contact" class="nav-link <?php if($page_title=='Contact'){ echo'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>sms/send_single_sms" class="nav-link <?php if($page_title=='Send Whatsapp Msg'){ echo'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send Whatsapp Msg</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>sms/send_sms" class="nav-link <?php if($page_title=='Send Whatsapp'){ echo'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send Bulk Whatsapp Msg</p>
                </a>
              </li>
              
              
           
              
              
            </ul>
          </li>	 

	<li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>dailyupdate/message_history" class="nav-link <?php if($page_title=='Message History'){ echo'active';}?>">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Message history</p>
                </a>
          </li>
		  
		 