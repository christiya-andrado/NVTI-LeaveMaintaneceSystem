<?php
    session_start();
    include "connection.php";    
        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
    
        //Load Composer's autoloader
        require 'vendor/autoload.php';
    
        if (isset($_POST["register"]))
        {
            $email = $_POST["email"];

            $sql1="SELECT * FROM employee WHERE Email='$email'";
            $res1=mysqli_query($con,$sql1);
            if($res1)
            {
                echo "<script> alert('email found....'); </script>";
            }
            if(mysqli_num_rows($res1) >0)
            {
                $row=mysqli_fetch_assoc($res1);
                 if($row['Email'] == $email)
                 {
                    if(is_null($row['P_EPFNo']))
                    {
                        $epfno=$row['C_EPFNo'];
                    }
                    else
                    {
                        $epfno=$row['P_EPFNo'];
                    }

                    $sql2="SELECT * FROM manageuser WHERE EPFNo=$epfno";
                    $res2=mysqli_query($con,$sql2);

                    if($res2)
                        {
                            echo "<script> alert('epfno found....'); </script>";
                        }
                    if(mysqli_num_rows($res2) === 1)
                    {
                        $row = mysqli_fetch_assoc($res2);
                        if($row['status'] !== 0)
                        {
                            //Instantiation and passing `true` enables exceptions
                            $mail = new PHPMailer(true);
                    
                            try {
                                //Enable verbose debug output
                                $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
                    
                                //Send using SMTP
                                $mail->isSMTP();
                    
                                //Set the SMTP server to send through
                                $mail->Host = 'smtp.gmail.com';
                    
                                //Enable SMTP authentication
                                $mail->SMTPAuth = true;
                    
                                //SMTP username
                                $mail->Username = 'hatunsehrish@gmail.com';
                    
                                //SMTP password
                                $mail->Password = 'aynaahgkjkgrssyr';
                    
                                //Enable TLS encryption;
                                $mail->SMTPSecure = "";
                    
                                //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                                $mail->Port = 587;
                    
                                //Recipients
                                $mail->setFrom('hatunsehrish@gmail.com', 'LMS');
                    
                                //Add a recipient
                                $mail->addAddress($email, $name);
                    
                                //Set email format to HTML
                                $mail->isHTML(true);
                    
                                $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
                    
                                $mail->Subject = 'PIN CHANGING';
                                $mail->Body    = '<p>Your PIN is: <b style="font-size: 20px;">' . $verification_code . '</b></p>';
                    
                                $mail->send();
                                 echo "<script> alert('Message has been sent'); </script>";
                    
                                // $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
                    
                                // update in users table
                                $sql3="UPDATE employee SET PIN='".$verification_code."' WHERE Email='$email'";
                                $res3=mysqli_query($con,$sql3);

                                if($res3)
                                {
                                    echo "<script> alert('pin changed....'); </script>";
                                }

                                header("Location: login.php?email=".$email);
                                exit();
                            } 
                            catch (Exception $e) 
                            {
                                header("Location:forgot_password.php?error=Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
                                exit();                                
                            }
                        }
                        else
                        {
                            header("Location:forgot_password.php?error=You Are No Longer As A User");
                            exit();                            
                        }
                    }
                 } 
                // else
                // {
                //     header("Location:forgot_password.php?error=According To The Entered email Id <br> You Are No Longer As A User Yet");
                //     exit();                    
                // }               
            }
            else
            {
                header("Location:forgot_password.php?error=According To The Entered email Id <br> You Are No Longer As A User Yet");
                exit();
            }            
        }    
?>

<!-- <form method="POST">
    <input type="email" name="email" placeholder="Enter email" required />
 
    <input type="submit" name="register" value="Register">
</form> -->