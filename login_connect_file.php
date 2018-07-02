<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="refresh" content="3; url=home.php">
<title>Welcome to O'HOTEL</title>
</head>
<body>
<?php
$uname=$_POST["uname"];
$password=$_POST["password"];

$memberlist=file("login.txt");

$success = false;
foreach ($memberlist as $user) {
	$user_details = explode('/', $user);

	if($user_details[0] == $uname && $user_details[1] == $password) {
		$success = true;
		break;
	}
}
if($success) {
	$_SESSION["uname"] = $uname;
	$_SESSION["logged"] = "yes";
	echo "Hi, $uname you have been logged in.";
} else {
	echo "<br>You have entered the wrong User Name or Password. Please try again.";
}
?>
</body>
</html>
