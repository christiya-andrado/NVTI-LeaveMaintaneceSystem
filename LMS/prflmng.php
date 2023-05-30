<?php
    session_start();
    include "connection.php";
    if (isset($_SESSION['pin'])) 
    { 
       if(isset($_POST['mail']) && isset($_POST['phone']) && isset($_POST['updt'])) 
        {
         
         $mail = $_POST['mail'];
         $phone = $_POST['phone'];

         if(empty($mail) && empty($phone))
         {
            header("Location:Proflie_Manage.php?error=Email Is Required");
            exit();
         }
         else if(empty($phone))
         {
            header("Location:Proflie_Manage.php?error=Phone Number Is Required");
            exit();
         }
         else if(empty($mail))
         {
            header("Location:Proflie_Manage.php?error=Email Field And Phone Number Field Can't Be Empty");
            exit();
         }
         
         else
         {     
            $sql="UPDATE employee SET 	Email='$mail', Contact_No='$phone' WHERE Empid='".$_SESSION['empid']."'";
            $res=mysqli_query($con,$sql);
    
            if($res)
            {
                
                header("Location:Proflie_Manage.php?success=Your Email Address And Phone Number Has Been Changed Successfully...!");
               // echo "Records Updated...!!!!";
            }
            else
            {
                header("Location:Proflie_Manage.php?error=Update Failed");
                  exit();
                // die(mysqli_error($con));
            }       
            
         }
       }
       else
       {
            header("Location:Proflie_Manage.php");
            exit();
       }
    }
    else
    {
        header("Location: login.php");
        exit();
    }    
?>