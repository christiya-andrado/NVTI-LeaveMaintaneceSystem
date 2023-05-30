<?php
  include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Super Admin | Dashboard</title>
     <style>
      #count{
        border-radius:50%;
        position: relative;
        top:-10px;
        left:-10px;
      }

      a{
        text-decoration:none;
        color:white;
      }
    </style> 
  </head>
  <body>
    <!-- top navigation bar -->
    
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#9d1d40 ;">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <img src="vta.png" width="62px" alt="" style="background:white; border-radius: 5px; margin-right: 10px;">
        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold "
          href="#"
          >Leave Maintanance System</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button> 

       

        <div class="collapse navbar-collapse" id="topNavBar">
          

          <form class="d-flex ms-auto my-3 my-lg-0">
            &nbsp;            
            <?php
              $sql="SELECT * FROM leave_details WHERE is_read=0";
              $res=mysqli_query($con,$sql);
              $count=mysqli_num_rows($res);
            ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">                    
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="notification (2).png" alt="notification"> 
                         <span class="badge" id="count" style="font-size:15px; background-color:Cornsilk; color:Purple;"> <?php echo $count; ?> </span>                        
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                            $res1=mysqli_query($con,"SELECT * FROM leave_details WHERE is_read=0");
                            if(mysqli_num_rows($res1)>0)
                            {                          
                              while($row=mysqli_fetch_assoc($res1))
                              {
                                echo '<li><a class="dropdown-item" href="leaveview.php?id='.$row['LD_Id'].'">'.$row['Reason'] .'</a></li>';
                                echo "<div class='dropdown-divider'> </div>";                            
                              }
                            }
                            else
                            {
                              echo '<li><a class="dropdown-item text-danger font-weight-bold" href="#"> No More Messages </a></li>';
                            }
                    ?>                                                
                  </ul>
                </li>                    
              </ul>                
            </div>            
          </form>          
          &nbsp;        
          <ul class="navbar-nav">
            <li class="nav-item dropdown bg-dark text-white " style="border-radius: 5px;">
              
              <a
                class="nav-link dropdown-toggle ms-1"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
              
                <i class="bi bi-person-circle"></i>
              </a>
            
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person-bounding-box"></i> | Edit Profile</a></li>
                <li><a class="dropdown-item" href="#"></a></li>
                <li>
                  <a class="dropdown-item" href="#"><i class="bi bi-box-arrow-left"></i> | Logout</a>
                </li>
                
              </ul>
           
            </li>
          </ul>
        </div>
        
      </div>
      
      
    </nav>
    
    <!-- top navigation bar -->
    <!-- offcanvas -->
    
    <div
      class="offcanvas offcanvas-start sidebar-nav " style="background-color:#9d1d40  ;"
      tabindex="-1"
      id="sidebar"
    >
    <hr class="dropdown-divider bg-light my-lg-0" />

    


      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <br><br>
          <ul class="navbar-nav">
            
            <li>
              <div class=" small fw-bold text-uppercase px-3 mb-2" style="color: #ecd8d8 ;">
                Super Admin
              </div>
            </li>
            <li>
              <a href="#" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="small fw-bold text-uppercase px-3 mb-3" style="color: #ecd8d8 ;">
                Employee Management
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                 
                
                href="#layouts"
                
              >


                <span class="me-2"><i class="bi bi-layout-split"></i></span>
                <span>Employee Details</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>



              <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-person-plus-fill"></i
                      ></span>
                      <span>Add New Employee</span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-person-bounding-box"></i
                      ></span>
                      <span>Manage Exist Employees</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Pages</span>
              </a>
            </li> -->

            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="small fw-bold text-uppercase px-3 mb-3" style="color: #ecd8d8 ;">
                Admin Management
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#Admin"
              >
                <span class="me-2"><i class="bi bi-layout-split"></i></span>
                <span>Admin Details</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="Admin">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-person-plus-fill"></i
                      ></span>
                      <span>Register New Admin</span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-person-bounding-box"></i
                      ></span>
                      <span>Manage Exist Admins</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Pages</span>
              </a>
            </li> -->

            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class=" small fw-bold text-uppercase px-3 mb-3" style="color: #ecd8d8 ;">
                Leave Management
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#leave"
              >
                <span class="me-2"><i class="bi bi-layout-split"></i></span>
                <span>Leave Details</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="leave">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Total History</span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Approved Leave</span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Pending Leaves</span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Declined</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Add Holidays</span>
              </a>
            </li>
            
          </ul>

          <Br></Br><Br>

            
                
                <button class="btn bg-dark text-white" type="submit" style="
                border-radius: 5px; margin-left: 15px;" name="b1">
                <i class="bi bi-search"></i> | Search
                  
                </button>
              

            <br><br>

          <button type="button" class="btn bg-dark text-white" style="
          border-radius: 5px; margin-left: 15px;" name="b2" ><i class="bi bi-box-arrow-left"></i> | Logout</button>

          <br><br>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-md-12">
            <h4 style="font-size: 30px;">Welcome To Admin Dashboard</h4>
          </div>

          <hr height="50px">
          
        </div>
        
        <div class="row">
          <div class="col-md-3 mb-3">
            <div class="card  text-white h-70" style="background-color:#8f1739;">
              <br>
              <div class="card-heading">
                <div class="row">
                  <div class="col-sm-3"><img src="application.png" alt="" style="margin-left:18px;"></div>
                  <div class="col-sm-9">
                  <?php
                        $sql2="SELECT COUNT(l.LD_Id)FROM commanleave AS c INNER JOIN leave_details AS l ON l.CL_id=c.CL_id INNER JOIN employee AS e ON e.Empid=l.Empid WHERE l.Status=0 AND l.AppliedDate> DATE_SUB(NOW(), INTERVAL 24 HOUR)";
                        $res2=mysqli_query($con,$sql2);
                        while($row2=mysqli_fetch_assoc($res2)) 
                        {
                            $totaplcns=$row2['COUNT(l.LD_Id)']; 
                            
                            if(($totaplcns)==0)
                            {
                                $totaplcns='00';
                            }
                            else
                            {
                                $totaplcns=$totaplcns;
                            }
                    ?>
                  <h5 style="margin-left:38px;">Today Applications</h5>
                  </div>
                  <center><h6><?php echo $totaplcns;}?></h6></center>
                </div>
              </div>
              <div class="card-footer d-flex text-light" style="background-color:#000;">
                <a href="tdypendinglev.php">
                  View Details
                  <span class="ms-auto">
                    <i class="bi bi-chevron-right"></i>
                  </span>
                </a> 
              </div> 
            </div>
          </div>


          <div class="col-md-3 mb-3">
            <div class="card  text-white h-70" style="background-color:#8f1739;">
              <br>
              <div class="card-heading">
                <div class="row">
                  <div class="col-sm-3"><img src="loading (4).png" alt="" style="margin-left:18px;"></div>
                  <div class="col-sm-9">
                  <?php
                        $sql4="SELECT COUNT(LD_Id) from leave_details WHERE Status=0;";
                        $res4=mysqli_query($con,$sql4);
                        while($row4=mysqli_fetch_assoc($res4)) 
                        {
                            $pndng=$row4['COUNT(LD_Id)']; 
                            
                            if(($pndng)==0)
                            {
                                $pndng='00';
                            }
                            else
                            {
                                $pndng=$pndng;
                            }
                    ?> 
                  <h5 style="margin-left:38px;">Pending Applications</h5>
                  </div>
                  <center><h6><?php echo $pndng;}?></h6></center>
                </div>
              </div>
              <div class="card-footer d-flex text-light" style="background-color:#000;">
                <a href="pendinglev.php">
                  View Details
                  <span class="ms-auto">
                    <i class="bi bi-chevron-right"></i>
                  </span>
                </a> 
              </div>
            </div>
          </div>



          <div class="col-md-3 mb-3">
            <div class="card  text-white h-70" style="background-color:#8f1739;">
              <br>
              <div class="card-heading">
                <div class="row">
                  <div class="col-sm-3"><img src="quality.png" alt="" style="margin-left:18px;"></div>
                  <div class="col-sm-9">
                  <?php
                        $sql5="SELECT COUNT(LD_Id) from leave_details WHERE Status=1;";
                        $res5=mysqli_query($con,$sql5);
                        while($row5=mysqli_fetch_assoc($res5)) 
                        {
                            $aprvd=$row5['COUNT(LD_Id)']; 
                            
                            if(($aprvd)==0)
                            {
                                $aprvd='00';
                            }
                            else
                            {
                                $aprvd=$aprvd;
                            }
                    ?>
                  <h5 style="margin-left:38px;">Approved Applications</h5>
                  </div>
                  <center><h6><?php echo $aprvd;}?></h6></center>
                </div>
              </div>
              <div class="card-footer d-flex text-light" style="background-color:#000;">
                <a href="approvedlev.php">
                  View Details
                  <span class="ms-auto">
                    <i class="bi bi-chevron-right"></i>
                  </span>
                </a> 
              </div>
            </div>
          </div>


          <div class="col-md-3 mb-3">
            <div class="card  text-white h-70" style="background-color:#8f1739;">
              <br>
              <div class="card-heading">
                <div class="row">
                  <div class="col-sm-3"><img src="decline.png" alt="" style="margin-left:18px;"></div>
                  <div class="col-sm-9">
                  <?php
                        $sql6="SELECT COUNT(LD_Id) from leave_details WHERE Status=2;";
                        $res6=mysqli_query($con,$sql6);
                        while($row6=mysqli_fetch_assoc($res6)) 
                        {
                            $dclnd=$row6['COUNT(LD_Id)']; 
                            
                            if(($dclnd)==0)
                            {
                                $dclnd='00';
                            }
                            else
                            {
                                $dclnd=$dclnd;
                            }
                    ?>
                  <h5 style="margin-left:38px;">Declined Applications</h5>
                  </div>
                  <center><h6><?php echo $dclnd;}?></h6></center>
                </div>
              </div>
              <div class="card-footer d-flex text-light" style="background-color:#000;">
                <a href="declinedlev.php">
                  View Details
                  <span class="ms-auto">
                    <i class="bi bi-chevron-right"></i>
                  </span>
                </a> 
              </div>
            </div>
          </div>

          

      <div class="row" style="padding:10px;">
        <div class="col-md-6 mb-3">
          <div class="card  text-light h-70" style="background-color:#8f1739  ;">
            <br>
            <div class="card-heading">
                <div class="row">
                  <div class="col-sm-3"><img src="office-worker.png" alt="" style="margin-left:18px; margin-bottom:18px; background-color:white;"></div>
                  <div class="col-sm-9">
                  <?php 
                        $sql7="SELECT (SELECT COUNT(Empid) FROM employee)-(SELECT COUNT(Empid) FROM leave_details WHERE Status=1 AND CURDATE() BETWEEN FromDate AND ToDate)";
                        $res7=mysqli_query($con,$sql7);
                        while($row=mysqli_fetch_assoc($res7)) 
                        {
                            $dty=$row['(SELECT COUNT(Empid) FROM employee)-(SELECT COUNT(Empid) FROM leave_details WHERE Status=1 AND CURDATE() BETWEEN FromDate AND ToDate)']; 
                            
                            if(($dty)==0)
                            {
                                $dty='00';
                            }
                            else
                            {
                                $dty=$dty;
                            }
                    ?>
                  <h3 style="margin-left:5px; margin-right:5px;">Today Employees In Duty</h3>
                  <center><h6><?php echo $dty;}?></h6></center>
                  </div>                  
                </div>
              </div>
              <div class="card-footer d-flex text-light" style="background-color:#000;">
                <a href="tdypendinglev.php">
                  View Details
                  <span class="ms-auto">
                    <i class="bi bi-chevron-right"></i>
                  </span>
                </a> 
              </div>
          </div>
        </div>

        <div class="col-md-6 mb-3">
          <div class="card  text-light h-70" style="background-color:#8f1739  ;">
            <br>
            <div class="card-heading">
                <div class="row">
                  <div class="col-sm-3"><img src="comfort-zone.png" alt="" style="margin-left:18px; margin-bottom:18px; background-color:white;"></div>
                  <div class="col-sm-9">
                  <?php
                        $sql8="SELECT COUNT(Empid) FROM leave_details WHERE Status=1 AND CURDATE() BETWEEN FromDate AND ToDate;";
                        $res8=mysqli_query($con,$sql8);
                        while($row=mysqli_fetch_assoc($res8)) 
                        {
                            $lv=$row['COUNT(Empid)']; 
                            $_SESSION["lv"]=$lv;
                            
                            if(($lv)==0)
                            {
                                $lv='00';
                            }
                            else
                            {
                                $lv=$lv;
                            }
                    ?>
                  <h3 style="margin-left:-5px; margin-right:5px;">Today Employees In Leave</h3>
                  <center><h6><?php echo $lv;}?></h6></center>
                  </div>                  
                </div>
              </div>
              <div class="card-footer d-flex text-light" style="background-color:#000;">
                <a href="tdyleave.php">
                  View Details
                  <span class="ms-auto">
                    <i class="bi bi-chevron-right"></i>
                  </span>
                </a> 
              </div>
          </div>
        </div>
      </div>

