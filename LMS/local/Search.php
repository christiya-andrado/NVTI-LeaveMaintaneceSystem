
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <title>Search</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    
    <link rel="stylesheet" href="css1/classic.css">
    <link rel="stylesheet" href="css1/classic.date.css">

    <!-- Bootstrap CSS for date -->
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    
    <!-- Style for date -->
    <link rel="stylesheet" href="css1/style.css">
    <title>Search here</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

    <style>
         .card-inner:hover
         {    
            transform: scale(1.1);
         }
         .card-inner {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0,0,0,.125);
        border-radius: .25rem;
        border:none;
        cursor: pointer;
        transition: all 2s;
    }

    .setline{
        text-decoration: none;
    }

    </style>
    <!-- year -->
    <!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
 
    <!-- month -->
    <!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
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
        
        <h1 >Search Form</h1>
       <hr>
       <h5 class="text-secondary">Choose Your Search Option :</h5>
       
            <form method="post">
              <div class="row mt-4 g-1 px-4 mb-5"> 
                <div class="col-md-2"> 
                  <button type="submit" name="employee" class="btn" style="background:transparent; border: none; width:150px;">
                    <div class="card-inner p-3 d-flex flex-column align-items-center bg-light" style="border-radius: 15px;"> 
                        <img src="https://i.imgur.com/Mb8kaPV.png" width="50"> 
                        <div class="text-center mg-text">
                          <span class="mg-text">Employees</span> </div> </div> </button></div>
                        
                         
                        <div class="col-md-2"> 
                        <button type="submit" name="nopay" class="btn" style="background:transparent; border: none; width:150px;">
                            <div class="card-inner p-3 d-flex flex-column align-items-center bg-light" style="border-radius: 15px;"> 
                                <img src="https://i.imgur.com/ueLEPGq.png" width="50" > 
                                 <div class="text-center mg-text"><span class="mg-text">No Pay</span> </div> </div></button> </div>

                        
                                 <div class="col-md-2"> 
                                 <button class="btn" name="date" style="background:transparent; border: none; width:150px;">
                            <div class="card-inner p-3 d-flex flex-column align-items-center bg-light" style="border-radius: 15px;" name="date"> 
                                  <img src="https://i.imgur.com/Z7BJ8Po.png" width="50"> 
                                  <div class="text-center mg-text">
                                      <span class="mg-text">Date</span></div> </div> </button></div>

                        <div class="col-md-2"> 
                        <button type="submit" class="btn" name="month" style="background:transparent; border: none; width:150px;">
                            <div class="card-inner p-3 d-flex flex-column align-items-center bg-light" style="border-radius: 15px;"> 
                                <img src="https://i.imgur.com/D0Sm15i.png" width="50"> 
                                <div class="text-center mg-text"> 
                                  <span class="mg-text">Monthly</span> </div> </div></a> </div>
                        
                        <div class="col-md-2" > 
                        <button type="submit" name="year" class="btn" style="background:transparent; border: none; width:150px;">
                            <div class="card-inner p-3 d-flex flex-column align-items-center bg-light" style="border-radius: 15px;"> 
                                 <img src="https://i.imgur.com/YLsQrn3.png" width="50"> 
                                 <div class="text-center mg-text"> 
                                  <span class="mg-text">Yearly</span></div> </div> </button></div> 
                            </div> </div> </div> </div>

