<?php
error_reporting(1);
$sid=$_SESSION['sid'];

include 'connection.php';

$r=mysqli_query($con,"select * from userinfo where user_name='$sid'");
echo "<form action='updateDetails.php' method='POST'>";
echo "<table border='1' align='center'>";
$row=mysqli_fetch_object($r);
$p=$row->password;
$m=$row->mobile;
$e=$row->email;
echo "<tr height='40'>";
echo "<td>Your userId :</td>";
echo "<td>".$row->user_jd."</td>";
echo "</tr>";

echo "<tr height='40'>";
echo "<td>Your username :</td>";
echo "<td>".$row->user_name."</td>";
echo "</tr>";

echo "<tr height='40'>";
echo "<td>Your Password :</td>";
echo "<td><input type='password'  name='' value='$p'disabled/></td>";
echo "</tr>";

echo "<tr height='40'>";
echo "<td>Your Mobile :</td>";
echo "<td><input type='text' pattern='[0-9][0-9]{9}' minlength=10 maxlength=10 name='mobilenum' value='$m' required/></td>";
echo "</tr>";

echo "<tr height='40'>";
echo "<td>Email </td>";
echo "<td><input type='text' pattern='[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}' name='emailId' value='$e' required/></td>";
echo "</tr>";

echo "<tr height='40'>";
echo "<td>Your gender is :</td>";
echo "<td>".$row->gender."</td>";
echo "</tr>";

echo "<tr height='40'>";
echo "<td>Your hobbies are :</td>";
echo "<td>".$row->hobbies."</td>";
echo "</tr>";

echo "<tr height='40'>";
echo "<td>Your DOB is :</td>";
echo "<td>".$row->dob."</td>";
echo "</tr>";

echo "<tr height='40'>";
echo "<td>Your Pics  :</td>";
echo "<td><img alt='image not upload' src='userImages/$id/$file' height='80' width='80'/></td>";
echo "</tr>";
echo "</table>";
echo "<br>";
echo "<center><button>Update</button></center>";
echo "</form>";
?>