<br><br>
<div class="row">
  <div class="col-md-12">
<div class="card" style="border: none;">
  <div class="card-header" style="border: none;">
        
    <span><i class="bi bi-table me-2"></i></span> Applications Within 1 week <span><i class="bi bi-arrow-down"></i></span>
  </div>
   
              <div class="card-body">
                <div class="single-table">
                  <div class="table-responsive">
                  <table class="table table-hover table-bordered table-striped progress-table text-center">
                      <thead class="text-uppercase">

                      <tr style="background-color:#ffa2a2 ; color:white">
                              <td>#</td>
                              <td>EPF No</td>
                              <td>Full Name</td>
                              <td width="120">Leave Type</td>
                              <td>Applied On</td>
                              <td>Current Status</td>
                              <td>Overview</td>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $s_no=1;
                            $sql3="SELECT e.P_EPFNo, e.C_EPFNo, e.EmpName, c.LeaveType, l.LD_Id, l.AppliedDate, l.Status FROM employee AS e INNER JOIN leave_details AS l ON e.Empid=l.Empid INNER JOIN commanleave AS c ON c.CL_id=l.CL_id  WHERE Status=0 OR Status=1 OR Status=2 AND l.AppliedDate > DATE_SUB(NOW(), INTERVAL 1 WEEK)";
                            // $sql3="SELECT e.P_EPFNo, e.C_EPFNo, e.EmpName, c.LeaveType, l.AppliedDate, l.Status FROM employee AS e INNER JOIN leave_details AS l ON e.Empid=l.Empid INNER JOIN commanleave AS c ON c.CL_id=l.CL_id  WHERE Status=0 OR Status=1 OR Status=2";
                            $res3=mysqli_query($con,$sql3) or die(mysqli_error($con));

                            while($row3=mysqli_fetch_assoc($res3))
                            {
                              if(is_null($row3['P_EPFNo']))
                              {
                                  $epfno=$row3['C_EPFNo'];
                              }
                              else
                              {
                                  $epfno=$row3['P_EPFNo'];
                              }
                              
                              if($row3['Status']==0)
                              {
                                $status='<span style="color: blue">Pending <img src="loading.png"></span>';
                              }
                              else if($row3['Status']==1)
                              {
                                $status='<span style="color: green">Approved <img src="check-mark.png"></span>';
                              }
                              else 
                              {
                                $status='<span style="color: red">Declined <img src="crossed.png"></span>';
                              }
                              $id=$row3['LD_Id'];


                          ?>
                          <tr>
                            <td scope="row"><?php echo $s_no++; ?> </td>
                            <td><?php echo $epfno; ?></td>
                            <td><?php echo $row3['EmpName']; ?></td>
                            <td><?php echo $row3['LeaveType']; ?></td>
                            <td><?php echo $row3['AppliedDate']; ?></td>
                            <td><?php echo $status; ?></td>
                            <td><?php echo'<a href="viewleaves.php?id='.$id.'&status='.$row3['Status'].'"> <button class="btn btn-sm btn-success"> View </button> </a>'?><?php }?></td>
                          </tr>
                      </tbody>
                  </table>  
                  </div>
              </div>                                  
              </div>
            </div>
            </div>  
          </div>
        </div>

      
    </main>


    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    
    
  </body>
</html>

