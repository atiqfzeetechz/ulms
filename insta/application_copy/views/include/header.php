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
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		
		<title><?php echo$page_title; ?> - <?php echo$SchoolName; ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	   	<?php 
   include('script.php');
         ?>
	<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

      
	
	<link href="https://fonts.googleapis.com/css2?family=Arya&display=swap" rel="stylesheet">


      <!------ end firebase ----->
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
      
<script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-messaging.js"></script>


  


		</head>

	<body class="hold-transition sidebar-mini">
      
     

<div class="loading"></div>
<div class="wrapper">

  
	 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-info navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>

      </li>
      
        <li class="nav-item">
        <a class="nav-link" href="#">     
</a>

      </li>
    </ul>

    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
         Welcome <b><?php echo$user_name; ?></b>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url(); ?>user/profile" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
            
          </a>
         
         <a href="<?php echo base_url(); ?>user/change_password" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> Change Password
            
          </a>
          
          <a href="<?php echo base_url(); ?>user/logout" class="dropdown-item">
            <i class="fas fa-key mr-2"></i> Logout
            
          </a>
          
          
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>" class="brand-link">
    
      <span class="brand-text font-weight-light"><?php echo$SchoolName; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $user_name;  ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <?php include("menu_".$user_type.".php");?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 <div class="content-wrapper">
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $page_title; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
 </div>
  <section class="content">
  <div class="container-fluid">
<button id="subscribe">Subscribe to Notifications</button>
    <script>
        const firebaseConfig = {
            apiKey: "AIzaSyCyJAkZrDzv_U875YvkZXaXrL7Ekdk4HrU",
            authDomain: "whapy-notify.firebaseapp.com",
            projectId: "whapy-notify",
            storageBucket: "whapy-notify.appspot.com",
            messagingSenderId: "50370584711",
            appId: "1:50370584711:web:658412c001174aee08d822",
            measurementId: "G-SLREXQ06CM"

        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        document.getElementById('subscribe').addEventListener('click', () => {
       
            messaging.requestPermission().then(() => {
                console.log("Notification permission granted.");
                return messaging.getToken();
            }).then((token) => {
                console.log("FCM Token:", token);
                // Send token to your server
                fetch('<?php echo base_url("sms/register_token"); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ token: token })
                });
            }).catch((error) => {
                console.error("Unable to get permission to notify.", error);
            });
        });

        messaging.onMessage((payload) => {
            console.log('Message received. ', payload);
            // Show a notification
            const notificationTitle = payload.notification.title;
            const notificationOptions = {
                body: payload.notification.body,
                icon: 'icon-url' // Optional icon URL
            };

            new Notification(notificationTitle, notificationOptions);
        });
    </script>


    
   