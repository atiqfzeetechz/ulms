<?php
//top
$system_name        =	getSystemColumn('SchoolName');
$academic_address   =	getSystemColumn('SchoolAddress');
$academic_mobile    =	getSystemColumn('SchoolMobile1');
$academic_session   =	getSystemColumn('SchoolSession');
$academic_email     =	getSystemColumn('SchoolEmail');
$academic_board     =	getSystemColumn('SchoolBoard');
$academic_mobile2   =	getSystemColumn('SchoolMobile2');


$academic_regNo     =	getSystemColumn('SchoolRegistraionNumber');
$logo               =	getSystemColumn('SchoolLogo');
$logo2              =	getSystemColumn('SchoolBoardLogo');


		
?>
<table style="width:90%;margin:auto;">
  <tr>
   <td></td>
   <td align="center"><h3 style="text-transform:uppercase;"><b><?php echo$system_name; ?></b></h3>
 ( Affiliated to <?php echo$academic_board ; ?> - <?php  echo$academic_regNo; ?> )<br>
  <?php echo$academic_address; ?>
 
   </td>
   <td align="right"></td>
   
   </tr>


<table>