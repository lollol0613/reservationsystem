<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to O'HOTEL</title>
</head>
<body>
<?php
$uname=$_POST["uname"];
$password=$_POST["password"];

$db = mysqli_connect('localhost','root','','hotel');
// Check connection
if ($db->connect_error) {
    die("Connection failed: ".$db->connect_error);
}
	$userrecord = "SELECT count(*) FROM member WHERE uname='$uname' and password='$password'";
	$result=mysqli_query($db,$userrecord);
	$row=mysqli_fetch_row($result);
	$count=$row[0];
	if($count=='1') {
		$_SESSION['uname']=$uname;
		$_SESSION['logged']="yes";

		$okmsg='Welcome!';
		echo "<script type='text/javascript'>
			if('$okmsg' != '') {
				self.window.alert('$okmsg');
			}
			location.href = 'home.php';</script>";
		} else {
			$errormsg='Wrong ID or Password';
			echo "<script type='text/javascript'>
			if('$errormsg' != '') {
				self.window.alert('$errormsg');
			}
			location.href = 'home.php';</script>";
		}
		$db->close();
?>
</body>
</html>