</div>
 </form>
    </main>
    <div class="container " style="border-radius: 15px;"> 
                       
                       <div name="display">
  <?php
        include 'connection.php';
        if(isset($_POST['employee']))
          {
            echo ' <div> <center>
                  <form class="d-flex" role="search" method="post">
                  <input class="form-control me-2" type="search" name="sid" placeholder="Search by EPF No" aria-label="Search">
                  <button class="btn btn-outline-primary" name="emp" type="submit">Search</button>
                  </form><br>
                  </center>
                  </div>';
          }
            if(isset($_POST['emp']))
            {
            $id=$_POST['sid'];

              if(!$id=="")
              {
                $x=1;
                                  
                     $sql="SELECT l.LD_Id,e.P_EPFNo,e.C_EPFNo,e.EmpName,e.Contact_No,l.Reason,c.LeaveType,
                     l.FromDate,l.ToDate,l.AppliedDate,l.Status,l.Approved_on,l.Remark,l.total_days
                     FROM  commanleave AS c  INNER JOIN leave_details AS l ON l.CL_id=c.CL_id
                     INNER JOIN employee AS e ON e.Empid=l.Empid  
                     WHERE e.P_EPFNo='$id' OR e.C_EPFNo='$id'";
                 
                       $res=mysqli_query($con,$sql);
                 
                       if(mysqli_num_rows($res)==0)
                         {
                           echo ' <div>
                           <img src="search1.png" alt="" style="margin-left: 40%;" width="20%"> <br>
                           <h3 class="text-secondary text-center"> Sorry No Records Found....! </h3></div>';
                         }
                         else{
                                   
                     echo ' <table class="table table-hover">
                     <thead  style="background-color: #aa0412d2 ; color: #fff;">
                       <tr>
                         <th>No</th>
                         <th>EPF No</th>
                         <th> Name</th>
                         <th>Leave Type</th>
                         <th>From Date</th>
                         <th>To Date</th>
                         <th>Total Days</th>
                         <th>Applied Date</th>
                         <th>Reason</th>
                         <th>Approved_on</th>
                         <th>Remark</th>
                         <th>Status</th>
                       </tr>
                     </thead>';
                 
                      while($row=mysqli_fetch_assoc($res))
                       {  
                                                       
                                   $epfp=$row['P_EPFNo'];
                                   $epfc=$row['C_EPFNo'];
                                   $lt=$row['LeaveType'];  
                                   $fdate=$row['FromDate'];
                                   $tdate=$row['ToDate'];
                                   $tot=$row['total_days'];
                                   $applied=$row['AppliedDate'];
                                   $remark=$row['Remark'];
                                 if($remark=='')
                                 {
                                   $remar='Waiting for....';
                                 }
                                 else{
                                 $remar=$remark;
                                 }
                                 
                                 if ($epfp)
                                   {
                                   $epf=$epfp;
                                 }
                                   else
                                 {
                                   $epf=$epfc;
                                 }
                                 $name=$row['EmpName'];
                                 $contact=$row['Contact_No'];
                                 $reason=$row['Reason'];
                                 $appon=$row['Approved_on'];
                                 $status=$row['Status'];
                               if($status=='1')
                               {
                                 $sta='Approved';
                               }
                               elseif($status=='2')
                               {
                                   $sta='Declined';
                               }
                             else{
                                 $sta='Pending';
                               }
                                                                       
                                                                     
                               if($x%2==1)
                               {
                               
                                 echo '  <tbody class=" bg-striped">
                                 <tr>
                                   <td>'.$x.'</td>
                                   <td>'.$epf.'</td>
                                   <td>'.$name.'</td>
                                   <td>'.$lt.'</td>
                                   <td>'.$fdate.'</td>
                                   <td>'.$tdate.'</td>
                                   <td>'.$tot.'</td>
                                   <td>'.$applied.'</td>
                                   <td>'.$reason.'</td>
                                   <td>'.$appon.'</td>
                                   <td>'.$remark.'</td>
                                   <td>'.$sta.'</td>
                                
                                 </tr> </tbody>';
                               }
                               else
                               {
                                 echo '  <tbody class="bg-light">
                                 <tr>
                                 <td>'.$x.'</td>
                                 <td>'.$epf.'</td>
                                 <td>'.$name.'</td>
                                 <td>'.$lt.'</td>
                                 <td>'.$fdate.'</td>
                                 <td>'.$tdate.'</td>
                                 <td>'.$tot.'</td>
                                 <td>'.$applied.'</td>
                                 <td>'.$reason.'</td>
                                 <td>'.$appon.'</td>
                                 <td>'.$remark.'</td>
                                 <td>'.$sta.'</td>
                               
                                 </tr> </tbody>';
                       }
                 $x++;
                     } 
                     echo '</table>'; 
                   }
                   
                 
                     
                   }
                   else{
                     echo '<script> alert (" Please Enter Employee Name or EPF No") </script>';
                   }
                 }
                 
                    ?>
                 
                      
                                             
                 
                 
                 <!-- nopay -->
