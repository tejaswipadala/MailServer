<?php
include 'connection.php';
error_reporting(1);
$y=$_POST['y'];
$m=$_POST['m'];
$d=$_POST['d'];
$dob=$y."-".$m."-".$d;
$ch=$_POST['ch'];
$hobbies = str_replace(',', '', $ch);
$imgpath=$_FILES['file']['name'];
$un=$_POST['un'];
if($_POST['reg'])
{
	if($_POST['un']=="" || $_POST['pwd']=="")
	{
	$err="fill your user name first";
	}
	else
	{
	$r=mysqli_query($con,"SELECT * FROM userinfo where user_name='{$_POST['un']}'");
	$t=mysqli_num_rows($r);
		if($t==1)
		{
		$err="user aleready exists choose another";
		}
		else
		{
		mysqli_query($con,"INSERT INTO userinfo values('','{$_POST['un']}','{$_POST['pwd']}','{$_POST['mob']}','{$_POST['eid']}','{$_POST['gen']}','$hobbies','$dob',
		'$imgpath')");
		mkdir("userImages/$un");
		move_uploaded_file($_FILES["file"]["tmp_name"], "userImages/$un/" . $_FILES["file"]["name"]);
		$_SESSION['sname']=$_POST['un'];
		//header('location:index.php?chk=5');
		echo "<script>window.location='index.php?chk=5'</script>";
		}
	}
}

?>
<style>
	table{padding:5px;border-radius:5px}
	td{padding:10px}
</style>
<form method="post" enctype="multipart/form-data">
<table width="90%" border="1" align="center">
  <font color="#FF0000"><?php echo $err; ?></font>
  <tr>
    <td width="204" height="47">Enter Your User Name </td>
    <td width="218"><input type="text" pattern="^\[A-Za-z0-9]+$" name="un" required/></td>
  </tr>
  <tr>
    <td height="39">Enter Your Password </td>
    <td><input type="password" name="pwd" required/></td>
  </tr>
  <tr>
    <td height="47">Enter Your Mobile Number</td>
    <td><input type="text" pattern="[0-9][0-9]{9}" maxlength="10" minlength=10 name="mob" required/></td>
  </tr>
  <tr>
    <td height="39">Enter Your Email </td>
    <td><input type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}" name="eid" required/></td>
  </tr>
  <tr>
    <td height="33">Select Your Gender </td>
    <td>
		Male<input type="radio" name="gen" value="m" required/>
		Female<input type="radio" name="gen" value="f" required/>
	</td>
  </tr>
  <tr>
    <td height="41">Select Your Hobbies </td>
    <td>
		Cricket<input type="checkbox" name="ch[]" value="cricket"/>
		Football<input type="checkbox" name="ch[]" value="football"/>
		Reading<input type="checkbox" name="ch[]" value="reading"/>
	</td>
  </tr>
  <tr>
    <td height="38">Select Your DOB </td>
    <td>
		<select name="y" required>
			<option value="">Year</option>
			<?php
			for($i=1900;$i<=2021;$i++)
			{
			echo "<option value='$i'>$i</option>";
			}
			?>
		</select>
		<select name="m">
			<option value="">Month</option>
			<?php
			for($i=1;$i<=12;$i++)
			{
			echo "<option value='$i'>$i</option>";
			}
			?>
		</select>
		<select name="d">
			<option value="">Date</option>
			<?php
			for($i=1;$i<=31;$i++)
			{
			echo "<option value='$i'>$i</option>";
			}
			?>
		</select>
	</td>
  </tr>
  <tr>
    <td height="55">Upload Your Pics</td>
    <td>
	<input type="file" name="file"/>
	</td>
  </tr>
  <tr>
    <td height="30">I accept term & condition</td>
    <td>
	<input type="checkbox" name="checklist" required/>
	</td>
  </tr>
  <tr>
    <td align="center" colspan="2">
	<input type="submit" name="reg" value="Register"/>
	<input type="reset"  value="Reset"/>
	</td>
  </tr>
</table>
</form>