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

    <link rel="stylesheet" href="css/duty.css"> 
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Duty Leave Apply</title>


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
</head>

<body class="bg-light">
  
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures" >
        <div class="nano" >
            <div class="nano-content">
                <ul >
                    <div class="logo"><a href="Dashboard.php">
                            <!-- <img src="images/logo.png" alt="" /> --><span>Dashboard</span></a></div> 
                    <li><a href="Dashboard.php" ><i class="ti-layout-grid2-alt" ></i> Dashboard</a></li>                    
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
                                    <li class="breadcrumb-item active">Duty Leave</li>
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
                            <div class="box" style="height: 950px;">                        
                                <h2 class="display-5 fw-bolder"align="center" style="margin-top:30px;">Duty Leave Apply</h2><br>
                                <br>
                                <br>
                                    <label style=" margin-right: 165px;">Name Of The Officer</label><br>
                                    <input type="text" name="empname" required="required" value="<?php echo $_SESSION['empname']; ?>"  disabled>
                        
                                    <label style=" margin-right: 255px;">Designation</label><br>
                                            <input type="text" name="Designation" required="required">
                        
                                            <label style=" margin-right: 165px;">Duty Station Of Outer </label><br>
                                            <input type="text" name="DutyStationOfOuter" required="required"><br>
                                            <label style=" margin-right: 195px;">Mode Of The Duty </label><br>
                                            <input type="text"  name="ModeOfTheDuty" required="required"><br>
                                            <label style=" margin-right: 105px;">Date Engaged Duty In Outer</label><br>
                                            <input type="date" name="odate" >


                        
                                            
                                            <input type="submit" class="btn btn-lg"  value="apply" name="apply" style="background-color:transparent; border-color: #9d1d40; margin-bottom: 30px;" onclick="openPopup()">
                        
                                            <!-- <div class="popup" id="popup">
                                                <img src="images/tick.png" width="150px" height="150px">
                                                <h2>Duty Leave Apply</h2>
                                                <p>Your Duty Form Succesfully Received.</p>
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
                                            </div> -->
                        
                        </div>
                        </center>

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

<!-- Popup -->

<script src="js/bootstrap.bundle.js"></script>
         
<!--          
         <script>
        let popup = document.getElementById("popup");
        
        function openPopup(){
            popup.classList.add("open-popup");
        }

        function closePopup(){
            popup.classList.remove("open-popup");
        }

    </script> -->

</body>

</html>

<?php
if(isset($_POST['apply'])){
        $enpname=$_POST['empname'];
        $designation=$_POST['Designation'];
        $DutyStationOfOuter=$_POST['DutyStationOfOuter'];
        $ModeOfTheDuty=$_POST['ModeOfTheDuty'];
        $DateEngagedDutyInOuter=$_POST['odate'];

        $sql="INSERT INTO `duty_leave`(`EmpName`, `Designation`, `Duty_Station_Of_Outer`, `Mode_Of_The_Duty`, `Date_Engaged_Duty_In_Outer`) VALUES ('".$_SESSION['empname']."','$designation','$DutyStationOfOuter', '$ModeOfTheDuty', '$DateEngagedDutyInOuter')";

        $res=mysqli_query($con,$sql);

        if($res){
            echo "Record is Successfully stored";
        }
        else{
            die(mysqli_error($con));
        }        

    }
?>


<?php
}else{
     header("Location: login.php");
     exit();
}
?>