<?php

if(isset($_POST['nopay']))
{
  echo ' <div> <center>
  <form class="d-flex" role="search" method="post">

    <input class="form-control me-2" type="search" name="nid" placeholder="Search by EPF No" aria-label="Search">
    <button class="btn btn-outline-primary" name="no" type="submit">Search</button>
  </form><br>
  </center>
  </div>';
}
                 
  if(isset($_POST['no']))
    {
    $nid=$_POST['nid'];

      if(!$nid=="")
      {
      
        $sqln="SELECT l.LD_Id,e.P_EPFNo,e.C_EPFNo,e.EmpName,e.Contact_No,l.Reason,c.LeaveType,
        l.FromDate,l.ToDate,l.AppliedDate,l.Status,l.Approved_on,l.Remark,l.total_days
        FROM  commanleave AS c  INNER JOIN leave_details AS l ON l.CL_id=c.CL_id
        INNER JOIN employee AS e ON e.Empid=l.Empid  
        WHERE l.nopay='1' AND e.P_EPFNo='$nid' OR e.C_EPFNo='$nid'";

        $resn=mysqli_query($con,$sqln);
                    
                    if(mysqli_num_rows($resn)==0)
                    {
                      echo ' <div>
                      <img src="search1.png" alt="" style="margin-left: 40%;" width="20%"> <br>
                      <h3 class="text-secondary text-center"> Sorry No Records Found....! </h3></div>';
                    }
                    else{

                      echo ' <table class="table table-hover">
                      <thead  style="background-color: #aa0412d2 ; color: #fff;">
                        <tr>
                          <th>No</th>
                          <th>EPF No</th>
                          <th> Name</th>
                          <th>Leave Type</th>
                          <th>From Date</th>
                          <th>To Date</th>
                          <th>Total Days</th>
                          <th>Applied Date</th>
                          <th>Reason</th>
                          <th>Approved_on</th>
                          <th>Remark</th>
                          <th>Status</th>
                        </tr>
                      </thead>';

                    $x=1;
                  while($rown=mysqli_fetch_assoc($resn))
                    {  
                                      
                  $epfp=$rown['P_EPFNo'];
                  $epfc=$rown['C_EPFNo'];
                  $lt=$rown['LeaveType'];  
                  $fdate=$rown['FromDate'];
                  $tdate=$rown['ToDate'];
                  $tot=$rown['total_days'];
                  $applied=$rown['AppliedDate'];
                  $remark=$rown['Remark'];
                if($remark=='')
                {
                  $remar='Waiting for....';
                }
                else{
                $remar=$remark;
                }
                
                if ($epfp)
                  {
                  $epf=$epfp;
                }
                  else
                {
                  $epf=$epfc;
                }
                $name=$rown['EmpName'];
                $contact=$rown['Contact_No'];
                $reason=$rown['Reason'];
                $appon=$rown['Approved_on'];
                $status=$rown['Status'];
              if($status=='1')
              {
                $sta='Approved';
              }
              elseif($status=='2')
              {
                  $sta='Declined';
              }
            else{
                $sta='Pending';
              }
                                                      
                                                    
              if($x%2==1)
              {
              
                echo '  <tbody class=" bg-striped">
                <tr>
                  <td>'.$x.'</td>
                  <td>'.$epf.'</td>
                  <td>'.$name.'</td>
                  <td>'.$lt.'</td>
                  <td>'.$fdate.'</td>
                  <td>'.$tdate.'</td>
                  <td>'.$tot.'</td>
                  <td>'.$applied.'</td>
                  <td>'.$reason.'</td>
                  <td>'.$appon.'</td>
                  <td>'.$remark.'</td>
                  <td>'.$sta.'</td>
              
                </tr> </tbody>';
              }
              else
              {
                echo '  <tbody class="bg-light">
                <tr>
                <td>'.$x.'</td>
                <td>'.$epf.'</td>
                <td>'.$name.'</td>
                <td>'.$lt.'</td>
                <td>'.$fdate.'</td>
                <td>'.$tdate.'</td>
                <td>'.$tot.'</td>
                <td>'.$applied.'</td>
                <td>'.$reason.'</td>
                <td>'.$appon.'</td>
                <td>'.$remark.'</td>
                <td>'.$sta.'</td>
              
                </tr> </tbody>';
            }
        $x++;
          } 
          echo '</table>'; 
          }
    
    }
    else{
      echo '<script> alert (" Please Enter Employee the EPF No") </script>';
    }
    }
    
                 
                 
                 // date

            if(isset($_POST['date']))
            {
              echo ' <div class="content">
                <form method="post">
              <div class="container">
              <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                <h5 class="text-secondary"> Select From Date</h5>
                    <div class="input-group date" id="datetimepicker6">
                      <input type="date" class="form-control" name="fday">
                      <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                <h5 class="text-secondary"> Select To Date</h5>
                    <div class="input-group date" id="datetimepicker6">
                      <input type="date" class="form-control" name="tday">
                      <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                </div>
              </div>
              <div class="col-md-2">
              <br>
              <button class="btn btn-outline-primary" name="day" type="submit" style="margin-top: 9px;">Search</button>
              </div>
          </div>
          <script type="text/javascript">
              $(function () {
                  $("#datetimepicker6").datetimepicker();
                  $("#datetimepicker7").datetimepicker({
              useCurrent: false //Important! See issue #1075
              });
                  $("#datetimepicker6").on("dp.change", function (e) {
                      $("#datetimepicker7").data("DateTimePicker").minDate(e.date);
                  });
                  $("#datetimepicker7").on("dp.change", function (e) {
                      $("#datetimepicker6").data("DateTimePicker").maxDate(e.date);
                  });
              });
          </script>
                </div> </form> </div>';

          }
          if(isset($_POST['day']))
          {
            $sdate=$_POST['fday'];
            $edate=$_POST['tday'];

            if(!$sdate=="" && !$edate=="")
            {
            

          

            $sqld="SELECT l.LD_Id,e.P_EPFNo,e.C_EPFNo,e.EmpName,e.Contact_No,l.Reason,c.LeaveType,
            l.FromDate,l.ToDate,l.AppliedDate,l.Status,l.Approved_on,l.Remark,l.total_days
            FROM  commanleave AS c  INNER JOIN leave_details AS l ON l.CL_id=c.CL_id
            INNER JOIN employee AS e ON e.Empid=l.Empid  
            WHERE l.FromDate AND l.ToDate BETWEEN '$sdate' AND '$edate' ORDER BY l.ToDate desc";

            $resd=mysqli_query($con,$sqld);

            
              $x=1;
              if(mysqli_num_rows($resd)==0)
              {
                echo ' <div>
                <img src="search1.png" alt="" style="margin-left: 40%;" width="20%"> <br>
                <h3 class="text-secondary text-center"> Sorry No Records Found....! </h3></div>';
              }
              else
              {
                echo ' <table class="table table-hover">
                <thead  style="background-color: #aa0412d2 ; color: #fff;">
                  <tr>
                    <th>No</th>
                    <th>EPF No</th>
                    <th> Name</th>
                    <th>Leave Type</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Total Days</th>
                    <th>Applied Date</th>
                    <th>Reason</th>
                    <th>Approved_on</th>
                    <th>Remark</th>
                    <th>Status</th>
                  </tr>
                </thead>';

              while($row=mysqli_fetch_assoc($resd))
                {  
                                  
                            $epfp=$row['P_EPFNo'];
                            $epfc=$row['C_EPFNo'];
                            $lt=$row['LeaveType'];  
                            $fdate=$row['FromDate'];
                            $tdate=$row['ToDate'];
                            $tot=$row['total_days'];
                            $applied=$row['AppliedDate'];
                            $remark=$row['Remark'];
                          if($remark=='')
                          {
                            $remar='Waiting for....';
                          }
                          else{
                          $remar=$remark;
                          }
                          
                          if ($epfp)
                            {
                            $epf=$epfp;
                          }
                            else
                          {
                            $epf=$epfc;
                          }
                          $name=$row['EmpName'];
                          $contact=$row['Contact_No'];
                          $reason=$row['Reason'];
                          $appon=$row['Approved_on'];
                          $status=$row['Status'];
                        if($status=='1')
                        {
                          $sta='Approved';
                        }
                        elseif($status=='2')
                        {
                            $sta='Declined';
                        }
                      else{
                          $sta='Pending';
                        }
                                                                
                                                              
                        if($x%2==1)
                        {
                        
                          echo '  <tbody class=" bg-striped">
                          <tr>
                            <td>'.$x.'</td>
                            <td>'.$epf.'</td>
                            <td>'.$name.'</td>
                            <td>'.$lt.'</td>
                            <td>'.$fdate.'</td>
                            <td>'.$tdate.'</td>
                            <td>'.$tot.'</td>
                            <td>'.$applied.'</td>
                            <td>'.$reason.'</td>
                            <td>'.$appon.'</td>
                            <td>'.$remark.'</td>
                            <td>'.$sta.'</td>
                            
                          </tr> </tbody>';
                        }
                        else
                        {
                          echo '  <tbody class="bg-light">
                          <tr>
                          <td>'.$x.'</td>
                          <td>'.$epf.'</td>
                          <td>'.$name.'</td>
                          <td>'.$lt.'</td>
                          <td>'.$fdate.'</td>
                          <td>'.$tdate.'</td>
                          <td>'.$tot.'</td>
                          <td>'.$applied.'</td>
                          <td>'.$reason.'</td>
                          <td>'.$appon.'</td>
                          <td>'.$remark.'</td>
                          <td>'.$sta.'</td>
                          
                          </tr> </tbody>';
                }
          $x++;
              
            } 
            

            echo '</table>'; 
          }
          }
          else{
            echo '<script> alert ("Please Select the relevent date") </script>';
          }
              }

  //  month                                                  
  if(isset($_POST['month']))
     {
            echo '<div >
        
            
            <form method="post">
            <div class="form-group"> 
            <button class="btn btn-outline-primary" name="mon" type="submit" style="margin-left: 1200px;">Search</button> <br> <br>                   
            <input type="text" class="form-control" placeholder="Select the month" name="month" id="datepicker" autocomplete="off" />

            <script>
            var dp=$("#datepicker").datepicker( {
              format: "mm-yyyy",
              startView: "months", 
              minViewMode: "months"
          });
          
          dp.on("changeMonth", function (e) {    
            //do something here
          });
          </script>
        </div><br>

        <div class="form-group">                   
        <select name="center" class="form-control">
            <option value="All"> All</option>
            <option value="NVTI Vantharumoolai">NVTI Vantharumoolai</option>
            <option value="Vellavely">Vellavely</option>
            <option value="Kaluwanchikudy">Kaluwanchikudy</option>
            <option value="Aarayampathy">Aarayampathy</option>
            <option value="Ondhachimadam">Ondhachimadam</option>
            <option value="Vaharai">Vaharai</option>
            <option value="Vavunathevu">Vavunathevu</option>
            <option value="Valaichenai">Valaichenai</option>
            <option value="Kiran">Kiran</option>
            <option value="Kattankudy">Kattankudy</option>
            <option value="Paddiipalai">Paddiipalai</option>
        </select>          
    </div>
        </form>
            </div>';
        }
        if(isset($_POST['mon']))
        {
          $mon=$_POST['month'];
          $cen=$_POST['center'];
        

        if(!$mon=="")
          {
            
            if($cen=="All")
            {
            
         

      
          $sqlm="SELECT l.LD_Id,e.P_EPFNo,e.C_EPFNo,e.EmpName,e.Contact_No,l.Reason,c.LeaveType,
          l.FromDate,l.ToDate,l.AppliedDate,l.Status,l.Approved_on,l.Remark,l.total_days 
          FROM commanleave AS c INNER JOIN leave_details AS l 
          ON c.CL_id=l.CL_id INNER JOIN employee AS e 
          ON e.Empid=l.Empid
          WHERE DATE_FORMAT(FromDate,'%m-%Y') LIKE '$mon' OR DATE_FORMAT(ToDate,'%m-%Y') LIKE '$mon';";

          $resm=mysqli_query($con,$sqlm);
          $x=1;
          if(mysqli_num_rows($resm)===0)
          {

            echo ' <div>
            <img src="search1.png" alt="" style="margin-left: 40%;" width="20%"> <br>
            <h3 class="text-secondary text-center"> Sorry No Records Found....! </h3></div>';
          }
          else{
          echo '<br> <table class="table table-hover">
          <thead  style="background-color: #aa0412d2 ; color: #fff;">
            <tr>
              <th>No</th>
              <th>EPF No</th>
              <th> Name</th>
              <th>Leave Type</th>
              <th>From Date</th>
              <th>To Date</th>
              <th>Total Days</th>
              <th>Applied Date</th>
              <th>Reason</th>
              <th>Approved_on</th>
              <th>Remark</th>
              <th>Status</th>
            </tr>
          </thead>';
          while($row=mysqli_fetch_assoc($resm))
            {
              $epfp=$row['P_EPFNo'];
              $epfc=$row['C_EPFNo'];
              $lt=$row['LeaveType'];  
              $fdate=$row['FromDate'];
              $tdate=$row['ToDate'];
              $tot=$row['total_days'];
              $applied=$row['AppliedDate'];
              $remark=$row['Remark'];
            if($remark=='')
            {
              $remar='Waiting for....';
            }
            else{
            $remar=$remark;
            }
            
            if ($epfp)
              {
              $epf=$epfp;
            }
              else
            {
              $epf=$epfc;
            }
            $name=$row['EmpName'];
            $contact=$row['Contact_No'];
            $reason=$row['Reason'];
            $appon=$row['Approved_on'];
            $status=$row['Status'];
          if($status=='1')
          {
            $sta='Approved';
          }
          elseif($status=='2')
          {
              $sta='Declined';
          }
        else{
            $sta='Pending';
          }

          if($x%2==1)
          {
          
            echo '  <tbody class=" bg-striped">
            <tr>
              <td>'.$x.'</td>
              <td>'.$epf.'</td>
              <td>'.$name.'</td>
              <td>'.$lt.'</td>
              <td>'.$fdate.'</td>
              <td>'.$tdate.'</td>
              <td>'.$tot.'</td>
              <td>'.$applied.'</td>
              <td>'.$reason.'</td>
              <td>'.$appon.'</td>
              <td>'.$remark.'</td>
              <td>'.$sta.'</td>
              
            </tr> </tbody>';
          }
          else
          {
            echo '  <tbody class="bg-light">
            <tr>
            <td>'.$x.'</td>
            <td>'.$epf.'</td>
            <td>'.$name.'</td>
            <td>'.$lt.'</td>
            <td>'.$fdate.'</td>
            <td>'.$tdate.'</td>
            <td>'.$tot.'</td>
            <td>'.$applied.'</td>
            <td>'.$reason.'</td>
            <td>'.$appon.'</td>
            <td>'.$remark.'</td>
            <td>'.$sta.'</td>
            
            </tr> </tbody>';
  }
$x++;
            }
          }
          } //all center if
          else{



          
              $sqlm="SELECT l.LD_Id,e.P_EPFNo,e.C_EPFNo,e.EmpName,e.Contact_No,l.Reason,c.LeaveType,
              l.FromDate,l.ToDate,l.AppliedDate,l.Status,l.Approved_on,l.Remark,l.total_days 
              FROM commanleave AS c INNER JOIN leave_details AS l 
              ON c.CL_id=l.CL_id INNER JOIN employee AS e 
              ON e.Empid=l.Empid WHERE (e.CenterLocation='$cen') AND (DATE_FORMAT(FromDate,'%m-%Y') LIKE '$mon' OR DATE_FORMAT(ToDate,'%m-%Y') LIKE '$mon')";

              $resm=mysqli_query($con,$sqlm);
              $x=1;

              if(mysqli_num_rows($resm)===0)
              {

                echo ' <div>
                <img src="search1.png" alt="" style="margin-left: 40%;" width="20%"> <br>
                <h3 class="text-secondary text-center"> Sorry No Records Found....! </h3></div>';
              }
              else
              {
                echo '<br> <table class="table table-hover">
                <thead  style="background-color: #aa0412d2 ; color: #fff;">
                  <tr>
                    <th>No</th>
                    <th>EPF No</th>
                    <th> Name</th>
                    <th>Leave Type</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Total Days</th>
                    <th>Applied Date</th>
                    <th>Reason</th>
                    <th>Approved_on</th>
                    <th>Remark</th>
                    <th>Status</th>
                  </tr>
                </thead>';

              while($row=mysqli_fetch_assoc($resm))
                {
                  if(!$resm>0){

                    echo '<script> alert ("Match Records Not Found.......!") </script>'; 
                  }
                  else{
                  $epfp=$row['P_EPFNo'];
                  $epfc=$row['C_EPFNo'];
                  $lt=$row['LeaveType'];  
                  $fdate=$row['FromDate'];
                  $tdate=$row['ToDate'];
                  $tot=$row['total_days'];
                  $applied=$row['AppliedDate'];
                  $remark=$row['Remark'];
                if($remark=='')
                {
                  $remar='Waiting for....';
                }
                else{
                $remar=$remark;
                }
                
                if ($epfp)
                  {
                  $epf=$epfp;
                }
                  else
                {
                  $epf=$epfc;
                }
                $name=$row['EmpName'];
                $contact=$row['Contact_No'];
                $reason=$row['Reason'];
                $appon=$row['Approved_on'];
                $status=$row['Status'];
              if($status=='1')
              {
                $sta='Approved';
              }
              elseif($status=='2')
              {
                  $sta='Declined';
              }
            else{
                $sta='Pending';
              }

              if($x%2==1)
              {
              
                echo '  <tbody class=" bg-striped">
                <tr>
                  <td>'.$x.'</td>
                  <td>'.$epf.'</td>
                  <td>'.$name.'</td>
                  <td>'.$lt.'</td>
                  <td>'.$fdate.'</td>
                  <td>'.$tdate.'</td>
                  <td>'.$tot.'</td>
                  <td>'.$applied.'</td>
                  <td>'.$reason.'</td>
                  <td>'.$appon.'</td>
                  <td>'.$remark.'</td>
                  <td>'.$sta.'</td>
                  
                </tr> </tbody>';
              }
              else
              {
                echo '  <tbody class="bg-light">
                <tr>
                <td>'.$x.'</td>
                <td>'.$epf.'</td>
                <td>'.$name.'</td>
                <td>'.$lt.'</td>
                <td>'.$fdate.'</td>
                <td>'.$tdate.'</td>
                <td>'.$tot.'</td>
                <td>'.$applied.'</td>
                <td>'.$reason.'</td>
                <td>'.$appon.'</td>
                <td>'.$remark.'</td>
                <td>'.$sta.'</td>
                
                </tr> </tbody>';
      }
$x++;
                }
              }
            }
          }
          }
          
          else{
            echo '<script> alert ("Please select the month....!") </script>';
          }
        }
                                                     
