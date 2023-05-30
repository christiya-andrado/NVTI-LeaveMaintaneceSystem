

<?php 
    session_start(); 
    include('connection.php'); 

	if (isset($_POST['pin'])) 
    {

        function validate($data){
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }
    

        $pin =($_POST['pin']);
    
        if(empty($pin)){
            header("Location: login.php?error=Password is required");
            exit();
        }else{
            $sql = "SELECT * FROM manageuser WHERE PIN='$pin'";
    
            $result = mysqli_query($con, $sql);
    
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['PIN'] == $pin) {
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
                    // $_SESSION['usertype'] = $row['user_type'];
                    //  $_SESSION['image'] = $row['image'];
                    header("Location: view.php");
                    exit();
                }else{
                    header("Location: login.php?error=Incorect PIN");
                    exit();
                }
            }else{
                header("Location: login.php?error=Incorect PIN");
                exit();
            }
        }

        $sql1 = "SELECT * FROM manageuser WHERE PIN='$pin'";
    
            $result1 = mysqli_query($con, $sql1);
            
            if (mysqli_num_rows($result1) === 1) {
                $row = mysqli_fetch_assoc($result1);
                if ($row['PIN'] == $pin) {
                    $_SESSION['uid'] = $row['U_Id'];
                    $_SESSION['usertype'] = $row['UserType'];
                    $_SESSION['image'] = $row['Image'];
                }
            }
        
    }else{
        header("Location: login.php");
        exit();
    }
  ?>