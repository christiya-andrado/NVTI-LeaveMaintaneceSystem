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
    <title>Employee Dashboard</title>
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

    <!-- Main Start -->
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Welcome To, <span>User Dashboard</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><img src="images/healthcare (5).png" alt="">
                                    </div>
                                    <div class="stat-content dib">
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
                                        <div><H6 style="color:#02116a;">MEDICAL LEAVE</H6></div>
                                        <div class="stat-digit" style="color:#2e01a0;"><?php echo $blnc_leaves1;}?>/21</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><img src="images/tie (1).png" alt=""></i>
                                    </div>
                                    <div class="stat-content dib">
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
                                        <div><H6 style="color:#02116a;">CASUAL LEAVE</H6></div>
                                        <div class="stat-digit" style="color:#2e01a0;"><?php echo $blnc_leaves2;}?>/14</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><img src="images/calendar.png" alt=""></i>
                                    </div>
                                    <div class="stat-content dib">
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
                                        <div><H6 style="color:#02116a;">ANNUAL LEAVE</H6></div>
                                        <div class="stat-digit" style="color:#2e01a0;"><?php echo $blnc_leaves3;}?>/07</div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><img src="images/love (3).png" alt=""></i></div>
                                    <div class="stat-content dib">
                                    <?php
                                        $sql8="SELECT SUM(total_days) FROM leave_details WHERE Status = 1 AND Empid='".$_SESSION['empid']."' AND CL_id='CL4'";
                                        $res8=mysqli_query($con,$sql8);
                                        while($row=mysqli_fetch_assoc($res8)) 
                                        {
                                            $tkn_leaves4=$row['SUM(total_days)'];   
                                            
                                            if(is_null($tkn_leaves4))
                                            {
                                                $tkn_leaves4='00';
                                            }
                                            else
                                            {
                                                $tkn_leaves4=$tkn_leaves4;
                                            }
                                    ?>
                                        <div><H6 style="color:#02116a;">MATERNITY LEAVE</H6></div>
                                        <div class="stat-digit" style="color:#2e01a0;"><?php echo $tkn_leaves4;}?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><img src="images/planner.png" alt=""></i></div>
                                    <div class="stat-content dib">
                                    <?php
                                        $sql9="SELECT SUM(total_days) FROM leave_details WHERE Status = 1 AND Empid='".$_SESSION['empid']."' AND CL_id='CL5'";
                                        $res9=mysqli_query($con,$sql9);
                                        while($row=mysqli_fetch_assoc($res9)) 
                                        {
                                            $tkn_leaves5=$row['SUM(total_days)'];   
                                            
                                            if(is_null($tkn_leaves5))
                                            {
                                                $tkn_leaves5='00';
                                            }
                                            else
                                            {
                                                $tkn_leaves5=$tkn_leaves5;
                                            }
                                    ?>
                                        <div> <H6 style="color:#02116a;">DUTY LEAVE</H6></div>
                                        <div class="stat-digit" style="color:#2e01a0;"><?php echo $tkn_leaves5;}?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><img src="images/no-fee.png" alt=""></i></div>
                                    <div class="stat-content dib">
                                        <div><H6 style="color:#02116a;">NO PAY</H6></div>
                                        <div class="stat-digit" style="color:#2e01a0;">00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        
                        <!-- /# column -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title pr">
                                    <h4>Recent Leave Records</h4>
                                </div>
                                <!-- <div class="card-body"> -->
                                    <div class="table-responsive">
                                        <table class="table student-data-table m-t-20">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th style="color:#9d1d40;"  align="center">Leave Type</th>
                                                    <th style="color:#9d1d40;" align="center">Reason</th>
                                                    <th style="color:#9d1d40;" align="center">From Date</th>
                                                    <th style="color:#9d1d40;" align="center">To Date</th>
                                                    <th style="color:#9d1d40;" align="center"> Leave Days </th>
                                                    <th style="color:#9d1d40;" align="center">Applied</th>
                                                    <th style="color:#9d1d40;" align="center">Admin's Remark</th>
                                                    <th style="color:#9d1d40;" align="center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                        $id=1;
                                        $sql="SELECT c.LeaveType,l.Reason, l.FromDate, l.ToDate, l.total_days, l.AppliedDate, l.Remark, l.Status FROM  leave_details AS l INNER JOIN commanleave AS c ON l.CL_id=c.CL_id WHERE Empid='".$_SESSION['empid']."' ORDER BY l.LD_Id DESC";
                                        $res=mysqli_query($con,$sql);
            
                                        if($res)
                                        {
                                            while($row=mysqli_fetch_assoc($res))
                                            {                                                  
                                                $tl=$row['LeaveType'];
                                                $reason=$row['Reason'];
                                                $from=$row['FromDate'];
                                                $to=$row['ToDate'];
                                                $totdys=$row['total_days'];
                                                $applied=$row['AppliedDate'];
                                                $Status=$row['Status'];
                                                $remark=$row['Remark'];
                                                
                                                if($Status==0)
                                                {
                                                    $status='<span style="color: blue">Pending <img src="images/loading.png"></span>';
                                                }
                                                else if($Status==1)
                                                {
                                                    $status='<span style="color: green">Approved <img src="images/check-mark.png"></span>';
                                                }
                                                else
                                                {
                                                    $status='<span style="color: red">Declined <img src="images/crossed.png"></span>';
                                                }   
                                                
                                                ?>
                                                <tr>
                                                    <td scope="row"><?php echo $id++; ?> </td>
                                                    <td style="color:#773698;"><?php echo $tl; ?></td>
                                                    <td style="color:#773698;"><?php echo $reason; ?></td>
                                                    <td  id="fdt" style="color:#773698;"><?php echo $from; ?></td>
                                                    <td  id="tdt" style="color:#773698;"><?php echo $to; ?></td>
                                                    <td style="color:#773698;" align="center"><?php echo $totdys; ?></td>
                                                    <td style="color:#773698;"><?php echo $applied; ?></td>                                                    
                                                    <td style="color:#773698;"><?php echo $remark; ?></td>
                                                    <td><?php echo $status; ?></td>
                                                </tr>   <?php                                            
                                            }
                                        }
                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <!-- </div> -->
                            </div>
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