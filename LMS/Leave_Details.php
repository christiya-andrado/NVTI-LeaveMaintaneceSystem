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

    <link rel="stylesheet" href="css/leaveapp.css"> 
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
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
            <div class="container">
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
                                    <li class="breadcrumb-item"><a href="Dashboard.phps">Dashboard</a></li>
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
                        <h5>Available Leaves</h5>
                        <hr style="background-color:black; display: block; margin-top: 0.5em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 3px;">                                 
                        <div class="col-md-4">
                            <div class="list-group" style="margin-left:30px; margin-right:30px;">
                                <a href="#" class="list-group-item visitor">
                                    <h3 class="pull-right">
                                        
                                    </h3>     
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
                                    <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">                          
                                    <h4 class="list-group-item-heading count">
                                    <?php echo $blnc_leaves1;}?></h4>
                                    <p class="list-group-item-text">
                                        Medical Leave</p>
                                        <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                </a>                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="list-group" style="margin-left:30px; margin-right:30px;">
                                <a href="#" class="list-group-item facebook-like">
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
                                    <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                    <h4 class="list-group-item-heading count">
                                    <?php echo $blnc_leaves2;}?></h4>
                                    <p class="list-group-item-text">
                                        Casual Leave</p>
                                        <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                </a>
                            </div>                                        
                        </div>
                        <div class="col-md-4">
                            <div class="list-group" style="margin-left:30px; margin-right:30px;">
                                <a href="#" class="list-group-item google-plus">
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
                                    <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                    <h4 class="list-group-item-heading count">
                                    <?php echo $blnc_leaves3;}?></h4>
                                    <p class="list-group-item-text">
                                        Annual Leave</p>
                                        <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                </a> 
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>

                    <div class="row">                                      
                        <div class="col-md-12" style="width:100%;">
                            <form method="post">
                                <h5>Leave History</h5>
                                <hr style="background-color:black; display: block; margin-top: 0.5em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 3px;">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <thead  class="bg-dark">
                                            <th class="text-light" style="width:auto;"> # </th>
                                            <th class="text-light" style="width:auto;"> Taken Leave </th>
                                            <th class="text-light" style="width:auto;"> From </th>
                                            <th class="text-light" style="width:auto;"> To </th>
                                            <th class="text-light" style="width:auto;"> Number Of Leaves </th>
                                            <th class="text-light" style="width:auto;"> Status </th>
                                            <th class="text-light" style="width:auto;"> Admin Remarks </th>
                                        </thead>
                                    </tr>
                                    <?php
                                        $id=1;
                                        $sql="SELECT c.LeaveType, l.FromDate, l.ToDate, l.total_days, l.Status, l.Remark FROM  leave_details AS l INNER JOIN commanleave AS c ON l.CL_id=c.CL_id  WHERE Empid='".$_SESSION['empid']."'";
                                        $res=mysqli_query($con,$sql);
            
                                        if($res)
                                        {
                                            while($row=mysqli_fetch_assoc($res))
                                            {                                                  
                                                $tl=$row['LeaveType'];
                                                $from=$row['FromDate'];
                                                $to=$row['ToDate'];
                                                $totdys=$row['total_days'];
                                                $Status=$row['Status'];
                                                $remark=$row['Remark'];
                                                
                                                if($Status==0)
                                                {
                                                    $status='Pending';
                                                }
                                                else if($Status==1)
                                                {
                                                    $status='Approved';
                                                }
                                                else
                                                {
                                                    $status='Declined';
                                                }   
                                                
                                                ?>
                                                <tr>
                                                    <td scope="row"><?php echo $id++; ?> </td>
                                                    <td><?php echo $tl; ?></td>
                                                    <td  id="fdt"><?php echo $from; ?></td>
                                                    <td  id="tdt"><?php echo $to; ?></td>
                                                    <td><?php echo $totdys; ?></td>
                                                    <td><?php echo $status; ?></td>
                                                    <td><?php echo $remark; ?></td>
                                                </tr>   <?php                                            
                                            }
                                        }
                                        ?>
                                </table>
                            </form>
                        </div>
                    </div> 
                    <br>         
                    <br>
                    <div class="row">            
                        <h5>Taken Leaves</h5> 
                        <hr style="background-color:black; display: block; margin-top: 0.5em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 3px;">
                        <div class="col-md-4">
                            <div class="list-group" style="margin-left:30px; margin-right:30px;">
                                <a href="#" class="list-group-item visitor">
                                    <h3 class="pull-right">
                                     
                                    </h3>
                                    <?php
                                        $sql5="SELECT SUM(total_days) FROM leave_details WHERE Status = 1 AND Empid='".$_SESSION['empid']."' AND CL_id='CL1'";
                                        $res5=mysqli_query($con,$sql5);
                                        while($row=mysqli_fetch_assoc($res5)) 
                                        {
                                            $tkn_leaves1=$row['SUM(total_days)']; 
                                            
                                            if(is_null($tkn_leaves1))
                                            {
                                                $tkn_leaves1=00;
                                            }
                                            else
                                            {
                                                $tkn_leaves1=$tkn_leaves1;
                                            }
                                    ?>
                                    <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                    <h4 class="list-group-item-heading count">
                                    <?php echo $tkn_leaves1;}?></h4>
                                    <p class="list-group-item-text">
                                        Medical Leave</p>
                                        <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                </a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="list-group" style="margin-left:30px; margin-right:30px;">
                                <a href="#" class="list-group-item facebook-like">
                                    <h3 class="pull-right">
                                    
                                    </h3>
                                    <?php
                                        $sql6="SELECT SUM(total_days) FROM leave_details WHERE Status = 1 AND Empid='".$_SESSION['empid']."' AND CL_id='CL3'";
                                        $res6=mysqli_query($con,$sql6);
                                        while($row=mysqli_fetch_assoc($res6)) 
                                        {
                                            $tkn_leaves2=$row['SUM(total_days)'];                     

                                            if(is_null($tkn_leaves2))
                                            {
                                                $tkn_leaves2=00;
                                            }
                                            else
                                            {
                                                $tkn_leaves2=$tkn_leaves2;
                                            }
                                    ?>
                                    <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                    <h4 class="list-group-item-heading count">
                                    <?php echo $tkn_leaves2;}?></h4>
                                    <p class="list-group-item-text">
                                        Casual Leave</p>
                                        <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                </a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="list-group" style="margin-left:30px; margin-right:30px;">
                                <a href="#" class="list-group-item google-plus">
                                    <h3 class="pull-right">
                                        
                                    </h3>
                                    <?php
                                        $sql7="SELECT SUM(total_days) FROM leave_details WHERE Status = 1 AND Empid='".$_SESSION['empid']."' AND CL_id='CL2'";
                                        $res7=mysqli_query($con,$sql7);
                                        while($row=mysqli_fetch_assoc($res7)) 
                                        {
                                            $tkn_leaves3=$row['SUM(total_days)'];                     

                                            if(is_null($tkn_leaves3))
                                            {
                                                $tkn_leaves3=00;
                                            }
                                            else
                                            {
                                                $tkn_leaves3=$tkn_leaves3;
                                            }
                                    ?>
                                    <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                    <h4 class="list-group-item-heading count">
                                    <?php echo $tkn_leaves3;}?></h4>
                                    <p class="list-group-item-text">
                                        Annual Leave</p>
                                        <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                </a>  
                            </div>
                        </div>
                    </div>
                           
                    <div class="row">
                        <div class="col-md-4">
                            <div class="list-group" style="margin-left:30px; margin-right:30px;">
                                <a href="#" class="list-group-item twitter">
                                    <h3 class="pull-right">
                                       
                                    </h3>
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
                                    <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                    <h4 class="list-group-item-heading count">
                                    <?php echo $tkn_leaves4;}?></h4>
                                    <p class="list-group-item-text">
                                    Maternity Leave</p>
                                    <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="list-group" style="margin-left:30px; margin-right:30px;">
                                <a href="#" class="list-group-item twitter">
                                    <h3 class="pull-right">
                                       
                                    </h3>
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
                                    <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                    <h4 class="list-group-item-heading count">
                                    <?php echo $tkn_leaves5;}?></h4>
                                    <p class="list-group-item-text">
                                    Duty Leave</p>
                                    <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="list-group" style="margin-left:30px; margin-right:30px;">
                                <a href="#" class="list-group-item twitter">
                                    <h3 class="pull-right">
                                       
                                    </h3>
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
                                        }
                                    ?> 
                                    <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">                                   
                                    <h4 class="list-group-item-heading count">
                                    ?? </h4>
                                    <p class="list-group-item-text">
                                    No Pay</p>
                                    <hr style="background-color:black; display: block; margin-top: 0.4em; margin-bottom: 1em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;">
                                </a>
                            </div>
                        </div>                       
                    </div>
                    <!-- /# row -->
                </section>
            </div>
        </div>
    </div>

<br>
    
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
         
         
         <script>
        let popup = document.getElementById("popup");
        
        function openPopup(){
            popup.classList.add("open-popup");
        }

        function closePopup(){
            popup.classList.remove("open-popup");
        }

    </script>

</body>

</html>
<?php
}else{
     header("Location: login.php");
     exit();
}
?>