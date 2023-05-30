<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

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
    <title>Add New Employees</title>

    <link rel="stylesheet" href="form.css">


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
      <h1 class="fcol">Add Employee</h1>
          <hr>
     
          
          <form method="post">
      
          <label ><b>EPF Number</b></label>
          <input type="text" placeholder="Enter the EPF Number" name="epf" autocomplete="off">
      
          <label ><b>Employee Name</b></label>
          <input type="text" placeholder=" Enter the Name" name="name" autocomplete="off">
      
          <label ><b>Gender</b></label>
          <br>
        
          <span class="radiobt active">
            <input type="radio" name="sex" value="M" >Male
            &nbsp &nbsp &nbsp
            <input type="radio" name="sex"  value="F">Female
          </span>
            <br>

            <label ><b>NIC Number</b></label>
          <input type="text" placeholder="Enter the NIC Number" name="nic"  autocomplete="off">

          <label ><b>Address</b></label>
          <input type="text" placeholder="Enter the Address" name="address"  autocomplete="off">

          <label ><b>First Appointment Date</b></label><br>
          <span class="radiobt">
          <input type="date" style=" border: none; background: #f1f1f1;outline: none;" placeholder="Enter the First Appointment Date" name="fad" autocomplete="off"><br>
          </span>
          <label ><b>E-mail </b></label><br>
          
          <input type="email" style=" border: none; background: #f1f1f1;  margin: 5px 0 22px 0;  width: 100%; padding: 15px; outline: none;" placeholder="Enter Your E-mail" name="email" autocomplete="off">
          
       
<br>
          <label ><b>Contact Number</b></label>
          <input type="text" placeholder="Enter the Contact " name="contact" autocomplete="off">

          <label ><b>Work Station</b></label>
          <span class="radiobt active">
          <select name="center" class="form-select-sm" style=" border: none; background: #f1f1f1;outline: none;">
            <option value="o1">--Select Work Station--</option>
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
          </span>
          <br>

          <label ><b>Designation</b></label>
          <span class="radiobt active">
          <select class="form-select-sm" name="desig" id="a6" style=" border: none; background: #f1f1f1;outline: none;">
                            <option value="">--Select Designation--</option>
                            <option value="Deputy Director">Deputy Director</option>
                            <option value="Store Keeper">Store Keeper</option>
                            <option value="Training Officer">Training Officer</option>
                            <option value="Accounts Clerk">Accounts Clerk</option>
                            <option value="Management Assistant">Management Assistant</option>
                            <option value="Programme Officer">Programme Officer</option>
                            <option value="Testing & Evaluation Officer">Testing & Evaluation Officer</option>
                            <option value="Instructor">Instructor</option>
                            <option value="Instructress">Instructress</option>
                            <option value="Senior Instructor">Senior Instructor</option>
                            <option value="Driver">Driver</option>
                            <option value="Watcher">Watcher</option>
                            <option value="Office Assistant">Office Assistant</option>
                            
                            
                        </select>
                        </span> <br>
        

          <label ><b>Type of Appointment</b></label>
          <br>
        
          <span class="radiobt">
            <input type="radio" name="ta" value="P">Permanet 
            &nbsp &nbsp &nbsp
            <input type="radio" name="ta"  value="C"  > Contract
          </span>
            <br>
          

      
        <hr>
        <div class="row">
          <div class="col">
            <button type="submit" name="b1" class="registerbtn">Submit</button>
          </div>

          <div class="col">
            <button type="reset" class="registerbtn">Clear</button>
          </div>
        </div>
        
      
      
       
      </form>
      
<?php

  function PIN($ln)
  {
    $pin="";
    if($ln<5)
    {
      $ln=6;
    }
    $len=rand(6,$ln);
    for($i=0; $i<$ln; $i++)
    {
      $pin.=rand(0,9);
    }
    return $pin;
  }

    if(isset($_POST['b1']))
    {
        include "connection.php";
        $epf= $_POST['epf'];
        $name= $_POST['name'];
        $sex= $_POST['sex'];
        $nic= $_POST['nic'];
        $address= $_POST['address'];
        $fad= $_POST['fad'];
        $mail= $_POST['email'];
        $contact= $_POST['contact'];
        $center= $_POST['center'];
        $desig= $_POST['desig'];
        $ta= $_POST['ta'];
        $pin=pin(6);
        echo '<h1 class="fcol">';

        $sqlc="select NIC,P_EPFNo,C_EPFNo from employee";
        $resc=mysqli_query($con,$sqlc);

    while($rowc=mysqli_fetch_assoc($resc))
    {
    $chnic=$rowc['NIC'];
    $cpepf=$rowc['P_EPFNo'];
    $ccepf=$rowc['C_EPFNo'];
    }
    if($chnic==$nic)
    {
        echo "<br><script class='p-4 bg-danger text-white'>alert ('Sorry This NIC No Alresdy Exsist...!'); </script>";
    }
    elseif($cpepf==$epf)
    {
      echo "<br><script class='p-4 bg-danger text-white'>alert ('Sorry This EPF No Alresdy Exsist...!'); </script>";
    }
    elseif($ccepf==$epf)
    {
      echo "<br><script class='p-4 bg-danger text-white'>alert ('Sorry This EPF No Alresdy Exsist...!'); </script>";
    }
    else{

        $sql = "SELECT insertemp($epf,'$name','$sex','$nic','$address','$fad','$mail','$contact','$center','$desig','$ta','$pin')";

                 $res=mysqli_query($con,$sql);

                 $sql1 = "INSERT INTO `manageuser` (`U_Id`, `EPFNo`, `PIN`, `UserType`, `status`) VALUES (NULL,$epf,$pin,'O','1')";

                 $res1=mysqli_query($con,$sql1);

                


                 if(!$res)
                 {
                    die(mysqli_error($res));
                 }

                  
  $email =$mail;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }
  
    $msg=$name;
    $msg1=$pin; 
    $ad=$mail;
    
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
  
  $mail = new PHPMailer(true);
  
  try {
     
      $mail->isSMTP();                       //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'nvtileave@gmail.com';                     //SMTP username
      $mail->Password   = 'pvudqogcjxikjmtr';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('nvtileave@gmail.com', 'NVTI Leave Maintanance System');
      $mail->addAddress($email);     //Add a recipient
     
      $message='<div class="card " style="margin-top: 50px; width: 100%; height: 70%; background: #d5f5fd;  border-radius: 5px; padding: 20px; border: 1px">
      <div class="card-body" >
            Dear Sir/Madam,<br>  
           You got a password to access the system, now You can apply your leave easily.<br><br>
        <span class="text-primary"> 
              Name: '.$msg.'<br>
              Your Password: '.$msg1.'
      </div> </div>';
     
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Here is the subject';
      $mail->Body    = $message;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      echo '
      <script>
      window.alert("Records has been Submited...!");
      </script>';
    
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }             
  
        
    }
  //loop
  }//btn


  

  
  ?>

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