<?php
 
    session_start();
    include "connection.php"; 

    if (isset($_POST["check"]))
    {
        $email = $_POST['email'];
        $verification_code=$_POST['verification_code'];
        $verifypin = $_POST['verifypin'];
        $npin = $_POST['npin'];
        $cnpin = $_POST['cnpin'];
 
        // mark email as verified
         if(empty($npin))
         {
            header("Location:verifypin.php?error=New PIN Is Required");
            exit();
         }
         else if(empty($cnpin))
         {
            header("Location:verifypin.php?error=Confirm PIN Field Can't Be Empty");
            exit();
         }
         else if($npin !== $cnpin)
         {
            header("Location:verifypin.php?error=Confirm PIN Is Not Matched With New PIN <br> Try Again...");
            exit();
         }
         else if($verifypin !== $verification_code)
        {
            header("Location:verifypin.php?error=Entered PIN Doesn't Match With The PIN That Last Sent To Your email <br> Please Recheck The PIN In Your email Account");
            exit();            
        }
        else
        {
            $sql="SELECT PIN FROM employee WHERE Email='$email'";
            $res=mysqli_query($con,$sql);

            if(mysqli_num_rows($res) === 1)
            {
                $sql2="UPDATE employee SET PIN='$npin' WHERE Email='$email'";
                $res2=mysqli_query($con,$sql2);
                header("Location:login.php?success=Your PIN Has Been Changed Successfully...! <BR> Now You Can Login With Your New PIN");
                // header("Location:login.php");
                exit();
            }
            else
            {
                header("Location:verifypin.php?error=Entered Invalid email");
                exit();
            } 
        }           
    }
?>
