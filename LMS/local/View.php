
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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Employee Details</title>
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

     <!-- Toggle --> 
     <style>
    .toggle {
      --width: 80px;
      --height: calc(var(--width) / 3);

      position: relative;
      display: inline-block;
      width: var(--width);
      height: var(--height);
      box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3);
      border-radius: var(--height);
      cursor: pointer;
    }

    .toggle input {
      display: none;
    }

    .toggle .slider {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border-radius: var(--height);
      background-color: #ccc;
      transition: all 0.4s ease-in-out;
    }

    .toggle .slider::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: calc(var(--height));
      height: calc(var(--height));
      border-radius: calc(var(--height) / 2);
      background-color: #fff;
      box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3);
      transition: all 0.4s ease-in-out;
    }

    .toggle input:checked+.slider {
      background-color: #2196F3;
    }

    .toggle input:checked+.slider::before {
      transform: translateX(calc(var(--width) - var(--height)));
    }

    .toggle .labels {
      position: absolute;
      top: 8px;
      left: 0;
      width: 100%;
      height: 100%;
      font-size: 12px;
      font-family: sans-serif;
      transition: all 0.4s ease-in-out;
    }

    .toggle .labels::after {
      content: attr(data-off);
      position: absolute;
      right: 5px;
      color: #4d4d4d;
      opacity: 1;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);
      transition: all 0.4s ease-in-out;
    }

    .toggle .labels::before {
      content: attr(data-on);
      position: absolute;
      left: 5px;
      color: #ffffff;
      opacity: 0;
      text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.4);
      transition: all 0.4s ease-in-out;
    }

    .toggle input:checked~.labels::after {
      opacity: 0;
    }

    .toggle input:checked~.labels::before {
      opacity: 1;
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
    <div class="container-fluid">
        
        <div class="container">
  <br>
  <h2>Employee Details</h2>
  <hr>
  <br>
  
  <?php
      include "connection.php";
  
     echo ' <table class="table table-hover">
      <thead  style="background-color: #aa0412d2 ; color: #fff;">
        <tr align=center>
          <th>No</th>
          <th>EPF No</th>
          <th>Full Name</th>
          <th>Gender</th>
          <th>NIC No</th>
          <th>Address</th>
          <th>F.A.Date</th>
          <th>E-mail</th>
          <th>Contact</th>
          <th>Service Station</th>
          <th>Designation</th>
          <th>Type of Appointment</th>
          <th>Operations</th>
          <th>Status</th>
        </tr>
      </thead>';
  
      
      $sql = "SELECT * FROM employee";
      $res=mysqli_query($con,$sql);
      
      $sqls = "SELECT U_Id,status FROM manageuser";
      $ress=mysqli_query($con,$sqls);
   
      if($res)
    {
      $x=1;
      while($row=mysqli_fetch_assoc($res))
      {
      
        $id=$row['Empid'];
        $epfp=$row['P_EPFNo'];
        $epfc=$row['C_EPFNo'];     
        if ($epfp)
        {
          $epf=$epfp;
        }
        else
        {
          $epf=$epfc;
        }
        $name=$row['EmpName'];
        $sex=$row['Gender'];
        if($sex=='M')
        {
          $gender='Male';
        }
        else{
          $gender='Female';
        }
        $nic=$row['NIC'];
        $address=$row['Address'];
        $fad=$row['FirstAppointment_Date'];
        $email=$row['Email'];
        $contact=$row['Contact_No'];
        $center=$row['CenterLocation'];
        $design=$row['Designation'];
        $ta=$row['TypeOf_Appointment'];
        if($ta=='P')
        {
          $type='Permanent';
        }
        else{
          $type='Contract';
        }
        if($ress)
        {
        $rows=mysqli_fetch_assoc($ress);
        
        $uid=$rows['U_Id'];
        $status=$rows['status'];
  
  
        }
        if($x%2==1)
        {
          echo '  <tbody class=" bg-striped">
          <tr>
            <td>'.$id.'</td>
            <td>'.$epf.'</td>
            <td>'.$name.'</td>
            <td>'.$gender.'</td>
            <td>'.$nic.'</td>
            <td>'.$address.'</td>
            <td>'.$fad.'</td>
            <td>'.$email.'</td>
            <td>'.$contact.'</td>
            <td>'.$center.'</td>
            <td>'.$design.'</td>
            <td>'.$type.'</td>
            <td> <a href="updateemployee.php?updateemployeeid='.$id.'" class="btn btn-hover btn-info"> Edit </a> </td>';
           
            ?>
              <td>
            <label class="toggle">
              <a <?php echo 'href="updateuser.php?id='.$uid.'"'; ?>>
            <input name="status" type="checkbox" <?php if($status=='1') { echo 'checked';} ?>>
            <span class="slider"></span>
            <span class="labels" data-on="Enabled" data-off="Disabled"></span>
            </a>
            </label>
            </td>
            <?php
            echo '</tr> </tbody>';
        }
        else
        {
          echo '  <tbody class="bg-light">
          <tr>
            <td>'.$id.'</td>
            <td>'.$epf.'</td>
            <td>'.$name.'</td>
            <td>'.$gender.'</td>
            <td>'.$nic.'</td>
            <td>'.$address.'</td>
            <td>'.$fad.'</td>
            <td>'.$email.'</td>
            <td>'.$contact.'</td>
            <td>'.$center.'</td>
            <td>'.$design.'</td>
            <td>'.$type.'</td>
            <td><a href="updateemployee.php?updateemployeeid='.$id.'" class="btn btn-hover btn-info"> Edit </a> </td>';
            ?>
            <td>
          <label class="toggle">
            <a <?php echo 'href="updateuser.php?id='.$uid.'"'; ?>>
          <input name="status" type="checkbox" <?php if($status=='1') { echo 'checked';} ?>>
          <span class="slider"></span>
          <span class="labels" data-on="Enabled" data-off="Disabled"></span>
          </a>
          </label>
          </td>
          <?php
            echo '</tr> </tbody> ';
        }
  $x++;
      }    
      
    }
     echo '</table>'
    ?>
  
  </div>
          </div>
       
    </main>


    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    
    
  </body>
</html>
<?php 
  }
  else{
    header("location:../login.php");
  }
?>