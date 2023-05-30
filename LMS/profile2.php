<?php
session_start();
require 'connection.php';

if(isset($_SESSION['pin']))
{

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
      display:block;
      width: 140px;
      position: relative;              ;
      margin-left: auto;
      margin-right:auto;      
      /* text-align: center; */
    }
    .upload img{
      border-radius: 50%;
      border: 8px solid #DCDCDC;
      width: 300px;
      height: 300px;
    }
    .upload .rightRound{
      position: absolute;
      bottom: 0;
      margin-left: 200px;
      margin-right:auto; 
      background: #00B4FF;
      width: 32px;
      height: 32px;
      line-height: 33px;
      text-align: center;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
    }
    .upload .leftRound{
      position: absolute;
      bottom: 0;
      margin-left: 100px;
      margin-right:auto; 
      background: red;
      width: 32px;
      height: 32px;
      line-height: 33px;
      text-align: center;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
    }
    .upload .fa{
      color: white;
    }
    .upload input{
      position: absolute;
      transform: scale(2);
      opacity: 0;
    }
    .upload input::-webkit-file-upload-button, .upload input[type=submit]{
      cursor: pointer;
    }
  </style>
  </head>
  <body style="background:#c0e6ff;">
    <div class="container">
    <form class="form" id = "form" action="" enctype="multipart/form-data" method="post" style="margin-top:15%; margin-left:5%; margin-right:15%;">
      <input type="hidden" name="id" value="<?php echo $user['PIN']; ?>">
      <div class="upload">
        <img src="img/<?php echo $user['Image']; ?>" id = "image">

        <div class="rightRound" id = "upload">
          <input type="file" name="fileImg" id = "fileImg" accept=".jpg, .jpeg, .png">
          <i class = "fa fa-camera"></i>
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
    <!-- <form> -->
    
    <!-- </form> -->
    </div>
    <a href="Proflie_Manage.php"><button style="width:300px; font-size:20px; background-color:#64a9f0; color:#ffff; margin-top:20px; margin-left:790px; margin-right:auto; border-radius:10px;"> Back</button></a>

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

      header("Location: profile2.php");
    }
    ?>
    <!-- <br> -->
    
  </body>
</html>

<?php
}else{
     header("Location: login.php");
     exit();
}
?>
