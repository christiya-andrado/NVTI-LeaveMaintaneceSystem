<?php
if(isset($_GET['deleteid']))
{
    include "connection.php";

    $id=$_GET['deleteid'];

    $sql="UPDATE manageuser SET UserType='O' WHERE U_Id=$id";
    $res=mysqli_query($con,$sql);

    if($res)
    {
        header ("Location:viewusers.php");
    }
    else{
        die(mysqli_error($con));
    }
}
?>