// year
            if(isset($_POST['year']))
            {
                echo '<div>
                <form method="post">
                <form  role="search" method="post">
              <div class="d-flex">
                  <input class="form-control me-2" type="search" name="eid" placeholder="Search by EPF No" aria-label="Search">
                  <button class="btn btn-outline-primary" name="yearbt" type="submit">Search</button>
                  </div>
          <br>
                <input type="text" class="form-control" name="year" id="datepicker"  placeholder="Select the Year" autocomplete="off"/>
                </form>
                <script>
                  $(document).ready(function(){
                  $("#datepicker").datepicker({
                        format: "yyyy",
                        viewMode: "years", 
                        minViewMode: "years",
                        autoclose:true
                    });   
                })
                </script>

                </div>';
            } 
            if(isset($_POST['yearbt']))
            {
              $eid=$_POST['eid'];
              $year=$_POST['year'];

              if($eid=="")
              {
                echo '<script> alert ("Please Enter the EPF No....!") </script>';
              }
              elseif($year=="")
              {
                echo '<script> alert ("Please select the Year.......!") </script>';
              }
              else{
                

                $sqly="SELECT l.LD_Id,e.P_EPFNo,e.C_EPFNo,e.EmpName,e.Designation,l.Reason,
                l.FromDate,l.ToDate,l.AppliedDate,l.Status,l.nopay,l.total_days 
                FROM leave_details AS l INNER JOIN employee AS e 
                ON e.Empid=l.Empid WHERE YEAR(l.FromDate)='$year' AND e.P_EPFNo='$eid' OR e.C_EPFNo='$eid'";

                $resy=mysqli_query($con,$sqly);

                $x=1;
                if(mysqli_num_rows($resy)==0)
                {
                  echo ' <div>
                  <img src="search1.png" alt="" style="margin-left: 40%;" width="20%"> <br>
                  <h3 class="text-secondary text-center"> Sorry No Records Found....! </h3></div>';
                }
                else{
                $rowy=mysqli_fetch_array($resy);

                                                                                            
                $namey=$rowy['EmpName'];
                $dig=$rowy['Designation'];
                $epfp1=$rowy['P_EPFNo'];
                $epfc1=$rowy['C_EPFNo'];
                if ($epfp1)
                {
                $epfy=$epfp1;
                }
                else
              {
                $epfy=$epfc1;
                }

                echo '<div class="bg-white"> <center><h1 style="color: #aa0412d2; ">Leave Register</h1> </center> <br>
                <div style="margin-left: 80px;">
                    <label >Name        :  '.$namey.'</label> <br>
                    <label >Designation :  '.$dig.'</label> <br>
                    <label >EPF No      :  '.$epfy.'</label> <br> </div>';
              
                    $sqly1="SELECT l.LD_Id,e.P_EPFNo,e.C_EPFNo,e.EmpName,e.Designation,l.Reason,
                    l.FromDate,l.ToDate,l.AppliedDate,l.Status,l.nopay,l.total_days 
                    FROM leave_details AS l INNER JOIN employee AS e 
                    ON e.Empid=l.Empid WHERE YEAR(l.FromDate)='$year' AND e.P_EPFNo='$eid' OR e.C_EPFNo='$eid'";

                 echo'<br> <table class="table table-hover">';
                                                             
                 echo '<thead  style="background-color: #aa0412d2 ; color: #fff;">
                 <tr>
                 <th>No</th> 
                 <th>From Date</th>
                 <th>To Date</th>
                 <th>full & Half Pay</th>
                 <th>No Pay</th>
                 <th>Leave Reason</th>
                 </tr> </thead>';

                 $resy1=mysqli_query($con,$sqly1);

                  while($rowy1=mysqli_fetch_assoc($resy1))
                {

                  $fday=$rowy1['FromDate'];
                  $tday=$rowy1['ToDate'];
                  $noday=$rowy1['total_days'];
                  if($noday=='0.5')
                  {
                    $nday='0.5';
                  }
                  else {
                    $nday=$noday;
                  }
                  $nopay=$rowy1['nopay'];
                  $reason=$rowy1['Reason'];

                

                    
                    if($x%2==0)
                    {
                    echo ' <tbody class=" bg-striped">
                    <tr>
                      <td>'.$x.'</td>
                      <td>'.$fday.' </td>
                      <td>'.$tday.'</td>
                      <td>'.$nday.'</td>
                      <td>'.$nopay.'</td>
                      <td>'.$reason.'</td>                                          
                    </tr>';

              
                
                }
                else{
                  echo '  <tbody class="bg-light">
                  <tr>
                  <td>'.$x.'</td>
                  <td>'.$fday.' </td>
                  <td>'.$tday.'</td>
                  <td>'.$nday.'</td>
                  <td>'.$nopay.'</td>
                  <td>'.$reason.'</td>                                          
                </tr>';
                }
                                              
              
              
                
              } //loop
              echo '</table> </div>';
                }// records not
            }
            }  // bt if                          


        ?>

        </div>
      
</form>
          </div>
                                             
                         <!--Date search-->
                         <script src="js1/jquery-3.3.1.min.js"></script>
                         <script src="js1/popper.min.js"></script>
                         <script src="js1/bootstrap.min.js"></script>
                         <script src="js1/picker.js"></script>
                         <script src="js1/picker.date.js"></script>
                 
                         <script src="js1/main.js"></script>
                 
                     <script src="./js/bootstrap.bundle.min.js"></script>
                     <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
                     
                     <!-- year -->
                     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                     <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
                     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
                 
                     <!-- month -->
                     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                     <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
                     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    
    
  </body>
</html>

<?php 
  }
  else{
    header("location:../login.php");
  }
?>