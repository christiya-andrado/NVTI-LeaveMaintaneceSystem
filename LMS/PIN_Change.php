<?php 
ob_start();
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

    <link rel="stylesheet" href="css/pin.css"> 
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>PIN Change</title>


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
    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 50%;
            border-radius: 5px;
            margin: 20px auto;
        }
        .success {
            background: #def2e4;
            color: #42a964;
            padding: 10px;
            width: 50%;
            border-radius: 5px;
            margin: 20px auto;
        }
    </style>
</head>

<body class="bg-light">  
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano" >
            <div class="nano-content">
                <ul >
                    <div class="logo" ><a href="Dashboard.php" >
                            <img src="images/logo.png" alt="" /><span >LEAVE MAINTANENCE SYSTEM</span></a></div> 
                    <li><a href="Dashboard.php" ><i class="ti-layout-grid2-alt" ></i> Dashboard</a></li>                    
                   
                            <li><a href="Leave_Application.php"><i class="ti-calendar"></i>Formal Leave Apply</a></li>

                        <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Profile <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="Profile.php">View Profile</a></li>
                            <li><a href="Proflie_Manage.php">Profile Management</a></li>
                        </ul></li>
                    <li><a href="PIN_Change.php"><i class="ti-key"></i> PIN Change</a></li>
                    <li><a href="Leave_Details.php"><i class="ti-list"></i> Leave Details</a></li>         
                                           
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
                                </span>                                
                            </div>
                            </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- /# sidebar -->



    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
              
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">PIN Change</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <center>
                <section id="main-content">
                    <div class="row">
                        <div class="container">
                            <div class="box" style="height: 650px;">
                            <form action="updatepin.php" method="post">
                                <h2 class="display-5 fw-bolder" align="center" style="margin-top:30px;">PIN Number Change</h2><br>
                                <br>
                                <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                                <?php if (isset($_GET['success'])) { ?>
                                    <p class="success"><?php echo $_GET['success']; ?></p>
                                <?php } ?>
                                <br>
                                <label style=" margin-right: 165px;">Current PIN Number</label><br>
                                <input type="text" name="opin" autofocus required>
                    
                                <label style=" margin-right: 150px;">Your New PIN Number</label><br>
                                <input type="text" name="npin">
            
                                <label style=" margin-right: 75px;">Confirm Your New PIN Number </label><br>
                                <input type="text" name="cnpin"><br>
                                            
                                <input type="submit" class="btn btn-lg btn-success"  value="Change" name="ok">
                            </form>                            
                                <!-- <div class="popup" id="popup">
                                    <img src="images/tick.png" width="150px" height="150px">
                                    <h2>Changed</h2>
                                    <p>Your PIN has been Changed.</p>
                                    <button type="button" onclick="closePopup()">OK</button>
                                </div>
                                <script>
                                    let popup = document.getElementById("popup");
                                    
                                    function openPopup(){
                                        popup.classList.add("open-popup");
                                    }
                            
                                    function closePopup(){
                                        popup.classList.remove("open-popup");
                                    }                            
                                </script>
                            </div>                         -->
                        </div>
                        </center>
                        <br>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                </section>
            </div>
        </div>
    </div>


    
    <!-- jquery vendor -->
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="js/lib/menubar/sidebar.js"></script>
    <script src="js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    
    <!-- bootstrap -->



    <script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.init.js"></script>
    <!-- scripit init-->
    <script src="js/lib/bootstrap.min.js"></script><script src="js/scripts.js"></script>
    <!-- scripit init-->

</body>
</html>

<?php       
    }
    else{
        header("Location: login.php");
        exit();
    }
?>