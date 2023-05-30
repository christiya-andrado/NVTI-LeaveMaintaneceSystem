
<?php
  session_start();

  if(isset($_SESSION['pin']))
  {
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
    <link rel="stylesheet" href="form.css">
    
    <title>Leave Application</title>
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
        <img src="logo.png" width="62px" alt="vta" style="background-color:white; border-radius: 5px; margin-right: 10px;">
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
            include "connection.php";
              $sql="SELECT * FROM leave_details WHERE is_read=0 AND Status=0";
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
                            $res1=mysqli_query($con,"SELECT * FROM leave_details WHERE is_read=0 AND Status=0");
                            if(mysqli_num_rows($res1)>0)
                            {                          
                              while($row=mysqli_fetch_assoc($res1))
                              {
                                echo '<li><a class="dropdown-item" href="leaveView2.php?id='.$row['LD_Id'].'">'.$row['Reason'] .'</a></li>';
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
            
              <!-- <a
                class="nav-link dropdown-toggle ms-1"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
              
                <i class="bi bi-person-circle"></i>
              </a> -->
            
              <!-- <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person-bounding-box"></i> | Edit Profile</a></li>
                <li><a class="dropdown-item" href="#"></a></li>
                <li>
                  <a class="dropdown-item" href="#"><i class="bi bi-box-arrow-left"></i> | Logout</a>
                </li>
                
              </ul> -->
           
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
              <a href="index.php" class="nav-link px-3 active">
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
                    <a href="addemployee.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-person-plus-fill"></i
                      ></span>
                      <span>Add New Employee</span>
                    </a>
                  </li>
                  <li>
                    <a href="view.php" class="nav-link px-3">
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
                    <a href="user.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-person-plus-fill"></i
                      ></span>
                      <span>Create New Admin</span>
                    </a>
                  </li>
                  <li>
                    <a href="viewusers.php" class="nav-link px-3">
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
              <a class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#leave">
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
                    <a href="Leavehistory.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Total History</span>
                    </a>
                  </li>
                  <li>
                    <a href="approvedlev.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Approved Leave</span>
                    </a>
                  </li>
                  <li>
                    <a href="pendinglev.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Pending Leaves</span>
                    </a>
                  </li>
                  <li>
                    <a href="declinedlev.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Declined</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Add Holidays</span>
              </a>
            </li>
             -->
          </ul>

          <Br></Br><Br>

            
               
          <a class="btn bg-secondary text-white" type="submit" style="border-radius: 5px; margin-left: 15px;" href="leaveapp.php" name="searchbt">
                <i class="bi bi-save"></i> | Apply Leave
                  
                </a>
                          

            <br><br>
               
                <a class="btn bg-dark text-white" type="submit" style="border-radius: 5px; margin-left: 15px;" href="search.php" name="searchbt">
                <i class="bi bi-search"></i> | Search
                  
                </a>
                          

            <br><br>
            

          <a type="button" class="btn bg-dark text-white" style="
          border-radius: 5px; margin-left: 15px;" name="b2"  href="logout.php"><i class="bi bi-box-arrow-left"></i> | Logout</a>
     

       

          <br><br>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">


<div class="container">
    <div class="row">
                        <div class="col-lg-8">
                            <h2 class="fcol" style="padding:20px;" align="center">Employee Leave Request Form </h2>
                <hr>

                <form action="" method="post">
                <label style="margin-right:285px;"> EPF NO</label>
                <input type="text" name="epfno" required="required"   >

                
               
                 <!-- <label>  Center Name</label>
                <input type="text" name="ctrnm" required="required"   > -->
                       
                <label style="margin-right:180px;"> Type Of The Leave</label>
                <span class="radiobt active">
                <Select type="combo" name="leavetype" required="required" style=" border: none; background: #f1f1f1;outline: none;">
                <option value="" style="color:#3e3e3e;">--Select Your Leave Type--</option>
                <option value="Medical Leave" style="color:#9d1d40;">Medical Leave</option>
                <option value="Casual Leave" style="color:#9d1d40;">Casual Leave</option>
                <option value="Annual Leave" style="color:#9d1d40;">Annual Leave</option>
                <option value="Maternity Leave" style="color:#9d1d40;">Maternity Leave</option></Select></span>
                                
                            
                             
                             
                <label style="margin-right:97px;">Date Of Commencing Leave</label>
                <span class="radiobt active">
                <input type="date" name="fromdate" style=" border: none; background: #f1f1f1;outline: none;"></span>

                <label style="margin-right:120px;">Date Of Resuming Duties</label>
                <span class="radiobt active">
                <input type="date" name="todate" style=" border: none; background: #f1f1f1;outline: none;"></span>

                <label style="margin-right:200px;">Number Of Days</label>
                 <input type="text" name="noofdays" required="required" >
           
                       

                      
                <label style="margin-right:180px;">Reason For Leave</label><br>
                <span class="">
                <textarea style=" border: none; background: #f1f1f1;outline: none; width: 100%;" rows="5"cols="80" name="leavereason"></textarea></span><br>

                <label style="margin-right:170px;"> Acting Officer Name</label>
                <input type="text" name="acting" required="required" >
                
                       
                         
                <button type="submit" class="btn btn-success btn-lg" style="height: 45px;" name="apply">Apply</button>

                </form>
            </div>
        </div>
    </div>
    </main>


    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    
    
  </body>
</html>
<?php
include "connection.php";
    if(isset($_POST['apply'])){
        $leavetype=$_POST['leavetype'];
        $fromdate=$_POST['fromdate'];
        $todate=$_POST['todate'];
        $leavereason=$_POST['leavereason'];
        $acting=$_POST['acting'];
        $epf=$_POST['epfno'];
        $tday=$_POST['noofdays'];

       $sqlepf="select P_EPFNo,C_EPFNo from employee where P_EPFNo='$epf' or C_EPFNo='$epf'";
       $resepf=mysqli_query($con,$sqlepf);


       if(mysqli_num_rows($resepf) === 1)
       {       
        $q1="select CL_id from commanleave where LeaveType='$leavetype'";
        $sqle="select Empid from employee where P_EPFNo='$epf' or C_EPFNo='$epf'";

       $rese=mysqli_query($con,$sqle);
       $rowe=mysqli_fetch_assoc($rese);
       $eid=$rowe['Empid'];

        $q1res=mysqli_query($con,$q1);
        $q1row=mysqli_fetch_assoc($q1res);
        $cid=$q1row['CL_id'];
    
       
      $sql="INSERT INTO leave_details (LD_Id,Empid,FromDate,ToDate,total_days,Reason,Acting_Person,CL_id)
            VALUES (null,'$eid','$fromdate','$todate',$tday,'$leavereason','$acting','$cid')";
       
        $res=mysqli_query($con,$sql);
        
        if($res){
            echo "<script> alert ('Record is Successfully stored'); </script>";
        }
        else{
            die(mysqli_error($con));
        } 
      }
      
    else{       
      echo "<h5 style='margin-left: 320px;'> This EPF No doesn't exsist..... check it again. </h5>";
    }
  }
?>

<?php 
  }
  else{
    header("location:../login.php");
  }
?>