
<?php 
    session_start(); 
    include('connection.php'); 
    echo '<link href="css/pop.css" rel="stylesheet">';

	if (isset($_POST['pin'])) 
    {

        function validate($data)
        {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }
    
        $pin =($_POST['pin']);
    
        if(empty($pin))
        {
            header("Location: login.php?error=Password is required");
            exit();
        }     
        else
        {
            $sql="SELECT * FROM employee WHERE PIN='$pin'";
    
            $result = mysqli_query($con, $sql);
    
            if (mysqli_num_rows($result) === 1) 
            {
                $row = mysqli_fetch_assoc($result);
                if ($row['PIN'] == $pin) 
                {                    
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
                                    
                }
            }
        

            $sql1 = "SELECT * FROM manageuser WHERE PIN='$pin'";
    
            $result1 = mysqli_query($con, $sql1);
            
            if (mysqli_num_rows($result1) === 1) 
            {
                $row = mysqli_fetch_assoc($result1);
                if ($row['PIN'] == $pin) 
                {
                    $_SESSION['uid'] = $row['U_Id'];
                    $_SESSION['usertype'] = $row['UserType'];
                    $_SESSION['image'] = $row['Image'];
                    $_SESSION['status'] = $row['status'];
                    
                    if($_SESSION['status']==1)
                    {
                        if($_SESSION['usertype']=='A')
                        {
                            echo '<div class="popup" id="popup">';?>
                            <img src="img/<?php echo $row['Image']; ?>" width="200px" height="200px"> <?php
                            echo '<h2>Log in</h2><br>';
                                
                            echo '<button type="button" onclick="adminpanel()">Admin Panel</button>';
                            echo '<button type="button" onclick="userpanel()">User Panel</button>';
                            echo '</div>';

                            echo '<script>';
                            echo 'let popup = document.getElementById("popup");';
                                
                            echo 'function openPopup(){';
                            echo 'popup.classList.add("open-popup");';
                            echo '}';

                            echo 'function adminpanel(){';
                            echo 'popup.classList.remove("open-popup");';
                            echo 'window.location.replace("local/index.php");';
                            echo '}';

                            echo 'function userpanel(){';
                            echo 'popup.classList.remove("open-popup");';
                            echo 'window.location.replace("Dashboard.php");';
                            echo '}';
                            echo '</script>';
                            echo '<div id="popup"> </div>';
                        }
                        else
                        {
                            header("Location: Dashboard.php");
                            exit();
                        }
                    }
                    else
                    {
                        header("Location: login.php?error=You Are No Longer As A User");
                        exit();
                    }
                    
                }
                else
                {
                    header("Location: login.php?error=Incorrect PIN");
                    exit();
                }
                
            }
            else
            {
                header("Location: login.php?error=Incorrect PIN Entered");
                exit();
            } 
        }
         
                
    }                
    else
    {
        header("Location: login.php");
        exit();
    }
  ?>