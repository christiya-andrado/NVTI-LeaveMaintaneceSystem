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
    
    <title>Pending Leave Details</title>
 
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

            <div class="input-group">
              
              <button class="btn bg-dark text-white" type="submit">
                <i class="bi bi-envelope-fill"></i>
              </button>
            </div>

            &nbsp;
            

            <div class="input-group">
              
               <!-- <button class="btn bg-dark text-white" type="submit">
                <i class="bi bi-bell-fill"></i>
              </button> -->
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown  btn bg-dark text-white">
                 <a href="#" class="dropdown-toggle " data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="bi bi-bell-fill text-white" style="font-size:18px;"></span></a>
                 <ul class="dropdown-menu text-white"></ul>
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
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Pages</span>
              </a>
            </li>

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
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Pages</span>
              </a>
            </li>

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
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Add Holidays</span>
              </a>
            </li>
            
          </ul>

          <Br></Br><Br>

            
               
                <a class="btn bg-dark text-white" type="submit" style="border-radius: 5px; margin-left: 15px;" href="search.php" name="searchbt">
                <i class="bi bi-search"></i> | Search
                  
                </a>
                          

            <br><br>

          <a type="button" class="btn bg-dark text-white" style="
          border-radius: 5px; margin-left: 15px;" name="b2" ><i class="bi bi-box-arrow-left" href="index.php"></i> | Logout</a>
     

       

          <br><br>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
    <div class="container">
<br>
<h2>Pending Leave </h2>
<hr>

<?php
    include "connection.php";

   echo ' <table class="table table-hover">
    <thead  style="background-color: #aa0412d2 ; color: #fff;">
      <tr>
        <th>No</th>
        <th>EPF No</th>
        <th>Full Name</th>
        <th>Leave Type</th>
        <th>Applied On</th>
        <th>Current Status</th>
        <th>More</th>
      </tr>
    </thead>';

    
    $sql = "SELECT l.LD_Id,e.P_EPFNo,e.C_EPFNo,e.EmpName,c.LeaveType,l.AppliedDate,l.Status
    FROM  commanleave AS c  INNER JOIN leave_details AS l ON l.CL_id=c.CL_id
    INNER JOIN employee AS e ON e.Empid=l.Empid WHERE l.Status=0 ORDER BY l.LD_Id desc";

    $res=mysqli_query($con,$sql);

    if($res)
  {
    $x=1;
    while($row=mysqli_fetch_assoc($res))
    {
      $id=$row['LD_Id'];
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
        $ltype=$row['LeaveType'];
        $applied=$row['AppliedDate'];
        $state=$row['Status']; 
        if($state=='1')
        {
            $apps='Approved';
        }
        elseif($state=='2')
        {
            $apps='Declined';
        }
        else{
            $apps='Pending';
        }
      if($x%2==1)
      {
        

        echo '  <tbody class=" bg-striped">
        <tr>
          <td>'.$id.'</td>
          <td>'.$epf.'</td>
          <td>'.$name.'</td>
          <td>'.$ltype.'</td>
          <td>'.$applied.'</td>
          <td>'.$apps.'</td>
          <td> <a href="leaveview.php?id='.$id.'" class="btn btn-secondary"> View </a> </td>
        </tr> </tbody>';
      }
      else
      {
        echo '  <tbody class="bg-light">
        <tr>
          <td>'.$id.'</td>
          <td>'.$epf.'</td>
          <td>'.$name.'</td>
          <td>'.$ltype.'</td>
          <td>'.$applied.'</td>
          <td>'.$apps.'</td>
          <td> <a href="leaveview.php?id='.$id.'" class="btn btn-secondary"> View </a> </td>
        </tr> </tbody>';
      }
$x++;
    }    
    
  }
   echo '</table>'
  ?>


</div>
    </main>


    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    
    
  </body>
</html>
