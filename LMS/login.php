<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/pop.css" rel="stylesheet">

    <title>Login</title>

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
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/pop.css" rel="stylesheet">
    <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Float cancel and delete buttons and add an equal width */
.cancelbtn, .deletebtn {
  float: left;
  width: 50%;
}

/* Add a color to the cancel button */
.cancelbtn {
  background-color: #ccc;
  color: black;
}

/* Add a color to the delete button */
.deletebtn {
  background-color: #f44336;
}

/* Add padding and center-align text to the container */
.container {
  padding: 16px;

}

/* The Modal (background) */
.modal {
    background-image: url("login.php");
    background-color: rgba(251,252,252,0.7);
}


/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 17% auto 15% auto; /* 17% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */
  height: 30%;
}
@media(max-width:1280px){
  .modal-content{
  background-color: #fefefe;
  /* margin: 17% auto 15% auto;        //17% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 90%; /* Could be more or less, depending on screen size */
  height: 40%;
}

}


/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Modal Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #000;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and delete button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .deletebtn {
     width: 100%;
  }
  
}
</style>


<style>
    .error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}
    .success {
    background: #def2e4;
    color: #42a964;
    padding: 10px;
    width: 50%;
    border-radius: 5px;
    margin: 20px auto;
}
</style>

</head>

<body style="margin-top:180px; background-color:#d1d1d1;">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">                        
                        <div class="login-form">
                            <h4>Login</h4>
                            
                            <form method="post">                                
                                <div class="form-group">
                                <!-- error msg -->
                                    <label>Personal Identification Number :</label> <br>
                                    <input type="password" class="form-control" name="pin" placeholder="Enter PIN" autofocus>
                                </div>
                                <div class="checkbox">
                                    <label class="pull-right">
										<a href="forgot_password.php">Forgotten PIN?</a>
									</label>
                                </div>                               
                                <input type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="login" style="background-color:#9d1d40;"
                                  value="OK"> 
                                <div class="register-link text-center">  
                                <p>Back to <a href="index.php"> Home</a></p>
                                </div>                                                             
                            </form>
                            
                         
                           
                            <div id="id01" class="modal">
                            <form class="modal-content" >
                                
                               <a href="logout2.php"><span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span></a> 
                                <h3 style="" class="text-center mt-3">Choose to move on next</h3>
                                
                                <br><br>
                                
                                  
                                <a href="local/index.php" class="btn  form-control w-50 d-block mx-auto" style=" background-color: #aa0412d2; color: #fff;border-radius:10px;" >Admin Dashboard</a> <br> <br>
                                <a href="user/dashboard.php" class="btn  form-control w-50 d-block mx-auto" style="background-color: #aa0412d2; color: #fff;border-radius:10px;" >User Dashboard</a>
                               
                               
                            </form>
</div>

                            
                        </div><!--modal-->
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


  
<?php
        include('connection.php'); 
         if(isset($_POST['login']))
         {
            if($_POST['pin']== NULL)
            {
              echo "<script> alert('Enter Pin...!.'); location.replace('./login.php') </script>";
            }
            else
            {
                $pin=$_POST['pin'];

                $sql="SELECT * FROM employee WHERE PIN='$pin'";
                $result = mysqli_query($con, $sql);
    
                if (mysqli_num_rows($result) === 1) 
                {
                    $row = mysqli_fetch_assoc($result);
                                  if ($row['PIN'] == $pin) 
                                  {                    
                                      if(is_null($row['P_EPFNo']))
                                      {
                                          $_SESSION['epfno']=$row['C_EPFNo'];
                                      }
                                      else
                                      {
                                          $_SESSION['epfno']=$row['P_EPFNo'];
                                      }
                                      $_SESSION['empid'] = $row['Empid'];
                                      $_SESSION['empname'] = $row['EmpName'];
                                      $_SESSION['gender'] = $row['Gender'];
                                      $_SESSION['nic'] = $row['NIC'];
                                      $_SESSION['address'] = $row['Address'];
                                      $_SESSION['firstdate'] = $row['FirstAppointment_Date'];
                                      $_SESSION['email'] = $row['Email'];
                                      $_SESSION['contactno'] = $row['Contact_No'];
                                      $_SESSION['centre'] = $row['CenterLocation'];
                                      $_SESSION['designation'] = $row['Designation'];
                                      $_SESSION['typeofappoinyment'] = $row['TypeOf_Appointment'];
                                      $_SESSION['pin'] = $row['PIN'];
                                        
                                
                                    
                                        $sql1 = "SELECT * FROM manageuser WHERE PIN='$pin'";
                            
                                    $result1 = mysqli_query($con, $sql1);
                          
                                  if (mysqli_num_rows($result1)===1) 
                                  {
                                      $row = mysqli_fetch_assoc($result1);
                                      if ($row['PIN'] == $pin) 
                                      {
                                          $_SESSION['uid'] = $row['U_Id'];
                                          $_SESSION['usertype'] = $row['UserType'];
                                          $_SESSION['image'] = $row['Image'];
                                          $_SESSION['status'] = $row['status'];
                                          
                                          if($_SESSION['status']==1)
                                          {
                                              if($_SESSION['usertype']=='O')
                                              {
                                                  echo " <script>location.replace('user/dashboard.php'); </script>";
?>                                  
<?php                                         }
                                              else{
                                                ?>  <script> document.getElementById("id01").style.display="block"; </script>
                                                <?php
                                              }
                                            }
                                            else{
                                              echo "<script> alert('You Are No Longer As A User...!.'); location.replace('./login.php') </script>";
                                            }
                                       }
                                    } 
                                                                 
                                            
                    
            }
            
          }
          else{
            echo "<script> alert('Incorrect PIN...!.'); location.replace('./login.php') </script>";
          }

          }
        }
?>   
                     
   
<script>
    // Get the modal
    var modal = document.getElementById("id01");

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
    modal.style.display = "none";
    }
    }
</script>
</body>

</html>

