<?php
session_start();
include "connection.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';
 
    if (isset($_SESSION['pin'])) 
    {
    
        if(isset($_POST['apply']))
        {
            // $leavetype=$_POST['leavetype'];
            $fromdate=$_POST['fromdate'];
            $todate=$_POST['todate'];
            $noofdays=$_POST['noofdays'];
            $leavereason=$_POST['leavereason'];
            $acting=$_POST['acting'];
            if($leavetype="")
            {
                header("Location:Leave_Application.php?error=Choose Any Type Of The Leave To Submit The Application");
                exit();
            }
            else if(empty($fromdate))
            {
                header("Location:Leave_Application.php?error=Choose The Date That Your Leave Start Before Submit The Application");
                exit();
            }
            else if(empty($todate))
            {
                header("Location:Leave_Application.php?error=Choose The Date That You Will Return To The Duty <br> Before Submit The Application");
                exit();
            }
            else if(empty($noofdays))
            {
                header("Location:Leave_Application.php?error=Input The Number Of Your Leave Days To Submit The Application");
                exit();
            }
            else if(empty($leavereason))
            {
                header("Location:Leave_Application.php?error=Type The Reason For Your Leave To Submit The Application");
                exit();
            }
            else if(empty($acting))
            {
                header("Location:Leave_Application.php?error=Mention The Acting Person To Submit The Application <br> If No Acting Person Availabe Type 'No Acing Persons'");
                exit();
            }
            else
            {
                $sql="INSERT INTO `leave_details`(`Empid`,`FromDate`, `ToDate`, `total_days`, `Reason`, `Acting_Person`, `CL_id`) VALUES ('".$_SESSION['empid']."','$fromdate','$todate', $noofdays, '$leavereason','$acting','".$_POST['leavetype']."')";
            
                $res=mysqli_query($con,$sql);    

            if($res){
                // header("Location:Leave_Application.php?success=Your Application Has Been Sent Successfully...!");

                $sql1="SELECT e.Email FROM employee AS e INNER JOIN manageuser AS u ON e.PIN=u.PIN where u.UserType='A'";
                $res1=mysqli_query($con,$sql1);
                $email=array();
                if(mysqli_num_rows($res1)>0)
                {                    
                    while($row1=mysqli_fetch_assoc($res1))
                    {
                       array_push($email,$row1['Email']);
                    }
                }
                foreach($email as $eml)
                {                               

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
                            $mail->addAddress($eml, $name);
                
                            //Set email format to HTML
                            $mail->isHTML(true);
                
                            $mail->Subject = 'Leave Application Arrived';
                            $mail->Body    = '<p><b style="font-size: 30px;">New Leave Application has been Recieved <a href="http://localhost/final/lms/index.php"> Click here to view </a> </b></p>';
                
                            $mail->send();                                                                      

                            header("Location:Leave_Application.php?success=Your Application Has Been Sent Successfully...!");
                            exit();
                        }
                    
                        catch (Exception $e) 
                        {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }                                        

                        // exit();
                }
            }
            else{
                header("Location:Leave_Application.php?error=Application Send Is Failed...");
                exit();
                // die(mysqli_error($con));
            }      
        }  

    }
}else{
    header("Location: login.php");
    exit();
}
?>
