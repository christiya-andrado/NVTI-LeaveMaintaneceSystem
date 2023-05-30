<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['EPFNo']) || (trim($_SESSION['EPFNo']) == '')) {
    header("location: index.php");
    exit();
}
$epfno=$_SESSION['EPFNo'];

?>