<?php
session_start();
if($_SESSION['sid']=="")
{
	header('Location:index.php');
}
$id=$_SESSION['sid'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>My mail server</title>
		<style>
			a{text-decoration:none}
			a:hover{ background-color:#00CC66}
			#atop{margin-left:50}
		</style>
	</head>


<body>
	
	<table width="975" border="1" align="center">
  
  <tr>
	  <td height="115" colspan="3" align="center">
		  <div>
			  <?php
	
	include 'connection.php';
	error_reporting(1);
	
	$chk=$_GET['chk'];
	if($chk=="logout")
	{
		unset($_SESSION['sid']);
		header('Location:index.php');
	}
	$r=mysqli_query($con,"select * from userinfo where user_name='{$_SESSION['sid']}'");
	
	$row=mysqli_fetch_object($r);
	@$file=$row->image;

	echo "<img alt='image not upload' src='userImages/$id/$file' height='80' width='80'/>";
?></div>
	
	 <div style="float:left;margin-left:300px;padding-top:40px;font-size:25px;text-align:center;color:#00CC66"> Welcome <?php  echo @$_SESSION['sid'];?>
	 </div>
 	  </td>
  </tr>
  <tr>
    <td height="38" colspan="3">
		<!-- <a style="margin-left:50px"  href="HomePage.php?chk=chngthm">CHANGE THEME</a> -->
		<a style="margin-left:50px"  href="HomePage.php?chk=chngPass">CHANGE PASSWORD</a>
		
		<a style="margin-left:50px" href="HomePage.php?chk=vprofile">EDIT YOUR PROFILE</a>
		
		<a style="margin-left:50px" href="HomePage.php?chk=updnews">UPDATE LATEST NEWS</a>
		<a style="margin-left:50px" href="HomePage.php?chk=logout">LOGOUT</a>
		
	</td>
  </tr>
  <tr>
    <td width="158" height="572" valign="top">
	<div style="margin-top:50px"><a href="HomePage.php?chk=compose">COMPOSE</a><br/><br/>
	<a href="HomePage.php?chk=inbox">INBOX</a><br/><br/>
	<a href="HomePage.php?chk=sent">SENT</a><br/><br/>
	<a href="HomePage.php?chk=draft">DRAFT</a>
	
	</div>
	</td>
    <td width="660" valign="top">
		<?php
		@$id=$_SESSION['sid'];
		@$chk=$_REQUEST['chk'];
			if($chk=="vprofile")
			{
				include "editProfile.php";
			}
			if($chk=="compose")
			{
				include 'compose.php';
			}
			if($chk=="sent")
			{
				include 'sent.php';
			}
			// if($chk=="trash")
			// {
			// 	include 'trash.php';
			// }
			if($chk=="inbox")
			{
				include 'inbox.php';
			}
			if($chk=="setting")
			{
				include 'setting.php';
			}
			if($chk=="chngPass")
			{
				include 'chngPass.php';
			}
			// if($chk=="chngthm")
			// {
			// 	include 'chngthm.php';
			// }
			if($chk=="draft")
			{
				include 'draft.php';
			}
			if($chk=="updnews")
			{
				include 'latestupd.php';
			}
			
		?>
		
		<!--inbox -->
		<?php
		$id=$_SESSION['sid'];
		@$coninb=$_GET['coninb'];
			
			if($coninb)
			{
			$sql="SELECT * FROM usermail where rec_id='$id' and mail_id='$coninb'";
$dd=mysqli_query($con, $sql);
			$row=mysqli_fetch_object($dd);
			echo "Subject :".$row->sub."<br/>";
			echo "Message :".$row->msg;
			}	
	@$cheklist=$_REQUEST['ch'];
	if(isset($_GET['delete']))
	{
		foreach($cheklist as $v)
		{
		$d="DELETE from usermail where mail_id='$v'";
		mysqli_query($con, $d);
		}
		echo "msg deleted";
	}	
		?>
		
	<!--sent box-->
	<?php
		$id=$_SESSION['sid'];
		@$consent=$_GET['consent'];
			
			if($consent)
			{
			$sql="SELECT * FROM usermail where sen_id='$id' and mail_id='$consent'";
$dd=mysqli_query($con,$sql);
			$row=mysqli_fetch_object($dd);
			echo "Subject :".$row->sub."<br/>";
			echo "Message :".$row->msg;
			}
			
			
	@$cheklist=$_REQUEST['ch'];
	if(isset($_GET['delete']))
	{
		foreach($cheklist as $v)
		{
		$d="DELETE from usermail where mail_id='$v'";
		mysqli_query($con,$d);
		}
		echo "msg deleted";
	}
			
		?>	
		
	</td>
    <td width="135">&nbsp;</td>
  </tr>
  <tr>
    <td height="47" colspan="3">
	<h2 align="center">Copyright</h2>
	</td>
  </tr>
  
</table>

</body>
</html>