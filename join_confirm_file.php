<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="Mihyun Raina Ji">
	<meta name="Reply-to" content="mhrainaji@gmail.com">
	<!--아이폰 웹페이지에서 전체화면으로 동작하도록 해주는 기능-->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!--이미지에 툴바 안 생기게 하기-->
	<meta http-equiv="Imagetoolbar" content="no">
	<!--자동으로 전화번호 혹은 이메일 주소 링크되는 거(스타일이 안 먹음) 막기-->
	<meta name="format-detection" content="no">	
	<!--자동 페이지 이동-->
	<meta http-equiv="refresh" content="3; url=login_file.php">
	<link rel="stylesheet" type="text/css" href="css/basic.css">
	<title>Welcome to O'HOTEL</title>
</head>
<body>
<?php

	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$contact=$_POST["contact"];
	$email=$_POST["email"];
	$address=$_POST["address"];
	$uname=$_POST["uname"];
	$password=$_POST["password"];
	
	$myfile=fopen("member.txt","a+");
	fwrite($myfile,$uname.",".$password.",".$fname.",".$lname.",".$contact.",".$email.",".$address."\n");

	fclose($myfile);

	$login=fopen("login.txt","a+");
	fwrite($login,$uname."/".$password."/"."\n");
	fclose($login);

	echo "Welcome ".$_POST["uname"]."<br>";
	echo "Complete to join successfully";
?>
</div>
</body>
</html>