<?php

    $dbhost="localhost";
    $dbuser="root";
    $dbpswd="";
    $dbname="lms";

    if(!$con=mysqli_connect($dbhost,$dbuser,$dbpswd,$dbname))
    {
        die("Failed To Connect...!!!");
    }
?>