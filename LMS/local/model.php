<?php
    session_start();
    include "connection.php";
    $id=$_SESSION['sid'];
    echo $id;
   
if(isset($_POST['mbtn']))
 {
   $state=$_POST['option'];
   $rem=$_POST['remark'];

   $sqlu="UPDATE leave_details SET Status=$state, Remark='$rem' WHERE LD_Id=$id";

   $resu=mysqli_query($con,$sqlu);

   if($resu)
   {
     header ("location:leaveView.php");
   }

 }
?>