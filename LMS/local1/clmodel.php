
<?php

    class model_cls
    {
       
     public function approve($status,$remark)
        {
            $id=$_SESSION['sid'];
            include "connection.php";
            
            if($remark)
            {
                if($status==1)
                {
                    $sqlu="UPDATE leave_details SET Status=1, Remark='$remark', is_read=1 WHERE LD_Id=$id";
                    $resu=mysqli_query($con,$sqlu);

                    echo "<script> alert ('The Appliation Has Been Approved Successfully....!') </script>";
                    // header("Location:index.php");
                    echo '<script> window.top.location="index.php"</script>';

                }
                if($status==2)
                {
                    $sqlu1="UPDATE leave_details SET Status=2, Remark='$remark', is_read=1 WHERE LD_Id=$id";
                    $resu1=mysqli_query($con,$sqlu1);

                    echo "<script> alert ('The Appliation Has Been Declined Successfully....!') </script>";
                    echo '<script> window.top.location="index.php"</script>';

                }
                if($status==0)
                {
                    echo '<script> alert ("To Perform The Action Choose Any Of The Action....!") </script>';
                }
                              
            }
            else{
                    echo '<script> alert ("To Perform The Action Remark Needed....!") </script>';
                }
        }

        public function nopay($rem)
        {
            include "connection.php";

            $id=$_SESSION['sid'];

            $sql="SELECT nopay FROM leave_details WHERE LD_Id=$id";
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($res);
            $nop=$row['nopay'];
            
             if ($nop==1) {//status = 1 (on)
                 $nopay = "0";
                 
             } else {
                 $nopay = "1";
                 
             }
             echo $id;
             
             $update ="UPDATE `manageuser` SET `ustatus` =$nopay, Remark='$rem' WHERE `U_Id` =$id LIMIT 1;";
             $resu=mysqli_query($con,$update);


        }
    } 
    
?>