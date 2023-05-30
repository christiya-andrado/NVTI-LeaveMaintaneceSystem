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
        if($email)
        {
            $sql="SELECT * FROM employee WHERE Email='$email'";
            $res=mysqli_query($con,$sql);
            // if($res)
            // {
            //     echo "<script> alert('email found.....'); </script>";
            // }
        
            if(mysqli_num_rows($res) >0)
            {
                $row=mysqli_fetch_assoc($res);
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

                    $name=$row['EmpName'];

                    $sql1="SELECT * FROM manageuser WHERE EPFNo=$epfno";
                    $res1=mysqli_query($con,$sql1);

                    if(mysqli_num_rows($res1) === 1)
                    {
                        $row=mysqli_fetch_assoc($res1);

                        if($row['status'] == 1)
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
                                $mail->Username = 'nvtileave@gmail.com';
                    
                                //SMTP password
                                $mail->Password = 'pvudqogcjxikjmtr';
                    
                                //Enable TLS encryption;
                                $mail->SMTPSecure = "";
                    
                                //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                                $mail->Port = 587;
                    
                                //Recipients
                                $mail->setFrom('nvtileave@gmail.com', 'Leave Maintenance System');
                    
                                //Add a recipient
                                $mail->addAddress($email, $name);
                    
                                //Set email format to HTML
                                $mail->isHTML(true);
                    
                                $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
                    
                                $mail->Subject = 'Email verification';
                                $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
                    
                                $mail->send();
                                // echo 'Message has been sent';

                                // $sql2="INSERT INTO `employee`(`verifypin`) VALUES ('$verification_code') WHERE Email='$email'";
                                // $res2=mysqli_query($con,$sql2);

                    
                                // $encrypted_password = password_hash($password, PASSWORD_DEFAULT);                                                                        

                                header("Location: verifypin.php?email=" . $email . "&verification_code=".$verification_code);
                                exit();
                                
                            } catch (Exception $e) {
                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            }
                        }
                        else
                        {
                            header("Location:forgot_password.php?error=You Are No Longer As A User");
                            exit(); 
                        }
                    }
                }            
            }
            else
            {
                header("Location:forgot_password.php?error=According To The Entered email Id <br> You Are No Longer As A User Yet");
                exit();
            }
        } 
        else
        {
            header("Location:forgot_password.php?error=email is required");
            exit();
        }                   
    }
?>