<?php 
$user_type   = $this->session->userdata('user_details')[0]->user_type;
$users_id    = $this->session->userdata('user_details')[0]->users_id;
$user_name   = $this->session->userdata('user_details')[0]->name;
$SchoolName        =    getSystemColumn('CompanyName');
$SchoolMobile1     =    getSystemColumn('CompanyMobile');
$SchoolEmail       =    getSystemColumn('CompanyEmail');
$SchoolSession     =    getActiveSession();
$SchoolAddress     =    getSystemColumn('CompanyAddress');

$ActiveCompanyName =    $this->Mdlmaster->get_col_by_key('companymaster','CompanyId',getActiveCompany(),'CompanyName');
$ActiveSessionName =    $this->Mdlmaster->get_col_by_key('sessionmaster','SessionId',$SchoolSession,'Session');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo$page_title; ?> - <?php echo$SchoolName; ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	   	<?php 
   include('script.php');
         ?>
			<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<style type="text/css"> 
.dataTables_filter {
   float: left !important;
}

	.table-container{overflow-x:scroll;}
	
	
	
	
	/* ------
   bootstrap DatePicker 
   					-----*/
     .datepicker {
     top: 0;
     left: 0;
     width: 216px;
     height: auto;
     font: 9pt 'Gotham', Arial, Helvetica, Sans-Serif;
     -webkit-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .5);
     -moz-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .5);
     box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .5);
     -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
     border-radius: 4px;
 }
 /* day title */
 .dow {
  border-bottom: 1px solid #bbb;
 }
 /* bootstrap ddm */
