<?php
 
         include "connection.php";
         $id=$_GET['updateemployeeid'];

                    
        $sql="select * from employee where Empid=$id";

     $res=mysqli_query($con,$sql);

    $row=mysqli_fetch_assoc($res);
   
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
      $nic=$row['NIC'];
      $address=$row['Address'];
      $fa=$row['FirstAppointment_Date'];
      $mail=$row['Email'];
      $contact=$row['Contact_No'];
      $center=$row['CenterLocation'];
      $desig=$row['Designation'];
      $type=$row['TypeOf_Appointment'];
     
      
                 if(!$res)
                 {
                    die(mysqli_error($res));
                 }

    if(isset($_POST['b1']))
    {
        $uepf= $_POST['epf'];
        $uname= $_POST['name'];
        $usex= $_POST['sex'];
        $unic= $_POST['nic'];
        $uaddress= $_POST['address'];
        $ufad= $_POST['fad'];
        $uemail= $_POST['email'];
        $ucontact= $_POST['contact'];
        $ucenter= $_POST['center'];
        $udesig= $_POST['desig'];
        $uta= $_POST['ta'];

        $sqlu="SELECT U_Id FROM manageuser WHERE EPFNo=$epf";
        $resu=mysqli_query($con,$sqlu);
        $rowu=mysqli_fetch_assoc($resu);

        $uid=$rowu['U_Id'];
        echo $uid;

        if($uta=='P')
        {
        $sql1="UPDATE employee SET P_EPFNo=$uepf, EmpName='$uname', Gender='$usex', NIC='$unic', Address='$uaddress', 
        FirstAppointment_Date='$ufad', Email='$uemail', Contact_No='$ucontact', CenterLocation='$ucenter',Designation='$udesig', TypeOf_Appointment='$uta' WHERE Empid=$id";

        $sqlm="UPDATE manageuser SET EPFNo=$uepf WHERE U_Id=$uid";

        $res1=mysqli_query($con,$sql1);
        $resm=mysqli_query($con,$sqlm);
        }
        else{
          $sql1="UPDATE employee SET C_EPFNo=$uepf, EmpName='$uname', Gender='$usex', NIC='$unic', Address='$uaddress', 
        FirstAppointment_Date='$ufad', Email='$uemail', Contact_No='$ucontact', CenterLocation='$ucenter',Designation='$udesig', TypeOf_Appointment='$uta' WHERE Empid=$id";
      
           $res1=mysqli_query($con,$sql1);
        }
       

        if($res1)
        {
          header ("Location:view.php");
        }
    }
    
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
    
    <title>Update Employee Details</title>
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

  
<h1 class="fcol">Update Employee</h1>
<hr>



<form method="post">
<div class="row">
  <div class="col">

<label ><b>EPF Number</b></label>
<input type="text" placeholder="Enter the EPF Number" name="epf" value="<?php echo $epf; ?>" autocomplete="off">

<label ><b>Employee Name</b></label>
<input type="text" placeholder=" Enter the Name" name="name" value="<?php echo $name; ?>" autocomplete="off">

<label ><b>Gender</b></label>
<br>

<span class="radiobt active">
  <input type="radio" name="sex" value="M" 
  <?php
    if ($sex=="M")
    {
      echo "checked";
    }
  ?>>Male
  &nbsp &nbsp &nbsp
  <input type="radio" name="sex"  value="F"
  <?php
    if($sex=="F")
    {
      echo "checked";
    }
  ?>>Female
</span>
  <br>

  <label ><b>NIC Number</b></label>
<input type="text" placeholder="Enter the NIC Number" name="nic" value="<?php echo $nic; ?>"  autocomplete="off">

<label ><b>Address</b></label>
<input type="text" placeholder="Enter the Address" name="address" value="<?php echo $address; ?>"  autocomplete="off">

<label ><b>First Appointment Date</b></label><br>
<span class="radiobt">
<input type="date" placeholder="Enter the First Appointment Date" name="fad" value="<?php echo $fa; ?>" autocomplete="off"><br>
</span>
</div>

<div class="col">
<label ><b>E-mail </b></label>
<input type="text" placeholder="Enter Your E-mail" name="email" value="<?php echo $mail; ?>" autocomplete="off">



<label ><b>Contact Number</b></label>
<input type="text" placeholder="Enter the Contact " name="contact" value="<?php echo $contact; ?>" autocomplete="off">

