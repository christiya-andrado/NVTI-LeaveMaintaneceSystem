<?php session_start(); 
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
    
    <title>Super Admin | Dashboard</title>
 
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
        <div class='container'>
            <br>
           
        <?php
          
                include 'connection.php';
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                    $sql_update=mysqli_query($con,"UPDATE message SET is_read=1 WHERE id=$id");
                
                
                // $id=$_GET['id'];
                $status=$_GET['status'];

                $_SESSION['sid']=$id;
                
                $sql="SELECT l.LD_Id,e.P_EPFNo,e.C_EPFNo,e.EmpName,e.Contact_No,l.Reason,
                l.FromDate,l.ToDate,l.AppliedDate,l.Status,l.Approved_on,l.Remark
                FROM leave_details AS l INNER JOIN employee AS e 
                ON e.Empid=l.Empid WHERE l.LD_Id='$id'";

                $res=mysqli_query($con,$sql);
                
                if($res)
                {
                    $row=(mysqli_fetch_assoc($res));  

                    $epfp=$row['P_EPFNo'];
                    $epfc=$row['C_EPFNo'];  
                    $fdate=$row['FromDate'];
                    $tdate=$row['ToDate'];
                    $applied=$row['AppliedDate'];
                    $remark=$row['Remark'];
                    if($remark=='')
                    {
                      $remar='Waiting For Action';
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
                    // $status=$row['Status'];
                    
                    if($status=='1')
                    {
                      $sta='<span style="color: green">Approved</span>';
                    }
                    elseif($status=='2')
                    {
                      $sta='<span style="color: red">Declined</span>';
                    }
                    else{
                      $sta='<span style="color: blue">Pending</span>';
                    }
                }
              }
                ?>

               
             <h2> <?php echo $name; ?>'s Details</h2>
            <div class='row'>
                <div class='col'>
                    <label class='form-control'>Leave Id : <?php echo $id; ?> </label><br>
                    <label class='form-control'>Name : <?php echo $name; ?></label><br>
                    <label class='form-control'>Leave From : <?php echo $fdate; ?></label><br>
                    <label class='form-control'>Applied Date : <?php echo $applied; ?></label><br>
                    <label class='form-control'>Reason : <?php echo $reason; ?></label><br>
                    <label class='form-control'>Action On : <?php echo $appon; ?></label><br>
                </div>
                <div class='col'>
                <label class='form-control'> EPF No : <?php echo $epf; ?></label><br>
                <label class='form-control'> Contact : <?php echo $contact; ?></label><br>
                <label class='form-control'>Leave To : <?php echo $tdate; ?></label><br>
                <label class='form-control'>Leave Status : <?php echo $sta; ?></label><br>
                <label class='form-control'>Admin Remark : <?php echo $remar; ?></label><br>
                
                </div>
                
                <?php
                if($status==0)
                {?>
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Permission
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Grand Permission</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" >
        <select name="option" class="form-control">
          <option value="o">Choose Action...</option>
          <option value="1">Approved</option>
          <option value="2">Declined</option>
        </select>
        <input type="text" placeholder="Remark" name="remark">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>        
        <button type="submit" name="mbtn" class="btn btn-primary">Apply</button>
     


        </form>
      </div>
    </div>
  </div>
</div>

                
<?php
     include "clmodel.php";

     if($_SERVER['REQUEST_METHOD']=="POST")
    {
       $state=$_POST['option'];
      $rem=$_POST['remark'];

    $act=new model_cls();
    $set=$act->approve($state,$rem);
   
  }
 
?>

<?php
                }
                else
                {?>
                    <!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Apply NoPay
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update NoPay</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" >
        <label class="toggle">
          <?php 
          $sqli="SELECT Remark,nopay FROM `leave_details`WHERE LD_Id=$id";

          $resi=mysqli_query($con,$sqli);
          $rowi=mysqli_fetch_assoc($resi);

          $r=$rowi['Remark'];
          $nop=$rowi['nopay'];
          ?>
          <label >Edit NoPay </label>

        <input name="status" type="checkbox" <?php if($nop=='1') { echo 'checked';} ?>>
        <span class="slider"></span>
        <span class="labels" data-on="ON" data-off="OFF"></span>
       
        </label>
        <input type="text" value="<?php echo $r; ?>" name="remark">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>        
        <button type="submit" name="mbtn" class="btn btn-primary">Apply</button>
     


        </form>
      </div>
    </div>
  </div>
</div>
<?php
     include "clmodel.php";

     if($_SERVER['REQUEST_METHOD']=="POST")
    {
       $state1=$_POST['option'];
      $rem1=$_POST['remark'];

    $act1=new model_cls();
    $set1=$act1->nopay($rem1);
   
  }

                }
                ?>
    </main>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    
    
  </body>
</html>
