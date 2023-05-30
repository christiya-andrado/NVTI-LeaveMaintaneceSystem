<?php
    session_start();
    include "connection.php";
    if (isset($_SESSION['pin'])) 
    { 
       if(isset($_POST['opin']) && isset($_POST['npin']) && isset($_POST['cnpin'])) 
        {
         function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
     
         $opin = $_POST['opin'];
         $npin = $_POST['npin'];
         $cnpin = $_POST['cnpin'];

         if(empty($opin))
         {
            header("Location:PIN_Change.php?error=Current PIN Is Required");
            exit();
         }
         else if(empty($npin))
         {
            header("Location:PIN_Change.php?error=New PIN Is Required");
            exit();
         }
         else if(empty($cnpin))
         {
            header("Location:PIN_Change.php?error=Confirm PIN Field Can't Be Empty");
            exit();
         }
         else if($opin !== $_SESSION['pin'] && $npin !== $cnpin)
         {
            header("Location:PIN_Change.php?error=Current PIN Is Inaccurate And <br> Confirm PIN Is Not Matched With New PIN <br> Try Again...");
         }
         else if($opin !== $_SESSION['pin'])
         {
            header("Location:PIN_Change.php?error=Current PIN Is Inaccurate");
         }
         else if($npin !== $cnpin)
         {
            header("Location:PIN_Change.php?error=Confirm PIN Is Not Matched With New PIN <br> Try Again...");
            exit();
         }
         else
         {
            // $opin=md5($opin);
            // $npin=md5($npin);
            // $cnpin=md5($cnpin);

            // $id=$_SESSION['empid'];
            
            $sql="SELECT PIN FROM employee WHERE PIN='$opin'";
            $res=mysqli_query($con,$sql);

            if(mysqli_num_rows($res) === 1)
            {
                $sql2="UPDATE employee SET PIN='$npin' WHERE PIN='$opin'";
                $res2=mysqli_query($con,$sql2);
                if($res2)
                {
                header("Location:PIN_Change.php?success=Your PIN Has Been Changed Successfully...!");
                exit();
                }
                else
                {
                  header("Location:PIN_Change.php?error=Update Failed");
                  exit();
                }
               //  $sql3="UPDATE manageuser SET PIN='$npin' WHERE PIN='$opin'";
               //  $res3=mysqli_query($con,$sql3);
               //  if($res2)
               //  {
               //  header("Location:PIN_Change.php?success=Your PIN Has Been Changed Successfully1...!");
               //  exit();
               //  }
               //  else
               //  {
               //    header("Location:PIN_Change.php?error=Update Failed1");
               //    exit();
               //  }
            }
            else
            {
                header("Location:PIN_Change.php?error=Entered Inaccurate PIN In Current PIN Field");
                exit();
            }
         }
       }
       else
       {
            header("Location:PIN_Change.php");
            exit();
       }
    }
    else
    {
        header("Location: login.php");
        exit();
    }    
?>