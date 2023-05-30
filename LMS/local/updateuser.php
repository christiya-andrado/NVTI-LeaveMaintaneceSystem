<?php

    include "connection.php";
    $id=$_GET['id'];
    

           if ($id) {
            
            $sql="SELECT status FROM manageuser WHERE U_Id=$id";
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($res);
            $status=$row['status'];
            
             if ($status==1) {//status = 1 (on)
                 $status_str = "0";
                 
             } else {
                 $status_str = "1";
                 
             }
             echo $id;
             
             $update ="UPDATE `manageuser` SET `status` =$status_str WHERE `U_Id` =$id LIMIT 1;";
             $resu=mysqli_query($con,$update);

             if($resu)
             {
                header ("Location:view.php");
             }
            }

 

?>
