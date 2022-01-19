<?php 
error_reporting(1);
session_start();
$sid=$_SESSION['sid'];
include 'connection.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $mobilenum = $_POST['mobilenum'];
    $emailId = $_POST['emailId'];
    echo $mobilenum." ---- ".$emailId;

    $sql="update userinfo set mobile='$mobilenum', email='$emailId' where user_name='$sid'";
    mysqli_query($con,$sql);
    header('location:HomePage.php?chk=vprofile');
} 
else {
    echo "<script>alert('No details updated!');</script>";
}
?>