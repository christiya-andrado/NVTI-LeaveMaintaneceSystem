<?php
    $con=mysqli_connect("localhost","root","","lms"); 
    if(!$con)
    {
        die( "<br><br>Connection Error".mysqli_connect_error());
    }
?>