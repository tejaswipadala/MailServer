<?php
include_once('connection.php');
$data="SELECT * FROM image_galllery";
$ret=mysqli_query($con,$data);
while(list($imgid,$imageN,$title,$des)=mysqli_fetch_array($ret))
{
	echo "<div style=''>";
	echo "<img src='/imageGallery/$imageN' width='50' height='50'/>";
	echo $title;
	echo $des;
	echo "</div>";
}
?>