<label ><b>Work Station</b></label>
<span class="radiobt active">
<select name="center" class="form-select-sm">
  <option value="o1">--Select Work Station--</option>
  <option value="NVTI Vantharumoolai"
  <?php
    if($center=='NVTI Vantharumoolai')
    {
      echo 'selected';
    }
  ?>>NVTI Vantharumoolai</option>
  <option value="Vellavely"
  <?php
    if($center=='Vellavely') 
    {
      echo 'selected';
    }
  ?> >Vellavely</option>
  <option value="Kaluwanchikudy"
  <?php
    if($center=='Kaluwanchikudy') 
    {
      echo 'selected';
    }
  ?> >Kaluwanchikudy</option>
  <option value="Aarayampathy"
  <?php
    if($center=='Aarayampathy')
    {
      echo 'selected';
    }
  ?> >Aarayampathy</option>
  <option value="Ondhachimadam"
  <?php
    if($center=='Ondhachimadam')
    {
      echo 'selected';
    }
  ?>>Ondhachimadam</option>
  <option value="Vaharai"
  <?php
    if($center=='Vaharai')
    {
      echo 'selected';
    }
  ?>>Vaharai</option>
  <option value="Vavunathevu"
  <?php
    if($center=='Vavunathevu')
    {
      echo 'selected';
    }
  ?>>Vavunathevu</option>
  <option value="Valaichenai"
  <?php
    if($center=='Valaichenai')
    {
      echo 'selected';
    }
  ?> >Valaichenai</option>
  <option value="Kiran"
  <?php
    if($center=='Kiran')
    {
      echo 'selected';
    }
  ?> >Kiran</option>
  <option value="Kattankudy"
  <?php
    if($center=='Kattankudy')
    {
      echo 'selected';
    }
  ?> >Kattankudy</option>
  <option value="Paddiipalai"
  <?php
    if($center=='Paddiipalai')
    {
      echo 'selected';
    }
  ?>>Paddiipalai</option>
</select>
</span>
<br>

<label ><b>Designation</b></label>
<span class="radiobt active">
<select class="form-select-sm" name="desig" id="a6">
                  <option value="">--Select Designation--</option>
                  <option value="Deputy Director"
                  <?php
                    if($desig=='Deputy Director')
                    {
                      echo 'selected';
                    }
                  ?> >Deputy Director</option>
                  <option value="Store Keeper"
                  >Store Keeper</option>
                  <option value="Training Officer"
                  <?php
                    if($desig=='Training Officer')
                    {
                      echo 'selected';
                    }
                  ?> >Training Officer</option>
                  <option value="Accounts Clerk"
                  <?php
                    if($desig=='Accounts Clerk')
                    {
                      echo 'selected';
                    }
                  ?> >Accounts Clerk</option>
                  <option value="Management Assistant"
                  <?php
                    if($desig=='Management Assistant')
                    {
                      echo 'selected';
                    }
                  ?> >Management Assistant</option>
                  <option value="Programme Officer"
                  <?php
                    if($desig=='Programme Officer')
                    {
                      echo 'selected';
                    }
                  ?> >Programme Officer</option>
                  <option value="Testing & Evaluation Officer"
                  <?php
                    if($desig=='Testing & Evaluation Officer')
                    {
                      echo 'selected';
                    }
                  ?> >Testing & Evaluation Officer</option>
                  <option value="Instructor"
                  <?php
                    if($desig=='Instructor')
                    {
                      echo 'selected';
                    }
                  ?> >Instructor</option>
                  <option value="Instructress"
                  <?php
                    if($desig=='Instructress')
                    {
                      echo 'selected';
                    }
                  ?> >Instructress</option>
                  <option value="Senior Instructor"
                  <?php
                    if($desig=='Senior Instructor')
                    {
                      echo 'selected';
                    }
                  ?> >Senior Instructor</option>
                  <option value="Driver"
                  <?php
                    if($desig=='Driver')
                    {
                      echo 'selected';
                    }
                  ?> >Driver</option>
                  <option value="Watcher"
                  <?php
                    if($desig=='Watcher')
                    {
                      echo 'selected';
                    }
                  ?> >Watcher</option>
                  <option value="Office Assistant"
                  <?php
                    if($desig=='Office Assistant')
                    {
                      echo 'selected';
                    }
                  ?> >Office Assistant</option>
                  
                  
              </select>
</span> <br>



<label ><b>Type of Appointment</b></label>
<br>

<span class="radiobt">
  <input type="radio" name="ta" value="P"
  <?php
    if($type=="P")
    {
      echo "checked";
    }
  ?>>Permanet 
  &nbsp &nbsp &nbsp
  <input type="radio" name="ta"  value="C"
  <?php
    if($type=="C")
    {
      echo "checked";
    }
  ?>  > Contract
</span>
  <br>


  </div>
<hr>
<div class="row">
<div class="col">
  <button type="submit" name="b1" class="registerbtn">Update</button>
</div>

<div class="col">
  <button type="reset" class="registerbtn">Clear</button>
</div>
</div>




</form>


</div>
    </main>


    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    
    
  </body>
</html>

