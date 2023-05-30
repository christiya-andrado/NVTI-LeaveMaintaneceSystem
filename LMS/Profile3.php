<?php

require 'connection.php';

if(isset($_SESSION['pin']))
{

// $_SESSION["id"] = 1; // Fill session id with user's id to get user's data like name and image name
$sessionId = $_SESSION['pin'];
$user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM manageuser WHERE PIN = $sessionId"));
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Image</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style media="screen">
    .upload{
      width: 140px;
      position: relative;
      margin: auto;
      text-align: center;
    }
    .upload img{
      border-radius: 50%;
      border: 2px solid #DCDCDC;
      width: 50px;
      height: 50px;
    }    
  </style>
  </head>
  <body>
    <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
      <input type="hidden" name="id" value="<?php echo $user['PIN']; ?>">
      <div class="upload">
        <img src="img/<?php echo $user['Image']; ?>" id = "image">               
      </div>
    </form>

   
  </body>
</html>

<?php
}else{
     header("Location: login.php");
     exit();
}
?>
