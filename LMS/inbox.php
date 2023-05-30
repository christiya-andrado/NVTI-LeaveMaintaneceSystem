<?php 
session_start();
include "connection.php";

if (isset($_SESSION['pin'])) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>Inbox</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/lib/weather-icons.css" rel="stylesheet" />
    <link href="css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano" >
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="index.php">
                            <!-- <img src="images/logo.png" alt="" /> --><span>Dashboard</span></a></div> 
                    <li><a href="Dashboard.php"><i class="ti-layout-grid2-alt"></i> Dashboard</a></li>                    
                     <li><a class="sidebar-sub-toggle"><i class="ti-calendar"></i> Leave Apply <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="Leave_Application.php">Formal Leave Apply</a></li>
                            <li><a href="Duty_Leave.php">Duty Leave</a></li>
                        </ul></li>

                        <li><a href="inbox.php"><i class="ti-email"></i> Inbox</a></li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-calendar"></i> Profile <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="Profile.php">View Profile</a></li>
                            <li><a href="Proflie_Manage.php">Profile Management</a></li>
                        </ul></li>
                    <li><a href="PIN_Change.php"><i class="ti-user"></i> PIN Change</a></li>
                    <li><a href="Leave_Details.php"><i class="ti-layout-grid2-alt"></i> Leave Details</a></li>         
                                           
                    <li><a href="index.php"><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <!-- nav bar start -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                    <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                            <?php include 'Profile3.php'; ?>
                            </div>
                            <div class="col-md-6">
                            <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar"><?php echo $_SESSION['empname']; ?>
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Your Profile</span>
                                       
                                    </div>
                                    <div class="dropdown-content-body">
                                    <ul>
                                            <li>
                                                
                                                <a href="profile2.php">
                                                    <i class="ti-user"></i>
                                                    <span>Profile</span>
                                                </a>
                                                
                                            </li>

                                            <li>
                                                <a href="inbox.php">
                                                    <i class="ti-email"></i>
                                                    <span>Inbox</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="Profile_Manage.php">
                                                    <i class="ti-settings"></i>
                                                    <span>Edit Profile</span>
                                                </a>
                                            </li>

                                           
                                            <li>
                                                <a href="index.php">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Start -->
    <div class="content-wrap">
        <div class="main">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12 p-r-0 title-margin-right">
                <div class="page-header">
                  <div class="page-title">
                    <h1>Hello, <span>Welcome Here</span></h1>
                  </div>
                </div>
              </div>
              <!-- /# Email -->
             
             
                              
                           
  
  

  
    <!-- jquery vendor -->
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="js/lib/menubar/sidebar.js"></script>
    <script src="js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="js/lib/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="js/lib/calendar-2/pignose.init.js"></script>


    <script src="js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="js/lib/weather/weather-init.js"></script>
    <script src="js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="js/lib/chartist/chartist.min.js"></script>
    <script src="js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="js/dashboard2.js"></script>
</body>

</html>

<?php
}else{
     header("Location: login.php");
     exit();
}
?>
