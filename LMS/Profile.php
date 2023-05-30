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
    
    <style>
       
    .upload img{
      margin: auto;
      text-align: center;
      border-radius: 0%;
      border: 8px solid #DCDCDC;
      width: 325px;
      height: 325px;
    }
    </style>
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
                        
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar"><?php echo $_SESSION['empname']; ?>
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Your Profile</span>
                                       
                                    </div>
                                    <div class="dropdown-content-body">
                                    <ul>
                                            <li>
                                                <a href="Proflie_Manage.php">
                                                    <i class="ti-user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="inbox.php">
                                                    <i class="ti-email"></i>
                                                    <span>Inbox</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="Profile_Manage.php">
                                                    <i class="ti-settings"></i>
                                                    <span>Edit Profile</span>
                                                </a>
                                            </li>

                                           
                                            <li>
                                                <a href="index.php">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
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
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                    <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="user-profile">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="user-photo m-b-30">
                          <?php
                            $sessionId = $_SESSION['pin'];
                            $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM manageuser WHERE PIN = $sessionId"));
                            ?>
                            <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
                              <input type="hidden" name="id" value="<?php echo $user['PIN']; ?>">
                              <div class="upload">
                                <img src="img/<?php echo $user['Image']; ?>" id = "image">

                                <div class="rightRound" id = "upload">
                                  <input type="hidden" name="fileImg" id = "fileImg" accept=".jpg, .jpeg, .png">                                  
                                </div>

                                <div class="leftRound" id = "cancel" style = "display: none;">
                                  <i class = "fa fa-times"></i>
                                </div>
                                <div class="rightRound" id = "confirm" style = "display: none;">
                                  <input type="submit">
                                  <i class = "fa fa-check"></i>
                                </div>
                              </div>
                            </form>
                            <script type="text/javascript">
                                document.getElementById("fileImg").onchange = function(){
                                document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

                                document.getElementById("cancel").style.display = "block";
                                document.getElementById("confirm").style.display = "block";

                                document.getElementById("upload").style.display = "none";
                              }

                                var userImage = document.getElementById('image').src;
                                document.getElementById("cancel").onclick = function(){
                                document.getElementById("image").src = userImage; // Back to previous image

                                document.getElementById("cancel").style.display = "none";
                                document.getElementById("confirm").style.display = "none";

                                document.getElementById("upload").style.display = "block";
                              }
                            </script>
                            <?php
                              if(isset($_FILES["fileImg"]["name"])){
                                $id = $_POST["id"];

                                $src = $_FILES["fileImg"]["tmp_name"];
                                $imageName = uniqid() . $_FILES["fileImg"]["name"];

                                $target = "img/" . $imageName;

                                move_uploaded_file($src, $target);

                                $query = "UPDATE manageuser SET Image = '$imageName' WHERE PIN = $id";
                                $profile_updated=mysqli_query($con, $query);
                                $_SESSION['profile_updated']=$profile_updated;

                                header("Location: Profile.php");
                              }
                            ?>
                          
                        </div>
                        
                        <div class="user-work">
                          <h4 style="color:#2e3cc2;">work</h4>
                          
                          <div class="work-content">
                            <h3 style="color:#040404;">Centre Location </h3>
                            <p><?php echo $_SESSION['centre'];?></p>
                          </div>
                          <div class="work-content">
                            <h3 style="color:#040404;">EPF Number </h3>
                            <p><?php echo $_SESSION['epfno'];?></p>
                          </div>
                          <div class="work-content">
                            <h3 style="color:#040404;">First Appointment Date </h3>
                            <p><?php echo $_SESSION['firstdate'];?></p>
                          </div>
                          <div class="work-content">
                            <h3 style="color:#040404;">Type Of Appointment </h3>
                            <p><?php if($_SESSION['typeofappoinyment']=='P'){echo "Permanent";} else {echo "Contract";}?></p>
                          </div>
                         
                        </div>
                       
                      </div>
                      <div class="col-lg-8">
                        <div class="user-profile-name">Name: <?php echo $_SESSION['empname'];?></div>
                        
                        <div class="user-Location">
                          <i class="ti-location-pin"></i><?php echo $_SESSION['address'];?></div>
                        <div class="user-job-title" style="color:#040404;"><span style="color:#2e3cc2;">Designation: </span><?php echo $_SESSION['designation'];?> </div>
                        <div class="ratings">
                          
                        
                        <div class="custom-tab user-profile-tab">
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                              <a href="#1" aria-controls="1" role="tab" data-toggle="tab" style="color:#2e3cc2;">About</a>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">
                                <h4 style="color:#040404;">Contact information</h4>
                                <div class="phone-content">
                                  <span class="contact-title">Phone:</span>
                                  <span class="phone-number"><?php echo $_SESSION['contactno'];?> </span>
                                </div>
                                <div class="address-content">
                                  <span class="contact-title">Address:</span>
                                  <span class="mail-address"><?php echo $_SESSION['address'];?> </span>
                                </div>
                                <div class="email-content">
                                  <span class="contact-title">Email:</span>
                                  <span class="contact-email"><?php echo $_SESSION['email'];?> </span>
                                </div>
                                

                              <div class="basic-information">
                                <h4 style="color:#040404;">Basic information</h4>                                
                                <div class="gender-content">
                                  <span class="contact-title">Gender:</span>
                                  <span class="gender"><?php if($_SESSION['gender']=='F'){echo 'Female';} else{echo 'Male';}?> </span>
                                </div>

                                <div class="gender-content">
                                  <span class="contact-title">NIC:</span>
                                  <span class="gender"><?php echo $_SESSION['nic'];?></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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