.dropdown-menu {
     border-radius:0px;
     padding:0
 }
 .datepicker:before {
     content:'';
     display: inline-block;
     border-left: 7px solid transparent;
     border-right: 7px solid transparent;
     border-bottom: 7px solid #ccc;
     border-bottom-color: rgba(0, 0, 0, 0.2);
     position: absolute;
     top: -7px;
     left: 6px;
 }
 .datepicker:after {
     content:'';
     display: inline-block;
     border-left: 6px solid transparent;
     border-right: 6px solid transparent;
     border-bottom: 6px solid #ffffff;
     position: absolute;
     top: -6px;
     left: 7px;
 }
 .datepicker > div {
     display: none;
 }
 .datepicker table {
     width: 100%;
     margin: 0;
 }
 
 .datepicker tbody td:last-child {
	border-right: 0px;
}
 .datepicker tbody tr {
	border-bottom: 1px solid #bbb;
}
 .datepicker tbody tr:last-child {
	border-bottom: 0px;
}


  /* main DP nums*/
 .datepicker td{
  	border-right: 1px solid #bbb;
  	 border-bottom: 1px solid #bbb;
     text-align: center; 
     	color: #666666;
     	font-weight: bold;
	text-shadow: 1px 1px 0px #fff;
	filter: dropshadow(color=#fff, offx=1, offy=1);	
	width: 30px;
	height: 20px;
 	background: #ededed;
	background: -moz-linear-gradient(top,  #ededed 0%, #dedede 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ededed), color-stop(100%,#dedede));
	background: -webkit-linear-gradient(top,  #ededed 0%,#dedede 100%);
	background: -o-linear-gradient(top,  #ededed 0%,#dedede 100%);
	background: -ms-linear-gradient(top,  #ededed 0%,#dedede 100%);
	background: linear-gradient(top,  #ededed 0%,#dedede 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ededed', endColorstr='#dedede',GradientType=0 );
	-webkit-box-shadow: inset 1px 1px 0px 0px rgba(250, 250, 250, .5);
	-moz-box-shadow: inset 1px 1px 0px 0px rgba(250, 250, 250, .5);
	box-shadow: inset 1px 1px 0px 0px rgba(250, 250, 250, .5);
 }
  /* top part bg */
 .datepicker th {
     text-align: center;
     	color: #666666;
	text-shadow: 1px 0px 0px #fff;
	filter: dropshadow(color=#fff, offx=1, offy=0);
 	width: 30px;
	height: 20px;
     background-color: #f7f7f7;
     background-image: -moz-linear-gradient(top, #f7f7f7 0%, #f1f1f1 100%);
     background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f7f7f7), color-stop(100%, #f1f1f1));
     background-image: -webkit-linear-gradient(top, #f7f7f7 0%, #f1f1f1 100%);
     background-image: -o-linear-gradient(top, #f7f7f7 0%, #f1f1f1 100%);
     background-image: -ms-linear-gradient(top, #f7f7f7 0%, #f1f1f1 100%);
     background-image: linear-gradient(top, #f7f7f7 0%, #f1f1f1 100%);
     filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f7f7f7', endColorstr='#f1f1f1', GradientType=0);

 }



 /* -- day --- */
 .datepicker td.day:hover {
     background: #6e8ee6;
     
     cursor: pointer;
     	text-shadow: 1px 0px 0px #000000;
 }
 /*  off month days -- */
 .datepicker td.old, .datepicker td.new {
     color: #9c9c9c;
     background: #ffffff;
 }
 .datepicker td.active, .datepicker td.active:hover {
 
 	background: #6eafbf;
	-webkit-box-shadow: inset 0px 0px 10px 0px rgba(0, 0, 0, .1);
	-moz-box-shadow: inset 0px 0px 10px 0px rgba(0, 0, 0, .1);
	box-shadow: inset 0px 0px 10px 0px rgba(0, 0, 0, .1);
	color: #e0e0e0;
	text-shadow: 0px 1px 0px #1731a2;
	filter: dropshadow(color=#4d7a85, offx=0, offy=1);
	border: 1px solid #55838f;
	position: relative;
	margin: -1px;

 }
 .datepicker td.active:hover, .datepicker td.active:hover:hover, .datepicker td.active:active, .datepicker td.active:hover:active, .datepicker td.active.active, .datepicker td.active:hover.active, .datepicker td.active.disabled, .datepicker td.active:hover.disabled, .datepicker td.active[disabled], .datepicker td.active:hover[disabled] {
     background-color: #0045cc;
 }
 .datepicker td.active:active, .datepicker td.active:hover:active, .datepicker td.active.active, .datepicker td.active:hover.active {
     background-color: #003399 \9;
 }
 .datepicker td span {
     display: block;
     width: 47px;
     height: 54px;
     line-height: 54px;
     float: left;
     margin: 2px;
     cursor: pointer;
     -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
     border-radius: 4px;
 }
 /* big month */
 .datepicker td span:hover {
     
 }
 .datepicker td span.active {
     background-color: #006dcc;
     background-image: -moz-linear-gradient(top, #0088cc, #0044cc);
     background-image: -ms-linear-gradient(top, #0088cc, #0044cc);
     background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
     background-image: -webkit-linear-gradient(top, #0088cc, #0044cc);
     background-image: -o-linear-gradient(top, #0088cc, #0044cc);
     background-image: linear-gradient(top, #0088cc, #0044cc);
     background-repeat: repeat-x;
     filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0088cc', endColorstr='#0044cc', GradientType=0);
     border-color: #0044cc #0044cc #002a80;
     border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
     filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
     color: #fff;
     text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
 }
 .datepicker td span.active:hover, .datepicker td span.active:active, .datepicker td span.active.active, .datepicker td span.active.disabled, .datepicker td span.active[disabled] {
    
 }
 .datepicker td span.active:active, .datepicker td span.active.active {
     background-color: #003399 \9;
 }
 .datepicker td span.old {
     color: #bcbcbc;
 }
 /*--- month header ---- */
 .datepicker th.switch {
     width: 145px;
     background-color: #006dcc;
     background-image: -moz-linear-gradient(top, #0088cc, #0044cc);
     background-image: -ms-linear-gradient(top, #0088cc, #0044cc);
     background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
     background-image: -webkit-linear-gradient(top, #0088cc, #0044cc);
     background-image: -o-linear-gradient(top, #0088cc, #0044cc);
     background-image: linear-gradient(top, #0088cc, #0044cc);
     background-repeat: repeat-x;
     filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0088cc', endColorstr='#0044cc', GradientType=0);
     border-color: #0044cc #0044cc #002a80;
     border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
     filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
     color: #fff;
     text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
 }
 .datepicker th.next, .datepicker th.prev {
     font-size: 19.5px;
     background-color: #006dcc;
     background-image: -moz-linear-gradient(top, #0088cc, #0044cc);
     background-image: -ms-linear-gradient(top, #0088cc, #0044cc);
     background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
     background-image: -webkit-linear-gradient(top, #0088cc, #0044cc);
     background-image: -o-linear-gradient(top, #0088cc, #0044cc);
     background-image: linear-gradient(top, #0088cc, #0044cc);
     background-repeat: repeat-x;
     filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0088cc', endColorstr='#0044cc', GradientType=0);
     border-color: #0044cc #0044cc #002a80;
     border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
     filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
     color: #fff;
     text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
 }
 .datepicker thead tr:first-child th {
     cursor: pointer;
 }
 /* --- Top controls hover-- */
 .datepicker thead tr:first-child th:hover {
     background: #24449a
 }
 .input-append.date .add-on i, .input-prepend.date .add-on i {
     display: block;
     cursor: pointer;
     width: 16px;
     height: 16px;
 }
    

#country_table table thead{background:#F5F5F5;}
	</style>
	
	

	<style>
.loading {
	display:none;
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('<?php echo base_url(); ?>uploads/loader2.gif') 50% 50% no-repeat rgb(249,249,249);
	background-size:100px;
    opacity: .8;
}
</style>
	
<style>
    .form-group{margin-top:50px;position:relative;}
    .error {
      color: red;

   }
   .SearchBox{margin-bottom:10px;background:#dcdcdc;}
   
   .ui-menu {
    list-style: none;
    padding: 0;
    margin: 0;
    display: block;
    outline: none;
	border:1px solid #444;
	background:#DCDCDC;
	color:
	
}

.AdvanceFeature{display:;}
  nav.main_navbar{background:#fcfc80;}
  nav.main_navbar a{color:#000;}
  nav.main_navbar #myNavbar li a{color:#000;}
  
  

  

  
  .nav>li>a:focus, .nav>li>a:hover {
        text-decoration: none;
        background-color: transparent !important;
  }
  
  ul.dropdown-menu{background:#fcfc80;}
  ul.dropdown-menu>li>a:focus, ul.dropdown-menu	>li>a:hover {
        text-decoration: none;
        background-color: transparent !important;
  }
  
  .btn-default,.btn-default:hover{background:#fcfc80;color:#000;}
  
  
</style>

		</head>

	<body class="no-skin">
	<div class="loading"></div>
	<div class="main_div">
	
	<nav class="navbar main_navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="color:#fff;">
        <b>MENU</b>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">HOME</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav main_menu">
        
		<?php include('menu_'.$user_type.'.php'); ?>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
      <li class="dropdown active">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i> Welcome <b><?php echo $user_name; ?></b>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
		<!--<li><a href="<?php echo base_url(); ?>user/logout"><span class="fa fa-user"></span> Profile</a></li>-->
		<li><a href="<?php echo base_url(); ?>user/change_password"><span class="fa fa-key"></span> Change Password</a></li>
         <li><a href="<?php echo base_url(); ?>user/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		  
		 </ul>
      </li>
	  
	 </ul>
    </div>
  </div>
</nav>

</div>

				
	
					<div class="container-fluid">
				
						<div class="row" style="border:1px solid #dcdcdc;padding:5px;">
							<div class="col-md-3 col-xs-2">
								<i class="ace-icon fa fa-info-circle"></i>
								<a href="javascript:void(0)"><?php echo$page_title; ?></a>
							</div>
							<div class="col-md-6 col-xs-8 AdvanceFeature" align="center"><?php //include('searchForm.php'); ?><b><?php echo $ActiveCompanyName; ?></b></div>
							<div class="col-md-3 col-xs-2">
	<span style="font-weight:bold;" class="pull-right"><a href="javascript:void(0)" data-toggle="modal" data-target="#sessionSwitchModal">
	<?php echo $ActiveSessionName; ?>
	</a></span>
							</div>
							
							
							
					     </div>
	             
