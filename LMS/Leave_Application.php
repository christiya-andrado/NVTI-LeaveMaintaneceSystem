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

    <link rel="stylesheet" href="css/pin.css"> 
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>leaveapply</title>


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
                                    <li class="breadcrumb-item active">Leave Application</li>
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

            <h2 class="display-5 fw-bolder"align="center">Employee Leave Request Form </h2>
                        <div class="col-lg-4">
                            
                <br><br>
                <form action="lvapplctn.php" method="post">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>
                <label style="margin-right:285px;"> EPF NO</label>
                <input type="text" name="epfno" required="required" value="<?php echo $_SESSION['epfno'];?>"  disabled>

                <label style="margin-right:215px;">Service Station</label>
                <input type="text" name="centre" required="required" value="<?php echo $_SESSION['centre'];?>"  disabled   >
                                               
                <label style="margin-right:250px;"> Designation</label>
                <input type="text" name="designation" required="required" value="<?php echo $_SESSION['designation'];?>"  disabled  >
                       
                <label style="margin-right:120px;">Date Of First Appointment</label>
                <input type="date" name="firstdate" value="<?php echo $_SESSION['firstdate'];?>"  disabled >
               
                <?php
                     $sql1="SELECT SUM(total_days) FROM leave_details WHERE Status = 1 AND Empid='".$_SESSION['empid']."'";
                     $res1=mysqli_query($con,$sql1);
                     while($row=mysqli_fetch_assoc($res1)) 
                     {
                         $tot_leaves=$row['SUM(total_days)'];
                     
                ?>
                <label style="margin-right:85px;">Leaves Taken In Current Year</label>
                <input type="text" name="totleaves" value="<?php echo $tot_leaves;}?>" disabled>

                 <!-- <label>  Center Name</label>
                <input type="text" name="ctrnm" required="required"   > -->
                     </div>
                     <div class="col-lg-4"><br> <br> 
                <label style="margin-right:180px;"> Type Of The Leave</label>
                <Select type="combo" name="leavetype" required="required">
                <option value="" style="color:#3e3e3e;">--Select Your Leave Type--</option>
                <option value="CL1" style="color:#9d1d40;">Medical Leave</option>
                <option value="CL2" style="color:#9d1d40;">Annual Leave</option>
                <option value="CL3" style="color:#9d1d40;">Casual Leave</option>
                <option value="CL4" style="color:#9d1d40;">Maternity Leave</option></Select>
                                                                                                                      
                <label style="margin-right:97px;">Date Of Commencing Leave</label>
                <input type="date" name="fromdate" >

                <label style="margin-right:120px;">Date Of Resuming Duties</label>
                <input type="date" name="todate" >
              
                <label style="margin-right:200px;">Number Of Days</label>
                 <input type="text" name="noofdays" required="required" >
           
                       

                      
                <label style="margin-right:180px;">Reason For Leave</label><br>
                <textarea rows="6"cols="30" name="leavereason"></textarea><br>

                <label style="margin-right:170px;"> Acting Officer Name</label>
                <input type="text" name="acting" required="required" >
                
                       
                         
                <input type="submit" class="btn btn-success btn-lg" style="height: 45px;" name="apply" value="Apply">

                </form>                                                   
                     </div>
            

            
            <div class="col-md-4"> <br><br>
                <div class="list-group" style="margin:0 auto; width:300px;">
                    <a href="#" class="list-group-item visitor">
                        <h5 class="pull-center" style="margin-top: 0.7em;">
                        Available Leaves
                        </h5>
                        <hr style="background-color:black; display: block; margin-top: 0.8em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 3px;">

                        <?php
                            $sql2="SELECT (21-(SUM(total_days))) FROM leave_details WHERE Status = 1 AND Empid='".$_SESSION['empid']."' AND CL_id='CL1'";
                            $res2=mysqli_query($con,$sql2);
                            while($row=mysqli_fetch_assoc($res2)) 
                            {
                                $blnc_leaves1=$row['(21-(SUM(total_days)))']; 
                                
                                if(is_null($blnc_leaves1))
                                {
                                    $blnc_leaves1=21;
                                }
                                else
                                {
                                    $blnc_leaves1=$blnc_leaves1;
                                }
                        ?>
                        <h4 class="list-group-item-heading count">
                            <?php echo $blnc_leaves1;}?></h4>
                        <p class="list-group-item-text">
                            Medical Leave</p>
                            <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1.5px;">
                    </a><a href="#" class="list-group-item facebook-like">
                        <h3 class="pull-right">
                           
                        </h3>
                        <?php
                            $sql3="SELECT (14-(SUM(total_days))) FROM leave_details WHERE Status = 1 AND Empid='".$_SESSION['empid']."' AND CL_id='CL3'";
                            $res3=mysqli_query($con,$sql3);
                            while($row=mysqli_fetch_assoc($res3)) 
                            {
                                $blnc_leaves2=$row['(14-(SUM(total_days)))'];                     

                                if(is_null($blnc_leaves2))
                                {
                                    $blnc_leaves2=14;
                                }
                                else
                                {
                                    $blnc_leaves2=$blnc_leaves2;
                                }
                        ?>
                        <h4 class="list-group-item-heading count">
                        <?php echo $blnc_leaves2;}?></h4>
                        <p class="list-group-item-text">
                            Casual Leave</p>
                            <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1.5px;">
                    </a><a href="#" class="list-group-item google-plus">
                        <h3 class="pull-right">
                            
                        </h3>
                        <?php
                            $sql4="SELECT (7-(SUM(total_days))) FROM leave_details WHERE Status = 1 AND Empid='".$_SESSION['empid']."' AND CL_id='CL2'";
                            $res4=mysqli_query($con,$sql4);
                            while($row=mysqli_fetch_assoc($res4)) 
                            {
                                $blnc_leaves3=$row['(7-(SUM(total_days)))'];                     

                                if(is_null($blnc_leaves3))
                                {
                                    $blnc_leaves4=07;
                                }
                                else
                                {
                                    $blnc_leaves3=$blnc_leaves3;
                                }
                        ?>
                        <h4 class="list-group-item-heading count">
                        <?php echo $blnc_leaves3;}?></h4>
                        <p class="list-group-item-text">
                            Annual Leave</p>
                            <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1.5px;">
                    </a><a href="#" class="list-group-item twitter">
                        <h3 class="pull-right">
                            
                        </h3>
                        <?php
                            $sql5="SELECT SUM(total_days) FROM leave_details WHERE Status = 1 AND Empid='".$_SESSION['empid']."' AND CL_id='CL4'";
                            $res5=mysqli_query($con,$sql5);
                            while($row=mysqli_fetch_assoc($res5)) 
                            {
                                $blnc_leaves4=$row['SUM(total_days)'];   
                                
                                if(is_null($blnc_leaves4))
                                {
                                    $blnc_leaves4=00;
                                }
                                else
                                {
                                    $blnc_leaves4=$blnc_leaves4;
                                }
                        ?>
                        <h4 class="list-group-item-heading count">
                        <?php echo $blnc_leaves4;}?></h4>
                        <p class="list-group-item-text">
                            Maternity Leave</p>
                            <h6 style="color:gray;"> -Taken- </h6>
                            <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1.5px;">
                    </a>
                </div>
                </div> 
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


<script src="js/bootstrap.bundle.js"></script>
         
         
         

</body>

</html>
<?php
}else{
     header("Location: login.php");
     exit();
}
?>